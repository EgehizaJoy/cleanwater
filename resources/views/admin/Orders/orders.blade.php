
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


@extends('layouts.dashboard')

<style>
.dropbtn {
  background-color:white;
  border:none;
 
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  width: 90px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>

@section('content')




<div class="card">

<table class="table">
  <thead>
    <tr>
     
     
      <th >Name</th>
      <th>Phone</th>
      <th>Order_id</th>
      <th >Product_id</th>
      <th >Products Name</th>
      <th >Price</th>
      <th >Quantity</th>
      <th >Total</th>
      <th >Actions</th>
    </tr>
  </thead>
  <tbody>


  @foreach($orders as $order)

  <tr class="col-12">
  
      <td >{{$order->user_name}}</td>
     
      <td >{{$order->phone}}</td>
      <td >{{$order->order_id}}</td>
      <td >{{$order->product_id}}</td>
      <td >{{$order->product_name}}</td>
      <td >{{$order->price}}</td>
      <td >{{$order->quantity}}</td>
      <td >{{$order->total}}</td>
      <td>
              <div class="row">      
                  <div class="form-group col-md-2" >
                      <a href="" class=" btn-danger btn-sm"> 
                      
                      <i class="fa fa-trash"></i></a>

                  </div>


              

                  <div class="form-group col-md-2" >
                  <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" >
                      <span><i class="fa fa-eye" aria-hidden="true"></i></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    
                        <li>
                        <form action="orderid" method="post"><!-- form to login -->
                                             @csrf
                                            <input type="number" class="form-control" style="width:75%;border:none;color:black" placeholder="Enter Order ID" name="order_id" id="order_id" value="{{$order->order_id}}" hidden>
                                            <button class ="btn-sm"type="submit" style="border-color:white;background-color:white">Create Quotation</button>
                                        </form>
                        </li>
                        <li>
                        <form action="invoiceid" method="post"><!-- form to login -->
                                             @csrf
                                            <input type="number" class="form-control" style="width:75%;border:none;color:black" placeholder="Enter Order ID" name="order_id" id="order_id" value="{{$order->order_id}}" hidden>
                                            <button class ="btn-sm"type="submit" style="border-color:white;background-color:white">Create Invoice</button>
                                        </form>
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                  </div>
                      
            </div>
           
      </td>
   
    </tr>

  @endforeach
  
   
  </tbody>
</table>


</div>

{{$orders->links()}}
@endsection
<script>
                /* When the user clicks on the button, 
                toggle between hiding and showing the dropdown content */
                function myFunction() {
                  document.getElementById("myDropdown").classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                  if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                      var openDropdown = dropdowns[i];
                      if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                      }
                    }
                  }
                }
                </script>