<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Invitation to ALG 2025</title>
  <style>
    body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color:#111827; margin:0; padding:0; }
    .container { max-width: 640px; margin: 0 auto; padding: 24px; }
    .badge { display:inline-block; padding:6px 10px; border-radius:9999px; background:#F0FDFA; color:#0F766E; font-weight:600; font-size:12px; letter-spacing:.08em; text-transform:uppercase; }
    .btn { display:inline-block; padding:12px 20px; border-radius:9999px; background:#0FB5A8; color:#fff !important; text-decoration:none; font-weight:700; font-size:14px; }
    .card { background:#fff; border:1px solid #E5E7EB; border-radius:16px; box-shadow:0 10px 30px rgba(15,23,42,0.08); }
    .hr { height:1px; background:linear-gradient(90deg, rgba(0,0,0,0) 0%, #E5E7EB 35%, #E5E7EB 65%, rgba(0,0,0,0) 100%); border:0; }
    a { color:#0FB5A8; }
    .qr-box { text-align:center; padding:20px; background:#F0FDFA; border-radius:12px; margin:20px 0; }
  </style>
</head>
<body>
  <div class="container">
    <div style="text-align:center; margin-bottom:20px;">
      <img src="{{ url('/assets/logos/ALG.png') }}" alt="Annual Leaders Gathering" style="height:40px; width:auto; display:inline-block;" />
    </div>

    <span class="badge">ALG 2025</span>
    <h1 style="margin-top:16px; font-size:24px; font-weight:600; color:#DC2626;">IMPORTANT: Announcing the Full #ALG2025 Agenda + FINAL RSVP Required by Tomorrow 11:00 AM</h1>

    <p style="margin-top:16px; font-size:15px; line-height:1.7;">Dear {{ $reservation->full_name }},</p>

    <div class="card" style="margin-top:16px; padding:20px 22px;">
      <p style="margin:0; font-size:15px; line-height:1.7;">
        We are pleased to share with you the <strong>official programme for the Annual Leaders Gathering 2025</strong>, happening this Saturday, 13th December.
      </p>

      <p style="margin-top:14px; text-align:center;">
        <a href="{{ route('events.2025.programme') }}" class="btn">View OR Download Full Programme</a>
      </p>

      <p style="margin-top:14px; font-size:15px; line-height:1.7;">
        This year's programme brings together some of Africa's leading thinkers and practitioners for a full day of keynotes, high-impact panel discussions, and collaborative leadership sessions under the theme <strong>"Building Together for Impact."</strong>
      </p>

      <hr class="hr" style="margin:18px 0;" />

      <!-- QR Code Notice -->
      <div class="qr-box">
        <p style="margin:0 0 12px 0; font-weight:600; font-size:14px; color:#0F766E; text-transform:uppercase; letter-spacing:0.05em;">
          🎫 Your Personal QR Code
        </p>
        <p style="margin:12px 0 0 0; font-size:14px; line-height:1.6; color:#115e59;">
          Your personal QR code is <strong>attached to this email</strong>. Please <strong>download and print it</strong> or <strong>save it to your device</strong> for quick check-in at the entrance.
        </p>
      </div>

      <hr class="hr" style="margin:18px 0;" />

      <!-- ACTION REQUIRED -->
      <div style="padding:16px; background:#FEF2F2; border:2px solid #DC2626; border-radius:12px; margin:16px 0;">
        <p style="margin:0 0 12px 0; font-weight:700; font-size:15px; color:#DC2626; text-transform:uppercase;">⚠️ ACTION REQUIRED: Confirm Your Attendance Mode</p>
        <p style="margin:0; font-size:14px; line-height:1.7; color:#7F1D1D;">
          To help us finalize logistics—including seating, security, and hospitality—all participants must RSVP.
        </p>
        <p style="margin-top:14px; text-align:center;">
          <a href="{{ $attendanceUrl }}" class="btn" style="background:#DC2626;">RSVP Here (In-Person or Virtual)</a>
        </p>
        <p style="margin-top:12px; font-size:13px; line-height:1.6; color:#7F1D1D;">
          <strong>RSVP Deadline: Tomorrow, Friday 12th December, at 11:00 AM (Strictly)</strong>
        </p>
        <p style="margin-top:10px; font-size:13px; line-height:1.6; color:#7F1D1D;">
          If we do not receive your response by the deadline, you will automatically be registered for virtual attendance.
        </p>
      </div>

      <hr class="hr" style="margin:18px 0;" />

      <p style="margin:0; font-size:14px; line-height:1.7;">
        We look forward to hosting you for what promises to be an insightful and inspiring <strong>#ALG2025</strong> experience.
      </p>

      <div style="margin-top:18px; padding:14px 16px; border-radius:14px; background:#F0FDFA; border:1px solid #CCFBF1;">
        <p style="margin:0 0 4px 0; font-weight:600; font-size:14px;">Event Details:</p>
        <ul style="margin:8px 0 0 18px; padding:0; font-size:14px; line-height:1.7; color:#4B5563;">
          <li>📅 Saturday, 13th December 2025</li>
          <li>⏰ 10:00 AM - 7:00 PM</li>
          <li>📍 Four Points by Sheraton, Kampala</li>
          <li>📺 Live streaming available on YouTube: <a href="https://www.youtube.com/@leoafricainstitute" target="_blank" rel="noopener">@leoafricainstitute</a></li>
        </ul>
      </div>

    </div>

    <p style="margin-top:24px; font-size:14px; line-height:1.6; color:#4B5563;">
      Warm regards,<br/>
      <strong>The LéO Africa Institute Team</strong><br/>
      #ALG2025 | Building Together for Impact
    </p>

    <p style="margin-top:16px; font-size:12px; line-height:1.5; color:#6B7280; text-align:center;">
      You're receiving this email because you registered for ALG 2025.<br/>
      We look forward to seeing you at the Annual Leaders Gathering.
    </p>
  </div>
</body>
</html>
