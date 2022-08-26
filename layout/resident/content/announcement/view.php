<div class="row" style="margin-top:30px">
  <div class="col-md-2">
  </div>
  <div class="col-md-4">

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">

        <?php if (!empty($data->images)) {
          $ctr = 1; ?>
          <?php foreach ($data->images as $res) { ?>
            <li data-target="#carousel-example-generic" data-slide-to="0" class="<?= ($ctr == 1) ? "active" : "" ?>"></li>
          <?php $ctr++;
          } ?>
        <?php } ?>
      </ol>
      <div class="carousel-inner">


        <?php if (!empty($data->images)) {
          $ctr = 1; ?>
          <?php foreach ($data->images as $res) { ?>

            <div class="item<?= ($ctr == 1) ? " active" : "" ?>">
              <center>
                <img src="<?= BASE_URL . "files/announcement/" . $res['image']; ?>" alt="First slide" style="height:441px;object-fit:fill">
              </center>
              <div class="carousel-caption">

              </div>
            </div>
          <?php $ctr++;
          } ?>
        <?php } ?>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="fa fa-angle-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="fa fa-angle-right"></span>
      </a>
    </div>
  </div>
  <div class="col-md-4">
    <h1>
      <strong><?= $data->title; ?></strong>!
    </h1>
    <h4>
      <?= $data->description; ?>
    </h4>
  </div>
</div>