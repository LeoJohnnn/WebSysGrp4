<?php
require_once('resource/php/class/view.php');
require_once('resource/php/class/insert.php');

$view = new view();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $foodName = $_POST['food_name'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $notes = $_POST['notes'];
    $price = $_POST['price'];
    $customerName = $_POST['customer_name'];
    $deliveryAddress = $_POST['delivery_address'];

    $insert = new insert($foodName, $quantity, $location, $notes, $price, $customerName, $deliveryAddress);
    $insert->insertOrder();
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        integrity="sha384-pzjw8Y+JzKhtGkgtXtW24pqQDIKntj3Uuus+LnL2dgf2N8kcbU+DN1uqBuZJmLl"
        crossorigin="anonymous">

    <title>Food Orders</title>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Food Orders</h2>

        <form action='index.php' method='POST' class='mb-4'>
            <div class="row">
                <div class="col-4">
                    <input type="text" name='food_name' class='form-control' placeholder="Food Name" required>
                </div>
                <div class="col-2">
                    <input type="number" name='quantity' class='form-control' placeholder="Quantity" required>
                </div>
                <div class="col-3">
                    <input type="text" name='location' class='form-control' placeholder="Location" required>
                </div>
                <div class="col-3">
                    <input type="text" name='notes' class='form-control' placeholder="Notes">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-3">
                    <input type="number" name='price' class='form-control' placeholder="Price" required>
                </div>
                <div class="col-4">
                    <input type="text" name='customer_name' class='form-control' placeholder="Customer Name" required>
                </div>
                <div class="col-5">
                    <input type="text" name='delivery_address' class='form-control' placeholder="Delivery Address"
                        required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-success">Add Order</button>
                </div>
            </div>
        </form>

        <?php
        $view->viewOrders();
        $view->viewCompletedOrders();
        ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8Y+JzKhtGkgtXtW24pqQDIKntj3Uuus+LnL2dgf2N8kcbU+DN1uqBuZJmLl"
        crossorigin="anonymous"></script>
</body>

</html>
