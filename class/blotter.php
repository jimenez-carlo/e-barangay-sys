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
    $data['users'] = $this->get_list("select id,concat(last_name, ', ', first_name,' ', LEFT(middle_name, 1)) as fullname from tbl_users_info where deleted_flag = 0");
    // $data['users'] = $this->get_list("select id,concat(last_name, ', ', first_name,' ', LEFT(middle_name, 1), '[#',id,']') as fullname from tbl_users_info where deleted_flag = 0");
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

    $required_fields = array('complaint', 'location', 'date_of_incident');

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

    if ($complainant_id == $complainee_id) {
      $errors[] = 'complainant_id';
      $errors[] = 'complainee_id';
      $msg .= "Complainant and Complainee Is the Same!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $errors);
      return $result;
    }

    $this->start_transaction();
    try {
      // Insert Blotter
      $updated_date = date('Y-m-d H:i:s');
      $blotter_id = $this->insert_get_id("INSERT INTO tbl_blotter (complainant_id, complainee_id, blotter_status_id, complaint, incidence, action_id, created_by, incidence_date,created_date,updated_date) VALUES($complainant_id, $complainee_id, $status, '$complaint', '$location', '$action',1, '$date_of_incident','$updated_date','$updated_date')");

      mysqli_query($this->conn, "INSERT INTO tbl_blotter_history (blotter_id, blotter_status_id, created_by) VALUES($blotter_id, $status, 1)");

      $this->commit_transaction();
      $result->status = false;
      $result->result = $this->response_success("New Blotter Case Created!");
      return $result;
    } catch (mysqli_sql_exception $exception) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($exception->getMessage());
      $result->result = $this->response_error();
      return $result;
    }
  }

  public function update()
  {
    extract($this->escape_data($_POST));

    $result = $this->response_obj();
    $blank = 0;
    $errors = array();
    $msg = '';

    // Require Fields

    $required_fields = array('complaint', 'location', 'date_of_incident');

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

    if ($complainant_id == $complainee_id) {
      $errors[] = 'complainant_id';
      $errors[] = 'complainee_id';
      $msg .= "Complainant and Complainee Is the Same!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $errors);
      return $result;
    }

    $this->start_transaction();
    try {
      $updated_date = date('Y-m-d H:i:s');
      // Update Blotter
      $this->query("update tbl_blotter set complainant_id = $complainant_id, complainee_id = $complainee_id, complaint = '$complaint', incidence= '$location',action_id = $action, incidence_date = '$date_of_incident', updated_date = '$updated_date' where id = $id");
      $this->query("INSERT INTO tbl_blotter_history (blotter_id, blotter_status_id, created_by) VALUES($id, $status, 1)");

      $this->commit_transaction();
      $result->status = false;
      $result->result = $this->response_success("Blotter Case#$id Updated!");
      return $result;
    } catch (mysqli_sql_exception $exception) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($exception->getMessage());
      $result->result = $this->response_error();
      return $result;
    }
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

  public function get_blotters()
  {
    return $this->get_list("SELECT b.id, concat(cp.last_name, ', ', cp.first_name,' ', LEFT(cp.middle_name, 1)) as complainant, concat(ce.last_name, ', ', ce.first_name,' ', LEFT(ce.middle_name, 1)) as complainee, b.incidence, b.incidence_date, tbs.status, a.type, concat(c.last_name, ', ', c.first_name,' ', LEFT(cp.middle_name, 1)) as encoder, b.created_date, b.updated_date FROM tbl_blotter b  inner join tbl_blotter_status tbs on tbs.id = b.blotter_status_id inner join tbl_users_info cp on cp.id = b.complainant_id inner join tbl_users_info ce on ce.id = b.complainee_id inner join tbl_users_info c on c.id = b.created_by inner join tbl_action a on a.id = b.action_id where b.deleted_flag = 0 order by updated_date desc");
  }
}
