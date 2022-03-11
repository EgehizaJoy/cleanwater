<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

@extends('layouts.dashboard')



@section('content')

<div class="row">
<div class="col-sm-12">

<h5 class="">Quotations</h5>

</div>
</div>

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
<div class="card">

<table class="table">
  <thead>
    <tr>
      <th>Customer name</th>
      <th >Address</th>
      <th >phone</th>
     <th >Payment_due</th>
      <th>Subtotal</th>
      <th>total</th>
      <th >Actions</th>
    </tr>
  </thead>
  <tbody>


  @foreach($quotations as $quotation)

  <tr class="col-12">
      <td class="col-1">{{$quotation->customer_name}}</td>
      <td class="col-1">{{$quotation->address}}</td>
      
      <td class="col-1">{{$quotation->phone}}</td>
      <td class="col-1">{{$quotation->payment_due}}</td>
      <td class="col-1">{{$quotation->subtotal}}</td>
      <td class="col-1">{{$quotation->total}}</td>
  
      <td>
                    <div class="row">
                    <div class="form-group col-2" >
                                       <a href="/removequote/{{$quotation->id}}" class=" btn-danger btn-sm"> 
                                       
                                        <i class="fa fa-trash"></i></a>
    
                                       
                                    </div>

                                    
                  <div class="form-group col-md-2" >
                  <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" >
                      <span><i class="fa fa-eye" aria-hidden="true"></i></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    
                        <li>
                        <form action="quote" method="post"><!-- form to login -->
                                             @csrf
                                            <input type="number" class="form-control" style="width:75%;border:none;color:black" placeholder="Enter Order ID" name="order_id" id="order_id" value="{{$quotation->order_id}}" hidden>
                                            <button class ="btn-sm"type="submit" style="border-color:white;background-color:white">View Quotation</button>
                                        </form>
                        </li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                  </div>
                      
            </div>
           
                    </td>
    </tr>

  @endforeach
  
   
  </tbody>
</table>

{{$quotations->links()}}
</div>

@endsection