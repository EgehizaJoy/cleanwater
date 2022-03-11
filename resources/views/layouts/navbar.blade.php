 <!--<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" class="ms-5" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Bootstrap
    </a>
  </div>
</nav>-->

<?php 
use App\Http\Controllers\CartList;
$total=0;
if(Session::has('user'))
{
  $total= CartList::cartItem();
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
						<a href="customer_orders" class="nav-link px-5 py-3" id="home">Your orders</a>
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
                    <a href="cart" class="nav-link px-5 py-3" id="home">
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
          <input type="email" id="defaultForm-email" name="email" id="email" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" name="password" id="password" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" type="submit" >Login</button>
      </div>
      <div class="md-form mb-4 text-center">
         <a href="#" id="register" data-toggle="modal" data-target="#modalRegisterForm">Dont have an account? Click here to register</a>
        </div>

      </div>

		 </form>
    </div>
  </div>
</div>

	<!-- end modal login -->


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
          <input type="phone" id="orangeForm-email" name="phone" id="phone" class="form-control validate" plaeholder="phone" required>
          <label data-error="wrong" data-success="right" for="orangeForm-email"></label>
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
		<button class="btn btn-default justify-content-center" type="submit">Register</button>
        </div>
			</form>
			<!-- end of form -->
      </div>
      
    </div>
  </div>
</div>
  

	<!-- end modal -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>