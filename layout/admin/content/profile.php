<section class="content-header">
  <h1>
    <i class="fa fa-edit"></i>
    My Profile
  </h1>
</section>
<form role="form" name="admin_profile_update" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $data->id; ?>">
  <section class="content">
    <div class="row">
      <div class="col-md-9">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-user-circle"></i>
            <h4 class="box-title">Member Information</h4>
          </div>

          <div class="box-body">
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*First Name:</label>
              <input type="text" class="form-control" placeholder="First name" name="first_name" value="<?= $data->first_name; ?>">
            </div>
            <div class="form-group col-xs-2">
              <label for="exampleInputPassword1">*Middle Name:</label>
              <input type="text" class="form-control" placeholder="Middle name" name="middle_name" value="<?= $data->middle_name; ?>">
            </div>
            <div class="form-group col-xs-2">
              <label for="exampleInputPassword1">Suffix:</label>
              <select class="form-control" name="suffix">
                <?php foreach ($default_data['suffix'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->suffix_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['name']); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Last Name:</label>
              <input type="text" class="form-control" placeholder="Last name" name="last_name" value="<?= $data->last_name; ?>">
            </div>

            <div class="form-group col-xs-4">
              <label>*Birth Date:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="birth_date" placeholder="Birth Date" value="<?= $data->birth_date; ?>">
              </div>
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Birth Place:</label>
              <input type="text" class="form-control" placeholder="Birth Place" name="birth_place" value="<?= $data->birth_place; ?>">
            </div>

            <div class="form-group col-xs-4">
              <label>*Gender:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-venus-mars"></i>
                </div>
                <select class="form-control" name="gender">
                  <?php foreach ($default_data['gender'] as $res) { ?>
                    <option value="<?= $res['id'] ?>" <?php echo ($data->gender_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['gender']); ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>


            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*City:</label>
              <select class="form-control select2 city" name="city">
                <?php foreach ($default_data['city'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->city_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['name']); ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*House No#:</label>
              <input type="text" class="form-control" placeholder="House No#" name="house_no" value="<?= $data->house_no; ?>">
            </div>


            <div class="form-group col-xs-2">
              <label for="exampleInputPassword1">*Marital Status:</label>
              <select class="form-control" name="marital_status">
                <?php foreach ($default_data['marital_status'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->marital_status_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['status']); ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-xs-2">
              <label for="exampleInputPassword1">*Religion:</label>
              <input type="text" class="form-control" placeholder="Religion" name="religion" value="<?= $data->religion; ?>">
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Barangay:</label>
              <select class="form-control select2" name="barangay" id="barangay">
                <?php foreach ($default_data['barangay'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->barangay_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['name']); ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Street:</label>
              <textarea class="form-control" row="10" name="street" placeholder="Street Here..."><?= $data->street; ?></textarea>
            </div>

            <div class="form-group col-xs-4">
              <label>*Contact No:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input type="number" maxlength="11" class="form-control pull-right" name="contact_no" placeholder="09XXXXXXXXX" value="<?= $data->contact_no; ?>" name="start_date">
              </div>
            </div>

          </div>
          <div class="modal-footer" style="min-height:93px">
            <div class="form-group col-xs-4">
              <div class="input-group date">
                <div class="input-group-addon">
                  Old Password:
                </div>
                <input type="password" class="form-control pull-right" name="old_password" placeholder="Old Password" name="old_password">
              </div>
            </div>
            <div class="form-group col-xs-4">
              <div class="input-group date">
                <div class="input-group-addon">
                  New Password:
                </div>
                <input type="password" class="form-control pull-right" name="new_password" placeholder="New Password" name="new_password">
              </div>
            </div>
            <div class="form-group col-xs-4">
              <button type="submit" class="btn btn-sm btn-success btn-flat" name="admin_profile_update" value="password" style="float:left"><i class="fa fa-save"></i> Change Password</button>
            </div>

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
            <img class="profile-user-img img-responsive img-circle" src="<?php BASE_URL; ?>files/profile/<?= $data->image; ?>" alt="User profile picture" style="height: 100px;width: 135px;" id="preview">
            <p class=" text-muted text-center">Registered Since <?= format_date(strtok($data->created_date, " ")); ?></p>

            <div class="form-group col-xs-12">
              <label for="img-input">Photo </label> <br>
              <button type="button" class="btn btn-sm btn-success btn-flat btn-select-images"><i class="fa fa-picture-o"> </i> Select Image</button>
              <input type="file" name="image" accept="image/*" id="images">
            </div>

            <div class="form-group col-xs-12">
              <label for="img-input">Username: </label> <br>
              <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $data->username; ?>">
            </div>

            <div class="form-group col-xs-12">
              <label for="img-input">Email Address:</label> <br>
              <input type="text" class="form-control" placeholder="Email Address" name="email" value="<?= $data->email; ?>">
            </div>

            <div class="col-xs-12">
              <label for="img-input">Position:</label> <br>
              <select class="form-control" name="position">
                <?php foreach ($default_data['barangay_positions'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->barangay_position_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['title']); ?></option>
                <?php } ?>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success btn-flat" name="admin_profile_update" value="profile"><i class="fa fa-save"></i> Update</button>
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

  $(function() {
    $('table').DataTable({
      'paging': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': true,
      'aaSorting': [], // disabled auto sort
    });
  });

  $('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
  });

  $('.select2').select2();

  $(".city").on('change', function(e) {
    dropdown_with_default('barangay', "tbl_barangay", "city_id", $(this).val(), "name", "id", $(this).val());
  });

  $(document).ready(function() {
    dropdown_with_default('barangay', "tbl_barangay", "city_id", "<?= $data->city_id; ?>", "name", "id", "<?= $data->barangay_id; ?>");
  });
</script>