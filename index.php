<?php require_once 'config.php'; require_once 'includes/header.php'; $b = BASE_PATH; ?>

<!-- ══ HERO ══════════════════════════════════════ -->
<section class="hero">
  <div class="wrap">
    <div class="hero-inner">

      <div class="hero-content">
        <?php if (SITE_AVAILABLE): ?>
        <div class="avail-badge reveal">
          <span class="avail-dot"></span> Available for new projects
        </div>
        <?php endif; ?>

        <h1 class="hero-title reveal">
          I design &amp; build<br>
          web products that<br>
          <em>actually ship.</em>
        </h1>

        <p class="hero-desc reveal"><?= SITE_TAGLINE ?></p>

        <div class="hero-actions reveal">
          <a href="<?= $b ?>/pages/portfolio.php" class="btn btn-primary btn-lg">
            View My Work <i class="fas fa-arrow-right"></i>
          </a>
          <a href="<?= $b ?>/pages/contact.php" class="btn btn-ghost btn-lg">
            Get in Touch
          </a>
        </div>

        <div class="hero-scroll reveal">
          <span class="hero-scroll-line"></span>
          Scroll to explore
        </div>
      </div>

      <!-- Profile card -->
      <div class="hero-card reveal">
        <div class="hero-card-top"></div>
        <div class="hero-avatar"><?= SITE_INITIALS ?></div>
        <div class="hero-card-body">
          <div class="hero-card-name"><?= SITE_NAME ?></div>
          <div class="hero-card-role"><?= SITE_ROLE ?></div>
          <div style="font-size:.75rem;color:var(--text-3);display:flex;align-items:center;gap:6px;justify-content:center">
            <i class="fas fa-map-marker-alt" style="color:var(--blue);font-size:.65rem"></i>
            <?= SITE_LOCATION ?>
          </div>
          <div class="hero-card-stats">
            <div class="hero-card-stat">
              <div class="hero-card-stat-n">30+</div>
              <div class="hero-card-stat-l">Projects</div>
            </div>
            <div class="hero-card-stat">
              <div class="hero-card-stat-n">5yr</div>
              <div class="hero-card-stat-l">Experience</div>
            </div>
            <div class="hero-card-stat">
              <div class="hero-card-stat-n">20+</div>
              <div class="hero-card-stat-l">Clients</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ STACK ══════════════════════════════════════ -->
<section class="stack-section">
  <div class="wrap">
    <p class="stack-label">Tech stack</p>
    <div class="stack-chips">
      <?php
      $stack = [
        ['PHP 8',          'fab fa-php'],
        ['MySQL',          'fas fa-database'],
        ['JavaScript',     'fab fa-js'],
        ['Bootstrap 5',    'fab fa-bootstrap'],
        ['HTML5 / CSS3',   'fab fa-html5'],
        ['REST APIs',      'fas fa-plug'],
        ['Git & GitHub',   'fab fa-git-alt'],
        ['PHPMailer',      'fas fa-envelope'],
        ['jQuery',         'fas fa-code'],
        ['XAMPP / Linux',  'fab fa-linux'],
      ];
      foreach ($stack as [$n, $i]):
      ?>
      <span class="chip"><i class="<?= $i ?>"></i><?= $n ?></span>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ SERVICES ═══════════════════════════════════ -->
<section class="services-section">
  <div class="wrap">
    <span class="eyebrow">What I do</span>
    <h2 class="s-title">Services</h2>
    <p class="s-sub">End-to-end development — from architecture and design to deployment and maintenance.</p>

    <div class="services-grid">
      <?php
      $svcs = [
        ['fas fa-server',         'Backend Development',   'Robust PHP applications, RESTful APIs, PDO/MySQL architecture, and secure server-side logic.'],
        ['fas fa-desktop',        'Frontend Interfaces',   'Pixel-perfect, responsive UIs with Bootstrap 5, vanilla JS, and smooth interactions.'],
        ['fas fa-university',     'Fintech Platforms',     'Banking systems, payment flows, crypto dashboards, PIN security, and audit logging.'],
        ['fas fa-home',           'Real Estate Portals',   'Property listings, booking engines, admin dashboards, and PHPMailer-powered enquiry flows.'],
        ['fas fa-chart-bar',      'Admin Dashboards',      'Data-rich control panels with Chart.js visualisations, user management, and role-based access.'],
        ['fas fa-rocket',         'Deploy & Maintain',     'Full deployment from cPanel/XAMPP to live hosting, plus ongoing support and updates.'],
      ];
      foreach ($svcs as $k => [$icon, $title, $desc]):
      ?>
      <div class="svc-card reveal">
        <div class="svc-num">0<?= $k+1 ?></div>
        <div class="svc-icon"><i class="<?= $icon ?>"></i></div>
        <h3 class="svc-title"><?= $title ?></h3>
        <p class="svc-desc"><?= $desc ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ FEATURED WORK ══════════════════════════════ -->
