<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blocks and Plots</title>
    <style>
        .block {
            display: inline-block;
            margin: 10px;
            cursor: pointer;
            text-align: center;
            line-height: 100px;
            color: #fff;
            font-size: 18px;
        }
        .block1 { width: 100px; height: 100px; background-color: #3498db; }
        .block2 { width: 120px; height: 80px; background-color: #e74c3c; }
        /* Reduced blocks to 2 */

        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 80%;
            max-width: 600px;
        }
        .plot {
            width: 50px;
            height: 50px;
            border: 1px solid #000;
            display: inline-block;
            margin: 5px;
            text-align: center;
            line-height: 50px;
            background-color: #e0e0e0;
            cursor: pointer;
        }
        .plot:hover {
            background-color: #ccc;
        }
        .plot-details {
            margin-top: 20px;
        }
        .plot-image {
            max-width: 100%;
            height: auto;
        }
        .alert {
            display: none;
            padding: 15px;
            margin: 10px;
            border-radius: 5px;
            color: #fff;
            background-color: #e74c3c;
            text-align: center;
        }
        .active { background-color: red !important; }
        .block.active {
            background-color: red !important;
        }

        .plot.active {
            background-color: red !important;
        }
    </style>
</head>
<body>
    <input type="text" id="searchBar" placeholder="Search by Occupant Name" onkeyup="searchPlots()">
    <div id="alertDiv" class="alert"></div>
    <div id="block1" class="block block1" onclick="openBlockModal('block1Modal')">Block 1</div>
    <div id="block2" class="block block2" onclick="openBlockModal('block2Modal')">Block 2</div>
    
    <!-- Block 1 Modal -->
    <div id="block1Modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('block1Modal')">&times;</span>
            <div>
                <div class="plot plot-1-1" onclick="showPlotDetails(1, '1')">Plot 1</div>
                <div class="plot plot-1-2" onclick="showPlotDetails(1, '2')">Plot 2</div>
            </div>
        </div>
    </div>

    <!-- Block 2 Modal -->
    <div id="block2Modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('block2Modal')">&times;</span>
            <div>
                <div class="plot plot-2-1" onclick="showPlotDetails(2, '1')">Plot 1</div>
                <div class="plot plot-2-2" onclick="showPlotDetails(2, '2')">Plot 2</div>
                <div class="plot plot-2-3" onclick="showPlotDetails(2, '3')">Plot 3</div>
            </div>
        </div>
    </div>

    <!-- Plot Details Modal -->
    <div id="plotDetailsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('plotDetailsModal')">&times;</span>
            <div id="plotDetails">
                <h2>Plot Details</h2>
                <div class="plot-details">
                    <p id="detailsBlockNo"></p>
                    <p id="detailsPlotNo"></p>
                    <p id="detailsOccupantName"></p>
                    <p id="detailsOwnerAddress"></p>
                    <p id="detailsContactNumber"></p>
                    <p id="detailsStatus"></p>
                    <p id="detailsGender"></p>
                    <p id="detailsAge"></p>
                    <p id="detailsIntermentDate"></p>
                    <img id="detailsImage" class="plot-image" alt="Plot Image">
                </div>
            </div>
        </div>
    </div>
    <script>
        function openBlockModal(modalId) {
            document.querySelectorAll('.modal').forEach(m => {
                if (m.id !== modalId && m.id !== 'plotDetailsModal') {
                    m.style.display = 'none';
                }
            });
            document.querySelectorAll('.block').forEach(b => b.classList.remove('active'));
            document.getElementById(modalId).style.display = 'flex';
            document.querySelector(`.${modalId.replace('Modal', '')}`).classList.add('active');
        }

        function openPlotDetailsModal() {
            document.getElementById('plotDetailsModal').style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
            if (modalId.startsWith('block')) {
                document.querySelector(`.${modalId.replace('Modal', '')}`).classList.remove('active');
            }
        }

        function showPlotDetails(blockNumber, plotNumber) {
            fetch(`/get-plot-details/${blockNumber}/${plotNumber}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        showAlert('Plot not found');
                    } else {
                        document.getElementById('detailsBlockNo').textContent = 'Block No: ' + data.block_no;
                        document.getElementById('detailsPlotNo').textContent = 'Plot No: ' + data.plot_number;
                        document.getElementById('detailsOccupantName').textContent = 'Occupant Name: ' + data.occupant_name;
                        document.getElementById('detailsOwnerAddress').textContent = 'Owner Address: ' + data.owner_address;
                        document.getElementById('detailsContactNumber').textContent = 'Contact Number: ' + data.contact_number;
                        document.getElementById('detailsStatus').textContent = 'Status: ' + data.status;
                        document.getElementById('detailsGender').textContent = 'Gender: ' + data.gender;
                        document.getElementById('detailsAge').textContent = 'Age: ' + data.age;
                        document.getElementById('detailsIntermentDate').textContent = 'Interment Date: ' + data.interment_date;
                        document.getElementById('detailsImage').src = data.image;
                        openPlotDetailsModal();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('An error occurred while fetching plot details');
                });
        }

        function searchPlots() {
            const occupantName = document.getElementById('searchBar').value;

            fetch(`/search-plots?occupant_name=${encodeURIComponent(occupantName)}`)
                .then(response => response.json())
                .then(data => {
                    console.log('Search results:', data);
                    resetHighlights(); // Clear previous highlights

                    if (data.error) {
                        showAlert('No plots found');
                    } else {
                        data.forEach(plot => {
                            console.log('Processing plot:', plot);
                            // Add active class to the block
                            document.querySelector(`.block${plot.block_no}`).classList.add('active');

                            // Add active class to the plot
                            document.querySelector(`.plot-${plot.block_no}-${plot.plot_number}`).classList.add('active');
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('An error occurred while searching for plots');
                });
        }

        function resetHighlights() {
            document.querySelectorAll('.block').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.plot').forEach(p => p.classList.remove('active'));
        }

        function showAlert(message) {
            const alertDiv = document.getElementById('alertDiv');
            alertDiv.textContent = message;
            alertDiv.style.display = 'block';
            setTimeout(() => {
                alertDiv.style.display = 'none';
            }, 5000);
        }
    </script>
</body>
</html>
