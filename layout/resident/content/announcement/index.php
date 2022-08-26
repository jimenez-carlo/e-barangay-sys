        <section class="content">
          <div class="row" style="padding-bottom:50px;">
            <div class="col-xs-4">
            </div>
            <div class="col-xs-5" style="text-align:center;">
              <h1>
                <i class="fa fa-bullhorn"></i> Announcements
              </h1>
              <h4>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere cursus ante et vehicula. Mauris nec porta nibh. Suspendisse magna dolor, rutrum eu pharetra non, tempor mattis nisl. pharetra, lacus vitae commodo vestibulum, nulla tortor rhoncus justo, et eleifend turpis tellus nec mi. Ut condimentum mollis odio tempor rhoncus.
              </h4>
            </div>

          </div>

          <div class="row">

            <?php foreach ($list as $res) { ?>
              <div class="col-md-3">
                <div class="box">
                  <div class="box-header" style="padding:unset">
                    <img class="img-responsive" src="<?= BASE_URL . "files/announcement/" . $res['image']; ?>" alt="Photo" style="max-height:284px!important;width:100%;object-fit:fill">
                  </div>
                  <div class="box-body bg-green">
                    <h4><?= $res['title'] ?></h4>
                    <button type="submit" class="btn btn-success btn-sm btn-flat btn-view" name="resident/announcement/view" value="<?= $res['id']; ?>">View More <i class=" fa fa-eye"></i></button>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </section>