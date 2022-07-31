<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Manage Order </h1>

        <br /><br />

                 <br /><br /><br />

                 <table class="tbl-full">
                        <tr>
                            <th>S.N</th>
                            <th>Food</th>
                            <th>Price</th>
                            <th>Qty.</th> 
                            <th>Total</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Customer Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th> 
                        </tr>
                        <?php
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; 

                        $res = mysqli_query($conn, $sql);

                        $sn = 1;
                        
                        $count = mysqli_num_rows($res);
                        
                        if($count>0)
                        {
                            while($row = mysqli_fetch_assoc($res))
                            {
                            $id = $row['id'];
                            $food = $row['food'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $customer_contact = $row['customer_contact'];
                            $customer_email = $row['customer_email'];
                            $customer_address = $row['customer_address'];

                            ?>
                                <tr>
                                <td><?php echo $sn++; ?>. </td>

                                <td><?php echo $food; ?></td>

                                <td><?php echo $price; ?></td>

                                <td><?php echo $qty; ?></td>

                                <td><?php echo $total; ?></td>

                                <td><?php echo $order_date; ?></td>

                                <td><?php echo $status; ?></td>

                                <td><?php echo $customer_name; ?></td>

                                <td><?php echo $customer_contact; ?></td>

                                <td><?php echo $customer_email; ?></td>

                                <td><?php echo $customer_address; ?></td>
                            <td>
                                <a href="#" class="btn-secondary"> Update Order </a>
                                
                            </td>
                        </tr>
                            <?php

                            }
                        }
                        else
                        {
                            header('location:'.SITEURL);
                        }

                        ?>
                        
                        
                 </table>
    </div>
</div>

<?php include('partials/footer.php') ?>