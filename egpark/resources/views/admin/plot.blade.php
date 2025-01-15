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

  .profile {
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }

  .modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
  }

  .modal-content {
    background-color: #1d1b31;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
    box-sizing: border-box;
  }

  .closeBtn {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .closeBtn:hover,
  .closeBtn:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  .header {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
  }

  .filters {
    margin-bottom: 20px;
  }

  .filters input,
  .filters select,
  .filters button {
    margin-right: 10px;
    padding: 10px;
    border-radius: 5px;
    border: none;
  }

  .filters input[type="date"],
  .filters select {
    background-color: #2a2a2a;
    color: white;
  }

  .filters button {
    background-color: #4CAF50;
    color: white;
  }

  .filters button:hover {
    background-color: #45a049;
  }
  button {
  font-family: 'Poppins', sans-serif; 
  text-align: center;
  background-color:#00BF62;
  color:white;
  padding: 10px 15px;
  border: none;
  border-radius: 35px;
  margin: 0 auto;
  width: 150px;
}
@media print {
      body * {
        color: black;
      }
      .print-header, #plotsTable {
        color: black;
      }
      #plotsTable {
          width: 100%;
          border-collapse: collapse;
          text-align: center;
          color: black;
      }
      th, td {
          border: 1px solid black;
          padding: 8px;
      }
      .print-header {
          text-align: center;
          font-size: 24px;
          margin-bottom: 20px;
          font-weight: bold;
      }
  }
</style>

@include('admin.sidenav')

<section class="home-section" style="width: calc(100% - 58px); overflow: scroll;">
  <div class="home-content" style="display: block;">
    <div class="panel">
      <h1 style="text-align: left;">Plots</h1><br>
      <hr><br>

      <div class="filters">
          <input type="text" id="search" placeholder="Search...">
          <input type="date" id="from_date">
          <input type="date" id="to_date">
          <button onclick="filterData()">Filter</button>
          <button onclick="refreshFilters()">Refresh Filters</button>
          <button onclick="printTable()">Print</button>
      </div>

      <!-- Add Plot Button -->
      <button onclick="openModal('addPlotModal')">Add Plot</button>

      <!-- Plots Table -->
      <table id="plotsTable">
        <thead>
          <tr>
            <th>Block No </th>
            <th>Plot Number</th>
            <th>Lot Owner</th>
            <th>Owner Address</th>
            <th>Contact Number</th>
            <th>Status</th>
            <th>Occupant Name</th>
            <th>Occupant Address</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Interment Date</th>
            <th>Image</th>
            <th class="hide">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($plots as $plot)
          <tr>
            <td>{{ $plot->block_no }}</td>
            <td>{{ $plot->plot_number }}</td>
            <td>{{ $plot->lot_owner }}</td>
            <td>{{ $plot->owner_address }}</td>
            <td>{{ $plot->contact_number }}</td>
            <td>{{ $plot->status }}</td>
            <td>{{ $plot->occupant_name }}</td>
            <td>{{ $plot->occupant_address }}</td>
            <td>{{ $plot->gender }}</td>
            <td>{{ $plot->age }}</td>
            <td>{{ $plot->interment_date }}</td>
            <td>
              @if($plot->image)
              <img src="{{ asset('storage/' . $plot->image) }}" alt="plot image" width="50" height="50">
              @else
              No Image
              @endif
            </td>
            <td class="hide">
              <button style="background-color: #3554dc; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin-left: 10px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPlotModal{{ $plot->id }}">Edit</button>
<button onclick="deletePlot({{ $plot->id }})" style="background-color: #dc3545; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin-left: 10px;">
  Delete
