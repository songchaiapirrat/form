<?PHP

 include "config.inc.php"; // ไฟล์ตดิตอ่ฐานข้อมลู 

if($_POST['detail_id']==""){
 $sql_up= "INSERT INTO tbl_detail (detail_id, topic_id, detail_name ) VALUES (NULL, '$_POST[topic_id]', '$_POST[detail_name]');";
$conn->query($sql_up); 


}else{

 $sql_up= "UPDATE tbl_detail SET detail_name = '$_POST[detail_name]' WHERE tbl_detail.detail_id = $_POST[detail_id]";
$conn->query($sql_up); 

}
 
 

            echo "<script topic='text/javascript'>";
		    echo "window.location='detail.php?topic_id=$_POST[topic_id]&subject_id=$_POST[subject_id]';";
			echo "</script>";
?>