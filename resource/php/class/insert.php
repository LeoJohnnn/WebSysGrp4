<?php
require_once('config.php');

class insert extends config
{
    public $foodName;
    public $quantity;
    public $location;
    public $notes;
    public $price;
    public $customerName;
    public $deliveryAddress;
    public $totalPrice;

    function __construct($foodName = null, $quantity = null, $location = null, $notes = null, $price = null, $customerName = null, $deliveryAddress = null, $totalPrice = null)
    {
        $this->foodName = $foodName;
        $this->quantity = $quantity;
        $this->location = $location;
        $this->notes = $notes;
        $this->price = $price;
        $this->customerName = $customerName;
        $this->deliveryAddress = $deliveryAddress;
        $this->totalPrice = $totalPrice;
    }

    public function insertOrder()
    {
        $config = new config;
        $con = $config->con();

        // Format totalPrice as a float with two decimal places
        $formattedTotalPrice = sprintf("%.2f", $this->totalPrice);

        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO `food_orders_tbl` (`food_name`, `quantity`, `location`, `notes`, `price`, `customer_name`, `delivery_address`, `total_price`, `status`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending')";

        $data = $con->prepare($sql);
        $data->bindParam(1, $this->foodName);
        $data->bindParam(2, $this->quantity, PDO::PARAM_INT);
        $data->bindParam(3, $this->location);
        $data->bindParam(4, $this->notes);
        $data->bindParam(5, $this->price, PDO::PARAM_INT);
        $data->bindParam(6, $this->customerName);
        $data->bindParam(7, $this->deliveryAddress);
        $data->bindParam(8, $formattedTotalPrice, PDO::PARAM_STR);

        $data->execute();
    }

}
?>