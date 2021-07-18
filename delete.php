<?php
require_once('database.php');
if ($_REQUEST['id']) {
    $id = $_REQUEST['id'];
    $select = "DELETE FROM sms WHERE id = $id";
    $delete = $conn->query($select);
    header("location:view.php");
}
?>