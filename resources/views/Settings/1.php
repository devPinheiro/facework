@extends('layouts.admin')

@section('content')
   
   <div class="panel panel-default">
       <div class="panel-heading">
           Update Settings
       </div>

       <div class="panel-body">
       <form action="{{ route('settings.update') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="Title">Site Name</label>
            <input type="text" class="form-control" name="site_name" value="{{ $settings->site_name }}" id="name">
            </div>

            <div class="form-group">
                <label for="Title">Contact Email</label>
                <input type="email" class="form-control" name="contact_email" value="{{ $settings->contact_email }}" id="name">
            </div>

             <div class="form-group">
                <label for="Title">Contact Number</label>
                <input type="text" class="form-control" name="contact_number" value="{{ $settings->contact_number }}" id="name">
            </div>
            
            <div class="form-group">
                <label for="Title">Address</label>
                <input type="text" class="form-control" name="address" value="{{ $settings->address }}" id="name">
            </div>

            <div class="form-group m-form__group">
                <label for="Title">Facebook Account</label>
                <input type="text" class="form-control  m-input m-input--solid" name="facebook" value="{{ $settings->facebook }}" id="name">
            </div>

                <div class="form-group m-form__group">
                <label for="Title">Twitter Account</label>
                <input type="text" class="form-control  m-input m-input--solid" name="twitter" value="{{ $settings->twitter }}" id="name">
            </div>

                <div class="form-group m-form__group">
                <label for="Title">Instagram</label>
                <input type="text" class="form-control  m-input m-input--solid" name="instagram" value="{{ $settings->instagram }}" id="name">
            </div>
            
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Settings</button>
                </div>
            </div>
           </form>
       </div>


   </div>

   {{-- {{ Form::open() }} --}}
@endsection