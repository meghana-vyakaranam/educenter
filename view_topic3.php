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
		/*
		table
		{
			background-color:#15629e;
			border: 1px solid; 
			border-collapse:collapse;
		}
		th,td,tr
		{
			border: 1px solid; 
			border-collapse:collapse;
		}
		.question
		{
			
		}
		.answer
		{
			
		}
		.colon
		{
			//border: none;	
		}

		p.heading
		{
			background-color:#0a375c;
			//color:#333333;
			font-size: 30px;
			padding:5px;
		}
		*/
		p.answers
		{
			color:white;
			font-size: 20px;
			padding:5px;
			width: 300px;
			text-align:center;
			margin: auto;
			font-family:Raleway,Calibri;
		}
		
		p.heading
		{
			background-color:#e7e7e7;
			color:black;
			font-size: 25px;
			padding:5px;
			text-align:center;
			position: relative;
			top:100px;
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
<body >
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

// Connect to server and select database.
$s=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($s,"$db_name")or die("cannot select DB");

// get value of id that sent from address bar 
$id=$_GET['id'];
//var_dump($id);
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysqli_query($s,$sql);
//var_dump($result);
$rows=mysqli_fetch_array($result);
?>

<p class="heading"> <strong> <?php echo $rows['topic']; ?> </strong> </p><br/><br/><br/><br/><br/>

<p class="answers"><strong>Question</strong></p><br/>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#e7e7e7">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" >

<tr>
<td class="question"><?php echo $rows['detail']; ?></td>
</tr>

<tr>
<td style="text-align:right;"><strong> <?php echo $rows['datetime']; ?> </strong></td>
</tr>

<tr>
<td style="text-align:right;"><strong>Asked by :</strong> <?php echo $rows['name']; ?> </td>
</tr>
<tr>
<td style="text-align:right;"><strong>Email : </strong><?php echo $rows['email'];?></td>
</tr>


</table></td>
</tr>
</table>
<BR>

<p class="answers"><strong>Answers</strong></p><br/>
<?php

$tbl_name2="forum_answer"; // Switch to table "forum_answer"
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysqli_query($s,$sql2);
while($rows=mysqli_fetch_array($result2)){
?>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#e7e7e7">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" >


<tr>
<td colspan="2" style="border-bottom:'7px solid black';" ><?php echo $rows['a_answer']; ?></td>
</tr>
<tr>
<td style="text-align:right;"><strong> <?php echo $rows['a_datetime']; ?></strong></td>
</tr>
</tr>
<tr>
<td width="77%" style="text-align:right;"><strong>Answered by : </strong> <?php echo $rows['a_name']; ?></td>
</tr>
<tr>
<td style="text-align:right;"><strong>Email : </strong><?php echo $rows['a_email']; ?></td>
</tr>
</table></td>

</table><br>
 
<?php
}

$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
$result3=mysqli_query($s,$sql3);
$rows=mysqli_fetch_array($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
$result4=mysqli_query($s,$sql4);
}
 
// count more value
$addview=$view+1;
$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
$result5=mysqli_query($s,$sql5);
mysqli_close($s);
?>

<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#e7e7e7">
<tr>
<form name="form1" method="post" action="add_answer.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" >
<tr>
<td width="20%"><strong>Name</strong></td>
<td width="80%"><input name="a_name" type="text" id="a_name" size="45"></td>
</tr>
<tr>
<td><strong>Email</strong></td>
<td><input name="a_email" type="text" id="a_email" size="45"></td>
</tr>
<tr>
<td valign="top"><strong>Answer</strong></td>
<td><textarea name="a_answer" cols="47" rows="3" id="a_answer"></textarea></td>
</tr>
<tr>
<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</body>
<script type="text/javascript">
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