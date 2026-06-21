# Technova Application

The PHP web application for Technova, deployed to Azure App Service. Every commit to `main` builds, tests, and deploys to Development automatically; Production requires a named reviewer's approval before it goes out.

Infrastructure (the App Service itself, networking, Key Vault, monitoring, etc.) is managed in a separate repository — [Technovaproduction-Infrastructire](#) — using Terraform. This repo only contains application code and its own deployment pipeline.

---

## Stack

| | |
|---|---|
| Platform | Azure App Service, Linux |
| Runtime | PHP 8.2 |
| Plan tier | Standard (S1) |
| Deployment | GitHub Actions, build → deploy Dev → manual approval → deploy Prod |

---

## Live environments

| Environment | URL |
|---|---|
| Development | https://technovadev-app.azurewebsites.net |
| Production | https://technovaprod-app.azurewebsites.net |
| Production (custom domain) | https://fajglobalservices.co.uk |

---

## Deployment pipeline

Defined in [`.github/workflows/deploy.yml`](.github/workflows/deploy.yml). Triggered on every push to `main`.

1. **Build and Test** — sets up PHP 8.2, installs Composer dependencies if `composer.json` is present, runs the test suite if one exists
2. **Deploy to Dev** — publishes the build to the Development App Service automatically
3. **Manual approval** — a reviewer checks the Development deployment, then approves (or rejects) the Production release in GitHub
4. **Deploy to Prod** — the exact same build artifact that was tested in Development goes to Production

```
Build & Test → Deploy to Dev → ⏸ approval → Deploy to Prod
```

Nothing reaches Production without someone clicking "Approve and deploy" — there's no path around it.

### Required secrets

Set these under **Settings → Secrets and variables → Actions**:

| Secret | Purpose |
|---|---|
| `DEV_AZURE_WEBAPP_PUBLISH_PROFILE` | Publish profile for the Development App Service |
| `PROD_AZURE_WEBAPP_PUBLISH_PROFILE` | Publish profile for the Production App Service |

Download a publish profile from **Azure Portal → App Service → Get publish profile**, then paste the full XML contents as the secret value.

### Required GitHub environments

Go to **Settings → Environments** and create:
- `development` — no protection rules needed
- `production` — enable **Required reviewers** and add whoever should sign off on releases

Without the `production` environment's reviewer requirement, deployments will go straight through without pausing.

---

## Running locally

```bash
php -S localhost:8000
```

Requires PHP 8.2. If the project uses Composer dependencies:
```bash
composer install
```

---

## Manually triggering a deployment

If you need to deploy without pushing new code (e.g. re-running a failed job):

1. Go to **Actions → Deploy PHP App**
2. Click **Run workflow**
3. Or, on an existing run, click **Re-run jobs → Re-run failed jobs**

---

## Approving a Production release

1. Open the pending workflow run
2. Click **Review deployments**
3. Read through the Development deployment / build output
4. Click **Approve and deploy**, or **Reject** with a comment if it shouldn't go ahead

---

## Notes

- The custom domain (`fajglobalservices.co.uk`) and its SSL binding are configured on the Production App Service directly in Azure — see the infrastructure repo's README for DNS details.
- If a deploy fails with `No credentials found. Add an Azure login action before this action`, the publish profile secret is either missing or named incorrectly — check it matches exactly (`DEV_AZURE_WEBAPP_PUBLISH_PROFILE` / `PROD_AZURE_WEBAPP_PUBLISH_PROFILE`).
