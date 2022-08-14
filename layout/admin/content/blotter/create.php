s<section class="content-header">
  <h1>
    <i class="fa fa-plus"></i>
    New Case
  </h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <i class="fa fa-info-circle"></i>
          <h4 class="box-title">Blotter Details</h4>
        </div>
        <form role="form" name="">
          <div class="box-body">
            <div class="form-group col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Complainant ID</label>
                <select class="form-control select2">
                  <option value="0">NONE</option>
                  <?php foreach ($default_data['users'] as $res) { ?>
                    <option value="<?= $res['id'] ?>"><?= $res['fullname'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="form-group">
                <label for="exampleInputPassword1">Complainee ID</label>
                <select class="form-control select2">
                  <option value="0">NONE</option>
                  <?php foreach ($default_data['users'] as $res) { ?>
                    <option value="<?= $res['id'] ?>"><?= $res['fullname'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group col-xs-6">
              <label for="exampleInputPassword1">Complaint:</label>
              <textarea class="form-control" row="5" name="" id="">Remarks/Reason for the Complain...</textarea>
            </div>
            <div class="form-group col-xs-3">
              <label for="exampleInputPassword1">Incident Location:</label>
              <input type="text" class="form-control" placeholder="Location">
            </div>
            <div class="form-group col-xs-3">
              <label>Date Of Incident:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker">
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Action Taken</label>
                <select class="form-control">
                  <?php foreach ($default_data['action_taken'] as $res) { ?>
                    <option value="<?= $res['id'] ?>"><?= $res['type'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group col-xs-3">
              <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select class="form-control">
                  <?php foreach ($default_data['status'] as $res) { ?>
                    <option value="<?= $res['id'] ?>"> <?= $res['status'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success btn-flat"><i class="fa fa-times"></i> Reset</button>
            <button type="submit" class="btn btn-sm btn-success btn-flat"><i class="fa fa-save"></i> Save</button>
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
            <label for="exampleInputPassword1">First Name:</label>
            <input type="text" class="form-control" placeholder="First Name">
          </div>
          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Middle Name:</label>
            <input type="text" class="form-control" placeholder="Middle Name">
          </div>
          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Last Name:</label>
            <input type="text" class="form-control" placeholder="Last Name">
          </div>
          <div class="form-group col-xs-4">
            <label>Date of Birth:</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right datepicker">
              <div class="input-group-addon">
                Age
              </div>
              <div class="input-group-addon">
                0
              </div>
            </div>
          </div>
          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Contact No#:</label>
            <input type="text" class="form-control" placeholder="09xxxxxxxxx">
          </div>
          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Gender:</label>
            <select class="form-control">
              <?php foreach ($default_data['gender'] as $res) { ?>
                <option value="<?= $res['id'] ?>"><?= $res['gender'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Barangay:</label>
            <input type="text" class="form-control" placeholder="Barangay">
          </div>
          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Zone:</label>
            <select class="form-control">
              <?php foreach ($default_data['zone'] as $res) { ?>
                <option value="<?= $res['id'] ?>"><?= $res['zone'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Address:</label>
            <textarea class="form-control" row="5" name="" id="">Address</textarea>
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
            <label for="exampleInputPassword1">First Name:</label>
            <input type="text" class="form-control" placeholder="First Name">
          </div>
          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Middle Name:</label>
            <input type="text" class="form-control" placeholder="Middle Name">
          </div>
          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Last Name:</label>
            <input type="text" class="form-control" placeholder="Last Name">
          </div>
          <div class="form-group col-xs-4">
            <label>Date of Birth:</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right datepicker">
              <div class="input-group-addon">
                Age
              </div>
              <div class="input-group-addon">
                0
              </div>
            </div>
          </div>
          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Contact No#:</label>
            <input type="text" class="form-control" placeholder="09xxxxxxxxx">
          </div>
          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Gender:</label>
            <select class="form-control">
              <?php foreach ($default_data['gender'] as $res) { ?>
                <option value="<?= $res['id'] ?>"><?= $res['gender'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Barangay:</label>
            <input type="text" class="form-control" placeholder="Barangay">
          </div>
          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Zone:</label>
            <select class="form-control">
              <?php foreach ($default_data['zone'] as $res) { ?>
                <option value="<?= $res['id'] ?>"><?= $res['zone'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-xs-4">
            <label for="exampleInputPassword1">Address:</label>
            <textarea class="form-control" row="5" name="" id="">Address</textarea>
          </div>
        </div>
      </div>
    </div>


    </form>

  </div>

</section>
<script>
  $('.select2').select2();
  $('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
  }).datepicker("setDate", 'now');;
</script>