# ALG Event Site - GitHub + cPanel Auto-Deployment Guide

## Overview
This guide sets up automatic deployment from GitHub to cPanel. When you push changes to the GitHub repository, they will automatically deploy to your cPanel hosting.

---

## Prerequisites

✅ **Already Configured:**
- `.cpanel.yml` file in repository root
- `.env.production` template
- `.htaccess` with production settings
- Deployment documentation

**You Need:**
- GitHub account and repository
- cPanel hosting with Git Version Control
- PHP 7.4+ on server
- MySQL database

---

## Step 1: Create GitHub Repository

### 1.1 Initialize Git (if not already done)
```bash
cd /Users/zuri/Work/2025ALG
git init
git add .
git commit -m "Initial commit: ALG Event Site"
```

### 1.2 Create Repository on GitHub
1. Go to https://github.com/new
2. Repository name: `alg-event-site` (or your preference)
3. Description: "Annual Leaders Gathering Event Website"
4. Choose **Private** (recommended for production sites)
5. Click "Create repository"

### 1.3 Add Remote and Push
```bash
git remote add origin https://github.com/YOUR_USERNAME/alg-event-site.git
git branch -M main
git push -u origin main
```

---

## Step 2: Set Up cPanel Git Integration

### 2.1 Access cPanel Git Version Control
1. Log in to cPanel
2. Navigate to **Git Version Control**
3. Click **Create**

### 2.2 Configure Repository
- **Repository Clone URL**: `https://github.com/YOUR_USERNAME/alg-event-site.git`
- **Repository Name**: `alg-event-site`
- **Clone to**: Select or create a directory (e.g., `/home/USER/alg-event-site`)
- **Branch**: `main`
- **Enable "Automatically Deploy"**: ✅ CHECK THIS

