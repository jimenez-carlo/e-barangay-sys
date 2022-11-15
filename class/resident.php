<?php
class Resident extends Base
{
  private $conn;
  public function __construct($db)
  {
    parent::__construct($db);
    $this->conn = $db;
  }

  public function set_default_data()
  {
    $data = array();
    $data['request_type'] = $this->get_list("select * from tbl_request_type  where deleted_flag = 0");
    $data['suffix'] = $this->get_list("select * from tbl_suffix ");
    $data['request_status'] = $this->get_list("select * from tbl_request_status  where deleted_flag = 0");
    $data['gender'] = $this->get_list("select * from tbl_gender where deleted_flag = 0");
    $data['marital_status'] = $this->get_list("select * from tbl_marital_status where deleted_flag = 0");
    $data['city'] = $this->get_list("select * from tbl_city where deleted_flag = 0");
    $data['barangay'] = $this->get_list("select * from tbl_barangay where city_id = '12801' and deleted_flag = 0");
    $data['zone'] = $this->get_list("select * from tbl_zone where deleted_flag = 0");
    $data['user_status'] = $this->get_list("select * from tbl_user_status where deleted_flag = 0");
    $data['nationality'] = $this->get_list("select * from tbl_nationality where deleted_flag = 0");
    $data['religion'] = $this->get_list("select * from tbl_religion where deleted_flag = 0");
    return $data;
  }


  public function get_requestor_list()
  {
    extract($this->escape_data($_SESSION));
    return $this->get_list("select r.id,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request r left join tbl_users_info ui on ui.id = r.approver_id inner join tbl_request_type rt on rt.id = r.request_type_id  inner join tbl_request_status rs on rs.id = r.request_status_id where r.requester_id = $user->id and r.request_status_id in (5,6) order by r.updated_date desc");
  }

  public function get_resident_list()
  {
    $order = " r.updated_date desc";
    if (isset($_GET['id']) && !empty($_GET['id'])) {
      $tmp = array(
        1 => "field(r.status_id, 1,2)",
        2 => "field(r.status_id, 2,1)"
      );
      $order = $tmp[$_GET['id']];
    }
    return $this->get_list("select concat(approver.last_name, ', ', approver.first_name,' ', LEFT(approver.middle_name, 1), '[#',approver.id,']') as approver_name,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1)) as resident_name,us.status,b.name as `barangay`, c.name as `city`,ui.contact_no,g.gender,r.*,ui.created_date,ui.updated_date from tbl_users r inner join tbl_users_info ui on ui.id = r.id left join tbl_users_info approver on approver.id = r.approved_by inner join tbl_user_status us on us.id = r.status_id left join tbl_city c on c.id = ui.city_id left join tbl_barangay b on b.id = ui.barangay_id left join tbl_gender g on g.id = ui.gender_id where r.deleted_flag = 0 and r.access_id = 3 order by $order");
  }

  public function get_resident($id = 0)
  {
    $data = new stdClass();

    if (empty($id)) {
      return $data;
    }

    $resident = $this->get_one("select u.username, u.email, u.status_id,u.file,ui.* from tbl_users_info ui inner join tbl_users u on u.id = ui.id where ui.deleted_flag = 0 and ui.id = $id limit 1");
    $data = $resident;
    $data->history = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,sh.* from tbl_user_status_history sh inner join tbl_users_info ui on ui.id = sh.created_by inner join tbl_user_status s on s.id = sh.user_status_id where sh.deleted_flag = 0 and sh.user_id = $id order by sh.created_date desc");
    $data->requests = $this->get_list("select r.id,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request r left join tbl_users_info ui on ui.id = r.updated_by inner join tbl_request_type rt on rt.id = r.request_type_id  inner join tbl_request_status rs on rs.id = r.request_status_id where r.requester_id = $id order by r.updated_date desc");
    $data->blotter = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,b.* from tbl_blotter b inner join tbl_users_info ui on ui.id = b.complainant_id inner join tbl_blotter_status s on s.id = b.blotter_status_id where b.deleted_flag = 0 and b.complainee_id = $id order by b.created_date desc");
    return $data;
  }

