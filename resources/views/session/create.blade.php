@extends('layout')

@section('content')

   <div class="card">

   	 <h1>Register</h1>

   	 <form>
   	 	 
   	 	 <div class="form-group">

   	 	 	<label for="name">Name</label>

   	 	 	<input type="text" name="name" class="form-control">
   	 	
   	     </div>

         <div class="form-group">

   	 	 	<label for="name">Email</label>

   	 	 	<input type="email" name="email" class="form-control">
   	 	
   	     </div>

   	     <div class="form-group">

   	 	 	<label for="name">Password</label>

   	 	 	<input type="password" name="password" class="form-control">
   	 	
   	     </div>
         
         <button type="submit" class="btn btn-primary">Submit</button>

   	 </form>

   	 
   	
   </div>

@endsection