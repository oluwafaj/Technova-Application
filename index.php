<?php
$environment = getenv('APP_ENV') ?: 'Production';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technova - Cloud Infrastructure</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .badge {
            background: #1e40af;
            color: #93c5fd;
            padding: 0.4rem 1rem;
            border-radius: 9999px;
            font-size: 0.85rem;
            margin-bottom: 2rem;
            letter-spacing: 0.05em;
        }
        h1 {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        h1 span { color: #3b82f6; }
        p.subtitle {
            color: #94a3b8;
            font-size: 1.1rem;
            text-align: center;
            max-width: 600px;
            line-height: 1.7;
            margin-bottom: 3rem;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            width: 100%;
            max-width: 900px;
            margin-bottom: 3rem;
        }
        .card {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
        }
        .card .icon { font-size: 2rem; margin-bottom: 0.75rem; }
        .card h3 { font-size: 0.95rem; color: #cbd5e1; margin-bottom: 0.4rem; }
        .card p { font-size: 0.8rem; color: #64748b; }
        .env-bar {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 8px;
            padding: 1rem 2rem;
            display: flex;
            gap: 2rem;
            font-size: 0.85rem;
            color: #64748b;
            flex-wrap: wrap;
            justify-content: center;
        }
        .env-bar span { color: #e2e8f0; font-weight: 600; }
        footer {
            margin-top: 3rem;
            color: #475569;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="badge">🚀 Deployed via GitHub Actions CI/CD</div>
    <h1>Technova <span>Cloud</span><br>Infrastructure</h1>
    <p class="subtitle">
        Multi-environment Azure infrastructure built with Terraform,
        monitored with Azure Monitor, secured with Microsoft Defender
        for Cloud, and deployed automatically via CI/CD pipelines.
    </p>
    <div class="cards">
        <div class="card">
            <div class="icon">🏗️</div>
            <h3>Infrastructure as Code</h3>
            <p>Terraform modules for all Azure resources</p>
        </div>
        <div class="card">
            <div class="icon">🔄</div>
            <h3>CI/CD Pipeline</h3>
            <p>GitHub Actions with approval gates</p>
        </div>
        <div class="card">
            <div class="icon">📊</div>
            <h3>Azure Monitor</h3>
            <p>CPU, availability & storage alerts</p>
        </div>
        <div class="card">
            <div class="icon">🔒</div>
            <h3>Defender for Cloud</h3>
            <p>Standard tier security posture</p>
        </div>
        <div class="card">
            <div class="icon">💾</div>
            <h3>Disaster Recovery</h3>
            <p>Daily VM backups, GRS storage</p>
        </div>
        <div class="card">
            <div class="icon">🌍</div>
            <h3>Multi-Environment</h3>
            <p>Separate Dev & Production deployments</p>
        </div>
    </div>
    <div class="env-bar">
        <div>Environment: <span><?= htmlspecialchars($environment) ?></span></div>
        <div>PHP: <span><?= phpversion() ?></span></div>
        <div>Server Time: <span><?= date('Y-m-d H:i:s') . ' UTC' ?></span></div>
        <div>Region: <span>West Europe</span></div>
    </div>
    <footer>Technova Production Infrastructure &copy; <?= date('Y') ?></footer>
</body>
</html>
