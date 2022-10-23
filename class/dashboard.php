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
    $data->resident_pending = $this->get_one("select count(*) as count from tbl_users where access_id = 3 and status_id = 1 and deleted_flag = 0");
    $data->members = $this->get_one("select count(*) as count from tbl_users where access_id = 2 and deleted_flag = 0");
    $data->request = $this->get_one("select count(*) as count from tbl_request where deleted_flag = 0");

    $data->barangay_total = $this->get_one("select count(*) as count from tbl_request_barangay where deleted_flag = 0 and request_status_id  in (1,2,4,5)");
    $data->barangay_pending = $this->get_one("select count(*) as count from tbl_request_barangay where deleted_flag = 0 and request_status_id = 1");
    $data->barangay_approved = $this->get_one("select count(*) as count from tbl_request_barangay where deleted_flag = 0 and request_status_id = 2");
    $data->barangay_printing = $this->get_one("select count(*) as count from tbl_request_barangay where deleted_flag = 0 and request_status_id = 4");
    $data->barangay_released = $this->get_one("select count(*) as count from tbl_request_barangay where deleted_flag = 0 and request_status_id = 5");

    $data->business_total = $this->get_one("select count(*) as count from tbl_request_business where deleted_flag = 0 and request_status_id  in (1,2,4,5)");
    $data->business_pending = $this->get_one("select count(*) as count from tbl_request_business where deleted_flag = 0 and request_status_id = 1");
    $data->business_approved = $this->get_one("select count(*) as count from tbl_request_business where deleted_flag = 0 and request_status_id = 2");
    $data->business_printing = $this->get_one("select count(*) as count from tbl_request_business where deleted_flag = 0 and request_status_id = 4");
    $data->business_released = $this->get_one("select count(*) as count from tbl_request_business where deleted_flag = 0 and request_status_id = 5");

    $data->id_total = $this->get_one("select count(*) as count from tbl_request_id where deleted_flag = 0 and request_status_id  in (1,2,4,5)");
    $data->id_pending = $this->get_one("select count(*) as count from tbl_request_id where deleted_flag = 0 and request_status_id = 1");
    $data->id_approved = $this->get_one("select count(*) as count from tbl_request_id where deleted_flag = 0 and request_status_id = 2");
    $data->id_printing = $this->get_one("select count(*) as count from tbl_request_id where deleted_flag = 0 and request_status_id = 4");
    $data->id_released = $this->get_one("select count(*) as count from tbl_request_id where deleted_flag = 0 and request_status_id = 5");
    $data->announcement = $this->get_one("select count(*) as count from tbl_announcement where deleted_flag = 0");

    $data->blotter_total = $this->get_one("select count(*) as count from tbl_blotter where deleted_flag = 0");
    $data->blotter_pending = $this->get_one("select count(*) as count from tbl_blotter where deleted_flag = 0 and blotter_status_id = 1");
    $data->blotter_solved = $this->get_one("select count(*) as count from tbl_blotter where deleted_flag = 0 and blotter_status_id = 2");
    return $data;
  }
}
