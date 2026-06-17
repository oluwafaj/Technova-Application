<?php $b = BASE_PATH; ?>
<footer class="site-footer">
  <div class="wrap ft-inner">
    <div class="ft-left">
      <a href="<?= $b ?>/index.php" class="ft-logo"><?= SITE_NAME ?><span>.</span></a>
      <p><?= SITE_ROLE ?> · <?= SITE_LOCATION ?></p>
    </div>
    <nav class="ft-links" aria-label="Footer navigation">
      <a href="<?= $b ?>/index.php">Home</a>
      <a href="<?= $b ?>/pages/about.php">About</a>
      <a href="<?= $b ?>/pages/portfolio.php">Work</a>
      <a href="<?= $b ?>/pages/contact.php">Contact</a>
    </nav>
    <div class="ft-socials">
      <a href="<?= SITE_GITHUB ?>"   target="_blank" rel="noopener" aria-label="GitHub"><i class="fab fa-github"></i></a>
      <a href="<?= SITE_LINKEDIN ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
      <a href="<?= SITE_TWITTER ?>"  target="_blank" rel="noopener" aria-label="X / Twitter"><i class="fab fa-x-twitter"></i></a>
      <a href="mailto:<?= SITE_EMAIL ?>" aria-label="Email"><i class="fas fa-envelope"></i></a>
    </div>
  </div>
  <div class="wrap ft-bottom">
    <span>&copy; <?= date('Y') ?> <?= SITE_NAME ?>. All rights reserved.</span>
    <a href="<?= $b ?>/admin/">Admin</a>
  </div>
</footer>

<script src="<?= $b ?>/assets/js/main.js"></script>
</body>
</html>
