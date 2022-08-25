<section class="content-header">
  <h1>
    <i class="fa fa-edit"></i>
    View Request ID#<?= $data->id; ?>
  </h1>
</section>
<form role="form" name="request_change_status" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $data->id; ?>">
  <section class="content">
    <div class="row">
      <div class="col-md-9">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-user-circle"></i>
            <h4 class="box-title">Personal Information</h4>
          </div>

          <div class="box-body">
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">First Name:</label>
              <input type="text" class="form-control" placeholder="First name" value="<?= $data->resident->first_name; ?>" disabled>
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">Middle Name:</label>
              <input type="text" class="form-control" placeholder="Middle name" value="<?= $data->resident->middle_name; ?>" disabled>
            </div>
            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">Last Name:</label>
              <input type="text" class="form-control" placeholder="Last name" value="<?= $data->resident->last_name; ?>" disabled>
            </div>


            <div class="form-group col-xs-4">
              <label>*Birth Date:</label>
              <input type="text" class="form-control pull-right" placeholder="Birth Date" value="<?= format_date($data->resident->birth_date); ?>" disabled>
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">Birth Place:</label>
              <input type="text" class="form-control" placeholder="Birth Place" value="<?= $data->resident->birth_place; ?>" disabled>
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">Gender:</label>
              <select class="form-control" disabled>
                <?php foreach ($default_data['gender'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->resident->gender_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['gender']); ?></option>
                <?php } ?>
              </select>
            </div>


            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">City:</label>
              <select class="form-control" disabled>
                <?php foreach ($default_data['city'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->resident->city_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['name']); ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">House No#:</label>
              <input type="text" class="form-control" placeholder="House No#" value="<?= $data->resident->house_no; ?>" disabled>
            </div>


            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">Marital Status:</label>
              <select class="form-control" disabled>
                <?php foreach ($default_data['marital_status'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->resident->marital_status_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['status']); ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">Barangay:</label>
              <select class="form-control" disabled>
                <?php foreach ($default_data['barangay'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->resident->barangay_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['name']); ?></option>
                <?php } ?>
              </select>
            </div>


            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">Street:</label>
              <textarea class="form-control" row="10" name="remarks" placeholder="Street Here..." disabled><?= $data->resident->street; ?></textarea>
            </div>

            <div class="form-group col-xs-4">
              <label for="exampleInputPassword1">Contact No:</label>
              <input type="text" class="form-control pull-right" placeholder="09XXXXXXXXX" value="<?= $data->resident->contact_no; ?>" disabled>
            </div>

          </div>
          <div class="modal-footer" style="min-height:61px">
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
            <div class="form-group col-xs-6">
              <label for="exampleInputPassword1">Request ID#:</label>
              <input type="text" class="form-control" placeholder="Request ID" value="<?= $data->id; ?>" disabled>
            </div>
            <div class="form-group col-xs-6">
              <label for="exampleInputPassword1">Requested Date:</label>
              <input type="text" class="form-control" placeholder="Request Date" value="<?= format_date($data->created_date); ?>" disabled>
            </div>
            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">Request Type:</label>
              <select class="form-control" disabled>
                <?php foreach ($default_data['request_type'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->request_type_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['type']); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
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
                          <td><?= format_date_time_am_pm($res['created_date']); ?></td>
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
  }).datepicker("setDate", 'now');
</script>