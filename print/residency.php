<?php if (!isset($_GET['code'])  && date('Ymd') > base64_decode($_GET['code'])) {  ?>
  <?= base64_decode($_GET['code']) ?>
  <h1><b>404 Page Not Found!</b></h1>
  <h3>This Page Does Not Exists.</h3>
  <?php die; ?>
<?php }
require('../config/functions.php');
require('../db/conn.php');
require('../class/base.php');
require('../class/user.php');

$user = new User($conn);
$data = $user->get_user(base64_decode($_GET['pair']));
$official = $user->get_user($_SESSION['user']->id);


if (!$data) {
  var_dump(base64_decode($_GET['pair']));
  echo '<h1><b>404 Page Not Found!</b></h1>
        <h3>This Page Does Not Exists.</h3>';
  die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Residency</title>
  <link rel="icon" type="image/x-icon" href="../assets/favicon_v2.ico" />
</head>

<body onload="window.print()">
  <div class="container">
    <div class="row" style="text-align: center;">
      <!--<div class="col-md-4"><img src="../../img/logo.png" style="width: 30%"></div>-->
      <div class="col-md-4">&nbsp;</div>
      <div class="col-md-4">
        <p>Republic of the Philippines<br>Province of Albay<br>Municipality of Sto. Domingo<br></p>
        <h1 class="h1">Innobarangay Proper</h1>
      </div>
      <div class="col-md-4"> &nbsp;</div>
    </div>
    <div class="row" style="text-align: center;">
      <hr>
      <div>
        <h4 class="header1"><b>OFFICE OF THE BARANGAY CAPTAIN</b></h4>
        <h1 class="header1"><b>BARANGAY CERTIFICATE OF RESIDENCY</b></h1>
        <img src="logo.png" alt="" class="logo" style="
    position: absolute;
    top: 5%;
    left: 10%;
">
      </div>
    </div>
    <div class="row">
      <div>
        <h6 class="header1" style="margin-left: 30px;"><b>TO WHOM IT MY CONCERN:</b></h6>
      </div>
      <div>
        <br>
        <p style="margin-left: 60px;">this is to certify that <u>
            <?php echo $data->first_name, " ", $data->middle_name[0], " ", $data->last_name; ?>
          </u>, <u>
            <?php echo date_diff(date_create($data->birth_date), date_create('now'))->y, " " ?>
          </u> of legal age, <u>
            <?php echo $data->marital_status_name, " "; ?>
          </u>, Filipino citizen, whose specimen signature appears below is a <b>PERMANENT RESIDENT</b> of this barangay,
          Cupang proper
        </p>
        <br>

        <p style="margin-left: 80px">based on records of this office, she has been residing at barangay cupang proper</p>
        <p style="margin-left: 80px">this CERTIFICATION is being issued upon the request of the aboved-named person for
          whatever legal purpose it may serve </p>
        <br>
        <p style="margin-left: 60px"><b>ISSUED</b> this <u>
            <?php echo date('d') ?>
          </u> day of
          <?php echo date("M") ?>,
          <?php echo date("Y") ?> at Barangay Cupang proper, Sto. Domingo, Albay upon request of the interested party for
          whatever legal purposes it may serve.
        </p>
      </div>
    </div>
    <div class="row" style="text-align: right; margin-right: 40px; margin-top: 30px;">
      <div>
        <h5><b><u><?= $official->first_name . " " . $official->middle_name . " " . $official->last_name; ?></u></b></h5>
        <h6><?= $official->barangay_position; ?></h6>
      </div>
    </div>
    <div class="row" style="margin-left: 60px; margin-top: 50px;">
      <div>
        <p>Date Issued: <u>
            <?php echo date("d:M:Y") ?>
          </u></p>

      </div>
    </div>
  </div>
</body>

</html>