
<h1>Cart Items</h1>

<p>Name: {{ $formFields["name"] }}</p>
<p>Phone: {{ $formFields["phoneNumber"]}}</p>
<p>Address: {{ $formFields["address"] }}</p>

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
