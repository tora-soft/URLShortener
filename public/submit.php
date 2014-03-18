<?php
require_once "../include/config.php";
require_once "../include/ShortUrl.php";

if ($_SERVER["REQUEST_METHOD"] != "POST" || empty($_POST["url"])) {
    header("Location: shorten.html");
    exit;
} 

try {
    $pdo = new PDO(DB_PDODRIVER . ":host=" . DB_HOST . ";dbname=" . DB_DATABASE,
        DB_USERNAME, DB_PASSWORD);
}
catch (\PDOException $e) {
    header("Location: error.php");
    exit;
}

$shortUrl = new ShortUrl($pdo);
try {
    $code = $shortUrl->urlToShortCode($_POST["url"]);
}
catch (\Exception $e) {
    header("Location: error.php");
    exit;
}
$url = SHORTURL_PREFIX . $code;

?>
<!DOCTYPE html>
<html>
<head>

  <title>URL Shortener</title>
  <?php include('header.php'); ?>
  <style type="text/css">
  input{
    color: black;
  }
  #mastfoot{
    margin-left: auto;
    margin-right: auto;
  }

  </style>
</head>
<body>

  <div class="site-wrapper">

    <div class="site-wrapper-inner">

      <div class="cover-container">

        <?php include('navigation.php'); ?>
        
        <div class="inner cover">
            <h1 class="cover-heading">Short URL:</h1>
            <code><?php echo $url; ?></code>

            <p class="lead">This is a simple URL Shortener service.</p>

        </div>



      </div>

      </div>

  </div>

    <div class="mastfoot">
    <div class="inner">
        <p>URL Shortener for <a href="http://tora-soft.com">Tora Soft</a>, by <a href="https://twitter.com/federicogiust">@federicogiust</a>.</p>
    </div>
    </div>

  <?php include('footer.php'); ?>
</body>
</html>




