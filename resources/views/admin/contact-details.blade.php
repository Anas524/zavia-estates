<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Messages - Admin Panel</title>
    <style>
        * {
            caret-color: transparent;
            user-select: none;
            box-sizing: border-box;
        }

        input, textarea, select, filter {
            caret-color: auto !important;
            user-select: text !important;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }

        h2 {
            color: #000;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 14px 20px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #EFBF04;
            color: #000;
        }

        tr:hover {
            background: #f9f9f9;
        }

        .back-home-btn {
            color: #000;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            position: relative;
            margin-top: 20px;
        }

        .back-home-btn::after {
            content: "";
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: currentColor;
            transition: width 0.3s ease;
        }

        .back-home-btn:hover::after {
            width: 100%;
        }
    </style>
</head>

<body>
    <h2>Contact Form Submissions</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Submitted On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $index => $contact)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone ?? '-' }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at->format('d M Y - h:i A') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/" class="back-home-btn">← Back to Home</a>
</body>

</html>