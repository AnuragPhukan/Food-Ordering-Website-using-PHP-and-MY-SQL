<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Add Category </h1>
        <br/><br/>

                <?php
                    if(isset($_SESSION['add'])) //To check if session is set or not
                    {
                        echo $_SESSION['add']; //Display the Session Message if SET
                        unset($_SESSION['add']); //Remove Session Message
                    }

                    if(isset($_SESSION['upload'])) //To check if session is set or not
                    {
                        echo $_SESSION['upload']; //Display the Session Message if SET
                        unset($_SESSION['upload']); //Remove Session Message
                    }
                ?>       
                
                <br/><br/>
        


        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
                <tr>
                   <td> Title: </td>
                   <td><input type="text" name="title" placeholder="Category Title"></td>
                </tr>
                


                <tr>
                   <td> Select Image: </td>
                   <td>
                        <input type="file" name="image">
                   </td>
                </tr>


                <tr>
                   <td> Featured: </td>
                   <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                
                   </td>
                </tr>

                <tr>
                   <td> Active: </td>
                   <td><input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                </tr>

                <tr>
                   <td colspan="2">  
                        <input type="submit" name="submit" value="Add Category" class="btn-primary">

                   </td> 
                </tr>
        </table>
        </form>

        <?php
        //Process the value from form and save it in the Database
        //Check wether the button is clicked or not

        if(isset($_POST['submit']))
        {
        
            $title=$_POST['title'];
            
            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No";
            }
        
            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No";
            }

            //Check wether the image is selected or not and set the value for image name accordingly

            $image_name=$_FILES['image']['name'];    
            
            if(isset($_FILES['image']['name']))
            {
                 
                if($image_name !="")
                {

                   
                    
                    $ext = end(explode('.', $image_name));

                    $image_name = "Food_Category_".rand(000,999).'.'.$ext;


                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/Category/".$image_name;

                    //Finally upload the image

                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check wether the image is uploaded or not
                    
                    if($upload = FALSE)
                    {
                        $_SESSION['upload'] = "<div class= 'error'> Failed to upload Image </div>";
                        header('location:'.SITEURL.'admin/add-category.php');
                        die();
                    }

                }
            }
            else
            {
                $image_name="";
            }
            // Create SQL Query to insert category
            $sql = "INSERT INTO tbl_category SET
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'
                ";
            
            //Execute the query and save into the database
            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $_SESSION['add'] = "<div class='success'> Category added Succesfully </div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            else
            {
                $_SESSION['add'] = "<div class='error'> Failed to add Category </div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }

        }
        ?>

    </div>
</div>

<?php include('partials/footer.php') ?>