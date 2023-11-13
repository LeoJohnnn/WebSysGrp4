<?php
require_once('config.php');

class edit extends config
{
    public $id;

    function __construct($id = null)
    {
        $this->id = $id;
    }

    public function completeOrder()
    {
        $config = new config;
        $con = $config->con();
        $sql = "UPDATE `food_orders_tbl` SET `status`='completed', `order_completed_date` = NOW() WHERE `id` = $this->id";
        $data = $con->prepare($sql);
        $data->execute();
    }
}
?>
