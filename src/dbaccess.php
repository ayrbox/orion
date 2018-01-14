
<?php
require_once('config.php');

class dbaccess {


  var $conn;
  var $error;

  function __construct() {
    $this->conn = new mysqli(
      DB_HOST,       
      DB_USER,
      DB_PASSWORD,
      DB_NAME
    );

    if(mysqli_connect_errno()) {
      echo "Unable to connect to database:" . mysqli_connect_error();
    }
  }



  function query($sql) {
    $result = mysqli_query($this->conn, $sql)  ;
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    return $data;
  }


  function get_data($table, $where) {
    $sql = "select * from " . $table;
    if($where != "") {
      $sql .= " WHERE " . $where;
    };    
    $result = mysqli_query($this->conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    return $data;
  }

  function get_single($table, $where) {
    $data = $this->get_data($table, $where);

    if(mysqli_affected_rows($this->conn) > 0) {
      return $data[0];
    } else {
      return null;
    }
  }
  
  

  function insert ($table, $data) {

    $fields ='`' . implode("`, `", array_keys($data)) . '`';

    $values = "'" . implode("', '", $data) . "'";

    $sql = "INSERT INTO `$table` ($fields) VALUES ($values)";

    mysqli_query($this->conn, $sql);
    if(mysqli_connect_errno()) {
      echo "Unable to connect to database:" . mysqli_connect_error();
    }
  }


  function update ($table, $data, $where) {

    $count = 0;
    $set = "";
    foreach($data as $field => $value) {
      if($count++ != 0) $set .= ', ';
      $set .= "`$field` = '$value'";
    }

    $sql = "UPDATE `$table` SET $set WHERE $where";

    mysqli_query($this->conn, $sql);

  }


  function delete($table, $where) {
    $sql = "DELETE FROM `$table` WHERE $where";
    mysqli_query($this->conn, $sql);
  }


  

  function __destruct() {
    mysqli_close($this->conn);
    $this->conn = null;
  }
  
}