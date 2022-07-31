<?php

        //Include the constants file here

        include('../config/constants.php');

        //Get the ID of the Admin to be deleted
        echo $id = $_GET['id'];

        //Create SQL Query to Delete Admin

        $sql = "DELETE FROM tbl_admin WHERE id=$id";

        //Execute the Query

        $res = mysqli_query($conn,$sql);

        //Check wether the query executed succesfully or not

        if($res==true)
        {
            $_SESSION['delete'] = "<div class = 'success'>Admin Deleted Successfully</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
           // echo "Failed to delete Admin";
            $_SESSION['delete'] = "<div class = 'error'>Failed to Delete Admin. Try Again Later</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        //3. Redirect to manage admin with message(success/error)

?>