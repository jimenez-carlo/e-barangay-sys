  <script src="js/fslightbox.js"></script>
  <!-- Page Content-->
  <div class="container px-4 px-lg-5">
      <section class="py-5 text-center container">
          <div class="row py-lg-2">
              <div class="col-lg-6 col-md-8 mx-auto">
                  <h1 class="fw-light">Gallery</h1>
              </div>
          </div>
      </section>

      <div class="album pb-5">
          <div class="container">
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  <?php foreach ($data['gallery'] as $res) { ?>
                      <div class="col">
                          <div class="card shadow-sm" style="position: relative;">
                              <a data-fslightbox="gallery" href="<?= BASE_URL . "assets/gallery/" . $res['image'] ?>" data-caption="<h3><?= $res['label'] ?></h3>">
                                  <img src="<?= BASE_URL . "/assets/gallery/" . $res['image']; ?>" class="bd-placeholder-img card-img-top" alt="" height="225" width="100%" style="object-fit:unset!important">
                              </a>
                              <p style="position: absolute;padding:5px" class="text-light"><?= $res['label'] ?></p>
                          </div>
                      </div>
                  <?php } ?>

              </div>
          </div>
      </div>
  </div>