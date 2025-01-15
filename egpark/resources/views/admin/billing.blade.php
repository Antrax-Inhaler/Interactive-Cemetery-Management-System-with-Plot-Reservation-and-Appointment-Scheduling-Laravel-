@include('admin.sidenav')
<style>
     input{
    padding: 8px;
    width: 20%;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: transparent;
    color: white;
    min-width: 200px;
  }
  .tabcontent {
    
}
@media screen and (max-width: 1000px) {
    .tab button {
        padding: 9px 12.7px;
    }
}
.overflower{
    overflow-y: auto;
    height: 500px;
    }
    @media print {
    /* Hide the Actions column in all tables */
    th:last-child,
    td:last-child {
      display: none;
    }
  }
  .btn-secondary{
    background-color: transparent;
    border: none;
    color: white;
  }
  .modal-content{
    background-color: #33023f !important;
  }
  .fa-print{
    font-size: 30px;
  }
</style>
<section class="home-section" style="width: calc(100% - 58px); overflow: scroll; color: white;">
    <div class="home-content" style="display:block;">
        <div class="panel">
            <h1 style="text-align: left;">Billing</h1><br>
            <hr><br>

            <!-- Add Transaction Button -->
            <div class="box" style="background: transparent;">
                <button class="button" onclick="openModal('addTransactionModal')">Add Transaction</button>
            </div><br>
            <!-- Tabs -->
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Upcoming')">Upcoming</button>
                <button class="tablinks" onclick="openCity(event, 'Pastdue')">Past Due</button>
                <button class="tablinks" onclick="openCity(event, 'Completed')">Completed</button>
            </div>

            <!-- Tab content -->
            <div id="Upcoming" class="tabcontent">
                <input type="text" id="upcomingSearch" onkeyup="searchTable('upcomingTable', 'upcomingSearch')" placeholder="Search for transactions..">
                <button onclick="printTable('upcomingTable')" class="btn btn-secondary"><i class="fas fa-print"></i></button>
                 <br>
                 <br>
                 <div class="overflower" >
                <table id="upcomingTable" class="table">
                    <thead>
                        <tr>
                            <th>Transaction</th>
                            <th>Price</th>
                            <th>Payment Date</th>
                            <th>User</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($upcomingTransactions->isEmpty())
                            <tr>
                                <td colspan="5" style="text-align: center;">No upcoming transactions found.</td>
                            </tr>
                        @else
                            @foreach($upcomingTransactions as $transaction)
                                <tr class="no-print" >
                                    <td>{{ $transaction->transaction }}</td>
                                    <td>{{ $transaction->price }}</td>
                                    <td>{{ $transaction->payment_date }}</td>
                                    <td>{{ $transaction->user ? $transaction->user->name : 'User not found' }}</td>
                                    <td>
                                        <button style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;" 
        onclick="openUpdateModal({{ json_encode($transaction) }})">
    Update
</button>
<button style="background-color: #f44336; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;" 
        onclick="openDeleteModal({{ json_encode($transaction) }})">
    Delete
