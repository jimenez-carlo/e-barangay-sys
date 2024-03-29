<?php if (!isset($_GET['code'])  && date('Ymd') > base64_decode($_GET['code'])) {  ?>
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
  <title>Barangay Clearance</title>
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

  .b {
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
        <h1 style="margin-top:50px;margin-bottom: 70px;">
          -BARANGAY CLEARANCE
        </h1>
        <p class="p-1">This is to certify that <span style="text-decoration: underline;"><?php echo (($data->suffix_id != 1) ? $data->suffix_name : '') . " " . $data->first_name, " ", $data->middle_name[0], ", ", $data->last_name; ?></span> is a resident of this barangay.</p>

        <p> Residing at <span style="text-decoration: underline;"><?php echo $data->house_no, ", " . strtolower($data->barangay_name); ?></span> <span class="b">Wawa Taguig City</span></p>
        <table>
          <tr>
            <td style="text-align:left;font-weight: bold;">Date of Birth:</td>
            <td><?= $data->birth_date; ?></td>
            <td style="text-align:left;font-weight: bold;">Birth Place:</td>
            <td><?= strtoupper($data->birth_place); ?></td>
          </tr>
          <tr>
            <td style="text-align:left;font-weight: bold;">Gender Status:</td>
            <td><?= $data->gender_name; ?></td>
            <td style="text-align:left;font-weight: bold;">Religion:</td>
            <td><?= strtoupper($data->religion); ?></td>
          </tr>
        </table>
        <p style="margin-left:18px;text-align:left;margin-bottom: 50px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp This certification is being issued upon the request of the aforesaid person for </p>
        <h1 style="margin-bottom: 100px;">“REQUEST INFO”</h1>
        <div style="display:flex">
          <div style="margin-left:30px;text-align: left;width: 50%;">
            <p style="font-weight:bold;">Thumb Mark<br><br>Right</p>
            <p style="margin-top:100px">____________________</p>
            <p>Signature over printed name</p>
          </div>
          <div style="width:50%;">
            <i>Approved by:</i>
            <p style="margin-top:50px"><u>Phillip E. Buenaflor</u></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>