</button>

            </td>
          </tr>
            <style>
                /* Modal content styling */
                .modal-content {
                    background-color: #343a40;
                    color: white;
                    padding: 20px;
                    border-radius: 8px;
                    width: 500px;
                    margin: auto;
                }
                .panel form {

  background-color: #23223100;

}
                /* Header styling */
                .modal-header {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 20px;
                    position: relative;
                }
        
                .modal-title {
                    color: white;
                    margin: 0;
                }
        
                .close {
                    color: white;
                    font-size: 24px;
                    font-weight: bold;
                    cursor: pointer;
                    position: absolute;
                    top: 5px;
                    right: 5px;
                }
        
                /* Form group styling */
                .form-group {
                    margin-bottom: 15px;
                }
        
                .form-group label {
                    color: white;
                }
        
                .form-group input[type="text"],
                .form-group input[type="number"],
                .form-group input[type="date"],
                .form-group select,
                .form-group input[type="file"] {
                    width: 100%;
                    padding: 8px;
                    border-radius: 4px;
                    border: 1px solid #ced4da;
                    background-color: #495057;
                    color: white;
                }
        
                /* Gender select options styling */
                .form-group select option {
                    color: black;
                }
        
                /* Submit button styling */
                .submit-button {
                    background-color: #007bff;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    width: 100%;
                    
                }
            </style>
        
          <div class="modal fade" id="editPlotModal{{ $plot->id }}" tabindex="-1" role="dialog" aria-labelledby="editPlotModalLabel{{ $plot->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex; justify-content: space-between;" >
                      <button style="background-color: #007bff00; width: 5px; " type="button" class="close" data-dismiss="modal" aria-label="Close" style=" font-size: 24px; cursor: pointer; float: right; color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                        <h5 class="modal-title" id="editPlotModalLabel{{ $plot->id }}">Edit Plot</h5>
   
                    </div>
                    <div class="modal-body" style="text-align: left;">
                        <form action="{{ route('admin.plots.update', $plot->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
        
                            <!-- Block No -->
                            <div class="form-group">
                              <label for="edit_block_no">Block No:</label>
                              <select name="block_no" id="edit_block_no">
                                  @for ($i = 1; $i <= 26; $i++)
                                      <option value="{{ $i }}" {{ $plot->block_no == $i ? 'selected' : '' }}>{{ $i }}</option>
                                  @endfor
                              </select>
                          </div>
                            <!-- Plot Number -->
                            <div class="form-group">
                                <label for="plot_number">Plot Number</label>
                                <input type="text" class="form-control" name="plot_number" value="{{ $plot->plot_number }}">
                            </div>
        
                            <!-- Lot Owner -->
                            <div class="form-group">
                                <label for="lot_owner">Lot Owner</label>
                                <input type="text" class="form-control" name="lot_owner" value="{{ $plot->lot_owner }}">
                            </div>
        
                            <!-- Owner Address -->
                            <div class="form-group">
                                <label for="owner_address">Owner Address</label>
                                <input type="text" class="form-control" name="owner_address" value="{{ $plot->owner_address }}">
                            </div>
        
                            <!-- Contact Number -->
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" class="form-control" name="contact_number" value="{{ $plot->contact_number }}">
                            </div>
        
                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" name="status" value="{{ $plot->status }}">
                            </div>
        
                            <!-- Occupant Name -->
                            <div class="form-group">
                                <label for="occupant_name">Occupant Name</label>
                                <input type="text" class="form-control" name="occupant_name" value="{{ $plot->occupant_name }}">
                            </div>
        
                            <!-- Occupant Address -->
                            <div class="form-group">
                                <label for="occupant_address">Occupant Address</label>
                                <input type="text" class="form-control" name="occupant_address" value="{{ $plot->occupant_address }}">
                            </div>
        
                            <!-- Gender -->
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input type="text" class="form-control" name="gender" value="{{ $plot->gender }}">
                            </div>
        
                            <!-- Age -->
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" name="age" value="{{ $plot->age }}">
                            </div>
        
                            <!-- Interment Date -->
                            <div class="form-group">
                                <label for="interment_date">Interment Date</label>
                                <input type="date" class="form-control" name="interment_date" value="{{ $plot->interment_date }}">
                            </div>
        
                            <div class="form-group">
                              <label for="image">Current Image</label>
                              
                              <!-- Display Current Image if Exists -->
                              @if($plot->image)
                                  <div class="mb-3">
                                      <img src="{{ asset('storage/' . $plot->image) }}" alt="Plot Image" style="width: 100px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                  </div>
                              @else
                                  <p>No image available.</p>
                              @endif
                          
                              <label for="image">Upload New Image</label>
                              <input type="file" class="form-control" name="image">
                          </div>
        
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
          @endforeach
        </tbody>
      </table>
      <img src="{{ asset('img/signature.png') }}" alt="Signature" class="">

