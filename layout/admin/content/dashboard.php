        <section class="content-header">
          <h1>
            <i class="fa fa-dashboard"></i> Dashboard

          </h1>
          <br>
        </section>

        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $data->resident_pending->count; ?></h3>
              <p>Pending Residents</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/resident" value="1">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $data->resident->count; ?></h3>
              <p>Verified Residents</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/resident" value="2">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $data->members->count; ?></h3>
              <p>Barangay Members</p>
            </div>
            <div class="icon">
              <i class="ion-person-stalker"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/members">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $data->blotter_total->count; ?></h3>
              <p>Incident Reports</p>
            </div>
            <div class="icon">
              <i class="ion-person-stalker"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/blotter">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $data->business_total->count; ?></h3>
              <p>Total Business Clearance Requests</p>
            </div>
            <div class="icon">
              <i class="ion-document-text"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/business">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $data->business_pending->count; ?></h3>
              <p>Pending Business Clearance </p>
            </div>
            <div class="icon">
              <i class="ion-document-text"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/business" value="1">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $data->business_approved->count; ?></h3>
              <p>Approved Business Clearance </p>
            </div>
            <div class="icon">
              <i class="ion-document-text"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/business" value="2">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $data->business_released->count; ?></h3>
              <p>Released Business Clearance </p>
            </div>
            <div class="icon">
              <i class="ion-document-text"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/business" value="3">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $data->barangay_total->count; ?></h3>
              <p>Total Barangay Clearance Requests</p>
            </div>
            <div class="icon">
              <i class="ion-briefcase"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/barangay">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $data->barangay_pending->count; ?></h3>
              <p>Pending Barangay Clearance </p>
            </div>
            <div class="icon">
              <i class="ion-briefcase"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/barangay" value="1">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $data->barangay_approved->count; ?></h3>
              <p>Approved Barangay Clearance </p>
            </div>
            <div class="icon">
              <i class="ion-briefcase"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/barangay" value="2">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $data->barangay_released->count; ?></h3>
              <p>Released Barangay Clearance </p>
            </div>
            <div class="icon">
              <i class="ion-briefcase"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/barangay" value="3">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $data->id_total->count; ?></h3>
              <p>Total Barangay ID Requests</p>
            </div>
            <div class="icon">
              <i class="ion-card"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/id">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $data->id_pending->count; ?></h3>
              <p>Pending Barangay ID </p>
            </div>
            <div class="icon">
              <i class="ion-card"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/id" value="1">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $data->id_approved->count; ?></h3>
              <p>Approved Barangay ID </p>
            </div>
            <div class="icon">
              <i class="ion-card"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/id" value="2">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $data->id_released->count; ?></h3>
              <p>Released Barangay ID </p>
            </div>
            <div class="icon">
              <i class="ion-card"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/id" value="3">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-gray">
            <div class="inner">
              <h3><?= ($data->business_total->count + $data->barangay_total->count + $data->id_total->count); ?></h3>
              <p>Total Document Requests </p>
            </div>
            <div class="icon">
              <i class="ion-document-text"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-gray">
            <div class="inner">
              <h3><?= $data->announcement->count; ?></h3>
              <p>Announcements</p>
            </div>
            <div class="icon">
              <i class="ion-speakerphone"></i>
            </div>
            <a href="#" class="small-box-footer btn-view" name="admin/announcement">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        </div>