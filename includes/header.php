<?php
if (!defined('SITE_NAME')) require_once dirname(__DIR__) . '/config.php';
$current = basename($_SERVER['PHP_SELF']);
$b = BASE_PATH; // shorthand, e.g. "" on root, "/portfolio_v2" on subfolder
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= SITE_NAME ?> — <?= SITE_ROLE ?>. <?= SITE_TAGLINE ?>">
  <title><?= isset($page_title) ? htmlspecialchars($page_title) . ' · ' . SITE_NAME : SITE_NAME . ' · ' . SITE_ROLE ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="<?= $b ?>/assets/css/style.css">
</head>
<body>

<header class="site-header" id="site-header">
  <div class="hd-inner">

    <a href="<?= $b ?>/index.php" class="hd-logo">
      <span class="hd-logo-mark"><?= SITE_INITIALS ?></span>
      <span class="hd-logo-name"><?= SITE_NAME ?></span>
    </a>

    <nav class="hd-nav" id="hd-nav" aria-label="Main navigation">
      <a href="<?= $b ?>/index.php"           class="<?= $current === 'index.php'     ? 'nav-active' : '' ?>">Home</a>
      <a href="<?= $b ?>/pages/about.php"     class="<?= $current === 'about.php'     ? 'nav-active' : '' ?>">About</a>
      <a href="<?= $b ?>/pages/portfolio.php" class="<?= $current === 'portfolio.php' ? 'nav-active' : '' ?>">Work</a>
      <a href="<?= $b ?>/pages/contact.php"   class="<?= $current === 'contact.php'   ? 'nav-active' : '' ?>">Contact</a>
    </nav>

    <a href="<?= $b ?>/pages/contact.php" class="hd-cta">Hire Me <i class="fas fa-arrow-right"></i></a>

    <button class="hd-burger" id="hd-burger" aria-label="Toggle navigation" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

  </div>
</header>

<div class="mobile-nav" id="mobile-nav" aria-hidden="true">
  <a href="<?= $b ?>/index.php"           class="<?= $current === 'index.php'     ? 'nav-active' : '' ?>">Home</a>
  <a href="<?= $b ?>/pages/about.php"     class="<?= $current === 'about.php'     ? 'nav-active' : '' ?>">About</a>
  <a href="<?= $b ?>/pages/portfolio.php" class="<?= $current === 'portfolio.php' ? 'nav-active' : '' ?>">Work</a>
  <a href="<?= $b ?>/pages/contact.php"   class="<?= $current === 'contact.php'   ? 'nav-active' : '' ?>">Contact</a>
</div>
