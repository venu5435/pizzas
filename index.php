<?php

include('config/db_connect.php');

//write a query 
$sql = 'SELECT title, ingredients, id FROM pizzas';

//make  query and connect
$result = mysqli_query($conn, $sql);

//fetch results as rows in array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC ) ;

//free memory from result
mysqli_free_result($result);

//close connection
mysqli_close($conn);

//print_r($pizzas);

//print_r(explode(',', $pizzas[0]['ingredients']))

?>
<!DOCTYPE html>
<html lang="en">




<?php include('templates/header.php'); ?>

<h4 class = "center grey-text">Pizzas!</h4>
<div class="container">
    <div class="row">
        <?php foreach($pizzas as $pizza) { ?>

            <div class="col md3 s6">
                <div class="card z-depth-0">
                    <img src="img/pizza.png" class="pizza">
                 <div class="card-content center">
                 <h6><?php echo htmlspecialchars($pizza['title']);?></h6> 
                  <div><?php echo htmlspecialchars($pizza['ingredients']); ?></div> 
                  <ul class = 'ing'>
                    <?php foreach(explode(',', $pizza['ingredients']) as $ing) { ?>
                    <li><?php echo htmlspecialchars($ing); ?></li>
                 <?php   } ?>
                  </ul>
                 </div>
                 <div class="card-action right-align">
                    <a class="brand-text" href="details.php?id=<?php echo $pizza['id']?>">more info</a>
                 </div>
                  

                </div>
            </div>

        <?php } ?>

        <!-- <?php

        if(count($pizzas)> 3): ?>
        <p>There is one more pizza</p>
        <?php else: ?>
            <p>There are two more</p>

            <?php endif; ?> -->




    </div>
</div>
       

<?php include('templates/footer.php'); ?>
   
</body>
</html>