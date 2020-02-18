<?PHP
	session_start();
    include "config.inc.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$Username=@$_POST['Username'];
$Password=@$_POST['Password'];

  $sql = "select * from tbl_member  where  member_id ='$Username' and member_pass ='$Password'"; 
  $objQuery=$conn ->query($sql);
  $objResult = $objQuery->fetch_assoc();

	if(!$objResult){
	
?>
<script language="javascript">
alert("Username หรือ Password ไม่ถูกต้อง...!!");
</script>
<meta http-equiv='refresh'content='0;url=index.php'>
<?php

	}
	else
	{
	    $_SESSION["member_id"] = $objResult["member_id"];
		$_SESSION["member_full_name"] = $objResult["member_full_name"];
		$_SESSION["login"] = 1;	
			
		session_write_close();

?>



<meta http-equiv='refresh'content='0;url=index.php'>



<?php }?>
