<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Princess Dresses</title>
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<x-header></x-header>
<x-search />

<img src="{{asset("images/headerr.jpg")}}" alt="img">
<div class="container">
    <div class="row text-center py-5">
        @foreach($products as $product)
            <x-productCard :product="$product"/>
        @endforeach
    </div>
</div>
<section style="background-color: #F8E9F0;">
  <div class="container my-5 py-5 text-dark">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-6">
                <h5>Add a comment <i class="fa fa-comment""></i> </h5>
                 <h6>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </h6>
                <form method="POST" action="comment/create">
                    @csrf
                  <div class="form-outline">
                    <textarea name="comment" class="form-control" id="textAreaExample" rows="4" ></textarea>
                    <label class="form-label" for="textAreaExample">What is your view?</label>
                    @error("email")
                    <p class="text-red-500 text-xs mt-1">
                        {{$message}}
                    </p>
                    @enderror
                  </div>
                  <div class="d-flex justify-content-between mt-3  ">
                  <button type="submit" class="btn my-btn-success">   Send <i class="fas fa-long-arrow-alt-right ms-1"></i>  </button>
                </form>
                  <a href="/comment"><button type="button" class="btn my-btn-primary"> Show feedbacks</button></a>
                </div>
          </div>
        </div>
      </div>
</section>

<x-footer></x-footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
