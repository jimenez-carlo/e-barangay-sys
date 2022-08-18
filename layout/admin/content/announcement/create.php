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
              <label for="exampleInputFile">*Images </label>
              <input type="file" name="images[]" accept="image/*" id="images" multiple>
              <p class="help-block">Preview here</p>
              <div id="preview" style="display:flex"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-success btn-flat btn-remove-images"><i class="fa fa-trash"> </i> Remove Images</button>
            <button type="reset" class="btn btn-sm btn-success btn-flat"><i class="fa fa-times"></i> Reset</button>
            <button type="submit" class="btn btn-sm btn-success btn-flat" name="announcement_create"><i class="fa fa-save"></i> Save</button>
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

  var img = document.getElementById('images');
  var preview = document.getElementById('preview');

  img.onchange = evt => {
    preview.innerHTML = '';
    var files = img.files
    for (var i = 0; i < files.length; i++) {

      var div = document.createElement('div');
      div.style.position = 'relative';
      div.style.marginRight = '20px';

      // var button = document.createElement("button");
      // button.classList.add('btn', 'btn-sm', 'btn-flat', 'btn-success');
      // button.setAttribute("type", "button");
      // button.innerHTML = '<i class="fa fa-times"></i>';
      // button.style.position = 'absolute';
      // button.style.right = 0;

      // button.addEventListener('click', function() {
      //   this.parentNode.remove();
      // });

      var newImg = document.createElement("img");
      newImg.style.background = '#111111';
      newImg.style.width = '200px';
      newImg.style.height = '200px';
      newImg.style.objectFit = 'contain';
      newImg.src = URL.createObjectURL(files[i]);

      // div.appendChild(button);
      div.appendChild(newImg);
      preview.appendChild(div);
    }

  }

  var btn = document.querySelector('.btn-remove-images');
  btn.addEventListener('click', function() {
    img.value = '';
    preview.innerHTML = '';
  });
</script>