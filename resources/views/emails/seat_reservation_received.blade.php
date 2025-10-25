<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ALG Seat Reservation</title>
  <style>
    body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color:#111827; }
    .container { max-width: 640px; margin: 0 auto; padding: 24px; }
    .badge { display:inline-block; padding:6px 10px; border-radius:9999px; background:#F0FDFA; color:#0F766E; font-weight:600; font-size:12px; letter-spacing:.08em; }
    .btn { display:inline-block; padding:12px 20px; border-radius:9999px; background:#0FB5A8; color:#fff; text-decoration:none; font-weight:700; }
  </style>
</head>
<body>
  <div class="container">
    <span class="badge">ALG</span>
    <h1 style="margin-top:16px; font-size:28px;">Thank you for your interest, {{ $fullName }}.</h1>
    <p style="margin-top:12px; font-size:16px; line-height:1.6;">We’ve received your request to reserve a seat for the Annual Leaders Gathering. Our team will review your submission and follow up with confirmation and next steps.</p>
    <p style="margin-top:12px; font-size:16px; line-height:1.6;">We look forward to welcoming you to a world‑class convening.</p>
    <p style="margin-top:24px; color:#6B7280; font-size:14px;">Warm regards,<br/>LéO Africa Institute</p>
  </div>
</body>
</html>
