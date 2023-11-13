<?php
require_once(__DIR__ . '/resource/php/class/insert.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $foodName = $_POST['food_name'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $notes = $_POST['notes'];
    $price = $_POST['price'];
    $customerName = $_POST['customer_name'];
    $deliveryAddress = $_POST['delivery_address'];

    // Calculate total price
    $totalPrice = $quantity * $price;

    $insert = new insert($foodName, $quantity, $location, $notes, $price, $customerName, $deliveryAddress, $totalPrice);
    $insert->insertOrder();
    header('Location:index.php');
} else {
    header('Location:index.php');
}
?>
