<?php
session_start();

// inicializimi i variablave
$username = "";
$email    = "";
$errors = array(); 

// lidhja me databazën
$db = mysqli_connect('localhost','root','','registration');       

// REGJISTRIMI I PËRDORUESIT
if (isset($_POST['reg_user'])) {

  // marrja e të gjitha vlerave nga forma
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // validimi i formës: kontrollon nëse fushat janë plotësuar saktë
  // gabimet shtohen në array $errors
  if (empty($username)) { array_push($errors, "Username është i detyrueshëm"); }
  if (empty($email)) { array_push($errors, "Email është i detyrueshëm"); }
  if (empty($password_1)) { array_push($errors, "Password është i detyrueshëm"); }
  if ($password_1 != $password_2) {
    array_push($errors, "Fjalëkalimet nuk përputhen");
  }

  // kontrollon në databazë nëse ekziston përdorues me të njëjtin username ose email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // nëse përdoruesi ekziston
    if ($user['username'] === $username) {
      array_push($errors, "Username ekziston tashmë");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email ekziston tashmë");
    }
  }

  // regjistrimi i përdoruesit nëse nuk ka gabime
  if (count($errors) == 0) {

    // enkriptimi i password-it para ruajtjes në databazë
    $password =  md5($password_1);//https://md5decrypt.net/en/

    $query = "INSERT INTO users (username, email, password) 
              VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);

    // ruajtja e session-it
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Jeni kyçur me sukses";

    header('location: index.php');
  }
}

// ----------------------------
// KYÇJA E PËRDORUESIT (LOGIN)
if (isset($_POST['login_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // kontrollon nëse fushat janë bosh
  if (empty($username)) {
    array_push($errors, "Username është i detyrueshëm");
  }
  if (empty($password)) {
    array_push($errors, "Password është i detyrueshëm");
  }

  if (count($errors) == 0) {

    // enkriptimi i password-it për krahasim
    $password = md5($password);

    // kontrollon në databazë nëse të dhënat janë të sakta
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {

      // krijimi i session-it pas login-it të suksesshëm
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Jeni kyçur me sukses";
      header('location: index.php');

    } else {
      array_push($errors, "Username ose password i gabuar ose nuk ekziston");
    }
  }
}
?>