  public function update()
  {

    extract($this->escape_data(array_merge($_SESSION, $_POST, $_FILES)));
    $result = $this->response_obj();
    $errors = array();
    $msg = '';

    $required_fields = array();
    // Require Fields
    if ($resident_update == 'update') {
      $required_fields = array('first_name', 'middle_name', 'last_name', 'birth_date', 'birth_place', 'house_no', 'street', 'contact_no', 'username', 'email');
    }

    foreach ($required_fields as $res) {
      if (empty(${$res})) {
        $errors[] = $res;
      }
    }

    if (!empty($errors)) {
      $msg .= "Please Fill Blank Fields!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $errors);
      return $result;
    }

    if ($birth_date > date('Y-m-d')) {
      $result->result = $this->response_error("Birth Date Exceeded!");
      $result->items = implode(',', array('birth_date'));
      return $result;
    }

    if (strlen($contact_no) != 11) {
      $result->result = $this->response_error("Contact No# Characters Should Be 11!");
      $result->items = implode(',', array('contact_no'));
      return $result;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $result->result = $this->response_error("Invalid Email Format!");
      $result->items = implode(',', array('email'));
      return $result;
    }

    $this->start_transaction();
    try {
      $updated_date = date('Y-m-d H:i:s');
      if ($resident_update == 'update') {
        $this->query("update tbl_users_info set first_name = '$first_name', middle_name='$middle_name', last_name= '$last_name', birth_date = '$birth_date', birth_place ='$birth_place', gender_id = $gender, city_id = '$city', house_no = '$house_no', marital_status_id = $marital_status, barangay_id = $barangay, street = '$street', contact_no = '$contact_no', updated_date = '$updated_date',religion = '$religion',suffix_id = '$suffix',`nationality` = '$nationality' where id = $id");
        $this->query("update tbl_users set username = '$username', email='$email', updated_date = '$updated_date' where id = $id");
        if (!empty($image['name'])) {
          $ext = explode(".", $image["name"]);
          $name = 'img_' . date('YmdHis') . "." . end($ext);
          move_uploaded_file($image['tmp_name'], "files/profile/" . $name);
          $this->query("update tbl_users_info set `image` = '$name' , updated_date = '$updated_date' where id = $id");
        }

        $this->commit_transaction();
        $result->result = $this->response_success("Resident ID#$id Profile Updated!");
        $result->status = true;
        $result->id = $id;
      }

      if ($resident_update == 'reset') {
        $default_password = '$2y$10$EjFxOXsWtBtICE1KpmAnxuaL01SMG9U11ConTF6fpWJi4s4Z8GfKS';
        $this->query("update tbl_users set password = '$default_password', updated_date = '$updated_date' where id = $id");
        $this->commit_transaction();
        $result->result = $this->response_success("Resident ID#$id Password Was Reset!");
        $result->status = true;
        $result->id = $id;
      }

      if ($resident_update == 'verify') {
        $status = $this->get_one("select status_id as status from tbl_users where id = '$id' and deleted_flag = 0 limit 1")->status;
        $datainfo = $this->get_one("select contact_no from tbl_users_info where id = '$id' and deleted_flag = 0 limit 1");

        if ($status == 2) {
          $result->result = $this->response_error("Error User Is Already Verified");
          return $result;
        }

        $this->query("update tbl_users set status_id = 2 where id = $id");

        if (isset($datainfo->contact_no) && !empty($datainfo->contact_no) && strlen($datainfo->contact_no) == 11) {

          $this->query("insert into tbl_user_status_history (user_id,user_status_id,created_by) values($id, 2, $user->id)");



          $msg =  "
Magandang Araw!\n
The registration of your account has been approved.\n
You may now login to the website of the barangay.\n
 \n
Maraming salamat po!\n
\n
From:\n
BARANGAY WAWA – TAGUIG CITY\n
 \n
For more details, text & call:\n
Barangay Wawa - 0945 849 0538\n
";
          $this->sms($datainfo->contact_no, $msg);
          $this->send_email($email, $msg);
        }

        $this->commit_transaction();
        $result->result = $this->response_success("Resident ID#$id Account Verified!");
        $result->status = true;
        $result->id = $id;
      }
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
      $result->result = $this->response_error();
    }
    return $result;
  }

