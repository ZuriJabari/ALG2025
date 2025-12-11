# Generate QR Codes for All Participants

## Overview
Generate unique QR codes (attendance tokens) for all ALG 2025 participants for quick check-in at the event.

## Generate QR Codes

### For ALL Participants
Generate QR codes for everyone who has registered:

```bash
php artisan attendance:generate-tokens
```

This will:
- Find all reservations without attendance tokens
- Generate a unique 32-character token for each
- Save the token to the database
- Show progress bar

### For Specific Fellowship Only
If you only want to generate for a specific group:

```bash
# Africa Champions only
php artisan attendance:generate-tokens --fellowship="Africa Champions Invite"

# YELP Fellows only
php artisan attendance:generate-tokens --fellowship="YELP"

# HUDUMA Fellows only
php artisan attendance:generate-tokens --fellowship="HUDUMA"
```

## What Happens

The command will:
1. Find all seat reservations without an `attendance_token`
2. Generate a unique random token for each
3. Ensure no duplicate tokens
4. Save to database
5. Show progress

Example output:
```
Generating attendance tokens...
Found 150 reservations without tokens
████████████████████████████ 100%

Successfully generated 150 attendance tokens!
```

## How QR Codes Work

Each participant gets a unique URL:
```
https://yoursite.com/attendance/verify/{unique-token}
```

When scanned:
- Shows participant information
- Displays their fellowship/category
- Allows staff to mark them as present
- Prevents duplicate check-ins
- Records check-in timestamp

## Using QR Codes in Emails

Once tokens are generated, you can include QR codes in emails:

1. **Africa Champions Breakfast Email** - Already includes QR code
2. **General ALG 2025 Confirmation** - Can be added to any email template

## Verification Page

Staff can scan QR codes using any smartphone camera or QR scanner app. The verification page shows:
- ✅ Participant name
- ✅ Email address
- ✅ Fellowship/category
- ✅ Check-in status
- ✅ One-click "Confirm Attendance" button

## Re-running the Command

The command is safe to run multiple times:
- Only generates tokens for participants who don't have one yet
- Skips participants who already have tokens
- Never overwrites existing tokens

## Check How Many Need Tokens

To see how many participants still need tokens:

```bash
php artisan tinker --execute="echo App\Models\SeatReservation::whereNull('attendance_token')->count() . ' participants need tokens';"
```

## Troubleshooting

### No reservations found
If you see "No reservations found without attendance tokens":
- All participants already have tokens ✓
- Run the check command above to verify

### Database connection error
- Make sure you're running this on your production server
- Check your `.env` database settings

## Next Steps

After generating tokens:
1. Send emails with QR codes to participants
2. Set up QR scanning station at event entrance
3. Staff can use any smartphone to scan and verify
