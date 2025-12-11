<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Africa Champions Breakfast - ALG 2025</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f5f5f5;">
    <table role="presentation" style="width: 100%; border-collapse: collapse; background-color: #f5f5f5;">
        <tr>
            <td style="padding: 40px 20px;">
                <table role="presentation" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    
                    <!-- Header with gradient -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%); padding: 40px 30px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; font-weight: 600; letter-spacing: -0.5px;">
                                Annual Leaders Gathering 2025
                            </h1>
                            <p style="margin: 10px 0 0 0; color: #ccfbf1; font-size: 16px; font-weight: 500;">
                                #ALG2025 • Saturday, 13th December 2025
                            </p>
                        </td>
                    </tr>

                    <!-- Main Content -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <p style="margin: 0 0 20px 0; color: #1f2937; font-size: 16px; line-height: 1.6;">
                                Dear <strong>{{ $reservation->full_name }}</strong>,
                            </p>

                            <p style="margin: 0 0 20px 0; color: #374151; font-size: 16px; line-height: 1.7;">
                                We are thrilled to confirm your registration for the <strong>Annual Leaders Gathering 2025</strong> happening this Saturday, 13th December 2025.
                            </p>

                            <p style="margin: 0 0 20px 0; color: #374151; font-size: 16px; line-height: 1.7;">
                                This year's gathering brings together Africa's emerging and established leaders for a full day of inspiring keynotes, panel discussions, and meaningful connections around our theme: <strong>"Building Together For Impact"</strong>.
                            </p>

                            <p style="margin: 0 0 20px 0; color: #374151; font-size: 16px; line-height: 1.7;">
                                Your presence and participation will contribute to the rich dialogue and collaborative spirit that defines ALG.
                            </p>

                            <!-- QR Code Section -->
                            <table role="presentation" style="width: 100%; background: linear-gradient(135deg, #ccfbf1 0%, #99f6e4 100%); border-radius: 12px; margin: 30px 0; padding: 30px; text-align: center;">
                                <tr>
                                    <td>
                                        <p style="margin: 0 0 15px 0; color: #115e59; font-size: 16px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                                            🎫 Your Personal QR Code
                                        </p>
                                        <div style="background-color: #ffffff; padding: 20px; border-radius: 8px; display: inline-block; margin: 0 auto;">
                                            <img src="{{ $qrCodeUrl }}" alt="Attendance QR Code" style="width: 200px; height: 200px; display: block;">
                                        </div>
                                        <p style="margin: 20px 0 10px 0; color: #134e4a; font-size: 15px; font-weight: 600;">
                                            Please bring this QR code to the event
                                        </p>
                                        <p style="margin: 0; color: #115e59; font-size: 14px; line-height: 1.6;">
                                            You can either <strong>print this email</strong> or <strong>show it on your device</strong><br>
                                            for quick check-in at the entrance.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <!-- CTA Button -->
                            <table role="presentation" style="margin: 30px 0; width: 100%;">
                                <tr>
                                    <td style="text-align: center;">
                                        <a href="{{ route('events.2025.programme') }}" style="display: inline-block; padding: 16px 32px; background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%); color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 16px; box-shadow: 0 4px 6px rgba(13, 148, 136, 0.2);">
                                            View Full Programme
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <!-- Info Box -->
                            <table role="presentation" style="width: 100%; background-color: #ccfbf1; border-left: 4px solid #14b8a6; border-radius: 4px; margin: 25px 0;">
                                <tr>
                                    <td style="padding: 20px;">
                                        <p style="margin: 0 0 10px 0; color: #115e59; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                                            📎 Attachment
                                        </p>
                                        <p style="margin: 0; color: #134e4a; font-size: 15px; line-height: 1.6;">
                                            The full schedule for <strong>#ALG2025</strong> is attached for your reference.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin: 25px 0 0 0; color: #374151; font-size: 16px; line-height: 1.7;">
                                We look forward to welcoming you to what promises to be an inspiring and transformative gathering.
                            </p>

                            <p style="margin: 20px 0 0 0; color: #374151; font-size: 16px; line-height: 1.7;">
                                See you on Saturday!
                            </p>

                            <p style="margin: 30px 0 0 0; color: #1f2937; font-size: 16px; line-height: 1.6;">
                                Warm regards,<br>
                                <strong style="color: #0d9488;">The LéO Africa Institute Team</strong>
                            </p>
                        </td>
                    </tr>

                    <!-- Event Details -->
                    <tr>
                        <td style="background-color: #ccfbf1; padding: 30px; border-top: 1px solid #99f6e4;">
                            <table role="presentation" style="width: 100%;">
                                <tr>
                                    <td style="padding: 0 0 15px 0;">
                                        <p style="margin: 0; color: #115e59; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                                            Event Details
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table role="presentation" style="width: 100%;">
                                            <tr>
                                                <td style="padding: 8px 0; color: #134e4a; font-size: 15px;">
                                                    <strong>📅 Date:</strong> Saturday, 13th December 2025
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0; color: #134e4a; font-size: 15px;">
                                                    <strong>⏰ Time:</strong> 10:00 AM - 7:00 PM
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0; color: #134e4a; font-size: 15px;">
                                                    <strong>📍 Venue:</strong> Four Points by Sheraton, Kampala
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #1f2937; padding: 30px; text-align: center;">
                            <p style="margin: 0 0 15px 0; color: #d1d5db; font-size: 14px; line-height: 1.6;">
                                <strong style="color: #ffffff;">LéO Africa Institute</strong><br>
                                Building Together For Impact
                            </p>
                            <p style="margin: 0; color: #9ca3af; font-size: 13px;">
                                <a href="{{ route('home') }}" style="color: #14b8a6; text-decoration: none;">Visit our website</a> • 
                                <a href="{{ route('events.2025.programme') }}" style="color: #14b8a6; text-decoration: none;">View Full Programme</a>
                            </p>
                        </td>
                    </tr>

                </table>

                <!-- Footer Note -->
                <table role="presentation" style="max-width: 600px; margin: 20px auto 0;">
                    <tr>
                        <td style="text-align: center; padding: 0 20px;">
                            <p style="margin: 0; color: #6b7280; font-size: 12px; line-height: 1.5;">
                                You're receiving this email because you registered for ALG 2025.<br>
                                We look forward to seeing you at the Annual Leaders Gathering.
                            </p>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</body>
</html>
