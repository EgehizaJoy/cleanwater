<div>

@if (session()->has('message'))

<div class="alert alert-success">

  {{ session('message') }}

</div>

@endif

<form>
    


<div class="row">
          <div class="col-md-8">
         

            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" style="width:30%" placeholder="Name" name="customer_name" id="customer_name">
            </div>

            <div class="form-group mx-sm-3 mb-2">
               <input type="text" class="form-control" style="width:30%"id="inputPassword2" placeholder="Town" name="town">
            </div>

            <div class="form-group mx-sm-3 mb-2">
                <input type="phone" class="form-control" style="width:30%"id="inputPassword2" placeholder="phone" name="phone">
            </div>


            
          </div>
          <div class="col-md-4">
              <label>payment due date </label>
          <div class="form-group mx-sm-3 mb-2">
                <input type="date" class="form-control" style="width:40%"id="inputPassword2" placeholder="Due Date:" name="payment_due">
            </div>

            <div class="form-group mx-sm-3 mb-2">
                <input type="number" class="form-control" style="width:40%"id="inputPassword2" placeholder="Customer ID" name="customer_id">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="date" class="form-control" style="width:40%"id="inputPassword2" placeholder="Creation Date:" name="quotation_date">
            </div>
       
            <ul class="list-unstyled">
              
              <li class="text-muted"> <span class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold"> Unpaid</span></li>
            </ul>
          </div>
        </div>
      <br><br>

<div class=" add-input">
<!-- div class i guess -->
  <div class="row ">
     

      <div class="form-group  col-md-2">
      <label style="background-color:#84B0CA ;width:250px;height:40px;font-size:16px" class="text-white">Description</label>
              <input type="text" class="form-control" id="inputPassword2" placeholder="Product Name" wire:model="productName.0">
              @error('productName.0') <span class="text-danger error">{{ $message }}</span>@enderror

      </div>

      <div class="form-group  col-md-2">
      <label style="background-color:#84B0CA ;width:250px;height:40px;font-size:16px" class="text-white">Qty</label>
              <input type="number" class="form-control" style=""id="inputPassword2" placeholder="Quantity" wire:model="quantity.0" >
              @error('quantity.0') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>

      <div class="form-group  col-md-2">
      <label style="background-color:#84B0CA ;width:250px;height:40px;font-size:16px" class="text-white">Unit Price</label>
              <input type="number" class="form-control" style=""id="inputPassword2" placeholder="Unit price" wire:model="price.0">
              @error('price.0') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>
        
      <div class="form-group  col-md-2">
      <label style="background-color:#84B0CA ;width:250px;height:40px;font-size:16px" class="text-white">Amount</label>
              <input type="number" class="form-control" style=""id="inputPassword2" placeholder="Amount" wire:model="amount.0">
              @error('amount.0') <span class="text-danger error">{{ $message }}</span>@enderror
      </div>

    
      <div class=" form-group  col-md-2">

      <button class=" text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>

        </div>
  
</div>
 
</div>


@foreach($inputs as $key => $value)

<div class=" add-input">

<div class="row">

<div class="form-group  col-md-2">

  <input type="text" class="form-control" placeholder="Product Name" wire:model="productName.{{ $value }}">

  @error('productName.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror

</div>

  

<div class="form-group  col-md-2">

  <input type="number" class="form-control" wire:model="quantity.{{ $value }}" placeholder="Quantity">

  @error('quantity.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror

</div>

<div class="form-group  col-md-2">

  <input type="number" class="form-control" wire:model="price.{{ $value }}" placeholder="Price">

  @error('price.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror

</div>

<div class="form-group  col-md-2">

  <input type="number" class="form-control" wire:model="amount.{{ $value }}" placeholder="Amount">

  @error('amount.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror

</div>

  <div class="col-md-2">

      <button class=" btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>

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
              <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>
              <input type="number" placeholder="subtotals" name="subtotal">
            </li>
              
            <li class="text-muted ms-3"><span class="text-black me-4">Tax:16%</span>
            16%
            </li>

              </ul>
              <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span style="font-size: 25px;">
              <input type="number" style="width:40%" placeholder="total" name="total">
            </span></p>
          </div>
        </div>

        <input class="ms-3" type="number"  name="archive_status" 
          value="0" hidden>

        <div class="row">

            <div class="col-md-12">

                <button type="button" wire:click.prevent="store()" class=" btn-success btn-sm">Save</button>

            </div>

            </div>



</form>

</div>
