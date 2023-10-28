<?php 

include('config/db_connect.php');

$errors = array('email' => '', 'title' => '', 'ingredients' => '');

$email = $title = $ingredients = ''; // Initialize variables to avoid undefined variable notices.

if(isset($_POST['submit'])){
    if(empty($_POST['email'])){
        $errors['email'] = 'Email is required <br/>';
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Enter a valid email address';
        }
    }

    if(empty($_POST['title'])){
        $errors['title'] = 'Title is required<br/>';
    } else {
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Enter a valid title with only letters and spaces';
        }
    }

    if(empty($_POST['ingredients'])){
        $errors['ingredients'] = 'Please enter at least one ingredient<br/>';
    } else {
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'Please enter comma-separated values';
        }
    }

    if(array_filter($errors)){
        //echo 'Form has errors';
    } else {

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

    

    //sql query

    $sql = "INSERT INTO pizzas(email, title, ingredients) VALUES('$email', '$title', '$ingredients')";


    //check data saved in the DB

    if(mysqli_query($conn,$sql)){
        //success
        header('location: index.php');

    }else{
        //failed
        echo 'query error:'. mysqli_error($conn);

    }



    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>
<section class="container text-grey">
<h3 class="center text-grey">ADD A PIZZA</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?> "class="white" method="POST">
<label for="">Your Email</label>
<input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
<div class="red-text"><?php echo $errors['email']; ?></div>
<label for="">Your Pizza</label>
<input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
<div class="red-text"><?php echo $errors['title']; ?></div>
<label for="">Ingredients (comma-separated values):</label>
<input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients); ?>">
<div class="red-text"><?php echo $errors['ingredients']; ?></div>
<div class="center">
    <input type="submit" name="submit" class="btn brand z-depth-0">   
</div>
</form>
</section>
<?php include('templates/footer.php'); ?>
</body>
</html>
