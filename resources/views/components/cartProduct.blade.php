
    <div class="border rounded">
        <div class="row bg-white">
            <div class="col-md-3 pl-0">
                <img src="{{asset($data["cart"]["image"])}}" alt="Image1" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h5 class="pt-5">{{ucwords($data["cart"]["name"])}}</h5>
                <small class="text-secondary">Seller: Sarahalshawa</small>
                <h5 class="pt-2"></h5>
                <div id="cart-item-options">
                    <form>
                        <button type="submit" class="btn my-btn-success">Save for Later</button>
                    </form>
                    <form action="/cart/destroy" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="hidden" name="product_id" value="{{$data["id"]}}">
                        <button type="submit" class="btn my-btn-danger" name="remove">Remove</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3 py-5">
                <div>
                    <button type="button" value="{{$data["id"]}}" class="btn bg-light border rounded-circle minuss-cart-button"><i class="fas fa-minus"></i></button>
                    <input type="text" value="{{$data["cart"]["quantity"]}}" class="form-control w-25 d-inline">
                    <button type="button" value="{{$data["id"]}}" class="btn bg-light border rounded-circle plusCartButton"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
