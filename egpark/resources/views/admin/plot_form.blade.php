{{-- resources\views\admin\plot_form.blade.php --}}
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
      border-radius: 10px;
      color: white;
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

  form input,
  form select,
  textarea.input__field--textarea {
      width: 100%;
      padding: 12px 16px;
      border-radius: 8px;
      color: #fff;
      font-family: inherit;
      background-color: transparent;
      border: 1px solid #414141;
  }

  .button1 {
      background: #00BF63;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 8px;
      transition: background 0.3s;
  }

  .button1:hover {
      background: #C1FF72;
      color: #000;
      font-weight: bold;
  }

  @media screen and (max-width: 1000px) {
      .modal {
          left: 25px;
      }
  }
  option{
    background: #1d1b31;
  }
</style>

<div class="form-group">
    <label for="block_no">Block No</label>
    <input type="number" name="block_no" class="form-control" id="block_no" value="{{ old('block_no', $plot->block_no ?? '') }}">
</div>
<div class="form-group">
    <label for="plot_number">Plot Number</label>
    <input type="text" name="plot_number" class="form-control" id="plot_number" value="{{ old('plot_number', $plot->plot_number ?? '') }}">
</div>
<div class="form-group">
    <label for="lot_owner">Lot Owner</label>
    <input type="text" name="lot_owner" class="form-control" id="lot_owner" value="{{ old('lot_owner', $plot->lot_owner ?? '') }}">
</div>
<div class="form-group">
    <label for="owner_address">Owner Address</label>
    <input type="text" name="owner_address" class="form-control" id="owner_address" value="{{ old('owner_address', $plot->owner_address ?? '') }}">
</div>
<div class="form-group">
    <label for="contact_number">Contact Number</label>
    <input type="text" name="contact_number" class="form-control" id="contact_number" value="{{ old('contact_number', $plot->contact_number ?? '') }}">
</div>
<div class="form-group">
    <label for="status">Status</label>
    <input type="text" name="status" class="form-control" id="status" value="{{ old('status', $plot->status ?? '') }}">
</div>
<div class="form-group">
    <label for="occupant_name">Occupant Name</label>
    <input type="text" name="occupant_name" class="form-control" id="occupant_name" value="{{ old('occupant_name', $plot->occupant_name ?? '') }}">
</div>
<div class="form-group">
    <label for="occupant_address">Occupant Address</label>
    <input type="text" name="occupant_address" class="form-control" id="occupant_address" value="{{ old('occupant_address', $plot->occupant_address ?? '') }}">
</div>
<div class="form-group">
    <label for="gender">Gender</label>
    <input type="text" name="gender" class="form-control" id="gender" value="{{ old('gender', $plot->gender ?? '') }}">
</div>
<div class="form-group">
    <label for="age">Age</label>
    <input type="number" name="age" class="form-control" id="age" value="{{ old('age', $plot->age ?? '') }}">
</div>
<div class="form-group">
    <label for="interment_date">Interment Date</label>
    <input type="date" name="interment_date" class="form-control" id="interment_date" value="{{ old('interment_date', $plot->interment_date ?? '') }}">
</div>
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control-file" id="image">
    @if(isset($plot) && $plot->image)
        <img src="{{ asset('storage/' . $plot->image) }}" alt="Plot Image" width="50" height="50">
    @endif
</div>
