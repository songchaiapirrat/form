
      <script language="javascript">
window.print();
</script> 
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
  
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><br>
            <br>
          รายงานประเมิน</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">รายงานประเมิน </h6>
            </div>
			
			
			
			
			 
			 
			 
			 
			 
			
            <div class="card-body">
              <div class="table-responsive">
                <table width="100%" border="1" cellpadding="2" cellspacing="0" class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th width="16%">ลำดับ</th>
                      <th width="42%">ชื่อฟอร์ม</th>
					   <th width="20%"><div align="center">ผู้ประเมิน</div></th>
                      <th width="22%"><div align="center">สรุปผลการประเมิน</div></th>
				    </tr>
                  </thead>
                
                  <tbody>
<?PHP 
include "config.inc.php"; 
$sql_subject="SELECT * FROM tbl_subject  ORDER BY tbl_subject.subject_id ASC"; 
$query_subject = $conn->query($sql_subject); 
$i=0;
while($result_subject = $query_subject->fetch_assoc()) 
{ $i++;
$subject_id=$result_subject['subject_id'];
$sql_as="SELECT  Count(subject_id) As ssd FROM tbl_assess  where subject_id=$subject_id "; 
$query_as = $conn->query($sql_as); 
$result_as = $query_as->fetch_assoc();


$sql_ass="SELECT  Sum(assess_total) As total FROM tbl_assess  where subject_id=$subject_id "; 
$query_ass = $conn->query($sql_ass); 
$result_ass = $query_ass->fetch_assoc();

?>				    <tr>
                      <td><?php echo  $i;?></td>
                      <td><?php echo $result_subject['subject_name'];?></td>
					  
					  <td><div align="center"><?php echo $result_as['ssd'];?></div></td>
					  <td><div align="center"><?php echo $result_ass['total']/$result_as['ssd'];?></div></td> 
					  





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
            <span>Copyright &copy; Your Website 2019</span>          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>        </div>
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
