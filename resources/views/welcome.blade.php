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
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" href="css/datatables.min.css">

	<link rel="stylesheet" href="css/mdb.min.css">

    <title>Quest Water</title>
  </head>
  <body>
 
  @include('sweetalert::alert')
  
  @include('layouts.navbar')

    <!--Banner-->
<section class="bg-image">
		<div class="container p-1">
			<!--For Start-->
			<div class="d-sm-flex text-wrap mt-5 p-5">
				<div class="container mt-5 p-5">
					
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
			
					<h2 class="display-5 fw-bold mt-5 text-white text-end mb-5">Enjoy Life's <br>Goodness In <br>Every Drop</h2>
					<p class="text-description text-white text-end mb-5">Quality and natural water.<br> 
					Clean and taken through a proper distilling process.</p>
					<button class="btn btn-outline-light fw-bold float-end mb-5" style="width:162px;height:56px;">Order Water</button>
				</div>	
			</div>
	<!--For End-->
		</div>
</section>
<!--Banner-->

		

<!--For Start-->

			<h2 class="mt-5 mb-5 text-center fw-bold display-5 fs-2" style="">How It Works</h2>

			<section class="text-center mb-5 mx-auto" style="">
				<div class="container p-5">
					<div class="row g-5 ">
						<div class="col-lg">
							<img src="images/Group-14-b.png" class="img-fluid" style="width:153px;">
						</div>
						<div class="col-lg">
							<img src="images/Group-15-b.png" class="img-fluid" style="margin-top:3%;">
						</div>
						<div class="col-lg">
							<img src="images/Group-16.png" class="img-fluid" style="margin-top:-4%;">
						</div>
					</div>
				</div>
			</section>
			
<section class="bg-image-4 text-center text-sm-start">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12 mt-5">
					<div class="bg-transparent-white mt-5">
						<img src="images/bottleqw.png" class="img-fluid"/>
					</div>
			</div>
			<div class="col-md-6 col-sm-12" id="blob" style="background-image:url('{{url('images/bg-transparent.png')}}');background-size:auto;background-repeat:no-repeat;background-position:left 70% bottom 55%";">
				<h2 class="heading text-center text-white mt-5" style="font-weight:900;font-size:42px;">Why our water is the best</h2>
				<div class="container mt-3">
					<p class="text-white"></p>
				</div>
					<div class="container">
						  <div class="row">
							<div class="col fw-bold text-white" style="font-weight:900;font-size:48px;">
							  01.
							  <h6 class="fw-bold" style="font-weight:900;font-size:18px;">Natural Spring Water</h6>
							  <p class="" style="font-weight:600;font-size:12px">Water is obtained from natural springs.</p>
							</div>
							<div class="col fw-bold text-white" style="font-weight:900;font-size:48px;">
							  02
							  <h6 class="fw-bold" style="font-weight:900;font-size:18px;">Health Benefits</h6>
							   <p class="" style="font-weight:600;font-size:12px">Well distilled for your wellness</p>
							</div>
						  </div>
						  	<div class="row">
								<div class="col fw-bold text-white" style="font-weight:900;font-size:48px;">
								  03.
								  <h6 class="fw-bold" style="font-weight:900;font-size:18px;">Superior Packaging</h6>
								   <p class="" style="font-weight:600;font-size:12px">Well tested and approved packaging.</p>
								</div>
								<div class="col fw-bold text-white" style="font-weight:900;font-size:48px;">
								  04
								  <h6 class="fw-bold" style="font-weight:900;font-size:18px;">Refreshing feeling</h6>
								   <p class="" style="font-weight:600;font-size:12px">Cool and refreshing</p>
								</div>
						  </div>

					</div>
			</div>
		</div>	
	</div>
</section>
		<!--For End-->
		
<section class=" text-dark p-5 " style="background:#f6fbff">
	<div class="container py-5">
		<div class="d-sm-flex py-5">
			<div class="container">
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
									<button class="nav-link" id="pills-recycle-tab" data-bs-toggle="pill" data-bs-target="#pills-recycle" type="button" role="tab" aria-controls="pills-recycle" aria-selected="false" data-filter="recycle" style="width:110px;">Recyclable</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pills-small-tab" data-bs-toggle="pill" data-bs-target="#pills-small" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" data-filter="small">Small</button>
								</li>
						</ul>
						
					
						<!--Products start-->
						<!--1-->
					
                        @foreach($products as $product)
							<div class="col my-5" id="col-md-3">
								<div class="card mx-auto mt-5 itemBox refillable" id="pcard" style="width:243px;height:217px;border-radius:18px;" >
									<div class="text-center"id="pills-refillable" >
									<a href="detail/{{$product['id']}}" class="text-decoration-none text-dark">
											<img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" id="product_image" alt="{{$product->product_name}}" >
									
										</div>
									<div class="card-body" >
									<h5 class="card-title text-center"><a href="#" class="text-decoration-none text-dark">{{$product->product_name}}</a></h5>
									<p class="card-text text-center text-secondary text-opacity-50 fs-6"><small>{{$product->extra_detail}}</small></p>
									<p class="text-primary fw-bold" id="price">Ksh. {{$product->price}}</p> </a>
									<a href="#" class=""><img src="images/plus.png" class="add-button"></a>
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



