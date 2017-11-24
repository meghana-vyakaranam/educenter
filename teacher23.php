<!DOCTYPE html>
<html>
<head>
<style>
* {box-sizing: border-box}

	th.b
	{
		background-color: white;
		//border:3px solid black; inside table tag: border:3px solid black;border-collapse:collapse;
		//border-collapse:collapse;
		width:20%;
		text-decoration-color: black;
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
		//background-color: #4C75B7;
		text-decoration: underline;
		
	}

body {
	font-family: "Lato", sans-serif;
	background-image:url("bg5-1.jpg");
	background-repeat: repeat;
}

/* Style the tab */
div.tab {
    float: left;
    //border: 1px solid #ccc;
    background-color: #5cabe0;
    width: 15%;
    height: 100%;
}

/* Style the buttons inside the tab */
div.tab button {
    display: block;
    background-color: #5cabe0;
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


/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #77b6e3;
}

/* Create an active/current "tab button" class */
div.tab button.active {
    background-color: #77b6e3;
}

/* Style the tab content */
.tabcontent {
    width: 85%;
	background-color:  #77b6e3;
    float: left;
    padding: 0px 12px;
    border: 1px solid #77b6e3;
    width: 85%;
    border-bottom: none
	height: 100%;
}
</style>
</head>
<body>
	<table class="pos" style="background-color: white; font-size:20;border:1pt; width: 100%">
		<th ><img src="pesu1.jpg" height="65pt" width="65pt"></th>
		<th class="b"><a href="try2	.html" >HOME</a></th>
		<th class="b" ><a href="abc.html">ANNOUNCEMENTS</a></th>
		<th class="b" ><a href="abc.html">CALENDAR</a></th>
		<th class="b" ><a href="abc.html">CONTACT US</a></th>
		<th class="b" ><a href="sample.html">LOG IN</a></th>
	</table>
	<br>
	<br>

<p>Click on the buttons inside the tabbed menu:</p>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Assignment Upload')" id="defaultOpen">Assignment Upload</button>
  <button class="tablinks" onclick="openCity(event, 'Material Upload')">Material Upload</button>
  <button class="tablinks" onclick="openCity(event, 'Notification Upload')">Announcement Upload</button>
 
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
    Select file to upload:</br></br>
    <input type="file" name="fileToUpload" id="fileToUpload"></br></br>
    <input type="submit" value="Upload File" name="submit">
  </form>
	<p> </p>
</div>

<div id="Material Upload" class="tabcontent">
  <h2>Material Upload</h2>
  <p>The following materials are already uploaded:<br/>
  <?php $dir='material';
		if (is_dir($dir)){
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
    Select file to upload:</br>
    <input type="file" name="fileToUpload" id="fileToUpload"></br></br>
    <input type="submit" value="Upload File" name="submit">
  </form>
  <script type="text/javascript">
    document.getElementById("Notification Upload").click();
  </script>
</div>

<div id="Notification Upload" class="tabcontent">
  <h2>Announcement Upload</h2>
  <p>
  	The following announcements have been uploaded:
  	<br/>
  	<?php
  		$ann=file("announcements.txt");
  		for($x=0;$x<count($ann);$x++)
  			echo $ann[$x]."<br/>";
  	?>
  	<br/>
  	Type in announcement to upload:
  	<br/><br/>
  	<form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post" onsubmit='open("Anu")'>
  	<textarea rows=3 cols=50 name="ta" ></textarea> <br/>
  	<input type="submit" name="Upload">
  	</form>

  	<?php
  		$annw=fopen("announcements.txt","a");
  		fwrite($annw,$_POST["ta"]."<br/>");
  	?>
  	
  </p>
</div>

<script>
function openCity(evt, cityName) {
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

function open(x)
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
    var y=document.getElementByName(x)
    y.style.display = "block";
    y.className+=" active";

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 
