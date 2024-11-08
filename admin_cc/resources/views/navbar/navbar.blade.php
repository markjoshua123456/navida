<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/dashboard/dashboard.css'])

</head>
<body>
    <nav class="navbar">
        <ul class="navbar-list">
            <li class="navbar-item">
                <a href="/dashboard" class="navbar-link">
                    <span class="icon-container"><img src="{{ asset('images/dashboard.png') }}" alt="Dashboard" /></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="navbar-item">
                <a href="/products/create" class="navbar-link">
                    <span class="icon-container"><img src="{{ asset('images/in.png') }}" alt="Stock In" /></span>
                    <span>Add Item</span>
                </a>
            </li>
            <li class="navbar-item">

                <a href="/products/list" class="navbar-link">
                    <span class="icon-container"><img src="{{ asset('images/out.png') }}" alt="Stock List" /></span>

                    <span>Stock List</span>
                </a>
            </li>
            <li class="navbar-item">

                <a href="/orders/request" class="navbar-link">

                    <span class="icon-container"><img src="{{ asset('images/request.png') }}" alt="Order Request" /></span>
                    <span>Order Request</span>
                </a>
            </li>
            <li class="navbar-item">

                <a href="/accounting" class="navbar-link">

                    <span class="icon-container"><img src="{{ asset('images/accounting.png') }}" alt="Accounting" /></span>
                    <span>Accounting</span>
                </a>
            </li>
            <li class="navbar-item">

                <a href="/products/menu" class="navbar-link">

                    <span class="icon-container"><img src="{{ asset('images/menu.png') }}" alt="Food Menu" /></span>
                    <span>Food Menu</span>
                </a>
            </li>
            <li class="navbar-item">

                <a href="/transaction" class="navbar-link">
                    <span class="icon-container"><img src="{{ asset('images/transact.png') }}" alt="Transaction" /></span>
                    <span>Transaction</span>
                </a>
            </li>
            <li class="navbar-item">

                <a href="/user_profiles" class="navbar-link">

                    <span class="icon-container"><img src="{{ asset('images/user.png') }}" alt="User" /></span>
                    <span>User</span>
                </a>
            </li>
            <li class="navbar-item">

                <a href="/events" class="navbar-link">
                    <span class="icon-container"><img src="{{ asset('images/event.png') }}" alt="Event" /></span>
                    <span>Event Booking</span>
                </a>
            </li>
        </ul>
    </nav>
    
</body>
</html>
