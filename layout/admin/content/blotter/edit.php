<section class="content-header">
  <h1>
    <i class="fa fa-plus"></i>
    Incident Report #<?= $blotter->id; ?>
  </h1>
</section>
<form role="form" name="blotter_update">
  <input type="hidden" name="id" value="<?= $blotter->id; ?>">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-info-circle"></i>
            <h4 class="box-title">Blotter Details</h4>
          </div>
          <div class="box-body">
            <div class="form-group col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Complainant</label>
                <select class="form-control select2" name="complainant_id">
                  <?php foreach ($default_data['users'] as $res) { ?>
                    <option value="<?= $res['id'] ?>" <?php echo ($res['id'] == $blotter->complainant_id) ? 'selected' : ''; ?>><?= $res['fullname'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="form-group">
                <label for="exampleInputPassword1">Complainee</label>
                <select class="form-control select2" name="complainee_id">
                  <?php foreach ($default_data['users'] as $res) { ?>
                    <option value="<?= $res['id'] ?>" <?php echo ($res['id'] == $blotter->complainee_id) ? 'selected' : ''; ?>><?= $res['fullname'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group col-xs-6">
              <label for="exampleInputPassword1">*Complaint:</label>
              <textarea class="form-control" row="5" name="complaint" placeholder="Remarks/Reason for the Complain..."><?= $blotter->complaint; ?></textarea>
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*Incident Location:</label>
              <input type="text" class="form-control" placeholder="Location" name="location" value="<?= $blotter->incidence; ?>">
            </div>
            <div class="form-group col-xs-3">
              <label>*Date Of Incident:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="date_of_incident">
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Action Taken</label>
                <select class="form-control" name="action">
                  <?php foreach ($default_data['action_taken'] as $res) { ?>
                    <option value="<?= $res['id'] ?>"><?= $res['type'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select class="form-control" name="status">
                  <?php foreach ($default_data['status'] as $res) { ?>
                    <option value="<?= $res['id'] ?>"> <?= $res['status'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success btn-flat" name="blotter_update"><i class="fa fa-save"></i> Update</button>
          </div>
        </div>

      </div>

      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-user-circle"></i>
            <h4 class="box-title">Complainant Information</h4>
            <button type="button" class="btn btn-sm btn-flat btn-success btn-view pull-right" name="admin/resident/edit" value="<?php echo $blotter->complainant_id; ?>"> <i class="fa fa-edit"></i> Edit</button>
          </div>
          <div class="box-body">

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*First Name:</label>
              <input type="text" class="form-control" placeholder="First Name" disabled name="complainant_first_name">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Middle Name:</label>
              <input type="text" class="form-control" placeholder="Middle Name" disabled name="complainant_middle_name">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Last Name:</label>
              <input type="text" class="form-control" placeholder="Last Name" disabled name="complainant_last_name">
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Birth Date:</label>
              <input type="text" class="form-control" placeholder="Last Name" disabled name="complainant_date_of_birth">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Birth Place:</label>
              <input type="text" class="form-control" placeholder="Birth Place" disabled name="complainant_birth_place">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Gender:</label>
              <input type="text" class="form-control" placeholder="gender" disabled name="complainant_contact_no">
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*City:</label>
              <input type="text" class="form-control" placeholder="City" disabled name="complainant_city">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*House No:</label>
              <input type="text" class="form-control" placeholder="House no" disabled name="complainant_house_no">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Marital Status:</label>
              <input type="text" class="form-control" placeholder="Marital Status" disabled name="complainant_marital_status">
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Barangay:</label>
              <input type="text" class="form-control" placeholder="Barangay" disabled name="complainant_city">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Street:</label>
              <textarea class="form-control" row="5" disabled name="complainant_street" placeholder="Address"></textarea>
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Contact No:</label>
              <input type="text" class="form-control" placeholder="09XXXXXXXXX" disabled name="complainant_contact_no">
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-user-circle"></i>
            <h4 class="box-title">Complainee Information</h4>
            <button type="button" class="btn btn-sm btn-flat btn-success btn-view pull-right" name="admin/resident/edit" value="<?php echo $blotter->complainee_id; ?>"> <i class="fa fa-edit"></i> Edit</button>
          </div>
          <div class="box-body">

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*First Name:</label>
              <input type="text" class="form-control" placeholder="First Name" disabled name="complainee_first_name">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Middle Name:</label>
              <input type="text" class="form-control" placeholder="Middle Name" disabled name="complainee_middle_name">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Last Name:</label>
              <input type="text" class="form-control" placeholder="Last Name" disabled name="complainee_last_name">
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Birth Date:</label>
              <input type="text" class="form-control" placeholder="Last Name" disabled name="complainee_date_of_birth">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Birth Place:</label>
              <input type="text" class="form-control" placeholder="Birth Place" disabled name="complainee_birth_place">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Gender:</label>
              <input type="text" class="form-control" placeholder="gender" disabled name="complainee_contact_no">
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*City:</label>
              <input type="text" class="form-control" placeholder="City" disabled name="complainee_city">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*House No:</label>
              <input type="text" class="form-control" placeholder="House no" disabled name="complainee_house_no">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Marital Status:</label>
              <input type="text" class="form-control" placeholder="Marital Status" disabled name="complainee_marital_status">
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Barangay:</label>
              <input type="text" class="form-control" placeholder="Barangay" disabled name="complainee_city">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Street:</label>
              <textarea class="form-control" row="5" disabled name="complainee_street" placeholder="Address"></textarea>
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Contact No:</label>
              <input type="text" class="form-control" placeholder="09XXXXXXXXX" disabled name="complainee_contact_no">
            </div>

          </div>
        </div>
      </div>


    </div>

  </section>
</form>
<script>
  $('.select2').select2();
  $('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
  });

  $(document).ready(function() {
    $("select[name='complainant_id']").trigger('change');
    $("select[name='complainee_id']").trigger('change');
  });

  $("select[name='complainant_id']").on('change', function(e) {
    $.ajax({
      url: base_url + 'request.php',
      type: 'POST',
      data: {
        form: 'get_user',
        id: $(this).val()
      },
      success: function(result) {
        var user = JSON.parse(result);
        $("input[name='complainant_first_name']").val(user.first_name);
        $("input[name='complainant_middle_name']").val(user.middle_name);
        $("input[name='complainant_last_name']").val(user.last_name);
        $("input[name='complainant_date_of_birth']").val(user.birth_date);
        $("input[name='complainant_date_place']").val(user.birth_place);
        $("input[name='complainant_gender']").val(user.gender);
        $("input[name='complainant_city']").val(user.city);
        $("input[name='complainant_house_no']").val(user.house_no);
        $("input[name='complainant_marital_status']").val(user.marital_status);
        $("input[name='complainant_barangay']").val(user.barangay);
        $("input[name='complainant_street']").val(user.street);
      }
    });
  });

  $("select[name='complainee_id']").on('change', function(e) {
    $.ajax({
      url: base_url + 'request.php',
      type: 'POST',
      data: {
        form: 'get_user',
        id: $(this).val()
      },
      success: function(result) {
        var user = JSON.parse(result);
        $("input[name='complainee_first_name']").val(user.first_name);
        $("input[name='complainee_middle_name']").val(user.middle_name);
        $("input[name='complainee_last_name']").val(user.last_name);
        $("input[name='complainee_date_of_birth']").val(user.birth_date);
        $("input[name='complainee_date_place']").val(user.birth_place);
        $("input[name='complainee_gender']").val(user.gender);
        $("input[name='complainee_city']").val(user.city);
        $("input[name='complainee_house_no']").val(user.house_no);
        $("input[name='complainee_marital_status']").val(user.marital_status);
        $("input[name='complainee_barangay']").val(user.barangay);
        $("input[name='complainee_street']").val(user.street);
      }
    });
  });
</script>