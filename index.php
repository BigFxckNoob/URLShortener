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
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">

  <link rel="manifest" href="site.webmanifest">
  <meta name="theme-color" content="#fafafa">
</head>

<body>
    <div class="wrapper">
        <header>
            <a href="index.php">Sadcat's URL Shortener</a>
        </header>
        <form action="/app/shorten.php">
            <div class="form-container">
                <input class="inputclass" name="url" id="url" type="text" placeholder="Enter your url" required>
            </div>

            <!-- 
            <div class="form-container">
                <input type="text"placeholder="Enter short url">
            </div> 
            -->

            <input type="hidden" name="action" value="create">
            <input class="inputsubmit" type="submit" value="Shorten">

            <div class="result-container">
                <?php
                if (isset($_GET['short_url'])) {
                    echo '<input class="inputclass" type="text" value="' . $_GET['short_url'] . '" id="short-url" readonly> <label class="copyicon" onclick="copy();">📋</label>';
                }
                ?>
            </div>
        </form>

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
