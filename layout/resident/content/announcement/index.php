        <section class="content">
          <div class="row" style="padding-bottom:50px;">
            <div class="col-xs-4">
            </div>
            <div class="col-xs-5" style="text-align:center;">
              <h1>
                <i class="fa fa-bullhorn"></i> Announcements
              </h1>
              <h4>
                This is the Announcements page that will serve as the bulletin board of the e barangay website of Barangay Wawa, Taguig City. Get the latest updates happening here at the barangay by going in the Announcement page.
              </h4>
            </div>

          </div>

          <div class="row">

            <?php foreach ($list as $res) { ?>
              <div class="col-md-3">
                <div class="box">
                  <div class="box-header" style="padding:unset">
                    <img class="img-responsive" src="<?= BASE_URL . "files/announcement/" . $res['image']; ?>" alt="Photo" style="min-height:284px!important;max-height:284px!important;width:100%;object-fit:fill">
                  </div>
                  <div class="box-body bg-green">
                    <h4><?= $res['title'] ?></h4>
                    <p class="card-text  text text-light pull-right" style="font-size:12px"><i>Posted on <?= format_date($res['created_date']); ?></i></p>
                    <button type="submit" class="btn btn-success btn-sm btn-flat btn-view" name="resident/announcement/view" value="<?= $res['id']; ?>">View More <i class=" fa fa-eye"></i></button>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </section>