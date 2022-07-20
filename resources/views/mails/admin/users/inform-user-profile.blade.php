<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        span
        {
            border-bottom-style: solid;
            border-width: 1px;
        }

        .button
        {
            background-color: blue;
            border: none;
            color: white;
            padding: 12px 28px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            margin-top: 30px;

        }
        .line_heigh
        {
            line-height: 35px
        }
        table, td, th {
            border-bottom-style: solid;
            border-width: 1px;
        }

        table {
            width: 70%;
            border-collapse: collapse;
        }
    </style>
</head>
<h2>Hi, {{ $user["name"] }}</h2>
<h4>This email send from system</h4>
<h4>Please check your infomation. Is it correctly</h4>

<table>
    <tr class="line_heigh">
        <td>Name </td>
        <td>{{ $user["name"] }}</td>
    </tr>
    <tr class="line_heigh">
        <td>Email</td>
        <td>{{ $user["email"] }}</td>
    </tr>
    <tr class="line_heigh">
        <td>Address</td>
        <td>{{ $user["address"] }}</td>
    </tr>
</table>

<a href="http://demo.app.local/admin/user" class="button" style="color: white" >User Profile</a>
</html>
