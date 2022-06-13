<?php 

// logout 
if(isset($_COOKIE['is_logged_in'])) {
    if(isset($_COOKIE['user_email'])) {
    }
} else {
    header("Location: login.php");
}

if(isset($_GET['action'])) {
    if($_GET['action'] === "logout") {
        # delete sessions
        unset($_SESSION['user_email']);
        unset($_SESSION['is_logged_in']);
        session_destroy();

        # delete cookies
        setcookie("user_email", null, -1);
        setcookie("is_logged_in", null, -1);

        header("Location: login.php");
    }
}


  $mysqli = new mysqli("localhost", "root", "", "blog");
  $con = mysqli_connect('localhost','root', '', 'blog');
  $sql =  "SELECT * FROM `articles`";
  $articles = $con->query($sql);


//   create
if(isset($_POST['add_btn'])){
   $title = $_POST['title'];
   $description = $_POST['description'];
       $sql = "INSERT INTO `articles` (`id`, `title`, `description`) VALUES (NULL,'$title','$description')";
       if($mysqli->query($sql)) {
          header("location: home.php");
       }else{
           echo "something went wrong";
       }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css"/>
    <title>Document</title>

    <style>
         form {
            width: 40%;
            margin: auto;
         }
         input, textarea, button{
            margin: 5px;
         }
         @media screen and (max-width: 600px) {
            form{
               width: 90%;
            }
         }
    </style>

</head>
<body class="text-center">
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <img style="width: 70px;" src="../images/logo1.png" alt="logo" />
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
        </ul>
        </div>
        <!-- <a class="btn btn-success" href="add-new.php" role="button" style="margin-right: 6px;">Add new</a> -->
        <a class="btn btn-outline-primary" href="?action=logout" role="button">Logout</a>
    </div>
    </nav>


    <!-- blogs -->
    <h3>Add new blog</h3>

  <!-- add form -->
  <main class="form-signin w-100 m-auto">
  <form method="POST">

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="title" placeholder="Title">
      <label for="floatingInput">Title</label>
    </div>
    <div class="form-floating">
    <textarea class="form-control" name="description" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
      <label for="floatingTextarea2">Description</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="add_btn" type="submit">Add</button>
</form>
</main>

</body>
</html>