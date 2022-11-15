<section class="content-header">
  <h1>
    <i class="fa fa-edit"></i>
    Editing Resident ID#<?= $data->id; ?>
  </h1>
</section>
<form role="form" name="resident_update" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $data->id; ?>">
  <section class="content">
    <div class="row">
      <div class="col-md-9">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-user-circle"></i>
            <h4 class="box-title">Resident Information</h4>
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

            <div class="form-group col-xs-2">
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

            <div class="form-group col-xs-2">
              <label>*Date of Residency:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" id="residency_date" name="residency_date" placeholder="Birth Date" value="<?= $data->date_of_residency; ?>">
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
              <select class="form-control select2" name="religion">
                <?php foreach ($default_data['religion'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->religion == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['name']); ?></option>
                <?php } ?>
              </select>
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

            <div class="form-group col-xs-2">
              <label>*Contact No:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input type="number" maxlength="11" class="form-control pull-right" name="contact_no" placeholder="09XXXXXXXXX" value="<?= $data->contact_no; ?>" name="start_date">
              </div>
            </div>

            <div class="form-group col-xs-2">
              <label for="exampleInputPassword1">*Nationality:</label>
              <select class="form-control select2" name="nationality">
                <?php foreach ($default_data['nationality'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?php echo ($data->nationality == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['name']); ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-xs-2">
              <label for="exampleInputPassword1">ID Attachment</label>
              <a href="<?php echo BASE_URL . "files/verify/" . $data->file; ?>" download="">
                <button class="btn btn-sm btn-flat btn-success" type="button">
                  Download
                </button>
              </a>
              <a href="<?php echo BASE_URL . "files/verify/" . $data->file; ?>" target="_blank">
                <button class="btn btn-sm btn-flat btn-success" type="button">
                  View
                </button>
              </a>
            </div>
          </div>
          <div class="modal-footer" style="min-height:93px">
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

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success btn-flat" name="resident_update" value="reset"><i class="fa fa-lock"></i> Reset Password</button>
            <button type="submit" class="btn btn-sm btn-success btn-flat" name="resident_update" value="update"><i class="fa fa-save"></i> Update</button>
            <button type="submit" class="btn btn-sm btn-success btn-flat" name="resident_update" value="verify" <?= ($data->status_id == 2) ? "disabled" : ""; ?>><i class="fa fa-check"></i> Verify</button>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h4>
              <i class="fa fa-archive"></i>
              Records
            </h4>
          </div>
          <div class="box-body">
            <div class="row">


              <div class="col-sm-12">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#status_history" data-toggle="tab" aria-expanded="true"><i class="fa fa-history"></i> Status History</a></li>
                    <!-- <li class=""><a href="#requests" data-toggle="tab" aria-expanded="false"><i class="fa fa-files-o"></i> Requests</a></li> -->
                    <li class=""><a href="#blotter" data-toggle="tab" aria-expanded="false"><i class="fa fa-address-book"></i> Incident Report</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="status_history">
                      <table class="table table-bordered table-striped table-hover dataTable" role="grid">
                        <thead>
                          <tr role="row">
                            <th>ID#</th>
                            <th>Status</th>
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
                                <td><?= $res['fullname'] ?></td>
                                <td><?= format_date($res['created_date']); ?></td>
                              </tr>
                            <?php } ?>
                          <?php } ?>

                        </tbody>

                      </table>
                    </div>
                    <!-- 
                    <div class="tab-pane" id="requests">
                      <table class="table table-bordered table-striped table-hover dataTable" role="grid">
                        <thead>
                          <tr role="row">
                            <th>ID#</th>
                            <th>Request Type</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if (count($data->requests) > 0) { ?>
                            <?php foreach ($data->requests as $res) { ?>
                              <tr>
                                <td><?= $res['id'] ?></td>
                                <td><?= strtoupper($res['request_type']); ?></td>
                                <td><?= strtoupper($res['status']); ?></td>
                                <td><?= $res['fullname'] ?></td>
                                <td><?= format_date($res['created_date']); ?></td>
                              </tr>
                            <?php } ?>
                          <?php } ?>

                        </tbody>

                      </table>
                    </div> -->

                    <div class="tab-pane" id="blotter">
                      <table class="table table-bordered table-striped table-hover dataTable" role="grid">
                        <thead>
                          <tr role="row">
                            <th>ID#</th>
                            <th>Complainant</th>
                            <th>Status</th>
                            <th>Created Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if (count($data->blotter) > 0) { ?>
                            <?php foreach ($data->blotter as $res) { ?>
                              <tr>
                                <td><?= $res['id'] ?></td>
                                <td><?= $res['fullname'] ?></td>
                                <td><?= strtoupper($res['status']); ?></td>
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

  var birth_date = new Date('<?= $data->birth_date; ?>');
  $('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
  }).datepicker("setDate", birth_date);
  var residency_date = new Date('<?= $data->date_of_residency; ?>');
  $('#residency_date').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
  }).datepicker("setDate", residency_date);

  $('.select2').select2();

  $(".city").on('change', function(e) {
    dropdown_with_default('barangay', "tbl_barangay", "city_id", $(this).val(), "name", "id", $(this).val());
  });

  $(document).ready(function() {
    dropdown_with_default('barangay', "tbl_barangay", "city_id", "<?= $data->city_id; ?>", "name", "id", "<?= $data->barangay_id; ?>");
  });
</script>