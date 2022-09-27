<section class="content-header">
  <h1>
    <i class="fa fa-file"></i>
    Generate Request
  </h1>
</section>
<form role="form" name="request_generate" enctype="multipart/form-data">
  <section class="content">
    <div class="row">

      <div class="col-xs-3">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-user-circle"></i>
            <h4 class="box-title">User Look Up</h4>
          </div>
          <div class="box-body box-profile">
            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">User:</label>
              <select class="form-control select2" name="id">
                <?php foreach ($default_data['users'] as $res) { ?>
                  <option value="<?= $res['id'] ?>" <?= ($res['id'] == $_SESSION['user']->id) ? 'selected' : ''; ?>><?= $res['fullname'] ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">Request Type:</label>
              <select class="form-control" name="request_type">
                <?php foreach ($default_data['request_type'] as $res) { ?>
                  <option value="<?= $res['id'] ?>"><?= strtoupper($res['type']); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success btn-flat" name="request_generate"><i class="fa fa-save"></i> Generate Request</button>
          </div>
        </div>
      </div>
    </div>

  </section>
</form>
<script>
  $('.select2').select2();
</script>