</button>

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    
                </table>
            </div>
            </div>

            <div id="Pastdue" class="tabcontent">
                <input type="text" id="pastdueSearch" onkeyup="searchTable('pastdueTable', 'pastdueSearch')" placeholder="Search for transactions..">
                <button onclick="printTable('pastdueTable')" class="btn btn-secondary"><i class="fas fa-print"></i></button>
                <br>
                <br>
                <div class="overflower" >
                <table id="pastdueTable" class="table">
                    <thead>
                        <tr>
                            <th>Transaction</th>
                            <th>Price</th>
                            <th>Payment Date</th>
                            <th>User</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($pastDueTransactions->isEmpty())
                            <tr>
                                <td colspan="5" style="text-align: center;">No past due transactions found.</td>
                            </tr>
                        @else
                            @foreach($pastDueTransactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->transaction }}</td>
                                    <td>{{ $transaction->price }}</td>
                                    <td>{{ $transaction->payment_date }}</td>
                                    <td>{{ $transaction->user ? $transaction->user->name : 'User not found' }}</td>
                                    <td>
                                        <button style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; margin-right: 5px;" 
                                        onclick="openUpdateModal({{ json_encode($transaction) }})">
                                    Update
                                </button>
                                <button style="background-color: #f44336; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;" 
                                        onclick="openDeleteModal({{ json_encode($transaction) }})">
                                    Delete
                                </button>
                                
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    
                </table>
            </div>
        </div>

        <div id="Completed" class="tabcontent">
                <input type="text" id="completedSearch" onkeyup="searchTable('completedTable', 'completedSearch')" placeholder="Search for transactions..">
                <button onclick="printTable('completedTable')" class="btn btn-secondary"><i class="fas fa-print"></i></button>
                <br>
                <br>
                <div class="overflower" >
                <table id="completedTable" class="table">
                    <thead>
                        <tr>
                            <th>Transaction</th>
                            <th>Price</th>
                            <th>Payment Date</th>
                            <th>User</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($completedTransactions->isEmpty())
                            <tr>
                                <td colspan="5" style="text-align: center;">No completed transactions found.</td>
                            </tr>
                        @else
                            @foreach($completedTransactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->transaction }}</td>
                                    <td>{{ $transaction->price }}</td>
                                    <td>{{ $transaction->payment_date }}</td>
                                    <td>{{ $transaction->user ? $transaction->user->name : 'User not found' }}</td>
                                    <td>
                                        <button style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; margin-right: 5px;" 
                                        onclick="openUpdateModal({{ json_encode($transaction) }})">
                                    Update
                                </button>
                                <button style="background-color: #f44336; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;" 
                                        onclick="openDeleteModal({{ json_encode($transaction) }})">
                                    Delete
                                </button>
                                
                                        
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    
                </table>
            </div>
        </div>

            <!-- Table for All Transactions -->
            <h2>All Transactions</h2>
            <input type="text" id="allTransactionsSearch" onkeyup="searchTable('allTransactionsTable', 'allTransactionsSearch')" placeholder="Search for transactions..">
            <button onclick="printTable('allTransactionsTable')" class="btn btn-secondary"><i class="fas fa-print"></i></button>
            <br>
            <br>
            <div class="overflower" >
            <table id="allTransactionsTable" class="table">
                <thead>
                    <tr>
                        <th>Transaction</th>
                        <th>Price</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>User</th>
                        <th class="no-print" >Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($allTransactions->isEmpty())
                        <tr>
                            <td colspan="6" style="text-align: center;">No transactions found.</td>
                        </tr>
                    @else
                        @foreach($allTransactions as $transaction)
                            <tr>
                                <td>{{ $transaction->transaction }}</td>
                                <td>{{ $transaction->price }}</td>
                                <td>{{ $transaction->payment_date }}</td>
                                <td>{{ $transaction->status }}</td>
                                <td>{{ $transaction->user ? $transaction->user->name : 'User not found' }}</td>
                                <td class="no-print" >
                                    <button style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; margin-right: 5px;" 
        onclick="openUpdateModal({{ json_encode($transaction) }})">
    Update
</button>
<button style="background-color: #f44336; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;" 
        onclick="openDeleteModal({{ json_encode($transaction) }})">
    Delete
