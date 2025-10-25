# cPanel Deployment Guide - ALG Event Site

## Pre-Deployment Checklist

### 1. Environment Configuration
- [ ] Update `.env` file with production settings:
  ```
  APP_ENV=production
  APP_DEBUG=false
  APP_URL=https://yourdomain.com
  LOG_LEVEL=warning
  SESSION_DRIVER=database
  CACHE_STORE=file (or redis if available)
  ```

- [ ] Set strong `APP_KEY` (run: `php artisan key:generate`)
- [ ] Configure database credentials for production MySQL
- [ ] Set up mail configuration (SMTP or SendGrid)
- [ ] Update `MAIL_FROM_ADDRESS` to `alg@leoafricainstitute.org`

### 2. Database Setup
- [ ] Create production MySQL database
- [ ] Run migrations: `php artisan migrate --force`
- [ ] Seed data if needed: `php artisan db:seed`
- [ ] Verify all tables created successfully
- [ ] Set up automated backups

### 3. Asset Optimization
- [ ] Run: `npm run build` (production build)
- [ ] Verify all CSS/JS files are minified
- [ ] Check image optimization in `/public/assets`
- [ ] Clear cache: `php artisan cache:clear`
- [ ] Clear views: `php artisan view:clear`

### 4. Security Hardening
- [ ] Set proper file permissions:
  ```bash
  chmod 755 storage bootstrap/cache
  chmod 644 .env
  ```
- [ ] Enable HTTPS/SSL certificate
- [ ] Configure security headers in `.htaccess`
- [ ] Set up rate limiting for API endpoints
- [ ] Enable CSRF protection (already configured)

### 5. Performance Optimization
- [ ] Cache configuration: `php artisan config:cache`
- [ ] Cache routes: `php artisan route:cache`
- [ ] Optimize autoloader: `composer install --optimize-autoloader --no-dev`
- [ ] Enable gzip compression in `.htaccess`
- [ ] Set up CDN for static assets (optional)

### 6. Testing & Verification
- [ ] Test all routes and pages
- [ ] Verify responsive design on mobile/tablet/desktop
- [ ] Test form submissions (reservations, newsletter)
- [ ] Check email functionality
- [ ] Verify database connections
- [ ] Test file uploads (speaker photos)
- [ ] Check dark mode toggle
- [ ] Verify all external links

### 7. Monitoring & Logging
- [ ] Set up error logging
- [ ] Configure application monitoring
- [ ] Set up backup automation
- [ ] Monitor disk space and database size
- [ ] Set up uptime monitoring

## cPanel-Specific Steps

### 1. File Manager Setup
- [ ] Upload project files to `public_html` or subdomain folder
- [ ] Ensure `.env` file is in root (not accessible via web)
- [ ] Set correct permissions on storage and bootstrap directories

### 2. Database Configuration
- [ ] Create MySQL database via cPanel
- [ ] Create database user with full privileges
- [ ] Update `.env` with database credentials

### 3. PHP Configuration
- [ ] Verify PHP version (7.4+ required)
- [ ] Enable required extensions: `pdo_mysql`, `mbstring`, `json`, `curl`
- [ ] Adjust `memory_limit` to at least 256MB
- [ ] Set `max_execution_time` to 300 seconds

### 4. SSL Certificate
- [ ] Install AutoSSL or purchase SSL certificate
- [ ] Force HTTPS redirect in `.htaccess`
- [ ] Update `APP_URL` to https://

### 5. Email Configuration
- [ ] Configure mail settings in cPanel
- [ ] Test email delivery
- [ ] Set up SPF/DKIM records

## Production .htaccess Configuration

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [QSA,L]
</IfModule>

# Force HTTPS
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>

# Enable Gzip Compression
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript
</IfModule>

# Browser Caching
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

## Deployment Commands

```bash
# 1. Install dependencies
composer install --optimize-autoloader --no-dev

# 2. Generate app key
php artisan key:generate

# 3. Run migrations
php artisan migrate --force

# 4. Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. Build assets
npm run build

# 6. Clear all caches
php artisan cache:clear
php artisan view:clear
```

## Post-Deployment Verification

- [ ] Visit homepage and verify it loads
- [ ] Check all navigation links
- [ ] Test 2024 event page
- [ ] Test speakers page
- [ ] Test speaker modal functionality
- [ ] Test form submissions
- [ ] Check console for JavaScript errors
- [ ] Verify images load correctly
- [ ] Test dark mode toggle
- [ ] Check mobile responsiveness
- [ ] Monitor error logs for issues

## Rollback Plan

If issues occur:
1. Keep backup of `.env` file
2. Keep database backup
3. Keep previous version of code
4. Document any changes made
5. Have SSH access ready for quick fixes

## Support & Maintenance

- Monitor error logs regularly
- Keep Laravel and dependencies updated
- Regular database backups
- Monitor server resources
- Update SSL certificate before expiration
- Test disaster recovery procedures

## Contact Information

- **Email**: alg@leoafricainstitute.org
- **Support**: Index Digital (development partner)
- **Hosting**: cPanel hosting provider

---

**Last Updated**: October 25, 2025
**Version**: 1.0
