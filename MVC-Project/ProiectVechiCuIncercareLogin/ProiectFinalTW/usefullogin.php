<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM users where name='$username' and Password='md5($pass)'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {   $_SESSION["ID"] = $row['ID'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["Email"]=$row['Email'];
        header("Location: usefulhome.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>