<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mulish:300,400,600,700,800,900">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,700">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="/css/index.css"> -->
 	<link rel="stylesheet" href="/css/style.css"> 
   <link rel="stylesheet" href="/css/style2.css"> 

   <link rel="stylesheet" href="/css/mdb.min.css">

    <title>Mutuku Water</title>
  </head>
  <body class="Register">
 
<!-- THE NAVIGATION BAR AND MODALS -->
<?php 
use App\Http\Controllers\CartList;
$total=0;
if(Session::has('user'))
{
  $total= CartList::cartItem();
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 <nav class="navbar navbar-expand-lg navbar-expand-xl bg-light navbar-light w-100 p-1 fixed-top">
		<div class="container-fluid">
		<a href="/" class="navbar-brand ms-5"><img class="ms-5" src="/images/questwater.png"></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
			<div class="container"><span class="navbar-toggler-icon"></span></div>
		</button>
			<div class="collapse navbar-collapse" id="navmenu">
				<ul class="navbar-nav ms-auto fw-bold">
					<li class="nav-item">
						<a href="/" class="nav-link px-5 py-3" id="home">Home</a>
					</li>
					<li class="nav-item">
						<a href="/products" class="nav-link px-5 py-3" id="products">Products</a>
					</li>

					<li class="nav-item">
						<a href="#" class="nav-link px-5 py-3" id="home">Your orders</a>
					</li>

					@if(Session::has('user'))

					<li class="dropdown">

						<a class="dropdown-toggle" data-toggle="dropdown" data-target="#drop" href="#">{{Session::get('user')['name']}}
						<span class="caret"></span></a>
							<ul id="drop">
							<li><a href="/logout" style="color:black">Logout</a></li>
							</ul>
          			</li>

                <li class="nav-item">
                    <a href="/cart" class="nav-link px-5 py-3" id="home">
                    @if ($total > 0)
                    <i class="fa fa-shopping-cart"></i>({{$total}})

                    @else
                    <i class="fa fa-shopping-cart"></i>(0)

                    @endif
                    
                    </a>
                </li>

					@else

							
					<li class="nav-item">
						<a href="#" class="nav-link px-5 py-3" data-toggle="modal" data-target="#modalLoginForm" >Login</a>
					</li>

					
					
					<li class="nav-item d-flex items-center">
						
						<!-- trigger modal register -->
			
						<a href="#" class="nav-link px-5 py-3" id="register" data-toggle="modal" data-target="#modalRegisterForm">Register</a>
					
					</li>

				
					<li class="nav-item">
						<a href="#" class="nav-link px-5 py-3" data-toggle="modal" data-target="#modalLoginForm" >
            <i class="fa fa-shopping-cart"></i>(0)
              </a>
					</li>

				

          @endif
				</ul>
			</div>
		</div>
	</nav>
	
	<!--  modal register -->
	 
	<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

	  <!-- register form -->
	  <form action="/register" method="POST">
	  @csrf
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name"name="name" id="name" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="email" id="email" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>

		<div class="md-form mb-5">
          <i class="fas fa-phone prefix grey-text"></i>
          <input type="phone" id="orangeForm-email" name="phone" id="phone" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Phone</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="password" id="password" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
        </div>

		<div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Confirm</label>
		 
        </div>

		<div >
		<button class="btn btn-default" type="submit">Login</button>
        </div>
			</form>
			<!-- end of form -->
      </div>
      
    </div>
  </div>
</div>
  

	<!-- end modal -->


	<!-- modal login -->

	<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

	  <form action="/login" method="post"><!-- form to login -->
	  @csrf
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" name="email" id="email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" name="password" id="password" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" type="submit" >Login</button>
      </div>

		 </form>
    </div>
  </div>
</div>


<!-- END OF NAVIGATION BAR AND MODALS -->
<br><br>
<!-- start of section -->
<section class="ts-block mt-5 py-5">

 <div class="container"><!-- start of container -->

  <div class="row"><!-- start of row -->

<div class="col-md-6"> <!-- start of the left side -->

<div class="row">
<div class="container">


<div class="col-md-12">
<a href="{{ URL::previous() }}" class="link-secondary"><i class="fa fa-chevron-left" aria-hidden="true" style=""></a></i>
<span class="toptext">  Back Home</span>

</div>
</div>
</div>


    <div>
    <img  class="prdimg1 img-fluid" src="{{ asset('storage/images/' . $product['image']) }}">
   </div>

   <div >
    <p class="cuctomereview">Customer's Reviews</p>
   </div>

   <div class="container">
   <div class="dvicuctomereview csmreviews">
   <div class="container">  
    <p class="reviewname">Alexander</p>
  
    <div class="reviews">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
         Mauris hendrerit condimentum sapien ut convallis.
    </div>
  
    <p class="reviewtime">February 10, 2021 </p>
  </div>

    
   </div>
</div>
<!---->

<div class="container">
   <div class="dvicuctomereview csmreviews">
   <div class="container">  
    <p class="reviewname">Alexander</p>
  
    <div class="reviews">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
         Mauris hendrerit condimentum sapien ut convallis.
    </div>
  
    <p class="reviewtime">February 10, 2021 </p>
  </div>

    
   </div>
</div>
<!---->

<div class="container">
   <div class="dvicuctomereview csmreviews">
   <div class="container">  
    <p class="reviewname">Alexander</p>
  
    <div class="reviews">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
         Mauris hendrerit condimentum sapien ut convallis.
    </div>
  
    <p class="reviewtime">February 10, 2021 </p>
  </div>

    
   </div>
</div>
<!---->

<div class="container text-center">
     <button class="btnshowall">Show All</button>
    </div>
</div><!-- end of left side -->

<div class="col-md-6"> <!-- start of the rigth side -->
  <div class="container">
    <p class="prdcname">{{$product['product_Name']}}</p>

    <p class="prdextradetail">{{$product['details']}}</p>
  

        <div class="row">
            <div class="col-md-3">
              @if($product['inStock']>0)
              <div class="prdstockbtn "><p class="prdstocktext">Out of Stock</p></div>
              @else
              <div class="prdstockbtn "><p class="prdstocktext">In Stock</p></div>
              @endif
            </div>

            <div class="col-md-9">
              <p class="deliveryperiod">Delivery: 2 - 5 Hours</p>

            </div>
       </div>

       <!-- continue here -->
            <div class="row">

                <div class="col-md-6">
                  <div class="extraprddetailtitlebox">
                    <p class="extraprddetailtitle">Type:</p>
                    <p class="extraprddetailtitle">Capacity:</p>
                    <p class="extraprddetailtitle">Source:</p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="extraprddetailbox">
                    <p class="extraprddetail">{{$product['Type']}}</p>
                    <p class="extraprddetail">{{$product['capacity']}}</p>
                    <p class="extraprddetail">{{$product['source']}}</p>
                  </div>
                <div>
  
            </div>
            </div>
        <!------------------>
        @if(Session::has('user'))
            
        <form action="{{ route('cart.store') }}" method="POST">
                        @csrf

              <div class="carttitals">
                <div class="row">

                  <div class="col-md-5">
                    <p class="totalcost mt-5">Total: Ksh. {{$product['price']}}</p>
                    <p class="ttlcosts">@Ksh. {{$product['price']}}</p>
                  </div>

                 
                  <div class="col-md-3 mt-5">
               
                      <input type="number" name="quantity" id="qty" value="1" min="1" class="form-control" >
                      <input type="number" name="user_id" id="user_id" value="{{Session::get('user')['id']}}" hidden >
                
                </div>

                <div class="col-md-3 ">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <button class="btnadtocart mt-5"  type="submit"><p class="addtocart">
                                Add to cart</p>
                              </button>

                  </div>
               
                

                </div>
              </div>
            </form>
            
            <!------------------------------------>

            
            @else
                       
                          
          <!------------------>
         
            
              <div class="carttitals">
                <div class="row">

                  <div class="col-md-5">
                    <p class="totalcost mt-5">Total: Ksh. {{$product['price']}}</p>
                    <p class="ttlcosts">@Ksh. {{$product['price']}}</p>
                  </div>

                  <div class="col-md-3 mt-5">
                
               
                       <input type="number" name="qty" id="qty" value="1" min="1" class="form-control" >
                     
                   
                  </div>

                  <div class="col-md-3 ">
                  <button class="btnadtocart mt-5" data-toggle="modal" data-target="#modalLoginForm"><p class="addtocart">
                                Add to cart</p>
                              </button>

                  </div>
                

                  

                </div>
              </div>
          
            
                          
                       @endif

            <div>
             <p class="description">Description</p>
            </div>

            <!-------------------->

            <div class="container">
              <p class="prcdescription">

              {{$product['description']}}
              </p>

            </div>

            <!----------------->

            <div class="container">
              <table class=" table table-borderless" style="margin-top:85px">
                <thead>
                  <tr>
                    <td scope="col"><p class="nutrisinvalue">Nutritional Value:</p></td>
                    <td scope="col"></td>
                    <td scope="col">
                      <div class="w3-dropdown-hover" style="background-color:#FAFAFA">
                          <img src="/images/arrow1.svg" class="dropdownbtn">
                              <div class="w3-dropdown-content" style="right:0;">
                            
                                <div  style="margin-top:30px">
                                  <p style="white-space: pre-line">{{$product['nutrition']}}</p>
                                
                                </div>
                              </div>
                        </div>
                    </td>
                  
                  </tr>

                  <tr>
                    <td scope="col"><p class="nutrisinvalue">Vitamins:</p></td>
                    <td scope="col"></td>
                    <td scope="col">
                      <div class="w3-dropdown-hover" style="background-color:#FAFAFA">
                          <img src="/images/arrow1.svg" class="dropdownbtn">
                              <div class="w3-dropdown-content" style="right:0;">
                            
                                <div style="margin-top:30px">
                                  <p style="white-space: pre-line">{{$product['vitamins']}}</p>
                                
                                </div>
                              </div>
                        </div>
                    </td>
                  
                  </tr>

                  <tr>
                    <td scope="col"><p class="nutrisinvalue">Minerals:</p></td>
                    <td scope="col"></td>
                    <td scope="col">
                      <div class="w3-dropdown-hover" style="background-color:#FAFAFA">
                          <img src="/images/arrow1.svg" class="dropdownbtn">
                              <div class="w3-dropdown-content" style="right:0;">
                            
                                <div style="margin-top:30px">
                                  <p style="white-space: pre-line">{{$product['minerals']}}</p>
                                
                                </div>
                              </div>
                        </div>
                    </td>
                  
                  </tr>
                </thead>

                <tbody>
                      <tr>
                            <td scope="col"></td>
                            <td></td>
                             <td scope="col"> </td>
                       </tr>
                </tbody>
              </table>
            </div>


  </div><!-- end of container -->
</div><!-- end of right side -->


</div><!-- end of row -->
</div>


</section>

<!-- end of section -->

<section class="ts-block mt-5 py-5">

  <div class="container">
    <div class="divnxtsec">

    </div>

  </div>
  <div class="container">
    <p class="pal">People also like</p>
  </div>
</section>

<section class=" text-dark p-5 " style="background:#f6fbff">
	<div class="container py-5">
		<div class="d-sm-flex py-5">
			<div class="container">
					<div class="row mb-5 ">
				
						<!--Products start-->
						<!--1-->
					
                        @foreach($products as $product)
							<div class="col my-5" id="col-md-3">
								<div class="card mx-auto mt-5 itemBox refillable" id="pcard" style="width:243px;height:217px;border-radius:18px;" >
									<div class="text-center"id="pills-refillable" >
									<a href="/detail/{{$product['id']}}" class="text-decoration-none text-dark">
											<img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" id="product_image" alt="{{$product->product_name}}" >
									
										</div>
									<div class="card-body" >
									<h5 class="card-title text-center"><a href="#" class="text-decoration-none text-dark">{{$product->product_name}}</a></h5>
									<p class="card-text text-center text-secondary text-opacity-50 fs-6"><small>{{$product->extra_detail}}</small></p>
									<p class="text-primary fw-bold" id="price">Ksh. {{$product->price}}</p> </a>
									<a href="#" class=""><img src="/images/plus.png" class="add-button"></a>
									</div>
								</div>
							</div>
                            @endforeach

						
							<!--2-->
						<!--Products end-->
					</div>
                   
			</div>			
	 </div>
	</div>

</section>
						

	

   

	
    <script src="js/bootstrap.min.js"></script>
 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    
    
    <script src="js/main.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/popper.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/mdb.min.js"></script>
  </body>
</html>
