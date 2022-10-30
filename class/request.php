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
    $data['users'] = $this->get_list("select id,concat(last_name, ', ', first_name,' ', LEFT(middle_name, 1), '[#',id,']') as fullname from tbl_users_info where deleted_flag = 0");
    $data['request_type'] = $this->get_list("select * from tbl_request_type  where deleted_flag = 0");
    $data['request_status'] = $this->get_list("select * from tbl_request_status  where deleted_flag = 0");
    $data['gender'] = $this->get_list("select * from tbl_gender where deleted_flag = 0");
    $data['marital_status'] = $this->get_list("select * from tbl_marital_status where deleted_flag = 0");
    $data['city'] = $this->get_list("select * from tbl_city where deleted_flag = 0");
    $data['zone'] = $this->get_list("select * from tbl_zone where deleted_flag = 0");
    $data['purpose'] = $this->get_list("select * from tbl_purpose");
    $data['blood_type'] = $this->get_list("select * from tbl_blood_type");
    $data['business_type'] = $this->get_list("select * from tbl_business_type");
    $data['ownership_type'] = $this->get_list("select * from tbl_ownership_type");
    $data['application_type'] = $this->get_list("select * from tbl_application_type");
    $data['blood_type'] = $this->get_list("select * from tbl_blood_type");
    return $data;
  }

  public function get_requests_list()
  {
    return $this->get_list("select r.id,r.requester_id,r.request_status_id,concat(rq.last_name, ', ', rq.first_name,' ', LEFT(rq.middle_name, 1), '[#',rq.id,']') as requestor_name, concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as approver_name,rt.id as request_type_id,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request r left join tbl_users_info ui on ui.id = r.updated_by inner join tbl_request_type rt on rt.id = r.request_type_id  inner join tbl_request_status rs on rs.id = r.request_status_id inner join tbl_users_info rq on rq.id = r.requester_id order by r.updated_date desc");
  }

  public function get_barangay_clearance_list()
  {
    $order = " r.updated_date desc";
    if (isset($_GET['id'])) {
      $tmp = array(
        1 => "field(r.request_status_id, 1,2,4,5,6)",
        2 => "field(r.request_status_id, 2,1,4,5,6)",
        3 => "field(r.request_status_id, 5,1,2,4,6)"
      );
      $order = $tmp[$_GET['id']];
    }
    return $this->get_list("select r.id,r.purpose_id,r.requester_id,r.request_status_id,concat(rq.last_name, ', ', rq.first_name,' ', LEFT(rq.middle_name, 1), '[#',rq.id,']') as requestor_name, concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as approver_name,rt.id as request_type_id,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request_barangay r left join tbl_users_info ui on ui.id = r.updated_by inner join tbl_request_type rt on rt.id = r.request_type_id  inner join tbl_request_status rs on rs.id = r.request_status_id inner join tbl_users_info rq on rq.id = r.requester_id order by $order");
  }

  public function get_business_clearance_list()
  {
    $order = " r.updated_date desc";
    if (isset($_GET['id'])) {
      $tmp = array(
        1 => "field(r.request_status_id, 1,2,4,5,6)",
        2 => "field(r.request_status_id, 2,1,4,5,6)",
        3 => "field(r.request_status_id, 5,1,2,4,6)"
      );
      $order = $tmp[$_GET['id']];
    }

    return $this->get_list("select r.id,r.requester_id,r.request_status_id,concat(rq.last_name, ', ', rq.first_name,' ', LEFT(rq.middle_name, 1), '[#',rq.id,']') as requestor_name, concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as approver_name,rt.id as request_type_id,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request_business r left join tbl_users_info ui on ui.id = r.updated_by inner join tbl_request_type rt on rt.id = r.request_type_id  inner join tbl_request_status rs on rs.id = r.request_status_id inner join tbl_users_info rq on rq.id = r.requester_id order by $order");
  }

  public function get_barangay_id_list()
  {
    $order = " r.updated_date desc";
    if (isset($_GET['id'])) {
      $tmp = array(
        1 => "field(r.request_status_id, 1,2,4,5,6)",
        2 => "field(r.request_status_id, 2,1,4,5,6)",
        3 => "field(r.request_status_id, 5,1,2,4,6)"
      );
      $order = $tmp[$_GET['id']];
    }
    return $this->get_list("select r.id,r.requester_id,r.request_status_id,concat(rq.last_name, ', ', rq.first_name,' ', LEFT(rq.middle_name, 1), '[#',rq.id,']') as requestor_name, concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as approver_name,rt.id as request_type_id,rt.type as request_type,rs.status,r.updated_date,r.created_date from tbl_request_id r left join tbl_users_info ui on ui.id = r.updated_by inner join tbl_request_type rt on rt.id = r.request_type_id  inner join tbl_request_status rs on rs.id = r.request_status_id inner join tbl_users_info rq on rq.id = r.requester_id order by $order");
  }

  public function get_barangay_id($id)
  {
    $data = new stdClass();

    if (empty($id)) {
      return $data;
    }

    $request = $this->get_one("select * from tbl_request_id where deleted_flag = 0 and id = $id limit 1");
    $data = $request;
    $data->resident = $this->get_one("select * from tbl_users_info  where deleted_flag = 0 and id = $request->requester_id limit 1");
    $data->history = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,rh.* from tbl_request_history rh inner join tbl_users_info ui on ui.id = rh.created_by inner join tbl_request_status s on s.id = rh.request_status_id where rh.deleted_flag = 0 and rh.request_id = $id and rh.request_type_id = 3 order by rh.created_date desc");
    return $data;
  }

  public function get_barangay_clearance($id)
  {
    $data = new stdClass();

    if (empty($id)) {
      return $data;
    }

    $request = $this->get_one("select * from tbl_request_barangay where deleted_flag = 0 and id = $id limit 1");
    $data = $request;
    $data->resident = $this->get_one("select * from tbl_users_info  where deleted_flag = 0 and id = $request->requester_id limit 1");
    $data->history = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,rh.* from tbl_request_history rh inner join tbl_users_info ui on ui.id = rh.created_by inner join tbl_request_status s on s.id = rh.request_status_id where rh.deleted_flag = 0 and rh.request_id = $id and rh.request_type_id = 1 order by rh.created_date desc");
    return $data;
  }

  public function get_business_clearance($id)
  {
    $data = new stdClass();

    if (empty($id)) {
      return $data;
    }
    $request = $this->get_one("select * from tbl_request_business where deleted_flag = 0 and id = $id limit 1");
    $data = $request;
    $data->resident = $this->get_one("select * from tbl_users_info  where deleted_flag = 0 and id = $request->requester_id limit 1");
    $data->history = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,rh.* from tbl_request_history rh inner join tbl_users_info ui on ui.id = rh.created_by inner join tbl_request_status s on s.id = rh.request_status_id where rh.deleted_flag = 0 and rh.request_id = $id and rh.request_type_id = 2 order by rh.created_date desc");
    return $data;
  }

  public function get_request($id, $type = null)
  {
    $data = new stdClass();

    if (empty($id)) {
      return $data;
    }
    if (empty($type)) {
      $request = $this->get_one("select * from tbl_request where deleted_flag = 0 and id = $id limit 1");
      $data = $request;
      $data->resident = $this->get_one("select * from tbl_users_info  where deleted_flag = 0 and id = $request->requester_id limit 1");
      $data->history = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,rh.* from tbl_request_history rh inner join tbl_users_info ui on ui.id = rh.created_by inner join tbl_request_status s on s.id = rh.request_status_id where rh.deleted_flag = 0 and rh.request_id = $id order by rh.created_date desc");
      return $data;
    } else {
      $types = array(
        1 => 'tbl_request_barangay',
        2 => 'tbl_request_business',
        3 =>   'tbl_request_id'
      );
      $table = $types[$type];
      $request = $this->get_one("select * from $table where id = $id limit 1");
      $data = $request;
      $data->resident = $this->get_one("select * from tbl_users_info  where deleted_flag = 0 and id = $request->requester_id limit 1");
      $data->history = $this->get_list("select concat(ui.last_name, ', ', ui.first_name,' ', LEFT(ui.middle_name, 1), '[#',ui.id,']') as fullname,s.status,rh.* from tbl_request_history rh inner join tbl_users_info ui on ui.id = rh.created_by inner join tbl_request_status s on s.id = rh.request_status_id where rh.deleted_flag = 0 and rh.request_id = $id order by rh.created_date desc");
      return $data;
    }
  }

  public function request_generate()
  {
    extract($this->escape_data(array_merge($_SESSION, $_POST)));

    $result = $this->response_obj();
    $this->start_transaction();
    try {
      $request_id = $this->insert_get_id("insert into tbl_request (requester_id, request_type_id, request_status_id, updated_by) values ($id, $request_type, 1, $user->id)");
      $this->query("INSERT INTO tbl_request_history (request_id, request_status_id, remarks, created_by) values($request_id, 1, 'System Generated', $user->id)");

      $this->commit_transaction();
      $result->status = true;
      $result->result = $this->response_success("Request ID#$request_id Created!");
      $result->id = $request_id;
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
    }
    return $result;
  }



  public function request_barangay_clearance()
  {
    extract($this->escape_data(array_merge($_SESSION, $_POST)));

    $result = $this->response_obj();
    $errors = array();
    $msg = '';

    // Require Fields
    $required_fields = array('issued_date');
    // 'tin', 'phil_health', 'sss', 'contact_person', 'contact_person_address', 'contact_person_no'

    foreach ($required_fields as $res) {
      if (empty(${$res})) {
        $errors[] = $res;
      }
    }

    if ($purpose_id == 11 && empty($others)) {
      $errors[] = 'others';
    }

    if ($minor == 1 && empty($guardian)) {
      $errors[] = 'guardian';
    }

    if (!empty($errors)) {
      $msg .= "Please Fill Blank Fields!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $errors);
      return $result;
    }

    $this->start_transaction();
    try {
      // blood_type_id,phil_health,sss,tin,contact_person,contact_person_address,contact_person_no
      // '$blood_type_id','$phil_health','$sss','$tin','$contact_person','$contact_person_address','$contact_person_no',
      $request_id = $this->insert_get_id("INSERT INTO tbl_request_barangay  (purpose_id,others,issued_date,requester_id,minor,guardian,updated_by) values('$purpose_id','$others','$issued_date','$user->id','$minor','$guardian','$user->id')");
      $this->query("INSERT INTO tbl_request_history (request_id, request_type_id, request_status_id, remarks, created_by) values($request_id, 1, 1, 'System Generated', $user->id)");

      $this->commit_transaction();
      $result->result = $this->response_success("Request Submitted!");
      $result->status = true;
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
      $result->result = $this->response_error();
    }
    return $result;
  }

  public function request_barangay_id()
  {
    extract($this->escape_data(array_merge($_SESSION, $_POST, $_FILES)));

    $result = $this->response_obj();
    $errors = array();
    $msg = '';

    // Require Fields
    $required_fields = array('issued_date');
    // 'tin', 'phil_health', 'sss', 'contact_person', 'contact_person_address', 'contact_person_no'

    foreach ($required_fields as $res) {
      if (empty(${$res})) {
        $errors[] = $res;
      }
    }

    if ($minor == 1 && empty($guardian)) {
      $errors[] = 'guardian';
    }

    if (empty($government_id['name'])) {
      $errors[] = 'government_id';
    }

    if (empty($picture['name'])) {
      $errors[] = 'picture';
    }
    if (empty($signature['name'])) {
      $errors[] = 'signature';
    }

    if (!empty($errors)) {
      $msg .= "Please Fill Blank Fields!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $errors);
      return $result;
    }

    $maxsize    = 1048576;
    if (($government_id['size'] >= $maxsize)) {
      $errors[] = 'government_id';
    }
    if (($picture['size'] >= $maxsize)) {
      $errors[] = 'picture';
    }
    if (($signature['size'] >= $maxsize)) {
      $errors[] = 'signature';
    }

    if (!empty($errors)) {
      $msg .= "File Size(1mb) Exceeded!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $errors);
      return $result;
    }

    $this->start_transaction();
    try {

      if (!empty($government_id['name'])) {
        $ext = explode(".", $government_id["name"]);
        $government_img = 'img_' . date('YmdHis') . "." . end($ext);
        move_uploaded_file($government_id['tmp_name'], "files/government/" . $government_img);
      }
      if (!empty($picture['name'])) {
        $ext = explode(".", $picture["name"]);
        $picture_img = 'img_' . date('YmdHis') . "." . end($ext);
        move_uploaded_file($picture['tmp_name'], "files/id/" . $picture_img);
      }
      if (!empty($signature['name'])) {
        $ext = explode(".", $signature["name"]);
        $signature_img = 'img_' . date('YmdHis') . "." . end($ext);
        move_uploaded_file($signature['tmp_name'], "files/signature/" . $signature_img);
      }
      // blood_type_id,phil_health,sss,tin,contact_person,contact_person_address,contact_person_no,
      // '$blood_type_id','$phil_health','$sss','$tin','$contact_person','$contact_person_address','$contact_person_no',
      $request_id = $this->insert_get_id("INSERT INTO tbl_request_id (issued_date,requester_id,minor,guardian,updated_by,government_id,picture,`signature`) values('$issued_date','$user->id','$minor','$guardian','$user->id','$government_img','$picture_img','$signature_img' )");
      $this->query("INSERT INTO tbl_request_history (request_id, request_type_id, request_status_id, remarks, created_by) values($request_id, 3, 1, 'System Generated', $user->id)");

      $this->commit_transaction();
      $result->result = $this->response_success("Request Submitted!");
      $result->status = true;
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
      $result->result = $this->response_error();
    }
    return $result;
  }
  public function request_business()
  {
    extract($this->escape_data(array_merge($_SESSION, $_POST, $_FILES)));

    $result = $this->response_obj();
    $errors = array();
    $msg = '';

    // Require Fields
    $required_fields = array('issued_date', 'business_name', 'address', 'no_employees', 'owner_name', 'email', 'contact_no');

    foreach ($required_fields as $res) {
      if (empty(${$res})) {
        $errors[] = $res;
      }
    }


    if ($application_id == 1) {
      if (empty($business_start)) {
        $errors[] = 'business_start';
      }
      if (empty($dti['name'])) {
        $errors[] = 'dti';
      }
      if (empty($contract['name'])) {
        $errors[] = 'contract';
      }
    } else if ($application_id == 2) {
      if (empty($old_clearance['name'])) {
        $errors[] = 'old_clearance';
      }
    } else if ($application_id == 3) {
      if (empty($serial_no)) {
        $errors[] = 'serial_no';
      }
      if (empty($affidavit['name'])) {
        $errors[] = 'affidavit';
      }
      if (empty($request_letter['name'])) {
        $errors[] = 'request_letter';
      }
    }

    if ($business_id == 9 && empty($others)) {
      $errors[] = 'others';
    }

    if (!empty($errors)) {
      $msg .= "Please Fill Blank Fields!";
      $result->result = $this->response_error($msg);
      $result->items = implode(',', $errors);
      return $result;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $result->result = $this->response_error("Invalid Email Format!");
      $result->items = implode(',', array('email'));
      return $result;
    }

    $this->start_transaction();
    try {

      $extra = '';
      $extra_value = '';
      if ($application_id == 1) {
        if (!empty($dti['name'])) {
          $ext = explode(".", $dti["name"]);
          $dti_file = 'file_' . date('YmdHis') . "." . end($ext);
          move_uploaded_file($dti['tmp_name'], "files/dti/" . $dti_file);
        }
        if (!empty($contract['name'])) {
          $ext = explode(".", $contract["name"]);
          $contract_file = 'file_' . date('YmdHis') . "." . end($ext);
          move_uploaded_file($contract['tmp_name'], "files/contract/" . $contract_file);
        }
        $extra .= ",business_start,dti,contract";
        $extra_value .= ",'$business_start', '$dti_file', '$contract_file'";
      } else if ($application_id == 2) {
        if (!empty($old_clearance['name'])) {
          $ext = explode(".", $old_clearance["name"]);
          $old_clearance_file = 'file_' . date('YmdHis') . "." . end($ext);
          move_uploaded_file($old_clearance['tmp_name'], "files/old_clearance/" . $old_clearance_file);
        }
        $extra .= ",old_clearance";
        $extra_value .= ",'$old_clearance_file'";
      } else if ($application_id == 3) {
        if (!empty($affidavit['name'])) {
          $ext = explode(".", $affidavit["name"]);
          $affidavit_file = 'file_' . date('YmdHis') . "." . end($ext);
          move_uploaded_file($affidavit['tmp_name'], "files/affidavit/" . $affidavit_file);
        }
        if (!empty($request_letter['name'])) {
          $ext = explode(".", $request_letter["name"]);
          $request_letter_file = 'file_' . date('YmdHis') . "." . end($ext);
          move_uploaded_file($request_letter['tmp_name'], "files/request_letter/" . $request_letter_file);
        }
        $extra .= ",serial_no,affidavit,request_letter";
        $extra_value .= ",'$serial_no', '$affidavit_file', '$request_letter_file'";
      }
      // '$user->id'
      // print_r("INSERT INTO tbl_request_id (application_id,issued_date,ownership_id,business_id,`others`,business_name,`address`,no_employees,`description`,owner_name,email,contact_no,requester_id,request_type_id,request_status_id,updated_by " . $extra . ") values('$application_id','$issued_date','$ownership_id','$business_id','$others','$business_name','$address','$no_employees','$description','$owner_name','$email','$contact_no','$user->id',2,1,'$user->id' " . $extra_value . ")");

      $request_id = $this->insert_get_id("INSERT INTO tbl_request_business (application_id,issued_date,ownership_id,business_id,others,business_name,`address`,no_employees,`description`,owner_name,email,contact_no,requester_id,request_type_id,request_status_id,updated_by " . $extra . ") values('$application_id','$issued_date','$ownership_id','$business_id','$others','$business_name','$address','$no_employees','$description','$owner_name','$email','$contact_no','$user->id',2,1,'$user->id' " . $extra_value . ")");
      $this->query("INSERT INTO tbl_request_history (request_id, request_type_id, request_status_id, remarks, created_by) values($request_id, 2, 1, 'System Generated', $user->id)");

      $this->commit_transaction();
      $result->result = $this->response_success("Request Submitted!");
      $result->status = true;
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
      $result->result = $this->response_error();
    }
    return $result;
  }


  public function change_status_request()
  {
    extract($this->escape_data(array_merge($_SESSION, $_POST)));

    $result = $this->response_obj();
    $request_data = $this->get_request($id, $type);

    if ($status == $request_data->request_status_id) {
      $result->result = $this->response_error("Request Status Is the Same!");
      $result->items = 'status';
      return $result;
    }

    $types = array(
      1 => 'tbl_request_barangay',
      2 => 'tbl_request_business',
      3 =>  'tbl_request_id'
    );

    $title = array(
      1 => 'Barangay Clearance',
      2 => 'Business Clearance',
      3 => 'Barangay ID'
    );

    $table = $types[$type];
    $request_type = $title[$type];

    $this->start_transaction();
    try {
      $updated_date = date('Y-m-d H:i:s');
      $this->query("INSERT INTO tbl_request_history (request_id, request_type_id, request_status_id, remarks, created_by) values($id, $type, $status, '$remarks', $user->id)");
      $this->query("UPDATE $table set request_status_id = $status, updated_date = '$updated_date', updated_by ='$user->id' where id = $id ");
      // approved
      if (isset($send_sms) && $status == 2) {
        $recipients = $this->get_list("select contact_no from tbl_users u inner join tbl_users_info ui on ui.id = u.id where u.deleted_flag = 0  and u.status_id = 2 and id = $id");
        foreach ($recipients as $res) {
          if (strlen($res['contact_no'] == 11)) {
            $this->sms($res['contact_no'], "Magandang Araw!\n
Your request for a certificate / clearance / ID has been approved.\n
You can claim the document at the barangay hall in the next 2 days.\n
]n
Maraming salamat po!\n
\n 
From:\n
BARANGAY WAWA – TAGUIG CITY\n
 \n
For more details, text & call:\n
Barangay Wawa - 0945 849 0538\n
");
          }
        }
      }

      // deny
      if (isset($send_sms) && $status == 6) {
        $recipients = $this->get_list("select contact_no from tbl_users u inner join tbl_users_info ui on ui.id = u.id where u.deleted_flag = 0  and u.status_id = 2 and id = $id");
        foreach ($recipients as $res) {
          if (strlen($res['contact_no'] == 11)) {
            $this->sms($res['contact_no'], "Magandang Araw!\n
Your request for a certificate / clearance / ID has been denied.\n
You can check our official website to check the following requirements.\n
or inquire to the Barangay Hall, 2nd Floor.\n
Maraming salamat po!\n
\n
 \n
From:\n
BARANGAY WAWA – TAGUIG CITY\n
 \n
For more details, text & call:\n
Barangay Wawa - 0945 849 0538
");
          }
        }
      }

      $this->commit_transaction();
      $result->status = true;
      $result->result = $this->response_success("$request_type ID#$id Status Changed!");
      $result->id = $id;
    } catch (mysqli_sql_exception $e) {
      $this->roll_back();
      $new = new self($this->conn);
      $new->save_error($e->getMessage());
    }
    return $result;
  }
}
