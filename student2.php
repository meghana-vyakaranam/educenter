<?php 

session_start();
if($_SESSION['in']==0 || !(isset($_SESSION['in'])))
	header("Location:sample.php");
else if($_SESSION['prof']==1)
	header("Location:error.php");
else 
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
  <button class="tablinks" onclick="openCity(event, 'Assignment Download')" id="defaultOpen">Assignment Download</button>
  <button class="tablinks" onclick="openCity(event, 'Material Download')">Material Download</button>
</div>

<div id="Assignment Download" class="tabcontent">
  <h3>Assignment Download</h3>
  
  <p id="assign" >List of assignments:<br/></p>
  <script>
    <?php 
		$dir='uploads/';
		$i=0;
		$as=array();
		if (is_dir($dir)){
		  if ($dh = opendir($dir)){
			while (($file = readdir($dh)) !== false ){
			  if($file!='.' && $file!='..')
				$a[]=$file;
			}
			closedir($dh);
		  }
		}
	
	?>
	
	
	if(sessionStorage.getItem("signed"))
	{
		if(sessionStorage.getItem("signed")=="in")
		{
			var thing = document.getElementById("log");
			thing.innerHTML="<a href='signout.php'>Log Out</a>";			
		}

	}
	var jsa = [<?php echo '"'.implode('","',$a).'"'; ?>];
	for( i=0;i<jsa.length;i++)
	{	
		//document.writeln(jsa[i]+"</br>");
		var x=document.createElement("P");
		var y=document.createTextNode(jsa[i]);
		x.append(y);
		var p=document.getElementById("assign");
		p.append(x);
		x.onmouseover=function() { this.style.cursor= "pointer"; }
		
	}
	var p=document.getElementById("assign");
	for( i=0;i<p.children.length;i++)
	{	
		p.children[i].onclick=openf;
	}
	console.log(p);
	
	function openf()
	{
	   var url = "http://localhost/project/uploads/"+this.textContent;
       window.open(url, 'Download');
	}
	
	</script>
	
</div>

<div id="Material Download" class="tabcontent">
  <h3>Material Download</h3>
  <p id="material" >Material Available:<br/></p>
  <script>
    <?php 
		$dir1='Material/';
		$i=0;
		$as1=array();
		if (is_dir($dir)){
		  if ($dh1 = opendir($dir1)){
			while (($file1 = readdir($dh1)) !== false ){
			  if($file1!='.' && $file1!='..')
				$a1[]=$file1;
			}
			closedir($dh1);
		  }
		}
	
	?>
	
	
	var jsa1 = [<?php echo '"'.implode('","',$a1).'"'; ?>];
	for( i=0;i<jsa1.length;i++)
	{	
		//document.writeln(jsa[i]+"</br>");
		var x=document.createElement("P");
		var y=document.createTextNode(jsa1[i]);
		x.append(y);
		var p=document.getElementById("material");
		p.append(x);
		x.onmouseover=function() { this.style.cursor= "pointer"; }
		
	}
	var p=document.getElementById("material");
	for( i=0;i<p.children.length;i++)
	{	
		p.children[i].onclick=openf;
	}
	console.log(p);
	
	function openf()
	{
	   var url = "http://localhost/project/Material/"+this.textContent;
       window.open(url, 'Download');
	}
	
	</script>
	
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
