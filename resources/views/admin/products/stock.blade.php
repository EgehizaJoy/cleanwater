@extends('layouts.dashboard')

<script src="/js/edit.js"></script>

@section('content')
<div class="row">
<div class="col-sm-12">

<h5 class="">Stock</h5>

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
      <th>#Id</th>
      <th >Name</th>
      <th >quantity</th>
      <th >Actions</th>
    </tr>
  </thead>
  <tbody>


  @foreach($stocks as $stock)

  <tr class="col-12 data-row">
      <td class="product_id">{{$stock->product_id}}</td>
      <td class="name">{{$stock->name}}</td>
      <td class="quantity">{{$stock->quantity}}</td>
      
         <td class="col-4">
        <div class="form-group " >

        <a href="#" class=" btn-success btn-sm" type="button" id="edit-item" data-item-id="{{$stock->id}}"> 
            
            EDIT</a>

            <a href="/removeqty/{{$stock->id}}" class=" btn-danger btn-sm"> 
            
            <i class="fa fa-trash"></i></a>
      
        </div>

        

        </td>
    </tr>
    
<!-- Modal -->
<div class="modal fade " id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="stockLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stockLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      <form  method="POST" action="stock_qty" enctype="multipart/form-data">
      @csrf
               <div class="form-group form-group-md">Name
               <input class="form-control" type="hidden" name="id" id="modal-input-id"
                 >
					<input class="form-control" type="text" name="name" id="modal-input-name"
                   readonly >
				</div>

                <div class="form-group form-group-md">Qty
					<input class="form-control" type="number" name="quantity" id="modal-input-quantity"
                    >
				</div>

        <div class="form-group form-group-md">ID#
					<input class="form-control" type="text" name="product_id" id="modal-input-productid"
                    readonly>
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
      var name = row.children(".name").text();
      var quantity = row.children(".quantity").text();
      var product_id = row.children(".product_id").text();
  
      // fill the data in the input fields
      $("#modal-input-id").val(id);
      $("#modal-input-name").val(name);
      $("#modal-input-quantity").val(quantity);
      $("#modal-input-productid").val(product_id);
  
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



{{$stocks->links()}}
</div>


@endsection