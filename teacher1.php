<!DOCTYPE html>
<html>
<head>
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
div.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 15%;
    height: 100%;
}

/* Style the buttons inside the tab */
div.tab button {
    display: block;
    background-color: inherit;
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
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid #ccc;
    width: 85%;
    border-bottom: none
	height: 100%;
}
</style>
</head>
<body>

<p>Click on the buttons inside the tabbed menu:</p>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Assignment Upload')" id="defaultOpen">Assignment Upload</button>
  <button class="tablinks" onclick="openCity(event, 'Material Upload')">Material Upload</button>
  <button class="tablinks" onclick="openCity(event, 'Notification Upload')">Notification Upload</button>
 
</div>

<div id="Assignment Upload" class="tabcontent">
  <h3>Assignment Upload</h3>
  
  <p>The following assignments are already uploaded:<br/>
  <ol>
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
  <h3>Material Upload</h3>
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

</div>

<div id="Notification Upload" class="tabcontent">
  <h3>Notification Upload</h3>
  <p>Notification Upload</p> 
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

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 
