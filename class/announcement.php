<?php
class Announcement extends Base
{
  private $conn;
  public function __construct($db)
  {
    parent::__construct($db);
    $this->conn = $db;
  }

  public function get_announcements()
  {
    return $this->get_list("select a.*,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname from tbl_announcement a inner join tbl_users_info ui on ui.id = a.created_by order by a.updated_date desc");
  }

  public function create_announcement()
  {
    extract($this->escape_data(array_merge($_SESSION, $_POST, $_FILES)));

    $result = $this->response_obj();
    $blank = 0;
    $errors = array();
    $msg = '';
    $required_fields = array('title', 'description', 'start_date', 'end_date');

    foreach ($required_fields as $res) {
      if (empty(${$res})) {
        $errors[] = $res;
        $blank++;
      }
    }

    if (empty($images['name'][0])) {
      $errors[] = 'images[]';
      $blank++;
    }

    if (!empty($errors)) {
      $msg .= "Please Fill Blank Fields!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $errors);
      return $result;
    }

    $announcement_id = $this->insert_get_id("INSERT INTO tbl_announcement (title, `description`, `start_date`, end_date, created_by) values('$title', '$description', '$start_date', '$end_date', $user->id)");
    if (!empty($images['name'][0])) {
      $ctr = 0;
      foreach ($images['tmp_name'] as $key => $file_temp) {
        $ext = explode(".", $images["name"][$key]);
        $name = 'img_' . date('YmdHis') . "_" . $ctr . "." . end($ext);
        move_uploaded_file($file_temp, "files/announcement/" . $name);
        $this->query("insert into tbl_announcement_images (announcement_id,image) values($announcement_id, '$name')");
        $ctr++;
      }
    }
    $result->status = true;
    $result->result = $this->response_success("New Announcement Created!");
    return $result;
  }
}
