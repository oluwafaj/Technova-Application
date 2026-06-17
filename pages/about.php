<?php
$page_title = 'About';
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/includes/header.php';
$b = BASE_PATH;
?>

<section class="page-banner">
  <div class="wrap">
    <div class="page-banner-inner">
      <span class="eyebrow">About me</span>
      <h1 class="page-banner-title">Developer, builder,<br>problem-solver.</h1>
      <p class="page-banner-sub">I turn business requirements into reliable, well-crafted web software. Here's a bit about who I am and how I work.</p>
    </div>
  </div>
</section>

<!-- ══ ABOUT GRID ═════════════════════════════════ -->
<section class="about-section">
  <div class="wrap">
    <div class="about-grid">

      <!-- Aside -->
      <div class="about-aside reveal">
        <div class="about-profile-card">
          <div class="about-profile-top"></div>
          <div class="about-avatar"><?= SITE_INITIALS ?></div>
          <div class="about-profile-body">
            <div class="about-profile-name"><?= SITE_NAME ?></div>
            <div class="about-profile-role"><?= SITE_ROLE ?></div>
            <div class="about-facts">
              <div class="fact-row"><i class="fas fa-map-marker-alt"></i><span class="fact-k">Based in</span><span class="fact-v"><?= SITE_LOCATION ?></span></div>
              <div class="fact-row"><i class="fas fa-envelope"></i><span class="fact-k">Email</span><span class="fact-v" style="word-break:break-all"><?= SITE_EMAIL ?></span></div>
              <div class="fact-row"><i class="fas fa-briefcase"></i><span class="fact-k">Status</span><span class="fact-v" style="color:var(--blue)">Open to work</span></div>
              <div class="fact-row"><i class="fas fa-clock"></i><span class="fact-k">Reply</span><span class="fact-v">Within 24h</span></div>
              <div class="fact-row"><i class="fas fa-language"></i><span class="fact-k">Speaks</span><span class="fact-v">English, Yoruba</span></div>
            </div>
          </div>
        </div>
        <div class="about-actions">
          <a href="<?= $b ?>/pages/contact.php" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Get in Touch</a>
          <a href="#" class="btn btn-ghost"><i class="fas fa-download"></i> Download CV</a>
        </div>
      </div>

      <!-- Main -->
      <div class="about-main">
        <div class="reveal">
          <span class="eyebrow">Background</span>
          <h2>I build things that work in the real world.</h2>
          <p>I'm <?= SITE_NAME ?>, a full-stack web developer with 5+ years of experience shipping production-grade web applications. My core stack is PHP, MySQL, Bootstrap 5, and vanilla JavaScript — but I'm comfortable with any toolchain a project needs.</p>
          <p>I've built fintech banking platforms, logistics tracking systems, real estate portals, admin dashboards, and artist websites — all production-ready and deployed to live hosting. Every project gets clean code, proper security, and careful attention to the user experience.</p>
          <p>I'm based in Lagos, Nigeria and work with clients locally and internationally. I care about deadlines, clear communication, and delivering exactly what was agreed — no surprises.</p>
        </div>

        <!-- Skills -->
        <div style="margin-top:48px" class="reveal">
          <span class="eyebrow">Skills</span>
          <h2 style="font-family:var(--font-disp);font-size:1.3rem;font-weight:700;color:var(--navy);margin-bottom:20px;letter-spacing:-.01em">Technical proficiency</h2>
          <div class="skill-list">
            <?php
            $skills = [
              ['PHP / MySQL',         92],
              ['Bootstrap 5 / CSS3',  90],
              ['JavaScript / jQuery', 85],
              ['RESTful APIs',         82],
              ['Git & Deployment',    80],
              ['PHPMailer / SMTP',    78],
            ];
            foreach ($skills as [$name, $pct]):
            ?>
            <div class="skill-item">
              <div class="skill-head">
                <span><?= $name ?></span>
                <span class="skill-pct"><?= $pct ?>%</span>
              </div>
              <div class="skill-track">
                <div class="skill-fill" data-w="<?= $pct ?>"></div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Timeline -->
        <div style="margin-top:52px" class="reveal">
          <span class="eyebrow">Experience</span>
          <h2 style="font-family:var(--font-disp);font-size:1.3rem;font-weight:700;color:var(--navy);margin-bottom:28px;letter-spacing:-.01em">Work history</h2>
          <div class="timeline">
            <?php
            $tl = [
              ['2022 – Present', 'Senior Full-Stack Developer', 'Freelance / Self-Employed'],
              ['2020 – 2022',    'Web Developer',               'TechSolutions Ltd, Lagos'],
              ['2019 – 2020',    'Junior PHP Developer',        'WebWorks Agency'],
              ['2018',           'Computer Science Graduate',   'University of Lagos'],
            ];
            foreach ($tl as [$yr, $role, $co]):
            ?>
            <div class="tl-item">
              <div class="tl-line"><div class="tl-dot"></div></div>
              <div>
                <div class="tl-year"><?= $yr ?></div>
                <div class="tl-role"><?= $role ?></div>
                <div class="tl-co"><?= $co ?></div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ══ CTA ════════════════════════════════════════ -->
<section class="cta-strip">
  <div class="wrap">
    <div class="cta-box reveal">
      <div>
        <h2 class="cta-title">Ready to start something?</h2>
        <p class="cta-sub">Let's talk about your project — I'm available for freelance contracts.</p>
      </div>
      <div class="cta-actions">
        <a href="<?= $b ?>/pages/contact.php" class="btn btn-primary btn-lg"><i class="fas fa-paper-plane"></i> Contact Me</a>
        <a href="<?= $b ?>/pages/portfolio.php" class="btn btn-ghost btn-lg" style="color:rgba(255,255,255,.5);border-color:rgba(255,255,255,.15)">See My Work</a>
      </div>
    </div>
  </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
