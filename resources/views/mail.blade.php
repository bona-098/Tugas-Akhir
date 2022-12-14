<!DOCTYPE html>
<html>
<head>
    <title>saa.itk.ac.id</title>
</head>
<body
    style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
    <table
        style="max-width:670px;margin:50px auto 10px;
  background-color:#fff;padding:50px;-webkit-border-radius:3px;
  -moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px 
  rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px
  rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px 
  rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px red;">
        <thead>
            <tr>
            <th style="text-align:left;font-weight:400;font-weight:bold;font-size:28px;">{{ $details['title'] }}</th>
            </tr>
            <tr>
            <th style="text-align:left;font-weight:400;">{{ $details['body'] }}</th>
            <th style="text-align:right;font-weight:400;">05th Apr, 2017</th>
            </tr>
        </thead>
        <tr>
            <td style="height:35px;"></td>
        </tr>
        <tr>
            <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                <p style="font-size:14px;margin:0 0 6px 0;">
                    <span style="font-weight:bold;display:inline-block;min-width:150px">Order status</span>
                    <b style="color:green;font-weight:normal;margin:0">Proses</b>
                </p>
            </td>
        </tr>
        <tr>
            <td style="height:35px;"></td>
        </tr>
        <tr>
            <td style="width:50%;padding:20px;vertical-align:top">
                <p style="margin:0 0 10px 0;padding:0;font-size:14px;">
                    <span style="display:block;font-weight:bold;font-size:13px">Name</span> {{ $details['nama'] }}
                </p>
                <p style="margin:0 0 10px 0;padding:0;font-size:14px;">
                    <span style="display:block;font-weight:bold;font-size:13px;">Hari</span> {{ $details['hari'] }}
                </p>
            </td>
            <td style="width:50%;padding:20px;vertical-align:top">
                <p style="margin:0 0 10px 0;padding:0;font-size:14px;">
                    <span style="display:block;font-weight:bold;font-size:13px;">Sesi</span> {{ $details['sesi'] }}
                </p>
                <p style="margin:0 0 10px 0;padding:0;font-size:14px;">
                    <span style="display:block;font-weight:bold;font-size:13px;">Keluhan</span>
                    {{ $details['pesan'] }}
                </p>
            </td>
        </tr>
        </tbody>
        <tfooter>
            <tr>
                <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                    <b>Phone:</b> 08522220011<br>
                    <b>Email:</b> studentautomotiveassociation15@gmail.com
                </td>
            </tr>
        </tfooter>
    </table>

    <p>Thank you</p>
</body>

</html>