<!-- Add Plot Modal -->
<div id="addPlotModal" class="modal">
<div class="modal-content" style="padding: 20px; border-radius: 10px; background-color: #333;">
    <span class="close" style="font-size: 24px; cursor: pointer; float: right; color: white;" onclick="closeModal('addPlotModal')">&times;</span>
    <form action="{{ route('plots.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Form Fields -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="block_no" style="color: white; font-weight: bold;">Block No:</label>
            <select name="block_no" id="block_no" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
                @for ($i = 1; $i <= 26; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="plot_number" style="color: white; font-weight: bold;">Plot Number:</label>
            <input type="text" name="plot_number" id="plot_number" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="lot_owner" style="color: white; font-weight: bold;">Lot Owner:</label>
            <input type="text" name="lot_owner" id="lot_owner" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="owner_address" style="color: white; font-weight: bold;">Owner Address:</label>
            <input type="text" name="owner_address" id="owner_address" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="contact_number" style="color: white; font-weight: bold;">Contact Number:</label>
            <input type="text" name="contact_number" id="contact_number" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="status" style="color: white; font-weight: bold;">Status:</label>
            <input type="text" name="status" id="status" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="occupant_name" style="color: white; font-weight: bold;">Occupant Name:</label>
            <input type="text" name="occupant_name" id="occupant_name" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="occupant_address" style="color: white; font-weight: bold;">Occupant Address:</label>
            <input type="text" name="occupant_address" id="occupant_address" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="gender" style="color: white; font-weight: bold;">Gender:</label>
            <select name="gender" id="gender" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="age" style="color: white; font-weight: bold;">Age:</label>
            <input type="number" name="age" id="age" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="interment_date" style="color: white; font-weight: bold;">Interment Date:</label>
            <input type="date" name="interment_date" id="interment_date" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="image" style="color: white; font-weight: bold;">Image:</label>
            <input type="file" name="image" id="image" accept="image/*" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Add Plot
        </button>
    </form>
</div>
</div>
     {{-- <!-- Edit Plot Modal -->
<div id="editPlotModal" class="modal">
<div class="modal-content" style="background-color: #343a40; color: white; padding: 20px; border-radius: 8px; width: 500px; margin: auto;">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2 style="color: white; margin: 0;">Edit Plot</h2>
    <span class="close" onclick="closeModal('editPlotModal')" style="color: white; font-size: 24px; font-weight: bold; cursor: pointer;">&times;</span>
</div>
    <form id="editPlotForm" action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Form Fields -->
        <input type="hidden" name="id" value="{{ $plot->id }}">

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edit_block_no" style="color: white;">Block No:</label>
            <select name="block_no" id="edit_block_no" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da; background-color: #495057; color: white;">
                @for ($i = 1; $i <= 26; $i++)
                <option value="{{ $i }}" {{ $plot->block_no == $i ? 'selected' : '' }}>{{ $i }}</option>                  @endfor
            </select>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edit_plot_number" style="color: white;">Plot Number:</label>
            <input value="{{ $plot->plot_number }}" type="text" name="plot_number" id="edit_plot_number" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da; background-color: #495057; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edit_lot_owner" style="color: white;">Lot Owner:</label>
            <input value="{{ $plot->lot_owner }}" type="text" name="lot_owner" id="edit_lot_owner" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da; background-color: #495057; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edit_owner_address" style="color: white;">Owner Address:</label>
            <input value="{{ $plot->owner_address }}" type="text" name="owner_address" id="edit_owner_address" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da; background-color: #495057; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edit_contact_number" style="color: white;">Contact Number:</label>
            <input value="{{ $plot->contact_number }}" type="text" name="contact_number" id="edit_contact_number" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da; background-color: #495057; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edit_status" style="color: white;">Status:</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ $plot->status }}" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #555; color: white;">          </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edit_occupant_name" style="color: white;">Occupant Name:</label>
            <input type="text" name="occupant_name" id="edit_occupant_name" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da; background-color: #495057; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edit_occupant_address" style="color: white;">Occupant Address:</label>
            <input type="text" name="occupant_address" id="edit_occupant_address" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da; background-color: #495057; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edit_gender" style="color: white;">Gender:</label>
            <select name="gender" id="edit_gender" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da; background-color: #495057; color: white;">
                <option value="male" style="color: black;">Male</option>
                <option value="female" style="color: black;">Female</option>
            </select>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edit_age" style="color: white;">Age:</label>
            <input type="number" name="age" id="edit_age" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da; background-color: #495057; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edit_interment_date" style="color: white;">Interment Date:</label>
            <input type="date" name="interment_date" id="edit_interment_date" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da; background-color: #495057; color: white;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edit_image" style="color: white;">Image:</label>
            <input type="file" name="image" id="edit_image" accept="image/*" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da; background-color: #495057; color: white;">
        </div>

        <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; width: 100%;">Update Plot</button>
    </form>
</div>
</div> --}}


      <!-- Delete Plot Modal -->
      <div id="deletePlotModal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="closeModal('deletePlotModal')">&times;</span>
          <form id="deletePlotForm" action="" method="POST">
            @csrf
            @method('DELETE')
            <p>Are you sure you want to delete this plot?</p>
            <button type="submit">Delete Plot</button>
            <button type="button" onclick="closeModal('deletePlotModal')">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  // Function to filter table data
  function filterData() {
      const search = document.getElementById('search').value.toLowerCase();
      const fromDate = document.getElementById('from_date').value;
      const toDate = document.getElementById('to_date').value;

      const table = document.getElementById('plotsTable');
      const rows = table.getElementsByTagName('tr');

      for (let i = 1; i < rows.length; i++) {
          const cells = rows[i].getElementsByTagName('td');
          const blockNo = cells[0].textContent.toLowerCase();
          const plotNumber = cells[1].textContent.toLowerCase();
          const lotOwner = cells[2].textContent.toLowerCase();
          const intermentDate = cells[10].textContent;

          let showRow = true;

          if (search && !blockNo.includes(search) && !plotNumber.includes(search) && !lotOwner.includes(search)) {
              showRow = false;
          }

          if (fromDate && new Date(intermentDate) < new Date(fromDate)) {
              showRow = false;
          }

          if (toDate && new Date(intermentDate) > new Date(toDate)) {
              showRow = false;
          }

          rows[i].style.display = showRow ? '' : 'none';
      }
  }

  // Function to refresh filters
  function refreshFilters() {
      document.getElementById('search').value = '';
      document.getElementById('from_date').value = '';
      document.getElementById('to_date').value = '';
      filterData(); // Apply filters with cleared values
  }
  function printTable() {
    // Get table content
    const table = document.getElementById('plotsTable').outerHTML;

    // Add custom header with logo
    const header = `
      <div class="print-header">
        <img src="{{ asset('img/home.png') }}" alt="Logo" class="print-logo">
        <img src="{{ asset('img/logo2.svg') }}" alt="Logo" id="logo2">
        <span>GREENPARK MEMORIAL GARDEN POPULATION</span>
      </div>
    `;

    // Add footer content
    const footer = `
      <div class="print-footer">
        <p>Generated on: ${new Date().toLocaleDateString()}</p>
        <p>Prepared by: Greenpark Memorial Garden System</p>
      </div>
    `;

    // Add signature section
    const signature = `
      <div class="signature-section">
<img src="{{ asset('img/signature.png') }}" alt="Signature" class="">
                <div class="printed-name">MR. JOSEPH DIMALANTA</div>

        <hr class="signature-line">
                        <div class="printed-name">OWNER</div>

      </div>
    `;

    // Save original content
    const originalContent = document.body.innerHTML;

    // Prepare print content
    document.body.innerHTML = `
      <style>
        body {
          background-color: white !important;
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
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
          #logo2{
           width: 50px;
           border: none;
          }
        table {
          width: 100%;
          border-collapse: collapse;
          margin-bottom: 30px;
        }
        th, td {
          border: 1px solid #000;
          padding: 8px;
          text-align: left;
        }
        th {
          background-color: #f0f0f0;
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
          border-top: 1px solid #000;
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
          border-top: 1px solid #000;
        }
        @media print {
          .print-footer {
            position: fixed;
            bottom: 0;
          }
            .hide{
            display: none}
        }
      </style>
      ${header}
      ${table}
      ${signature}
      ${footer}
    `;

    // Print and restore original content
    window.print();
    document.body.innerHTML = originalContent;
}





  // Function to open the modal
  function openModal(modalId) {
      document.getElementById(modalId).style.display = 'block';
  }

  // Function to close the modal
  function closeModal(modalId) {
      document.getElementById(modalId).style.display = 'none';
  }

  function editPlot(plotId) {
  // Fetch the plot data from the table row (you may need to pass additional data attributes)
  const plot = document.getElementById(`plot-${plotId}`).dataset;
  
  // Set the modal form action dynamically
  document.getElementById('editPlotForm').action = `/plots/${plotId}`;

  // Populate the modal form fields
  document.getElementById('edit_block_no').value = plot.blockNo;
  document.getElementById('edit_plot_number').value = plot.plotNumber;
  document.getElementById('edit_lot_owner').value = plot.lotOwner;
  document.getElementById('edit_owner_address').value = plot.ownerAddress;
  document.getElementById('edit_contact_number').value = plot.contactNumber;
  document.getElementById('edit_status').value = plot.status;
  document.getElementById('edit_occupant_name').value = plot.occupantName;
  document.getElementById('edit_occupant_address').value = plot.occupantAddress;
  document.getElementById('edit_gender').value = plot.gender;
  document.getElementById('edit_age').value = plot.age;
  document.getElementById('edit_interment_date').value = plot.intermentDate;

  // Open the modal
  openModal('editPlotModal');
}

  // Function to delete plot
  function deletePlot(plotId) {
      const url = `{{ url('/plots') }}/${plotId}`;
      document.getElementById('deletePlotForm').action = url;

      openModal('deletePlotModal');
  }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>