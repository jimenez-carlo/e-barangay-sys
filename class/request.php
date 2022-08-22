<?php
class Request extends Base
{
  private $conn;
  public function __construct($db)
  {
    parent::__construct($db);
    $this->conn = $db;
  }

  public function get_requests_list()
  {
    return $this->get_list("select r.id,r.request_status_id,concat(rq.last_name, ', ', rq.first_name,' ', LEFT(rq.middle_name, 1), '[#',rq.id,']') as requestor_name, concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as approver_name,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request r left join tbl_users_info ui on ui.id = r.approver_id inner join tbl_request_type rt on rt.id = r.request_type_id  inner join tbl_request_status rs on rs.id = r.request_status_id inner join tbl_users_info rq on rq.id = r.requester_id order by r.updated_date desc");
  }
}
