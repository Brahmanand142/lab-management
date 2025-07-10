 @extends('frontend.layouts.master')
@section('title', 'Register')
@section('content')
 <div class="container mt-5" >  
    <div class="row justify-content-center" > 
        <div class="col-md-6 col-lg-4 "> 
            <form class="p-4 border rounded shadow-sm"action="{{ route('register.form')}}"   method="POST"> 
                @csrf
                <div class="mb-3 bg-secondary p-2 rounded">  
                    <label for="exampleInputEmail1" class="form-label text-white">Email address</label>  
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div class="mb-3">
                     <label for="exampleInputPassword1" class="form-label">Name</label>
                     <input type="text" name='name' class="form-control" id="exampleInputPassword1">
                     </div>
               
                <div class="mb-3"> 
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                 </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>  
            </form>
        </div>
    </div> 
</div>
@endsection