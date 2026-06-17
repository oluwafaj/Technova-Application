<?php
$page_title = 'Contact';
require_once dirname(__DIR__) . '/config.php';
$b = BASE_PATH;

// ── AJAX handler ─────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    header('Content-Type: application/json');

    $name    = trim(strip_tags($_POST['name']    ?? ''));
    $email   = trim(strip_tags($_POST['email']   ?? ''));
    $subject = trim(strip_tags($_POST['subject'] ?? ''));
    $message = trim(strip_tags($_POST['message'] ?? ''));

    $errors = [];
    if (mb_strlen($name)    < 2)                            $errors[] = 'Please enter your full name.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))         $errors[] = 'Please enter a valid email address.';
    if (mb_strlen($subject) < 3)                            $errors[] = 'Please enter a subject.';
    if (mb_strlen($message) < 10)                           $errors[] = 'Message must be at least 10 characters.';

    if ($errors) {
        echo json_encode(['ok' => false, 'msg' => implode(' ', $errors)]);
        exit;
    }

    $ok = save_message([
        'id'        => uniqid('msg_', true),
        'name'      => $name,
        'email'     => $email,
        'subject'   => $subject,
        'message'   => $message,
        'ip'        => $_SERVER['REMOTE_ADDR'] ?? '',
        'timestamp' => date('Y-m-d H:i:s'),
        'read'      => false,
    ]);

    echo json_encode($ok
        ? ['ok' => true,  'msg' => 'Thank you! Your message has been received. I\'ll reply within 24 hours.']
        : ['ok' => false, 'msg' => 'Could not save your message. Please check data/ folder permissions (chmod 755).']
    );
    exit;
}

require_once dirname(__DIR__) . '/includes/header.php';
?>

<section class="page-banner">
  <div class="wrap">
    <div class="page-banner-inner">
      <span class="eyebrow">Get in touch</span>
      <h1 class="page-banner-title">Let's start a<br>conversation.</h1>
      <p class="page-banner-sub">Whether you have a brief, a budget, or just an idea — I'd love to hear about it. I reply within 24 hours.</p>
    </div>
  </div>
</section>

<section class="contact-section">
  <div class="wrap">
    <div class="contact-grid">

      <!-- Info -->
      <div class="reveal">
        <div class="contact-items">
          <div class="ci-row">
            <div class="ci-icon"><i class="fas fa-envelope"></i></div>
            <div>
              <div class="ci-label">Email</div>
              <div class="ci-value"><a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></div>
            </div>
          </div>
          <div class="ci-row">
            <div class="ci-icon"><i class="fas fa-phone"></i></div>
            <div>
              <div class="ci-label">Phone</div>
              <div class="ci-value"><?= SITE_PHONE ?></div>
            </div>
          </div>
          <div class="ci-row">
            <div class="ci-icon"><i class="fas fa-map-marker-alt"></i></div>
            <div>
              <div class="ci-label">Location</div>
              <div class="ci-value"><?= SITE_LOCATION ?></div>
            </div>
          </div>
          <div class="ci-row">
            <div class="ci-icon"><i class="fas fa-clock"></i></div>
            <div>
              <div class="ci-label">Response time</div>
              <div class="ci-value">Within 24 hours</div>
            </div>
          </div>
        </div>

        <div style="margin-top:36px">
          <p class="ci-label" style="margin-bottom:12px">Find me online</p>
          <div class="social-row">
            <a href="<?= SITE_GITHUB ?>"   target="_blank" rel="noopener" class="social-btn" aria-label="GitHub"><i class="fab fa-github"></i></a>
            <a href="<?= SITE_LINKEDIN ?>" target="_blank" rel="noopener" class="social-btn" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <a href="<?= SITE_TWITTER ?>"  target="_blank" rel="noopener" class="social-btn" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
            <a href="mailto:<?= SITE_EMAIL ?>" class="social-btn" aria-label="Email"><i class="fas fa-envelope"></i></a>
          </div>
        </div>

        <!-- Quick note -->
        <div style="margin-top:40px;padding:20px;background:var(--blue-light);border-radius:var(--r-lg);border-left:3px solid var(--blue)">
          <p style="font-size:.83rem;color:var(--text-2);line-height:1.7;margin:0">
            <strong style="color:var(--navy);font-weight:600">Working hours:</strong><br>
            Monday – Friday, 9am – 6pm WAT (UTC+1).<br>
            Messages received outside hours are answered the next business day.
          </p>
        </div>
      </div>

      <!-- Form -->
      <div class="reveal">
        <div class="form-card">
          <h2 class="fc-title">Send a message</h2>
          <p class="fc-sub">All fields required. Your details stay private.</p>

          <div id="form-fb" class="form-feedback"></div>

          <form id="contact-form" novalidate data-action="<?= $b ?>/pages/contact.php">
            <div class="form-row">
              <div class="fg">
                <label for="name">Full name</label>
                <input type="text" id="name" name="name" placeholder="John Adewale" autocomplete="name" required>
              </div>
              <div class="fg">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" placeholder="john@example.com" autocomplete="email" required>
              </div>
            </div>

            <div class="fg">
              <label for="subject">Subject</label>
              <input type="text" id="subject" name="subject" placeholder="e.g. Web application project, Freelance enquiry…" required>
            </div>

            <div class="fg">
              <label for="message">Message</label>
              <textarea id="message" name="message" rows="6"
                placeholder="Tell me about your project, timeline, budget, or any questions you have…" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-lg" style="width:100%;justify-content:center">
              <i class="fas fa-paper-plane"></i> Send Message
            </button>

            <p class="form-note"><i class="fas fa-lock" style="color:var(--blue-mid)"></i> Your message is stored securely. No spam, ever.</p>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
