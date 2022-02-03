@extends('layouts.app')
@section('content')

<div class="container">
<main class="mx-auto m-4">
   <div class="row">
      <div class="col-md-9">
         <div class="card">
            <div class="card-header bg-dark text-white">
               <h4>Active Admin List</h4>
            </div>
            <div class="card-body">
            <table class="table table-bordered border-primary">
  <thead>
     <tr>
        <th>#</th>
        <th class="text-center">First Name</th>
        <th class="text-center">Last Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Role</th>
        <th class="text-center">State</th>
        <th class="text-center">Action</th>
      </tr>

      @php $i=1; @endphp
      @foreach($admin as $list)
      @if ($list)

      @endif

      <tr>
      <td>{{$i++}}</td>
      <td class="text-center">{{$list->data()['first_name']}}</td>
      <td class="text-center">{{$list->data()['last_name']}}</td>
      <td class="text-center">{{$list->data()['email']}}</td>
      <td class="text-center">{{$list->data()['role']}}</td>
      <td class="text-center">{{$list->data()['state']}}</td>
      <td class="text-center"><a href="{{ url('viewA/'.$list->id()) }}" type="button"  class="btn btn-primary btn-update mb-1">Update</button></a>
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
<div class="col-md-3">
         <div class="card">
            <div class="card-header bg-dark text-white">
               <h4>Register an Admin</h4>
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
               <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" required>
            </div>

            <div class="mb-3">
               <label for="formGroupExampleInput" class="form-label">Last Name</label>
               <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required>
            </div>

            <div class="mb-3">
               <label for="formGroupExampleInput" class="form-label">Email</label>
               <input type="text" class="form-control" name="email" placeholder="Enter Email" required>
            </div>

            <div class="mb-3">
               <label for="formGroupExampleInput" class="form-label">State:</label>
               <select id="state" name="state" required>
               <option value="Johor">Johor</option>
               <option value="Kedah">Kedah</option>
               <option value="Kelantan">Kelantan</option>
               <option value="Kuala Lumpur">Kuala Lumpur</option>
               <option value="Labuan">Labuan</option>
               <option value="Malacca">Malacca</option>
               <option value="Negeri Sembilan">Negeri Sembilan</option>
               <option value="Pahang">Pahang</option>
               <option value="Perak">Perak</option>
               <option value="Perlis">Perlis</option>
               <option value="Penang">Penang</option>
               <option value="Sabah">Sabah</option>
               <option value="Sarawak">Sarawak</option>
               <option value="Selangor">Selangor</option>
               <option value="Terengganu">Terengganu</option>
            </select>
            </div>

            <div class="mb-3">
               <label for="formGroupExampleInput" class="form-label">Role:</label>
               <select id="role" name="role" required>
               <option value="Healthcare Admin">Healthcare Admin</option>
               <option value="Master Admin">Master Admin</option>
               </select>
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


