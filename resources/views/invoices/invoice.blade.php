<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
</head>
<body>
    <h1>Invoice for Appointment #{{ $appointment->id }}</h1>
    <p>Date: {{ $appointment->start_date }} to {{ $appointment->end_date }}</p>
    <p>Total Price: ${{ $appointment->total_price }}</p>
</body>
</html>
