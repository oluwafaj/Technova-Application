<?php
require_once dirname(__DIR__) . '/config.php';
$b = BASE_PATH;
session_start();

if (isset($_GET['logout'])) { session_destroy(); header('Location: /admin/'); exit; }

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_SESSION['adm'])) {
    if (hash_equals(ADMIN_PASSWORD, $_POST['pw'] ?? ''))
        { $_SESSION['adm'] = true; header('Location: /admin/'); exit; }
    else $err = 'Incorrect password.';
}

if (isset($_SESSION['adm'])) {
    if (isset($_GET['read'])) {
        $msgs = get_messages();
        foreach ($msgs as &$m) if ($m['id'] === $_GET['read']) $m['read'] = true;
        file_put_contents(MESSAGES_FILE, json_encode($msgs, JSON_PRETTY_PRINT));
        header('Location: /admin/'); exit;
    }
    if (isset($_GET['del'])) {
        $msgs = array_values(array_filter(get_messages(), fn($m) => $m['id'] !== $_GET['del']));
        file_put_contents(MESSAGES_FILE, json_encode($msgs, JSON_PRETTY_PRINT));
        header('Location: /admin/?deleted=1'); exit;
    }
}

$messages = get_messages();
$unread   = count(array_filter($messages, fn($m) => !$m['read']));
$authed   = isset($_SESSION['adm']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin · <?= SITE_NAME ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="<?= $b ?>/assets/css/style.css">
  <style>body { background: var(--off-white); }</style>
</head>
<body>

<?php if (!$authed): ?>
<!-- ── Login ───────────────────────────────────── -->
<div class="login-screen">
  <div class="login-box">
    <div class="login-icon"><i class="fas fa-lock"></i></div>
    <h2>Admin Access</h2>
    <p>Enter your password to manage messages.</p>

    <?php if ($err): ?>
    <div class="alert alert-err"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($err) ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="fg" style="text-align:left">
        <label for="pw">Password</label>
        <input type="password" id="pw" name="pw" autofocus placeholder="Enter admin password">
      </div>
      <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:8px">
        <i class="fas fa-sign-in-alt"></i> Sign In
      </button>
    </form>
    <p style="margin-top:20px;font-size:.78rem">
      <a href="<?= $b ?>/index.php" style="color:var(--blue)"><i class="fas fa-arrow-left"></i> Back to site</a>
    </p>
  </div>
</div>

<?php else: ?>
<!-- ── Admin panel ─────────────────────────────── -->
<div class="admin-bar">
  <div class="admin-bar-brand"><?= SITE_NAME ?> <span>/ Admin</span></div>
  <div class="admin-bar-links">
    <a href="<?= $b ?>/index.php" target="_blank"><i class="fas fa-external-link-alt"></i> View Site</a>
    <a href="?logout=1"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>
</div>

<div class="admin-content">

  <div class="admin-hd">
    <h1>
      Messages
      <?php if ($unread): ?><span class="badge-new"><?= $unread ?> new</span><?php endif; ?>
    </h1>
    <p><?= count($messages) ?> total · stored in <code style="background:var(--surface);padding:2px 7px;border-radius:4px;font-size:.8rem">data/messages.json</code></p>
  </div>

  <?php if (isset($_GET['deleted'])): ?>
  <div class="alert alert-ok" style="margin-bottom:20px"><i class="fas fa-check-circle"></i> Message deleted.</div>
  <?php endif; ?>

  <div class="msg-table-wrap">
    <?php if (!$messages): ?>
    <div class="empty-msg">
      <i class="fas fa-inbox"></i>
      <strong>No messages yet</strong>
      <p style="font-size:.83rem;margin-top:4px">Submissions from the contact form will appear here.</p>
    </div>
    <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Preview</th>
          <th>When</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (array_reverse($messages) as $i => $m): ?>
        <tr class="<?= !$m['read'] ? 'unread' : '' ?>">
          <td style="color:var(--text-4);font-size:.78rem"><?= count($messages) - $i ?></td>
          <td>
            <?php if (!$m['read']): ?><span style="display:inline-block;width:6px;height:6px;background:var(--blue);border-radius:50%;margin-right:6px;vertical-align:middle"></span><?php endif; ?>
            <?= htmlspecialchars($m['name']) ?>
          </td>
          <td><a href="mailto:<?= htmlspecialchars($m['email']) ?>" style="color:var(--blue)"><?= htmlspecialchars($m['email']) ?></a></td>
          <td><?= htmlspecialchars($m['subject']) ?></td>
          <td class="td-preview"><?= htmlspecialchars($m['message']) ?></td>
          <td style="color:var(--text-3);font-size:.78rem;white-space:nowrap"><?= time_ago($m['timestamp']) ?></td>
          <td>
            <div style="display:flex;gap:6px;align-items:center">
              <?php if (!$m['read']): ?>
              <a href="?read=<?= urlencode($m['id']) ?>" class="act-link act-read"><i class="fas fa-check"></i> Read</a>
              <?php endif; ?>
              <a href="?del=<?= urlencode($m['id']) ?>" class="act-link act-del"
                 onclick="return confirm('Delete this message? This cannot be undone.')">
                <i class="fas fa-trash"></i>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="7" class="msg-full">
            <?= nl2br(htmlspecialchars($m['message'])) ?>
            <span style="font-size:.75rem;color:var(--text-4);margin-left:12px"><?= $m['timestamp'] ?> · <?= $m['ip'] ?></span>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>
  </div>

</div>
<?php endif; ?>

</body>
</html>
