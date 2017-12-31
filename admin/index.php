<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="css/alogin/css/style.css">

  
</head>

<body>
  <div class="login-container">
  <section class="login" id="login">
    <header>
      <h2>Welcome Admin</h2>
      <h4>Please Login!</h4>
    </header>
    <form class="login-form" action="alogin.php" method="post">
      <input type="text" class="login-input" placeholder="User Name" name="username" required autofocus/>
      <input type="password" class="login-input" placeholder="Password" name="password" required/>
      <div class="submit-container">
        <button type="submit" class="login-button">SIGN IN</button>
      </div>
    </form>
  </section>
  <p>2017 - <a href="https://www.facebook.com/eBooks">eBook Store</a></p>
</div>
<!--<button id="e1">Login error!</button>
  
    <script  src="css/alogin/js/index.js"></script>

</body>
</html>
