<?php
include("index.php");
if(isset($_POST['search']))
{
    $valueToSearch=$_POST['valueToSearch'];
    $query="SELECT * FROM `list` WHERE Concat(`Item`, `Quantity`, `Unit`, `Category`,`Date`) LIKE'%".$valueToSearch."%'";
     $search_result=filterTable($query);
}
else{
    $query="SELECT * FROM `list`";
    $search_result=filterTable($query);
    
}
function filterTable($query)
{
    $connect=mysqli_connect("localhost","root","","foodinventory");
    $filter_Result=mysqli_query($connect,$query);
    return $filter_Result;
}


?>

<html>
<head>
<title>Filter</title></head>
<body>
<div id="main">
    <div id="navigation">

<<h1 style="text-align: left; font-family: Lucida Calligraphy; font-size:19px;"><b><u>Admin Panel</u></b></h1>
   <p style="font-size:18px; font-family: Minion Pro Med; color:#EEE4B9;"><b>Stock Management</b></p>

<p style="font-size: 17px; font-family:Minion Pro Med;"><a href="insert.php" ><b>Edit Stock</b></a></p>
<p style="text-align: left; font-family:Minion Pro Med; font-size: 17px"><a href="delete_item.php" ><b>Delete Stock</b></p>
<p style="font-size: 17px; font-family:Minion Pro Med;"><a href="view_admin.php" ><b>View Stock</b></a></p>
<p style="font-size: 17px; font-family:Minion Pro Med;"><a href="thre.php" ><b>Alert</b></a></p>
<hr />
<p style="font-size:17px; font-family: Minion Pro Med;"><a href="menupanel.php"><b>Menu Management</b> </a></p>
<p style="font-size:17px; font-family: Minion Pro Med;"><a href="display_order.php"><b>View Orders</b> </a></p>
<hr />

<p style="font-size: 17px; font-family:Minion Pro Med;"><a href="home.php"><b>Logout</b></a></p>
</div>
    <form action="up.php" method="post">
    <br />
    <br /><br/>
<p style="text-align:center; font-size:30px; font-family: Calibri ; color:white "><b> Stock Management </b></p>
<p style="text-align:center; font-size:18px;"><b>View Stock!</b></p>
<input type="text" name="valueToSearch" placeholder="Enter an Item here"><br /><br />
<input type="submit" name="search" value="Search"><br /><br />
   
    
    <table width="600px" border="2" cellpadding="2" cellspacing="3" align="center">
<tr style="font-family: Cambria">
<th style="color:#1A446C"><b>Item</b></th>
<th style="color:#1A446C"><b>Quantity</th>
<th style="color:#1A446C"><b>Category</th>
<th style="color:#1A446C"><b>Rate</th>
<th style="color:#1A446C"><b>Date</th>

</tr>
<?php
while($row=mysqli_fetch_array($search_result)):?>
<tr>
<td><?php echo $row['Item'];?></td>
<td><?php echo $row['Quantity'].$row['Unit'];?></td>	
<td><?php echo $row['Category'];?></td>
<td><?php echo $row['Rate'];?></td>
<td><?php echo $row['Date'];?></td>
</tr>

<?php endwhile;?>
</table>

</form>
</div>


</body>
</html>