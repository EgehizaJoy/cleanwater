<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mulish:300,400,600,700,800,900">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,700">

	<link rel="stylesheet" href="css/style.css">
  <script data-require="jquery" data-semver="2.1.4" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  
  <script src="js/index.js"></script>
 
    <title>Mutuku Water</title>
  </head>
  

  <body class="Register">
  @include('layouts.navbar')

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


  <section class="ts-block mt-5 py-5">

 <div class="container"><!-- start of container -->

  <div class="row"><!-- start of row -->

<div class="col-md-6"> <!-- start of the left side -->


<div class="row">
<div class="container">

<div class="col-md-12">

<a href="{{ URL::previous() }}" class="link-secondary"><i class="fa fa-chevron-left" aria-hidden="true" style=""></a></i>
<span class="toptext"> Go Back</span>
</div>




</div>
</div>

<div class="container">
<p class="title1">
Checkout<p>
</div>


<!------------TOTALS------------->


@php
                $total = 0;
            @endphp

            @foreach($products as $item)
            @php
                $total += $item->price * $item->cart_qty;
            @endphp
            @endforeach



            



                <div class="container">
                    <div style="margin-top:55px">
                <p class="psi">Delivery Details</p>
                </div>
                </div>

                <div class="container">
                <p class="tsa">This is a</p>
                </div>

                <div class="container">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="delivery_type" id="home_delivery" value="Home Delivery">
                  <label class="form-check-label rb" for="flexRadioDefault1">
                  Home Delivery
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="delivery_type" id="office_delivery" value="Office Delivery"checked>
                  <label class="form-check-label rb" for="flexRadioDefault2">
                    Office Delivery
                  </label>
                </div>
                </div>



                <div class="container">
                  <div class="address">
                <div class="row">

                <div class="col-md-6">
                <label for="county" class="ft">County</label>
                <div >
                      <input type="text" id="county" class="inpt"
                            name="county">
                </div>
                </div>

                <div class="col-md-6">
                <label for="town" class="ft">Town/City</label>
                <div >
                      <input type="text" id="town" class="inpt"
                            name="town">
                </div>
                </div>

                </div>
                </div>
                </div>


                <div class="container">
                  <div class="address">
                <div class="row">

                <div class="col-md-6">
                <label for="road" class="ft">Road/ House Number</label>
                <div >
                      <input type="text" id="road_number" class="inpt"
                            name="road_number">
                </div>
                </div>

                <div class="col-md-6">
                <label for="addinfo" class="ft">Additional Information</label>
                <div >
                      <textarea class="inpt" name="additional_info" id="additional_info"></textarea>
                </div>
                </div>

                

               

                </div>
                </div>
                </div>



                        <div class="container">
                          <div class="address">
                        <div class="row" >

                        <div class="col-md-6">
                        <label for="deliveryday" class="ft">Expected Delivery Day</label>
                        <div >
                              <input type="date" style="color:grey" id="expectDelivery_date" class="inpt"
                                    name="expectDelivery_date">
                        </div>
                        </div>

                        <div class="col-md-6">
                        <label for="deliverytime" class="ft">Select Delivery Time</label>
                        <div >
                              <input type="time" id="expectDelivery_time" class="inpt"
                                    name="expectDelivery_time">
                        </div>
                        </div>

                        </div>
                        </div>
                        </div>


                        <div class="container">
                            <div style="margin-top:55px">
                        <p class="psi">Payment</p>
                        </div>
                        </div>

                        <div class="container">
                          <div class="address">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name=""value="Cash on Delivery" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                            Cash on Delivery
                          </label>
                        </div>
                        </div>

                        <div class="address">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name=""value="Mpesa" id="flexCheckDefault1">
                          <label class="form-check-label" for="flexCheckDefault">
                            PayPal
                          </label>
                        </div>
                        </div>
                        </div>



<div class="container">
  <div class="address">
<div class="row" >

