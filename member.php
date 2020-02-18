<?php include"header.php";?>
      
<!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  
<?PHP 
if(@$_GET['member_id']!=""){
include "config.inc.php"; 
$sql_t="SELECT * FROM tbl_member where member_id=$_GET[member_id] "; 
$query_t = $conn->query($sql_t); 
$result_t = $query_t->fetch_assoc();
}


if(@$_GET['del']!=""){

include "config.inc.php"; 
$sql_del= "DELETE FROM tbl_member WHERE tbl_member.member_id = $_GET[del]";
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
          <h1 class="h3 mb-2 text-gray-800">Member</h1>
          <p class="mb-4">ข้อมูลนักศึกษา</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">รายชื่อนักศึกษา</h6>
            </div>
			
			
			
			 <div class="card-body">
<form role="form" method="post" action="member_q.php" enctype="multipart/form-data"><div class="form-group">
 
  <input name="member_ids" type="hidden" value="<?php echo @$result_t['member_id'];?>" />
  
                    <div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
					<?php if(@$result_t['member_id']!=""){?>
					<input type="text" name="member_id" class="form-control form-control-user" id="member_id" value="<?=@$result_t['member_id'];?>" placeholder="รหัสนักศึกษา" disabled="disabled" required>
					<?php }else{?>
						<input type="text" name="member_id" class="form-control form-control-user" id="member_id" value="<?=@$result_t['member_id'];?>" placeholder="รหัสนักศึกษา" required>
					
					<?php }?>
					</div>
					
					<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" name="member_full_name" class="form-control form-control-user" id="member_full_name" value="<?=@$result_t['member_full_name'];?>" placeholder="ชื่อ - สกุล" required>
					</div>
					</div>		
					
					
                    <div class="form-group row">
					<div class="col-sm-4 mb-3 mb-sm-0">
					
					<select name="member_class"   class="form-control" required>
					  <option value="" <?php if (!(strcmp('', @$result_t['member_class']))) {echo "selected=\"selected\"";} ?>>-- เลือกชั้นปี --</option>
					  <option value="1" <?php if (!(strcmp(1, @$result_t['member_class']))) {echo "selected=\"selected\"";} ?>>ชั้นปีที่ 1</option>
					  <option value="2" <?php if (!(strcmp(2, @$result_t['member_class']))) {echo "selected=\"selected\"";} ?>>ชั้นปีที่ 2</option>
					  <option value="3" <?php if (!(strcmp(3, @$result_t['member_class']))) {echo "selected=\"selected\"";} ?>>ชั้นปีที่ 3</option>
					  <option value="4" <?php if (!(strcmp(4, @$result_t['member_class']))) {echo "selected=\"selected\"";} ?>>ชั้นปีที่ 4</option>
					  <option value="5" <?php if (!(strcmp(5, @$result_t['member_class']))) {echo "selected=\"selected\"";} ?>>ชั้นปีที่ 5</option>
					  <option value="6" <?php if (!(strcmp(6, @$result_t['member_class']))) {echo "selected=\"selected\"";} ?>>ชั้นปีที่ 6</option>
					</select>
				
				
					</div>
				
					<div class="col-sm-4 mb-3 mb-sm-0">
					<select name="member_sex"   class="form-control" required>
					  <option value="" <?php if (!(strcmp('', @$result_t['member_sex']))) {echo "selected=\"selected\"";} ?>>-- เพศ --</option>
					  <option value="male" <?php if (!(strcmp('male', @$result_t['member_sex']))) {echo "selected=\"selected\"";} ?>>male</option>
					  <option value="female" <?php if (!(strcmp('female', @$result_t['member_sex']))) {echo "selected=\"selected\"";} ?>>female</option>
					</select>
					</div>
					 
					 
					 
					<div class="col-sm-4 mb-3 mb-sm-0">
					<input type="password" name="member_pass" class="form-control form-control-user" id="member_pass" value="<?=@$result_t['member_pass'];?>" placeholder="รหัสผ่าน" required>
					</div>
					</div>		
				  
                                   
                                 
<button type="submit" class="btn btn-success">บันทึก</button> &nbsp;
<button type="reset" class="btn btn-danger">ล้าง</button>
 

</form>
			 </div>
			 
			 
			 
			 
			 
			 
			
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="11%">รหัสนักศึกษา</th>
                      <th width="42%">ชื่อ - สกุล</th>
                      <th width="13%"><div align="center">ชั้นปี</div></th>
					  <th width="14%"><div align="center">เพศ</div></th>
                      <th width="20%"><div align="center">จัดการ</div></th>
                    </tr>
                  </thead>
                
                  <tbody>
<?PHP 
include "config.inc.php"; 
$sql_member="SELECT * FROM tbl_member  ORDER BY tbl_member.member_id ASC"; 
$query_member = $conn->query($sql_member); 
$i=0;
while($result_member = $query_member->fetch_assoc()) 
{ $i++;
?>				    <tr>
                      <td><?php echo $result_member['member_id'];?></td>
                      <td>&nbsp;<?php echo $result_member['member_full_name'];?></td>
                      <td><div align="center"><?php echo $result_member['member_class'];?></div></td>
                      <td><div align="center"><?php echo $result_member['member_sex'];?></div></td>
                      <td>
<div align="center"><a href="?member_id=<?=$result_member['member_id'];?>" class="btn btn-warning">แก้ไข</a>
<a href="?del=<?=$result_member['member_id'];?>" class="btn btn-danger" onClick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" >ลบ</a> </div>					</td>
                  
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
