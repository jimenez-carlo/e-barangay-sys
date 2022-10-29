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
</head>

<style>
  html {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
  }

  h1 {
    font-size: 20px;
  }

  h2 {
    font-size: 18px;
  }

  p>span {
    font-weight: bold;
  }

  .p-1 {
    font-size: 15.5px;
    margin-bottom: 50px;
    text-align: left;
    padding: 0px 36px;
  }

  .right {
    /* float:right; */
    /* border-top: 1px solid black; */
    position: relative;
    width: 493.98425197px;
  }

  .container {
    display: flex;
  }

  .left {
    /* float: left; */
    background-image: url(logo-left.jpg);
    background-repeat: round;
    height: 945.25984252px;
    width: 179.52755906px;
    object-fit: contain;
  }

  .main-container {
    text-align: center;
    width: 47.5%;
    margin-right: auto;
    margin-left: auto;
    background-image: url(watermark.png);
    background-position-x: 114px;
    background-repeat: no-repeat;
    background-position-y: 122px;
  }

  table {
    width: 100%;
    padding: 0px 36px;
    margin-bottom: 70px;
  }

  .header {

    border-bottom: black 1px solid;
    display: flex;
  }

  @media print {
    html {
      -webkit-print-color-adjust: exact !important;
      color-adjust: exact !important;
    }

    .main-container {
      width: 100%;
    }
  }
</style>

<body onload="window.print()">
  <div class="main-container">
    <div class="container">
      <div class="left"></div>
      <div class="right">
        <div class="header">
          <h2 style="margin-left: 15%;margin-top: 50px;">OFFICE OF BARANGAY CHAIRMAN</h2>
          <img src="logo-right.jpg" alt="" style="position: absolute;height: 83px;width:83px;top:2px;right: 0;">
        </div>
        <h1 style="margin-top:50px;margin-bottom: 70px;font-style: italic;">
          CERTIFICATE OF RESIDENCY
        </h1>
        <p class="p-1">This is to certify that <span style="text-decoration: underline;"><?php echo $data->first_name, " ", $data->middle_name[0], ", ", $data->last_name; ?></span> is a resident of this barangay with postal address <span style="text-decoration: underline;"><?php echo $data->house_no, ", " . strtolower($data->barangay_name) . ", " . strtolower($data->city_name); ?></span> since birth.</p>
        <p class="p-1">This certification is being issued upon the request of <span style="text-decoration: underline;"><?php echo $data->first_name, " ", $data->middle_name[0], ", ", $data->last_name; ?></span> Renewal of Solo-Parent I.D.</p>
        <p style="margin-left:18px;text-align:left;margin-bottom: 50px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Issued this <span style="text-decoration: underline;">
            <?php echo date('d') ?>
            day of
            <?php echo date("M") ?>,
            <?php echo date("Y") ?></span> at Wawa, Taguig City.</p>
        <h1 style="margin-bottom: 100px;"></h1>
        <div style="display:flex">
          <div style="margin-left:30px;width: 50%;">

          </div>
          <div style="width:50%;">
            <i>Approved by:</i>
            <p style="margin-top:50px">______________________</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>