<?php
	session_start();
?>

<html>
<head>
	<style>
		body
		{
			background-color:#1b2347;
			background-repeat: repeat;
		}
		*{
			box-sizing: border-box;
		}

		#logo{
			position:absolute;
			left:49px;
			top:20px;
		}
		th.b
		{
			margin:30px;
			padding:25px;				
		}
		th.b a{
			text-decoration:none;
			font-size:22px;
			font-family:Raleway,Calibri;
			color:#dfdfe1;
			position:relative;
			bottom:10px;
		}
		table.pos
		{
			position:absolute;
			right:50px;
			top:20px;
			border:1pt; 
			background-color:#1b2347;
		}
		table.t
		{
			//background-color:#15629e;
			background-color:#e7e7e7;
			//border: 3px solid #006699; 
			border-collapse:collapse;
			position: relative;
			top:100px;
		}
		
		table.t td,table.t th,table.t tr
		{
			border: 1px solid #006699; 
			border-collapse:collapse;
		}
		
		a:link 
		{
		    color: #00004d;
		}
		/* visited link */
		a:visited 
		{
		    color: #660066;
		}
		p.heading
		{
			color:#e7e7e7;
			font-size: 25px;
			padding:5px;
			text-align:center;
			position: relative;
			top:120px;
			font-family:Raleway,Calibri;

		}
		button
		{
			position: relative;
			top:110px;
			background-color:#e7e7e7;
			text-align:center;
			border: 1px solid black; 
			border-collapse:collapse;
			font-size: 15px;
			padding: 5px;

		}

		#sel
		{
			position:relative;
			top:100px;
			left:40px;
		}
		
	</style>
</head>
<body>

	<img id="logo" src="pesu1.jpg" height="75pt" width="120pt">
	<table class="pos">
		<th class="b"><a href="try3.html" >Home</a></th>
		<th class="b" ><a href="announcements.php">Announcements</a></th>
		<th class="b" ><a href="calendar.html">Calendar</a></th>
		<th class="b" ><a href="contact.html">Contact Us</a></th>
		<th class="b" id="log"><a href="sample.html">Log In</a></th>
	</table>

<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="db1"; // Database name 
$tbl_name="forum_question"; // Table name 

// Connect to server and select databse.
$s= mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($s,"$db_name")or die("cannot select DB");
$sql="SELECT * FROM $tbl_name";
// OREDER BY id DESC is order result by descending

$result=mysqli_query($s,$sql);
//var_dump($result);
?>

<p class="heading"> <strong> TOPICS </strong> </p>


<table width="70%" align="center" cellpadding="3" cellspacing="1" class="t">
<tr style="border-bottom: 3px solid #006699;">
<th style="border-bottom: 3px solid #006699;" width="6%" align="center" height="40px" ><strong>#</strong></th>
<th style="border-bottom: 3px solid #006699;" width="33%" align="center"  ><strong>Topic</strong></th>
<th style="border-bottom: 3px solid #006699;" width="15%" align="center"  ><strong>Views</strong></th>
<th style="border-bottom: 3px solid #006699;" width="13%" align="center"  ><strong>Date/Time</strong></th>
</tr>

<?php
// Start looping table row
//$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
/*if($rows>0)
echo "hello123";*/
while($rows=mysqli_fetch_assoc($result)){
?>
<tr>
<td align="center"><?php echo $rows['id'];  ?></td>
<td ><a href="view_topic3.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
<td align="center" height="30px" ><?php echo $rows['view']; ?></td>
<td align="center" height="30px" ><?php echo $rows['datetime']; ?></td>
</tr>

<?php
// Exit looping and close connection
}
mysqli_close($s);
?>
</table>
<!--
<tr>
<td colspan="5" align="right"  ><a href="create_topic.php"><strong>Create New Topic</strong> </a></td>
</tr>
</table>
-->
</br>
<div id="button" style="text-align:center;">
<button onclick=window.location.href="create_topic.php"> Create New Topic </button>
</div>
</body>
<script>
	if(sessionStorage.getItem("signed"))
	{
		if(sessionStorage.getItem("signed")=="in")
		{
			var thing = document.getElementById("log");
			thing.innerHTML="<a href='signout.php'>Log Out</a>";			
		}

	}
</script>
</html>