<div class="col-md-6">
<label for="pgone" class="ft">Name</label>
<div >
      <input type="text" id="name" class="inpt"
            >
</div>
</div>



<div class="col-md-6">
<label for="phone" class="ft">Mpesa Number</label>
<div >

<!------------MPESA STK FORM ------------>
<!-- form -->

<form class="needs-validation"  action="{{ url('charge') }}" method="post">
               @csrf

           
                
            
                        </div>
                        </div>

                        </div>
                        </div>
                        </div>



                        </div><!-- end of left side -->


                        <div class="col-md-6"> <!-- start of the right side -->



                        <!-- your subtotals -->
                        <div class="container" style="margin-top:130px">
                        <p class="psi">Your Order</p>
                        </div>

                        <div class="container">
                        <div class="row">
                        
                          <div class="col-md-10">
                        <div class="extraprddetailtitlebox">
                        <p class="extraprddetail">Subtotal</p>
                        <p class="extraprddetail">Delivery fee</p>
                        </div>
                        </div>

                        <div class="col-md-2">
                        <div class="extraprddetailbox">

                        <p class="extraprddetail">$ {{ $total }}</p>
                        <p class="extraprddetail">$ 8</p>
                        </div>
                        <div>

                        </div>
                        </div>

                        <!-- end--->
                        <div class="container">
                        <div class="Line1"></div></div>

                        <!--total -->
                        <div class="container">
                        <div class="row">
                        
                          <div class="col-md-9">
                        <div class="extraprddetailtitlebox">
                        <p class="ttl">Total</p>
                       
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="extraprddetailbox">
                        <p class="ttl">$ {{ $total+8 }}</p>
                        <input  type="text" name="amount" value="{{ $total+8 }}" hidden/>
            
                        </div>
                        <div>


                        </div>
                        </div>
                        <!-- end -->

       
                            
                        <input type="submit" class="btn btn-primary btn-lg btn-block" 
                        name="submit" value="Pay Now">
                        
</form>
<!--END FORM -------------------------------------------------------->


<div class="container" style="margin-top:78px">
<p class="psi">Cart</p>
</div>

<!-- cart -->

<table class=" table-sm table-borderless" >
<thead>
<tr>
<td scope="col"></td>
<td scope="col"></td>
<td scope="col"></td>
</tr>
</thead>


@foreach($products as $item)




<tbody>
  
<tr>
<td scope="col"><img src="{{ asset('storage/images/' . $item->image) }}"
 alt="{{$item->product_name}}" class="img-fluid rounded"  width="50"  height="93"></td>

<td scope="col">
  <p class="itemname">{{$item->product_name}}</p>
 
 <!-- <input type="number" min="0" class="cartbtn" id="quantity" value="{{$item->cart_qty}}">
  <input type="text" class="form-control" id="price" value="{{ $item->price}}" readonly>
  <input type="text" class="form-control" id="subTotal" value="{{ $item->price * $item->cart_qty}}"> -->
 
  <input type="text" class="form-control" id="price" value="{{ $item->price}}" hidden readonly>
  <input type="number" id="quantity" name="quantity" class="cartbtn" value="{{$item->cart_qty}}" min="1" max="10" >
 
        
</td>

<td scope="col">
<a href="/removecart/{{$item->cart_id}}" style="text-decoration: none;"
class="close" ><span aria-hidden="true">&times;</span></a>
<!--<button type="button" class="close" >
          <span aria-hidden="true">&times;</span>
        </button>--><br><br>
        <p class="itemname float-right">$ {{ $item->price * $item->cart_qty}} </p> 
            

</td>

</tr>
</tbody>



@endforeach
</table>


<!-- end -->

</div><!-- end of right side -->


</div><!-- end of row -->

</div><!-- end of container -->

</section>

<section class="footer-1">
		@include('layouts.footer')
	</section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>
     
  

    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="js/main.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	
  
  </body>
</html>
