<?php
class Members extends Base
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
    $data['barangay'] = $this->get_list("select * from tbl_barangay where city_id = '12801' and deleted_flag = 0");
    $data['zone'] = $this->get_list("select * from tbl_zone where deleted_flag = 0");
    $data['user_status'] = $this->get_list("select * from tbl_user_status where deleted_flag = 0");
    $data['barangay_positions'] = $this->get_list("select * from tbl_barangay_positions where deleted_flag = 0");
    $data['purpose'] = $this->get_list("select * from tbl_purpose");
    $data['blood_type'] = $this->get_list("select * from tbl_blood_type");
    $data['business_type'] = $this->get_list("select * from tbl_business_type");
    $data['ownership_type'] = $this->get_list("select * from tbl_ownership_type");
    $data['application_type'] = $this->get_list("select * from tbl_application_type");
    $data['blood_type'] = $this->get_list("select * from tbl_blood_type");
    $data['clearance_id'] = $this->get_one("select if(max(id) is null, 1, max(id) + 1) as `id`  from tbl_request_barangay order by id desc limit 1 ")->id;
    $data['barangay_id'] = $this->get_one("select if(max(id) is null, 1, max(id) + 1) as `id`  from tbl_request_id order by id desc limit 1 ")->id;
    $data['business_id'] = $this->get_one("select if(max(id) is null, 1, max(id) + 1) as `id`  from tbl_request_business order by id desc limit 1 ")->id;
    return $data;
  }


  public function get_requestor_list()
  {
    extract($this->escape_data($_SESSION));
    return $this->get_list("select r.id,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request r left join tbl_users_info ui on ui.id = r.approver_id inner join tbl_request_type rt on rt.id = r.request_type_id  inner join tbl_request_status rs on rs.id = r.request_status_id where r.requester_id = $user->id order by r.updated_date desc");
  }

  public function get_member_list()
  {
    return $this->get_list("select p.title,a.name as `access_name`,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as approver_name,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1)) as resident_name,us.status,b.name as `barangay`, c.name as `city`,ui.contact_no,g.gender,r.* from tbl_users r inner join tbl_users_info ui on ui.id = r.id left join tbl_users_info approver on approver.id = r.approved_by inner join tbl_user_status us on us.id = r.status_id left join tbl_city c on c.id = ui.city_id left join tbl_barangay b on b.id = ui.barangay_id left join tbl_gender g on g.id = ui.gender_id left join tbl_barangay_positions p on p.id = ui.barangay_position_id inner join tbl_access a on a.id = r.access_id where r.deleted_flag = 0 and r.access_id in(1,2) order by r.updated_date desc");
  }

  public function get_resident($id = 0)
  {
    $data = new stdClass();

    if (empty($id)) {
      return $data;
    }

    $resident = $this->get_one("select u.username, u.email, u.status_id,ui.* from tbl_users_info ui inner join tbl_users u on u.id = ui.id where ui.deleted_flag = 0 and ui.id = $id limit 1");
    $city = $this->get_one("select name from tbl_city where id= $resident->city_id")->name ?? '';
    // $zone = $this->get_one("select zone from tbl_zone where id= $resident->zone_id")->zone ?? '';
    $barangay = $this->get_one("select name from tbl_barangay where id= $resident->barangay_id")->name ?? '';
    $resident->complete_address = strtoupper($resident->house_no . ', ' . $resident->street . ', ' . $barangay . ', ' . $city);
    $data = $resident;
    $resident = $this->get_one("select u.username, u.email, u.status_id,ui.* from tbl_users_info ui inner join tbl_users u on u.id = ui.id where ui.deleted_flag = 0 and ui.id = $id limit 1");
    $data->history = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,sh.* from tbl_user_status_history sh left join tbl_users_info ui on ui.id = sh.created_by left join tbl_user_status s on s.id = sh.user_status_id where sh.deleted_flag = 0 and sh.user_id = $id order by sh.created_date desc");
    $data->requests = $this->get_list("select r.id,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request r left join tbl_users_info ui on ui.id = r.updated_by left join tbl_request_type rt on rt.id = r.request_type_id  left join tbl_request_status rs on rs.id = r.request_status_id where r.requester_id = $id order by r.updated_date desc");
    $data->blotter = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,b.* from tbl_blotter b left join tbl_users_info ui on ui.id = b.complainant_id inner join tbl_blotter_status s on s.id = b.blotter_status_id where b.deleted_flag = 0 and b.complainee_id = $id order by b.created_date desc");
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
    if ($member_update == 'update') {
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

    if (
      strlen($contact_no) != 11
    ) {
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
      if ($member_update == 'update') {
        $this->query("update tbl_users_info set first_name = '$first_name', middle_name='$middle_name', last_name= '$last_name', birth_date = '$birth_date', birth_place ='$birth_place', gender_id = $gender, city_id = '$city', house_no = '$house_no', marital_status_id = $marital_status, barangay_id = $barangay, street = '$street', contact_no = '$contact_no', updated_date = '$updated_date', barangay_position_id ='$position' where id = $id");
        $this->query("update tbl_users set username = '$username', email='$email', updated_date = '$updated_date' where id = $id");
        if (!empty($image['name'])) {
          $ext = explode(".", $image["name"]);
          $name = 'img_' . date('YmdHis') . "." . end($ext);
          move_uploaded_file($image['tmp_name'], "files/profile/" . $name);
          $this->query("update tbl_users_info set `image` = '$name' , updated_date = '$updated_date' where id = $id");
        }

        $this->commit_transaction();
        $result->result = $this->response_success("Member ID#$id Profile Updated!");
        $result->status = true;
        $result->id = $id;
      }

      if ($member_update == 'reset') {
        $default_password = '$2y$10$EjFxOXsWtBtICE1KpmAnxuaL01SMG9U11ConTF6fpWJi4s4Z8GfKS';
        $this->query("update tbl_users set password = '$default_password', updated_date = '$updated_date' where id = $id");
        $this->commit_transaction();
        $result->result = $this->response_success("Member ID#$id Password Was Reset!");
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

  public function create()
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


    if (
      strlen($contact_no) != 11
    ) {
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
      $default_password = '$2y$10$KKYMmphhiBr9szoYIW3Bqe9aH3i6TFE8EwwXNkl8zKAuo7sUD6Rn6';
      // print_r($_SESSION);
      // print_r("insert into tbl_users  (username,email,password,status_id, access_id,created_by) values('$username','$email', '$default_password',2, 2, '$user->id')");
      $id = $this->insert_get_id("insert into tbl_users  (username,email,password,status_id, access_id,created_by) values('$username','$email', '$default_password',2, 2, '$user->id')");
      $this->query("insert into tbl_users_info (id,first_name,middle_name,last_name,birth_date,birth_place,gender_id,city_id,house_no,marital_status_id,barangay_id,street,contact_no,barangay_position_id) values($id,'$first_name','$middle_name','$last_name','$birth_date','$birth_place',$gender, '$city', '$house_no',  $marital_status, $barangay,'$street','$contact_no', '$position')");
      $this->query("insert into tbl_user_status_history (user_id,user_status_id,created_by) values($id, 1, $user->id)");
      $this->query("insert into tbl_user_status_history (user_id,user_status_id,created_by) values($id, 2, $user->id)");
      if (!empty($image['name'])) {
        $ext = explode(".", $image["name"]);
        $name = 'img_' . date('YmdHis') . "." . end($ext);
        move_uploaded_file($image['tmp_name'], "files/profile/" . $name);
        $this->query("update tbl_users_info set `image` = '$name' , updated_date = '$updated_date' where id = $id");
      }

      // $this->sms($contact_no, "Barangay Wawa System Notification!, Your Account Has Been Approved! You May Now Login with your Account." . BASE_URL);

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
}
