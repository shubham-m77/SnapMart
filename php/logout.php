<?php
setcookie("sm_auth_ui","",time()-(60*60*24),'/',$_SERVER['HTTP_HOST'], true, true);
header("Location:../index.php")
?>