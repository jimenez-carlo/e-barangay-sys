<section class="content-header">
  <h1>
    <i class="fa fa-bullhorn"></i>
    View Announcement ID#<?= $data->id; ?>
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
              <input type="text" class="form-control" placeholder="Title" name="title" value="<?= $data->title; ?>" disabled>
            </div>
            <div class="form-group col-xs-12">
              <label for="exampleInputPassword1">*Description:</label>
              <textarea class="form-control" row="10" name="description" placeholder="Announcement Description Here..." disabled><?= $data->description; ?></textarea>
            </div>
            <div class="form-group col-xs-6">
              <label>*Start Date:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="start_date" value="<?= $data->start_date; ?>" disabled>
              </div>
            </div>
            <div class="form-group col-xs-6">
              <label>*End Date:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="end_date" value="<?= $data->end_date; ?>" disabled>
              </div>
            </div>

            <div class="form-group col-xs-12">
              <?php if (!empty($data->images)) { ?>
                <?php foreach ($data->images as $res) { ?>
                  <div class="col-xs-4">
                    <img src="<?= BASE_URL . "files/announcement/" . $res['image']; ?>" class="img-responsive">
                  </div>
                <?php } ?>
              <?php } ?>
            </div>


          </div>
          <div class="modal-footer">

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
</script>