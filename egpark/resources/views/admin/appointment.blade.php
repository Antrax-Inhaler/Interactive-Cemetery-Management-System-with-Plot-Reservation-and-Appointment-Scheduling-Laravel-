{{-- resources/views/admin/appointment.blade.php --}}
@include('admin.sidenav')
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

  .box {
    overflow-y: auto;
    align-items: center;
  }

  .search-container {
    text-align: center;
  }

  .search-container input {
    padding: 8px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: transparent;
  }

  .print-button {
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    font-size: 30px;
    background-color: transparent;
    margin-right: 10px;
  }

  .header {
    display: flex;
    justify-content: space-between;
  }

  .right {
    border: 1px solid;
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
  }

  @media print {
    .no-print {
      display: none;
    }
  }
  .panel form {
    text-align: center;
}
table{
  color: white !important;
}
</style>
<section class="home-section" style="width: calc(100% - 58px); overflow: scroll;">
  <div class="home-content" style="display: block;">
    <div class="panel">
      <div class="header">
        <h1 style="text-align: left;">Appointments</h1><br>
        <div class="right no-print">
          <button class="print-button" onclick="printTable()"><i class="fas fa-print"></i></button>
          <div class="search-container">
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for names..">
          </div>
        </div>
      </div>
      <hr><br>
      <div class="box">
        @if($appointments->count() > 0)
          <table id="appointmentsTable">
            <thead>
              <tr>
                <th>User Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th class="no-print">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($appointments as $appointment)
                <tr>
                  <td>{{ $appointment->user->name }}</td>
                  <td>{{ $appointment->date }}</td>
                  <td>{{ $appointment->time }}</td>
                  <td>{{ $appointment->status }}</td>
                  <td class="no-print" style="text-align: center; display: flex; justify-content: center;">
                    <form action="{{ route('admin.appointment.updateStatus', $appointment->id) }}" method="POST">
                        @csrf
                        <select name="status" onchange="this.form.submit()" style="padding: 8px; border-radius: 4px; border: 1px solid #ced4da; background-color: #495057; color: white; width: 150px; cursor: pointer;">
                            <option value="Pending" {{ $appointment->status == 'Pending' ? 'selected' : '' }} style="background-color: #6c757d; color: white;">Pending</option>
                            <option value="Confirmed" {{ $appointment->status == 'Confirmed' ? 'selected' : '' }} style="background-color: #28a745; color: white;">Confirmed</option>
                            <option value="Completed" {{ $appointment->status == 'Completed' ? 'selected' : '' }} style="background-color: #007bff; color: white;">Completed</option>
                            <option value="Cancelled" {{ $appointment->status == 'Cancelled' ? 'selected' : '' }} style="background-color: #dc3545; color: white;">Cancelled</option>
                        </select>
                    </form>
                </td>                
                </tr>
              @endforeach
            </tbody>
          </table>
          <img src="{{ asset('img/signature.png') }}" alt="Signature" class="sig">
          <img src="{{ asset('img/logo2.svg') }}" alt="Logo" class="sig">

        @else
          <p>No appointments found.</p>
        @endif
      </div>
    </div>
  </div>
</section>

<script src="/js/scripts.js"></script>
<script>
  function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("appointmentsTable");
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

  function printTable() {
  // Get the table content
  const printContents = document.querySelector('.box').innerHTML;

  // Define header with logo and title
  const header = `
  <style>
          .no-print {
        display: none;
      }
        </style>
    <div class="print-header">
      <img src="{{ asset('img/logo2.svg') }}" alt="Logo" class="print-logo">
      <span>GREENPARK MEMORIAL GARDEN APPOINTMENT LIST</span>
    </div>
  `;

  // Define footer
  const footer = `
    <div class="print-footer">
      <p>Generated on: ${new Date().toLocaleDateString()}</p>
      <p>Prepared by: Greenpark Memorial Garden System</p>
    </div>
  `;

  // Define signature section
  const signature = `
     <div class="signature-section">
<img src="{{ asset('img/signature.png') }}" alt="Signature" class="">
                <div class="printed-name">MR. JOSEPH DIMALANTA</div>

        <hr class="signature-line">
                        <div class="printed-name">OWNER</div>

      </div>
  `;

  // Save the current page content
  const originalContent = document.body.innerHTML;

  // Replace the page content with print content
  document.body.innerHTML = `
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: white;
        width: 100%;
        height: 100%;
      }
      .print-header {
        display: flex;
        align-items: center;
        padding: 10px 0;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        justify-content: center;
      }
      .print-logo {
        width: 50px;
        height: 50px;
        margin-right: 10px;
      }
      table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
      }
      th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
      }
      th {
        background-color: #f0f0f0;
      }
                .sig{
        display: none;
        }
      .no-print {
        display: none !important;
      }
      .signature-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
      }
      .signature {
        width: 150px;
        height: auto;
        margin-bottom: 5px;
      }
      .signature-line {
        width: 200px;
        border: 0;
        border-top: 1px solid black;
        margin: 5px 0;
      }
      .printed-name {
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
      }
      .print-footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: center;
        font-size: 14px;
        background: #f7f7f7;
        padding: 10px 0;
        border-top: 1px solid black;
      }
      @media print {
        body {
          margin: 0;
          width: 100%;
          height: 100%;
          overflow: visible;
        }
        .print-footer {
          position: fixed;
          bottom: 0;
        }
      }
    </style>
    ${header}
    ${printContents}
    ${signature}
    ${footer}
  `;

  // Trigger the print dialog
  window.print();

  // Restore the original content after printing
  document.body.innerHTML = originalContent;

  // Reattach JavaScript functionality (if necessary)
  const scripts = document.querySelectorAll('script[src]');
  scripts.forEach((script) => {
    const newScript = document.createElement('script');
    newScript.src = script.src;
    document.body.appendChild(newScript);
  });
}


</script>
