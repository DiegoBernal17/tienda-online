<?php
require_once('../global.php');
if(isset($_SESSION['user'])):
  echo '1';
else:
  echo '0';
endif;
?>