# ALG Event Site - cPanel Deployment Checklist

## Pre-Deployment (Before uploading files)

### 1. Code Preparation
- [ ] Run `npm run build` for production assets
- [ ] Verify all tests pass
- [ ] Check for console errors in browser
- [ ] Review all environment variables needed
- [ ] Ensure `.env.production` is configured
- [ ] Generate new `APP_KEY` for production

### 2. Database Preparation
- [ ] Create production MySQL database
- [ ] Create database user with strong password
- [ ] Document database credentials securely
- [ ] Prepare migration commands
- [ ] Backup current database (if migrating)

### 3. SSL Certificate
- [ ] Purchase or enable AutoSSL on cPanel
- [ ] Verify SSL certificate validity
- [ ] Note SSL certificate expiration date

---

## During Deployment (cPanel File Upload)

### 1. File Upload
- [ ] Upload all project files to `public_html` or subdomain
- [ ] Ensure `.env` file is NOT in web-accessible directory
- [ ] Verify `.htaccess` is in `/public` directory
- [ ] Check file permissions are correct

### 2. Directory Permissions
```bash
chmod 755 storage
chmod 755 bootstrap/cache
chmod 644 .env
```

### 3. PHP Configuration (via cPanel)
- [ ] Verify PHP version 7.4+
- [ ] Enable required extensions:
  - pdo_mysql
  - mbstring
  - json
  - curl
  - gd
- [ ] Set memory_limit to 256M
- [ ] Set max_execution_time to 300

---

## Post-Deployment (After uploading files)

### 1. Database Setup
```bash
php artisan migrate --force
php artisan db:seed (if needed)
```

### 2. Cache & Optimization
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan cache:clear
```

### 3. Asset Compilation
```bash
npm run build
```

### 4. File Permissions (Final)
```bash
chmod -R 755 storage bootstrap/cache
chmod 644 .env
```

### 5. SSL Configuration
- [ ] Force HTTPS in `.htaccess` (already configured)
- [ ] Update `APP_URL` to https://
- [ ] Test SSL certificate validity

---

## Testing & Verification

### 1. Basic Functionality
- [ ] Homepage loads without errors
- [ ] All navigation links work
- [ ] 2024 event page displays correctly
- [ ] Speakers page loads
- [ ] Speaker modals open correctly
- [ ] Forms submit successfully

### 2. Performance
- [ ] Page load time is acceptable
- [ ] Images load correctly
- [ ] CSS/JS files are minified
- [ ] No console errors
- [ ] Gzip compression is working

### 3. Security
- [ ] HTTPS is enforced
- [ ] Security headers are present
- [ ] No sensitive data in source code
- [ ] `.env` file is not accessible
- [ ] CSRF protection is working

### 4. Responsive Design
- [ ] Mobile view (320px) works
- [ ] Tablet view (768px) works
- [ ] Desktop view (1024px+) works
- [ ] Dark mode toggle works
- [ ] All modals are mobile-optimized

### 5. Email Functionality
- [ ] Newsletter subscription works
- [ ] Reservation form emails send
- [ ] Email address is correct (alg@leoafricainstitute.org)

### 6. Database
- [ ] All tables created
- [ ] Data is accessible
- [ ] No database errors in logs

---

## Monitoring & Maintenance

### Daily
- [ ] Check error logs
- [ ] Monitor server resources
- [ ] Verify site is accessible

### Weekly
- [ ] Review application logs
- [ ] Check for failed jobs
- [ ] Monitor database size

### Monthly
- [ ] Backup database
- [ ] Review security logs
- [ ] Update dependencies (if needed)
- [ ] Check SSL certificate expiration

### Quarterly
- [ ] Full security audit
- [ ] Performance optimization review
- [ ] Disaster recovery test

---

## Troubleshooting

### 500 Internal Server Error
1. Check error logs: `storage/logs/laravel.log`
2. Verify database connection
3. Check file permissions
4. Verify PHP version and extensions

### Database Connection Error
1. Verify database credentials in `.env`
2. Check MySQL is running
3. Verify database user privileges
4. Test connection via cPanel

### Email Not Sending
1. Verify SMTP credentials
2. Check mail logs
3. Test with different email provider
4. Verify firewall rules

### SSL Certificate Issues
1. Verify certificate is installed
2. Check certificate expiration
3. Clear browser cache
4. Test with different browser

---

## Important Contacts

- **Hosting Provider**: [Your cPanel Host]
- **Domain Registrar**: [Your Registrar]
- **Email**: alg@leoafricainstitute.org
- **Development Support**: Index Digital

---

## Deployment Completed By

- **Date**: _______________
- **Deployed By**: _______________
- **Verified By**: _______________
- **Notes**: _______________

---

**Last Updated**: October 25, 2025
**Version**: 1.0
