<?php
class Base
{
  private $conn;
  public function __construct($db)
  {
    $this->conn = $db;
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

  public function escape_data($data = array())
  {
    foreach ($data as $key => $value) {
      if (!is_array($value)) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $data[$key] = mysqli_real_escape_string($this->conn, $value);
      }
    }
    return $data;
  }

  public function response_error($title = "System Error!", $message = "Oops Something Went Wrong!")
  {
    return sprintf(
      '<div class="alert alert-sm alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-warning"></i> <strong>%s</strong> %s </div>',
      $title,
      $message
    );
  }


  public function response_success($title = "Action Successfull!", $message = "Action Successfull!")
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
}
