<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ALG 2025 Keynote & Attendance Confirmation</title>
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
    <h1 style="margin-top:16px; font-size:24px; font-weight:600;">Dear {{ $fullName }},</h1>

    <div class="card" style="margin-top:16px; padding:20px 22px;">
      <h2 style="margin-top:0; margin-bottom:8px; font-size:20px; font-weight:600;">Keynote Speaker Announced &mdash; Plus a Quick Attendance Reminder</h2>

      <p style="margin:0; font-size:15px; line-height:1.7;">We're thrilled to announce our first keynote speaker for the 2025 Annual Leaders Gathering:</p>

      <p style="margin-top:12px; font-size:15px; line-height:1.7;">
        <strong>Mr. Chairs Mudiwa</strong><br/>
        Managing Director &amp; CEO, DFCU Bank
      </p>

      <p style="margin-top:12px; font-size:15px; line-height:1.7;">
        Mr. Mudiwa will share powerful insights on building together for impact&mdash;with a focus on <strong>"Excellence as a Standard: Sustaining High-Performance Leadership in Challenging Contexts"</strong>.
      </p>

      <hr class="hr" style="margin:18px 0;" />

      <p style="margin:0; font-size:14px; line-height:1.7;">
        If you haven't yet confirmed how you will attend <strong>#ALG2025</strong>, please do so by <strong>end of day tomorrow, Tuesday</strong>.
        This helps us finalise logistics and ensure your experience is seamless.
      </p>

      <p style="margin-top:14px;">
        <a href="{{ $attendanceUrl }}" class="btn">Confirm how I’ll attend (in person or virtual)</a>
      </p>

      <p style="margin-top:10px; font-size:12px; line-height:1.6; color:#6B7280;">
        This personalised link will allow you to choose whether you are attending <strong>in person in Kampala</strong> or <strong>joining virtually online</strong>.
      </p>

      <hr class="hr" style="margin:18px 0;" />

      <p style="margin:0; font-size:14px; line-height:1.7;">
        We're excited to see such strong interest in this year's gathering. Your participation will make this event truly impactful as we explore deep insights and build connections that matter.
      </p>

      <p style="margin-top:12px; font-size:14px; line-height:1.7;">
        <strong>#ALG2025</strong> will be streamed live on our key platforms&mdash;join the conversation virtually and be part of the experience from wherever you are.
      </p>

      <p style="margin-top:16px; font-size:14px; line-height:1.7;">
        <strong>Coming This Week:</strong><br/>
        &bull; Full program lineup<br/>
        &bull; Additional keynote speaker announcements<br/>
        <span style="color:#6B7280;">Stay tuned for more exciting updates!</span>
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
        We look forward to seeing you soon.
      </p>
    </div>

    <p style="margin-top:24px; font-size:14px; line-height:1.6; color:#4B5563;">
      Warm regards,<br/>
      <strong>ALG 2025 Organizing Team</strong><br/>
      #ALG2025 | Building Together for Impact
    </p>
  </div>
</body>
</html>
