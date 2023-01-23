<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'auth_db');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $fname = $_POST['fname'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $location = $_POST['location'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        // hashing the password
        //$password = password_hash($password, PASSWORD_DEFAULT);
        $statut = $_POST['statut'];

        $query = "UPDATE users SET fname='$fname',uname='$uname',email='$email',phone='$phone',location='$location',password='$password',gender='$gender',statut='$statut'WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:dashboard.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>