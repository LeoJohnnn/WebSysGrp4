<?php
require_once(__DIR__ . '/resource/php/class/edit.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $edit = new edit($id);
    $edit->completeOrder();
    header('Location:index.php');
} else {
    header('Location:index.php');
}
?>
