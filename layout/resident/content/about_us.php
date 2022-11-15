<?php $default = $data['default_data']; ?>
<?php $officers = $data['officers']; ?>
<?php $layers = $data['layers']; ?>
<style>
  .box-mg {
    margin: 0px 10px;
  }
</style>
<div class="row" style="margin-top:30px">

  <div class="col-md-2">
  </div>

  <div class="col-md-8">
    <center>
      <div class="box">
        <div class="box-header" style="padding:unset">
          <h1>About Us</h1>
        </div>
        <div class="box-body">
          <?= $default->about ?>
        </div>
        <div class="box-footer">
        </div>
      </div>
    </center>
  </div>

</div>
<div>

  <div class="col-md-2">
  </div>
  <div class="col-md-4">
    <center>
      <div class="box">
        <div class="box-header" style="padding:unset">
          <h1>Mission</h1>
        </div>
        <div class="box-body">
          <?= $default->mission ?>
        </div>
        <div class="box-footer">
        </div>
      </div>
    </center>
  </div>
  <div class="col-md-4">
    <center>
      <div class="box">
        <div class="box-header" style="padding:unset">
          <h1>Vision</h1>
        </div>
        <div class="box-body">
          <?= $default->vision ?>
        </div>
        <div class="box-footer">
        </div>
      </div>
    </center>
  </div>
  <div class="col-md-4">
  </div>
  <div class="col-md-12">
    <div style="margin-top:30px">
    </div>

    <?php foreach ($layers as $res) { ?>

      <div class="row">
        <div class="col-md-5">
        </div>
        <div class="col-md-2" style="display:flex;justify-content:space-around">
          <?php foreach ($officers as $subres) { ?>
            <?php if ($subres['column'] == $res['id']) { ?>
              <div class="col-md-2" style="display: flex;justify-content: center;margin-right:90px">



                <div class="box" style="width: 140px;margin-top:10px;background:unset;border:unset;box-shadow:unset">
                  <div class="box-header" style="padding:unset">
                    <img class="img-responsive" src="<?= BASE_URL . "assets/officer/" . $subres['image']; ?>" alt="Photo" style="height:120px;max-height:120px!important;min-width:120px;width:100%;object-fit:fill!important;border-radius:50%">
                  </div>
                  <div class="box-body" style="height: 120px;border:unset">
                    <h4 class="text-center"><?= $subres['position'] ?> <br><?= $subres['name'];  ?></h4>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } ?>

        </div>
        <div class="col-md-5">
        </div>
      </div>
    <?php } ?>



  </div>
</div>