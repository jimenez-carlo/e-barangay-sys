        <section class="content-header">
          <h1>
            <i class="fa fa-dashboard"></i> Dashboard

          </h1>
          <br>
        </section>

        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $data->resident->count; ?></h3>
              <p>Verified Residents</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $data->members->count; ?></h3>
              <p>Barangay Members</p>
            </div>
            <div class="icon">
              <i class="ion-ios-person"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $data->request->count; ?></h3>
              <p>Requests </p>
            </div>
            <div class="icon">
              <i class="ion-document-text"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $data->blotter->count; ?></h3>
              <p>Blotter Cases</p>
            </div>
            <div class="icon">
              <i class="ion-person-stalker"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $data->announcement->count; ?></h3>
              <p>Announcements</p>
            </div>
            <div class="icon">
              <i class="ion-speakerphone"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>