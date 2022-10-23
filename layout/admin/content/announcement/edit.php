<section class="content-header">
  <h1>
    <i class="fa fa-bullhorn"></i>
    Editing Announcement ID#<?= $data->id; ?>
  </h1>
</section>
<form role="form" name="announcement_edit" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $data->id; ?>">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-info-circle"></i>
            <h4 class="box-title">Announcement Details</h4>
          </div>
          <div class="box-body">
            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">*Title:</label>
              <input type="text" class="form-control" placeholder="Title" name="title" value="<?= $data->title; ?>">
            </div>
            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">*Description:</label>
              <textarea class="form-control" row="10" name="description" placeholder="Announcement Description Here..."><?= $data->description; ?></textarea>
            </div>
            <div class="form-group col-xs-6">
              <label>*Start Date:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="start_date" value="<?= $data->start_date; ?>">
              </div>
            </div>
            <div class="form-group col-xs-6">
              <label>*End Date:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="end_date" value="<?= $data->end_date; ?>">
              </div>
            </div>
            <div class="form-group col-xs-12">
              <label for="img-input">*Images </label> <br>
              <button type="button" class="btn btn-sm btn-success btn-flat btn-select-images"><i class="fa fa-picture-o"> </i> Select Images</button>
              <input type="file" name="images[]" accept="image/*" id="images" multiple>
              <p class="help-block">Preview here</p>
              <div id="preview" style="display:flex">
                <?php if (!empty($data->images)) { ?>
                  <?php foreach ($data->images as $res) { ?>
                    <div style="position:relative;margin-right:20px"><img src="<?= BASE_URL . "files/announcement/" . $res['image']; ?>" class="imgs-preview">
                      <button type="button" class="btn btn-sm btn-flat btn-success btn-r-def-img" value="<?= $res['id']; ?>"><i class="fa fa-trash"></i></button>
                    </div>
                  <?php } ?>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group">
              <div class="input-group">
                <?php if (in_array($data->announcement_status_id, array(1, 3))) { ?>
                  <button type="submit" class="btn btn-sm btn-success btn-flat" name="announcement_edit" value="draft"><i class="fa fa-edit"></i> Save Draft</button>
                <?php } ?>
                <?php if ($data->announcement_status_id == 2) { ?>
                  <button type="submit" class="btn btn-sm btn-success btn-flat" name="announcement_edit" value="un-publish"><i class="fa fa-history"></i> Unpublish</button>
                <?php } ?>
                <button type="submit" class="btn btn-sm btn-success btn-flat" name="announcement_edit" value="publish"><i class="fa fa-book"></i> Publish</button>
                <button type="button" class="btn btn-sm btn-success btn-flat btn-sms"> Send SMS </button>
                <span class="input-group-addon">
                  <input type="checkbox" checked name="send_sms" value="1">
                </span>
              </div>
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
  });

  $(".btn-sms").on('click', function(e) {
    $('input[type="checkbox"]').trigger('click');
  });

  $(".btn-select-images").on('click', function(e) {
    $('#images').trigger('click');
  });

  var dt = new DataTransfer();

  $("#images").on('change', function(e) {
    console.log('changed');
    for (var i = 0; i < this.files.length; i++) {
      let div = $('<div style="position:relative;margin-right:20px"></div>');
      let btn = $('<button type="button" class="btn btn-sm btn-flat btn-success btn-r-img" data-name="' + this.files.item(i).name + '"><i class="fa fa-trash"></i></button>');
      let img = $('<img src="' + URL.createObjectURL(this.files[i]) + '" class="imgs-preview"/>');
      div.append(img);
      div.append(btn);
      $("#preview").append(div);
    };

    for (let file of this.files) {
      dt.items.add(file);
    }

    this.files = dt.files;

    $('.btn-r-img').click(function() {
      let name = $(this).data('name');
      $(this).parent().remove();
      for (let i = 0; i < dt.items.length; i++) {
        if (name === dt.items[i].getAsFile().name) {
          dt.items.remove(i);
          continue;
        }
      }
      document.getElementById('images').files = dt.files;
    });
  });

  $('.btn-r-def-img').click(function() {
    let id = $(this).val();
    $(this).parent().remove();
    $("form[name='announcement_edit']").append('<input type="hidden" name="hidden_image[]" value="' + id + '">');
  });
</script>