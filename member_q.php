<?PHP

 include "config.inc.php"; // ไฟล์ตดิตอ่ฐานข้อมลู 

if($_POST['member_ids']==""){
 $sql_up= "INSERT INTO tbl_member (member_id, member_full_name, member_class, member_sex, member_pass) VALUES ('$_POST[member_id]', '$_POST[member_full_name]', '$_POST[member_class]', '$_POST[member_sex]', '$_POST[member_pass]')";
$conn->query($sql_up); 


}else{

 $sql_up= "UPDATE tbl_member SET member_full_name = '$_POST[member_full_name]', member_class = '$_POST[member_class]', member_sex = '$_POST[member_sex]', member_pass = '$_POST[member_pass]' WHERE tbl_member.member_id = '$_POST[member_ids]'";
$conn->query($sql_up); 

}
 
 

            echo "<script subject='text/javascript'>";
			echo  "alert('[บันทึกข้อมูสำเร็จ]');";
		    echo "window.location='member.php';";
			echo "</script>";
?>