</button>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                
            </table>
        </div>
    </div>

        <!-- Modals for Add, Update, and Delete -->
            <!-- Add Transaction Modal -->
            <div id="addTransactionModal" class="modal">
                <div class="modal-content" style="padding: 20px; border-radius: 10px; background-color: #f9f9f9; color: white; ">
                    <span class="close" style="font-size: 24px; cursor: pointer; float: right;" onclick="closeModal('addTransactionModal')">&times;</span>
                    <h2 style="margin-bottom: 20px; color: #ffffff;">Add Transaction</h2>
                    <form id="addTransactionForm" action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="transaction" style="color: #ffffff; font-weight: bold;">Transaction:</label>
                            <input type="text" id="transaction" name="transaction" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="price" style="color: #ffffff; font-weight: bold;">Price:</label>
                            <input type="number" step="0.01" id="price" name="price" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="payment_date" style="color: #ffffff; font-weight: bold;">Payment Date:</label>
                            <input type="date" id="payment_date" name="payment_date" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="status" style="color: #ffffff; font-weight: bold;">Status:</label>
                            <select id="status" name="status" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                                <option value="unpaid">Unpaid</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="user_name" style="color: #ffffff; font-weight: bold;">User:</label>
                            <input type="text" id="user_name" list="users" class="form-control" autocomplete="off" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>
                            <datalist id="users">
                                @foreach($users as $user)
                                    <option value="{{ $user->name }}" data-id="{{ $user->id }}">{{ $user->name }} (ID: {{ $user->id }})</option>
                                @endforeach
                            </datalist>
                            <input type="hidden" id="user_id" name="user_id">
                            <div id="user-error" class="error-message" style="display:none;color:red;">User not found</div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            

            <!-- Update Transaction Modal -->
            <div id="updateTransactionModal" class="modal">
                <div class="modal-content" style="padding: 20px; border-radius: 10px; background-color: #333;">
                    <span class="close" style="font-size: 24px; cursor: pointer; float: right; color: white;" onclick="closeModal('updateTransactionModal')">&times;</span>
                    <h2 style="margin-bottom: 20px; color: white;">Update Transaction</h2>
                    <form action="" method="POST" id="updateTransactionForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="transaction" style="color: white; font-weight: bold;">Transaction:</label>
                            <input type="text" id="update_transaction" name="transaction" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="price" style="color: white; font-weight: bold;">Price:</label>
                            <input type="number" step="0.01" id="update_price" name="price" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="payment_date" style="color: white; font-weight: bold;">Payment Date:</label>
                            <input type="date" id="update_payment_date" name="payment_date" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="status" style="color: white; font-weight: bold;">Status:</label>
                            <select id="update_status" name="status" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
                                <option value="unpaid">Unpaid</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="user_name" style="color: white; font-weight: bold;">User:</label>
                            <input type="text" id="update_user_name" list="users" class="form-control" autocomplete="off" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;" required>
                            <datalist id="users">
                                @foreach($users as $user)
                                    <option value="{{ $user->name }}" data-id="{{ $user->id }}">{{ $user->name }} (ID: {{ $user->id }})</option>
                                @endforeach
                            </datalist>
                            <input type="hidden" id="update_user_id" name="user_id">
                            <div id="user-error" class="error-message" style="display:none;color:red;">User not found</div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            

            <!-- Delete Transaction Modal -->
            <div id="deleteTransactionModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('deleteTransactionModal')">&times;</span>
                    <h2>Delete Transaction</h2>
                    <p>Are you sure you want to delete this transaction?</p>
                    <form action="" method="POST" id="deleteTransactionForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: #f44336; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; margin-right: 5px;" class="btn btn-danger">
                            Yes, Delete
                        </button>
                        <button type="button" style="background-color: #6c757d; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;" class="btn btn-secondary" 
                                onclick="closeModal('deleteTransactionModal')">
                            Cancel
                        </button>                        
                    </form>
                </div>
            </div>

            <!-- Modal Styles -->
            <style>
                 table {
    width: 100%;
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid white;
    padding: 8px;
    text-align: left;
    color: white;
    text-align: center;
  }

                .modal {
                    display: none;
                    position: fixed;
                    z-index: 1;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    background-color: rgb(0,0,0);
                    background-color: rgba(0,0,0,0.4);
                    padding-top: 60px;
                }
                .modal-content {
                    background-color: #fefefe;
                    margin: 5% auto;
                    padding: 20px;
                    border: 1px solid #888;
                    width: 80%;
                }
                .close {
                    color: #aaa;
                    float: right;
                    font-size: 28px;
                    font-weight: bold;
                }
                .close:hover,
                .close:focus {
                    color: black;
                    text-decoration: none;
                    cursor: pointer;
                }
            </style>

            <!-- JavaScript Functions -->
            <script>
                function openModal(modalId) {
                    document.getElementById(modalId).style.display = "block";
                }

                function closeModal(modalId) {
                    document.getElementById(modalId).style.display = "none";
                }

                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }

                function openUpdateModal(transaction) {
                    document.getElementById('updateTransactionForm').action = '/transactions/' + transaction.id;
                    document.getElementById('update_transaction').value = transaction.transaction;
                    document.getElementById('update_price').value = transaction.price;
                    document.getElementById('update_payment_date').value = transaction.payment_date;
                    document.getElementById('update_status').value = transaction.status;
                    document.getElementById('update_user_name').value = transaction.user ? transaction.user.name : '';
                    document.getElementById('update_user_id').value = transaction.user_id;
                    openModal('updateTransactionModal');
                }

                function openDeleteModal(transaction) {
                    document.getElementById('deleteTransactionForm').action = '/transactions/' + transaction.id;
                    openModal('deleteTransactionModal');
                }

                function printTable(tableId) {
    var table = document.getElementById(tableId);
    var newWindow = window.open('', '', 'fullscreen=yes');

    // Adding the header with centered text
    var header = '<h1 style="text-align: center;">GREENPARK MEMORIAL GARDEN TRANSACTION LIST</h1>';

    newWindow.document.write('<html><head><title>Print Table</title>');
    newWindow.document.write('<style>');
    newWindow.document.write('body { font-family: Arial, sans-serif; } ');
    newWindow.document.write('table { width: 100%; border-collapse: collapse; }');
    newWindow.document.write('no-print { display: none; }');
    newWindow.document.write('th, td { border: 1px solid black; padding: 8px; text-align: left; }');
    newWindow.document.write('</style>');
    newWindow.document.write('</head><body>');
    newWindow.document.write(header); // Include the header before the table
    newWindow.document.write(table.outerHTML);
    newWindow.document.write('</body></html>');
    newWindow.document.close();
    newWindow.focus();
    newWindow.print();
    newWindow.close();
}


                function searchTable(tableId, inputId) {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById(inputId);
                    filter = input.value.toUpperCase();
                    table = document.getElementById(tableId);
                    tr = table.getElementsByTagName("tr");
                    for (i = 1; i < tr.length; i++) {
                        tr[i].style.display = "none";
                        td = tr[i].getElementsByTagName("td");
                        for (var j = 0; j < td.length; j++) {
                            if (td[j]) {
                                txtValue = td[j].textContent || td[j].innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                    break;
                                }
                            }
                        }
                    }
                }

                document.getElementById('addTransactionForm').addEventListener('submit', function(event) {
                    var userName = document.getElementById('user_name').value;
                    var selectedUser = document.querySelector('#users option[value="' + userName + '"]');
                    if (selectedUser) {
                        document.getElementById('user_id').value = selectedUser.dataset.id;
                    } else {
                        document.getElementById('user-error').style.display = 'block';
                        event.preventDefault();
                    }
                });

                document.getElementById('updateTransactionForm').addEventListener('submit', function(event) {
                    var userName = document.getElementById('update_user_name').value;
                    var selectedUser = document.querySelector('#users option[value="' + userName + '"]');
                    if (selectedUser) {
                        document.getElementById('update_user_id').value = selectedUser.dataset.id;
                    } else {
                        document.getElementById('user-error').style.display = 'block';
                        event.preventDefault();
                    }
                });

                // Default open first tab
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelector(".tablinks").click();
                });
            </script>
        </div>
    </div>
</section>
