<html>
<head><title>Updating the record in database</title></head>
<body>
<?php
include("index.php");
//connecting to the mysql database
$con=mysqli_connect('127.0.0.1','root','');

//selecting the database
mysqli_select_db($con,'foodinventory');

//selecting query
//$sql="SElECT * FROM menu";

$sql="SElECT * FROM menu where Category='Snacks'";


//Executing the query

$records=mysqli_query($con,$sql);

?>
<div id="main">
    <div id="navigation">
    <h1 style="text-align: left; font-family: Lucida Calligraphy; font-size:19px;"><b><u>Admin Panel</u></b></h1>
    <br />

<p style="font-size: 17px; font-family:Minion Pro Med;"><a href="menuinsert.php"><b>Insert Item</b></a></p>

<p style="font-size: 17px; font-family:Minion Pro Med;"><a href="menu_del.php"><b>Delete Item</b></a></p>
<p style="font-size: 17px; font-family:Minion Pro Med;"><a href="update_menu.php"><b>Update Item</b></a></p>
<p style="font-size: 17px; font-family:Minion Pro Med;"><a href="menu_view.php"><b>View Menu</b></a></p>
<hr />
<p style="font-size: 17px; font-family:Minion Pro Med;"><a href="home.php"><b>Logout</b></a></p>



    
</div>
 <br/>
 <p style="text-align:center; font-size:30px; font-family: Calibri ; color:white "><b>Menu Management</b></p>
 <p style="text-align: left; font-family: Lucida Calligraphy; font-size:19px; text-align: center;"><b>Update your menu here!</b></p>
<table width="400px" border="3" cellpadding="3" cellspacing="2" align="center">
	<tr>
    
    
<tr style="color:#1A446C;"><td colspan="4"><center>Snacks</center></td></tr>
	<th>Name</th>
    <th>Category</th>
	<th>Price</th>
	<th>Update</th>
	
	</tr>
	<?php
	while($row=mysqli_fetch_array($records))
	{
		echo "<tr><form action=update_snacks.php method=post >";
	
		echo "<td><input type=text name=Name value='".$row['Name']."'></td>";
        	echo "<td><input type=text name=Category value='".$row['Category']."'></td>";
        	echo "<td><input type=text name=Price value='".$row['Price']."'></td>";
		
			echo "<input type=hidden name=Id value='".$row['Id']."'>";
		
			echo "<td><input type=Submit value=Submit>";

echo "</form></tr>";
		
	}
	?>
    
</table>





<br/>

</div>



</body>
</html>
<?php

mysqli_select_db($con,'foodinventory');
$sqlq="UPDATE menu SET Name='$_POST[Name]',Category='$_POST[Category]',Price='$_POST[Price]' WHERE ID='$_POST[Id]'";

//Executing the query

?>
