<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Panelist Connection Link – ALG 2025</title>
  <style>
    body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color:#111827; margin:0; padding:0; }
    .container { max-width: 640px; margin: 0 auto; padding: 24px; }
    .badge { display:inline-block; padding:6px 10px; border-radius:9999px; background:#F0FDFA; color:#0F766E; font-weight:600; font-size:12px; letter-spacing:.08em; text-transform:uppercase; }
    .btn { display:inline-block; padding:12px 20px; border-radius:9999px; background:#0FB5A8; color:#fff !important; text-decoration:none; font-weight:700; font-size:14px; }
    .card { background:#fff; border:1px solid #E5E7EB; border-radius:16px; box-shadow:0 10px 30px rgba(15,23,42,0.08); }
    .hr { height:1px; background:linear-gradient(90deg, rgba(0,0,0,0) 0%, #E5E7EB 35%, #E5E7EB 65%, rgba(0,0,0,0) 100%); border:0; }
    a { color:#0FB5A8; }
  </style>
</head>
<body>
  <div class="container">
    <div style="text-align:center; margin-bottom:20px;">
      <img src="{{ url('/assets/logos/ALG.png') }}" alt="Annual Leaders Gathering" style="height:40px; width:auto; display:inline-block;" />
    </div>

    <span class="badge">ALG 2025 • Panelist Briefing</span>
    <h1 style="margin-top:16px; font-size:22px; font-weight:600; color:#0F766E;">Your Panelist Connection Link</h1>

    <p style="margin-top:16px; font-size:15px; line-height:1.7;">Dear {{ $speakerName }},</p>

    <div class="card" style="margin-top:16px; padding:20px 22px;">
      <p style="margin:0; font-size:15px; line-height:1.7;">
        Thank you for confirming your participation in the Annual Leaders Gathering 2025 on <strong>December 13, 2025</strong>. We are delighted to have you join us virtually for this important event.
      </p>

      <div style="margin-top:18px; padding:16px; border-radius:12px; background:#F0FDFA; border-left:4px solid #0FB5A8;">
        <p style="margin:0 0 10px 0; font-weight:700; font-size:14px; color:#0F766E;">Your unique connection link:</p>
        <p style="margin:0; text-align:center;">
          <a href="{{ $joinUrl }}" class="btn">Join as Panelist</a>
        </p>
        <p style="margin:10px 0 0 0; font-size:13px; line-height:1.5; color:#115e59; word-break:break-all;">
          Backup link: <a href="{{ $joinUrl }}">{{ $joinUrl }}</a>
        </p>
      </div>

      <hr class="hr" style="margin:18px 0;" />

      <div style="margin-top:4px;">
        <p style="margin:0 0 8px 0; font-weight:700; font-size:14px; color:#0F766E;">Technical requirements</p>
        <ul style="margin:0 0 12px 18px; padding:0; font-size:14px; line-height:1.7; color:#4B5563;">
          <li>Stable internet connection (minimum 5 Mbps upload/download recommended)</li>
          <li>Webcam enabled for video participation</li>
          <li>Quality headset or microphone for clear audio</li>
          <li>Updated browser or Zoom application</li>
          <li>Quiet, well-lit environment for your presentation</li>
        </ul>

        <p style="margin:12px 0 8px 0; font-weight:700; font-size:14px; color:#0F766E;">Day-of-event protocol</p>
        <ul style="margin:0; padding-left:18px; font-size:14px; line-height:1.7; color:#4B5563;">
          <li>Join the virtual waiting room 15 minutes before your scheduled session</li>
          <li>Our technical team will run quick checks and ensure everything is functioning properly</li>
          <li>You will be introduced by the moderator/MC before your session begins</li>
          <li>After your presentation, you are welcome to stay connected and follow the remaining sessions</li>
        </ul>
      </div>

      <hr class="hr" style="margin:18px 0;" />

      <p style="margin:0; font-size:14px; line-height:1.7;">
        If you have any questions or require further assistance, please feel free to reach out.
      </p>
    </div>

    <p style="margin-top:24px; font-size:14px; line-height:1.6; color:#4B5563;">
      Warm regards,<br/>
      <strong>The LéO Africa Institute Team</strong><br/>
      #ALG2025 | Building Together for Impact
    </p>
  </div>
</body>
</html>
