 @extends('layouts.app')

@section('content')
 <div class="container-fluid">
             <div class="row ">
               <div class="col-12 jumbo text-center"  style="background: linear-gradient(to bottom, rgba(22, 22, 22, 0.49) 0%, rgba(22, 22, 22, 0.49) 75%, rgba(22, 22, 22, 0.49) 100%), url('../../images/slider4.png');background-position: center;background-repeat: no-repeat;background-attachment: scroll;background-size: cover; !important">
                <br> 
                 
                <h1 class=" text-white">Discover and get quick job done</h1>
                 <h4 class=" text-white">Your one number freelance platform</h4>
                 <br>
                 <div class="row text-left" >
                          {{-- <div id="bloodhound">
                              <input class="typeahead" type="text" placeholder="Profession e.g UI Designer">
                            </div> --}}
                   
                    <form class="form_search"  action="/search" method="get">
                    
                      <div class="form-group m-form__group" style="padding-right:10px;">
										
                          <div id="bloodhound" class=" m-input-icon m-input-icon--left">
                            
                            <input type="text" class="form-control form-control-lg m-input typeahead" required name="query_service" placeholder="Profession e.g UI Designer">

                            <span class="m-input-icon__icon m-input-icon__icon--left">
                              <span>
                                
                              </span>
                            </span>
                          </div>
                        </div>
                    
                      <div class="form-group">
                      
                        <div class="m-input-icon m-input-icon--left">
                          <input type="text" class="form-control form-control-lg m-input" required name="query_location" placeholder="Location e.g Lagos">
                          <span class="m-input-icon__icon m-input-icon__icon--left">
                            <span>
                              
                            </span>
                          </span>
                        </div>
                      </div>

                      <div class="form-group ">
                        <button type="submit" class="btn m-btn m-btn--outline  btn-primary btn-lg">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                      </form>
                      
                  
                 </div>
               </div>
             </div>
           </div>

        <div class="container-fluid">
             <div class="row ">
                <div class="col pt-3">
                    <h1 class="text-center text-title">Featured Works</h1>
                </div> 
              </div>
              <div class="row">
               <div class="owl-carousel owl-theme">
                  @foreach ($posts as $post)

                  <div class="item" style="box-shadow: 0px 1px 16px 2px #e6e6e6; margin: 30px;">
                    <a href="{{ route('posts.show', $post->id ) }}">

                      <div class="card">
                      <div class="card-img-top img-fluid" style="height: 200px; background: url({{ $post->featured }}) no-repeat;     background-size: cover;" >
                           
                        </div>
                        
                        <div class="card-body">
                          <h6 class="text-dark">	{{ $post->title }}</h6>
                          <p class="card-text"> </p>
                          <div class="full row">
                            <div class="col-2 pr-0"><img src="{{ $post->profile->image }}"style="width:1.7rem !important; height:1.7rem; border-radius: 50%;
                              box-shadow: inset 0px 0px 0px 6px rgba(212, 210, 210, 0.67); class="img-rounded" alt="" srcset=""></div>
                            <div class="col-7 pl-2 mb-0"><p class="card-text"><small class="text-dark">{{ $post->profile->name }}</small></p>
                           </div>
                            <div class="col-3"><p class="card-text"><small class="text-muted"><i class="fa fa-thumbs-up pl-2"></i> <strong>{{ $post->likes->count() }}</strong></small></p></div>
                       </div>
                          
                        </div>
                      </div>

                    </a>
                  </div>

                  @endforeach 
                
                    
                </div>
              </div>
        </div>
                
@endsection
             