<style>
  .select2-container--default .select2-selection--single {
    height: 36px;
  }
</style>



<!-- Page Content-->
<form class="needs-validation" novalidate="" name="resident_register_landing">
  <div class="container px-4 px-lg-5 pt-5">
    <div class="row g-5">
      <div class="col-md-7 col-lg-12">

        <div class="card">
          <div class="card-header text-center">
            <h2>Registration</h2>
          </div>
          <div class="card-body fw-bold">
            <p class="invalid-feedback" style="display: block;"></p>

            <fieldset>
              <legend>
                <h4>Location</h4>
              </legend>
              <div class="row">
                <div class="col-md-6">
                  <label for="country" class="form-label">City <span class="text-danger">*</span></label>
                  <select class="form-select select2 city" id="country" name="city">
                    <option value="0" selected>Select City</option>
                    <?php foreach ($default_data['city'] as $res) { ?>
                      <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="country" class="form-label">Barangay <span class="text-danger">*</span></label>
                  <select class="form-select select2 barangay" id="barangay" name="barangay">
                    <option value="0" selected>Select Barangay</option>
                    <?php foreach ($default_data['barangay'] as $res) { ?>
                      <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="country" class="form-label">House No <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="house_no" placeholder="House No">
                </div>
                <div class="col-6">
                  <label for="address2" class="form-label">Street <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="address2" name="street" placeholder="Street">
                </div>
              </div>
            </fieldset>

            <fieldset>
              <legend>
                <h4>Personal Information</h4>
              </legend>
              <div class="row g-3">
                <div class="col-sm-4">
                  <label for="firstName" class="form-label">Username <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="firstName" placeholder="Username" name="username" value="" required="">
                </div>
                <div class="col-sm-4">
                  <label for="lastName" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="lastName" placeholder="Password" name="password" value="" required="">
                </div>
                <div class="col-sm-4">
                  <label for="lastName" class="form-label">Retype-Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="lastName" placeholder="Password" name="re_password" value="" required="">
                </div>
                <div class="col-sm-4">
                  <label for="firstName" class="form-label">First name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="firstName" placeholder="Firstname" name="first_name" value="" required="">
                </div>
                <div class="col-sm-4">
                  <label for="lastName" class="form-label">Middle name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="lastName" placeholder="Middlename" name="middle_name" value="" required="">
                </div>
                <div class="col-sm-4">
                  <label for="lastName" class="form-label">Last name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="lastName" placeholder="Lastname" name="last_name" value="" required="">
                </div>
                <div class="col-sm-4">
                  <label for="firstName" class="form-label">Suffix</label>
                  <select class="form-select" name="suffix">

                    <?php foreach ($default_data['suffix'] as $res) { ?>
                      <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label for="firstName" class="form-label">Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="firstName" placeholder="Email Address" name="email" value="" required="">
                </div>

                <div class="col-sm-4">
                  <label for="firstName" class="form-label">Birth Date <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="firstName" placeholder="Firstname" name="birth_date" value="" required="">
                </div>

                <div class="col-sm-4">
                  <label for="lastName" class="form-label">Birth Place <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="lastName" placeholder="Birth Place" name="birth_place" value="" required="">
                </div>

                <div class="col-md-4">
                  <label for="country" class="form-label">Gender</label>
                  <select class="form-select" id="country" required="" name="gender">
                    <?php foreach ($default_data['gender'] as $res) { ?>
                      <option value="<?= $res['id'] ?>"><?= strtoupper($res['gender']); ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="country" class="form-label">Marital Status</label>
                  <select class="form-select" name="marital_status">
                    <?php foreach ($default_data['marital_status'] as $res) { ?>
                      <option value="<?= $res['id'] ?>"><?= strtoupper($res['status']); ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="religion" class="form-label">Nationality <span class="text-danger">*</span></label>
                  <select class="form-select select2" id="nationality" name="nationality">
                    <option value="0" selected>Select Nationality</option>
                    <?php foreach ($default_data['nationality'] as $res) { ?>
                      <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="religion" class="form-label">Religion <span class="text-danger">*</span></label>
                  <select class="form-select select2" id="religion" name="religion">
                    <option value="0" selected>Select Religion</option>
                    <?php foreach ($default_data['religion'] as $res) { ?>
                      <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-4">
                  <label for="address2" class="form-label">Contact No <span class="text-danger">*</span></label>
                  <input type="number" maxlength="11" class="form-control" id="address2" placeholder="09XXXXXXXXX" name="contact_no">
                </div>
                <div class="col-sm-4">
                  <label for="firstName" class="form-label">Date Of Residency <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="residency_date" placeholder="" name="residency_date" value="" required="">
                </div>
                <div class="col-12">
                  <label for="address2" class="form-label">ID Attached <span class="text-danger">*</span></label>
                  <input type="file" name="file" required class="form-control">
                  <br>
                </div>
                <div class="col-12" style="font-weight:500">
                  <h3>Data Privacy</h3>
                  By completing this form, I give permission for my data to be held in the E-barangay system database and agree that the system may process personal data relating to me for personnel, administration and/or management purposes.
                </div>
                <div class="col-12">
                  <input type="checkbox" name="terms" required> I have read, understood, and accepted the Data Privacy.
                </div>
              </div>
          </div>
          </fieldset>

          <br>
          <button class="w-100 btn btn-success btn-lg" type="submit" name="resident_register_landing">REGISTER <i class="fa fa-check"></i></button>
        </div>
      </div>
    </div>
  </div>
  </div>
  <br>
</form>

<script>
  // $('.datepicker').datepicker({
  //   autoclose: true,
  //   format: 'yyyy-mm-dd',
  // }).datepicker("setDate", 'now');
  $('input[type="date"]').val('<?php echo date('Y-m-d'); ?>');
  $('.select2').select2();

  $(".city").on('change', function(e) {
    dropdown_with_default('barangay', "tbl_barangay", "city_id", $(this).val(), "name", "id", $(this).val());
  });

  $(document).ready(function() {
    // dropdown_with_default('barangay', "tbl_barangay", "city_id", "137607", "name", "id", "137607002");
  });
</script>
<style>
  legend {
    text-align: center;
  }

  legend>* {
    border: 1px solid rgba(0, 0, 0, 0.125);
    display: block;
    width: 50%;
    margin-top: -12px;
    margin-left: auto;
    margin-right: auto;
    padding: 0px 1rem;
    background: #198754;
    color: white;
    /* border-radius: 25px; */
    font-size: 16px;
  }

  fieldset {
    border: 1px solid rgba(0, 0, 0, 0.125);
    padding-left: 1rem;
    padding-right: 1rem;
    padding-bottom: 1rem;
    margin-top: 20px;
  }
</style>