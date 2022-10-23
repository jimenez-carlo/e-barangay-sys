<section class="content-header">
  <h1>
    <i class="fa fa-plus"></i>
    Incident Report #<?= $blotter->id; ?>
  </h1>
</section>
<form role="form" name="blotter_create">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-info-circle"></i>
            <h4 class="box-title">Blotter Details</h4> <button type="submit" class="btn btn-sm btn-success btn-flat pull-right" name="blotter_create"><i class="fa fa-edit"></i> Edit</button>
          </div>
          <div class="box-body">
            <div class="form-group col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Complainant</label>
                <select class="form-control select2" name="complainant_id" disabled>
                  <option value="0">NONE</option>
                  <?php foreach ($default_data['users'] as $res) { ?>
                    <option value="<?= $res['id'] ?>" <?php echo ($blotter->complainant_id == $res['id']) ? 'selected' : ''; ?>><?= $res['fullname'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="form-group">
                <label for="exampleInputPassword1">Complainee</label>
                <select class="form-control select2" name="complainee_id" disabled>
                  <option value="0">NONE</option>
                  <?php foreach ($default_data['users'] as $res) { ?>
                    <option value="<?= $res['id'] ?>" <?php echo ($blotter->complainee_id == $res['id']) ? 'selected' : ''; ?>><?= $res['fullname'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group col-xs-6">
              <label for="exampleInputPassword1">*Complaint:</label>
              <textarea class="form-control" row="5" name="complaint" placeholder="Remarks/Reason for the Complain..." disabled><?= $blotter->complaint; ?></textarea>
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*Incident Location:</label>
              <input type="text" class="form-control" placeholder="Location" name="location" value="<?= $blotter->incidence; ?>" disabled>
            </div>
            <div class="form-group col-xs-3">
              <label>*Date Of Incident:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="date_of_incident" value="<?= $blotter->incidence_date; ?>" disabled>
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Action Taken</label>
                <select class="form-control" name="action" disabled>
                  <?php foreach ($default_data['action_taken'] as $res) { ?>
                    <option value="<?= $res['id'] ?>" <?php echo ($blotter->action_id == $res['id']) ? 'selected' : ''; ?>><?= $res['type'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select class="form-control" name="status" disabled>
                  <?php foreach ($default_data['status'] as $res) { ?>
                    <option value="<?= $res['id'] ?>" <?php echo ($blotter->blotter_status_id == $res['id']) ? 'selected' : ''; ?>><?= $res['status'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>

          <div class="modal-footer">
          </div>
        </div>

      </div>

      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-user-circle"></i>
            <h4 class="box-title">Complainant Information</h4>
          </div>
          <div class="box-body">
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*First Name:</label>
              <input type="text" class="form-control" placeholder="First Name" disabled name="complainant_first_name" value="<?= $blotter->complainant->first_name; ?>">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Middle Name:</label>
              <input type="text" class="form-control" placeholder="Middle Name" disabled name="complainant_middle_name" value="<?= $blotter->complainant->middle_name; ?>">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Last Name:</label>
              <input type="text" class="form-control" placeholder="Last Name" disabled name="complainant_last_name" value="<?= $blotter->complainant->last_name; ?>">
            </div>
            <div class="form-group col-xs-4">
              <label>*Date of Birth:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" disabled name="complainant_date_of_birth" data-age="complainant-age" value="<?= $blotter->complainant->age; ?>">
                <div class="input-group-addon">
                  Age
                </div>
                <div class="input-group-addon" data-complainant-age>
                  <?= $blotter->complainant->age; ?>
                </div>
              </div>
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Contact No#:</label>
              <input type="text" class="form-control" placeholder="09xxxxxxxxx" disabled name="complainant_contact_no" value="<?= $blotter->complainant->contact_no; ?>">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">Gender:</label>
              <select class="form-control" disabled name="complainant_gender">
                <?php foreach ($default_data['gender'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($blotter->complainant->gender_id == $res['id']) ? 'selected' : ''; ?>><?= $res['gender'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">Zone:</label>
              <select class="form-control" disabled name="complainant_zone">
                <?php foreach ($default_data['zone'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($blotter->complainant->zone_id == $res['id']) ? 'selected' : ''; ?>><?= $res['zone'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Barangay:</label>
              <input type="text" class="form-control" placeholder="Barangay" disabled name="complainant_barangay" value="">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Address:</label>
              <textarea class="form-control" row="5" disabled name="complainant_address" placeholder="Address"></textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-user-circle"></i>
            <h4 class="box-title">Complainee Information</h4>
          </div>
          <div class="box-body">
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*First Name:</label>
              <input type="text" class="form-control" placeholder="First Name" disabled name="complainee_first_name" value="<?= $blotter->complainee->first_name; ?>">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Middle Name:</label>
              <input type="text" class="form-control" placeholder="Middle Name" disabled name="complainee_middle_name" value="<?= $blotter->complainee->middle_name; ?>">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Last Name:</label>
              <input type="text" class="form-control" placeholder="Last Name" disabled name="complainee_last_name" value="<?= $blotter->complainee->last_name; ?>">
            </div>
            <div class="form-group col-xs-4">
              <label>*Date of Birth:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" disabled name="complainee_date_of_birth" data-age="complainee-age" value="<?= $blotter->complainee->date_of_birth; ?>">
                <div class="input-group-addon">
                  Age
                </div>
                <div class="input-group-addon" data-complainee-age>
                  <?= $blotter->complainee->age; ?>
                </div>
              </div>
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Contact No#:</label>
              <input type="text" class="form-control" placeholder="09xxxxxxxxx" disabled name="complainee_contact_no" value="<?= $blotter->complainee->contact_no; ?>">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">Gender:</label>
              <select class="form-control" disabled name="complainee_gender">
                <?php foreach ($default_data['gender'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($blotter->complainee->zone_id == $res['id']) ? 'selected' : ''; ?>><?= $res['gender'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">Zone:</label>
              <select class="form-control" disabled name="complainee_zone">
                <?php foreach ($default_data['zone'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($blotter->complainee->zone_id == $res['id']) ? 'selected' : ''; ?>><?= $res['zone'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Barangay:</label>
              <input type="text" class="form-control" placeholder="Barangay" disabled name="complainee_barangay" value="">
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">*Address:</label>
              <textarea class="form-control" row="5" disabled name="complainee_address" placeholder="Address"></textarea>
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
  }).datepicker("setDate", 'now');;
</script>