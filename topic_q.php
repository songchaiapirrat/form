<?PHP

 include "config.inc.php"; // ไฟล์ตดิตอ่ฐานข้อมลู 

if($_POST['topic_id']==""){
 $sql_up= "INSERT INTO tbl_topic (topic_id, subject_id, topic_name ) VALUES (NULL, '$_POST[subject_id]', '$_POST[topic_name]');";
$conn->query($sql_up); 


}else{

 $sql_up= "UPDATE tbl_topic SET topic_name = '$_POST[topic_name]' WHERE tbl_topic.topic_id = $_POST[topic_id]";
$conn->query($sql_up); 

}
 
 

            echo "<script subject='text/javascript'>";
		    echo "window.location='topic.php?subject_id=$_POST[subject_id]';";
			echo "</script>";
?>