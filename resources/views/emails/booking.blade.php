<!DOCTYPE html>
<html>
<head>
    <title>New Course Enrollment</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #ed6109; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background-color: #F5E9DD; }
        .details { background-color: white; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .footer { text-align: center; font-size: 12px; color: #777; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Course Enrollment</h1>
        </div>
        <div class="content">
            <p>A new enrollment has been made for the : <strong>{{ $room->name }} Room</strong></p>
            <div class="details">
                <h2>Booking Details</h2>
                <p><strong>Name:</strong> {{ $booking->name }}</p>
                <p><strong>Email:</strong> {{ $booking->email }}</p>
                <p><strong>Phone:</strong> {{ $booking->phone }}</p>
                <p><strong>No. of People:</strong> {{ $booking->no_of_people }}</p>
                <p><strong>Check in:</strong>{{ $booking->check_in}}</p>
                <p><strong>Check Out:</strong>{{ $booking->check_out}}</p>
                <p><strong>Check Out:</strong>{{ $booking->special_request}}</p>
                @if($booking->pickup_details)
                <p><strong>Pickup Details:</strong> {{ $booking->pickup_details }}</p>
                @endif
                <p><strong>Booking Date:</strong> {{ $booking->created_at->format('F j, Y, g:i a') }}</p>
            </div>