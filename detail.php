<?php include"header.php";?>
      
<!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  
  <?PHP 
if(@$_GET['topic_id']!=""){
$topic_id=$_GET['topic_id'];
$subject_id=$_GET['subject_id'];
include "config.inc.php"; 
$sql_s="SELECT * FROM tbl_topic t , tbl_subject s where  t.subject_id = s.subject_id and  t.topic_id=$_GET[topic_id]  "; 
$query_s = $conn->query($sql_s); 
$result_s = $query_s->fetch_assoc();
}


if(@$_GET['detail_id']!=""){
include "config.inc.php"; 
$sql_t="SELECT * FROM tbl_detail where  detail_id=$_GET[detail_id] "; 
$query_t = $conn->query($sql_t); 
$result_t = $query_t->fetch_assoc();
}



if(@$_GET['del']!=""){

include "config.inc.php"; 
$sql_del= "DELETE FROM tbl_detail WHERE tbl_detail.detail_id = $_GET[del]";
$conn->query($sql_del); 

            echo "<script type='text/javascript'>";
			//echo  "alert('[บันทึกข้อมูสำเร็จ]');";
		    echo "window.location='detail.php';";
			echo "</script>";
}
?>
  
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Create detail : <?=@$result_s['subject_name'];?> | <?=@$result_s['topic_name'];?></h1>
          <p class="mb-4">สร้างรายละเอียดการประเมินประเมิน   </p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">รายการรายละเอียดการประเมินประเมิน</h6>
            </div>
			
			
			
			 <div class="card-body">
<form role="form" method="post" action="detail_q.php" enctype="multipart/form-data">
<input name="topic_id" type="hidden" value="<?=@$result_s['topic_id'];?>" />
<input name="detail_id" type="hidden" value="<?=@$result_t['detail_id'];?>" />
<input name="subject_id" type="hidden" value="<?=@$result_s['subject_id'];?>" />
   <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="detail_name" class="form-control form-control-user" id="detail_name" value="<?=@$result_t['detail_name'];?>" placeholder="รายละเอียดการประเมินการประเมิน" required>
                  </div>
			  
				  
                                   
                                 
<button type="submit" class="btn btn-success">Create Detail</button> &nbsp;
<button type="reset" class="btn btn-danger">Cancel</button> &nbsp;

 <a href="topic.php?subject_id=<?php echo $subject_id;?>" class="btn btn-secondary">ย้อนกลับ</a> </div>
</form>
			 </div>
			 
			 
			 
			 
			 
			 
			
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="19%">ลำดับ</th>
                      <th width="38%">รายละเอียดการประเมิน</th>
                       <th width="23%"><div align="center">จัดการ</div></th>
                    </tr>
                  </thead>
                
                  <tbody>
<?PHP 
include "config.inc.php"; 
$sql_detail="SELECT * FROM tbl_detail where  topic_id=$topic_id  ORDER BY tbl_detail.detail_id ASC"; 
$query_detail = $conn->query($sql_detail); 
$i=0;
while($result_detail = $query_detail->fetch_assoc()) 
{ $i++;
?>				    <tr>
                      <td><?php echo  $i;?></td>
                      <td><?php echo $result_detail['detail_name'];?></td>
                      <td>
<div align="center"><a href="?detail_id=<?=$result_detail['detail_id'];?>" class="btn btn-warning">แก้ไข</a>
<a href="?del=<?=$result_detail['detail_id'];?>" class="btn btn-danger" onClick="return confirm('กรุณายืนยนัการลบอีกครั้ง !!!')" >ลบ</a> </div>										     				 </td>
                  
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