<section class="work-section">
  <div class="wrap">
    <div class="work-header">
      <div>
        <span class="eyebrow">Portfolio</span>
        <h2 class="s-title">Featured work</h2>
      </div>
      <a href="<?= $b ?>/pages/portfolio.php" class="btn btn-ghost">All Projects <i class="fas fa-arrow-right"></i></a>
    </div>

    <div class="project-list">
      <?php
      // [icon, accent-color, image (optional screenshot path or null), title, tags, desc]
      $featured = [
        ['fas fa-building-columns', '#3B6FE0', null, 'Infinite Bank v3.0',   ['PHP', 'MySQL', 'Bootstrap'],   'Full-stack digital banking platform — transfers, PIN auth, crypto flows, support tickets, audit logs.'],
        ['fas fa-house',            '#1E9E5A', null, 'Greycad Development',  ['PHP', 'PDO', 'PHPMailer'],     'Production real estate portal — property listings, bookings, admin panel, Forest Green design system.'],
        ['fas fa-futbol',           '#D98E22', null, 'FootballIQ',           ['PHP', 'API-Football', 'JS'],   'Match prediction engine integrating API-Football v3 with weighted draw calculation and results dashboard.'],
        ['fas fa-ship',             '#5B5BD6', null, 'SwiftReach Logistics', ['PHP', 'Quill', 'MySQL'],       'Shipping & tracking platform with receiver notifications, rich text mail composer, and invoice builder.'],
      ];
      foreach ($featured as [$icon, $accent, $img, $title, $tags, $desc]):
      ?>
      <a href="<?= $b ?>/pages/portfolio.php" class="project-row reveal">
        <div class="pr-thumb" style="background:linear-gradient(135deg, <?= $accent ?>1A, <?= $accent ?>0A)">
          <?php if ($img): ?>
            <img src="<?= $b . $img ?>" alt="<?= $title ?>" class="pr-thumb-img">
          <?php else: ?>
            <i class="<?= $icon ?>" style="color:<?= $accent ?>"></i>
          <?php endif; ?>
        </div>
        <div class="pr-body">
          <div class="pr-tags">
            <?php foreach ($tags as $t): ?><span class="pr-tag"><?= $t ?></span><?php endforeach; ?>
          </div>
          <div class="pr-title"><?= $title ?></div>
          <div class="pr-desc"><?= $desc ?></div>
        </div>
        <i class="fas fa-arrow-up-right-from-square pr-arrow"></i>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ CTA ════════════════════════════════════════ -->
<section class="cta-strip">
  <div class="wrap">
    <div class="cta-box reveal">
      <div>
        <p style="font-size:.75rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.4);margin-bottom:10px">Let's work together</p>
        <h2 class="cta-title">Have a project in mind?<br>Let's build it.</h2>
        <p class="cta-sub">Available for freelance contracts, long-term partnerships, and interesting challenges.</p>
      </div>
      <div class="cta-actions">
        <a href="<?= $b ?>/pages/contact.php" class="btn btn-primary btn-lg">
          <i class="fas fa-paper-plane"></i> Start a Conversation
        </a>
        <a href="mailto:<?= SITE_EMAIL ?>" class="btn btn-ghost btn-lg" style="color:rgba(255,255,255,.6);border-color:rgba(255,255,255,.15)">
          <?= SITE_EMAIL ?>
        </a>
      </div>
    </div>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>