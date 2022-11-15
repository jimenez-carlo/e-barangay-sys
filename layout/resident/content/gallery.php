  <script src="js/fslightbox.js"></script>
  <section class="content">
    <div class="row" style="padding-bottom:50px;">
      <div class="col-xs-4">
      </div>
      <div class="col-xs-5" style="text-align:center;">
        <h1>
          <i class="fa fa-picture-o"></i> Gallery
        </h1>
      </div>

    </div>
    <div class="row">

      <?php foreach ($data['gallery'] as $res) { ?>


        <div class="col-md-3">
          <div class="box">
            <div class="box-header" style="padding:unset;position: relative;">
              <a data-fslightbox="gallery" href="<?= BASE_URL . "assets/gallery/" . $res['image'] ?>" data-caption="<h3><?= $res['label'] ?></h3>">
                <img class="img-responsive" src="<?= BASE_URL . "assets/gallery/" . $res['image'] ?>" alt="Photo" style="height:284px;max-height:284px!important;width:100%;object-fit:cover">
              </a>
              <p style="position: absolute;padding:5px;top:0;color:white"><?= $res['label'] ?></p>
            </div>
          </div>
        </div>
      <?php } ?>


    </div>

  </section>