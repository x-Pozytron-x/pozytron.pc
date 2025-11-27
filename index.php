<?php

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

require_once("core/functions.php");
require_once("core/db_connect.php");
require_once("core/Db.php");
require_once("core/Translation.php");

$db = new Database();

$info = get_data("SELECT * FROM pozytron_info");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="Portfolio webového vývojáře Vitalii Stetsenko: front-end, React, JavaScript, PHP, moderní projekty, zkušenosti a kontaktní formulář. Kreativní vývojář s 9+ lety zkušeností.">
  <meta name="keywords" content="frontend developer, web developer, portfolio, React, JavaScript, PHP, HTML, CSS, vývoj webu, České Budějovice, Vitalii Stetsenko">
  <meta name="author" content="Vitalii Stetsenko">
  
  <meta property="og:title" content="Portfolio – Vitalii Stetsenko | Front-End Developer">
  <meta property="og:description" content="Front-end vývojář s 9+ lety zkušeností. Moderní webové projekty, technologie, zkušenosti a kontaktní formulář.">
  <meta property="og:type" content="website">
  <meta property="og:image" content="./assets/img/preview-image.jpg"> 
  <meta property="og:url" content="https://pozytron.dev">
  
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Portfolio – Vitalii Stetsenko">
  <meta name="twitter:description" content="Front-end vývojář s 9+ lety praxe. Prohlédněte si moje projekty a technologický stack.">
  <meta name="twitter:image" content="./assets/img/preview-image.jpg">

  <title><?= $info[0]["name"] ?> - <?= $info[0]["position"] ?></title>

  <link rel="icon" href="favicon.svg" sizes="any" type="image/svg+xml">

  <?include_once 'templates/_headStyle.php';?>

  <link rel="stylesheet" href="assets/css/styles.css" media="print" onload="this.media='all'">
  <noscript><link rel="stylesheet" href="assets/css/styles.css"></noscript>


  <!-- <link rel="preload" href="assets/css/styles.css" as="style">
  <link rel="stylesheet" href="assets/css/styles.css"> -->
</head>

<body>
  <?include_once 'templates/_Header.php';?>

  <main class="main">
    <?include_once 'templates/_Banner.php';?>
    <?include_once 'templates/_Achievements.php';?>

    <div class="columns">

      <div class="columns__left">
        <?include_once 'templates/_About.php';?>
        <?include_once 'templates/_Projects.php';?>
      </div>

      <div class="columns__right">
        <?include_once 'templates/_Skill.php';?>
        <?include_once 'templates/_Experience.php';?>
      </div>
    </div>


  </main>
  <?include_once 'templates/_Footer.php';?>

</body>

</html>