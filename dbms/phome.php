<?php
	session_start();
	require_once 'connect.php';
	require_once 'function.php';
	checkp();
?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="inside.css"/>
		<script>
			window.onload=a;
			window.onunload=clearInterval(f);
			function a()
			{
				var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();
				var day=today.getDay();
				var day_name=new Array(7);
				day_name[0]="Sunday"
				day_name[1]="Monday"
				day_name[2]="Tuesday"
				day_name[3]="Wednesday"
				day_name[4]="Thursday"
				day_name[5]="Friday"
				day_name[6]="Saturday"
				if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = day_name[day]+':'+dd+'/'+mm+'/'+yyyy;
				document.getElementById("para").innerHTML=today;
				setInterval("f()",1000);
			}
				function addOption() {
					var theForm = document.getElementById("myForm");  
					var newOption = document.createElement("input");  
					newOption.name = "aoi[]";
					newOption.type = "text";
					theForm.appendChild(newOption); 
					var newOption1 = document.createElement("input");  
					newOption1.name = "size[]";
					newOption1.type = "text";
				}  
			function f()
			{
			var currentTime = new Date();
			var hours = currentTime.getHours();
			var minutes = currentTime.getMinutes();
			var seconds = currentTime.getSeconds();
			document.getElementById("cds").innerHTML=hours+':'+minutes+':'+seconds;
			}
			function checkmy()
			{
				var x=document.getElementById("myForm");
				for(i=1;i<=x.length;i+=2)
				{
					if(x[i].value)
					{
						if(x[i].value==0)
						{
						alert("Size Can't be zero");
						return false;
						}	
					}
				}
				
				return true;
			}
		</script>
	</head>
	
	<body>
		
		<div id="logo"></div>
		
		<div id="top">
			<div id="date">
				<p id="para"></p>
				<p id="cds")></p>
			</div>
			<div id="welcome">
				<p>&nbsp;Welcome, &nbsp;</p>
				<span><?php echo ucwords($_SESSION['name']); ?></span>
			</div>	
			
			<div id ="logot">
				<form action="logout.php">
					<input type="submit" value="Logout" id="logout"/>
				</form>
			</div>
		</div>		
		
		<div id="left">
			<ul>
				<li><a href="prhome.php">Home</a></li>
				<li><a href="pchangepass.php">change password</a></li>
				<li><a href="phome.php">AOI filling</a></li>
				<li><a href="aoidelete.php">AOI delete</a></li>
				<li><a href="pview.php">see allotment</a></li>
			</ul>
		</div>
		
		<div id="main">
	<form action="aoiadd.php" method="post" id="myForm" onsubmit="return checkmy()">
	<table>
		<tr><td>Subject</td></tr>
		<?php 
		for($i=0;$i<5;$i++)
		{
			echo '<tr><td><input type="text" name="aoi[]" /></td></tr>';
		}
		?>
		<tr><td colspan="2"><input type="submit" value="Okay" style="text-align:center;" id="logout"/></td></tr>
	</table>
</form>
		</div>
		
	</body>

</html>
