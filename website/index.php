<?php
ob_start();
session_start();
require_once("config.php");
require_once("candlestype.php");
require_once("candles.php");
?>
<!DOCTYPE html>
<html>
<head>
   <title>Inventory Helper</title>
   <link rel="stylesheet" type="text/css" href="ih_styles.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <script src="realtime.js"></script>
</head>
<body>
   <header>
       <?php include("header.inc.php"); ?>
   </header>
   <section style="height: 425px;">
       <nav>
           <?php include("nav.inc.php"); ?>
       </nav>
       <main>
           <?php
           if (isset($_REQUEST['content'])) {
               include($_REQUEST['content'] . ".inc.php");
           } else {
               include("main.inc.php");
           }
           ?>
       </main>
       <?php if (isset($_SESSION['login'])) { ?>
    <aside>
    <?php include("aside.inc.php"); ?>
    <script>
        getRealTime();
        setInterval(getRealTime, 5000);
    </script>
</aside>
<?php } ?>
   </section>
   <footer>
       <?php include("footer.inc.php"); ?>
   </footer>
</body>
</html>
<?php
ob_end_flush();
?>