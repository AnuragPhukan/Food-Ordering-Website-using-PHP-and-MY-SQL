<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Update Category </h1>
        <br/><br/>

        <?php

            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                $sql="SELECT * FROM tbl_category WHERE id=$id";
                $res=mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['active'];

                }
                else
                {
                    $_SESSION['no-category-found'] = "<div class = 'error'> Category not found.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                    
                }
                
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
                <tr>
                   <td> Title: </td>
                   <td><input type="text" name="title" value = "<?php echo $title; ?>"></td>
                </tr>
                


                <tr>
                   <td> Current Image: </td>
                   <td>
                        Image will be displayed here
                   </td>
                </tr>


                <tr>
                   <td> New Image </td>
                   <td>
                    <input type="file" name="image">
                
                   </td>
                </tr>

                <tr>
                   <td> Featured: </td>
                   <td><input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                </tr>
                
                
                <tr>
                   <td> Active: </td>
                   <td><input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                </tr>

                <tr>
                   <td colspan="2">  
                        <input type="submit" name="submit" value="Update Category" class="btn-primary">
                   </td> 
                </tr>
        </table>
        </form>
        <br/><br/>
    </div>
</div>



<?php include('partials/footer.php') ?>