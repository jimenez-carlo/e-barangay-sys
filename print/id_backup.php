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
  <title>Barangay ID</title>
  <link rel="icon" type="image/x-icon" href="../assets/favicon_v2.ico" />
</head>

<body onload="window.print()">
  <aside class="right-side">
    <section class="content">
      <div class="">
        <div class="card" style="text-align:center;">
          <!-- <img src="../../img/user-bg.png" alt="image" style="width: 20%;" /> -->
          <h4><b>
              <?= $data->first_name, " ", $data->middle_name[0], " ", $data->last_name; ?>
            </b></h4>
          <h6><b style="margin-right: 20px;">Gender: </b>
            <?= $data->gender_name; ?>
          </h6>
          <h6><b style="margin-right: 20px;">Age: </b>
            <?= date_diff(date_create($data->birth_date), date_create('now'))->y, " " ?>
          </h6>
          <h6><b style="margin-right: 20px;">Status: </b>
            <?= $data->marital_status_name, " "; ?>
          </h6>
          <!-- <h6><b style="margin-right: 20px;">Zone: </b>
          </h6> -->
        </div>
      </div>
    </section>
  </aside>
</body>

</html>