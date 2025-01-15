@include('user.sidenav');
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
  .overflower{
    overflow-y: auto;
    height: 500px;
    }
</style>
<section class="home-section" style="width: calc(100% - 58px); overflow: scroll; color: white;">
  <div class="home-content" style="display: block;">
    
    <div class="billing-container">
        <h1 style="text-align: left;">Billing</h1><br>
        <hr><br>
      <!-- Tabs for Different Transaction Categories -->
      <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'Upcoming')">Upcoming</button>
          <button class="tablinks" onclick="openCity(event, 'Pastdue')">Past Due</button>
          <button class="tablinks" onclick="openCity(event, 'Completed')">Completed</button>
          <button class="tablinks" onclick="openCity(event, 'AllTransactions')">All Transactions</button>
          <button class="tablinks" onclick="openCity(event, 'TransactionHistory')">Transaction History</button>
      </div>

      <!-- Upcoming Transactions Tab -->
      <div id="Upcoming" class="tabcontent">
        <div class="overflower">
          <table id="upcomingTable" class="table">
              <thead>
                  <tr>
                      <th>Transaction</th>
                      <th>Price</th>
                      <th>Payment Date</th>
                      <th>User</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse($upcomingTransactions as $transaction)
                      <tr>
                          <td>{{ $transaction->transaction }}</td>
                          <td>{{ $transaction->price }}</td>
                          <td>{{ $transaction->payment_date }}</td>
                          <td>{{ $transaction->user ? $transaction->user->name : 'User not found' }}</td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="4" style="text-align: center;">No upcoming transactions found.</td>
                      </tr>
                  @endforelse
              </tbody>
          </table>
      </div>
    </div>
      <!-- Past Due Transactions Tab -->
      <div id="Pastdue" class="tabcontent">
        <div class="overflower">
          <table id="pastdueTable" class="table">
              <thead>
                  <tr>
                      <th>Transaction</th>
                      <th>Price</th>
                      <th>Payment Date</th>
                      <th>User</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse($pastDueTransactions as $transaction)
                      <tr>
                          <td>{{ $transaction->transaction }}</td>
                          <td>{{ $transaction->price }}</td>
                          <td>{{ $transaction->payment_date }}</td>
                          <td>{{ $transaction->user ? $transaction->user->name : 'User not found' }}</td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="4" style="text-align: center;">No past due transactions found.</td>
                      </tr>
                  @endforelse
              </tbody>
          </table>
      </div>
    </div>
    <!-- Completed Transactions Tab -->
      <div id="Completed" class="tabcontent">
        <div class="overflower">
          <table id="completedTable" class="table">
              <thead>
                  <tr>
                      <th>Transaction</th>
                      <th>Price</th>
                      <th>Payment Date</th>
                      <th>User</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse($completedTransactions as $transaction)
                      <tr>
                          <td>{{ $transaction->transaction }}</td>
                          <td>{{ $transaction->price }}</td>
                          <td>{{ $transaction->payment_date }}</td>
                          <td>{{ $transaction->user ? $transaction->user->name : 'User not found' }}</td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="4" style="text-align: center;">No completed transactions found.</td>
                      </tr>
                  @endforelse
              </tbody>
          </table>
      </div>
    </div>
    <!-- All Transactions Tab -->
      <div id="AllTransactions" class="tabcontent">
          <h2>All Transactions</h2>
          <div class="overflower">
          <table id="allTransactionsTable" class="table">
              <thead>
                  <tr>
                      <th>Transaction</th>
                      <th>Price</th>
                      <th>Payment Date</th>
                      <th>Status</th>
                      <th>User</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse($allTransactions as $transaction)
                      <tr>
                          <td>{{ $transaction->transaction }}</td>
                          <td>{{ $transaction->price }}</td>
                          <td>{{ $transaction->payment_date }}</td>
                          <td>{{ $transaction->status }}</td>
                          <td>{{ $transaction->user ? $transaction->user->name : 'User not found' }}</td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="5" style="text-align: center;">No transactions found.</td>
                      </tr>
                  @endforelse
              </tbody>
          </table>
      </div>
    </div>
    <!-- Transaction History Tab -->
      <div id="TransactionHistory" class="tabcontent">
          <h2>Transaction History</h2>
          <div class="overflower">
          @forelse($allTransactions as $transaction)
              <div class="transaction-history">
                  <h3>Transaction ID: {{ $transaction->id }}</h3>
                  <table class="table">
                      <thead>
                          <tr>
                              <th>Action Date</th>
                              <th>Action</th>
                              <th>Details</th>
                          </tr>
                      </thead>
                      <tbody>
                          @forelse($transactionHistories[$transaction->id] ?? [] as $history)
                              <tr>
                                  <td>{{ $history->created_at->format('Y-m-d H:i:s') }}</td>
                                  <td>{{ ucfirst($history->action) }}</td>
                                  <td>{{ $history->message }}</td>
                              </tr>
                          @empty
                              <tr>
                                  <td colspan="3" style="text-align: center;">No history available for this transaction.</td>
                              </tr>
                          @endforelse
                      </tbody>
                  </table>
              </div>
              
          @empty
              <p style="text-align: center;">No transactions found.</p>
          @endforelse
      </div>
    </div>

    </div>
  </div>
</section>
<script>
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

  document.addEventListener('DOMContentLoaded', function () {
      document.querySelector('.tablinks').click();
  });
</script>
<script src="https://www.chatbase.co/embed.min.js" chatbotId="XJrq5XGGemsfY5X_30vHq" domain="www.chatbase.co" defer></script>
<script src="/js/scripts.js"></script>
</body>
