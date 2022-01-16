@extends('layouts.app')
@section('content')

<div class="container">
<main class="mx-auto m-4">
   <div class="row">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header bg-dark text-white">
               <h4>Active Admin List</h4>
            </div>
            <div class="card-body">
            <table class="table table-bordered border-primary">
  <thead>
     <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>

      @php $i=1; @endphp
      @foreach($admin as $list)
      @if ($list)

      @endif

      <tr>
      <td>{{$i++}}</td>
                <td>{{$list->data()['first_name']}}</td>
                <td>{{$list->data()['last_name']}}</td>
                <td>{{$list->data()['email']}}</td>
                <td> <a href="{{ url('viewA/'.$list->id()) }}" type="button"  class="btn btn-primary btn-update mb-1">Update</button></a>
                <a href="{{ url('deleteA/'.$list->id()) }}" type="button"  class="btn btn-primary btn-danger mb-1">Delete</button></td></a>
            </tr>
            @endforeach

            </thead>
   <tbody id="H_admin_list">

   </tbody>
</table>
</div>
</div>
</div>

<!-- Form -->
<div class="col-md-4">
         <div class="card">
            <div class="card-header bg-dark text-white">
               <h4>Register Healthcare Admin</h4>
            </div>
            <div class="card-body">
            <form action="{{ route('auth.save1') }}" method="post" autocomplete="off">

           
            @if(Session::get('success'))
                  <div class="alert alert-success">
                     {{ Session::get('success') }}
                  </div>
               @endif

               @if(Session::get('fail'))
                  <div class="alert alert-danger">
                     {{ Session::get('fail') }}
                  </div>
               @endif

               @csrf
            
         <div class="mb-3">
               <label for="formGroupExampleInput" class="form-label">First Name</label>
               <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
            </div>

            <div class="mb-3">
               <label for="formGroupExampleInput" class="form-label">Last Name</label>
               <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
            </div>

            <div class="mb-3">
               <label for="formGroupExampleInput" class="form-label">Email</label>
               <input type="text" class="form-control" name="email" placeholder="Enter Email">
            </div>
<div class="card-footer">
   <button class="btn btn-success btn-block">Register</button>
   

</div>
         </form>

</div>
</div>
</div>
</div>

</main>
</div>

@endsection