### 2.3 Complete Setup
- Click **Create**
- Note the **Repository Path** (you'll need this)
- The deployment hook is now active!

---

## Step 3: Configure Domain/Subdomain

### 3.1 Point Domain to Public Directory
1. In cPanel, go to **Addon Domains** or **Subdomains**
2. Create/modify your domain
3. Set **Document Root** to: `/home/USER/path/to/alg-event-site/public`
   - Replace `USER` with your cPanel username
   - Replace `path/to` with actual path from Step 2.3

### 3.2 Verify SSL Certificate
1. Go to **AutoSSL** or **SSL/TLS Status**
2. Ensure certificate is installed for your domain
3. If not, install one (AutoSSL is free)

---

## Step 4: Create Production Environment File

### 4.1 SSH into Server (or use cPanel Terminal)
```bash
ssh user@yourdomain.com
cd /home/USER/alg-event-site
```

### 4.2 Create .env File
```bash
cp .env.production .env
```

### 4.3 Edit .env with Production Values
```bash
nano .env
```

Update these values:
```
APP_URL=https://yourdomain.com
DB_HOST=127.0.0.1
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
MAIL_HOST=mail.yourdomain.com
MAIL_USERNAME=alg@leoafricainstitute.org
MAIL_PASSWORD=your_email_password
```

### 4.4 Generate App Key
```bash
php artisan key:generate --force
```

### 4.5 Run Initial Setup
```bash
php artisan migrate --force
php artisan storage:link
php artisan optimize
```

---

## Step 5: Set File Permissions

```bash
chmod -R 755 storage bootstrap/cache
chmod 644 .env
chmod 755 .
```

---

## Step 6: Add Cron Jobs (Scheduler)

1. In cPanel, go to **Cron Jobs**
2. Add new cron job:
   - **Common Settings**: Every Minute
   - **Command**: 
   ```
   /usr/local/bin/php /home/USER/alg-event-site/artisan schedule:run >> /dev/null 2>&1
   ```
   - Replace `USER` with your cPanel username

---

## Step 7: Test Deployment

### 7.1 Make a Test Change
```bash
# On your local machine
cd /Users/zuri/Work/2025ALG
echo "<!-- Deployment test -->" >> resources/views/pages/about.blade.php
git add .
git commit -m "Test deployment"
git push origin main
```

### 7.2 Monitor Deployment
1. Go to cPanel → Git Version Control
2. Click on your repository
3. Check **Deployment Log** for status
4. Wait 1-2 minutes for deployment to complete

### 7.3 Verify Changes
1. Visit your website
2. Check if changes are live
3. If not, check error logs: `storage/logs/laravel.log`

---

## Step 8: GitHub Workflow (Going Forward)

### Making Changes
```bash
# 1. Make changes locally
cd /Users/zuri/Work/2025ALG
# ... edit files ...

# 2. Commit changes
git add .
git commit -m "Descriptive commit message"

# 3. Push to GitHub
git push origin main

# 4. Wait 1-2 minutes for auto-deployment
# 5. Visit website to verify changes
```

### Useful Git Commands
```bash
# Check status
git status

# View commit history
git log --oneline -10

# Undo last commit (before push)
git reset --soft HEAD~1

# View changes before committing
git diff

# Create a new branch for testing
git checkout -b feature/new-feature
git push origin feature/new-feature
```

---

## Troubleshooting

### Deployment Not Triggering
1. Verify "Automatically Deploy" is enabled in cPanel
2. Check GitHub repository URL is correct
3. Ensure branch is set to `main`
4. Try manual pull in cPanel Git interface

### 500 Error After Deployment
1. SSH into server and check logs:
   ```bash
   tail -f storage/logs/laravel.log
   ```
2. Run manual optimization:
   ```bash
   php artisan optimize:clear
   php artisan optimize
   ```
3. Verify database connection in `.env`

### Database Migration Failed
1. Check `.env` database credentials
2. Verify database exists and user has privileges
3. Run manually:
   ```bash
   php artisan migrate --force
   ```

### File Permission Issues
```bash
# Fix permissions
chmod -R 755 storage bootstrap/cache
chmod 644 .env
chown -R nobody:nobody storage bootstrap/cache
```

### Composer Issues
```bash
# Clear composer cache
composer clear-cache

# Reinstall dependencies
composer install --no-dev --optimize-autoloader
```

---

## Important Notes

⚠️ **DO NOT COMMIT:**
- `.env` file (use `.env.production` as template)
- `vendor/` directory
- `node_modules/` directory
- `storage/logs/` directory
- `.DS_Store` or system files

✅ **ALWAYS COMMIT:**
- `.cpanel.yml`
- `.env.production`
- `.env.example`
- `.gitignore`
- All source code changes

---

## Security Best Practices

1. **Keep `.env` Secure**
   - Never commit `.env` to GitHub
   - Use strong database passwords
   - Rotate API keys regularly

2. **GitHub Repository**
   - Set to Private (not Public)
   - Use branch protection rules
   - Require code review for main branch

3. **cPanel Security**
   - Use SSH keys instead of passwords
   - Enable two-factor authentication
   - Regularly backup database
   - Monitor error logs

---

## Backup & Recovery

### Manual Backup
```bash
# Backup database
mysqldump -u user -p database_name > backup.sql

# Backup files
tar -czf alg-backup.tar.gz /home/USER/alg-event-site
```

### Rollback to Previous Version
```bash
# View commit history
git log --oneline

# Revert to specific commit
git revert COMMIT_HASH
git push origin main

# Or reset to previous commit (use with caution)
git reset --hard COMMIT_HASH
git push origin main --force
```

---

## Monitoring & Maintenance

### Weekly Checks
- [ ] Check error logs
- [ ] Verify website is accessible
- [ ] Test form submissions
- [ ] Monitor server resources

### Monthly Tasks
- [ ] Review deployment logs
- [ ] Update dependencies (if needed)
- [ ] Backup database
- [ ] Check SSL certificate expiration

### Quarterly
- [ ] Security audit
- [ ] Performance optimization
- [ ] Disaster recovery test

---

## Support & Contacts

- **GitHub Issues**: Report bugs in GitHub repository
- **Email**: alg@leoafricainstitute.org
- **cPanel Support**: Contact your hosting provider
- **Development**: Index Digital

---

## Quick Reference

| Task | Command |
|------|---------|
| Check git status | `git status` |
| View changes | `git diff` |
| Commit changes | `git commit -m "message"` |
| Push to GitHub | `git push origin main` |
| View logs | `tail -f storage/logs/laravel.log` |
| Clear cache | `php artisan optimize:clear` |
| Run migrations | `php artisan migrate --force` |
| SSH to server | `ssh user@yourdomain.com` |

---

**Last Updated**: October 25, 2025
**Version**: 1.0
**Status**: Ready for Production
