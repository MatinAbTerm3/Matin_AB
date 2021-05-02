<?php
//Controller
include '../includes/settings.php';
include '../includes/functions.php';

$db = new DB();

$table = User::find();

unset($db);

$alerts = Alert::alerts();;

include '../includes/view/showUsers.php';

?>