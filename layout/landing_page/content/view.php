  <!-- Page Content-->
  <div class="container px-4 px-lg-5">
    <!-- Heading Row-->
    <div class="row gx-4 gx-lg-5 align-items-center pt-5">
      <div class="col-lg-7">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <?php if (count($data->images) > 0) {
              $ctr = 1; ?>
              <?php foreach ($data->images as $res) { ?>
                <div class="carousel-item<?= ($ctr == 1) ? " active" : ""; ?>" data-bs-interval="3000">
                  <a class="nav-link btn-view" href="#" name="landing_page/view"><img src="<?= BASE_URL . "files/announcement/" . $res['image']; ?>" style="height:400px;" class="d-block w-100" alt="<?= $ctr; ?>" /> </a>
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
                <?php $ctr++; ?>
              <?php } ?>
            <?php } ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

      </div>
      <div class="col-lg-5">
        <h1 class="font-weight-light"><?= $data->title; ?></h1>
        <p><?= $data->description; ?></p>

      </div>
    </div>
  </div>
  <script src="js/landing_page_bootstrap.js"></script>
  <script src="js/jquery.js"></script>