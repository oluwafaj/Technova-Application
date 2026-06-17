<?php
$page_title = 'Work';
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/includes/header.php';
$b = BASE_PATH;

// [icon, accent-color, image (optional screenshot path or null), title, tags, cat, desc]
$projects = [
  ['fas fa-building-columns', '#3B6FE0', null, 'Infinite Bank v3.0',    ['PHP','MySQL','Bootstrap','PHPMailer'],  'fintech',    'A production digital banking platform with internal/external transfers, PIN security, admin panel, crypto flows, support tickets, and full audit logging.'],
  ['fas fa-house',            '#1E9E5A', null, 'Greycad Development',   ['PHP','PDO','Swiper','AOS'],             'realestate', 'Property listing and booking site for a Nigerian real estate company — Forest Green design system, SMTP enquiries, admin panel, and sample property data.'],
  ['fas fa-futbol',           '#D98E22', null, 'FootballIQ',             ['PHP','API-Football v3','JS'],           'tools',      'Match prediction system integrating the API-Football v3 API with weighted draw calculation logic and a clean results dashboard.'],
  ['fas fa-ship',             '#5B5BD6', null, 'SwiftReach',             ['PHP','MySQL','Quill'],                  'logistics',  'Shipping and tracking platform with receiver notifications, admin mail composer with Quill rich text, invoice builder, and draft system.'],
  ['fas fa-coins',            '#C9A227', null, 'Block-Trust',            ['PHP','JS','Dark UI'],                   'fintech',    'Crypto investment and copy-trading platform with dark navy UI, admin wallet editor, and multi-level user portfolio management.'],
  ['fas fa-guitar',           '#E0635B', null, 'Nate Smith Artist Site', ['PHP','Bootstrap','Admin Panel'],        'creative',   'Full artist website with VIP booking, tour date manager, media section, and a purpose-built admin dashboard for live content control.'],
  ['fas fa-wheat-awn',        '#3FA16A', null, 'FarmFlow',               ['PHP','MySQL','PHPMailer'],              'tools',      'Farm management system with live search, Bootstrap Icons, PHPMailer SMTP, Bootstrap dashboard, and file-based login rate limiting.'],
  ['fas fa-credit-card',      '#4569E0', null, 'JethPay',                ['PHP','GitHub','Bootstrap'],             'fintech',    'Digital payments platform — airtime purchase, email verification, constants-based config, and full Git deployment workflow to live hosting.'],
  ['fas fa-microphone',       '#D14E91', null, 'Ricardo Montaner Site',  ['PHP','Bootstrap','PDF Tickets'],        'creative',   'Private concert website for Latin artist Ricardo Montaner — multi-venue selector, VIP PDF ticket generation, Getty embeds, and Spanish-language form flow.'],
];
?>

<section class="page-banner">
  <div class="wrap">
    <div class="page-banner-inner">
      <span class="eyebrow">Portfolio</span>
      <h1 class="page-banner-title"><?= count($projects) ?> projects built<br>and shipped.</h1>
      <p class="page-banner-sub">From fintech platforms to real estate portals — every project is production-ready and deployed to live hosting.</p>
    </div>
  </div>
</section>

<section class="portfolio-section">
  <div class="wrap">

    <div class="filter-bar">
      <button class="filter-btn active" data-filter="all">All</button>
      <button class="filter-btn" data-filter="fintech">Fintech</button>
      <button class="filter-btn" data-filter="realestate">Real Estate</button>
      <button class="filter-btn" data-filter="logistics">Logistics</button>
      <button class="filter-btn" data-filter="creative">Creative</button>
      <button class="filter-btn" data-filter="tools">Tools</button>
    </div>

    <div class="proj-grid">
      <?php foreach ($projects as [$icon, $accent, $img, $title, $tags, $cat, $desc]): ?>
      <div class="proj-card reveal" data-cat="<?= $cat ?>">
        <div class="proj-thumb-lg" style="background:linear-gradient(135deg, <?= $accent ?>1A, <?= $accent ?>0A)">
          <?php if ($img): ?>
            <img src="<?= $b . $img ?>" alt="<?= $title ?>" class="proj-thumb-img">
          <?php else: ?>
            <i class="<?= $icon ?>" style="color:<?= $accent ?>"></i>
          <?php endif; ?>
        </div>
        <div class="proj-body">
          <div class="proj-tags">
            <?php foreach ($tags as $t): ?><span class="proj-tag"><?= $t ?></span><?php endforeach; ?>
          </div>
          <div class="proj-title"><?= $title ?></div>
          <p class="proj-desc"><?= $desc ?></p>
          <div class="proj-links">
            <a href="#" class="proj-link"><i class="fas fa-external-link-alt"></i> Live Demo</a>
            <a href="#" class="proj-link"><i class="fab fa-github"></i> Source</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- CTA -->
<section class="cta-strip" style="padding-top:0">
  <div class="wrap">
    <div class="cta-box reveal">
      <div>
        <h2 class="cta-title">Yours could be next.</h2>
        <p class="cta-sub">I'm open to new freelance projects and long-term collaborations.</p>
      </div>
      <div class="cta-actions">
        <a href="<?= $b ?>/pages/contact.php" class="btn btn-primary btn-lg"><i class="fas fa-paper-plane"></i> Start a Project</a>
      </div>
    </div>
  </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>