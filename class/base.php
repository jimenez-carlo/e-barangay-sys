<?php
class Base
{
  private $conn;
  private $conn_failed;
  public function __construct($db)
  {
    $this->conn = $db;
    $this->conn_failed = $db;
  }


  public function get_list($sql)
  {
    $data = array();
    $result = mysqli_query($this->conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    return $data;
  }

  public function get_one($sql)
  {
    if ($result = mysqli_query($this->conn, $sql)) {
      $obj = mysqli_fetch_object($result);
      return $obj;
    }
    return false;
  }

  public function query($sql)
  {
    mysqli_query($this->conn, $sql);
  }

  public function insert_get_id($sql)
  {
    mysqli_query($this->conn, $sql);
    return mysqli_insert_id($this->conn);
  }

  public function escape_data($data = array())
  {
    foreach ($data as $key => $value) {
      if (is_array($value) || is_object($value)) {
        continue;
      } else {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $data[$key] = mysqli_real_escape_string($this->conn, $value);
      }
      return $data;
    }
  }

  public function response_error($message = "Oops Something Went Wrong!", $title = "System Error!")
  {
    return sprintf(
      '<div class="alert alert-sm alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-warning"></i> <strong>%s</strong> %s </div>',
      $title,
      $message
    );
  }


  public function response_success($message = "Action Successfull!", $title = "Action Successfull!")
  {
    return sprintf(
      '<div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="fa fa-check"></i> <strong>%s</strong> %s </div>',
      $title,
      $message
    );
  }

  public function response_obj()
  {
    $result = new stdClass();
    $result->status = false;
    $result->result = $this->response_error();
    $result->items = '';
    return $result;
  }

  public function close_connection()
  {
    $this->conn->close();
  }

  public function start_transaction()
  {
    return mysqli_begin_transaction($this->conn);
  }

  public function commit_transaction()
  {
    return mysqli_commit($this->conn);
  }

  public function roll_back()
  {
    return mysqli_rollback($this->conn);
  }

  public function save_error($error = '')
  {
    $error = addslashes($error);
    $this->query("insert into tbl_system_error (message) values('$error')");
  }

  function sms($number, $message)
  {
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => API_CODE, 'passwd' => API_PASSWORD);
    $param = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($itexmo),
      ),
    );
    $context  = stream_context_create($param);
    $this->save_error(file_get_contents($url, false, $context));
  }

  function get_dropdown()
  {
    extract($_POST);
    $data = $this->get_list("select $value as `value`, $display as `display` from $table where $where = $id ");
    foreach ($data as $res) {
      echo ($res['value'] == $selected) ? "<option value='" . $res['value'] . "' selected> " . $res['display'] . "</option>" : "<option value='" . $res['value'] . "'> " . $res['display'] . "</option>";
    }
    die;
  }
}
