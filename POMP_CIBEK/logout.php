<?php
session_start();
session_destroy();
header("Location: logoutsuccess.html");
exit();
?>
