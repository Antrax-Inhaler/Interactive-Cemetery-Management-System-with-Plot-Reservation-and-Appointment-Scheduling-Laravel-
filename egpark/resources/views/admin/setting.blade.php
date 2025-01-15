@include('admin.sidenav');
<section class="home-section" style="width: calc(100% - 58px); overflow: auto;">
    <div class="home-content" style="display: block;">
        <div class="panel">
            <h1 style="text-align: left;">Settings</h1>
            <hr><br>

            <!-- Settings buttons -->
            <div class="box">
              <h3>Edit Pricing</h3> <br>
                <button class="button1" id="openLawnLotModalBtn">
                    <span class="button-content">Lawn Lot</span>
                </button> <br> <br>
                <button class="button1" id="openMausoleumLotModalBtn">
                    <span class="button-content">Mausoleum Lot</span>
                </button><br> <br>
                <button class="button1" id="openOthersModalBtn">
                    <span class="button-content">Others</span>
                </button>
            </div> <br>
            <div class="box">
                <h3>Manage Rules</h3> <br>
                <button class="button1" onclick="window.location.href='{{ route('admin.reverence_safety.index') }}'">
                    <span class="button-content">Reverence & Safety Rules</span>
                </button> <br> <br>
                
                <button class="button1" onclick="window.location.href='{{ route('admin.flowers_decoration.index') }}'">
                    <span class="button-content">Flowers & Decoration Rules</span>
                </button><br> <br>
                
                <button class="button1" onclick="window.location.href='{{ route('admin.rule_headers.index') }}'">
                    <span class="button-content">Rule Headers</span>
                </button>
                
            </div> <br>
            <style>
                .button {
                    display: inline-block;
                    padding: 10px 20px;
                    margin: 5px;
                    background-color: #007bff;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    text-align: center;
                }
            
                .button:hover {
                    background-color: #0056b3;
                }
            </style>
            
            <div class="box">
            <h3>Others</h3> <br>
            <button class="button1" id="openReservationModalBtn" onclick="window.location.href='{{ route('admin.facilities.index') }}'">
                <span class="button-content">Edit Reservation</span>
            </button><br> <br>
            <button class="button1" id="openLandingModalBtn">
                <span class="button-content">Edit Landing Page</span>
            </button><br><br>
            <button class="button1" id="openDashboardDropdownBtn">
                <span class="button-content">Edit User Dashboard</span>
            </button><br><br>
            
            <!-- Dashboard Dropdown for Edit Buttons -->
            <div id="dashboardDropdown" style="display: none;">
                @foreach ($places as $place)
                    <a href="#" data-place-id="{{ $place->id }}" class="editPlaceButton button">
                        Edit {{ $place->title }}
                    </a><br><br>
                @endforeach
            </div>
            
            
        </div> <br>

        </div>
    </div>
</section>
<!-- Edit Place Modal -->
<div id="editPlaceModal" class="modal">
    <div class="modal-content">
        <span class="closeBtn">&times;</span>
        <h3>Edit Place</h3>
        <form id="editPlaceForm" action="{{ route('admin.update.place', ['id' => $place->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- This specifies that the form should be treated as a PUT request -->
            <input type="hidden" name="place_id" id="placeId">
            
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" id="placeTitle" required>
            </div><br>
        
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="placeDescription" required></textarea>
            </div><br>
        
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image">
                <img id="placeImagePreview" src="" alt="Current Image" style="max-width: 100%; margin-top: 10px;">
            </div><br>
        
            <div class="imgbox">
                <button type="submit" class="button">
                    <span class="button-content">Save</span>
                </button>
            </div>
        </form>
        
    </div>
</div>

