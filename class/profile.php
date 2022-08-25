<?php
class Profile extends Base
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
    return $data;
  }

  public function get_profile($id = 0)
  {
    $data = new stdClass();

    if (empty($id)) {
      return $data;
    }

    $resident = $this->get_one("select u.username, u.email, u.status_id,ui.* from tbl_users_info ui inner join tbl_users u on u.id = ui.id where ui.deleted_flag = 0 and ui.id = $id limit 1");
    $data = $resident;
    $data->history = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,sh.* from tbl_user_status_history sh inner join tbl_users_info ui on ui.id = sh.created_by inner join tbl_user_status s on s.id = sh.user_status_id where sh.deleted_flag = 0 and sh.user_id = $id order by sh.created_date desc");
    $data->requests = $this->get_list("select r.id,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request r left join tbl_users_info ui on ui.id = r.updated_by inner join tbl_request_type rt on rt.id = r.request_type_id  inner join tbl_request_status rs on rs.id = r.request_status_id where r.requester_id = $id order by r.updated_date desc");
    $data->blotter = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,b.* from tbl_blotter b inner join tbl_users_info ui on ui.id = b.complainant_id inner join tbl_blotter_status s on s.id = b.blotter_status_id where b.deleted_flag = 0 and b.complainee_id = $id order by b.created_date desc");
    return $data;
  }

  public function admin_update()
  {

    extract($this->escape_data(array_merge($_SESSION, $_POST, $_FILES)));
    $result = $this->response_obj();
    $errors = array();
    $msg = '';

    $required_fields = array();
    // Require Fields
    $required_fields = array('first_name', 'middle_name', 'last_name', 'birth_date', 'birth_place', 'house_no', 'street', 'contact_no');


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
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
      $result->result = $this->response_error();
    }
    return $result;
  }

  public function resident_update()
  {

    extract($this->escape_data(array_merge($_SESSION, $_POST, $_FILES)));
    $result = $this->response_obj();
    $errors = array();
    $msg = '';

    $required_fields = array();
    // Require Fields
    $required_fields = array('first_name', 'middle_name', 'last_name', 'birth_date', 'birth_place', 'house_no', 'street', 'contact_no');


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
      $this->query("update tbl_users_info set first_name = '$first_name', middle_name='$middle_name', last_name= '$last_name', birth_date = '$birth_date', birth_place ='$birth_place', gender_id = $gender, city_id = '$city', house_no = '$house_no', marital_status_id = $marital_status, barangay_id = $barangay, street = '$street', contact_no = '$contact_no', updated_date = '$updated_date' where id = $id");
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
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
      $result->result = $this->response_error();
    }
    return $result;
  }
}
