<?php
$mysqli = new mysqli("localhost", "root", "", "blog");
$con = mysqli_connect('localhost','root', '', 'blog');
$id = $_GET['id'];
$sql = "SELECT * FROM `articles` WHERE id='$id'";
$articles = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="articles.css"/>
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <img style="width: 70px;" src="./images/logo1.png" alt="logo" />
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About us</a>
        </li>
      </ul>
    </div>
    <a class="btn btn-success" href="admin-log/login.php" role="button" style="margin-right: 6px;">Login</a>
    <a class="btn btn-outline-primary" href="#" role="button">Register</a>
  </div>
</nav>

<!-- <div class="col-md-2"></div> -->
    <h2 class="text-center">Article details: </h2>
    <hr style="width: 80%; margin: 10px auto;">
    <div class="container">
        <?php 
            while($article = mysqli_fetch_assoc($articles)):
        ?>
        <div class="article">
            <h2><b>Title:</b> <span><?= $article['title'] ?></span></h2>
            <p class="desc"><b>Description</b>: <?=$article['description']; ?></p>
        </div>
          <?php endwhile; ?>
    </div>
</body>
</html>