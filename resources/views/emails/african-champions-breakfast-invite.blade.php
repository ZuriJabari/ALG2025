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
    <h1 style="margin-top:16px; font-size:24px; font-weight:600;">Dear {{ $reservation->full_name }},</h1>

    <div class="card" style="margin-top:16px; padding:20px 22px;">
      <p style="margin:0; font-size:15px; line-height:1.7;">
        We are excited for you to join us for the <strong>#ALG2025</strong>, and in particular, to confirm your attendance at the <strong>Africa Champions Breakfast</strong> happening this Saturday.
      </p>

      <p style="margin-top:12px; font-size:15px; line-height:1.7;">
        Your presence at this inaugural gathering is deeply meaningful to us.
      </p>

      <p style="margin-top:12px; font-size:15px; line-height:1.7;">
        If you have not yet confirmed for the Breakfast session, we kindly request that you confirm your attendance, so we can make the necessary preparations for an intimate and seamless experience. If you have already sent in your confirmation, we are excited to see you.
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

      <!-- Attendance Confirmation -->
      <p style="margin:0; font-size:14px; line-height:1.7;">
        If you haven't yet confirmed how you will attend <strong>#ALG2025</strong>, please do so as soon as possible.
        This helps us finalise logistics and ensure your experience is seamless.
      </p>

      <p style="margin-top:14px; text-align:center;">
        <a href="{{ $attendanceUrl }}" class="btn">Confirm how I'll attend (in person or virtual)</a>
      </p>

      <p style="margin-top:10px; font-size:12px; line-height:1.6; color:#92400E;">
        This personalised link will allow you to choose whether you are attending <strong>in person in Kampala</strong> or <strong>joining virtually online</strong>.
        If you have already confirmed how you will attend, you do not need to take any further action.
      </p>

      <hr class="hr" style="margin:18px 0;" />

      <p style="margin:0; font-size:14px; line-height:1.7; background:#FEF3C7; padding:12px 16px; border-radius:8px; border-left:3px solid #D97706;">
        <strong>📎 Attachments:</strong> The agenda for the Africa Champions Breakfast & Full Schedule for the main #ALG2025 are attached for your attention.
      </p>

      <hr class="hr" style="margin:18px 0;" />

      <p style="margin:0; font-size:14px; line-height:1.7;">
        Thank you once more for your steadfast support, your belief in our vision, and your commitment to Africa's future.
      </p>

      <p style="margin-top:12px; font-size:14px; line-height:1.7;">
        We look forward to hosting you for this special breakfast.
      </p>

      <div style="margin-top:18px; padding:14px 16px; border-radius:14px; background:#FEF3C7; border:1px solid #FDE68A;">
        <p style="margin:0 0 4px 0; font-weight:600; font-size:14px;">Event Details:</p>
        <ul style="margin:8px 0 0 18px; padding:0; font-size:14px; line-height:1.7; color:#4B5563;">
          <li>📅 Saturday, 13th December 2025</li>
          <li>⏰ 7:30 AM - 10:00 AM</li>
          <li>📍 Four Points by Sheraton, Kampala</li>
        </ul>
      </div>

      <p style="margin-top:16px; font-size:14px; line-height:1.7; color:#374151;">
        <a href="{{ route('acb') }}" class="btn">View Breakfast Programme</a>
      </p>
    </div>

    <p style="margin-top:24px; font-size:14px; line-height:1.6; color:#4B5563;">
      Warm regards,<br/>
      <strong>Emmanuel Awori</strong><br/>
      Partnerships & Development Lead<br/>
      +256 787 648584
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
