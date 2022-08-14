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

  public function create_blotter()
  {
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
}
