<?php include('partials/menu.php') ?>

        <!-- Main Content Section Starts -->
        <div class = "main-content">
            <div class= "wrapper">
                 <h1> MANAGE ADMIN </h1>
                 <br /><br />

                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }
                    
                ?>
                <br/><br/><br/>

                 <!-- Button to add Admins -->

                 <a href="add-admin.php" class="btn-primary"> Add Admin </a>
                 <br /><br /><br />

                 <table class="tbl-full">
                        <tr>
                            <th>S.No</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Actions</th>    
                        </tr>

                        <?php 
                            //Query to Get all admin
                            $sql = "SELECT * FROM tbl_admin";
                            //Execute the query
                            $res = mysqli_query($conn, $sql);

                            //To check if the query is executed or not
                            if($res==TRUE)
                            {
                                //Count Rows to check we have data in database or not
                                $count = mysqli_num_rows($res);

                                $sn=1; //Create a variable and assign the value

                                if($count>0)
                                {   
                                    //We have data
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        //using while loop to get all the data from the database
                                        //And while loop will run as long as we have data in the database

                                        $id=$rows['id'];
                                        $full_name=$rows['full_name'];
                                        $username=$rows['username'];

                                        //Display the values in our table
                                        ?>

                                        <tr>
                                        <td><?php echo $sn++; ?></td>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class = "btn-primary">Update Password</a>
                                          
                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger"> Delete Admin </a>
                                            </td>
                                        </tr>
                                           
                                           



                                        <?php
                                    }
                                }
                                else
                                {
                                    //We do not have data in the datab=ase
                                }

                            }
                        ?>
                        
                        

                 </table>
                

                 <div class="clearfix"></div>
            </div>    
         </div>
        <!-- Main Content Section Ends -->
        
 <?php include('partials/footer.php') ?>