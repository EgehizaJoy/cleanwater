
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
    

  <style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
    <title>Quest Water</title>
    @extends('layouts.dashboard')

    @section('content')
 
    

  <div class="card">
  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline" >
      <div class="col-md-9">
          <p style="color: #7e8d9f;font-size: 20px;"> <strong>Receipt</strong></p>
        </div>
        
        <div class="col-md-2 float-end">
          <a ><i class="fas fa-print text-primary"></i> Print</a>
          <a ><i class="far fa-file-pdf text-danger"></i> Export</a>
        </div>
        <hr style="width:85%">
      </div>

      <div class="container">
        <div class="col-md-12">
          <div  class="text-center">
            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i> <p class="pt-0">Quest Water</p>
          </div>

        </div>


      <!--  <form action="quote" method="post">
                @csrf

                <input type="text" id="defaultForm-email" name="company_name" id="company_name" class="form-control validate">

                <button type="submit" hidden>dfg</button>
            </form> -->
           

              <div class="row">
                <div class="col-md-8">
              
                @foreach($orders as $order)
                @if ($loop->last)
               
                    <ul class="list-unstyled">
                        <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{$order->customer_name}}</span></li>
                        <li class="text-muted">{{$order->county}}</li>
                        <li class="text-muted">{{$order->address}}</li>
                        <li class="text-muted"><i class="fas fa-phone"></i>{{$order->phone}}</li>
                        </ul>
                
                </div>
                

         
          <div class="col-md-4">
          
                    <ul class="list-unstyled">
                        <p>Order ID # <b>{{$order->order_id}}</b></p>
                        <p>Created at: <b>{{$order->created_at}}</b></p>
                        <p>Date Delivered: <b>{{$order->delivery_date}}</b></p>
                        <p>paid on:<b> {{$order->paid_date}}</b></p>
                        <li class="text-muted"><span class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold"> paid</span></li>
                        <p>Mpesa ID:<b> {{$order->mpesa_id}}</b></p>
                    </ul>
     
        </div>

        @endif
                @endforeach
       <br><br>
      
       <div class="row" style="width:85%">
      
      <table>
        <thead>
          <tr>
            
             <td  class="col-md-2"style="background-color:#84B0CA ;height:40px;font-size:16px;color:white" >Product Name</td> 
             <td  class="col-md-2"style="background-color:#84B0CA ;height:40px;font-size:16px;color:white" >Quantity</td> 
            <td   class="col-md-2"style="background-color:#84B0CA ;height:40px;font-size:16px;color:white" >Unit Price</td> 
             <td  class="col-md-2"style="background-color:#84B0CA ;height:40px;font-size:16px;color:white" >Total Amount</td>
          </tr>
        </thead>
      </table>
    
       </div>
      

       @foreach($orders as $order)
        <div class=" add-input">

          <div class="row">

         

          <div class="form-group  col-md-2">
          <p class="form-control">{{$order->product_name}}</p>
         </div>

          <div class="form-group  col-md-2">
          <p class="form-control">{{$order->quantity}}</p>
          </div>

          <div class="form-group  col-md-2">
          <p class="form-control">{{$order->price}}</p>
           
          </div>

          <div class="form-group  col-md-2">
          <p class="form-control">{{ $order->quantity * $order->price}}</p>
            

          </div>

          </div>

          </div>
        @endforeach

       
        <div class="row">
        <div class="col-mdxl-8">
          <input class="ms-3" type="text" placeholder="quotation terms" name="terms" 
          value="to be completerd with no overlap" hidden>
          <p class="ms-3">Add additional notes and payment information</p>


          </div>
         
          <div class="col-md-3">
            <ul class="list-unstyled">
            @foreach($orders as $order)
            @if ($loop->last)

            <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>Ksh. {{$order->subtotal}}</li>
              <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(16%)</span>Ksh. {{$order->tax}}</li>
              </ul>
              <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span style="font-size: 25px;">Ksh. {{$order->total}}</span></p>
 
          </div>
        </div>

        @endif
              @endforeach
      
        <hr style="width:85%">
        <div class="row">
          <div class="col-md-10">
            <p>Thank you for your purchase</p>
          </div>
          
        </div>

      </div>
    </div>
  </div>
</div>



@endsection
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
