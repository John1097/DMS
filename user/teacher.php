<?php 
session_start();
if(isset($_SESSION['username'])){
  
	
}else {
	header('location:index.php');
}
include_once "../php/config.php";
include "teacher/csvupload.php";

include '../php/logout.php';

$user_data = $_SESSION['username'];

$sql = "SELECT * FROM table_grade
    WHERE teacher='$user_data' and grade='IC' and statuss='teacher';";
    

$sql = "select count(*) as allcount from table_grade where statuss='teacher'  and teacher = '$user_data' ";
$retrieve_data = mysqli_query($con,$sql);
$row = mysqli_fetch_array($retrieve_data);
$count = $row['allcount'];

$sql2 = "select count(*) as allcount from table_grade where statuss='dean' and teacher = '$user_data'";
$retrieve_data2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_array($retrieve_data2);
$count2 = $row2['allcount'];

$sql3 = "select count(*) as allcount from table_grade where statuss='done' and teacher = '$user_data'";
$retrieve_data3 = mysqli_query($con,$sql3);
$row3 = mysqli_fetch_array($retrieve_data3);
$count3 = $row3['allcount'];

$sql4 = "select count(*) as allcount from upload_teacher where teacher='$user_data' ";
$retrieve_data4 = mysqli_query($con,$sql4);
$row4 = mysqli_fetch_array($retrieve_data4);
$count4 = $row4['allcount'];

?>

<!DOCTYPE html>
<html>

<head>
    <?php include "../php/header.php";?>
    <title>teacher</title>

</head>


<body style="font-family: 'Montserrat', sans-serif;font-weight: normal;">



<nav class="nav-fixed #263238 blue-grey darken-4" style="margin:0px; padding:0px;">      
  <div class="nav-wrapper">
            <a href="#" class="brand-logo center">AMA Lipa</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="modal-trigger" href="#info"><?php echo $_SESSION['username'];?></a></li>
                <li>
                    <form method='POST'>
                        <input class="btn teal" type='submit' name='logout' value='Logout' />
                    </form>
                </li>
            </ul>
        </div>

</nav>
<div class="nav-wrapper fixed #263238 blue-grey darken-4">
    
      <ul class="tabs tabs #263238 blue-grey darken-4">

                <li class="tab"><a href="#tab1">Add CSV</a></li>
                <li class="tab"><a href="#tab2">My IC

                <?php if($count > 0){?>
                <span class="new badge" data-badge-caption=""><?php echo $count; ?></span>
                <?php } ?>

                </a></li>

                <li class="tab"><a href="#tab3">Pending
                
                <?php if($count2 > 0){?>
                <span class="new badge" data-badge-caption=""><?php echo $count2; ?></span>
                <?php } ?>

                </a></li>
                <li class="tab"><a href="#tab4">Approved
                
                <?php if($count3 > 0){?>
                <span class="new badge" data-badge-caption=""><?php echo $count3; ?></span>
                <?php } ?>

                </a></li>

                <li class="tab"><a href="#tab5">Documents
                
                <?php if($count4 > 0){?>
                <span class="new badge" data-badge-caption=""><?php echo $count4; ?></span>
                <?php } ?>

                </a></li>

            </ul>
            </div>
        



    <ul class="sidenav" id="mobile-demo">
        <li><a href="#"><?php echo $_SESSION['username'];?></a></li>
        <li>
            <form method='POST'>
                <input class="btn" type='submit' name='logout' value='Logout' />
            </form>
        </li>
    </ul>



    <div id="tab1" style="margin:2%;"><?php include "teacher/tab1.php";?></div>
    <div id="tab2" style="margin:2%;"><?php include "teacher/tab2.php";?></div>
    <div id="tab3" style="margin:2%;"><?php include "teacher/tab3.php";?></div>
    <div id="tab4" style="margin:2%;"><?php include "teacher/tab4.php";?></div>
    <div id="tab5" style="margin:2%;"><?php include "teacher/tab5.php";?></div>

</body>

</html>
<?php include "../php/footer.php"; ?>