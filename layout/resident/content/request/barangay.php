<form role="form" name="resident_request_barangay">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h4 class="box-title"> <i class="fa fa-file"></i>
              Barangay Clearance / Certificate Form</h4>
          </div>

          <div class="box-body">
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*Clearance ID:</label>
              <input type="text" class="form-control" value="<?php echo $default_data['clearance_id']; ?>" disabled>
            </div>

            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">Purpose:</label>
              <select class="form-control" name="purpose_id">
                <?php foreach ($default_data['purpose'] as $res) { ?>
                  <option value="<?= $res['id'] ?>"><?= strtoupper($res['purpose']); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">Others:</label>
              <input type="text" class="form-control" placeholder="Others..." name="others">
            </div>


            <div class="form-group col-xs-3">
              <label>*Date Issued:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="issued_date" placeholder="Date Issued">
              </div>
            </div>

            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*Last Name:</label>
              <input type="text" class="form-control" placeholder="Last name" name="last_name" value="<?= $data->last_name; ?>" disabled>
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*First Name:</label>
              <input type="text" class="form-control" placeholder="First name" name="first_name" value="<?= $data->first_name; ?>" disabled>
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*Middle Name:</label>
              <input type="text" class="form-control" placeholder="Middle name" name="middle_name" value="<?= $data->middle_name; ?>" disabled>
            </div>

            <div class="form-group col-xs-3">
              <label>Gender:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-venus-mars"></i>
                </div>
                <select class="form-control" name="gender" disabled>
                  <?php foreach ($default_data['gender'] as $res) { ?>
                    <option value="<?= $res['id'] ?>" <?php echo ($data->gender_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['gender']); ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-group col-xs-3">
              <label>Birth Date:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="birth_date" placeholder="Birth Date" value="<?= $data->contact_no; ?>" disabled>
              </div>
            </div>

            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*Birth Place:</label>
              <input type="text" class="form-control" placeholder="Birth Place" name="birth_place" value="<?= $data->birth_place; ?>" disabled>
            </div>

            <div class="form-group col-xs-3">
              <label>*Contact No:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input type="text" class="form-control pull-right" name="contact_no" placeholder="09XXXXXXXXX" value="<?= $data->contact_no; ?>" name="start_date" disabled>
              </div>
            </div>

            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*Email Address:</label>
              <input type="text" class="form-control" placeholder="Email Address" name="birth_place" value="<?= $data->birth_place; ?>" disabled>
            </div>

            <div class="form-group col-xs-6">
              <label for="exampleInputPassword1">*Address:</label>
              <input type="text" class="form-control" placeholder="Address" name="address" value="<?= $data->complete_address; ?>" disabled>
            </div>

            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*TIN:</label>
              <input type="text" class="form-control" placeholder="TIN" name="tin">
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*Philhealth:</label>
              <input type="text" class="form-control" placeholder="Philhealth" name="phil_health">
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*SSS:</label>
              <input type="text" class="form-control" placeholder="SSS" name="sss">
            </div>

            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*Blood Type:</label>
              <select class="form-control" name="blood_type_id">
                <?php foreach ($default_data['blood_type'] as $res) { ?>
                  <option value="<?= $res['id'] ?>"><?= strtoupper($res['blood_type']); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-xs-6">
              <label for="exampleInputPassword1">*Contact Person in case of emergency:</label>
              <input type="text" class="form-control" placeholder="Contact Person in case of emergency" name="contact_person">
            </div>
            <div class="form-group col-xs-6">
              <label for="exampleInputPassword1">*Address of Contact Person:</label>
              <input type="text" class="form-control" placeholder="Address of Contact Person" name="contact_person_address">
            </div>

            <div class="form-group col-xs-3">
              <label>*Contact No. of Contact Person:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input type="text" class="form-control pull-right" name="contact_person_no" placeholder="09XXXXXXXXX">
              </div>
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">*Is applicant a minor?:</label>
              <div class="radio">
                <label><input type="radio" name="minor" value="1" checked="">Yes</label>
                <label><input type="radio" name="minor" value="0" checked="">No</label>
              </div>
            </div>
            <div class="form-group col-xs-6">
              <label for="exampleInputPassword1">*Name of Guardian:</label>
              <input type="text" class="form-control" placeholder="Name of Guardian" name="guardian">
            </div>



          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success btn-flat" name="resident_create_request"><i class="fa fa-save"></i> Submit Request</button>
          </div>
        </div>
      </div>
    </div>


  </section>
</form>
<script>
  $('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
  }).datepicker("setDate", 'now');
</script>