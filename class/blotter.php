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

    return $result;
  }
}
