<?PHP 
if(@$_GET['subject_id']!=""){
$subject_id=$_GET['subject_id'];
include "config.inc.php"; 
$sql_s="SELECT * FROM tbl_subject where subject_id=$_GET[subject_id] "; 
$query_s = $conn->query($sql_s); 
$result_s = $query_s->fetch_assoc();
}
?>
<script language="javascript">
window.print();
</script> 
  
        <!-- Begin Page Content -->
        <style type="text/css">
<!--
.style1 {color: #000000}
.style3 {color: #000000; font-weight: bold; }
-->
        </style>
        <p>&nbsp;</p>
        <div class="container-fluid">

          <!-- Page Heading -->
          <h3 align="center" class="h3 mb-2 text-gray-800"><?=@$result_s['subject_name'];?>
            <!-- DataTales Example -->
          </h3>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">&nbsp;</h6>
            </div>
			
			
			

		
			 
			 
			 
			 
			<form name="form1" method="post" action=""> 
			
            <div class="card-body">
              <div class="table-responsive">
                <table  width="90%" border="1" align="center" cellpadding="2" cellspacing="0" class="table table-bordered">
                  <thead>
                    <tr>
                      <th width="7%" rowspan="3" align="center"><p class="style1">ลำดับ</p>
                      <p class="style1">&nbsp;</p></th>
                      <th width="48%" rowspan="3" align="center"><p class="style1">รายการประเมิน</p>
                      <p class="style1">&nbsp;</p></th>
                      <th colspan="5"><div align="center" class="style1">ระดับความพึงพอใจ</div></th>
                    </tr>
                 
                
                  
		   <tr>
                      <th width="9%"><div align="center" class="style1">
                        <div align="center">มากที่สุด</div>
                      </div></th>


                    <th width="9%"><div align="center" class="style1">
                      <div align="center">มาก</div>
                    </div></th>
                    <th width="10%"><div align="center" class="style1">
                      <div align="center">ปานกลาง</div>
                    </div></th>
                    <th width="8%"><div align="center" class="style1">
                      <div align="center">น้อย</div>
                    </div></th>
                    <th width="9%"><div align="center" class="style1">
                      <div align="center">ไม่พึงพอใจ</div>
                    </div></th>
</tr>
<tr>
  <th><div align="center" class="style1">
    <div align="center">5</div>
  </div></th>
  <th><div align="center" class="style1">
    <div align="center">4</div>
  </div></th>
  <th><div align="center" class="style1">
    <div align="center">3</div>
  </div></th>
  <th><div align="center" class="style1">
    <div align="center">2</div>
  </div></th>
  <th><div align="center" class="style1">
    <div align="center">1</div>
  </div></th>
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
  <td colspan="6"><span class="style3"><?php echo $result_topic['topic_name'];?></span>    <div align="center"><span class="style1"></span></div>    <div align="center"><span class="style1"></span></div>    <div align="center"><span class="style1"></span></div>    <div align="center"><span class="style1"></span></div>    <div align="center"><span class="style1"></span></div></td>
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
  <td><div align="center"><span class="style1">
    <input type="radio" name="RadioGroup<?php echo  $x;?>" value="radio" class="form-control form-control-user" required>
  </span></div></td>
  <td><div align="center"><span class="style1">
    <input type="radio" name="RadioGroup<?php echo  $x;?>" value="radio" class="form-control form-control-user" required>
  </span></div></td>
  <td><div align="center"><span class="style1">
    <input type="radio" name="RadioGroup<?php echo  $x;?>" value="radio" class="form-control form-control-user" required>
  </span></div></td>
  <td><div align="center"><span class="style1">
    <input type="radio" name="RadioGroup<?php echo  $x;?>" value="radio" class="form-control form-control-user" required>
  </span></div></td>
  <td><div align="center"><span class="style1">
    <input type="radio" name="RadioGroup<?php echo  $x;?>" value="radio" class="form-control form-control-user" required>
  </span></div></td>
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



