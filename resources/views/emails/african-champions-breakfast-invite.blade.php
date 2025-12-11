<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Africa Champions Breakfast - ALG 2025</title>
  <style>
    body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color:#111827; margin:0; padding:0; }
    .container { max-width: 640px; margin: 0 auto; padding: 24px; }
    .badge { display:inline-block; padding:6px 10px; border-radius:9999px; background:#FEF3C7; color:#92400E; font-weight:600; font-size:12px; letter-spacing:.08em; text-transform:uppercase; }
    .btn { display:inline-block; padding:12px 20px; border-radius:9999px; background:#D97706; color:#fff !important; text-decoration:none; font-weight:700; font-size:14px; }
    .card { background:#fff; border:1px solid #E5E7EB; border-radius:16px; box-shadow:0 10px 30px rgba(15,23,42,0.08); }
    .hr { height:1px; background:linear-gradient(90deg, rgba(0,0,0,0) 0%, #E5E7EB 35%, #E5E7EB 65%, rgba(0,0,0,0) 100%); border:0; }
    a { color:#D97706; }
    .qr-box { text-align:center; padding:20px; background:#FEF3C7; border-radius:12px; margin:20px 0; }
  </style>
</head>
<body>
  <div class="container">
    <div style="text-align:center; margin-bottom:20px;">
      <img src="{{ url('/assets/logos/ALG.png') }}" alt="Annual Leaders Gathering" style="height:40px; width:auto; display:inline-block;" />
    </div>

    <span class="badge">Africa Champions Breakfast</span>
    <h1 style="margin-top:16px; font-size:20px; font-weight:600;">Dear {{ $reservation->full_name }},</h1>

    <div class="card" style="margin-top:16px; padding:20px 22px;">
      <p style="margin:0; font-size:15px; line-height:1.7;">
        In appreciation of the remarkable value you have added to the LéO Africa Institute through your time, leadership and unwavering commitment to our mission, we are pleased to extend a special invitation to you to join us for the <strong>Africa Champions Breakfast</strong>. This will happen as a side event before the main <strong>#ALG2025</strong> event.
      </p>

      <p style="margin-top:14px; font-size:14px; line-height:1.7; font-weight:600; color:#0F766E;">
        📅 Date: December 13th, 2025<br/>
        ⏰ Time: 7:30am to 10:00am<br/>
        📍 Venue: Four Points by Sheraton, Kampala
      </p>

      <p style="margin-top:14px; font-size:15px; line-height:1.7;">
        <strong>The agenda for the Breakfast has been attached to this email.</strong>
      </p>

      <p style="margin-top:14px; font-size:15px; line-height:1.7;">
        As we launch the Africa Champions Network, we would be honoured to have you present as part of this journey. Your continued contribution and voice are essential as we build together for greater impact across the continent.
      </p>

      <p style="margin-top:14px; font-size:15px; line-height:1.7;">
        We look forward to sharing this milestone moment with you.
      </p>

      <hr class="hr" style="margin:18px 0;" />

      <!-- QR Code Notice -->
      <div class="qr-box">
        <p style="margin:0 0 12px 0; font-weight:600; font-size:14px; color:#92400E; text-transform:uppercase; letter-spacing:0.05em;">
          🎫 Your Personal QR Code
        </p>
        <p style="margin:12px 0 0 0; font-size:14px; line-height:1.6; color:#78350f;">
          Your personal QR code is <strong>attached to this email</strong>. Please <strong>download and print it</strong> or <strong>save it to your device</strong> for quick check-in at the entrance.
        </p>
      </div>

      <hr class="hr" style="margin:18px 0;" />

      <p style="margin:0; text-align:center;">
        <a href="{{ $attendanceUrl }}" class="btn">RSVP Here</a>
      </p>
    </div>

    <p style="margin-top:24px; font-size:14px; line-height:1.6; color:#4B5563;">
      Warm regards,<br/>
      <strong>The LéO Africa Institute Team</strong>
    </p>
    
    <p style="margin-top:12px; font-size:13px; line-height:1.5; color:#6B7280; text-align:center;">
      #ALG2025 | Building Together for Impact
    </p>

    <p style="margin-top:16px; font-size:12px; line-height:1.5; color:#6B7280; text-align:center;">
      You're receiving this email because you're an Africa Champion.<br/>
      This is a special invitation to our inaugural Africa Champions Breakfast.
    </p>
  </div>
</body>
</html>
