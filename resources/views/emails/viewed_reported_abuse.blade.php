<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reported Abuse Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 2px solid #007bff;
        }

        .header h1 {
            margin: 0;
            color: #007bff;
        }

        .content {
            padding: 20px 0;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #888;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f9;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="header">
            <h1>Update on Your Reported Abuse Notification</h1>
        </div>

        <div class="content">
            <p>Hello User,</p>
            <p>Your abuse reported has been viewed of below are the details:</p>

            <table>
                <tr>
                    <th>Category</th>
                    <td>{{ $report->type_abuse }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $report->description }}</td>
                </tr>
                <tr>
                    <th>Names</th>
                    <td>{{ $report->user->first_name }}</td>
                </tr>
                <tr>
                    <th>Province</th>
                    <td>{{ $report->province }}</td>
                </tr>
                <tr>
                    <th>District</th>
                    <td>{{ $report->district }}</td>
                </tr>
                <tr>
                    <th>Sector</th>
                    <td>{{ $report->sector }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $report->date_incident }}</td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <p>This is an automated email. Please do not reply to this message.</p>
        </div>
    </div>
</body>

</html>