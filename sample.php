<?php
	session_start();
	if(isset($_SESSION['in']))
		{
			if($_SESSION['in']==1)
				$_SESSION['in']=0;
		}
	else
		$_SESSION['in']=0;
?>

<!DOCTYPE html>
<html >
<head>
 
  <title>Login Form</title>
  
  <link rel="stylesheet">

  
      <style>

html { width: 100%; height:100%; overflow:hidden; }

body { 
	width: 100%;
	height:100%;
	font-family: Arial;
	//background: #092756;
  	background-color:#e7e7e7;
	//background-repeat: no-repeat;
	//background-size:cover;
	}
.login { 
	position: absolute;
	top: 50%;
	left: 15%;
	margin: -150px 0 0 -150px;
	width:300px;
	height:300px;
}
.login h1 { color:black; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

input { 
	width: 100%; 
	margin-bottom: 10px; 
	background: rgba(0,0,0,0.3);
	border: none;
	outline: none;
	padding: 10px;
	font-size: 13px;
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 4px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
}
.bt{
    width: 50%; 
	margin-bottom: 10px; 
	background: burlywood;
	border: none;
	outline: none;
	padding: 10px;
	font-size: 13px;
	color:black;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 4px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
}

/*
input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
th.b
	{
		background-color: azure;
		//border:3px solid black; inside table tag: border:3px solid black;border-collapse:collapse;
		//border-collapse:collapse;
		width:20%;
		font-family:'Assistant';
	
		
	}
	table.pos
	{
		position: absolute;
		top: 0px;
		right:0;
		left:0;
	}
	a:link 
	{ 
		color:black;
		font-family:'Assistant';
		text-decoration: none;
		
	}
	th:hover 
	{	
		color: black;
		background-color: #4C75B7;
		text-decoration: none;
		
	}*/

	#wname{
		position:absolute;
		width:200px;
		height:95px;
		left:200px;
		top:10px;
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
				font-size:18px;
				font-family:Raleway;
				color:#dfdfe1;
				position:relative;
			}
			table.pos
			{
				position:absolute;
				right:50px;
				top:20px;
				border:1pt; 
				background-color:#1b2347;
			}
			
			th:hover 
			{	
				color:black;
				text-decoration: underline;
				
			}

			#big_box{
				width: 100%;
				position:relative;
				top:100px;
				height:100%;
				background-image: url("student-teacher-diaries-3.jpg");
				background-size: cover;
				background-repeat: no-repeat;
			}
    </style>

 
</head>

<body>
	<img id="logo" src="runlogo.png" height="75pt" width="120pt">
	<div id="wname"> <img src="name.png" height="95px";/> </div>
	<table class="pos">
		<th class="b"><a href="try3.html" >Home</a></th>
		<th class="b" ><a href="announcements.php">Announcements</a></th>
		<th class="b" ><a href="abc.html">Calendar</a></th>
		<th class="b" ><a href="abc.html">Contact Us</a></th>
		<th class="b" id="log" ><a href="sample.php">Log In</a></th>
	</table>
  <div id="big_box">
  <div class="login">
	<h1>Login</h1>
    <form method="post" action="login.php">
    	<input type="text" name="user" placeholder="Username" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" />
        <br>
        <br>

        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <align="center"><button type="submit" name="submit" class="bt">Let me in.</button></align>
    </form>

</div>
</div>

  
   

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
