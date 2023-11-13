<?php
require_once('config.php');

class view extends config
{
    public function viewOrders()
    {
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `food_orders_tbl` WHERE `status` = 'pending'";
        $data = $con->prepare($sql);
        $data->execute();
        $data = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<table class='table'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Food Name</th>
                    <th scope='col'>Quantity</th>
                    <th scope='col'>Location</th>
                    <th scope='col'>Notes</th>
                    <th scope='col'>Price</th>
                    <th scope='col'>Customer Name</th>
                    <th scope='col'>Order Date</th>
                    <th scope='col'>Delivery Address</th>
                    <th scope='col'>Total Price</th>
                    <th scope='col'>Status</th>
                    <th scope='col'>Order Notes</th>
                    <th scope='col'>Order Completed Date</th>
                    <th scope='col'>Actions</th>
                </tr>
            </thead>
            <tbody>";

        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['food_name']}</td>";
            echo "<td>{$row['quantity']}</td>";
            echo "<td>{$row['location']}</td>";
            echo "<td>{$row['notes']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "<td>{$row['customer_name']}</td>";
            echo "<td>{$row['order_date']}</td>";
            echo "<td>{$row['delivery_address']}</td>";
            echo "<td>{$row['total_price']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>{$row['order_notes']}</td>";
            echo "<td>{$row['order_completed_date']}</td>";
            echo "<td>
                    <a href='edit.php?id={$row['id']}' class='btn btn-success'>Complete Order</a>
                    <a href='delete.php?id={$row['id']}' class='btn btn-danger'>Delete Order</a>
                  </td>";
            echo "</tr>";
        }
        echo '
            </tbody>
        </table>';
    }
    public function viewCompletedOrders()
    {
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `food_orders_tbl` WHERE `status` = 'completed'";
        $data = $con->prepare($sql);
        $data->execute();
        $data = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<table class='table'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Food Name</th>
                    <th scope='col'>Quantity</th>
                    <th scope='col'>Location</th>
                    <th scope='col'>Notes</th>
                    <th scope='col'>Price</th>
                    <th scope='col'>Customer Name</th>
                    <th scope='col'>Order Date</th>
                    <th scope='col'>Delivery Address</th>
                    <th scope='col'>Total Price</th>
                    <th scope='col'>Status</th>
                    <th scope='col'>Order Notes</th>
                    <th scope='col'>Order Completed Date</th>
                    <th scope='col'>Actions</th>
                </tr>
            </thead>
            <tbody>";

        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['food_name']}</td>";
            echo "<td>{$row['quantity']}</td>";
            echo "<td>{$row['location']}</td>";
            echo "<td>{$row['notes']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "<td>{$row['customer_name']}</td>";
            echo "<td>{$row['order_date']}</td>";
            echo "<td>{$row['delivery_address']}</td>";
            echo "<td>{$row['total_price']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>{$row['order_notes']}</td>";
            echo "<td>{$row['order_completed_date']}</td>";
            echo "<td>
                    <a href='delete.php?id={$row['id']}' class='btn btn-danger'>Delete Order</a>
                  </td>";
            echo "</tr>";
        }
        echo '
            </tbody>
        </table>';
    }
}
?>
