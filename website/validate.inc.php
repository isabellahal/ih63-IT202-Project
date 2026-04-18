<?php

 error_log('$_POST ' . print_r($_POST, true));
 require_once('database.php');
 $emailAddress = $_POST['email_address'];
 $password = $_POST['password'];
 if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
 $query = "SELECT first_name, last_name, pronouns, phone_number FROM candles_users " .
        "WHERE email_address = ? AND password = SHA2(?,256)";

 $db = getDB();
 $stmt = $db->prepare($query);
 $stmt->bind_param("ss", $emailAddress, $password);
 $stmt->execute();

 $stmt->bind_result($firstName, $lastName, $pronouns, $phoneNumber);
 $fetched = $stmt->fetch();

 $stmt->close();
 $db->close();

  $name = "$firstName $lastName";

 if ($fetched) {
  $_SESSION['login'] = true;
  $_SESSION['emailAddress'] = $emailAddress;
  $_SESSION['firstName'] = $firstName;
  $_SESSION['lastName'] = $lastName;
  $_SESSION['pronouns'] = $pronouns;
  $_SESSION['phoneNumber'] = $phoneNumber;

   header("Location: index.php");
 } else {
   echo "<h2>Sorry, login incorrect</h2>\n";
   echo "<a href=\"index.php\">Please try again</a>\n";
 }
 } else {
   echo "<h2>Please enter a valid email address</h2>\n";
   echo '<a href="index.php">Please try again</a>';
 }
?>