<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Add Admin </h1>
        <br/><br/>

        <?php
                    if(isset($_SESSION['add'])) //To check if session is set or not
                    {
                        echo $_SESSION['add']; //Display the Session Message if SET
                        unset($_SESSION['add']); //Remove Session Message
                    }
                ?>

        <form action="" method="POST">

        <table class="tbl-30">
                <tr>
                   <td> Full Name: </td>
                   <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                   <td> Username: </td>
                   <td><input type="text" name="username" placeholder="Your Username"></td>
                </tr>

                <tr>
                   <td> Password: </td>
                   <td><input type="password" name="password" placeholder="Your Password"></td>
                </tr>

                <tr>
                   <td colspan="2">  
                        <input type="submit" name="submit" value="Add Admin" class="btn-primary">

                   </td> 
                </tr>
        </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

<?php
        //Process the value from form and save it in the Database
        //Check wether the button is clicked or not

        if(isset($_POST['submit']))
        {
            //Button clicked
            //echo "Button clicked";

            //Get Data from form

            $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            $password = md5($_POST['password']); //Password Encryption with MD5

            //SQL Query to Save data into the database

            $sql = "INSERT INTO tbl_admin SET
                full_name='$full_name',
                username='$username',
                password='$password'
            ";

            //Executing query and saving data into the database 

            $res=mysqli_query($conn, $sql) or die(mysqli_error($myConnection));

            //check wether the query data is inserted or not and display appropiate message
            if($res==TRUE)
            {
                //Data Inserted
                //echo "Data Inserted";
                //Create a Session Variable to display message
                $_SESSION['add']="Admin Added Succesfully";
                //Redirect
                header("location:".SITEURL.'admin/manage-admin.php');
            }
            else
            {
                //Failed to insert Data
                echo "Failed to insert Data";
                 //Create a Session Variable to display message
                 $_SESSION['add']="Failed to Add Admin";
                 //Redirect to Add Admin
                 header("location:".SITEURL.'admin/add-admin.php');
            }
        }
        
?>