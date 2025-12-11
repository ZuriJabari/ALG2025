# Send Emails from Filament Admin

## Overview
You can now send emails directly from the Filament admin panel with just a few clicks. Select recipients and choose which email to send.

## Access the Admin Panel

1. Go to your admin panel: `https://yoursite.com/admin`
2. Click on **"Seat Reservations"** in the sidebar
3. You'll see all registered participants

## Filter Recipients

Use the filters at the top to narrow down your selection:

### Filter by Fellowship/Category
- **Africa Champions Invite** - All Africa Champions
- **YELP** - YELP Fellows
- **HUDUMA** - HUDUMA Fellows
- **The Griot Fellowship**
- **KAS Network**
- **Member of Faculty**
- **Board/Management**
- **Partner/Affiliate**

### Filter by Attendance Mode
- **In Person** - Those who confirmed physical attendance
- **Virtual** - Those joining virtually

### Filter by QR Code Status
- **Has QR Code** - Participants with generated QR codes
- **No QR Code** - Participants without QR codes

## Send Emails

### Step 1: Select Recipients
- Use filters to narrow down (e.g., Fellowship = "Africa Champions Invite")
- Or manually check boxes next to specific people
- Or click the checkbox in the header to select all visible

### Step 2: Choose Email Type

Click the dropdown arrow next to "Bulk actions" and select:

#### 🎫 Send Africa Champions Breakfast Email
- **Use for**: Africa Champions only
- **Includes**:
  - Amber/gold themed design
  - Africa Champions Breakfast invitation
  - QR code for check-in
  - Both PDF programmes attached
- **Subject**: "Africa Champions Breakfast - ALG 2025 | Saturday, 13th December"

#### 📧 Send General ALG 2025 Email
- **Use for**: All other participants
- **Includes**:
  - Teal themed design
  - General ALG 2025 invitation
  - QR code for check-in
  - Main programme PDF attached
- **Subject**: "Your Invitation to ALG 2025 | Saturday, 13th December"

### Step 3: Confirm and Send
1. Click your chosen email action
2. Review the confirmation modal
3. Click "Confirm" to send

## Example Workflows

### Send to All Africa Champions
1. Filter: Fellowship = "Africa Champions Invite"
2. Select all (checkbox in header)
3. Bulk Actions → "🎫 Send Africa Champions Breakfast Email"
4. Confirm

### Send to All Other Participants
1. Filter: Fellowship ≠ "Africa Champions Invite" (or leave blank and manually exclude)
2. Select all
3. Bulk Actions → "📧 Send General ALG 2025 Email"
4. Confirm

### Send to Specific People
1. Don't use filters
2. Manually check boxes next to specific people
3. Choose appropriate email action
4. Confirm

## What Happens When You Send

- ✅ Emails are queued (won't slow down the admin)
- ✅ Only one email per email address (no duplicates)
- ✅ QR codes are automatically generated if missing
- ✅ Success notification appears
- ✅ Emails are sent in the background

## Email Features

### Both Emails Include:
- Personalized greeting with recipient's name
- Beautiful responsive design
- Unique QR code for check-in
- Instructions to print or show on device
- Event details (date, time, venue)
- PDF programme(s) attached

### Africa Champions Email (Amber Theme):
- Africa Champions Breakfast focus
- 7:30 AM - 10:00 AM timing
- Both breakfast AND main programme PDFs

### General ALG Email (Teal Theme):
- Full day ALG 2025 focus
- 10:00 AM - 7:00 PM timing
- Main programme PDF only

## Tips

1. **Test First**: Send to yourself or a test email before sending to everyone
2. **Use Filters**: Much easier than manual selection for large groups
3. **Check QR Codes**: Filter by "No QR Code" to see who needs tokens generated
4. **One Email Per Person**: The system prevents duplicates automatically
5. **Background Processing**: Emails are queued, so you can continue working

## Troubleshooting

### Email not sending?
- Check your mail configuration in `.env`
- Look at Laravel logs: `storage/logs/laravel.log`

### QR codes not generating?
- Run: `php artisan attendance:generate-tokens`
- This creates tokens for everyone who doesn't have one

### Want to resend?
- Just select the recipients again and click the email action
- They'll receive a new email (QR code stays the same)

## Need Help?

- View sent emails count in the admin dashboard
- Check logs for any errors
- Test with your own email first
