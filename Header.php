<?php 

session_start(); 

//overriding the super global variable
//$_SESSION['name'] = 'Tunga'; 
if($_SERVER['QUERY_STRING'] == 'noname'){
    unset($_SESSION['name']); //Deleting the session variable
    //session_unset();

}

 

    

$name = $_SESSION['name'] ?? 'Guest'; //default value as guest - Null Coalescing operator

$gender = $_COOKIE['gender'] ?? 'unknown';   //set Cookie


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Ninja Pizza</title>

    <style>
        .brand{
            background-color: #cbb09c; !important
          
        }

        .brand-text{

            color: #303030;
        }

        a{
            color: #303030;
        }

        form{
            margin: 20px auto;
            padding: 20px;
            
        }
        .pizza{
            width:120px;
            position: relative;
            top:-50px;
            margin: 40px auto -30px;
            display:block;
        }

     
    </style>
</head>
<body class = "grey lighten-4">

<nav class="white z-depth-0">
    <div class="container">
        <a href="index.php" class="left brand brand-logo">Ninja Pizzas</a>
        <ul id="nav-mobile" class="right">
            <li class="grey-text"> Hello! <?php echo htmlspecialchars($name); ?></li>
            <li class="grey-text">(<?php echo htmlspecialchars($gender);?>)</li>
            <li><a href="add.php" class="btn brand  z-depth-0">Add a Pizza</a></li>
        </ul>
    </div>
</nav>