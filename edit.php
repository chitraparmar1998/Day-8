<?php
$host = "localhost";
$usename = "root";
$passwd = "";
$dbname = "db_bakecorner";
$connection = mysqli_connect("localhost","root","","db_bakecorner");

if (!isset ($_GET['id'])|| empty($_GET['id'])){
    header("location:3table.php");
}

$editid=$_GET['id'];
$editq=mysqli_quary($connection,"select * from tbl_customer where customer_id='{$editid}'") or die(mysqli_error($connection));
$editdata=mysqli_fetch_array($editq);

if($_POST){
    $customer_id=$_POST['customer_id'];
    $customer_name=$_POST['customer_name'];
    $customer_gender=$_POST['customer_gender'];
    $customer_mobile=$_POST['customer_mobile'];
    
    $uq=mysqli_query($connection,"update table_customer set customer_name='{$customer_name}',customer_gender='{$customer_gender}',customer_mobile='{$customer_mobile}' where customer_id='{$editid}'") or die(mysqli_error($connection));
    
    if($uq){
        echo "<script>alert('Record Updated');window.location='3table.php';</script>";
       
    }

}
?>

<html>
    <body>
        <form method="post">
            Id : <input type="text"  name="customer_id"/>
            Name : <input type="text"value="<?php echo $editdata['customer_name'];?>" name="customer_name"/><br/>
            Gender : Male<input type="radio" 
                                <?php if ($editdata['customer_gender']=="Male"){echo "checked";}?> value="Male" name="customer_gender"/>
            Female<input type="radio" 
                                <?php if ($editdata['customer_gender']=="Female"){echo "checked";}?> value="Female" name="customer_gender"/><br/>
            Mobile No : <input type="number" value="<?php echo $editdata['customer_mobile'];?>" name="customer_mobile"/><br/>
            <input type="submit"/>
            
            
        </form>
    </body>
</html>
