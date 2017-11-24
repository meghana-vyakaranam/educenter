<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'username');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
//extract($_POST);
$ID = $_POST['user'];
$Password = $_POST['pass'];
//echo "helllooooo";
function SignIn()
{
	//echo "hello 1";
	session_start(); //starting the session for user profile page
	if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text
	{
		//echo "hello 123";
		$query = mysql_query("SELECT * FROM username where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die("Error")  ;
		$row = mysql_fetch_array($query)  or die("Error") ;
		$_SESSION['prof']=$row['prof'];
		$_SESSION['in']=1;
		if(!empty($row['userName']) AND !empty($row['pass']))
		{
			//echo $_POST['user']===$row['userName'];
			//echo $_POST['pass']===$row['pass'];

			if($_POST['user']==$row['userName'] && $_POST['pass']==$row['pass'])
			{
				//$_SESSION['userName'] = $row['pass'];
				echo "<p id='yes'>  </p> ";
				//echo substr($_SESSION['userName'],0,1)."<br>";

				/*if(substr($_POST['user'],0,1)==='t')
				{
					header("Location: teacher2.php");
				}
				elseif(substr($_POST['user'],0,1)==='s')
				{
					header("Location: student1.php");
				}*/
				echo("<p id='prof'>".$row['prof']."</p>");
				/*if($row['prof']==0)
				{
					header("Location: student2.php");
				}
				else if($row['prof']==1)
				{
					header("Location: teacher22.php");
				}*/
			}

			else
			{
				header("Location:error.php");
			}
		}
	}
}

SignIn();

?>

<html>
	<style>
		/**{
				background-color:#1b2347;
				background-repeat: repeat;
				color: #e7e7e7;
                font-family:Arial;
                font-size:30px;
			}*/
	</style>
	<body>
	</body>
	<script>
		var prof = document.getElementById("prof");
		var yes = document.getElementById("yes");
		if(yes)
		sessionStorage.setItem("signed","in");
		else
		sessionStorage.setItem("signed","out");
		if(prof.innerHTML=="1")
			window.location.href="teacher22.php";
		else if(prof.innerHTML=="0")
			window.location.href="student2.php";

	</script>
</html>