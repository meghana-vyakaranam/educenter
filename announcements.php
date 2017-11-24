<html>
<style>
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
			a:link 
			{ 
				color:black;
				//font-family:'Assistant';
				text-decoration:none;
				
			}
			th:hover 
			{	
				color:black;
				text-decoration: underline;
				
			}
			body {
				//font-family: "Lato", sans-serif;
				//background-image:url("bg5-1.jpg");
				background-color:#1b2347;
				background-repeat: repeat;
			}
			#box{
				background-color: #e7e7e7;
				position:absolute;
				left:3.7%;
				width:93%;
				top:20%;
				height:70%;
			}
			#p
			{
				position:relative;
				left:50px;
				top:20px;
				font-family:Arial;
				font-size:20px;
			}
			#x
			{
				font-family:Arial;
				font-size:30px;	
			}

</style>
<body>
	<img id="logo" src="runlogo.png" height="75pt" width="120pt">
	<table class="pos">
		<th class="b"><a href="try3.html" >Home</a></th>
		<th class="b" ><a href="announcements.php">Announcements</a></th>
		<th class="b" ><a href="calendar.html">Calendar</a></th>
		<th class="b" ><a href="contact.html">Contact Us</a></th>
		<th class="b" id="log"><a href="sample.html">Log In</a></th>
	</table>
		<div id="box">
			<br/>
			<p align="center" id="x"> ANNOUNCEMENTS </p>
			<?php
				$ann=file("announcements.txt");
		  		for($x=0;$x<count($ann);$x++)
		  		{
		  			$y=$x+1;
		  			echo "<p id='p'>$y. ".$ann[$x]."</p>";
		  		}	
		  	?>
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