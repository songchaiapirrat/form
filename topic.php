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
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Create Topic : <?=@$result_s['subject_name'];?></h1>
          <p class="mb-4">สร้างหัวข้อประเมิน  </p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">รายการหัวข้อประเมิน</h6>
            </div>
			
			
			
			 <div class="card-body">
<form role="form" method="post" action="topic_q.php" enctype="multipart/form-data">
<input name="subject_id" type="hidden" value="<?=@$result_s['subject_id'];?>" />
<input name="topic_id" type="hidden" value="<?=@$result_t['topic_id'];?>" />

   <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="topic_name" class="form-control form-control-user" id="topic_name" value="<?=@$result_t['topic_name'];?>" placeholder="หัวข้อการประเมิน" required>
                  </div>
			  
				  
                                   
                                 
<button type="submit" class="btn btn-success">Create Topic</button> &nbsp;
<button type="reset" class="btn btn-danger">Cancel</button> &nbsp;

 <a href="create_form.php" class="btn btn-secondary">ย้อนกลับ</a> </div>
</form>
			 </div>
			 
			 
			 
			 
			 
			 
			
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="19%">ลำดับ</th>
                      <th width="38%">ชื่อหัวข้อ</th>
                      <th width="20%"><div align="center">รายละเอียดการประเมิน</div></th>
                      <th width="23%"><div align="center">จัดการ</div></th>
                    </tr>
                  </thead>
                
                  <tbody>
<?PHP 
include "config.inc.php"; 
$sql_topic="SELECT * FROM tbl_topic   where  subject_id=$subject_id  ORDER BY tbl_topic.topic_id ASC"; 
$query_topic = $conn->query($sql_topic); 
$i=0;
while($result_topic = $query_topic->fetch_assoc()) 
{ $i++;
?>				    <tr>
                      <td><?php echo  $i;?></td>
                      <td><?php echo $result_topic['topic_name'];?></td>
<td><div align="center"><a href="detail.php?topic_id=<?=$result_topic['topic_id'];?>&subject_id=<?php echo $subject_id;?>" class="btn btn-primary">รายละเอียดการประเมิน</a> </div></td>


                      <td>
<div align="center"><a href="?topic_id=<?=$result_topic['topic_id'];?>" class="btn btn-warning">แก้ไข</a>
<a href="?del=<?=$result_topic['topic_id'];?>" class="btn btn-danger" onClick="return confirm('กรุณายืนยนัการลบอีกครั้ง !!!')" >ลบ</a> </div>					</td>
                  
                    </tr>
<?php }?>
                  </tbody>
                </table>
              </div>
            </div>
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
