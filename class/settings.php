<?php
class Settings extends Base
{
  private $conn;
  public function __construct($db)
  {
    parent::__construct($db);
    $this->conn = $db;
  }



  public function get_settings()
  {
    $data = new stdClass();


    $settings = $this->get_one("select * from tbl_settings where id = 1 limit 1");
    $data = $settings;
    $data->home_images = $this->get_list("select * from tbl_home_images where deleted_flag = 0");
    $data->gallery = $this->get_list("select * from tbl_gallery where deleted_flag = 0");
    $data->officers = $this->get_list("select * from tbl_about_us_images where deleted_flag = 0");
    return $data;
  }





  public function edit_settings()
  {
    extract($this->escape_data(array_merge($_SESSION, $_POST, $_FILES)));

    $result = $this->response_obj();
    $blank = 0;
    $errors = array();
    $msg = '';
    $required_fields = array('home_title', 'home_description', 'about', 'mission', 'vision');

    foreach ($required_fields as $res) {
      if (empty(${$res})) {
        $errors[] = $res;
        $blank++;
      } else {
        ${$res} = addslashes(${$res});
      }
    }

    $deleted_carousel = (isset($delete_home_image)) ? implode("','", $delete_home_image) : 0;
    $carousel_left =  $this->get_one("select count(*) as `result` from tbl_home_images where id not in ('" . $deleted_carousel . "') limit 1");

    if (empty($images['name'][0]) && empty($carousel_left->result)) {
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

      $this->query("UPDATE tbl_settings  set about = '$about',  `vision` = '$vision', mission = '$mission', `home_title` = '$home_title', home_description = '$home_description' where id = 1 ");

      // Delete Carousel File
      if (isset($delete_home_image)) {
        $image_to_delete = $this->get_list("select * from tbl_home_images where id in ('" . $deleted_carousel . "')");
        foreach ($image_to_delete as $res) {
          unlink("assets/home/" . $res['image']);
          $this->query("update tbl_home_images set `deleted_flag` = '1' where id = '" . $res['id'] . "'");
        }
      }
      // Delete Carousel Fields
      $this->query("select * from tbl_home_images where id in ('" . $deleted_carousel . "')");

      if (!empty($images['name'][0])) {
        $ctr = 0;
        foreach ($images['tmp_name'] as $key => $file_temp) {
          $ext = explode(".", $images["name"][$key]);
          $name = 'img_' . date('YmdHis') . "_" . $ctr . "." . end($ext);
          move_uploaded_file($file_temp, "assets/home/" . $name);
          $this->query("insert into tbl_home_images (image) values('$name')");
          $ctr++;
        }
      }


      $deleted_gallery = (isset($delete_gallery_image)) ? implode("','", $delete_gallery_image) : 0;
      // Delete Gallery File
      if (isset($delete_gallery_image)) {
        $image_to_delete = $this->get_list("select * from tbl_gallery where id in ('" . $deleted_gallery . "')");
        foreach ($image_to_delete as $res) {
          unlink("assets/home/" . $res['image']);
          $this->query("update tbl_gallery set `deleted_flag` = '1' where id = '" . $res['id'] . "'");
        }
      }
      // Delete Gallery Fields
      $this->query("select * from tbl_gallery where id in ('" . $deleted_gallery . "')");
      if (!empty($gallery_image['name'][0])) {
        $ctr = 0;
        foreach ($gallery_image['tmp_name'] as $key => $file_temp) {
          $ext = explode(".", $gallery_image["name"][$key]);
          $name = 'img_' . date('YmdHis') . "_" . $ctr . "." . end($ext);
          move_uploaded_file($file_temp, "assets/gallery/" . $name);
          $label = $gallery_new_label[$ctr];
          $this->query("insert into tbl_gallery (`image`,`label`) values( '$name','$label')");
          $ctr++;
        }
      }
      // Update Gallery Fields
      if (isset($gallery_id) && !empty($gallery_id)) {
        foreach ($gallery_id as $res) {
          $label = $gallery_label[$res];
          $this->query("update tbl_gallery set `label` = '$label' where id = '$res'");
        }
      }

      $deleted_officer = (isset($delete_officer_image)) ? implode("','", $delete_officer_image) : 0;
      // Delete Officer File
      if (isset($delete_officer_image)) {
        $image_to_delete = $this->get_list("select * from tbl_about_us_images where id in ('" . $deleted_officer . "')");
        foreach ($image_to_delete as $res) {
          unlink("assets/officer/" . $res['image']);
          $this->query("update tbl_about_us_images set `deleted_flag` = '1' where id = '" . $res['id'] . "'");
        }
      }
      // Delete Officer Fields
      $this->query("select * from tbl_about_us_images where id in ('" . $deleted_officer . "')");
      if (!empty($officer_image['name'][0])) {
        $ctr = 0;
        foreach ($officer_image['tmp_name'] as $key => $file_temp) {
          $ext = explode(".", $officer_image["name"][$key]);
          $name = 'img_' . date('YmdHis') . "_" . $ctr . "." . end($ext);
          move_uploaded_file($file_temp, "assets/officer/" . $name);
          $fullname = $officer_new_name[$ctr];
          $position = $officer_new_position[$ctr];
          $column = $officer_new_row[$ctr];
          $this->query("insert into tbl_about_us_images (`image`,`position`,`name`,`column`) values( '$name','$position','$fullname','$column')");
          $ctr++;
        }
      }
      // Update Officer Fields
      if (isset($officer_id) && !empty($officer_id)) {
        foreach ($officer_id as $res) {
          $fullname = $officer_name[$res];
          $position = $officer_position[$res];
          $column = $officer_row[$res];
          $this->query("update tbl_about_us_images set `position` = '$position',`name`='$fullname',`column` = '$column' where id = '$res'");
        }
      }

      // Commit Sqls
      $this->commit_transaction();
      $result->status = true;
      $result->result = $this->response_success("System Settings Updated!");
      $result->id = $id;
    } catch (mysqli_sql_exception $e) {
      // Rollback Sqls
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
      return $e->getMessage();
    }
    return $result;
  }
}
