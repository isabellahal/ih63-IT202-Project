<?php

unset($_SESSION['login']);
unset($_SESSION['emailAddress']);
unset($_SESSION['firstName']);
unset($_SESSION['lastName']);
unset($_SESSION['pronouns']);
unset($_SESSION['phoneNumber']);

header("Location: index.php");
exit;
?>