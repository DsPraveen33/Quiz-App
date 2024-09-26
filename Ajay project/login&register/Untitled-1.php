<?php
 if (isset($_POST['login'])) {

 $email = $_POST['email'];
 $password = $_POST['password'];

 include 'dbCon.php';
 $con = connect();
 $emailSQL = "SELECT * FROM restaurant_info WHERE
email = '$email';";
 $passwordSQL = "SELECT * FROM restaurant_info WHERE
email = '$email' And password = '$password';";
 $emailResult = $con->query($emailSQL);
 $passwordResult = $con->query($passwordSQL);
 if ($emailResult->num_rows <= 0) {
 echo '<script>alert("This Email Does Not Exist.")</script>';
 echo '<script>window.location="login.php"</script>';
 }else if ($passwordResult->num_rows <= 0) {
 echo '<script>alert("This Password is Incorrect.")</script>';
 echo '<script>window.location="login.php"</script>';
 }else{
 $_SESSION['isLoggedIn'] = TRUE;
 // $SQL = "SELECT * FROM restaurant_info WHERE email
= '$email' And password = '$password' AND
approve_status=1";
 $SQL = "SELECT * FROM restaurant_info WHERE email 
= '$email' And password = '$password'";
 $result = $con->query($SQL);
 foreach ($result as $r) {
 $_SESSION['id'] = $r['id'];
 $_SESSION['name'] = $r['restaurent_name']
 $_SESSION['phone'] = $r['phone'];
 $_SESSION['email'] = $r['email'];
 $_SESSION['password'] = $r['password'];
 $_SESSION['role'] = $r['role'];
}