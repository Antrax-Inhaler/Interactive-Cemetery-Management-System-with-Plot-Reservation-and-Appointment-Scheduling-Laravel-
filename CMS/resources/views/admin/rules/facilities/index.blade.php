@include('admin.sidenav');
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

    .panel .box {
        padding: 10px;
        background-color: #11101d;
        text-align: left;
        border-radius: 10px;
        display: block;
        max-width: 100%;
        gap: 20px;
    }

    .modal-backdrop {
        z-index: 0;
    }

    .custom-btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 5px;
    }

    .custom-btn-primary {
        background-color: #007bff;
        color: white;
    }

    .custom-btn-warning {
        background-color: #ffc107;
        color: black;
    }

    .custom-btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .custom-btn-secondary {
        background-color: #6c757d;
        color: white;
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
        background-color: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        margin: auto;
        padding: 20px;
        border-radius: 5px;
        width: 80%;
        max-width: 500px;
    }

    .modal-header, .modal-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header h5 {
        margin: 0;
    }

    .close {
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }

    .form-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 14px;
    }
    h5{
        color: white;
    }
    </style>

<section class="home-section" style="width: calc(100% - 58px); overflow: scroll">
    <div class="home-content" style="display: block;">
        <div class="panel">
            <h1>Manage Facilities</h1>
            <br><hr><br>
            <button class="custom-btn custom-btn-primary" onclick="openModal('addModal')">Add New Facility</button>
        
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Facility</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facilities as $facility)
                        <tr>
                            <td>{{ $facility->id }}</td>
                            <td>{{ $facility->facility }}</td>
                            <td>
                                <button class="custom-btn custom-btn-warning" onclick="openEditModal('{{ $facility->id }}', '{{ $facility->facility }}')">Edit</button>
                                <form action="{{ route('admin.facilities.destroy', $facility->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="custom-btn custom-btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Add Modal -->
            <div id="addModal" class="modal">
                <div class="modal-content">
                    <form action="{{ route('admin.facilities.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5>Add New Facility</h5>
                            <button type="button" class="close" onclick="closeModal('addModal')">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="facility">Facility</label>
                                <input type="text" class="form-control" name="facility" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="custom-btn custom-btn-secondary" onclick="closeModal('addModal')">Close</button>
                            <button type="submit" class="custom-btn custom-btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Edit Modal -->
            <div id="editModal" class="modal">
                <div class="modal-content">
                    <form action="" method="POST" id="editForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5>Edit Facility</h5>
                            <button type="button" class="close" onclick="closeModal('editModal')">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edit_facility">Facility</label>
                                <input type="text" class="form-control" name="facility" id="edit_facility" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="custom-btn custom-btn-secondary" onclick="closeModal('editModal')">Close</button>
                            <button type="submit" class="custom-btn custom-btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = 'flex';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    function openEditModal(id, facility) {
        var editModal = document.getElementById('editModal');
        document.getElementById('edit_facility').value = facility;
        document.getElementById('editForm').action = '/admin/facilities/' + id;
        openModal('editModal');
    }

    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = "none";
        }
    }
</script>
