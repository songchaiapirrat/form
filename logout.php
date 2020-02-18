<?PHP session_start();
	session_destroy();

			echo "<script type='text/javascript'>";
			echo  "alert('ออกจากระบบสำเร็จ');";
		    echo "window.location='index.php'";
			echo "</script>";


?>