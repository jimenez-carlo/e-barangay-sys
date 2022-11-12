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
$base = new Base($conn);
$record = $user->get_id($_GET['pair']);
$data = $user->get_user($record->requester_id);
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
  <title>Document</title>
</head>

<body onload="window.print()">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica, sans-serif;
      font-size: .7rem;
    }

    * {
      box-sizing: border-box;
    }

    .container {
      width: 390px;
      height: 250px;
      border: 1.5px solid black;
      margin-top: 10vh;
      border-radius: 5%;
      padding: 13px 4px 0px 4px;
      position: relative;
      background: url(logo-modified.png) !important;
      background-size: contain !important;
      background-position: bottom !important;
      background-repeat: no-repeat !important;
      background-color: #01b095 !important;
      background-blend-mode: screen;
    }

    .picture {
      background: white;
      height: 120px;
      width: 99px;
      position: absolute;
      left: 0;
      margin-left: 4px;
    }

    .header {
      width: 200px;
      position: absolute;
      left: 111px;
      top: 0;
    }

    .logo {
      height: 57px;
      position: absolute;
      top: 6px;
      right: 24px;
    }

    .full_name {
      display: flex;
      position: absolute;
      width: 250px;
      right: 28px;
      top: 70px;
      flex-direction: column;
    }

    .full_name>h2 {
      border-bottom: 3px solid;
      margin-bottom: -5px;
    }

    .full_name>p {
      font-weight: 700;
      margin-bottom: -5px;
    }

    .address {
      display: flex;
      flex-direction: column;
      position: relative;
      top: 102px;
      right: -40px;
      width: 250px;
      font-size: 9px;
    }

    .address>h2 {
      border-bottom: 3px solid;
      margin-bottom: -5px;
    }

    .address>p {
      font-weight: 700;
      margin-bottom: -5px;
      font-size: 11.2px;
    }

    .content {
      display: block;
      position: absolute;
      bottom: 41px;
    }

    .applicant {
      display: flex;
      flex-direction: column;
      position: absolute;
      left: 0px;
      top: 129px;
      width: 103px;
      font-size: 11px;
      font-weight: 700;
    }

    .applicant_title {
      margin-top: -9px;
      font-weight: 800;
    }

    .signature {
      position: absolute;
      display: flex;
      bottom: -5px;
      width: 100%;
      flex-direction: column;
    }

    .chairman {
      border-top: 2px solid;
      width: 200px;
      align-self: center;
    }


    label>span {
      font-weight: bold;
      width: 100%;
      font-size: 1.17em;
      justify-content: flex-start;
      border-bottom: 1px solid black;
    }

    div>label {
      text-align: left;
      align-self: flex-start;
      width: 100%;
    }

    .backinfo {
      width: 50%;
      display: flex;
      flex-direction: column;
    }

    .backinfo>p {
      margin: 0px;
    }

    .backinfo>p.val {
      font-size: 13px;
      font-weight: bold;
      white-space: nowrap;
    }

    @media print {
      .container {
        -webkit-print-color-adjust: exact !important;
        color-adjust: exact !important;
      }
    }
  </style>

  <center>
    <div class="container">
      <img src="<?= BASE_URL . 'files/id/' . $record->picture; ?>" alt="" class="picture">
      <h3 class="header">Republic of the Phillipines
        Wawa, Taguig</h3>
      <img src="logo.png" alt="" class="logo">
      <div class="full_name">
        <h2> <?php echo (($data->suffix_id != 1) ? $data->suffix_name : '')  . " " . $data->first_name, " ", $data->middle_name[0], ", ", $data->last_name; ?></h2>
        <p class="label_name">Name</p>
      </div>
      <div class="address">
        <h2><?= ucfirst(strtolower($data->house_no)) . " ," . ucfirst(strtolower($data->barangay_name)) . ", " . ucfirst(strtolower($data->city_name)); ?></h2>
        <p class="label_name2">Address</p>
      </div>
      <div class="content">
        <p>
          This is to certify that the bearer of this Barangay Identification
          Card is a bonafide resident of this barangay
        </p>
      </div>
      <div class="applicant">
        <p>Applicant</p>
        <p class="applicant_title"><?= $record->id . '-' . strtolower($data->gender_name[0]); ?></p>
      </div>
      <div class="signature">
        <img src="" alt="" class="signature_img">
        <p class="chairman">PHILLIP E. BUENAFLOR<br>Barangay Chairman</p>
      </div>
    </div>
    <div class="container" style="margin-top: 2rem;padding-left:1rem;background-image: unset!important;">
      <div style="display: flex; margin-bottom: 2rem;">
        <div style="display: flex;flex-direction:column;margin-right:1rem">
          <label>Birthday: <span><?= date("F j, Y", strtotime($data->birth_date)); ?></span></label>
          <label>Gender/Status: <span><?= $data->marital_status_name . '/' . ucfirst(strtolower($data->gender_name)); ?></span></label>
        </div>
        <div style="display: flex;flex-direction:column;width: 50%;justify-content: flex-start;">
          <label>Birth Place:<span style="display: inline-flex;width:60%"><?= $data->birth_place; ?></span></label>
          <label>VIN:<span style="display: inline-flex;width:80%"></span></label>
        </div>

      </div>
      <div style="display:flex;">

        <div class="backinfo">
          <p>In case of Emergency please notify </p>
          <p class="val"><?= strtoupper($data->first_name . " ," . $data->middle_name[0] . ", " . $data->last_name); ?></p>
          <p style="border-top:1px solid black">Name</p>
          <p class="val"><?= ucfirst(strtolower($data->house_no)) . " ," . ucfirst(strtolower($data->barangay_name)) . ", " . ucfirst(strtolower($data->city_name)); ?></p>
          <p style="border-top:1px solid black">Address</p>
          <p class="val"><?= $data->contact_no; ?></p>
          <p style="border-top:1px solid black">Contact Number</p>
        </div>
        <div style="display: flex; width: 50%;flex-direction: column;">

          <div src="" alt="resident_thumb" style=" border: solid 1px black;height: 91px;width: 70%;margin-left: 20px;margin-bottom: 10px;background-color: white;"></div>
          <label for="" style="text-align: center;align-self: center;margin-left: -10px;width: unset;">Thumb mark</label>
        </div>
      </div>
      <div style="display:flex">
        <div style="display: flex;flex-direction:column;margin-right:1rem">
          <label for="" style="white-space: nowrap;">Date Issued: <span><?= date("F j, Y", strtotime($record->issued_date)); ?></span></label>
          <label for="" style="white-space: nowrap;">Date of Validity:<span><?= date("F j, Y", strtotime($record->expire_date)); ?></span></label>
        </div>
        <div style="display:flex;flex-direction:column;width: 50%;">

          <img src="<?= BASE_URL . 'files/signature/' . $record->signature; ?>" alt="resident_signature" style="border-bottom: 1px solid black;align-items: start;display: flex;justify-self: end;height: 32px;width: 100%;">

        </div>
      </div>
      <p style="display: block;position: absolute;right: 75px;bottom: 1px;">Signature</p>
    </div>
  </center>



</body>

</html>