<!-- Lawn Lot Modal -->
<div id="LawnLotModal" class="modal">
    <div class="modal-content">
        <span class="closeBtn">&times;</span>
        <form action="{{ route('admin.update.lawn.lot.price') }}" method="POST">
            @csrf
            <h3 style="color:#00BF63;"> Edit Lawn Lot</h3><br>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" value="{{ $lawnLotPrice->price }}" required>
            </div><br>

            <div class="form-group">
                <label>Size</label>
                <input type="text" name="size" value="{{ $lawnLotPrice->size }}" required>
            </div><br>

            <div class="form-group">
                <label>Downpayment</label>
                <input type="number" name="downpayment" value="{{ $lawnLotPrice->downpayment }}" required>
            </div><br>

            <div class="form-group">
                <label>Installment</label>
                <input type="text" name="installment" value="{{ $lawnLotPrice->installment }}" required>
            </div><br>

            <div class="form-group">
                <label>Discount for cash basis</label>
                <input type="number" name="discount_for_cash_basis" value="{{ $lawnLotPrice->discount_for_cash_basis }}" required>
            </div><br>

            <div class="imgbox">
                <button type="submit" class="button">
                    <span class="button-content">Save</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Mausoleum Lot Modal -->
<div id="MausoleumLotModal" class="modal">
    <div class="modal-content">
        <span class="closeBtn">&times;</span>
        <form action="{{ route('admin.update.mausoleum.lot.price') }}" method="POST">
            @csrf
            <h3 style="color:#00BF63;">Edit Mausoleum Lot</h3><br>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" value="{{ $mausoleumLotPrice->price }}" required>
            </div><br>

            <div class="form-group">
                <label>Size</label>
                <input type="text" name="size" value="{{ $mausoleumLotPrice->size }}" required>
            </div><br>

            <div class="form-group">
                <label>Downpayment</label>
                <input type="number" name="downpayment" value="{{ $mausoleumLotPrice->downpayment }}" required>
            </div><br>

            <div class="form-group">
                <label>Installment</label>
                <input type="text" name="installment" value="{{ $mausoleumLotPrice->installment }}" required>
            </div><br>

            <div class="form-group">
                <label>Discount for cash basis</label>
                <input type="number" name="discount_for_cash_basis" value="{{ $mausoleumLotPrice->discount_for_cash_basis }}" required>
            </div><br>

            <div class="imgbox">
                <button type="submit" class="button">
                    <span class="button-content">Save</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Interment Service Modal -->
<div id="IntermentServiceModal" class="modal">
    <div class="modal-content">
        <span class="closeBtn">&times;</span>
        <form action="{{ route('admin.update.interment.service') }}" method="POST">
            @csrf
            <h3 style="color:#00BF63;">Edit Interment Service</h3><br>
            <div class="form-group">
                <label>Price for Non-Senior</label>
                <input type="number" name="price_for_non_senior" value="{{ $intermentService->price_for_non_senior }}" required>
            </div><br>

            <div class="form-group">
                <label>Price for Senior</label>
                <input type="number" name="price_for_senior" value="{{ $intermentService->price_for_senior }}" required>
            </div><br>

            <div class="form-group">
                <label>Price for Transfer of Bones</label>
                <input type="number" name="price_for_transfer_of_bones" value="{{ $intermentService->price_for_transfer_of_bones }}" required>
            </div><br>

            <div class="imgbox">
                <button type="submit" class="button">
                    <span class="button-content">Save</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Landing Page Modal -->
<div id="landingModal" class="modal">
    <div class="modal-content">
        <span class="closeBtn">&times;</span>
        <h2>Edit Landing Page</h2>
        <form action="{{ route('admin.landing.page.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 style="color:#fff;">Change Logo</h4><br>
            <div class="imgbox">
                <img src="{{ asset('storage/' . $landingPage->logo) }}" alt="">
            </div>
            <div class="form-group">
                <label>Upload new logo</label>
                <input type="file" name="logo">
            </div><br>

            <h4 style="color:#fff;">Update Details</h4><br>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" value="{{ $landingPage->address }}">
            </div><br>

            <div class="form-group">
                <label>Contact</label>
                <input type="number" name="contact" value="{{ $landingPage->contact }}">
            </div><br>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ $landingPage->email }}">
            </div><br>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="input__field input__field--textarea" name="description">{{ $landingPage->description }}</textarea>
            </div><br>

            <div class="imgbox">
                <button class="button" type="submit">
                    <span class="button-content">Save</span>
                </button>
            </div>
        </form>
    </div>
