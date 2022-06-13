<?php 
session_start();

if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];
    if( isset($email) && !empty($email) && isset($pass) && !empty($pass)){
         if($email === "john@gmail.com"){
            if($pass == 1234){
                $_SESSION['user_email'] = $email;
                $_SESSION['is_logged_in'] = true;
                setcookie("user_email", $_SESSION['user_email'], time()+600);
                setcookie("is_logged_in", $_SESSION['is_logged_in'], time()+600);
                header("location: home.php");
            }
            else{
              echo "password is wrong!";
             }
        }
    else{
        echo "wrong email address!";
        }
    }
    else{
        echo "please fill all the fields";
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
    <title>Login page</title>
    <style>
        html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
</head>


<body class="text-center">
<a href="../index.php">Return to home page</a>

<main class="form-signin w-100 m-auto">
  <form method="POST">
    <h1 class="h2 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
</form>
<p>The correct email is: <b>john@gmail.com</b> and passcode: <b>1234</b>.
    These credentials are only for testing purposes
</p>
</main>

</body>
</html>