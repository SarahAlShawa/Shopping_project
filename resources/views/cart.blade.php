<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Your Cart </title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset("css/style.css")}}">
</head>
<body class="bg-light">

<x-header />

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h4><i class="fas fa-shopping-cart"></i> My Cart </h4>
                <hr>
                @if(isset($cart))
                    @foreach($cart as $key => $oneCart)
                        <x-cartProduct :data="['cart'=>$oneCart,'id'=>$key]" />
                    @endforeach
                @else
                    <h3 class="mt-2">Cart Is empty</h3>
                @endif


</div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h4>PRICE DETAILS</h4>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <h6 id="cart-price">Price (<span>{{$cartData["totalCount"]}}</span> items)</h6>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="cart-total-price"><span>{{$cartData["totalPrice"]}}</span> $</h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6 class="cart-total-price"><span>{{$cartData["totalPrice"]}}</span> $</h6>
                    </div>
                </div>
            </div>


            <form action="/bankpay">
                <div class="col-4 mx-auto p-4" name ="Buying" >
                    <button class="btn my-btn-primary" type="submit">Buying</button>
                </div>
            </form>
            <form action="/visapay">
                <div class=" col-6 mx-auto p-4 float-right rounded " name ="Payment" >
                  <button class="btn my-btn-primary" type="submit">Using Visa</button>
                </div>
            </form>


        </div>
    </div>

</div>
</div>
<x-footer />
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
