<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Sadcat's URL Shortener</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="icon" href="/favicon.ico" sizes="any">
  <link rel="icon" href="/icon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="icon.png">

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">

  <link rel="manifest" href="site.webmanifest">
  <meta name="theme-color" content="#fafafa">
</head>

<body>
    <div class="wrapper">
        <form action="/app/shorten.php">
            <div class="form-container">
                <input name="url" id="url" type="text" placeholder="Enter your url" required>
            </div>

            <!-- 
            <div class="form-container">
                <input type="text"placeholder="Enter short url">
            </div> 
            -->

            <input type="hidden" name="action" value="create">
            <input type="submit" value="Shorten">
        </form>
    </div>

    <div class="wrapper">
        <div class="result-container">
            <?php
            if (isset($_GET['short_url'])) {
                echo '<input type="text" value="' . $_GET['short_url'] . '" id="short-url" readonly>';
            }
            ?>
        </div>
    </div>

    <div class="wrapper">
        <div class="result-container">
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "invalid_url") {
                    echo '<p class="error">Invalid URL</p>';
                }
            }
            ?>
        </div>
    </div>



    <script src="js/vendor/modernizr-3.12.0.min.js"></script>
    <script src="js/app.js"></script>

</body>

</html>
