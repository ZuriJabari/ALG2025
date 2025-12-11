# Send Africa Champions Breakfast Email

## Overview
This guide explains how to send the beautifully designed Africa Champions Breakfast invitation email to all 52 Africa Champions.

## Email Features
- ✅ Personalized with recipient's name
- ✅ Beautiful amber/gold gradient design
- ✅ Includes both PDF attachments:
  - Africa Champions Breakfast ALG 2025.pdf
  - FINAL Main Program ALG 2025.pdf
- ✅ Responsive design for all devices
- ✅ Clear call-to-action button
- ✅ Event details (date, time, venue)

## Before Sending

### 1. Test the Email First
Always test with a single recipient before sending to everyone:

```bash
php artisan email:african-champions --test
```

This will send the email to only the first Africa Champion so you can verify:
- Email design looks good
- PDFs are attached correctly
- All links work
- Personalization is correct

### 2. Check Your Mail Configuration
Make sure your `.env` file has correct mail settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email@domain.com
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@domain.com
MAIL_FROM_NAME="LéO Africa Institute"
```

## Sending the Emails

### Send to All Africa Champions
Once you've tested and verified the email looks good:

```bash
php artisan email:african-champions
```

This will:
- Send to all 52 Africa Champions
- Show progress bar
- Display success/failure for each email
- Provide final summary

### What Happens
- Emails are queued for sending (won't block the command)
- Each email is personalized with the recipient's name
- Both PDF programmes are attached
- Progress is shown in real-time

## Monitoring

The command will show:
```
Found 52 Africa Champions

✓ Sent to: Magnus Mchunguzi (mmchunguzi@gmail.com)
✓ Sent to: Dr. Korir Sing'oei (singoei.korir@gmail.com)
...

Email sending completed!
Successfully sent: 52
Failed: 0
```

## Troubleshooting

### If emails fail to send:
1. Check your mail configuration in `.env`
2. Verify SMTP credentials are correct
3. Check if mail server is accessible
4. Look at Laravel logs: `storage/logs/laravel.log`

### If PDFs don't attach:
1. Verify PDFs exist in `public/assets/1x/`
2. Check file permissions
3. Ensure file names match exactly

## Recipients
All 52 people with `fellowship = 'Africa Champions Invite'` will receive the email:
- 41 newly imported
- 11 updated from existing records

## Email Subject
```
Africa Champions Breakfast - ALG 2025 | Saturday, 13th December
```

## Need Help?
- Test mode: `php artisan email:african-champions --test`
- Check logs: `tail -f storage/logs/laravel.log`
- List champions: `php artisan tinker --execute="App\Models\SeatReservation::where('fellowship', 'Africa Champions Invite')->get(['full_name', 'email'])"`
