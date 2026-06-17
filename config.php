<?php
// ── Site Identity ─────────────────────────────────────────────
define('SITE_NAME',       'John Adewale');
define('SITE_ROLE',       'Full-Stack Web Developer');
define('SITE_TAGLINE',    'I build fast, clean web products — from fintech platforms to real estate portals.');
define('SITE_EMAIL',      'john@example.com');
define('SITE_PHONE',      '+234 800 000 0000');
define('SITE_LOCATION',   'Lagos, Nigeria');
define('SITE_INITIALS',   'JA');
define('SITE_AVAILABLE',  true); // Toggle availability badge

// ── Social Links ──────────────────────────────────────────────
define('SITE_GITHUB',     'https://github.com/johnadewale');
define('SITE_LINKEDIN',   'https://linkedin.com/in/johnadewale');
define('SITE_TWITTER',    'https://twitter.com/johnadewale');

// ── Base URL (auto-detected — works on root AND subfolders like /portfolio_v2/) ──
(function () {
    $protocol  = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host      = $_SERVER['HTTP_HOST'] ?? 'localhost';
    // Walk up from this file to find the web root relative path
    $docRoot   = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? ''), '/');
    $scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_FILENAME'] ?? __FILE__)), '/');
    // The "base" is the project root directory (where config.php lives)
    $projRoot  = rtrim(str_replace('\\', '/', __DIR__), '/');
    $subPath   = str_replace($docRoot, '', $projRoot);
    $subPath   = '/' . trim($subPath, '/');
    if ($subPath === '/') $subPath = '';
    define('BASE_URL', $protocol . '://' . $host . $subPath);
    define('BASE_PATH', $subPath);
})();

// ── Storage ───────────────────────────────────────────────────
define('MESSAGES_FILE',   __DIR__ . '/data/messages.json');
define('ADMIN_PASSWORD',  'admin1234'); // ← CHANGE BEFORE DEPLOYING

// ── Helpers ───────────────────────────────────────────────────
function get_messages(): array {
    if (!file_exists(MESSAGES_FILE)) return [];
    return json_decode(file_get_contents(MESSAGES_FILE), true) ?? [];
}

function save_message(array $msg): bool {
    $all   = get_messages();
    $all[] = $msg;
    return file_put_contents(MESSAGES_FILE, json_encode($all, JSON_PRETTY_PRINT)) !== false;
}

function time_ago(string $datetime): string {
    $diff = time() - strtotime($datetime);
    if ($diff < 60)     return 'just now';
    if ($diff < 3600)   return floor($diff/60) . 'm ago';
    if ($diff < 86400)  return floor($diff/3600) . 'h ago';
    return floor($diff/86400) . 'd ago';
}
