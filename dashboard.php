<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title></title>
    <style>
      *{
        margin: 0;
        padding: 0;
      }
      a{
        text-decoration: none;
      }
      .dash a{
        color:black;
      }
      .dash li:hover{
        background-color: steelblue;
      }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item ">
            <a class="nav-link " href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="?con=pass">Change Password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">Welcome: <?php session_start(); echo $_SESSION['m'];?></a>
        </li>
        <li class="nav-item">
            <button class="btn btn-primary py-0 "><a class="nav-link text-white" href="logout.php">Logout</a></button>
        </li>
        </ul>
    </div>
  </nav>
  <div class="row m-0">
    <div class="col-3 p-0" style="background-color: lightgrey; height:100vh;">
    <ul class="list-unstyled dash">
    <li class="list-item p-2 border-bottom d-block text-white text-center" style="background: black;">DASHBOARD</li>
      <li class="list-item p-2 border-bottom d-block"><a href="?con=html">Image</a></li>
      <li class="list-item p-2 border-bottom"><a href="?con=chimg">Change Image</a></li>
      <li class="list-item p-2 border-bottom"><a href="?con=name">Name</a></li>
      <li class="list-item p-2 border-bottom"><a href="?con=age">Age</a></li>
      <li class="list-item p-2 border-bottom"><a href="?con=gender">Gender</a></li>
    </ul>
    </div>
    <div class="col-9">
      <?php
      switch(@$_GET['con']){
        case "pass":include('changepass.php');
        break;
        case "chimg":include('changeimg.php');
        break;
        case "name":include('name.php');
        break;
        case "age":include('age.php');
        break;
        case "gender":include('gender.php');
        break;
        default:include("gallery.php");
      }
      ?>
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>