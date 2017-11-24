<?php 

session_start();

if($_SESSION['in']==0 || !(isset($_SESSION['in'])))
	header("Location:sample.php");
else if($_SESSION['prof']==0)
	header("Location:error.php");

?>



<!DOCTYPE html>
<html>
	<head>
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
			div.tab {
				float: left;
				//border: 1px solid #ccc;
				background-color:#dfdfe1;
				width: 15%;
				height: 100%;
			}
			div.tab button {
				display: block;
				background-color: #dfdfe1;
				color: black;
				padding: 22px 16px;
				width: 100%;
				border: none;
				outline: none;
				text-align: left;
				cursor: pointer;
				transition: 0.3s;
				font-size: 17px;
			}

			div.tlink {
				display: block;
				background-color: inherit;
				color: black;
				padding: 22px 16px;
				//width: 100%;
				border: none;
				outline: none;
				text-align: left;
				//cursor: pointer;
				transition: 0.3s;
				font-size: 17px;
				height: 100%;
			}
			div.tab button:hover {
				background-color:#bcbcc2;
			}

			div.tab button.active {
				background-color:#bcbcc2;
			}

			.tabcontent {
				position:relative;
				left:80px;
				top:100px;
				width:1020px;
				background-color:#dfdfe1;
				float:left;
				padding:25px 50px;
				border: 1px solid #77b6e3;
				border-bottom: none
				height: 100%;
				font-family:Arial;
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

<div id="sel" class="tab">
  <button class="tablinks" name="Au" onclick="openCity(event, 'Assignment Upload')" id="defaultOpen">Assignment Upload</button>
  <button class="tablinks" name="Mu" onclick="openCity(event, 'Material Upload')">Material Upload</button>
  <button class="tablinks" name="Anu" onclick="openCity(event, 'Announcement Upload')">Announcement Upload</button>
 </div>

<div id="Assignment Upload" class="tabcontent">
  <h2>Assignment Upload</h2>
  
  <p style="line-height: 20px;">The following assignments are already uploaded:<br/>
  <ol style="line-height: 30px;">
  <?php $dir='uploads';
		if (is_dir($dir)){
		  if ($dh = opendir($dir)){
			while (($file = readdir($dh)) !== false ){
			  if($file!='.' && $file!='..')
			  echo "<li>".$file."</li>" ;
			}
			closedir($dh);
		  }
		}
	 ?>
	 </ol>
	 </p>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:<br/><br/>
    <input type="file" name="fileToUpload" id="fileToUpload"></br></br>
    <input type="submit" value="Upload File" name="submit">
  </form>
	<p> </p>
</div>

<div id="Material Upload" class="tabcontent">
  <h2>Material Upload</h2>
  <?php $dir='material';
		$flag=0;
		if (is_dir($dir)){
			echo "<p>The following materials are already uploaded:</p><br/>";
			if ($dh = opendir($dir)){
				while (($file = readdir($dh)) !== false ){
				if($file!='.' && $file!='..')
				echo $file. '<br/>' ;
				}
				closedir($dh);
		    }			
		}
	 ?>
	 </p>
  <form action="upload1.php" method="post" enctype="multipart/form-data">
    Select file to upload:<br/><br/>
    <input type="file" name="fileToUpload" id="fileToUpload"></br></br>
    <input type="submit" value="Upload File" name="submit">
  </form>

</div>

<div id="Announcement Upload" class="tabcontent">
  <h2>Announcement Upload</h2>
  <p>
  	The following announcements have been uploaded:
  	<br/>
  	<?php
  		$ann=file("announcements.txt");
  		for($x=0;$x<count($ann);$x++)
  		{
  			$y=$x+1;
  			echo "$y. ".$ann[$x]."<br/>";
  		}	
  	?>
  	<br/>
  	Type in announcement to upload:
  	<br/><br/>
  	<form action="upload3.php" method="post" >
  	<textarea rows=3 cols=50 name="ta" ></textarea> <br/>
  	<input type="submit" name="Upload">
  	</form>
  </p>

</div>

<script>

	if(sessionStorage.getItem("signed"))
	{
		if(sessionStorage.getItem("signed")=="in")
		{
			var thing = document.getElementById("log");
			thing.innerHTML="<a href='signout.php'>Log Out</a>";			
		}

	}

	if(localStorage.getItem("clicked"))
	{
		var p = localStorage.getItem("clicked");
		var bu = document.getElementsByName(p);
		if(p=="Au")
			open(bu[0],"Assignment Upload");
		else if(p=="Mu")
			open(bu[0],"Material Upload");
		else if(p=="Anu")
			open(bu[0],"Announcement Upload");
	}
	else
		document.getElementById("defaultOpen").click();

function openCity(evt, cityName) {
	localStorage.setItem("clicked",evt.target.name);
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function open(x,y)
{
	var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(y).style.display = "block";
    x.className+=" active";
}

// Get the element with id="defaultOpen" and click on it
//document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 
