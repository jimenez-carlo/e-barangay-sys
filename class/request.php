<?php
class Request extends Base
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

  public function get_requests_list()
  {
    return $this->get_list("select r.id,r.requester_id,r.request_status_id,concat(rq.last_name, ', ', rq.first_name,' ', LEFT(rq.middle_name, 1), '[#',rq.id,']') as requestor_name, concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as approver_name,rt.id as request_type_id,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request r left join tbl_users_info ui on ui.id = r.approver_id inner join tbl_request_type rt on rt.id = r.request_type_id  inner join tbl_request_status rs on rs.id = r.request_status_id inner join tbl_users_info rq on rq.id = r.requester_id order by r.updated_date desc");
  }

  public function get_request($id)
  {
    $data = new stdClass();

    if (empty($id)) {
      return $data;
    }

    $request = $this->get_one("select * from tbl_request where deleted_flag = 0 and id = $id limit 1");
    $data = $request;
    $data->resident = $this->get_one("select * from tbl_users_info  where deleted_flag = 0 and id = $request->requester_id limit 1");
    $data->history = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,rh.* from tbl_request_history rh inner join tbl_users_info ui on ui.id = rh.created_by inner join tbl_request_status s on s.id = rh.request_status_id where rh.deleted_flag = 0 and rh.request_id = $id order by rh.created_date desc");
    return $data;
  }

  public function change_status()
  {
    extract($this->escape_data(array_merge($_SESSION, $_POST)));

    $result = $this->response_obj();
    $request_data = $this->get_request($id);

    if ($status == $request_data->request_status_id) {
      $result->result = $this->response_error("Request Status Is the Same!");
      $result->items = 'status';
      return $result;
    }

    $this->start_transaction();
    try {
      $updated_date = date('Y-m-d H:i:s');
      $this->query("INSERT INTO tbl_request_history (request_id, request_status_id, remarks, created_by) values($id, $status, '$remarks', $user->id)");
      $this->query("UPDATE tbl_request set request_status_id = $status, updated_date = '$updated_date' where id = $id ");
      $this->commit_transaction();
      $result->status = true;
      $result->result = $this->response_success("Request ID#$id Status Changed!");
      $result->id = $id;
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
    }
    return $result;
  }
}
