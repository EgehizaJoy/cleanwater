<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mulish:300,400,600,700,800,900">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,700">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style2.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  <script src="js/custom.js"></script>
  <script src="js/cart.js"></script>


    <title>Quest Water</title>
  </head>
  <body>

  <section>
   @include('layouts.navbar')

</section>


   <section class="ftco-section bg-light mt-5" >
    
  <div class="container">
      <div class="row p-3">

            

       <div class="col-12 card p-3">

      
            <h4 class="text-dark">My Cart</h4>
            
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
          
           

            <table class=" table-sm table-borderless" >
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Title</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Total</td>
                    <td>Actions</td>
                   
               </tr>

           </thead>
           
           <tbody>
            
           @php
                $total = 0;
            @endphp
            
           
    @foreach($products as $item)
          
           <tr data-id="{{$item->cart_id}}">
               <td>
        
                  <a href="detail/{{$item->id}}">
                    <img src=" {{ asset('storage/images/' . $item->image) }}"
                    alt="{{$item->product_name}}"
                    class="img-fluid rounded"
                    width="50"
                    height="50">
                    </a>
               </td>
              
               <td>{{$item->product_name}}</td>

       
          <!-- <form  method="POST" action="updatecart"> -->
          <form id="contactForm">
        
               <td  width="130px">
               <span class="alert-success" id="success-message"></span>
                 <div>
                 <input type="hidden" style="width:40%"value="{{$item->cart_id}}" name="id"  id="id">

                 <button id="minus" class=" btn-warning btn-sm">-</button>
                     <input type="number" style="width:40%" name="quantity" value="{{$item->cart_qty}}" 
                     id="quantity">
                  
                     <button id="submit" class=" btn-warning btn-sm">+</button>
                 </div>
                    
                
            </td>

          
            </form> 

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

                <script type="text/javascript">

                    $('#contactForm').on('submit',function(e){
                    // e.preventDefault();

                        let id = $('#id').val();
                        let quantity = $('#quantity').val();
                    

                        $.ajax({
                        url: "/updatecart",
                        type:"POST",
                        data:{
                            "_token": "{{ csrf_token() }}",
                            id:id,
                            quantity:quantity,
                        
                        },
                        success:function(response){
                            console.log(response);
                            if (response) {
                            $('#success-message').text(response.success); 
                            $("#contactForm")[0].reset(); 
                            }
                        },
                    
                        });
                        });
                    </script>    
      
            <script type="text/javascript">

                $('#contactForm').on('minus',function(e){
                   // e.preventDefault();

                    let id = $('#id').val();
                    let quantity = $('#quantity').val();
                   

                    $.ajax({
                    url: "/minuscart",
                    type:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id:id,
                        quantity:quantity,
                       
                    },
                    success:function(response){
                        console.log(response);
                        if (response) {
                        $('#success-message').text(response.success); 
                        $("#contactForm")[0].reset(); 
                        }
                    },
                  
                    });
                    });
                </script>
            
   

                <td >Ksh.
                {{ $item->price }}
                    </td> 

                
                

                <td >Ksh.
                {{ $item->price * $item->cart_qty}}
                    </td> 

                

                <td>
                    
                <div class="form-group col-8" >
                                   <a href="/removecart/{{$item->cart_id}}" class=" btn-danger btn-sm"> 
                                   
                                    <i class="fa fa-trash"></i></a>

                                   
                                </div>
       
                </td>

                
           </tr>

           @php
             
                $total += $item->price * $item->cart_qty;
            @endphp
 
           @endforeach
            <tr >
                        <td colspan="5" class=" ">
                            
                        </td>
                        
                        <td colspan="3" class=" ">
                            <p>total</p>
                             Ksh {{ $total }}
                        </td>
            </tr>
 
           
      
           </tbody>

           </table>
       
        
            <!-- a form to take order from cart -->

            <form action="order" method="POST">
                            @csrf

                        <input type="number" name="user_id" id="user_id" value="{{Session::get('user')['id']}}" hidden >

                <input type="number" name="total" id="total" value="{{ $total }}" hidden >
                <!-- button to submit -->
                <div><button class="btn col-4 " type="submit"
                        style="float: right;color:white; background-color:#0145FE;margin:5px;height:50px" >
                        
                        
          
                        Proceed to Checkout
                                
                    </button></div>
  
            </form>
            <!-- end the form -->


        <a href="/products">
        <button class="btn col-4 " 
        style="float: right;color:#0145FE; background-color:white;margin:5px;height:50px;
        border-color:#0145FE" >
        
        Continue shopping
        
        </button>
        </a>
           
       </div>  
    </div>
</div>
       
        




  
</section>
	<section class="footer-1">
		@include('layouts.footer')
	</section>




	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="js/filter.js"></script>

  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
    <script src="js/custom.js"></script>
    <script src="js/cart.js"></script>
 
  </body>
</html>
