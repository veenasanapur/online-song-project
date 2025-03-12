<?php
session_start();
include("../files/functions.php");
// $id= $_SESSION['user'];
$username=$_SESSION['user']['username'];


$opass=$_POST['opass'];
$npass = password_hash($_POST['npass'], PASSWORD_DEFAULT);
$cpass=$_POST['cpass'];



$query = "SELECT * FROM users where username = '$username' ";
// print_r($_SESSION['user']);
$result = mysqli_query($conn,$query);



$row = mysqli_fetch_array($result);
if(password_verify($opass, $row['password'])){
$id111=$row['user_id'];
if($row)
{
    if($_POST['npass'] == $cpass)
    {
        $query1= "update users set password = '$npass' where user_id= '$id111' ";
        $result1 = mysqli_query($conn,$query1);

if($result1)
{
    echo "<script>alert('Password Changed Successfully')</script>";
    echo '<script>document.location="index.php"</script>';
}
else
{
    echo "<script>alert('Failed')</script>";
    echo '<script>document.location="changepassrd.php"</script>';
}

    }
    else
    {
        echo "<script>alert('Password and confurm password must be same')</script>";
        echo '<script>document.location="changepass.php"</script>';
    }
}
else
{
    echo "<script>alert('error')</script>";
    echo '<script>document.location="changepassme.php"</script>';
    echo $query;

}
}
else{
    
    echo "<script>alert('You entered wrong password.')</script>";
}

?>