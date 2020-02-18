<?php include"header.php";?>
      
<!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  
  <?PHP 
if(@$_GET['subject_id']!=""){
$subject_id=$_GET['subject_id'];
include "config.inc.php"; 
$sql_s="SELECT * FROM tbl_subject where subject_id=$_GET[subject_id] "; 
$query_s = $conn->query($sql_s); 
$result_s = $query_s->fetch_assoc();
}


if(@$_GET['topic_id']!=""){
include "config.inc.php"; 
$sql_t="SELECT * FROM tbl_topic where topic_id=$_GET[topic_id] "; 
$query_t = $conn->query($sql_t); 
$result_t = $query_t->fetch_assoc();
}



if(@$_GET['del']!=""){

include "config.inc.php"; 
$sql_del= "DELETE FROM tbl_topic WHERE tbl_topic.topic_id = $_GET[del]";
$conn->query($sql_del); 

            echo "<script type='text/javascript'>";
			//echo  "alert('[บันทึกข้อมูสำเร็จ]');";
		    echo "window.location='topic.php';";
			echo "</script>";
}
?>
  
        <!-- Begin Page Content -->
        <style type="text/css">
<!--
.style1 {color: #000000}
.style3 {color: #000000; font-weight: bold; }
-->
        </style>
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Example: <?=@$result_s['subject_name'];?></h1>
          <p class="mb-4">ตัวอย่าง  </p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">รายการหัวข้อประเมิน <a href="print.php?subject_id=<?=@$result_s['subject_id'];?>" target="_blank">(Print)</a> </h6>
            </div>
			
			
			

		
			 
			 
			 
			 
			<form name="form1" method="post" action=""> 
			
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="7%" rowspan="3" align="center"><p class="style1">ลำดับ</p>
                      <p class="style1">&nbsp;</p></th>
                      <th width="48%" rowspan="3" align="center"><p class="style1">รายการประเมิน</p>
                      <p class="style1">&nbsp;</p></th>
                      <th colspan="5"><div align="center" class="style1">ระดับความพึงพอใจ</div></th>
                    </tr>
                 
                
                  
		   <tr>
                      <th width="9%"><div align="center" class="style1">มากที่สุด</div></th>


                    <th width="9%"><div align="center" class="style1">มาก</div></th>
                    <th width="10%"><div align="center" class="style1">ปานกลาง</div></th>
                    <th width="8%"><div align="center" class="style1">น้อย</div></th>
                    <th width="9%"><div align="center" class="style1">ไม่พึงพอใจ</div></th>
</tr>
<tr>
  <th><div align="center" class="style1">5</div></th>
  <th><div align="center" class="style1">4</div></th>
  <th><div align="center" class="style1">3</div></th>
  <th><div align="center" class="style1">2</div></th>
  <th><div align="center" class="style1">1</div></th>
</tr>
 </thead>

<tbody>
<?PHP 
include "config.inc.php"; 
$sql_topic="SELECT * FROM tbl_topic   where  subject_id=$subject_id  ORDER BY tbl_topic.topic_id ASC"; 
$query_topic = $conn->query($sql_topic); 
$i=0;
$x=0;
while($result_topic = $query_topic->fetch_assoc()) 
{ $i++;

$topic_id=$result_topic['topic_id'];
?>		

<tr>
  <td><span class="style1"><?php echo  $i;?></span></td>
  <td><span class="style3"><?php echo $result_topic['topic_name'];?></span></td>
  <td><span class="style1"></span></td>
  <td><span class="style1"></span></td>
  <td><span class="style1"></span></td>
  <td><span class="style1"></span></td>
  <td><span class="style1"></span></td>
</tr>

<?PHP 
include "config.inc.php"; 
$sql_detail="SELECT * FROM tbl_detail where  topic_id=$topic_id  ORDER BY tbl_detail.detail_id ASC"; 
$query_detail = $conn->query($sql_detail); 
$ii=0;
while($result_detail = $query_detail->fetch_assoc()) 
{ $ii++; 
$x++;
?>		


<tr>
  <td><span class="style1"><?php echo  $i;?>.<?php echo  $ii;?></span></td>
  <td><span class="style1"><?php echo $result_detail['detail_name'];?></span></td>
  <td><span class="style1"><input type="radio" name="RadioGroup<?php echo  $x;?>" value="radio" class="form-control form-control-user" required></span></td>
  <td><span class="style1"><input type="radio" name="RadioGroup<?php echo  $x;?>" value="radio" class="form-control form-control-user" required></span></td>
  <td><span class="style1"><input type="radio" name="RadioGroup<?php echo  $x;?>" value="radio" class="form-control form-control-user" required></span></td>
  <td><span class="style1"><input type="radio" name="RadioGroup<?php echo  $x;?>" value="radio" class="form-control form-control-user" required></span></td>
  <td><span class="style1"><input type="radio" name="RadioGroup<?php echo  $x;?>" value="radio" class="form-control form-control-user" required></span></td>
</tr>

<?php }?>


<?php }?>
                  </tbody>
                </table>
              </div>
 </form>  
			  
          </div>
        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