  public function register()
  {
    extract($this->escape_data(array_merge($_SESSION, $_POST, $_FILES)));

    $result = $this->response_obj();
    $errors = array();
    $msg = '';

    // Require Fields
    $required_fields = array('first_name', 'middle_name', 'last_name', 'birth_date', 'birth_place', 'house_no', 'street', 'contact_no', 'username', 'email');


    foreach ($required_fields as $res) {
      if (empty(${$res})) {
        $errors[] = $res;
      }
    }

    if (!empty($errors)) {
      $msg .= "Please Fill Blank Fields!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $errors);
      return $result;
    }
    if ($birth_date > date('Y-m-d')) {
      $result->result = $this->response_error("Birth Date Exceeded!");
      $result->items = implode(',', array('birth_date'));
      return $result;
    }
    if (strlen($contact_no) != 11) {
      $result->result = $this->response_error("Contact No# Characters Should Be 11!");
      $result->items = implode(',', array('contact_no'));
      return $result;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $result->result = $this->response_error("Invalid Email Format!");
      $result->items = implode(',', array('email'));
      return $result;
    }

    $this->start_transaction();
    $default_password = '$2y$10$EjFxOXsWtBtICE1KpmAnxuaL01SMG9U11ConTF6fpWJi4s4Z8GfKS';
    try {
      $updated_date = date('Y-m-d H:i:s');
      $id = $this->insert_get_id("insert into tbl_users  (username,email,password,status_id, access_id,created_by,updated_date,created_date) values('$username','$email', '$default_password','$user_status', 3, '$user->id','$updated_date','$updated_date')");
      $this->query("insert into tbl_users_info (id,first_name,middle_name,last_name,birth_date,birth_place,gender_id,city_id,house_no,marital_status_id,barangay_id,street,contact_no,religion,nationality,suffix_id,created_date,updated_date) values($id,'$first_name','$middle_name','$last_name','$birth_date','$birth_place',$gender, '$city', '$house_no',  $marital_status, $barangay,'$street','$contact_no','$religion','$nationality','$suffix','$updated_date','$updated_date')");
      $this->query("insert into tbl_user_status_history (user_id,user_status_id,created_by,created_date,updated_date) values($id, 1, $user->id,'$updated_date','$updated_date')");
      if (!empty($image['name'])) {
        $ext = explode(".", $image["name"]);
        $name = 'img_' . date('YmdHis') . "." . end($ext);
        move_uploaded_file($image['tmp_name'], "files/profile/" . $name);
        $this->query("update tbl_users_info set `image` = '$name' , updated_date = '$updated_date' where id = $id");
      }

      if ($user_status == 2) {
        $this->query("insert into tbl_user_status_history (user_id,user_status_id,created_by) values($id, $user_status, $user->id)");
        if (strlen($contact_no) == 11) {
          //           $this->sms($contact_no, "
          // Magandang Araw!\n
          // The registration of your account has been approved.\n
          // You may now login to the website of the barangay.\n
          //  \n
          // Maraming salamat po!\n
          // \n
          // From:\n
          // BARANGAY WAWA – TAGUIG CITY\n
          //  \n
          // For more details, text & call:\n
          // Barangay Wawa - 0945 849 0538\n
          // ");
        }
      }

      $this->commit_transaction();
      $result->result = $this->response_success("Resident Registered!");
      $result->status = true;
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
      $result->result = $this->response_error();
    }
    return $result;
  }

