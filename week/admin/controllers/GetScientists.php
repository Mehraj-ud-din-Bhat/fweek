<?php
require_once('connection.php');
require_once('AdminController.php');
$admin=new AdminManager();


echo json_encode($admin->getDetails());
?>