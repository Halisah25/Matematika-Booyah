<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Modul Matematika Booyah</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f4; font-family: Arial, Helvetica, sans-serif;">

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding: 30px 0;">
        <tr>
            <td align="center">

                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius: 12px; overflow:hidden; max-width:600px; width:100%;">

                    <!-- ===== HEADER ===== -->
                    <tr>
                        <td style="padding: 24px 30px; border-bottom: 1px solid #eee;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <table role="presentation" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding-right:10px;">
                                                    <img src="{{ asset('images/icon-gmail.png') }}" width="28" height="28" alt="Gmail" style="display:block;">
                                                </td>
                                                <td style="font-size:18px; font-weight:bold; color:#222;">Email</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- ===== BODY ===== -->
                    <tr>
                        <td style="padding: 30px;">

                            <h1 style="font-size:19px; font-weight:800; color:#222; margin:0 0 4px;">
                                E-Modul Matematika Booyah&nbsp;&nbsp;- Terima kasih telah membeli! 🎉
                            </h1>

                            <table role="presentation" cellpadding="0" cellspacing="0" style="margin: 14px 0 20px;">
                                <tr>
                                    <td style="background-color:#F1F1F1; border-radius:6px; padding:4px 12px; font-size:13px; color:#555;">
                                        Inbox
                                    </td>
                                </tr>
                            </table>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <!-- LEFT: TEXT -->
                                    <td valign="top" style="padding-right: 20px;">

                                        <table role="presentation" cellpadding="0" cellspacing="0" style="margin-bottom:14px;">
                                            <tr>
                                                <td style="padding-right:10px;" valign="top">
                                                    <img src="{{ asset('images/logo_mtk_booyah.jpeg') }}" width="36" height="36" alt="Matematika Booyah" style="display:block; border-radius:50%; object-fit:cover;">
                                                </td>
                                                <td valign="top">
                                                    <div style="font-size:14px; font-weight:700; color:#222;">Matematika Booyah <span style="font-weight:400; color:#888; font-size:12.5px;">&lt;noreply@matematikabooyah.com&gt;</span></div>
                                                    <div style="font-size:12.5px; color:#888;">kepada saya</div>
                                                </td>
                                            </tr>
                                        </table>

                                        <p style="font-size:14px; color:#333; margin:0 0 16px;">Halo {{ $nama }},</p>

                                        <p style="font-size:14px; color:#333; margin:0 0 16px;">
                                            Terima kasih telah membeli<br>
                                            <strong>E-Modul Matematika Booyah</strong>.
                                        </p>

                                        <p style="font-size:14px; color:#333; margin:0 0 16px;">
                                            E-Modul Level A, B, C (Lengkap) yang bunda beli sudah kami kirimkan.
                                        </p>

                                        <p style="font-size:14px; color:#333; margin:0 0 20px;">
                                            Silahkan klik tombol di bawah untuk mengunduh e-modulnya.
                                        </p>

                                        <table role="presentation" cellpadding="0" cellspacing="0" style="margin-bottom:20px;">
                                            <tr>
                                                <td style="background-color:#E2577A; border-radius:8px;">
                                                    <a href="{{ $downloadUrl }}" target="_blank" style="display:inline-block; padding:12px 22px; font-size:14px; font-weight:700; color:#ffffff; text-decoration:none;">
                                                        &#8595; Download E-Modul
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>

                                        <p style="font-size:13px; color:#555; margin:0 0 6px;">
                                            Jika tombol tidak berfungsi, salin link berikut ke browser:
                                        </p>
                                        <p style="font-size:13px; margin:0 0 20px; word-break:break-all;">
                                            <a href="{{ $downloadUrl }}" style="color:#4A90D9; text-decoration:underline;">{{ $downloadUrl }}</a>
                                        </p>

                                        <p style="font-size:14px; color:#333; margin:0 0 16px;">
                                            Selamat belajar dan semoga bermanfaat! 🧡
                                        </p>

                                        <p style="font-size:14px; color:#333; margin:0;">
                                            Tim Matematika Booyah
                                        </p>

                                    </td>

                                    <!-- RIGHT: ILLUSTRATION -->
                                    <td valign="top" width="180" style="text-align:center;">
                                        <img src="{{ asset('images/illustration-email.png') }}" alt="E-Modul Matematika Booyah" width="160" style="max-width:160px; height:auto;">
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- ===== FOOTER ===== -->
                    <tr>
                        <td style="padding: 20px 30px; border-top:1px solid #eee; text-align:center;">
                            <p style="font-size:12px; color:#999; margin:0;">
                                &copy; {{ date('Y') }} Matematika Booyah. Semua Hak Dilindungi.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>