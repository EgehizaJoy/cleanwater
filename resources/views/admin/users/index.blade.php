@extends('layouts.dashboard')



@section('content')

<div class="row">
<div class="col-sm-12">


<h5 class="">Users</h5>

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
    <th># ID</th>
      <th>Customer name</th>
     <th >phone</th>
      <th >Email</th>
      <th >Actions</th>
    </tr>
  </thead>
  <tbody>


  @foreach($users as $user)

  <tr class="col-12">
      <td class="col-1">{{$user->id}}</td>
      <td class="col-1">{{$user->name}}</td>
      <td class="col-1">{{$user->phone}}</td>
      <td class="col-1">{{$user->email}}</td>
 

   
      <td class="col-1">
          
          <div class="form-group col-4" >
              <a href="/removeuser/{{$user->id}}" class=" btn-danger btn-sm"> 
              
              <i class="fa fa-trash"></i></a>

              
          </div>

      
  
          </td>

                    
      <td class="col-1">
                    
                    <div class="form-group col-4" >
                        <a href="/removeuser/{{$user->id}}" class=" btn-danger btn-sm"> 
                        
                        <i class="fa fa-edit"></i></a>

                        
                    </div>

                
           
                    </td>
    </tr>
    </tr>

  @endforeach
  
   
  </tbody>
</table>

{{$users->links()}}
</div>

@endsection