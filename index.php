<?php include"header.php"; 
	
	include "config.inc.php"; 
?>
          <!-- Content Row -->
          <div class="jumbotron">
                
<!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?PHP 
if(@$_GET['subject_id']!=""){
include "config.inc.php"; 
$sql_t="SELECT * FROM tbl_subject where subject_id=$_GET[subject_id] "; 
$query_t = $conn->query($sql_t); 
$result_t = $query_t->fetch_assoc();
}


if(@$_GET['del']!=""){

include "config.inc.php"; 
$sql_del= "DELETE FROM tbl_subject WHERE tbl_subject.subject_id = $_GET[del]";
$conn->query($sql_del); 

          echo "<script type='text/javascript'>";
    //echo  "alert('[บันทึกข้อมูสำเร็จ]');";
      echo "window.location='create_form.php';";
    echo "</script>";
}
?>

<div class="container">
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">กิจกรรมที่กำลังจะเริ่ม</h1>
        <p class="mb-4">  นักศึกษาสามารถประเมินกิจกรรมที่ต้องการได้ตามด้านล่างได้เลย | หากต้องการประเมินให้ คลิก!! ที่ประเมินแบบสอบถาม  </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">นักศึกษาสามารถประเมินกิจกรรมที่ต้องการได้ตามด้านล่างได้เลย</h6>
          </div>
          <div class="card-body">
            
<?PHP 
include "config.inc.php"; 
$sql_subject="SELECT * FROM tbl_subject  ORDER BY tbl_subject.subject_id ASC"; 
$query_subject = $conn->query($sql_subject); 
$i=0;
while($result_subject = $query_subject->fetch_assoc()) 
{ $i++;
?>	


<?php
if(isset($_SESSION["member_id"])){
?> 
<?php
$member_id=$_SESSION["member_id"];
$subject_id=$result_subject['subject_id'];
$sql_c="SELECT * FROM tbl_assess where  subject_id='$subject_id'  and  member_id='$member_id' "; 
$query_c = $conn->query($sql_c); 
if($result_c = $query_c->fetch_assoc()){}else{
?>
<?php } }?>
<div class="col-xl-12 col-md-12 mb-12">
              <div class="card border-left-success shadow h-100 py-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"></div>
                      <div class="h5 mb-0 font-weight-bold text-primary" >
                      <i class="fas fa-file-alt fa-2x text-gray-300" ></i>&nbsp;
                      <?php echo $result_subject['subject_name'];?> 
                      </div>
                    </div>
                    <div class="col-auto">
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
          
<?php }?>
               
        </div>

      </div>
      <!-- /.container-fluid -->
      </div>

    </div>
    <!-- End of Main Content -->
		</div>

<?php include"footer.php";?>