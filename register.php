<?php 
include("captcha.php");
error_reporting(0);
if(isset($_POST['submit']))
{   session_start();
    $email=$_POST['email'];
    $_SESSION['mail']=$email;
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $temp=$_FILES['image']['tmp_name'];
    $fname=$_FILES['image']['name'];
    $ext_array=['jpg','jpge','png'];
    if(empty($email) || empty($pass) || empty($cpass)|| empty($age) || empty($gender) || empty($name) || empty($fname)){
        echo "<div class='alert alert-warning'>Plz fill empty field</div>";
    }else if($age<10 && $age>100){
        echo "<div class='alert alert-warning'>Age should be between</div>";
    }else if($pass!=$cpass){
        echo "<div class='alert alert-warning'>Password not Match!</div>";
    }
    else {
        if($_POST['cap']==$_POST['capsum']){
        if(is_dir("users/".$email)){
            echo "<div class='alert alert-warning'>User already registerd</div>";        
            }
        else {
            $fo=fopen("users/$email/details.txt","r");
            fgets($fo);
            mkdir("users/".$email);
            $f=fopen("users/".$email."/details.txt","w");
            if($f)
            fwrite($f,$email."\n".$pass."\n".$name."\n".$gender."\n".$age."\n".$fname);
            else echo "error while creating details file";
            if(!empty($temp)){
                $ext=pathinfo($fname,PATHINFO_EXTENSION);
                if(in_array($ext,$ext_array)){
                $fn=$email.".".$ext;
                $dest="users/".$email."/";
                if(move_uploaded_file($temp,$dest.$fn)){
                    header("Location:success.php?name=$name");
                }else
                echo "Error";
                }
            
                else
                echo "Only jpg,jpeg and png files are allowed";
            }else
            echo "Please select file";
            }
        }
        else echo "<div class='alert alert-warning'>Invalid Captcha</div>";

    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Register page</title>
  </head>
  <body>
    <div class="container">
    <div class="jumbotron pt-4 mt-3">
        <h1>Registration Panel</h1><hr py-2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="<?php echo $email;?>" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" value="<?php echo $pass;?>" name="pass">
            </div>
            <div class="form-group">
                <label for="cpass">Confirm password</label>
                <input type="password" class="form-control" id="cpass" value="<?php echo $cpass;?>"name="cpass">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="<?php echo $name;?>" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" value="<?php echo $age;?>" id="age" name="age">
            </div>
            <div class="form-group">
                <label>Gender</label>
            </div>
            <div class="form-check">
                <div>
                <input class="form-check-input" id="male" value="male" name="gender" type="radio" <?php if($gender=="male") echo "checked";?>>
                <label class="form-check-label" for="male">Male</label>
                </div>
                <div>
                <input class="form-check-input" name="gender" value="female" id="female" type="radio" <?php if($gender=="female") echo "checked";?>>
                <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="form-group">
                <label>Captcha : <?php echo $pattern;?></label>
                <input type="text" name="cap" class="form-control">
                <input type="hidden" name="capsum" value="<?php echo $capsum;?>">
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="SUBMIT" name="submit">
                
            </div>
        </form>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>