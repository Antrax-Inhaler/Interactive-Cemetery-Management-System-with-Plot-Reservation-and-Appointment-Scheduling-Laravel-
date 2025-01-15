<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $users = User::all();
        $today = now();
        $fiveDaysFromNow = $today->copy()->addDays(5);
    
        // Transactions within the next 5 days (including today)
        $upcomingTransactions = Transaction::with('user')
            ->where('payment_date', '<=', $fiveDaysFromNow)
            ->where('payment_date', '>=', $today)
            ->where('status', 'unpaid')
            ->get();
    
        // Transactions with payment date already passed
        $pastDueTransactions = Transaction::with('user')
            ->where('payment_date', '<', $today)
            ->where('status', 'unpaid')
            ->get();
    
        // Transactions that are completed (paid)
        $completedTransactions = Transaction::with('user')
            ->where('status', 'paid')
            ->get();
    
        // All transactions
        $allTransactions = Transaction::with('user')->get();
    
        return view('admin.billing', compact('users', 'upcomingTransactions', 'pastDueTransactions', 'completedTransactions', 'allTransactions'));
    }
    
    public function create()
    {
        $users = User::all();
        return view('admin.billing', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction' => 'required',
            'price' => 'required|numeric',
            'payment_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $transaction = Transaction::create($request->all());
        
        $this->createNotification($transaction, $transaction->status);

        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully');
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $users = User::all();
        return view('admin.billing', compact('transaction', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'transaction' => 'required',
            'price' => 'required|numeric',
            'payment_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());

        $this->createNotification($transaction, $transaction->status);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully');
    }

    public function destroy(Transaction $transaction)
    {
        // Attempt to delete the transaction
        try {
            $transaction->delete();
            return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('transactions.index')->with('error', 'Failed to delete transaction.');
        }
    }

    public function billing()
    {
        $user = auth()->user(); // Get the currently authenticated user
        $today = now();

        // Get the user's transactions
        $upcomingTransactions = Transaction::where('user_id', $user->id)
            ->where('payment_date', '>=', $today->addDays(5))
            ->where('status', 'unpaid')
            ->get();

        $pastDueTransactions = Transaction::where('user_id', $user->id)
            ->where('payment_date', '<', $today)
            ->where('status', 'unpaid')
            ->get();

        $completedTransactions = Transaction::where('user_id', $user->id)
            ->where('status', 'paid')
            ->get();

        $allTransactions = Transaction::where('user_id', $user->id)->get();

        // Fetch history for each transaction
        $transactionHistories = [];
        foreach ($allTransactions as $transaction) {
            $transactionHistories[$transaction->id] = History::where('item_id', $transaction->id)
                ->where('type', 'transaction')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('user.billing', compact(
            'upcomingTransactions', 
            'pastDueTransactions', 
            'completedTransactions', 
            'allTransactions', 
            'transactionHistories'
        ));
    }
    protected function createNotification(Transaction $transaction, $status)
    {
        $message = '';
        $adminMessage = '';

        switch ($status) {
            case 'unpaid':
                if ($transaction->payment_date > now()) {
                    $message = 'Upcoming transaction: ' . $transaction->transaction;
                    $adminMessage = 'Upcoming transaction for user: ' . $transaction->transaction;
                } else {
                    $message = 'Past due transaction: ' . $transaction->transaction;
                    $adminMessage = 'Past due transaction for user: ' . $transaction->transaction;
                }
                break;
            case 'paid':
                $message = 'Completed transaction: ' . $transaction->transaction;
                $adminMessage = 'Completed transaction for user: ' . $transaction->transaction;
                break;
        }

        Notification::create([
            'user_id' => $transaction->user_id,
            'type' => 'transaction',
            'item_id' => $transaction->id,
            'message' => $message,
            'admin_message' => $adminMessage,
            'is_read' => 0, // Default to unread for user
            'is_read_admin' => 0, // Default to unread for admin
        ]);
    }
}
