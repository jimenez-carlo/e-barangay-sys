<style>
  .select2-container--default .select2-selection--single {
    height: 36px;
  }
</style>
<!-- Page Content-->
<div class="container px-4 px-lg-5 pt-5">
  <div class="row g-5">
    <div class="col-md-7 col-lg-12">
      <h4 class="mb-3"><i class="fa fa-user-plus"></i> Registration</h4>
      <p class="invalid-feedback" style="display: block;"></p>
      <form class="needs-validation" novalidate="" name="resident_register_landing">
        <div class="row g-3">
          <div class="col-sm-3">
            <label for="firstName" class="form-label">*Email</label>
            <input type="text" class="form-control" id="firstName" placeholder="Email Address" name="email" value="" required="">
          </div>
          <div class="col-sm-3">
            <label for="firstName" class="form-label">*Username</label>
            <input type="text" class="form-control" id="firstName" placeholder="Username" name="username" value="" required="">
          </div>
          <div class="col-sm-3">
            <label for="lastName" class="form-label">*Password</label>
            <input type="password" class="form-control" id="lastName" placeholder="Password" name="password" value="" required="">
          </div>
          <div class="col-sm-3">
            <label for="lastName" class="form-label">*Retype-Password</label>
            <input type="password" class="form-control" id="lastName" placeholder="Password" name="re_password" value="" required="">
          </div>
          <div class="col-sm-4">
            <label for="firstName" class="form-label">*First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="Firstname" name="first_name" value="" required="">
          </div>
          <div class="col-sm-4">
            <label for="lastName" class="form-label">*Middle name</label>
            <input type="text" class="form-control" id="lastName" placeholder="Middlename" name="middle_name" value="" required="">
          </div>
          <div class="col-sm-4">
            <label for="lastName" class="form-label">*Last name</label>
            <input type="text" class="form-control" id="lastName" placeholder="Lastname" name="last_name" value="" required="">
          </div>

          <div class="col-sm-4">
            <label for="firstName" class="form-label">*Birth Date</label>
            <input type="date" class="form-control" id="firstName" placeholder="Firstname" name="birth_date" value="" required="">
          </div>

          <div class="col-sm-4">
            <label for="lastName" class="form-label">*Birth Place</label>
            <input type="text" class="form-control" id="lastName" placeholder="Birth Place" name="birth_place" value="" required="">
          </div>

          <div class="col-md-4">
            <label for="country" class="form-label">Gender</label>
            <select class="form-select select2" id="country" required="" name="gender">
              <?php foreach ($default_data['gender'] as $res) { ?>
                <option value="<?= $res['id'] ?>"><?= strtoupper($res['gender']); ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="col-md-4">
            <label for="country" class="form-label">City</label>
            <select class="form-select select2 city" id="country" name="city">
              <?php foreach ($default_data['city'] as $res) { ?>
                <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="col-md-4">
            <label for="country" class="form-label">Barangay</label>
            <select class="form-select select2 barangay" id="barangay" name="barangay">
              <?php foreach ($default_data['barangay'] as $res) { ?>
                <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-4">
            <label for="country" class="form-label">House No</label>
            <input type="text" class="form-control" name="house_no" placeholder="House No">
          </div>
          <div class="col-4">
            <label for="address2" class="form-label">Street</label>
            <input type="text" class="form-control" id="address2" name="street" placeholder="Street">
          </div>
          <div class="col-md-4">
            <label for="country" class="form-label">Marital Status</label>
            <select class="form-select select2" name="marital_status">
              <?php foreach ($default_data['marital_status'] as $res) { ?>
                <option value="<?= $res['id'] ?>"><?= strtoupper($res['status']); ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-4">
            <label for="address2" class="form-label">Contact No</label>
            <input type="text" class="form-control" id="address2" placeholder="09XXXXXXXXX" name="contact_no">
          </div>
        </div>

        <br>
        <button class="w-100 btn btn-success btn-lg" type="submit" name="resident_register_landing">REGISTER <i class="fa fa-check"></i></button>
      </form>
    </div>
  </div>
</div>
<br>

<script>
  // $('.datepicker').datepicker({
  //   autoclose: true,
  //   format: 'yyyy-mm-dd',
  // }).datepicker("setDate", 'now');

  $('.select2').select2();

  $(".city").on('change', function(e) {
    dropdown_with_default('barangay', "tbl_barangay", "city_id", $(this).val(), "name", "id", $(this).val());
  });
</script>