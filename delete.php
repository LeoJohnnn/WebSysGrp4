<?php
require_once(__DIR__ . '/resource/php/class/delete.php');

if (!empty($_GET['id'])) {
    $delete = new delete($_GET['id']);
    $delete->deleteOrder();
    header('Location:index.php');
} else {
    header('Location:index.php');
}
?>
