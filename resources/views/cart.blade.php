<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <header class="bg-gray-900 text-white p-4">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center">
                <img src="https://scontent.fceb6-1.fna.fbcdn.net/v/t39.30808-6/253164628_438577367898864_246071918641166241_n.png?_nc_cat=100&ccb=1-7&_nc_sid=cc71e4&_nc_eui2=AeGDA7KWMpIJcPQ2dn96tlzPjam16vEwerCNqbXq8TB6sGP-WixF9yqBWVKe2DZ92EzQSDbQ42F5dgJkiEsDpI1x&_nc_ohc=Esfs7p_Bul0Q7kNvgG4emx0&_nc_ht=scontent.fceb6-1.fna&oh=00_AYAEN56apjTnNDEaOATcgUt1rTzC-FdM1txyDImJDLMAXw&oe=66A87AF1" alt="GESTOURAGE Logo" class="h-12 w-auto mr-4">
                <h1 class="text-2xl font-bold">GESTOURAGE</h1>
            </div>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="text-white hover:underline">Home</a></li>
                    <li><a href="#" class="text-white hover:underline">Shop</a></li>
                    <li><a href="#" class="text-white hover:underline">About</a></li>
                    <li><a href="#" class="text-white hover:underline">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container mx-auto mt-5">
        <div class="container mx-auto p-4 max-w-lg bg-white rounded-lg shadow-lg mt-10">
            <h1 class="text-2xl font-bold mb-4 text-center">{{$userFname}} {{$userLname}}'s Shopping Cart</h1>
            <div id="cart" class="space-y-4">
                @foreach($cartItems as $item)
                    <div class="flex items-center justify-between border border-gray-200 rounded p-4" data-id="{{ $item->id }}">
                        <img src="{{ $item->product->prodImageURL }}" alt="{{ $item->product->prodName }}" class="w-16 h-16 object-cover mr-4">
                        <div class="flex-1">
                            <div class="text-lg font-semibold">{{ $item->product->prodName }}</div>
                            <div class="text-sm text-gray-600">
                                Price: ₱ <span class="item-price" data-price="{{ $item->cartPriceEach }}">{{ $item->cartPriceEach }}</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="decrement bg-red-500 text-white px-2 py-1" data-id="{{ $item->id }}">-</button>
                            <span class="quantity">{{ $item->cartQuantity }}</span>
                            <button class="increment bg-green-500 text-white px-2 py-1" data-id="{{ $item->id }}">+</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                <h2 class="text-xl font-semibold">Total: ₱ <span id="total-price">0.00</span></h2>
            </div>
            <div class="mt-4">
                <button id="checkout-button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Proceed to Checkout</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            document.getElementById('checkout-button').addEventListener('click', function () {
                alert('Redirect to checkout page....');
            });

            // Get CSRF token from meta tag
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            function updateTotalPrice() {
                let total = 0;
                $('#cart .flex').each(function() {
                    const quantityText = $(this).find('.quantity').text();
                    const quantity = parseInt(quantityText, 10);
                    const pricePerItemText = $(this).find('.item-price').data('price');
                    const pricePerItem = parseFloat(pricePerItemText);

                    if (!isNaN(quantity) && !isNaN(pricePerItem)) {
                        total += quantity * pricePerItem;
                    }
                });

                $('#total-price').text(total.toFixed(2));
            }

            $('#cart').on('click', '.increment, .decrement', function() {
                const button = $(this);
                const itemId = button.data('id');
                const quantityElement = button.siblings('.quantity');
                let quantity = parseInt(quantityElement.text(), 10);

                if (button.hasClass('increment')) {
                    quantity++;
                } else if (button.hasClass('decrement')) {
                    quantity--;
                }

                // Send the update to the server
                $.ajax({
                    url: '/cart/update',
                    method: 'POST',
                    data: {
                        itemId: itemId,
                        quantity: quantity,
                        _token: csrfToken 
                    },
                    success: function(response) {
                        if (response.success) {
                            if (quantity === 0) {
                                if(confirm('Do you really want to remove this item in your shopping cart?')){
                                    $('#cart .flex[data-id="' + itemId + '"]').remove();
                                }
                            } else {
                                quantityElement.text(quantity);
                            }
                            updateTotalPrice();
                        } else {
                            console.error('Failed to update cart');
                        }
                    },
                    error: function() {
                        console.error('Error during AJAX request');
                    }
                });
            });

            // Initial total price calculation
            updateTotalPrice();
        });
    </script>
</body>
</html>
