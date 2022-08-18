<?php
class Resident extends Base
{
  private $conn;
  public function __construct($db)
  {
    parent::__construct($db);
    $this->conn = $db;
  }

  public function get_requestor_list()
  {
    extract($this->escape_data($_SESSION));
    return $this->get_list("select r.id,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request r left join tbl_users_info ui on ui.id = r.approver_id inner join tbl_request_type rt on rt.id = r.request_type_id  inner join tbl_request_status rs on rs.id = r.request_status_id where r.requester_id = $user->id order by r.updated_date desc");
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
    $id = $this->insert_get_id("insert into tbl_request (requester_id,request_type_id,request_status_id) values($user->id, $type_id, 1)");
    $this->query("insert into tbl_request_history (request_id,request_status_id, created_by) values ($id,1,$user->id)");
    $result->result = $this->response_success($success_msg);
    $result->status = true;
    return $result;
  }
}
