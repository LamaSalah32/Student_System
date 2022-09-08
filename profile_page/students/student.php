<?php
    include "image.php";
    $conn=mysqli_connect('localhost','root','');
    $db=mysqli_select_db($conn,'web_skills'); 

    if(!$conn){
        die("Error: Failed to connect to database!");
    }
    
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $sql="SELECT * FROM students WHERE id=$id";
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
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>student Profile</title>
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

<div class="grid-container">
        <div class="account-pic">
            <img src='<?=$target_dir?>' class='account-pic'>
        </div>

        <div>
            <h1> <?php
              echo $RowData['name'];
             ?></h1>
            <ul class="del">
                <li> <img src = "../images/mail.png" class="details"> </li>
                <div class="align"> <?php echo $RowData['email'];?></div>
                <li><img src = "../images/phone.png"   class="details"> </li>
                <div class="align"> <?php echo $RowData['phone'];?> </div> 
                
            </ul>
		<a href="moreinfo_student.php"><button class="profileBtn btn btn-white"> More Info </button></a>
            <a href="editProfile.php"><button class="profileBtn btn btn-dark"> Edit profile </button></a>
          
        </div>
    </div>

<!--
    <div class="tab">
        <button class="tablinks tab-border" onclick="openTabs(event, 'Edit-student-table')"> Edit student table </button>
        <button class="tablinks" onclick="openTabs(event, 'requests')"> Grades </button>
        <button class="tablinks" onclick="openTabs(event, 'requests')"> Exam table </button>
        <button class="tablinks" onclick="openTabs(event, 'requests')"> Requests </button>
        <button class="tablinks" onclick="openTabs(event, 'requests')"> Requests </button>
    </div>
    
-->

</body>
</html>

