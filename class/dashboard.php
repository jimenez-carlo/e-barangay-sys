<?php
class Dashboard extends Base
{
  private $conn;
  public function __construct($db)
  {
    parent::__construct($db);
    $this->conn = $db;
  }

  public function get_data()
  {
    $data = new stdClass();
    $data->resident = $this->get_one("select count(*) as count from tbl_users where access_id = 3 and status_id = 2 and deleted_flag = 0");
    $data->members = $this->get_one("select count(*) as count from tbl_users where access_id = 2 and deleted_flag = 0");
    $data->request = $this->get_one("select count(*) as count from tbl_request where deleted_flag = 0");
    $data->announcement = $this->get_one("select count(*) as count from tbl_announcement where deleted_flag = 0");
    $data->blotter = $this->get_one("select count(*) as count from tbl_blotter where deleted_flag = 0");
    return $data;
  }
}
