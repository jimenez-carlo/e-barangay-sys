<section class="content-header">
  <h1>
    <i class="fa fa-user-plus"></i>
    Create Member
  </h1>
</section>
<form role="form" name="member_register" enctype="multipart/form-data">
  <section class="content">
    <div class="row">
      <div class="col-md-9">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-user-circle"></i>
            <h4 class="box-title">Barangay Official Information</h4>
          </div>
          <div class="box-body">
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*First Name:</label>
              <input type="text" class="form-control" placeholder="First name" name="first_name">
            </div>
            <div class="form-group col-xs-2">
              <label for="exampleInputPassword1">*Middle Name:</label>
              <input type="text" class="form-control" placeholder="Middle name" name="middle_name">
            </div>
            <div class="form-group col-xs-2">
              <label for="exampleInputPassword1">Suffix:</label>
              <select class="form-control" name="suffix">
                <?php foreach ($default_data['suffix'] as $res) { ?>
                  <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Last Name:</label>
              <input type="text" class="form-control" placeholder="Last name" name="last_name">
            </div>

            <div class="form-group col-xs-4">
              <label>*Birth Date:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="birth_date" placeholder="Birth Date">
              </div>
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Birth Place:</label>
              <input type="text" class="form-control" placeholder="Birth Place" name="birth_place">
            </div>

            <div class="form-group col-xs-4">
              <label>*Gender:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-venus-mars"></i>
                </div>
                <select class="form-control" name="gender">
                  <?php foreach ($default_data['gender'] as $res) { ?>
                    <option value="<?= $res['id'] ?>"><?= strtoupper($res['gender']); ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*City:</label>
              <select class="form-control select2 city" name="city" disabled>
                <?php foreach ($default_data['city'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?= ($res['id'] == '137607') ? 'selected' : '' ?>><?= strtoupper($res['name']); ?></option>
                <?php } ?>
              </select>
              <input type="hidden" value=" <?= '137607' ?>" name="city">
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*House No#:</label>
              <input type="text" class="form-control" placeholder="House No#" name="house_no">
            </div>


            <div class="form-group col-xs-2">
              <label for="exampleInputPassword1">*Marital Status:</label>
              <select class="form-control" name="marital_status">
                <?php foreach ($default_data['marital_status'] as $res) { ?>
                  <option value="<?= $res['id'] ?>"><?= strtoupper($res['status']); ?></option>
                <?php } ?>
              </select>
            </div>


            <div class="form-group col-xs-2">
              <label for="exampleInputPassword1">*Religion:</label>
              <select class="form-control select2" name="religion">
                <?php foreach ($default_data['religion'] as $res) { ?>
                  <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Barangay:</label>
              <select class="form-control select2" name="barangay" id="barangay">
                <?php foreach ($default_data['barangay'] as $res) { ?>
                  <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Street:</label>
              <textarea class="form-control" row="10" name="street" placeholder="Street Here..."></textarea>
            </div>

            <div class="form-group col-xs-2">
              <label>*Contact No:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input type="number" maxlength="11" class="form-control pull-right" name="contact_no" placeholder="09XXXXXXXXX">
              </div>
            </div>

            <div class="form-group col-xs-2">
              <label for="exampleInputPassword1">*Nationality:</label>
              <select class="form-control select2" name="nationality">
                <?php foreach ($default_data['nationality'] as $res) { ?>
                  <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
                <?php } ?>
              </select>
            </div>

          </div>
          <div class="modal-footer" style="min-height:133px">
          </div>
        </div>
      </div>
      <div class="col-xs-3">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-user-circle"></i>
            <h4 class="box-title">Profile Picture</h4>
          </div>
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php BASE_URL; ?>files/profile/default.jpg" alt="User profile picture" style="height: 100px;width: 135px;" id="preview">
            <p class=" text-muted text-center"></p>

            <div class="form-group col-xs-12">
              <label for="img-input">Photo </label> <br>
              <button type="button" class="btn btn-sm btn-success btn-flat btn-select-images"><i class="fa fa-picture-o"> </i> Select Image</button>
              <input type="file" name="image" accept="image/*" id="images">
            </div>

            <div class="form-group col-xs-12">
              <label for="img-input">Username: </label> <br>
              <input type="text" class="form-control" placeholder="Username" name="username">
            </div>

            <div class="form-group col-xs-12">
              <label for="img-input">Email Address:</label> <br>
              <input type="text" class="form-control" placeholder="Email Address" name="email">
            </div>

            <div class="col-xs-12">
              <label for="img-input">Position:</label> <br>
              <select class="form-control" name="position">
                <?php foreach ($default_data['barangay_positions'] as $res) { ?>
                  <option value="<?= $res['id'] ?>"><?= strtoupper($res['title']); ?></option>
                <?php } ?>
              </select>
            </div>


          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success btn-flat" name="member_register"><i class="fa fa-save"></i> Save</button>
          </div>
        </div>
      </div>
    </div>


  </section>
</form>
<script>
  $(".btn-select-images").on('click', function(e) {
    $('#images').trigger('click');
  });

  var img = document.getElementById("images");
  var preview = document.getElementById("preview");

  img.onchange = evt => {
    const [file] = img.files
    if (file) {
      preview.src = URL.createObjectURL(file)
    }
  }

  $('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
  }).datepicker("setDate", 'now');

  $('.select2').select2();

  $(".city").on('change', function(e) {
    dropdown_with_default('barangay', "tbl_barangay", "city_id", $(this).val(), "name", "id", '137607');
  });

  $(document).ready(function() {
    dropdown_with_default('barangay', "tbl_barangay", "city_id", "137607", "name", "id", null);
  });
</script>