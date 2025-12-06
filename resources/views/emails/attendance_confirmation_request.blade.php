<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ALG 2025 Attendance Confirmation</title>
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

    <span class="badge">ALG 2025</span>
    <h1 style="margin-top:16px; font-size:24px; font-weight:600;">Hi {{ $fullName }},</h1>

    <div class="card" style="margin-top:16px; padding:20px 22px;">
      <h2 style="margin-top:0; margin-bottom:8px; font-size:20px; font-weight:600;">#ALG2025 Registration is Closed!</h2>
      <p style="margin:0; font-size:15px; line-height:1.7;">
        Thank you to the <strong>200+ guests</strong> who have registered for the 2025 Annual Leaders Gathering!
      </p>
      <p style="margin-top:12px; font-size:15px; line-height:1.7;">
        We can't wait to see you as we dive into deep insights on building together for impact&mdash;at the personal level, institutional level, and in partnership with key stakeholders.
      </p>
      <p style="margin-top:12px; font-size:15px; line-height:1.7;">
        Couldn't register? No problem! <strong>#ALG2025 will be streamed live</strong> on our key platforms&mdash;join the conversation virtually!
      </p>
      <p style="margin-top:12px; font-size:15px; line-height:1.7;">
        <strong>Coming Monday:</strong> Keynote speaker announcement and full program lineup!
      </p>

      <hr class="hr" style="margin:18px 0;" />

      <p style="margin:0; font-size:14px; line-height:1.7;">
        To help us finalise logistics and make sure your experience is seamless, please take a moment to confirm how you will attend:
      </p>

      <p style="margin-top:14px;">
        <a href="{{ $attendanceUrl }}" class="btn">Confirm how I’ll attend</a>
      </p>

      <p style="margin-top:10px; font-size:12px; line-height:1.6; color:#6B7280;">
        This personalised link will allow you to choose whether you are attending <strong>in person in Kampala</strong> or <strong>joining virtually online</strong>.
      </p>

      <div style="margin-top:18px; padding:14px 16px; border-radius:14px; background:#F9FAFB; border:1px solid #E5E7EB;">
        <p style="margin:0 0 4px 0; font-weight:600; font-size:14px;">Event Details:</p>
        <ul style="margin:8px 0 0 18px; padding:0; font-size:14px; line-height:1.7; color:#4B5563;">
          <li>📅 Saturday, 13th December 2025</li>
          <li>📍 Four Points by Sheraton, Kampala</li>
          <li>📺 Live streaming available on YouTube: <a href="https://www.youtube.com/@leoafricainstitute" target="_blank" rel="noopener">@leoafricainstitute</a></li>
        </ul>
      </div>

      <p style="margin-top:16px; font-size:14px; line-height:1.7; color:#374151;">
        Registered participants, watch your inbox for further details. See you there&mdash;in person or online.
      </p>
    </div>

    <p style="margin-top:24px; font-size:14px; line-height:1.6; color:#4B5563;">
      Warm regards,<br/>
      <strong>LéO Africa Institute Team</strong><br/>
      <a href="mailto:alg@leoafricainstitute.org" style="color:#0FB5A8; text-decoration:none;">alg@leoafricainstitute.org</a><br/>
      The ALG 2025 Team
    </p>
  </div>
</body>
</html>
