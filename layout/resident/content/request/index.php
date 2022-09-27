<form role="form" name="resident_create_request" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $data->id; ?>">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">


          <div class="box-body">
            <div class="form-group col-xs-6">
              <h1 class="box-title"> <i class="fa fa-handshake-o"></i> Our Services</h1>
              <h4>Here's our online services offered</h4>
              <ul>
                <li>
                  <h3 style="font-weight:bold">BUSINESS CLEARANCE</h3>
                  <h4>Application/Renewal/Closure</h4>
                  <button type="button" class="form-control btn btn-success btn-flat btn-view" name="resident/business" style="max-width:25%"><i class="fa fa-check"></i> Click to apply</button>
                </li>
                <li>
                  <h3 style="font-weight:bold">BARANGAY CLEARANCE / CERTIFICATE</h3>
                  <h4>Clearance for personal use</h4>
                  <button type="button" class="form-control btn btn-success btn-flat btn-view" name="resident/barangay" style=" max-width:25%"><i class="fa fa-check"></i> Click to apply</button>
                </li>
                <li>
                  <h3 style="font-weight:bold">BARANGAY ID</h3>
                  <h4>Barangay ID for residents of Barangay Fort Bonifacio</h4>
                  <button type="button" class="form-control btn btn-success btn-flat btn-view" name="resident/id" style=" max-width:25%"><i class="fa fa-check"></i> Click to apply</button>
                </li>
              </ul>
            </div>
            <div class="form-group col-xs-6">
              <div class="box-header" style="padding:unset">
                <img class="img-responsive" src="<?= BASE_URL . "assets/services.jpg" ?>" alt="Photo" style="width:100%;">
              </div>
            </div>


          </div>
        </div>
      </div>

      <!-- <div class="col-xs-6">
        <div class="box">

        </div>
      </div> -->

    </div>
  </section>
</form>