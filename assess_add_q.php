<?php include"header.php";?>
<?php 
include "config.inc.php"; // ไฟล์ตดิตอ่ฐานข้อมูล

$member_id=$_SESSION["member_id"];
$hiddenx=$_POST['hiddenx'];
$subject_id=$_POST['subject_id'];
$assess_date=date('Y-m-d');
$assess_total=0;

for($i=1; $i<=$hiddenx; $i++){
$detail_id=$_POST["detail_id$i"];
$assess_detail_score=$_POST["score$i"];
$assess_total=$assess_total+$assess_detail_score;
}

 $assess_full_total=$hiddenx*5;



$sql_assess= "INSERT INTO tbl_assess (assess_id, member_id, subject_id, assess_date, assess_full_total, assess_total) VALUES (NULL, '$member_id', '$subject_id', '$assess_date', '$assess_full_total', '$assess_total')";
$conn->query($sql_assess); 
 $assess_id=mysqli_insert_id($conn);

for($i=1; $i<=$hiddenx; $i++){
$detail_id=$_POST["detail_id$i"];
$assess_detail_score=$_POST["score$i"];

 $sql_assess_d= "INSERT INTO tbl_assess_detail (assess_detail_id, assess_id, detail_id, assess_detail_score) VALUES (NULL, '$assess_id', '$detail_id', '$assess_detail_score')";
$conn->query($sql_assess_d); 
//echo "<br>";

}


   echo "<script subject='text/javascript'>";
			echo  "alert('[ประเมินสำเร็จ]');";
		    echo "window.location='assess_list.php';";
			echo "</script>";


?>
