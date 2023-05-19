<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa page</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');


body{
background: linear-gradient( rgba(235,224,232,1) 52%,rgba(254,191,1,1) 100%);
font-family: 'Roboto', sans-serif;
}

.card{
	border: none;
	max-width: 450px;
	border-radius: 15px;
	margin: 150px 0 150px;
	padding: 35px;
	padding-bottom: 20px!important;
	box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.heading{
	color: #C1C1C1;
	font-size: 16px;
	font-weight: 600;
}
img{
	transform: translate(160px,-10px);
}
img:hover{
    cursor: pointer;
}
.text-warning{
	font-size: 12px;
	font-weight: 600;
	color: #BE2C69!important;
}
#cno{
	transform: translateY(-10px);
}
input{
	border-bottom: 1.5px solid #E8E5D2!important;
	font-weight: bold ;
	border-radius: 0;
	border: 0;

}

.form-group input:focus{
	border: 0;
	outline: 0;
}
.col-sm-5{
	padding-left: 90px;
}
.btn{
	background: #BE2C69;
	border: none;
	border-radius: 30px;
}
.btn:focus{
    box-shadow: none;
}  
</style>

<body>
<div class="container-fluid">
	<div class="row d-flex justify-content-center">
		<div class="col-sm-12">
			<div class="card mx-auto">
				<p class="heading">PAYMENT DETAILS</p>
					<form class="card-details" method="POST" action="/visapay">
						@csrf
						<div class="form-group mb-0">
								<p class="text-warning mb-0">Card Number</p>
								 
                          		<input type="text" name="card_number" placeholder="1234 5678 9012 3457" size="17" id="cno" minlength="19" maxlength="19">
								<img src="https://img.icons8.com/color/48/000000/visa.png" width="64px" height="60px" />
                        </div>

                        <div class="form-group">
                            <p class="text-warning mb-0">Cardholder's Name</p> <input type="text" name="name" placeholder="Name" size="17">
                        </div>
                        <div class="form-group pt-2">

                        	<div class="row d-flex">
                        		<div class="col-sm-6 form-group-left">
                        			<p class="text-warning mb-0">Phone Number</p>
                        			<input type="text" name="phone_number" placeholder="0591 111 111 " size="13" id="exp" minlength="10" maxlength="10">
                        		</div>   
                        	</div>
                        </div>		
					
                        <div class="col-1 mx-auto  float-left rounded">
                            <button class="btn btn-info" type="submit"> <i class="fas fa-arrow-right px-4 py-2"></i> </button>
                        </div>
						</form>
                    
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<x-footer />