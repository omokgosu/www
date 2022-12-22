<?
  //header("Content-Type:application/json");
   @extract($_POST);

      include "../lib/dbconn.php";

      $sql = "select * from member";
      $result = mysql_query($sql, $connect);

      $db_id = array();
      $db_name = array();
      $db_nick = array();
      $db_hp = array();
      $db_email = array();

      while ( $row = mysql_fetch_array($result)) {
         array_push($db_id, $row[id]);
         array_push($db_name,$row[name]);
         array_push($db_nick,$row[nick]);
         array_push($db_hp,$row[hp]);
         array_push($db_email,$row[email]);
      }
      echo json_encode(array("mode" => $_REQUEST['mode'], "id" => $db_id, "name" => $db_name, "nick" => $db_nick, "hp" => $db_hp, "email" => $db_email));
      //echo json_encode(array("id" => $db_id, "name" => $db_name, "nick" => $db_nick, "hp" => $db_hp, "email" => $db_email));
     
      mysql_close();
?>

