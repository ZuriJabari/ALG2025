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
    <h1 style="margin-top:16px; font-size:24px; font-weight:600;">Dear {{ $reservation->full_name }},</h1>

    <div class="card" style="margin-top:16px; padding:20px 22px;">
      <h2 style="margin-top:0; margin-bottom:8px; font-size:20px; font-weight:600;">Your Invitation to ALG 2025</h2>

      <p style="margin:0; font-size:15px; line-height:1.7;">
        We are thrilled to confirm your registration for the <strong>Annual Leaders Gathering 2025</strong> happening this Saturday, 13th December 2025.
      </p>

      <p style="margin-top:12px; font-size:15px; line-height:1.7;">
        This year's gathering brings together Africa's emerging and established leaders for a full day of inspiring keynotes, panel discussions, and meaningful connections around our theme: <strong>"Building Together For Impact"</strong>.
      </p>

      <p style="margin-top:12px; font-size:15px; line-height:1.7;">
        Your presence and participation will contribute to the rich dialogue and collaborative spirit that defines ALG.
      </p>

      <hr class="hr" style="margin:18px 0;" />

      <!-- QR Code Section -->
      <div class="qr-box">
        <p style="margin:0 0 12px 0; font-weight:600; font-size:14px; color:#0F766E; text-transform:uppercase; letter-spacing:0.05em;">
          🎫 Your Personal QR Code
        </p>
        <div style="background:#fff; padding:16px; border-radius:8px; display:inline-block;">
          <img src="{{ $qrCodeUrl }}" alt="Attendance QR Code" style="width:180px; height:180px; display:block;" />
        </div>
        <p style="margin:12px 0 0 0; font-size:13px; line-height:1.6; color:#115e59;">
          Please <strong>print this email</strong> or <strong>show it on your device</strong> for quick check-in at the entrance.
        </p>
      </div>

      <hr class="hr" style="margin:18px 0;" />

      <p style="margin:0; font-size:14px; line-height:1.7;">
        We look forward to welcoming you to what promises to be an inspiring and transformative gathering.
      </p>

      <p style="margin-top:12px; font-size:14px; line-height:1.7;">
        See you on Saturday!
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

      <p style="margin-top:16px; font-size:14px; line-height:1.7; color:#374151;">
        <a href="{{ route('events.2025.programme') }}" class="btn">View Full Programme</a>
      </p>
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
