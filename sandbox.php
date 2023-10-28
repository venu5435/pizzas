<?php 

if(isset($_POST['submit'])){
 
    setcookie('gender', $_POST['gender'], time() + 86400); //set Cookie

    session_start();

$_SESSION['name'] = $_POST['name'];

//echo $_POST['name'];\
header('Location: index.php');

}

?>

<!DOCTYPE html>
<html lang="en">

<body>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="text" name="name" >
    <select name="gender">
        <option value="male">Male</option>
        <option value="Female">Female</option>
    </select>
    <input type="submit"  name="submit" value="submit" >
</form>
    
</body>
</html>