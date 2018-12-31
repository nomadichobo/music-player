<?php 
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");

  $account = new Account();

  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");

  function getInputValue($name) {
    if(isset($_POST[$name])){
      echo $_POST[$name];
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>music-player registration</title>
</head>
<body>
  <div id="inputContainer">
    <form action="register.php" id="loginForm" method="POST">
      <h2>Login to your account</h2>
      <p>
        <label for="loginUsername">Username</label>
        <input type="text" name="loginUsername" id="loginUsername" placeholder="e.g. bartSimpson" required>
      </p>
      <p>
        <label for="loginPassword">Password</label>
        <input type="password" name="loginPassword" id="loginPassword" placeholder="Your Password" required>
      </p>

      <button type="submit" name="loginButton">Login</button>
    </form>

    <form action="register.php" id="registerForm" method="POST">
      <h2>Create your free account</h2>
      <p>
        <?php echo $account->getError(Constants::$usernameLength); ?>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="e.g. bartSimpson" value="<?php getInputValue('username'); ?>" required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$firstNameLength); ?>
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" placeholder="e.g. Bart" value="<?php getInputValue('firstName'); ?>" required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$lastNameLength); ?>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" placeholder="e.g. Simpson" value="<?php getInputValue('lastName'); ?>" required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$emailDoNotMatch); ?>
        <?php echo $account->getError(Constants::$emailInvalid); ?>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="e.g. bart@simpsons.com" value="<?php getInputValue('email'); ?>" required>
      </p>
      <p>
        <label for="email2">Confirm email</label>
        <input type="email" name="email2" id="email2" placeholder="e.g. bartSimpson" value="<?php getInputValue('email2'); ?>" required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
        <?php echo $account->getError(Constants::$passwordNotAlphaNumeric); ?>
        <?php echo $account->getError(Constants::$passwordLength); ?>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Your Password" required>
      </p>
      <p>
        <label for="password2">Confirm Password</label>
        <input type="password" name="password2" id="password2" placeholder="Your Password" required>
      </p>

      <button type="submit" name="registerButton">Register</button>
    </form>
  </div>
</body>
</html>