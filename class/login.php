<?php
class Login extends Base
{
  private $conn;
  public function __construct($db)
  {
    parent::__construct($db);
    $this->conn = $db;
  }

  public function index()
  {
    extract($this->escape_data($_POST));

    $result = $this->response_obj();
    $blank = 0;
    $errors = array();
    $msg = '';

    $required_fields = array('username', 'password');

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
      $result->message = $msg;
      return $result;
    }

    $user = $this->get_one("SELECT *,count(*) as user_count FROM tbl_users u inner join tbl_users_info ui on ui.id = u.id WHERE (u.username = '$username' OR u.email = '$username') and u.deleted_flag = 0");
    if (password_verify($password, $user->password)) {
      if ($user->status_id == 2) {
        $_SESSION['user'] = $user;
        $_SESSION['is_logged_in'] = true;
        $result->status = true;
        $result->refresh = true;
      } else {
        $msg .= "Account Not Yet Verified!";
        $result->result = $this->response_error($msg);
        $result->items = implode(',', array());
        $result->message = $msg;
      }
    } else {
      $msg .= "Invalid Username/Password!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $required_fields);
      $result->message = $msg;
    }
    return $result;
  }
}
