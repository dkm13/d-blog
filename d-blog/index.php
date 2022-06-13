<?php 
  $mysqli = new mysqli("localhost", "root", "", "blog");
  $con = mysqli_connect('localhost','root', '', 'blog');
  $sql =  "SELECT * FROM `articles`";
  $articles = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"/>
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

  <h3>Blog articles</h3>

  <!-- display blogs -->
  <div class="container">
    <div class="articles">
        <?php 
            while($blog = mysqli_fetch_assoc($articles)):
        ?>
        <div class="article">
            <h3><?= $blog['title'];?></h3>
            <p><b><?php 
              $desc = $blog['description'];
              for ($x = 0; $x < 90; $x++){
                echo "$desc[$x]";
              }
              echo "  ... .... ";
            ?></b></p>
            <!-- <p><b> <?=$blog['description']; ?></b></p> -->
            <a href="article.php?id=<?= $blog['id'] ?>" class="btn btn-info">View full</a>
        </div>
          <?php endwhile; ?>
    </div>
</div>
</body>
</html>