<form role="form" name="resident_request_business" enctype="multipart/form-data">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h4 class="box-title"> <i class="fa fa-file"></i>
              Business Clearance Form</h4>
          </div>

          <div class="box-body">
            <div class="row">
              <div class="form-group col-xs-3">
                <label for="exampleInputPassword1">*Permit Number:</label>
                <input type="text" class="form-control" value="<?php echo $default_data['business_id']; ?>" disabled>
              </div>

              <div class="form-group col-xs-3">
                <label for="exampleInputPassword1">*Type of Application (Business Clearance)
                </label>
                <select class="form-control" name="application_id">
                  <?php foreach ($default_data['application_type'] as $res) { ?>
                    <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
                  <?php } ?>
                </select>
              </div>


              <div id="form2">
                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">*Old Barangay Business Clearance (photocopy)</label>
                  <input type="file" class="form-control" name="old_clearance" style="display:block">
                </div>
              </div>


              <div class="form-group col-xs-3">
                <label>*Date Issued:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" placeholder="Date Issued" disabled>
                  <input type="hidden" class="form-control pull-right datepicker" name="issued_date" value="<?= date('Y-m-d'); ?>">
                </div>
              </div>
            </div>


            <div class="row">
              <div id="form1" style="display:block">
                <div class="form-group col-xs-3">
                  <label>*Date of Start/Closure of Business:</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right datepicker" name="business_start" placeholder="Date of Start/Closure of Business">
                  </div>
                </div>

                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">*DTI for (Single), SEC for (Corporation) registration</label>
                  <input type="file" class="form-control" name="dti" style="display:block">
                </div>
                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">*Contract of Lease/ Title/ Certification</label>
                  <input type="file" class="form-control" name="contract" style="display:block">
                </div>
              </div>
            </div>

            <div class="row">
              <div id="form3" style="display:block">
                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">*Latest Serial Number of Business Clearance:</label>
                  <input type="number" class="form-control" placeholder="Latest Serial Number of Business Clearance" name="serial_no">
                </div>

                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">*Affidavit of Business Closure
                  </label>
                  <input type="file" class="form-control" name="affidavit" style="display:block">
                </div>
                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">*Request Letter addressed to Punong Barangay 
                  </label>
                  <input type="file" class="form-control" name="request_letter" style="display:block">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-3">
                <label for="exampleInputPassword1">*Type of Ownership </label>
                <select class="form-control" name="ownership_id">
                  <?php foreach ($default_data['ownership_type'] as $res) { ?>
                    <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group col-xs-3">
                <label for="exampleInputPassword1">*Type of Business</label>
                <select class="form-control" name="business_id">
                  <?php foreach ($default_data['business_type'] as $res) { ?>
                    <option value="<?= $res['id'] ?>"><?= strtoupper($res['name']); ?></option>
                  <?php } ?>
                </select>
              </div>

              <div id="form4">
                <div class="form-group col-xs-3">
                  <label for="exampleInputPassword1">*Others
                  </label>
                  <input type="text" class="form-control" placeholder="Others" name="others">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xs-3">
                <label for="exampleInputPassword1">*Business Name:</label>
                <input type="text" class="form-control" placeholder="Business Name" name="business_name">
              </div>
              <div class="form-group col-xs-6">
                <label for="exampleInputPassword1">*Address:</label>
                <input type="text" class="form-control" placeholder="Address" name="address">
              </div>
              <div class="form-group col-xs-3">
                <label for="exampleInputPassword1">*No. of Employees:</label>
                <input type="number" class="form-control" placeholder="No. of Employees" name="no_employees">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-6">
                <label for="exampleInputPassword1">Additional Business Description
                  :</label>
                <input type="text" class="form-control" placeholder="Additional Business Description" name="description">
              </div>
              <div class="form-group col-xs-6">
                <label for="exampleInputPassword1">*Name of Owner
                  :</label>
                <input type="text" class="form-control" placeholder="Name of Owner" name="owner_name">
              </div>
            </div>
            <div class="row">

              <div class="form-group col-xs-6">
                <label for="exampleInputPassword1">*Email Address
                  :</label>
                <input type="text" class="form-control" placeholder="Email Address" name="email">
              </div>
              <div class="form-group col-xs-6">
                <label for="exampleInputPassword1">*Mobile/Landline Number

                  :</label>
                <input type="number" class="form-control" placeholder="Mobile/Landline Number" name="contact_no">
              </div>
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
  }).datepicker("setDate", 'now');
</script>