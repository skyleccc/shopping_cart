<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app"
        data-cart-items="{{ json_encode($cartItems) }}"
        data-user-fname="{{ $userFname }}"
        data-user-lname="{{ $userLname }}">
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>