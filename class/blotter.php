<?php
class Blotter extends Base
{
  private $conn;
  public $drop_down_data;
  public function __construct($db)
  {
    parent::__construct($db);
    $this->conn = $db;
    $this->drop_down_data = $this->set_default_data();
  }


  public function set_default_data()
  {
    $data = array();
    $data['action_taken'] = $this->get_list("select * from tbl_action where deleted_flag = 0");
    $data['status'] = $this->get_list("select * from tbl_blotter_status where deleted_flag = 0");
    $data['users'] = $this->get_list("select id,concat(last_name, ', ', first_name,' ', LEFT(middle_name, 1), '[#',id,']') as fullname from tbl_users_info where deleted_flag = 0");
    $data['gender'] = $this->get_list("select * from tbl_gender where deleted_flag = 0");
    $data['zone'] = $this->get_list("select * from tbl_zone where deleted_flag = 0");
    return $data;
  }

  public function create_blotter()
  {
    extract($this->escape_data($_POST));

    $result = $this->response_obj();
    $blank = 0;
    $errors = array();
    $msg = '';

    // Require Fields

    $required_fields = array('complaint', 'location', 'date_of_incident', 'complainant_first_name', 'complainant_middle_name', 'complainant_last_name', 'complainant_date_of_birth', 'complainant_contact_no', 'complainant_barangay', 'complainant_address', 'complainee_first_name', 'complainee_middle_name', 'complainee_last_name', 'complainee_date_of_birth', 'complainee_contact_no', 'complainee_barangay', 'complainee_address');

    foreach ($required_fields as $res) {
      if (empty(${$res})) {
        $errors[] = $res;
        $blank++;
      }
    }

    if (!empty($errors)) {
      $msg .= "Please Fill Blank Fields!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $errors);
      return $result;
    }

    $default_password = '$2y$10$KKYMmphhiBr9szoYIW3Bqe9aH3i6TFE8EwwXNkl8zKAuo7sUD6Rn6'; // 123456
    // Insert Complainant
    if (empty($complainant_id)) {
      $username = $complainant_contact_no . $complainant_last_name;
      $sql = "INSERT INTO tbl_users (access_id, username, `password`, approved_by, status_id) VALUES(3,'$username','$default_password', 1, 2)";
      $complainant_id = $this->insert_get_id($sql);
      $this->query("INSERT INTO tbl_users_info (id, first_name, middle_name, last_name, birth_date, contact_no, gender_id, zone_id) VALUES($complainant_id, '$complainant_first_name','$complainant_middle_name','$complainant_last_name', '$complainant_date_of_birth', '$complainant_contact_no', '$complainant_gender','$complainant_zone')");
      $this->query("INSERT INTO tbl_user_status_history (`user_id`,user_status_id, created_by) VALUES($complainant_id, 1, 1)");
      $this->query("INSERT INTO tbl_user_status_history (`user_id`,user_status_id, created_by) VALUES($complainant_id, 2, 1)");
    }
    // Insert Complainee
    if (empty($complainee_id)) {
      $username = $complainee_contact_no . $complainee_last_name;
      $sql = "INSERT INTO tbl_users (access_id, username, `password`, approved_by, status_id) VALUES(3,'$username','$default_password', 1 ,2)";
      $complainee_id = $this->insert_get_id($sql);
      $this->query("INSERT INTO tbl_users_info (id, first_name, middle_name, last_name, birth_date, contact_no, gender_id, zone_id) VALUES($complainee_id, '$complainee_first_name','$complainee_middle_name','$complainee_last_name', '$complainee_date_of_birth', '$complainee_contact_no', '$complainee_gender','$complainee_zone')");
      $this->query("INSERT INTO tbl_user_status_history (`user_id`,user_status_id, created_by) VALUES($complainant_id, 1, 1)");
      $this->query("INSERT INTO tbl_user_status_history (`user_id`,user_status_id, created_by) VALUES($complainant_id, 2, 1)");
    }
    // Insert Blotter
    $blotter_id = $this->insert_get_id("INSERT INTO tbl_blotter (complainant_id, complainee_id, blotter_status_id, complaint, incidence, action_id, created_by, incidence_date) VALUES($complainant_id, $complainee_id, $status, '$complaint', '$location', '$action',1, '$date_of_incident')");

    $this->query("INSERT INTO tbl_blotter_history (blotter_id, blotter_status_id, created_by) VALUES($blotter_id, $status, 1)");
    $result->status = true;
    $result->result = $this->response_success("New Blotter Case Created!");
    return $result;
  }

  public function get_case($id = 0)
  {
    $data = new stdClass();

    if (empty($id)) {
      return $data;
    }

    $blotter = $this->get_one("select * from tbl_blotter where deleted_flag = 0 and id = $id limit 1");
    $data = $blotter;
    $data->complainant = $this->get_one("select x.*,TIMESTAMPDIFF(YEAR, x.birth_date, CURDATE()) as age from tbl_users_info x where x.deleted_flag = 0 and x.id = $blotter->complainant_id limit 1");
    $data->complainee = $this->get_one("select x.*,TIMESTAMPDIFF(YEAR, x.birth_date, CURDATE()) as age from tbl_users_info x where x.deleted_flag = 0 and x.id = $blotter->complainee_id limit 1");
    return $data;
  }
}
