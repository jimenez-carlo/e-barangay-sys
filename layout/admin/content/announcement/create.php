<section class="content-header">
  <h1>
    <i class="fa fa-plus"></i>
    Create Announcement
  </h1>
</section>
<form role="form" name="announcement_create" enctype="multipart/form-data">
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
              <input type="text" class="form-control" placeholder="Title" name="title">
            </div>
            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">*Description:</label>
              <textarea class="form-control" row="10" name="description" placeholder="Announcement Description Here..."></textarea>
            </div>
            <div class="form-group col-xs-6">
              <label>*Start Date:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="start_date">
              </div>
            </div>
            <div class="form-group col-xs-6">
              <label>*End Date:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="end_date">
              </div>
            </div>
            <div class="form-group col-xs-12">
              <label for="img-input">*Images </label> <br>
              <button type="button" class="btn btn-sm btn-success btn-flat btn-select-images"><i class="fa fa-picture-o"> </i> Select Images</button>
              <input type="file" name="images[]" accept="image/*" id="images" multiple>
              <p class="help-block">Preview here</p>
              <div id="preview" style="display:flex"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-sm btn-success btn-flat"><i class="fa fa-times"></i> Reset</button>
            <button type="submit" class="btn btn-sm btn-success btn-flat" name="announcement_create" value="draft"><i class="fa fa-edit"></i> Save As Draft</button>
            <button type="submit" class="btn btn-sm btn-success btn-flat" name="announcement_create" value="publish"><i class="fa fa-book"></i> Publish</button>
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
</script>