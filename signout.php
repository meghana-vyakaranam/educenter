<?php
	session_start();
	if(isset($_SESSION["in"]))
	{
		
		$_SESSION['in']=0;
	}	
?>
<html>
	<script>
		sessionStorage.setItem("signed","out");
		window.location.href="try3.html";
	</script>
</html>