@extends('layouts.app')

@section('content')
 
      <!-- Main jumbotron for a primary marketing message or call to action -->
      
         @if(Auth::user())
            @if( Auth::user()->roles()->pluck('name')->implode('') != 'Active')
              <div class="container">      
              <div class="alert alert-info"><em>Hi {{ Auth::user()->name }}, update your profile to get hired quickly </em><a href=" {{ Route('profile.edit', Auth::user()->id) }}">here</a>

              </div>
              </div>
            @endif
          @endif
          
  
<div class="container-fluid">
    @if($results !== null)
  <div class="row ">
      
                <div class="col">
                <h3 class="text-left text-title">Found {{ count($results) }} search results</h3>
                </div> 
              </div>
              <div class="row">
               <div class="owl-carousel owl-theme">
                   
                        @foreach ($results as $profile)

                        @if( $profile->user->roles()->pluck('name')->implode('') === 'Active')

                        <div class="item" style="box-shadow: 0px 1px 16px 2px #e6e6e6; margin: 30px;">
                            <a href="{{ Route('profile.show',  $profile->id) }}" >
                            <div class="card">
                              <div class="img " style=" margin: 0 auto; padding-top: 20px;">
                                  <img class="card-img-top rounded-circle"  style="width:4.5rem; height:4.5rem; border-radius: 50%;
                                  box-shadow: inset 0px 0px 0px 6px rgba(212, 210, 210, 0.67);
                                "  src="{{ $profile->image }}" alt="{{ $profile->name }}">
                              </div>
                             
                              <div class="card-body text-center">
                                <h6 class="text-dark ">	  {{ $profile->user->name }}</h6>
                                <p class="card-text"> </p>
                                <div class="full row">
                                    <div class="col-sm-12"><p class="card-text"><small class="text-dark"><i class="flaticon-suitcase" style="font-size: 12px;"></i>	{{ $profile->service }}</small></p>
                                    </div>
                                      <div class="col-sm-12"><p class="card-text"><small class="text-muted"> <i class="la la-map-marker" style="font-size: 12px;"></i> {{ $profile->state }}</small></p></div>
                                </div>
                                
                              </div>
                            </div>
                           </a>
                          </div>
                        @endif

                        @endforeach
                        
                      
                          
                      @else
                      <div class="row ">
                          <div class="col">
                             <h3 class="text-center text-title pt-5 pb-5 ">No results found for your search</h3>
                          </div> 
                        </div> 

                      @endif
                    </div>
          
                 </div>
              <div class="row ">
                <div class="col">
                   <div class="m-separator m-separator--dashed"></div>
                </div>
               </div>

  </div>

 
  
            
            <div class="container-fluid">
              <div class="row">
                <div class=" col action">

                  

                  <div class="text-center">
                    <h3>Join us now</h3>
                    <hr>
                    <p>Meet other professionals on FaceWork. It is a platform for the right collaborations.</p>
                    <br>
                    <a href="{{ url('/register') }}" class="btn btn-secondary ">Get Started</a>
                  </div>
                 
                </div>
              </div>
            </div>

          
           

              
            
@endsection