<!DOCTYPE html>
<html>

<head>
    <title>New Table Reservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #ed6109;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
            background-color: #F5E9DD;
        }

        .details {
            background-color: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>New Table Reservation</h1>
        </div>

        <div class="content">
            <p>A new <strong>Table Booking</strong> has been made. Here are the details:</p>

            <div class="details">
                <h2>Reservation Details</h2>
                <p><strong>Name:</strong> {{ $table->name }}</p>
                <p><strong>Email:</strong> {{ $table->email ?? 'N/A' }}</p>
                <p><strong>Phone:</strong> {{ $table->phone ?? 'N/A' }}</p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($table->date)->format('F j, Y') }}</p>
                <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($table->time)->format('g:i A') }}</p>
                <p><strong>No. of Guests:</strong> {{ $table->guests }}</p>

                @if($table->pickup)
                    <p><strong>Pickup Required:</strong> Yes</p>
                    <p><strong>Pickup Location:</strong> {{ $table->pickup_location ?? 'Not Provided' }}</p>
                @else
                    <p><strong>Pickup Required:</strong> No</p>
                @endif

                @if($table->requests)
                    <p><strong>Special Requests:</strong> {{ $table->requests }}</p>
                @endif

                <p><strong>Booking Created:</strong> {{ $table->created_at->format('F j, Y, g:i a') }}</p>
            </div>
        </div>

        <div class="footer">
            <p>This is an automated message. Please do not reply.</p>
        </div>
    </div>
</body>

</html>
