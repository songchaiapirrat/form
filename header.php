<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>fms_form</title>

  <link rel="shortcut icon" type="image/x-icon" href="home/images/small_logo.ico" />

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="js/sb-admin-2.js" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: linear-gradient(to top, #b224ef 0%, #7579ff 100%);">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          </div>
        <div class="sidebar-brand-text mx-3">fms<sup><h4>form</h4></sup></div>
      </a>
      

 
  
      <!-- Heading -->
<?php
if(isset($_SESSION["admin_id"])){
?> 
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-home"></i>
    <span>หน้าหลัก</span></a>      </li>
  <hr class="sidebar-divider">
  
     <li class="nav-item">
        <a class="nav-link" href="member.php">
          <i class="fas fa-fw fa-user"></i>
          <span>นักศึกษา</span></a>
	 </li>
	 

      <li class="nav-item">
        <a class="nav-link" href="create_form.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>สร้างฟอร์มประเมิน</span></a>
	 </li>
	 
	 
	 
	  <li class="nav-item">
        <a class="nav-link" href="assess_list.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>ประเมินแบบสอบถาม</span></a>
	 </li>
	 
	 
	 	  <li class="nav-item">
        <a class="nav-link" href="summary.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>รายงานประเมิน</span></a>
   </li>
   <li class="nav-item">
        <a class="nav-link" href="dashbord.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Dashboard</span></a>
	 </li>
	 
	 
	  <hr class="sidebar-divider d-none d-md-block">
<?php }?>




<?php
if(isset($_SESSION["member_id"])){
?> 

  <hr class="sidebar-divider">
  
   
	 
	 
	  <li class="nav-item">
        <a class="nav-link" href="assess_list.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>ประเมินแบบสอบถาม</span></a>
   </li>
   
	 
	 

	 
	  <hr class="sidebar-divider d-none d-md-block">
<?php }?>
		  
		  
		  
		    
		    <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

		  
    </ul>
	
	
	
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>          </button>

         

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

        

            <!-- Nav Item - Alerts -->
           

 
<?php
if(isset($_SESSION["login"])){
 ?>
 
   <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  
<?php
if(isset($_SESSION["admin_id"])){
?> 
 <span class="mr-2 d-none d-lg-inline text-gray-600 "><i class="fas fa-fw fa-user"></i> <?php echo $_SESSION["admin_name"];?></span>
<?php }?>

<?php
if(isset($_SESSION["member_id"])){
?> 
 <span class="mr-2 d-none d-lg-inline text-gray-600 "><i class="fas fa-fw fa-user"></i> <?php echo $_SESSION["member_full_name"];?></span>
<?php }?>
                
                </a>
				
				
              <!-- Dropdown - User Information -->
			  
			  
			  
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
			  
			  
			  <?php
if(isset($_SESSION["member_id"])){
?> 
                <a class="dropdown-item" href="member_edit.php?member_id=<?php echo $_SESSION["member_id"];?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  ข้อมูล</a>
				   <div class="dropdown-divider"></div>
<?php }?>

               
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout                </a>              </div>
            </li>
 
 
 
 <?php }else{?>
 <li class="nav-item">
        <a class="nav-link" href="login.php">
         <span class="btn btn-success ">เข้าสู่ระบบ</span></a>
	 </li>
 <?php }?>
       
          
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          
