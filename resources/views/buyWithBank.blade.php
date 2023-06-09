<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<style>
    form{
         width: 100%; 
         /* margin:0 auto;  */
         
         height: 400px;
         padding:30px;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
         margin: 5%; 
        background-color: #f2f2f2;

    }
     
</style>

<div class="col-md-4 p-4 container d-flex justify-content-center ">
                     <form   method="post" target="_self" action="/bankpay">  
                        @csrf
                        <div class="mb-2">
                            <label>Full Name</label>
                            <input type="text" placeholder="Name"  name="name" class="form-control" required/>
                        </div>
                        <div class="mb-2">
                            <label> Phone Number </label>
                            <input type="text" placeholder="Phone"  name="phoneNumber" class="form-control" required/>
                        </div>
                       
                        <div class="mb-2">
                            <label> Address</label>
                            <input placeholder="Address" class="form-control" name="address"   required/> 
                        </div>   
                        <br>
                        <!-- <input type="submit"  value=" Make Purchase"> -->
                        <button class="btn btn-primary w-100" type="submit">Make Purchase</button>
                     </form>
                 </div>

 
                <x-footer />
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>