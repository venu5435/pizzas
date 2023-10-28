<?php
include('config/db_connect.php');

if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
         header('Location: index.php');
    } {
        echo 'query error'. mysqli_error($conn);
 }
}

// Check Get id
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Make SQL
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // Get query result
    $result = mysqli_query($conn, $sql);

    // Fetch results in associative array
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

    //print_r($pizza);
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<h2>Details</h2>

<div class="container center">
<?php if($pizza):  ?>
    <h4> <?php echo htmlspecialchars($pizza['title']); ?></h4>
    <h3> created by <?php echo htmlspecialchars($pizza['email']); ?></h3>
    <p> <?php echo date($pizza['created_at']); ?></p>
    <h5>Ingredients</h5>
    <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

<!-- Delete form -->
<form action="details.php" method="POST">
    <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
    <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">

</form>

</div>
<?php else: ?>
    <?php endif; ?>
  
<?php include('templates/footer.php'); ?>

</html>
