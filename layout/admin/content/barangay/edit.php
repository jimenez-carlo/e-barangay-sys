<section class="content-header">
  <h1>
    <i class="fa fa-edit"></i>
    Barangay Clearance ID#<?= $data->id; ?>
  </h1>
</section>
<form role="form" name="change_status_barangay_clearance" enctype="multipart/form-data">
  <section class="content">
    <div class="row">
      <div class="col-md-9">
        <div class="box box-success">
          <div class="box-header with-border">
            <h4 class="box-title"> <i class="fa fa-file"></i>
              Request Details</h4>
          </div>

          <div class="box-body">
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">Clearance ID:</label>
              <input type="text" class="form-control" value="<?= $data->id; ?>" disabled>
            </div>

            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">Purpose:</label>
              <select class="form-control" name="purpose_id" disabled>
                <?php foreach ($default_data['purpose'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->purpose_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['purpose']); ?></option>
                <?php } ?>
              </select>
            </div>


            <div class="form-group col-xs-6">
              <label>Date Issued:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="issued_date" placeholder="Date Issued" value="<?= format_date($data->issued_date); ?>" disabled>
              </div>
            </div>

            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">Last Name:</label>
              <input type="text" class="form-control" placeholder="Last name" name="last_name" value="<?= $resident_data->last_name; ?>" disabled>
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">First Name:</label>
              <input type="text" class="form-control" placeholder="First name" name="first_name" value="<?= $resident_data->first_name; ?>" disabled>
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">Middle Name:</label>
              <input type="text" class="form-control" placeholder="Middle name" name="middle_name" value="<?= $resident_data->middle_name; ?>" disabled>
            </div>

            <div class="form-group col-xs-3">
              <label>Gender:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-venus-mars"></i>
                </div>
                <select class="form-control" name="gender" disabled>
                  <?php foreach ($default_data['gender'] as $res) { ?>
                    <option value="<?= $res['id'] ?>" <?php echo ($resident_data->gender_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['gender']); ?></option>
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
                <input type="text" class="form-control pull-right datepicker" name="birth_date" placeholder="Birth Date" value="<?= $resident_data->birth_date; ?>" disabled>
              </div>
            </div>

            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">Birth Place:</label>
              <input type="text" class="form-control" placeholder="Birth Place" name="birth_place" value="<?= $resident_data->birth_place; ?>" disabled>
            </div>

            <div class="form-group col-xs-3">
              <label>Contact No:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input type="text" class="form-control pull-right" name="contact_no" placeholder="09XXXXXXXXX" value="<?= $resident_data->contact_no; ?>" name="start_date" disabled>
              </div>
            </div>

            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">Is applicant a minor?:</label>
              <div class="radio">
                <label><input type="radio" name="minor" value="1" <?php echo (!empty($data->minor)) ? 'checked' : ''; ?> disabled>Yes</label>
                <label><input type="radio" name="minor" value="0" <?php echo (empty($data->minor)) ? 'checked' : ''; ?> disabled>No</label>
              </div>
            </div>

            <!-- <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">Email Address:</label>
              <input type="text" class="form-control" placeholder="Email Address" name="birth_place" value="<?= $resident_data->birth_place; ?>" disabled>
            </div> -->

            <div class="form-group col-xs-6">
              <label for="exampleInputPassword1">Address:</label>
              <input type="text" class="form-control" placeholder="Address" name="address" value="<?= $resident_data->complete_address; ?>" disabled>
            </div>

            <!-- <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">TIN:</label>
              <input type="text" class="form-control" placeholder="TIN" name="tin" value="<?= $data->tin; ?>" disabled>
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">Philhealth:</label>
              <input type="text" class="form-control" placeholder="Philhealth" name="phil_health" value="<?= $data->phil_health; ?>" disabled>
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">SSS:</label>
              <input type="text" class="form-control" placeholder="SSS" name="sss" value="<?= $data->sss; ?>" disabled>
            </div>

            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">Blood Type:</label>
              <select class="form-control" name="blood_type_id" disabled>
                <?php foreach ($default_data['blood_type'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->blood_type_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['blood_type']); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-xs-6">
              <label for="exampleInputPassword1">Contact Person in case of emergency:</label>
              <input type="text" class="form-control" placeholder="Contact Person in case of emergency" name="contact_person" value="<?= $data->contact_person; ?>" disabled>
            </div>
            <div class="form-group col-xs-6">
              <label for="exampleInputPassword1">Address of Contact Person:</label>
              <input type="text" class="form-control" placeholder="Address of Contact Person" name="contact_person_address" value="<?= $data->contact_person_address; ?>" disabled>
            </div>

            <div class="form-group col-xs-3">
              <label>Contact No. of Contact Person:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input type="text" class="form-control pull-right" name="contact_person_no" placeholder="09XXXXXXXXX" value="<?= $data->contact_person_no; ?>" disabled>
              </div>
            </div> -->
            <div id="form1">
              <div class="form-group col-xs-6">
                <label for="exampleInputPassword1">Name of Guardian:</label>
                <input type="text" class="form-control" placeholder="Name of Guardian" name="guardian" value="<?= $data->guardian; ?>" disabled>
              </div>
            </div>

          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-info-circle"></i>
            <h4 class="box-title">Request Details</h4>
          </div>
          <div class="box-body">
            <input type="hidden" class="form-control" name="id" value="<?= $data->id; ?>">
            <input type="hidden" class="form-control" name="type" value="1">
            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">*Status:</label>
              <select class="form-control" name="status">
                <?php foreach ($default_data['request_status'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->request_status_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['status']); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">Remarks:</label>
              <textarea class="form-control" row="10" name="remarks" placeholder="Remarks Here..."></textarea>
            </div>

          </div>

          <div class="modal-footer">
            <?php if (in_array($data->request_status_id, array(5, 6))) { ?>
              <button type="button" class="btn btn-sm btn-success btn-flat" disabled><i class="fa fa-save"></i> Change Status</button>
            <?php } else { ?>
              <button type="submit" class="btn btn-sm btn-success btn-flat" name="request_change_status"><i class="fa fa-save"></i> Change Status</button>
            <?php } ?>
            <?php if ($data->request_status_id == 4) { ?>
              <?php $redirect = ($data->purpose_id == 5) ? 'residency.php' : 'clearance.php'; ?>
              <a class="btn btn-sm btn-success btn-flat btn-print" href='<?= BASE_URL . "print/" . $redirect . "?pair=" . base64_encode($data->requester_id) . "&code=" . base64_encode(date("Ymd", time() + 86400)); ?>"' target="_blank"><i class="fa fa-print"></i> Print</a>
            <?php } else { ?>
              <button type="button" class="btn btn-sm btn-success btn-flat" disabled><i class="fa fa-print"></i> Print</button>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h4>
              <i class="fa fa-history"></i>
              Status History
            </h4>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered table-striped table-hover dataTable" role="grid">
                  <thead>
                    <tr role="row">
                      <th>ID#</th>
                      <th>Status</th>
                      <th>Remarks</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (count($data->history) > 0) { ?>
                      <?php foreach ($data->history as $res) { ?>
                        <tr>
                          <td><?= $res['id'] ?></td>
                          <td><?= strtoupper($res['status']); ?></td>
                          <td><?= $res['remarks'] ?></td>
                          <td><?= $res['fullname'] ?></td>
                          <td><?= format_date($res['created_date']); ?></td>
                        </tr>
                      <?php } ?>
                    <?php } ?>

                  </tbody>

                </table>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>


  </section>
</form>

<script>
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


  $("[name='purpose_id']").on('change', function(e) {


  });

  $("[name='minor']").on('change', function(e) {
    if ($("[name='minor']:checked").val() == 1) {
      $("#form1").css("visibility", "visible");
    } else {
      $("#form1").css("visibility", "hidden");
    }
  });

  $(document).ready(function() {
    $("[name='minor']").trigger('change');
    $("[name='purpose_id']").trigger('change');
  });
</script>