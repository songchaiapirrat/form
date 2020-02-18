<?PHP

 include "config.inc.php"; // ไฟล์ตดิตอ่ฐานข้อมลู 

if($_POST['subject_id']==""){
 $sql_up= "INSERT INTO tbl_subject (subject_id, subject_name ) VALUES (NULL, '$_POST[subject_name]');";
$conn->query($sql_up); 


}else{

 $sql_up= "UPDATE tbl_subject SET subject_name = '$_POST[subject_name]' WHERE tbl_subject.subject_id = $_POST[subject_id]";
$conn->query($sql_up); 

}
 
 

            echo "<script subject='text/javascript'>";
		    echo "window.location='create_form.php';";
			echo "</script>";
?>