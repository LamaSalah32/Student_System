<?php
    include "image.php";
    $conn=mysqli_connect('localhost','root','');
    $db=mysqli_select_db($conn,'web_skills'); 

    if(!$conn){
        die("Error: Failed to connect to database!");
    }

    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $sql="SELECT * FROM students WHERE id='".$id."'";
        $result= mysqli_query($conn,$sql);  
        $RowData=mysqli_fetch_assoc($result);
    }
    else{
        header('Location: ../../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/css/moreinfo_student.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title> more info </title>
    </head>
    
    <body class="profile-page">
        <div class="navbar">
            <div class="container">
                <div class="brand">
                    <img class="logo" src="../images/university.png" alt="university">
                <h2 class="brand-text">Student System</h2>
            </div>
            <ul class="links">
                <a href="logout.php">
                    <li class="active" >home</li>
                </a>
                <div class="dropdown">
                    <img class="img-profile" src='<?=$target_dir?>' alt="profile">
                    <div class="content">
                        <a href=""> Your profile </a>
                        <a href="editProfile.php"> settings </a>
                        <a href="logout.php"> sign out</a>
                    </div>
                </div>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div> 

<div class="info">
        <div class="account-pic">
            <img src='<?=$target_dir?>' class='account-pic'>
        </div>

        <h1> <?php
            echo $RowData['name'];
        ?></h1>
</div>


<div>
    <ul class="grid-container">
        <li> <img src = "../images/identification.png" class="details"> <b> ID : </b> </li>
        <div class="align"> <?php echo $RowData['id'];?></div>
    </ul>
      
</div>

<div>
    <ul class="grid-container">
        <li> <img src = "../images/mail.png" class="details"> <b> Email : </b> </li>
        <div class="align"> <?php echo $RowData['email'];?></div>
    </ul>
      
</div>

<div>
    <ul class="grid-container">
        <li> <img src = "../images/phone.png" class="details"> <b> Phone number : </b> </li>
        <div class="align"> <?php echo $RowData['phone'];?></div>
    </ul>
      
</div>


<div>
    <ul class="grid-container">
        <li> <img src = "../images/location.png" class="details"> <b> Address : </b> </li>
        <div class="align"> <?php echo $RowData['address'];?></div>
    </ul>
      
</div>

<div>
    <ul class="grid-container">
        <li> <img src = "../images/birthday.png" class="details"> <b> Birth date : </b> </li>
        <div class="align"> <?php echo $RowData['birth_date'];?></div>
    </ul>
      
</div>

<div>
    <ul class="grid-container">
        <li> <img src = "../images/calendar.png" class="details"><b> Enroll date : </b></li>
        <div class="align"> <?php echo $RowData['enroll_date'];?></div>
    </ul>
      
</div>

<div>
    <ul class="grid-container">
        <li> <img src = "../images/gender.png" class="details"><b> Gender : </b> </li>
        <div class="align"> <?php echo $RowData['gender'];?></div>
    </ul>
      
</div>

<div class="ctr">
    <a href="editProfile.php"><button class="sbtn"> Edit your profile </button></a>
</div>


    </body>
</html>
