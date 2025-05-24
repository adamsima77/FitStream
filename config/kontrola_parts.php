<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/FitStream/vendor/autoload.php');
use FitStream\Utilities\Utilities;
$util = new Utilities();
$util->kontrolaParts();
?>