</div>


<script>
   document.getElementById('openLawnLotModalBtn').onclick = function() {
    document.getElementById('LawnLotModal').style.display = 'block';
}
document.getElementById('openMausoleumLotModalBtn').onclick = function() {
    document.getElementById('MausoleumLotModal').style.display = 'block';
}
document.getElementById('openOthersModalBtn').onclick = function() {
    document.getElementById('IntermentServiceModal').style.display = 'block';
}
document.getElementById('openLandingModalBtn').addEventListener('click', function() {
    document.getElementById('landingModal').style.display = 'block';
});

// Handle opening and closing modals
document.querySelectorAll('.editPlaceButton').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var placeId = this.getAttribute('data-place-id');
        
        // Fetch the place details using an AJAX request or populate from the existing data
        fetch(`/admin/get-place/${placeId}`)
            .then(response => response.json())
            .then(data => {
                // Populate the modal with the place data
                document.getElementById('placeId').value = data.id;
                document.getElementById('placeTitle').value = data.title;
                document.getElementById('placeDescription').value = data.description;
                document.getElementById('placeImagePreview').src = `/storage/${data.image}`;
                
                // Display the modal
                document.getElementById('editPlaceModal').style.display = 'block';
            });
    });
});

// Close modals when clicking outside
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
}

// Close modals when clicking on the close button
document.querySelectorAll('.closeBtn').forEach(function(btn) {
    btn.onclick = function() {
        btn.parentElement.parentElement.style.display = 'none';
    }
});

document.getElementById('openDashboardDropdownBtn').onclick = function() {
    var dropdown = document.getElementById('dashboardDropdown');
    dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
};




</script>

<style>
    .imgbox img{
      width: 100%;
    }

    .button1, .button, .button-red {
        width: 100%;
        position: relative;
        overflow: hidden;
        height: 2rem;
        padding: 0 2rem;
        background-size: 400%;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .button1 {
        background: #00BF63;
    }

    .button1:hover {
        color: #000;
        font-weight: bold;
    }

    .button1:hover::before,
    .button-red:hover::before {
        transform: scaleX(1);
    }

    .button-content {
        position: relative;
        z-index: 1;
    }

    .button1::before,
    .button-red::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        transform: scaleX(0);
        transform-origin: 0 50%;
        width: 100%;
        height: inherit;
        border-radius: inherit;
        transition: all 0.475s;
    }

    .button1::before {
        background: #C1FF72;
    }

    .button-red1 {
        background: red;
    }

    .button-red2 {
        position: relative;
        z-index: 1;
    }

    .button-red1::before {
        background: darkred;
    }

    p {
        color: #717171;
    }

    h2 {
        color: #00BF63;
        text-align: center;
    }

    form {
        text-align: center;
        padding: 10px;
        background-color: #11101d;
        text-align: left;
        border-radius: 10px;
        display: block;
        max-width: 100%;
        gap: 20px;
    }

    form label {
        display: block;
        margin-bottom: 5px;
        color: #717171;
        font-weight: 600;
        font-size: 12px;
    }

    form input, textarea.input__field--textarea {
        width: 100%;
        padding: 12px 16px;
        border-radius: 8px;
        color: #fff;
        font-family: inherit;
        background-color: transparent;
        border: 1px solid #414141;
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
        background-color: rgba(0, 0, 0, 0.4);
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

    @media screen and (max-width: 1000px) {
        .modal {
            left: 25px;
        }
    }
</style>
<script src="/js/scripts.js"></script>
<style>
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
    }
  
    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
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
  