<?php
require_once('config.php');

class delete extends config
{
    public $id;

    function __construct($id = null)
    {
        $this->id = $id;
    }

    public function deleteOrder()
    {
        $config = new config;
        $con = $config->con();
        $sql = "DELETE FROM `food_orders_tbl` WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        $data->execute();
    }
}
?>
