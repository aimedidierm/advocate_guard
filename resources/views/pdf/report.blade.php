<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportings report</title>
</head>

<body class="bg-opacity-50">
    <div class="container mx-auto p-4">
        <center>
            <h2 class="text-2xl font-semibold mb-4">List of all reporteds</h2>
        </center>

        <table class="w-full table-auto border border-collapse">
            <thead>
                <tr>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">Date</th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">Subject</th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">Victim</th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">Location</th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">Status</th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">Hapenned</th>
                </tr>
            </thead>
            <tbody>
                @if ($reports->isEmpty())
                <tr>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;" colspan="7">No available data</td>
                </tr>
                @else
                @foreach ($reports as $report)
                <tr>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">{{ $report->created_at->format('Y-m-d') }}
                    </td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">{{ $report->subject }}</td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">{{ $report->victim }}</td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">{{ $report->location }}</td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">{{ $report->still_going ? 'Still Ongoing' :
                        'Resolved' }}</td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">{{ $report->when }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br>
        <table style="width: 100%;">
            <tr>
                <td style="width: 60%;">

                </td>
                <td style="width: 40%;">
                    <h4 class="text-2xl font-semibold mb-4">Printed on: {{now()}}</h4>
                    <h4 class="text-2xl font-semibold mb-4">Printed by {{Auth::user()->first_name}}</h4>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>