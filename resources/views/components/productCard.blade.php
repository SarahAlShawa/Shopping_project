
    <div class= "col-md-3 col-sm-6 my-3 my-md-10">

            <a href="/comment/{{$product->id}}">
            <div class="card shadow">
                <div>

                    <img src="{{asset($product->image)}}" alt="Image1" class=" card-img-top">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <h6>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </h6>
                    <p class="card-text">
                        Half Fancy Lady Dress.
                    </p>
                    <h5>

                        <small><s class="text-secondary"> $350 </s></small>

                        <span class="price">$ {{$product->price}}</span>
                    </h5>

                    @auth
                        <form action="/cart/store" method="POST">
                            @csrf
                            <input type='hidden' name='product_id' value='{{$product->id}}'>
                            <button type="submit" class="bg-zinc-600 p-2 text-gray-100 m-2 rounded-sm"  name="add">Add to Cart  <i class="fas fa-shopping-cart"></i></button>
                        </form>
                    @endauth
                </div>
            </div>
            </a>

    </div>
