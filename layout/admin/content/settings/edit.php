<section class="content-header">
  <h1>
    <i class="fa fa-cog"></i>
    System Editing
  </h1>
</section>
<form role="form" name="settings_edit" enctype="multipart/form-data">
  <input type="hidden" name="id" value="1">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-home"></i>
            <h4 class="box-title">Home Page</h4>
          </div>
          <div class="box-body">
            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">*Title:</label>
              <input type="text" class="form-control" placeholder="Title" name="home_title" id="home_title" value="<?= $data->home_title; ?>">
            </div>

            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">*Description:</label>
              <textarea class="form-control" row="10" name="home_description" id="home_description" placeholder="Description"><?= $data->home_description; ?></textarea>
            </div>
            <div class="form-group col-xs-12">
              <label for="img-input">*Carousel Images </label> <br>
              <button type="button" class="btn btn-sm btn-success btn-flat btn-select-images"><i class="fa fa-picture-o"> </i> Select Images</button>
              <input type="file" name="images[]" accept="image/*" id="images" multiple>
              <p class="help-block">Preview here</p>
              <div id="preview" style="display:flex;overflow: scroll;">
                <?php if (!empty($data->home_images)) { ?>
                  <?php foreach ($data->home_images as $res) { ?>
                    <div style="position:relative;margin-right:20px"><img src="<?= BASE_URL . "assets/home/" . $res['image']; ?>" class="imgs-preview">
                      <button type="button" class="btn btn-sm btn-flat btn-success btn-r-def-img" value="<?= $res['id']; ?>"><i class="fa fa-trash"></i></button>
                    </div>
                  <?php } ?>
                <?php } ?>
              </div>
            </div>
          </div>


          <div class="box-header with-border">
            <i class="fa fa-picture-o"></i>
            <h4 class="box-title">Gallery</h4>
          </div>
          <div class="box-body">
            <div class="form-group col-xs-12">
              <label for="img-input">*Images </label> <br>
              <button type="button" class="btn btn-sm btn-success btn-flat btn-select-images2"><i class="fa fa-picture-o"> </i> Select Images</button>
              <input type="file" name="gallery_image[]" accept="image/*" id="images2" multiple>
              <p class="help-block">Preview here</p>
              <div id="preview2" style="display:flex;overflow: scroll;">
                <?php if (!empty($data->gallery)) { ?>
                  <?php foreach ($data->gallery as $res) { ?>
                    <div style="position:relative;margin-right:20px"><img src="<?= BASE_URL . "assets/gallery/" . $res['image']; ?>" class="imgs-preview">
                      <button type="button" class="btn btn-sm btn-flat btn-success btn-r-def-img" value="<?= $res['id']; ?>"><i class="fa fa-trash"></i></button>
                      <input type="text" name="gallery_label[<?= $res['id']; ?>]" class="form-control" placeholder="Label" value="<?= $res['label']; ?>">
                      <input type="hidden" name="gallery_id[<?= $res['id']; ?>]" value="<?= $res['id']; ?>">
                    </div>
                  <?php } ?>
                <?php } ?>
              </div>
            </div>
          </div>

          <div class="box-header with-border">
            <i class="fa fa-info-circle"></i>
            <h4 class="box-title">About Us</h4>
          </div>
          <div class="box-body">

            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">*About Us:</label>
              <textarea class="form-control" row="10" name="about" id="about" placeholder="About Us"><?= $data->about; ?></textarea>
            </div>
            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">*Mission:</label>
              <textarea class="form-control" row="10" name="mission" id="mission" placeholder="Mission"><?= $data->mission; ?></textarea>
            </div>
            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">*Vision:</label>
              <textarea class="form-control" row="10" name="vision" id="vision" placeholder="Vission"><?= $data->vision; ?></textarea>
            </div>

            <div class="form-group col-xs-12">
              <label for="img-input">*Officers </label> <br>
              <button type="button" class="btn btn-sm btn-success btn-flat btn-select-images3"><i class="fa fa-picture-o"> </i> Select Images</button>
              <input type="file" name="officer_image[]" accept="image/*" id="images3" multiple>
              <p class="help-block">Preview here</p>
              <div id="preview3" style="display:flex;overflow: scroll;">
                <?php if (!empty($data->officers)) { ?>
                  <?php foreach ($data->officers as $res) { ?>
                    <div style="position:relative;margin-right:20px"><img src="<?= BASE_URL . "assets/officer/" . $res['image']; ?>" class="imgs-preview">
                      <button type="button" class="btn btn-sm btn-flat btn-success btn-r-def-img" value="<?= $res['id']; ?>"><i class="fa fa-trash"></i></button>
                      <input type="text" name="officer_name[<?= $res['id']; ?>]" class="form-control" placeholder="Officer Name" value="<?= $res['name']; ?>">
                      <input type="text" name="officer_position[<?= $res['id']; ?>]" class="form-control" placeholder="Position" value="<?= $res['position']; ?>">
                      <input type="number" name="officer_row[<?= $res['id']; ?>]" class="form-control" placeholder="Row" value="<?= $res['column']; ?>">
                      <input type="hidden" name="officer_id[<?= $res['id']; ?>]" value="<?= $res['id']; ?>">
                    </div>
                  <?php } ?>
                <?php } ?>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <div class="btn-group">
              <button type="submit" class="btn btn-sm btn-success btn-flat" name="settings_edit"><i class="fa fa-edit"></i> Update</button>
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
  $(".btn-select-images2").on('click', function(e) {
    $('#images2').trigger('click');
  });
  $(".btn-select-images3").on('click', function(e) {
    $('#images3').trigger('click');
  });

  var dt = new DataTransfer();
  var dt2 = new DataTransfer();
  var dt3 = new DataTransfer();

  $("#images").on('change', function(e) {
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


  $("#images2").on('change', function(e) {
    for (var i = 0; i < this.files.length; i++) {
      let div = $('<div style="position:relative;margin-right:20px"></div>');
      let btn = $('<button type="button" class="btn btn-sm btn-flat btn-success btn-r-img2" data-name="' + this.files.item(i).name + '"><i class="fa fa-trash"></i></button><input type="text" name="gallery_new_label[]" class="form-control" placeholder="Label">');
      let img = $('<img src="' + URL.createObjectURL(this.files[i]) + '" class="imgs-preview"/>');
      div.append(img);
      div.append(btn);
      $("#preview2").append(div);
    };

    for (let file of this.files) {
      dt2.items.add(file);
    }

    this.files = dt2.files;

    $('.btn-r-img').click(function() {
      let name = $(this).data('name');
      $(this).parent().remove();
      for (let i = 0; i < dt2.items.length; i++) {
        if (name === dt2.items[i].getAsFile().name) {
          dt2.items.remove(i);
          continue;
        }
      }
      document.getElementById('images2').files = dt2.files;
    });
  });

  $("#images3").on('change', function(e) {
    for (var i = 0; i < this.files.length; i++) {
      let div = $('<div style="position:relative;margin-right:20px"></div>');
      let btn = $('<button type="button" class="btn btn-sm btn-flat btn-success btn-r-img3" data-name="' + this.files.item(i).name + '"><i class="fa fa-trash"></i></button><input type="text" name="officer_new_name[]" class="form-control" placeholder="Officer Name"><input type="text" name="officer_new_position[]" class="form-control" placeholder="Position"><input type="number" name="officer_new_row[]" class="form-control" placeholder="Row">');
      let img = $('<img src="' + URL.createObjectURL(this.files[i]) + '" class="imgs-preview"/>');
      div.append(img);
      div.append(btn);
      $("#preview3").append(div);
    };

    for (let file of this.files) {
      dt3.items.add(file);
    }

    this.files = dt3.files;

    $('.btn-r-img').click(function() {
      let name = $(this).data('name');
      $(this).parent().remove();
      for (let i = 0; i < dt3.items.length; i++) {
        if (name === dt3.items[i].getAsFile().name) {
          dt3.items.remove(i);
          continue;
        }
      }
      document.getElementById('images3').files = dt3.files;
    });
  });

  $('.btn-r-def-img').click(function() {
    let id = $(this).val();
    $(this).parent().remove();
    $("form[name='settings_edit']").append('<input type="hidden" name="delete_home_image[]" value="' + id + '">');
  });
  $('.btn-r-def-img2').click(function() {
    let id = $(this).val();
    $(this).parent().remove();
    $("form[name='settings_edit']").append('<input type="hidden" name="delete_gallery_image[]" value="' + id + '">');
  });
  $('.btn-r-def-img3').click(function() {
    let id = $(this).val();
    $(this).parent().remove();
    $("form[name='settings_edit']").append('<input type="hidden" name="delete_officer_image[]" value="' + id + '">');
  });
</script>