<section class="bgwoman p-5 mb-5">
	<div class="container-fluid mt-3">
		<h2 class="header-2 fw-bold ms-4">Do you have an event?</h2>
		<p class="description-2 ms-4">Need branded water? We've got you!</p>
	</div>
	
	<div class="container pt-5">
		  <div class="row text-center pt-5">
				<div class="col mt-5">
				  <div class="card mt-5 mx-3" style="width:300px;">
					<div class="card-body">
						<img src="/images/wedding.png" class="img-fluid float-start" style="border-radius:50%;">
						<p class="mt-4" style="font-weight:800;font-size:18px;">Wedding Party</p>
					</div>
				  </div>
				</div>
				
				<div class="col mt-5">
					<div class="card mt-5 ms-auto" style="width:300px;">
					<div class="card-body">
						<img src="images/hotels.png" class="img-fluid float-start" style="border-radius:50%;">
						<p class="mt-4" style="font-weight:800;font-size:18px;">Hotels & Restaurants</p>
					</div>
				  </div>
				
		  </div>
	</div>
	
	<div class="container">
		  <div class="row text-center">
				<div class="col d-flex justify-content-center">
				  <div class="card mt-5 text-center" style="width:300px">
					<div class="card-body">
						<img src="images/Corporate.png" class="img-fluid float-start" style="border-radius:50%;">
						<p class="mt-4" style="font-weight:800;font-size:18px;">Corporate Events</p>
					</div>
				  </div>
				</div>
		  </div>
	</div>
	
	<div class="container">
		  <div class="row text-center">
				<div class="col">
				  <div class="card mt-5" style="width:300px;">
					<div class="card-body">
						<img src="images/airlines.png" class="img-fluid float-start" style="border-radius:50%;">
						<p class="mt-4" style="font-weight:800;font-size:18px;">School event</p>
					</div>
				  </div>
				</div>
				
				<div class="col">
					<div class="card mt-5 ms-auto" style="width:300px;">
					<div class="card-body">
						<img src="images/graduation.png" class="img-fluid float-start" style="border-radius:50%;">
						<p class="mt-4" style="font-weight:800;font-size:18px;">Graduation Party</p>
					</div>
				  </div>
				</div>
		  </div>
	</div>
</section>

<section class="bg-white">
	<div class="container-fluid">
		<div class="col-md-9">
			<div class="bg-clients w-100 mb-5">
				<h2 class="fw-bold text-white ms-5" style="font-size:36px">What Our Clients Say</h2>
				<p class="text-white mb-5 ms-5" style="margin-top:10%;">Clean water wth best delivery
			
			<div class=" row text-white ms-5" style="">
				<div class="col-3">
					<h2>3k+</h2>
					<p>Happy Customers</p>
					
				</div>
				<div class="col-3">
					<h2 class="position-sticky">20+</h2>
					<p>Items in Stock</p>
				</div>
				<div class="col-3">
					<h2>5+</h2>
					<p>Locations Served</p>
				</div>
			</div>
			</div>
		</div>
	</div>
	
	<div class="container">
	<div class="col d-none d-lg-block">
		<div class="card ms-auto" id="card33" style="transform:translateY(-220%);left:-250px">
					  <div class="card-body ">
					  <img src="images/mwende.png">
						<h5 class="mwende card-title text-center">Carol Mwende</h5>
						<p class=" mwende card-text text-center">Syokimau</p>
						<p class=" mwende_p card-text text-center">Very sweet and thirst quenching water.</p>
					  </div>
					  
					  <div class="card" id="card34" style="position:absolute;right:-300px;">
					  <div class="card-body">
					  <img src="images/victor.png">
						<h5 class="victor card-title text-center">Victor Allen</h5>
						<p class="victor card-text text-center">Imara Daima</p>
						<p class=" victor_p card-text text-center">Effecient delivery and on time.</p>
					  </div>
					</div>
				<div class="ms-auto">
					<a href="#"><img src="images/chevronleft.png" class="img-fluid" id="chevronleft"></a>
					<a href="#"><img src="images/chevronright.png" class="img-fluid" id="chevronright"></a>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<section class="bg-footer">
	<div class="container p-5">
		<div class="bg-footer-bg text-center p-5">
			<form action="#" method="post" class="footer-image text-center">
				<h3 class="fw-bold text-center mb-3"><br>Become a Member and get<br> upto 10% Discount</h3>
					<div class="input-group mt-5 mb-3">
						<div class="newsletter mx-auto d-flex d-sm-flex">
							<input type="text" class="input" placeholder="Enter Your Email">
							<i class="fas fa-envelope"></i>
							<div class="btn" data-toggle="modal" data-target="#modalRegisterForm">Signup</div>
						</div>
					</div>
				<p class="form-description p-4">By submitting your email, you accept our Terms & Conditions</p>
			</form>
			
		</div>
	</div>
</section>

<section class="footer-1">
		@include('layouts.footer')
</section>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
	
	<script src="js/index.js"></script>
	<script src="js/filter.js"></script>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/mdb.min.js"></script>

  </body>
</html>
