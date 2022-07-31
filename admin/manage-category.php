<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1> Manage Category </h1>

        <br /><br />
                
                <?php
                    if(isset($_SESSION['add'])) //To check if session is set or not
                    {
                        echo $_SESSION['add']; //Display the Session Message if SET
                        unset($_SESSION['add']); //Remove Session Message
                    }
                

                
                    if(isset($_SESSION['remove'])) //To check if session is set or not
                    {
                        echo $_SESSION['remove']; //Display the Session Message if SET
                        unset($_SESSION['remove']); //Remove Session Message
                    }

                    if(isset($_SESSION['delete'])) //To check if session is set or not
                    {
                        echo $_SESSION['delete']; //Display the Session Message if SET
                        unset($_SESSION['delete']); //Remove Session Message
                    }

                    if(isset($_SESSION['no-category-found'])) //To check if session is set or not
                    {
                        echo $_SESSION['no-category-found']; //Display the Session Message if SET
                        unset($_SESSION['dno-category-found']); //Remove Session Message
                    }
                ?>
                <br/><br/>

                 <!-- Button to add Category -->

                 <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary"> Add Category </a>

                 <br /><br /><br />

                 <table class="tbl-full">
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Featured</th>    
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>

                        <?php

                            $sql = "SELECT * FROM tbl_category";

                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);

                            $sn=1;

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id= $row['id'];
                                    $title = $row['title'];
                                    $image_name = $row['image_name'];
                                    $featured = $row['featured'];
                                    $active = $row['active'];
                                    
                                    ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        
                                        <td>
                                            
                                            <?php  
                                        
                                            if($image_name!="")
                                            {
                                                ?>
                                                <img src = "<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" width = "150 px" >
                                                <?php
                                            }
                                            else
                                            {
                                                echo "<div class= 'error> Image not Added. </div>";
                                            }
                                            ?>
                                    
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            
                                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger"> Delete Category </a>
                                        </td>
                                    </tr>


                                    <?php
                                }
                            }
                            else
                            {
                                ?>

                                <tr>
                                    <td colspan="6"><div class = "error"> No Categories Added </div></td>
                                </tr>
                                
                                <?php

                                
                            }

                        ?>
            
                 </table>
    </div>
</div>

<?php include('partials/footer.php') ?>