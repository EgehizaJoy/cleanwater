<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mulish:300,400,600,700,800,900">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,700">
	<link rel="stylesheet" href="css/datatables.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/mdb.min.css">
	<link rel="stylesheet" href="css/style2.css">
    <title>Quest Water</title>
  </head>
  <body>

  @include('sweetalert::alert')
  
   @include('layouts.navbar')

<!--Banner-->


	<!--Product Catalogue Start-->
	<section class=" text-dark p-5 " style="background:#f6fbff">
	<div class="container py-5">
		<div class="d-sm-flex py-5">
			<div class="container">

			@if (session()->has('success_message'))
             <div class="alert alert-success" role="alert">
             {{ session()->get('success_message') }}
                </div>
                
            @endif


            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
					<div class="row mb-5 ">
						<ul class="nav nav-pills" id="pills-tab" role="tablist"> 
							<h2 class="fw-bold" id="product-catalogue">Product Catalogue</h2>
								<li class="nav-item ms-auto" role="presentation">
									<button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-home" aria-selected="true" data-filter="all">All</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pills-refillable-tab" data-bs-toggle="pill" data-bs-target="#pills-refillable" type="button" role="tab" aria-controls="pills-refillable" aria-selected="false" data-filter="refillable">Refillable</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pills-stillwater-tab" data-bs-toggle="pill" data-bs-target="#pills-stillwater" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" data-filter="stillwater" style="width:110px;">Recyclable</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pills-small-tab" data-bs-toggle="pill" data-bs-target="#pills-small" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" data-filter="small">Small</button>
								</li>
						</ul>
						
						
						<!--Products start-->
						<!--1-->
						<?php 
use App\Http\Controllers\CartList;
$total=0;
if(Session::has('user'))
{
  $total= CartList::cartItem();
}
?>

                        @foreach($products as $product)
							<div class="col my-5" id="col-md-3">
								<div class="card mx-auto mt-5 itemBox refillable" id="pcard" style="width:243px;height:217px;border-radius:18px;" >
								<a href="detail/{{$product->id}}">
									<div class="text-center" id="pills-refillable">
										<img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" id="product_image" alt="{{$product->product_name}}" >
									</div>
									<div class="card-body" >
									<h5 class="card-title text-center"><a href="#" class="text-decoration-none text-dark">{{$product->product_name}}</a></h5>
									<p class="card-text text-center text-secondary text-opacity-50 fs-6"><small>{{$product->extra_detail}}</small></p>
									
									<p class="text-primary fw-bold" id="price">$ {{$product->price}}</p> 
								</a>
									@if($product->qty > 0)
									@if(Session::has('user'))
			 						<!-- add to cart -->
									<form action="{{ route('cart.store') }}" method="POST">
										@csrf

										<input type="hidden" name="product_id" value="{{ $product->id }}">
									
										
										<input type="number" name="user_id" id="user_id" value="{{Session::get('user')['id']}}" hidden >
										<input type="hidden" name="quantity" value="1">

										
									<button type="submit"  style="border:none;color:white;background-color:white"><img src="images/plus.png" class="add-button"></button>
																

												</form>

												@else

												<a href="#" class="" data-toggle="modal" data-target="#modalLoginForm" type="submit"><img src="images/plus.png" class="add-button"></a>
											@endif

											@else
											<button type="submit"  style="border:none;background-color:blue"><p class="out-button">out of stock</p></button>
											@endif
											</div>
								</div>
							</div>
                            @endforeach

							{{$products->links()}}
							
							<!--2-->
						<!--Products end-->
					</div>
			</div>			
	 </div>
	</div>
</section>
		<!--Product Catalogue End-->

	<section class="footer-1">
		@include('layouts.footer')
	</section>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="js/filter.js"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/mdb.min.js"></script>
	<!-- Plugin file -->
	<script src="./js/addons/datatables.min.js"></script>

</body>
</html>
