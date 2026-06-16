# Technova Application

PHP web application deployed to Azure App Service via GitHub Actions CI/CD pipeline.

## Environments
- **Dev**: https://technovadev-app.azurewebsites.net
- **Prod**: https://technovaprod-app.azurewebsites.net

## Deployment
Every push to `main` automatically:
1. Builds and tests the PHP application
2. Deploys to Dev environment
3. Pauses for manual approval
4. Deploys to Prod environment after approval
