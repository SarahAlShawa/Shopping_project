
<h1>Cart Items</h1>

<p>Visa Card: {{ $formFields["card_number"] }}</p>
<p>Name: {{ $formFields["name"]}}</p>
<p>Phone Number: {{ $formFields["phone_number"] }}</p>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @if($cartItems)
        @foreach($cartItems as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['price'] }}</td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>

<a href="/"><button>Back To Home</button></a>
