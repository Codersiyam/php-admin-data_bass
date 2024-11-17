<?php 
$con=mysqli_connect('localhost',"root","","data");
if(isset($_POST['sign_up'])){
    $sname  =$_POST['sname'];
    $username  =$_POST['username'];
    $email  =$_POST['email'];
    $password  =$_POST['password'];
    $c_pass  =$_POST['c_pass'];
    $input_error=array();
    if(empty($sname)){
        $input_error['sname']="error";
    }
    if(empty($username)){
        $input_error['username']="error";
    }
    if(empty($email)){
        $input_error['email']="error";
    }
    if(empty($password)){
        $input_error['password']="error";
    }
    if(empty($c_pass)){
        $input_error['c_pass']="error";
    }
    if(count($input_error)==0){
        $user_uniqe=mysqli_query($con, "SELECT * FROM `form` WHERE `username` ='$username'");
        if(mysqli_num_rows($user_uniqe)==0){
      if($password==$c_pass){
        $pass_32bit=md5($password);
        $query=mysqli_query($con, "INSERT INTO `form`( `sname`, `username`, `email`, `password`) VALUES ('$sname','$username','$email','$$pass_32bit')");
        if($query){
            echo "<script>
        alert('Successfully Submit Your Information');
        window.location.href='data.php';
        </script>";
        }else{
            echo "<script>
        alert('Some Error Please Try Again!');
        window.location.href='index.php';
        </script>";
        }
      }else{
        $input_error['match']="<script>
        alert('Your confirm password is not Match!');
        window.location.href='index.php';
        </script>";
      }
        }else{
            $input_error['user']="<script>
            alert('The Username is Alrady Exist!');
            window.location.href='index.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <!-- //sign_up_form_design_start// -->
     <div class="sign_up">
        <div class="form_group">
            <h1 class="logo">Sign Up</h1>
            <form  method="POST" >
                <div class="input_group">
                    <div class="input_field">
                        <i class="fa-solid fa-user-tie"></i>
                        <input type="text" name="sname" placeholder="Name" class="form_info <?php if(isset($input_error['sname'])){echo $input_error['sname'];}?>" >
                    </div>

                    <div class="input_field">
                        <i class="fa-solid fa-user-check"></i>
                        <input type="text" name="username" placeholder="Username" class="form_info <?php if(isset($input_error['username'])){echo $input_error['username'];}?>" >
                    </div>

                    <div class="input_field">
                         <i class="fa-solid fa-at"></i>
                        <input type="email" name="email" placeholder="Email" class="form_info <?php if(isset($input_error['email'])){echo $input_error['email'];}?>" >
                    </div>

                    <div class="input_field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Creat a Password" class="form_info <?php if(isset($input_error['password'])){echo $input_error['password'];}?>" >
                    </div>

                    <div class="input_field">
                       <i class="fa-solid fa-circle-check"></i>
                        <input type="password" name="c_pass" placeholder="Confirm Your Password" class="form_info <?php if(isset($input_error['c_pass'])){echo $input_error['c_pass'];}?>" >
                    </div>
                </div>
                <div class="form_button">
                    <input type="submit" name="sign_up" class="form_btn" value="Sign Up" >
                </div>
                <div class="form_link">
                    Have a Account? <a href="login.php" class="link">sign in</a>
                </div>
            </form>
        </div>
     </div>
    <!-- //sign_up_form_design_end// -->
</body>
</html>