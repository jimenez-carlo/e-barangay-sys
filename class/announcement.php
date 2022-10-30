<?php
class Announcement extends Base
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
    $data['status'] = $this->get_list("select * from tbl_announcement_status where deleted_flag = 0");
    return $data;
  }

  public function get_announcement($id = 0)
  {
    $data = new stdClass();

    if (empty($id)) {
      return $data;
    }

    $announcement = $this->get_one("select * from tbl_announcement where deleted_flag = 0 and id = $id limit 1");
    $data = $announcement;
    $data->images = $this->get_list("select * from tbl_announcement_images where deleted_flag = 0 and announcement_id = $id ");
    $data->history = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,sh.* from tbl_announcement_status_history sh inner join tbl_users_info ui on ui.id = sh.created_by inner join tbl_announcement_status s on s.id = sh.announcement_status_id where sh.deleted_flag = 0 and sh.announcement_id = $id order by sh.created_date desc");
    return $data;
  }

  public function get_announcements()
  {
    return $this->get_list("select a.*,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status from tbl_announcement a inner join tbl_users_info ui on ui.id = a.created_by inner join tbl_announcement_status s on s.id = a.announcement_status_id order by a.updated_date desc");
  }

  public function get_resident_announcements()
  {
    return $this->get_list("select a.*,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status from tbl_announcement a inner join tbl_users_info ui on ui.id = a.created_by inner join tbl_announcement_status s on s.id = a.announcement_status_id where a.announcement_status_id = 2  order by a.updated_date desc");
  }

  public function get_resident_announcements_with_one_image()
  {
    $container = $this->get_list("select a.*,concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status from tbl_announcement a inner join tbl_users_info ui on ui.id = a.created_by inner join tbl_announcement_status s on s.id = a.announcement_status_id where a.announcement_status_id = 2  order by a.start_date desc");
    foreach ($container as $key => $res) {
      $container[$key]['image'] = $this->get_one("select image from tbl_announcement_images where announcement_id = '" . $res['id'] . "' limit 1")->image;
    }
    return $container;
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

    $this->start_transaction();
    try {
      $status = ($announcement_create == 'draft') ? 1 : 2;
      $announcement_id = $this->insert_get_id("INSERT INTO tbl_announcement (title, `description`, announcement_status_id, `start_date`, end_date, created_by) values('$title', '$description', $status, '$start_date', '$end_date', $user->id)");
      $this->query("INSERT INTO tbl_announcement_status_history (announcement_id, announcement_status_id, created_by) values ($announcement_id, $status, $user->id)");

      if (isset($send_sms) && $status == 2) {
        $recipients = $this->get_list("select contact_no from tbl_users u inner join tbl_users_info ui on ui.id = u.id where u.deleted_flag = 0  and u.status_id = 2 limit 5");
        foreach ($recipients as $res) {
          if (strlen($res['contact_no'] == 11)) {
            $this->sms(
              $res['contact_no'],
              "
Magandang Araw!\n
$title\n
$description\n
\n
When: $start_date\n
\n
Maraming salamat po!\n
From:\n
BARANGAY WAWA – TAGUIG CITY\n
\n
For more details, text & call:\n
Barangay Wawa - 0945 849 0538\n
"
            );
          }
        }
      }

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
      $this->commit_transaction();
      $result->status = true;
      $result->result = $this->response_success("New Announcement Created!");
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
    }
    return $result;
  }

  public function edit_announcement()
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

    $deleted_images = (isset($hidden_image)) ? implode("','", $hidden_image) : 0;
    $image_left =  $this->get_one("select count(*) as `result` from tbl_announcement_images where announcement_id = $id and id not in ('" . $deleted_images . "') limit 1");

    if (empty($images['name'][0]) && empty($image_left->result)) {
      $errors[] = 'images[]';
      $blank++;
    }

    if (!empty($errors)) {
      $msg .= "Please Fill Blank Fields!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $errors);
      return $result;
    }

    $this->start_transaction();
    try {
      $announcement = $this->get_announcement($id);

      $statuses = array('draft' => 1, 'publish' => 2, 'un-publish' => 3);
      $status = $statuses[$announcement_edit];
      // Update Date
      $updated_date = date('Y-m-d H:i:s');
      $this->query("UPDATE tbl_announcement  set title = '$title',  `description` = '$description', announcement_status_id = $status, `start_date` = '$start_date', end_date = '$end_date', updated_date = '$updated_date', updated_by = $user->id where id = $id ");

      // Insert Status
      if ($announcement->announcement_status_id != $status) {
        $this->query("INSERT INTO tbl_announcement_status_history (announcement_id, announcement_status_id, created_by) values ($id, $status, $user->id)");
      }

      if (isset($send_sms) && $status == 2) {
        $recipients = $this->get_list("select contact_no from tbl_users u inner join tbl_users_info ui on ui.id = u.id where u.deleted_flag = 0  and u.status_id = 2 limit 5");
        foreach ($recipients as $res) {
          if (strlen($res['contact_no'] == 11)) {
            $this->sms($res['contact_no'], "Barangay Wawa System Announcemnet!, Title:$title Description:$description");
          }
        }
      }

      // Delete Image File
      if (isset($hidden_image)) {
        $image_to_delete = $this->get_list("select * from tbl_announcement_images where announcement_id = $id and id in ('" . $deleted_images . "')");
        foreach ($image_to_delete as $res) {
          unlink("files/announcement/" . $res['image']);
        }
      }
      // Delete Image Rows
      $this->query("delete from tbl_announcement_images where announcement_id = $id and id in ('" . $deleted_images . "')");

      if (!empty($images['name'][0])) {
        $ctr = 0;
        foreach ($images['tmp_name'] as $key => $file_temp) {
          $ext = explode(".", $images["name"][$key]);
          $name = 'img_' . date('YmdHis') . "_" . $ctr . "." . end($ext);
          move_uploaded_file($file_temp, "files/announcement/" . $name);
          $this->query("insert into tbl_announcement_images (announcement_id,image) values($id, '$name')");
          $ctr++;
        }
      }

      // Commit Sqls
      $this->commit_transaction();
      $result->status = true;
      $result->result = $this->response_success("Announcement #$id Updated!");
      $result->id = $id;
    } catch (mysqli_sql_exception $e) {
      // Rollback Sqls
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
    }
    return $result;
  }
}
