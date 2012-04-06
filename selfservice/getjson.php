<?php
/*header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');*/

$arrData['success'] = true;
echo $_GET['callback'].'('.json_encode($arrData).')';
?>
