@extends('layouts.dashboard')



@section('content')
<div class="row">
<div class="col-sm-12">

<h5 class="">Products</h5>
<button type="button" class="btn btn-sm btn-info float-right" data-toggle="modal" style="color:black" data-target="#exampleModal">
  <b>Create</b>
</button>

<button type="button" class="btn btn-sm btn-info float-left" data-toggle="modal" style="color:black" data-target="#category">
  <b>Category</b>
</button>

<button type="button" class="btn btn-sm btn-info float-right" data-toggle="modal" style="color:black" data-target="#discount">
  <b>discount</b>
</button>

</div>
</div>



<!-- Modal -->
<div class="modal fade" id="discount" tabindex="-1" role="dialog" aria-labelledby="discountLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="discountLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST" action="discount" enctype="multipart/form-data">
      @csrf
               <div class="form-group form-group-md">
					<input class="form-control" type="text" name="name" placeholder="e.g 10%">
				</div>

                <div class="form-group form-group-md">
					<input class="form-control" type="text" name="decsription" placeholder="e.g given after 10 purchases">
				</div>

                <div class="form-group form-group-md">
					<input class="form-control" type="number" name="discount" placeholder="e.g 10%">
				</div>

                <div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
  </form>
      </div>
     
    </div>
  </div>
</div>

<!-- end modal -->

<!-- Modal -->
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="categoryLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoryLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST" action="category" enctype="multipart/form-data">
      @csrf
               <div class="form-group form-group-md">
					<input class="form-control" type="text" name="name" placeholder="e.g branded">
				</div>

                <div class="form-group form-group-md">
					<input class="form-control" type="text" name="decsription" placeholder="exampleModalLabel">
				</div>

                <div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
  </form>
      </div>
     
    </div>
  </div>
</div>

<!-- end modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST" action="{{route('admin-products.store')}}" enctype="multipart/form-data">
      @csrf
               <div class="form-group form-group-md form-validate">
					<input class="form-control" type="text" name="product_name" placeholder="Enter productName" required>
				</div>

                <div class="form-group form-group-md">
					<input class="form-control" type="text" name="extra_detail" placeholder="e.g with tap">
				</div>

                <div class="form-group form-group-md">
					<input class="form-control" type="text" name="water-type" placeholder="e.g still water">
				</div>

                <div class="form-group form-group-md">
					<input class="form-control" type="text" name="capacity" placeholder="e.g 12 litre" required>
				</div>

                <div class="form-group form-group-md">
					<input class="form-control" type="text" name="water-source" placeholder="e.g spring water">
				</div>

                <div class="form-group">
					<input class="form-control" type="file" name="image" >
				</div>

                <div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="description" placeholder="e.g clean water" required></textarea>
				</div>

                <div class="form-group form-group-md">
					<input class="form-control" type="number" name="category_id" placeholder="1.branded: 2.refillable: 3.recycle" required max="3">
				</div>

        <!--        <div class="form-group form-group-md">
					<input class="form-control" type="number" name="inventory_id" placeholder="e.g 1 for 500ml" required>
				</div> -->

                <div class="form-group form-group-md">
					<input class="form-control" type="number" name="price" placeholder="e.g 400" required>
				</div>

				<div class="form-group form-group-md">
					<input class="form-control" type="number" name="discount_id" placeholder="1" max="1" >
				</div>

				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="nutrients" placeholder="e.g Carbs"></textarea>
				</div>

				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="vitamins" placeholder="ee.g C"></textarea>
				</div>

				<div class="form-group">
					<textarea class="form-control" rows="5" cols="30" name="minerals" placeholder="e.g Zn"></textarea>
				</div>
				
				

                <div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
  </form>
      </div>
     
    </div>
  </div>
</div>

<!-- end modal -->



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
      <th>#Id</th>
      <th >Name</th>
      <th >Price</th>
      <th >Description</th>
      <th>Image</th>
      <th >Actions</th>
    </tr>
  </thead>
  <tbody>


  @foreach($products as $product)

  <tr class="col-12 data-row">
      <td>{{$product->id}}</td>
      <td class="product_name">{{$product->product_name}}</td>
      <td >sh. {{$product->price}}</td>
      <td class="tda">{{$product->description}}</td>
      
      <td class="col-4"><img src="{{ asset('storage/images/' . $product->image) }}"
      style="margin-right:0px; width:50px;height:50px"  alt="{{$product->product_Name}}"></td>
      
     
      <td>
                    
        <div class="form-group" >
              <a href="/removeproduct/{{$product->id}}" class=" btn-danger btn-sm"> 
              
              <i class="fa fa-trash"></i></a>

             
        <a href="#" class=" btn-success btn-sm" type="button" id="edit-item" data-item-id="{{$product->id}}"> 
            
            QTY</a>
                        </div>

        </td>
    </tr>

<!-- Modal -->
<div class="modal fade " id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="stockLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stockLabel">Enter quantity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      <form  method="POST" action="stock" enctype="multipart/form-data">
      @csrf
      <div class="form-group form-group-md">ID#
					<input class="form-control" type="number" name="product_id" id="modal-input-id" readonly
                    >
				</div>
               <div class="form-group form-group-md">Name
              
					<input class="form-control" type="text" name="name" id="modal-input-name"
                   readonly >
				</div>

                <div class="form-group form-group-md">Qty
					<input class="form-control" type="number" name="quantity" >
                    
				</div>

      
                <div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
  </form>
      </div>
     
    </div>
  </div>
</div>

<!-- end modal -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

                <script type="text/javascript">
$(document).ready(function() {
    /**
     * for showing edit item popup
     */
  
    $(document).on('click', "#edit-item", function() {
      $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
  
      var options = {
        'backdrop': 'static'
      };
      $('#edit-modal').modal(options)
    })
  
    // on modal show
    $('#edit-modal').on('show.bs.modal', function() {
      var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
      var row = el.closest(".data-row");
  
      // get the data
      var id = el.data('item-id');
      var name = row.children(".product_name").text();
      var quantity = row.children(".quantity").text();
      
  
      // fill the data in the input fields
      $("#modal-input-id").val(id);
      $("#modal-input-name").val(name);
      $("#modal-input-quantity").val(quantity);
     
  
    })
  
    // on modal hide
    $('#edit-modal').on('hide.bs.modal', function() {
      $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
      $("#edit-form").trigger("reset");
    })
  })
    </script>
  @endforeach
  
   
  </tbody>
</table>

{{$products->links()}}
</div>


@endsection