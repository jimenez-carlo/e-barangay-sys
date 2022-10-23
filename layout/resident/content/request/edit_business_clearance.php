<section class="content-header">
  <h1>
    <i class="fa fa-eye"></i>
    Business Clearance ID#<?= $data->id; ?>
  </h1>
</section>
<form role="form" name="change_status_business_clearance" enctype="multipart/form-data">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h4 class="box-title"> <i class="fa fa-file"></i>
              Request Details</h4>

          </div>

          <div class="box-body">
            <div class="row">
              <div class="form-group col-xs-3">
                <label for="exampleInputPassword1">Permit Number:</label>
                <input type="text" class="form-control" name="id" value="<?= $data->id; ?>" disabled>
              </div>

              <div class="form-group col-xs-3">
                <label for="exampleInputPassword1">Type of Application (Business Clearance)
                </label>
                <select class="form-control" name="application_id" disabled>
                  <?php foreach ($default_data['application_type'] as $res) { ?>
                    <option value="<?= $res['id'] ?>" <?php echo ($data->application_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['name']); ?></option>
                  <?php } ?>
                </select>
              </div>


              <div id="form2">
                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">Old Brgy. Business Clearance (photocopy)</label>
                  <a href="<?php echo BASE_URL . "files/old_clearance/" . $data->old_clearance; ?>" download="">
                    <button class="btn btn-sm btn-flat btn-success" type="button">
                      Download
                    </button>
                  </a>
                </div>
              </div>


              <div class="form-group col-xs-3">
                <label>Date Issued:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="issued_date" placeholder="Date Issued" value="<?= $data->issued_date; ?>" disabled>
                </div>
              </div>
            </div>


            <div class="row">
              <div id="form1" style="display:block">
                <div class="form-group col-xs-3">
                  <label>Date of Start/Closure of Business:</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right datepicker" name="business_start" placeholder="Date of Start/Closure of Business" value="<?= $data->business_start; ?>" disabled>
                  </div>
                </div>

                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">DTI for (Single), SEC for (Corp) Reg.</label>
                  <a href="<?php echo BASE_URL . "files/dti/" . $data->dti; ?>" download="">
                    <button class="btn btn-sm btn-flat btn-success" type="button">
                      Download
                    </button>
                  </a>
                </div>
                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">Contract of Lease/ Title/ Certification</label>
                  <a href="<?php echo BASE_URL . "files/contract/" . $data->contract; ?>" download="">
                    <button class="btn btn-sm btn-flat btn-success" type="button">
                      Download
                    </button>
                  </a>
                </div>
              </div>
            </div>

            <div class="row">
              <div id="form3" style="display:block">
                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">Latest Ser. No. of Business Clearance:</label>
                  <input type="text" class="form-control" placeholder="Latest Serial Number of Business Clearance" name="serial_no" value="<?= $data->serial_no; ?>" disabled>
                </div>

                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">Affidavit of Business Closure
                  </label><br>
                  <a href="<?php echo BASE_URL . "files/affidavit/" . $data->affidavit; ?>" download="">
                    <button class="btn btn-sm btn-flat btn-success" type="button">
                      Download
                    </button>
                  </a>
                </div>
                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">Request Letter addressed to Punong Brgy
                  </label>
                  <a href="<?php echo BASE_URL . "files/request_letter/" . $data->request_letter; ?>" download="">
                    <button class="btn btn-sm btn-flat btn-success" type="button">
                      Download
                    </button>
                  </a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-3">
                <label for="exampleInputPassword1">Type of Ownership </label>
                <select class="form-control" name="ownership_id" disabled>
                  <?php foreach ($default_data['ownership_type'] as $res) { ?>
                    <option value="<?= $res['id'] ?>" <?php echo ($data->ownership_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['name']); ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group col-xs-3">
                <label for="exampleInputPassword1">Type of Business</label>
                <select class="form-control" name="business_id" disabled>
                  <?php foreach ($default_data['business_type'] as $res) { ?>
                    <option value="<?= $res['id'] ?>" <?php echo ($data->business_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['name']); ?></option>
                  <?php } ?>
                </select>
              </div>

              <div id="form4">
                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">Others
                  </label>
                  <input type="text" class="form-control" placeholder="Others" name="others" value="<?= $data->others; ?>" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xs-3">
                <label for="exampleInputPassword1">Business Name:</label>
                <input type="text" class="form-control" placeholder="Business Name" name="business_name" value="<?= $data->business_name; ?>" disabled>
              </div>
              <div class="form-group col-xs-6">
                <label for="exampleInputPassword1">Address:</label>
                <input type="text" class="form-control" placeholder="Address" name="address" value="<?= $data->address; ?>" disabled>
              </div>
              <div class="form-group col-xs-3">
                <label for="exampleInputPassword1">No. of Employees:</label>
                <input type="text" class="form-control" placeholder="No. of Employees" name="no_employees" value="<?= $data->no_employees; ?>" disabled>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-6">
                <label for="exampleInputPassword1">Additional Business Description
                  :</label>
                <input type="text" class="form-control" placeholder="Additional Business Description" name="description" value="<?= $data->description; ?>" disabled>
              </div>
              <div class="form-group col-xs-6">
                <label for="exampleInputPassword1">Name of Owner
                  :</label>
                <input type="text" class="form-control" placeholder="Name of Owner" name="owner_name" value="<?= $data->owner_name; ?>" disabled>
              </div>
            </div>
            <div class="row">

              <div class="form-group col-xs-6">
                <label for="exampleInputPassword1">Email Address
                  :</label>
                <input type="text" class="form-control" placeholder="Email Address" name="email" value="<?= $data->email; ?>" disabled>
              </div>
              <div class="form-group col-xs-6">
                <label for="exampleInputPassword1">Mobile/Landline Number

                  :</label>
                <input type="text" class="form-control" placeholder="Mobile/Landline Number" name="contact_no" value="<?= $data->contact_no; ?>" disabled>
              </div>
            </div>


          </div>
          <div class="modal-footer">
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

  $("[name='application_id']").on('change', function(e) {
    if (this.value == 1) {
      $("#form1").css("display", "block");
      $("#form2").css("visibility", "hidden");
      $("#form3").css("display", "none");
    } else if (this.value == 2) {
      $("#form1").css("display", "none");
      $("#form2").css("visibility", "visible");
      $("#form3").css("display", "none");
    } else if (this.value == 3) {
      $("#form1").css("display", "none");
      $("#form2").css("visibility", "hidden");
      $("#form3").css("display", "block");
    }
  });

  $("[name='business_id']").on('change', function(e) {
    if (this.value == 9) {
      $("#form4").css("visibility", "visible");
    } else {
      $("#form4").css("visibility", "hidden");
    }
  });

  $(document).ready(function() {
    $("[name='application_id']").trigger('change');
    $("[name='business_id']").trigger('change');
  });

  $('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
  });
</script>