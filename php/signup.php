<?php 

if(isset($_POST['fname']) && 
   isset($_POST['uname']) &&  
   isset($_POST['email'])&&
   isset($_POST['phone'])&&
   isset($_POST['location'])&&
   isset($_POST['password'])&&
   isset($_POST['gender'])){

    include "../db_conn.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $data = "fname=".$fname."&uname=".$uname."&email=".$email."&phone=".$phone."&birth=".$birth."&statut=".$statut."&gender=".$gender;
    
    if (empty($fname)) {
    	$em = "Full name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($uname)){
    	$em = "User name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($email)){
      $em = "User Email is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
   }else if(empty($phone)){
      $em = "User Phone Number is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
   }else if(empty($location)){
      $em = "User location is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
   }else if(empty($password)){
    	$em = "Password is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
   }else if(empty($gender)){
      $em = "Gender is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
   }else {
      // hashing the password
      //$password = password_hash($password, PASSWORD_DEFAULT);

      if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
         
         $img_name = $_FILES['pp']['name'];
         $tmp_name = $_FILES['pp']['tmp_name'];
         $error = $_FILES['pp']['error'];
         
         if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($uname, true).'.'.$img_ex_to_lc;
               $img_upload_path = '../upload/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);

               // Insert into Database
               $sql = "INSERT INTO users(fname, uname,email,phone,location, password,gender,statut) 
                 VALUES(?,?,?,?,?,?,?,?)";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$fname, $uname, $password,$email,$phone,$location,$gender,'user']);

               header("Location: ../index.php?success=Your account has been created successfully");
                exit;
            }else {
               $em = "You can't upload files of this type";
               header("Location: ../index.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "unknown error occurred!";
            header("Location: ../index.php?error=$em&$data");
            exit;
         }

        
      }else {
       	$sql = "INSERT INTO users(fname, uname,email,phone,location, password,gender,statut) 
       	        VALUES(?,?,?,?,?,?,?,?)";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$fname, $uname,$email,$phone,$location, $password,$gender,'user']);

       	header("Location: ../index.php?success=Your account has been created successfully");
   	    exit;
      }
    }


}else {
	header("Location: ../index.php?error=error");
	exit;
}
