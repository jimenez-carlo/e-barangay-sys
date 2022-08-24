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
    $data['request_status'] = $this->get_list("select * from tbl_request_status  where deleted_flag = 0");
    $data['gender'] = $this->get_list("select * from tbl_gender where deleted_flag = 0");
    $data['marital_status'] = $this->get_list("select * from tbl_marital_status where deleted_flag = 0");
    $data['city'] = $this->get_list("select * from tbl_city where deleted_flag = 0");
    $data['zone'] = $this->get_list("select * from tbl_zone where deleted_flag = 0");
    return $data;
  }


  public function get_requestor_list()
  {
    extract($this->escape_data($_SESSION));
    return $this->get_list("select r.id,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request r left join tbl_users_info ui on ui.id = r.approver_id inner join tbl_request_type rt on rt.id = r.request_type_id  inner join tbl_request_status rs on rs.id = r.request_status_id where r.requester_id = $user->id order by r.updated_date desc");
  }

  public function get_resident_list()
  {
    return $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as approver_name,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1)) as resident_name,us.status,b.name as `barangay`, c.name as `city`,ui.contact_no,g.gender,r.* from tbl_users r inner join tbl_users_info ui on ui.id = r.id left join tbl_users_info approver on approver.id = r.approved_by inner join tbl_user_status us on us.id = r.status_id left join tbl_city c on c.id = ui.city_id left join tbl_barangay b on b.id = ui.barangay_id left join tbl_gender g on g.id = ui.gender_id where r.deleted_flag = 0 and r.access_id = 3 order by r.updated_date desc");
  }

  public function get_resident($id = 0)
  {
    $data = new stdClass();

    if (empty($id)) {
      return $data;
    }

    $resident = $this->get_one("select u.username, u.email, ui.* from tbl_users_info ui inner join tbl_users u on u.id = ui.id where ui.deleted_flag = 0 and ui.id = $id limit 1");
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
      $required_fields = array('first_name', 'middle_name', 'last_name', 'birth_date', 'birth_place', 'house_no', 'street', 'contact_no');
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

    $this->start_transaction();
    try {
      $updated_date = date('Y-m-d H:i:s');
      if ($resident_update == 'update') {
        $this->query("update tbl_users_info set first_name = '$first_name', middle_name='$middle_name', last_name= '$last_name', birth_date = '$birth_date', birth_place ='$birth_place', gender_id = $gender, city_id = '$city', house_no = '$house_no', marital_status_id = $marital_status, barangay_id = $barangay, street = '$street', contact_no = '$contact_no', updated_date = '$updated_date' where id = $id");
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
        $default_password = '$2y$10$KKYMmphhiBr9szoYIW3Bqe9aH3i6TFE8EwwXNkl8zKAuo7sUD6Rn6';
        $this->query("update tbl_users set password = '$default_password', updated_date = '$updated_date' where id = $id");
        $this->commit_transaction();
        $result->result = $this->response_success("Resident ID#$id Password Was Reset!");
        $result->status = true;
        $result->id = $id;
      }

      if ($resident_update == 'verify') {
        $status = $this->get_one("select status_id as status from tbl_users where id = '$id' and deleted_flag = 0 limit 1")->status;
        $datainfo = $this->get_one("select contact_no as status from tbl_users_info where id = '$id' and deleted_flag = 0 limit 1");

        if ($status == 2) {
          $result->result = $this->response_error("Error User Is Already Verified");
          return $result;
        }

        if (isset($datainfo->contact_no) && !empty($datainfo->contact_no)) {
          $this->sms($datainfo->contact_no, "E-Barangay System Notification!, Your Account Has Been Approved! You May Now Login with your Account." . BASE_URL);
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
    $datainfo = $this->get_one("select contact_no as status from tbl_users_info where id = '$id' and deleted_flag = 0 limit 1");

    if ($status == 2) {
      $result->result = $this->response_error("Error User Is Already Verified");
      return $result;
    }

    $this->start_transaction();
    try {
      $this->query("insert into tbl_user_status_history (user_id,user_status_id,created_by) values($id, 2, $user->id)");
      $updated_date = date('Y-m-d H:i:s');
      $this->query("update tbl_users set status_id = $id, approved_by = $user->id, updated_date = '$updated_date' where id = $id");
      $this->query("update tbl_users_info set updated_date = '$updated_date' where id = $id");

      if (isset($datainfo->contact_no) && !empty($datainfo->contact_no)) {
        $this->sms($datainfo->contact_no, "E-Barangay System Notification!, Your Account Has Been Approved! You May Now Login with your Account." . BASE_URL);
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
}
