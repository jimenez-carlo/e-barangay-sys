<?php
class Blotter extends Base
{
  private $conn;
  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function create_blotter()
  {
  }
}
