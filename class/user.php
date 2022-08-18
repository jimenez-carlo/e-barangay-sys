<?php
class User extends Base
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
    $data['status'] = $this->get_list("select * from tbl_user_status where deleted_flag = 0");
    $data['users'] = $this->get_list("select id,concat(last_name, ', ', first_name,' ', LEFT(middle_name, 1), '[#',id,']') as fullname from tbl_users_info where deleted_flag = 0");
    $data['gender'] = $this->get_list("select * from tbl_gender where deleted_flag = 0");
    $data['marital_status'] = $this->get_list("select * from tbl_marital_status where deleted_flag = 0");
    $data['positions'] = $this->get_list("select * from tbl_barangay_positions where deleted_flag = 0");
    $data['city'] = $this->get_list("select * from tbl_city where deleted_flag = 0");
    $data['zone'] = $this->get_list("select * from tbl_zone where deleted_flag = 0");
    $data['barangay'] = $this->get_list("select * from tbl_barangay where deleted_flag = 0");
    return $data;
  }

  public function get_user($id = false)
  {
    if (empty($id)) {
      return false;
    }
    return $this->get_one("select u.*,ui.*,a.name as access_name,b.name as barangay_name,bp.title as barangay_position,c.name as city_name,z.zone as zone_name,g.gender as gender_name,ms.status as marital_status_name FROM tbl_users u inner join tbl_users_info ui on ui.id = u.id inner join tbl_access a on a.id = u.access_id  left join tbl_barangay b on b.id = ui.barangay_id left join tbl_barangay_positions bp on bp.id = ui.barangay_position_id left join tbl_city c on c.id = ui.city_id left join tbl_zone z on z.id = ui.zone_id left join tbl_gender g on g.id = ui.gender_id  left join tbl_marital_status ms on ms.id = ui.marital_status_id  inner join tbl_user_status s on s.id = u.status_id where u.id = $id and u.deleted_flag = 0");
  }
}
