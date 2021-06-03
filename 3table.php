<?php
//DB Connection
$host = "localhost";
$usename = "root";
$passwd = "";
$dbname = "db_bakecorner";
$connection = mysqli_connect("localhost","root","","db_bakecorner");

//Query
$q=mysqli_query($connection,"select * from tbl_customer where is_delete=0") or die("Error".mysqli_error($connection));

echo "<table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Gender</th>";
echo "<th>Mobile</th>";
echo "<th>Action</th>";
echo "</tr>";
$i=0;
while($row = mysqli_fetch_array($q)){
    $i++;
    echo "<tr>";
    echo "<td>$i</td>";
    echo "<td>{$row['customer_name']}</td>";
    echo "<td>{$row['customer_gender']}</td>";
    echo "<td>{$row['customer_mobile']}</td>";
    echo "<td><a href = 'delete.php?deleteid={$row['customer_id']}'>Delete</a></td>";
    
    echo"</tr>";
}
echo "</table>";

echo "<a href='insertrecord.php'>Add Record</a>";