  public function resident_register_landing()
  {
    extract($this->escape_data(array_merge($_SESSION, $_POST, $_FILES)));

    $result = $this->response_obj();
    $errors = array();
    $msg = '';

    // Require Fields
    $required_fields = array('first_name', 'middle_name', 'last_name', 'birth_date', 'birth_place', 'house_no', 'street', 'contact_no', 'username', 'email', 'password',);


    foreach ($required_fields as $res) {
      if (empty(${$res})) {
        $errors[] = $res;
      }
    }

    if (empty($city)) {
      $result->message = "No City Selected!";
      $result->items = implode(',', array('city'));
      return $result;
    }

    if (empty($barangay)) {
      $result->message = "No Barangay Selected!";
      $result->items = implode(',', array('barangay'));
      return $result;
    }

    if (empty($religion)) {
      $result->message = "No Religion Selected!";
      $result->items = implode(',', array('religion'));
      return $result;
    }

    if (empty($nationality)) {
      $result->message = "No Nationality Selected!";
      $result->items = implode(',', array('nationality'));
      return $result;
    }


    if (!empty($errors)) {
      $result->message = "Please Fill Blank Fields!";
      $result->items = implode(',', $errors);
      return $result;
    }

    if ($birth_date > date('Y-m-d')) {
      $result->message = "Birth Date Exceeded!";
      $result->items = implode(',', array('birth_date'));
      return $result;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $result->message = "Invalid Email Format!";
      $result->items = implode(',', array('email'));
      return $result;
    }

    if (strlen($contact_no) != 11) {
      $result->message = "Contact No# Characters Should Be 11!";
      $result->items = implode(',', array('contact_no'));
      return $result;
    }

    if ($password != $re_password) {
      $result->message = "Password Does Not Match!";
      $result->items = implode(',', array('password', 're_password'));
      return $result;
    }


    if (empty($file['name'])) {
      $result->message = "No ID Attached!";
      $result->items = implode(',', array('file'));
      return $result;
    }

    if (!empty($errors)) {
      $msg .= "File Size(1mb) Exceeded!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $errors);
      return $result;
    }


    if (!isset($_POST['terms'])) {
      $result->message = "Please Check Data Privacy";
      $result->items = implode(',', array('terms'));
      return $result;
    }



    $count1 = $this->get_one("select count(*) as `count` from tbl_users where username = '$username' limit 1");

    if (isset($count1->count) && !empty($count1->count)) {
      $result->message = "Username Already In-use!";
      $result->items = 'username';
      return $result;
    }

    $count2 = $this->get_one("select count(*) as `count` from tbl_users where email = '$email' limit 1");

    if (isset($count2->count) && !empty($count2->count)) {
      $result->message = "Email Already In-use!";
      $result->items = 'email';
      return $result;
    }


    $this->start_transaction();
    try {

      if (!empty($file['name'])) {
        $ext = explode(".", $file["name"]);
        $file_img = 'img_' . date('YmdHis') . "." . end($ext);
        move_uploaded_file($file['tmp_name'], "files/verify/" . $file_img);
      }

      $created_date = date('Y-m-d H:i:s');

      $final_password = password_hash($password, PASSWORD_DEFAULT);
      $id = $this->insert_get_id("insert into tbl_users  (username,email,password,status_id, access_id, `file`) values('$username','$email', '$final_password',1, 3,'$file_img')");
      $this->query("insert into tbl_users_info (id,first_name,middle_name,last_name,birth_date,birth_place,gender_id,city_id,house_no,marital_status_id,barangay_id,street,contact_no,religion,suffix_id,created_date,updated_date,nationality) values($id,'$first_name','$middle_name','$last_name','$birth_date','$birth_place',$gender, '$city', '$house_no',  $marital_status, $barangay,'$street','$contact_no','$religion','$suffix','$created_date','$created_date','$nationality')");
      $this->query("insert into tbl_user_status_history (user_id,user_status_id) values($id, 1)");

      $this->commit_transaction();
      $result->message = "Resident Registered!";
      $result->status = true;
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
      $result->message = "Oops Something Went Wrong!";
    }
    return $result;
  }

