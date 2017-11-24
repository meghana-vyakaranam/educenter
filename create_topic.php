<?php
	session_start();
?>

<html>
<head>
	<style>
		
		a:link 
		{
		    color: #00004d;
		}
		/* visited link */
		a:visited 
		{
		    color: #660066;
		}
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
		td.t
		{
			color:#e7e7e7;
			border-collapse:collapse;
		}
		
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
<body>

	<img id="logo" src="pesu1.jpg" height="75pt" width="120pt">
	<table class="pos">
		<th class="b"><a href="try3	.html" >Home</a></th>
		<th class="b" ><a href="announcements.php">Announcements</a></th>
		<th class="b" ><a href="calendar.html">Calendar</a></th>
		<th class="b" ><a href="contact.html">Contact Us</a></th>
		<th class="b" ><a href="sample.html">Log In</a></th>
	</table>

<p class="heading"> <strong> CREATE NEW TOPIC </strong> </p><br/><br/><br/><br/><br/>


<table width="400" border="0" align="center" cellpadding="0" cellspacing="1"  >
<tr >
<form id="form1" name="form1" method="post" action="add_topic.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1"  >
<tr>
<td  class='t' width="16%"><strong>Topic</strong></td>

<td width="84%"><input name="topic" type="text" id="topic" size="50" /></td>
</tr>
<tr>
<td  class='t' valign="top"><strong>Detail</strong></td>

<td><textarea name="detail" cols="52" rows="3" id="detail"></textarea></td>
</tr>
<tr>
<td  class='t' ><strong>Name</strong></td>

<td><input name="name" type="text" id="name" size="50" /></td>
</tr>
<tr>
<td  class='t' ><strong>Email</strong></td>

<td><input name="email" type="text" id="email" size="50" /></td>
</tr>
<tr>

<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" /></td>
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