  public function verify_resident()
  {
    extract($this->escape_data(array_merge($_SESSION, $_POST)));
    $result = $this->response_obj();

    if (empty($form)) {
      $result->result = $this->response_error();
      return $result;
    }

    $id = $verify_resident;
    $status = $this->get_one("select status_id as status from tbl_users where id = '$id' and deleted_flag = 0 limit 1")->status;
    $datainfo = $this->get_one("select ui.contact_no,u.email from tbl_users_info ui inner join tbl_users u on u.id = ui.id where ui.id = '$id' and u.deleted_flag = 0 limit 1");

    if ($status == 2) {
      $result->result = $this->response_error("Error User Is Already Verified");
      return $result;
    }

    $this->start_transaction();
    try {
      $this->query("insert into tbl_user_status_history (user_id,user_status_id,created_by) values($id, 2, $user->id)");
      $updated_date = date('Y-m-d H:i:s');
      $this->query("update tbl_users set status_id = 2, approved_by = $user->id, updated_date = '$updated_date' where id = $id");
      $this->query("update tbl_users_info set updated_date = '$updated_date' where id = $id");

      if (isset($datainfo->contact_no) && !empty($datainfo->contact_no)) {
        $msg =  "
Magandang Araw!\n
The registration of your account has been approved.\n
You may now login to the website of the barangay.\n
 \n
Maraming salamat po!\n
\n
From:\n
BARANGAY WAWA – TAGUIG CITY\n
 \n
For more details, text & call:\n
Barangay Wawa - 0945 849 0538\n
";
        $this->sms($datainfo->contact_no, $msg);
        $this->send_email($datainfo->email, $msg);
      }
      $this->commit_transaction();
      $result->result = $this->response_success("Resident ID#$id Account Verified!");
      $result->status = true;
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $result->result = $this->response_error();
    }
    return $result;
  }

  public function create_request()
  {
    extract($this->escape_data(array_merge($_SESSION, $_POST)));
    $result = $this->response_obj();
    if (empty($form)) {
      $result->result = $this->response_error();
      return $result;
    }
    $success_msg = '';
    switch ($type) {
      case 'clearance':
        $success_msg = 'Request For Barangay Clearance Created Successfully!';
        $type_id = 1;
        break;
      case 'residency':
        $success_msg = 'Request For Residency Created Successfully!';
        $type_id = 2;
        break;
      case 'id':
        $success_msg = 'Request For Barangay ID Created Successfully!';
        $type_id = 3;
        break;
    }
    $this->start_transaction();
    try {
      $id = $this->insert_get_id("insert into tbl_request (requester_id,request_type_id,request_status_id) values($user->id, $type_id, 1)");
      $this->query("insert into tbl_request_history (request_id,request_status_id, created_by) values ($id,1,$user->id)");
      $this->commit_transaction();
      $result->result = $this->response_success($success_msg);
      $result->status = true;
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $result->result = $this->response_error();
    }
    return $result;
  }

  public function get_requests_list($id)
  {
    return $this->get_list("select * 
      from( select rb.id,rb.request_type_id,rbt.type,rbs.status,rb.created_date,rb.updated_date,rb.requester_id from 
	    tbl_request_barangay rb inner join tbl_request_status rbs on rbs.id = rb.request_status_id
	    inner join tbl_request_type rbt on rbt.id = rb.request_type_id

      union

      select rb2.id,rb2.request_type_id,rbt2.type,rbs2.status,rb2.created_date,rb2.updated_date,rb2.requester_id from 
      tbl_request_business rb2 inner join tbl_request_status rbs2 on rbs2.id = rb2.request_status_id
      inner join tbl_request_type rbt2 on rbt2.id = rb2.request_type_id

      union
      select rb3.id,rb3.request_type_id,rbt3.type,rbs3.status,rb3.created_date,rb3.updated_date,rb3.requester_id from 
      tbl_request_id rb3 inner join tbl_request_status rbs3 on rbs3.id = rb3.request_status_id
      inner join tbl_request_type rbt3 on rbt3.id = rb3.request_type_id
      ) as u where requester_id = $id order by updated_date desc");
  }
}
