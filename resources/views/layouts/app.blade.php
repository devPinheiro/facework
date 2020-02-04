<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="description" content="Freelance job work freelance artisans NIgeria freelence oppportunities"/>
<link rel="canonical" href="http://facework.com.ng/" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Facework - freelance platform" />
<meta property="og:description" content="Freelance job work freelance artisans NIgeria freelence oppportunities" />
<meta property="og:url" content="http://facework.com.ng/" />
<meta property="og:site_name" content="Facework - freeelance Nigeria Jobs" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="Freelance job work freelance artisans NIgeria freelence oppportunities" />
<meta name="twitter:title" content="Facework - freeelance Nigeria Jobs" />
<meta name="twitter:site" content="@Facework10" />
<meta name="twitter:image" content="../../images/favicon.png" />
<meta name="twitter:creator" content="@Facework10" />
    <meta name="google-site-verification" content="I0a4goaZ-BtjG8BJv6BODcOhaKRixSpEMVGbYscahpw" />
    <link rel="icon" href="../../images/favicon.png">
 
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="../images/favicon.png" />

    <title>FaceWork </title>

    <!-- Bootstrap core CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.10/dist/summernote.min.css"> --}}
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
    crossorigin="anonymous">
   
    <!-- Ioninc Awesome CSS -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" >
    {{-- <link rel="stylesheeet" href="css/fontawesome-all.css"> --}}
     <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
   
    
    <!-- Custom styles for this template -->
    <link href="../../build/css/cover.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-102627835-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-102627835-1');
</script>

     <!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-102627835-1', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics --> 

  </head>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="https://use.fontawesome.com/9712be8772.js"></script>
</head>

  <body>
  <div id="app" class="container">     
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      
          <a class="navbar-brand pt-2" href="{{ url('/') }}"><img src="../../images/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
        aria-expanded="false" aria-label="Toggle navigation">
        <i style=" color: #222;" class="ion-navicon"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
  
            <li class="nav-item"><a href="{{ url('/') }}">Home</a></li>

            <li class="nav-item"> <a href="{{ route('job.show')}}" >Jobs</a></li>

                <li class="nav-item"><a href="{{ route('posts.index') }}">Show Case</a></li>
          
               
                  @if (Auth::guest())
                  <li class="nav-item"><a href="{{ route('login') }}">Login</a></li>
                  {{-- <li class="nav-item"><a class="btn btn-secondary" href="{{ route('register') }}">Register</a></li> --}}
                    @else

                    @role('Active')
                     <li class="nav-item"><a href="{{ route('profile.create') }}">Upload Work</a></li>
                    @endrole

                   <li class="nav-item">
                      <div class="dropdown ">
                        <i class="ion-ios-bell-outline dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="badge badge-light">{{ auth()->user()->unreadNotifications->count() }}</span>
                        </i>
                        <div class="dropdown-menu overflow-auto" aria-labelledby="dropdownMenuButton" style="width: 230px;">
                          @if(auth()->user()->unreadNotifications->count() )
                          @foreach (auth()->user()->unreadNotifications as $notification)
                               <div>
                                  <div class="post_img ">
                                      <a class="dropdown-item m-0 p-1" href="/posts/{{ $notification->data['notifs']['id'] }}" ><img src="{{ $notification->data['notifs']['featured'] }}" style="width:2.0rem; height:2.0rem; border-radius: 50%;
                                    
                                  " alt="" class="img-rounded" srcset="">
                                 <small class="text-muted">  {{ $notification->data['notifs']['title'] }} </small><br>
                                 {{-- <small class="text-muted">  {{ $notification->data['notifs']['created_at']->diffForHumans() }} </small> --}}
                                  </a>
                                  </div>
                                 
                              </div>  
                          @endforeach      
                          @else
                          <a class="dropdown-item m-0 text-center" href="#">No notifications</a>
                          @endif
                          
                        </div>
                      </div>
                    </li>

                    <li class="nav-item">
                        <div class="dropdown dropleft">
                            <a href="#" class="m-nav__link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="m-topbar__userpic">
                                <img alt="user profile picture" src="{{ Auth::user()->profile->image }}" class="profile_img_user img-rounded m--marginless img-centered" />
                                </span>                   
                              </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              @role('Admin') {{-- Laravel-permission blade helper --}}

                                <a href="/users" class="dropdown-item m-0">
                                  
                                        Visit Admin Dashboard
                                </a>
                              @endrole
                               
                              <a href="{{ route('profile.index', Auth::user()->id ) }}" class="dropdown-item m-0">
                                 
                                         Dashboard
                              </a>

                              <a href="{{ route('task.show', Auth::user()->id) }}" class="dropdown-item m-0">
                                  
                                    Messages
                                  <span class="badge">
                                        <span class="badge badge-success">
                                          {{ Auth::user()->task->count() }} 
                                        </span>
                                      </span>
                                </a>

                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item m-0">
																		
																		<span class="">
                                      	Log out
																		</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                          </div>
                        </div>
                      </li>
                       
                   
                        @endif
                    </ul>
                    
                </div>
      
    </nav>
   </div> 
        

       
         <div  style="padding-top: 60px;">
          
                
                <div class="container-fluid p-0"> 
                    <div class="row">
                        <div class="col-12">              
                            @include ('errors.list') {{-- Including error file --}}
                        </div>
                    </div>
                </div>     
           
           <div class="container-fluid" >
             <div class="row">
               @if(Session::has('flash_message'))
                  <div class="container-fluid p-0">  
                    <div class="alert alert-success  alert-dismissible fade show" style=" border-radius: 0 !important;
                    font-size: 12px;
                    padding: 5px;
                    text-align: center;" role="alert">
                      <em> {!! session('flash_message') !!} </em>
                      <button type="button" class="close p-0" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
              
                @endif

                @yield('content')

               <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <img src="/images/faceworka_2.jpeg" alt="" srcset="">
                    </div>
                </div>
<div class="row">
                    <div class="col-12">
                        <img src="/images/faceworka_3.jpeg" alt="" srcset="">
                    </div>
                </div>
               </div> 
             </div>
           </div>
            
           
           <div class="container-fluid support">
                <div class="row  pt-4 pb-3">
                  <div class="col-md-4  col-sm-4 ">
                    <h6>Contact Us</h6>
                    <br>
                     <ul class="">
                       <li class=""><i class="fa fa-phone"></i>
                        <a href="tel:08022790906"> 08022790906</a></li>
                      <li class=""><i class="fa fa-envelope"></i>
                        <a href="mailto:contact.facework@gmail.com"> contact.facework@gmail.com</a></li>                
                    </ul>
                    
                  </div>
                  <div class="col-md-4  col-sm-4 ">
                  <h6>Follow us</h6>
                   <br>
                    <ul class="" style="display:inline-flex; padding-right:10px;">
                       <li class="" style="padding-right: 15px;"><a href="https://facebook.com/Facework.com.ng" target="_blank"><i class="font-lg  ion-social-facebook-outline"></i></a></li><br>
                       <li class="" style="padding-right: 15px;"><a href="https://twitter.com/Facework13?s=08" target="_blank"><i class= "font-lg ion-social-twitter-outline"></i></a></li><br>
                       <li class="" style="padding-right: 15px;"><a href="https://www.instagram.com/p/BxuTPeQhbXb/?igshid=1w1taf5rutxr5" target="_blank"><i class="font-lg ion-social-instagram-outline"></i></a></li><br>       
                    </ul>
                    </div>
                  <div class="col-md-4  col-sm-4 ">
                      <h6>Support</h6>
                      <br>
                    <ul class="">
                       <li class=""><a href="#">How it Works</a></li>
                       <li class=""><a href="/register">Join Us</a></li>
                       <li class=""><a href="/terms_and_conditions">Term of use</a></li>     
                    </ul>
                  </div>
                </div>
              </div>

           
              <div class="footer"> <p>
                <script>document.write(new Date().getFullYear())</script> © Facework</p>
              </div>
              </div>

              
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title text-center" id="exampleModalCenterTitle">Which of these best describe how you feel about our services?</h6>
      </div>
      <div class="modal-body">
       <div class="container-fluid">
         <div class="row text-center m-auto pt-3 pb-5">

           
            <div class="col-3 p-2 p-md-2 ">
              <div id="rating_excellent" class="rating">
                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg version="1.1" id="Capa_1 r_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   viewBox="0 0 368 368" style="enable-background:new 0 0 368 368;     background: #ffffFf;
                   color: #fbfbfb;" xml:space="preserve">
                <g>
                  <g>
                    <g>
                      <path d="M248,112c-13.232,0-24,10.768-24,24s10.768,24,24,24s24-10.768,24-24S261.232,112,248,112z M248,144
                        c-4.416,0-8-3.592-8-8s3.584-8,8-8c4.416,0,8,3.592,8,8S252.416,144,248,144z"/>
                      <path d="M120,160c13.232,0,24-10.768,24-24s-10.768-24-24-24s-24,10.768-24,24S106.768,160,120,160z M120,128
                        c4.416,0,8,3.592,8,8s-3.584,8-8,8s-8-3.592-8-8S115.584,128,120,128z"/>
                      <path d="M184,0C82.536,0,0,82.544,0,184s82.536,184,184,184s184-82.544,184-184S285.464,0,184,0z M184,352
                        c-92.632,0-168-75.36-168-168S91.368,16,184,16s168,75.36,168,168S276.632,352,184,352z"/>
                      <path d="M264,208H104c-4.424,0-8,3.584-8,8c0,48.52,39.48,88,88,88s88-39.48,88-88C272,211.584,268.424,208,264,208z M184,288
                        c-37,0-67.56-28.048-71.552-64h143.104C251.56,259.952,221,288,184,288z"/>
                    </g>
                  </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                </svg>
              </div>
  
             </div>


             <div class="col-3 p-2 p-md-2 ">

              <div id="rating_happy" class="rating">
                <!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                <svg version="1.1" id="Capa_1 r_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   viewBox="0 0 295.996 295.996" style="enable-background:new 0 0 295.996 295.996;     background: #ffffFf;
                   color: #fbfbfb;" xml:space="preserve">
                <g>
                  <path d="M147.998,0C66.392,0,0,66.392,0,147.998s66.392,147.998,147.998,147.998s147.998-66.392,147.998-147.998
                    S229.605,0,147.998,0z M147.998,279.996c-36.256,0-69.143-14.696-93.022-38.44c-9.536-9.482-17.631-20.41-23.934-32.42
                    C21.442,190.847,16,170.047,16,147.998C16,75.214,75.214,16,147.998,16c34.523,0,65.987,13.328,89.533,35.102
                    c12.208,11.288,22.289,24.844,29.558,39.996c8.27,17.239,12.907,36.538,12.907,56.9
                    C279.996,220.782,220.782,279.996,147.998,279.996z"/>
                  <circle cx="99.666" cy="114.998" r="16"/>
                  <circle cx="198.666" cy="114.998" r="16"/>
                  <path d="M147.715,229.995c30.954,0,60.619-15.83,77.604-42.113l-13.439-8.684c-15.597,24.135-44.126,37.604-72.693,34.308
                    c-22.262-2.567-42.849-15.393-55.072-34.308l-13.438,8.684c14.79,22.889,39.716,38.409,66.676,41.519
                    C140.814,229.8,144.27,229.995,147.715,229.995z"/>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                </svg>
              </div>
  
             </div>

           
           <div class="col-3 p-2 p-md-2 ">
            <div id="rating_blah" class="rating">
              <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
              <svg version="1.1" id="Capa_1 r_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 368 368" style="enable-background:new 0 0 368 368;     background: #ffffFf;
                 color: #fbfbfb;" xml:space="preserve">
              <g>
                <g>
                  <g>
                    <path d="M184,0C82.544,0,0,82.544,0,184s82.544,184,184,184c101.464,0,184-82.544,184-184S285.464,0,184,0z M184,352
                      c-92.64,0-168-75.36-168-168S91.36,16,184,16c92.632,0,168,75.36,168,168S276.632,352,184,352z"/>
                    <path d="M144,152c0-13.232-10.768-24-24-24s-24,10.768-24,24s10.768,24,24,24S144,165.232,144,152z M112,152c0-4.408,3.592-8,8-8
                      s8,3.592,8,8s-3.592,8-8,8S112,156.408,112,152z"/>
                    <path d="M248,128c-13.232,0-24,10.768-24,24s10.768,24,24,24s24-10.768,24-24S261.232,128,248,128z M248,160
                      c-4.416,0-8-3.592-8-8s3.584-8,8-8c4.416,0,8,3.592,8,8S252.416,160,248,160z"/>
                    <path d="M184,224c-29.824,0-58.24,12.632-77.96,34.664c-2.944,3.296-2.664,8.352,0.624,11.296
                      c3.296,2.952,8.352,2.664,11.296-0.624C134.648,250.688,158.72,240,184,240c25.28,0,49.352,10.688,66.04,29.336
                      c1.576,1.768,3.768,2.664,5.96,2.664c1.896,0,3.816-0.672,5.336-2.04c3.288-2.944,3.568-8,0.624-11.296
                      C242.24,236.64,213.832,224,184,224z"/>
                  </g>
                </g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              </svg>
            </div>

           </div>

           <div class="col-3 p-2 p-md-2 ">
          
              <!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
              <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
              <div id="rating_sad" class="rating">
              
              <svg version="1.1" id="Capa_1 r_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 295.996 295.996" style="enable-background:new 0 0 295.996 295.996;     background: #ffffFf;
                 color: #fbfbfb;" xml:space="preserve">
              <g>
                <path d="M147.998,0C66.392,0,0,66.392,0,147.998c0,81.606,66.392,147.998,147.998,147.998c81.606,0,147.998-66.392,147.998-147.998
                  C295.996,66.392,229.604,0,147.998,0z M147.998,279.996c-36.257,0-69.143-14.696-93.023-38.44
                  c-9.536-9.482-17.631-20.41-23.934-32.42C21.442,190.847,16,170.047,16,147.998C16,75.214,75.214,16,147.998,16
                  c34.523,0,65.987,13.328,89.533,35.102c12.208,11.288,22.289,24.844,29.558,39.996c8.27,17.239,12.907,36.538,12.907,56.9
                  C279.996,220.782,220.782,279.996,147.998,279.996z"/>
                <circle cx="98.666" cy="114.998" r="16"/>
                <circle cx="197.666" cy="114.998" r="16"/>
                <path d="M214.247,202.729c1.227,2.176,2.358,4.438,3.363,6.724l14.648-6.436c-1.218-2.771-2.589-5.513-4.075-8.148
                  c-17.022-30.189-50.399-48.544-85.014-46.744c-34.383,1.779-65.563,23.325-79.435,54.892l14.648,6.438
                  c11.461-26.08,37.215-43.881,65.613-45.351C172.568,162.618,200.18,177.782,214.247,202.729z"/>
                <rect x="97.331" y="67.997" transform="matrix(0.8104 0.5859 -0.5859 0.8104 66.0127 -51.9888)" width="32" height="16.001"/>
                <rect x="174.663" y="59.997" transform="matrix(0.5859 0.8104 -0.8104 0.5859 137.2266 -116.5569)" width="16.001" height="32"/>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              </svg>
            </div>
              

           </div>

          
         
         </div>
       </div>

       <div class="row">
         <div class="container-fluid">
            <div class="form-group col-md-12">
                <textarea name="" id="feedback" class="form-control" placeholder="Tell us how we can improve our services" id="" cols="20" rows="3"></textarea>
             </div>
         </div>
        
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="submit_feedback" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>




             
          

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenLite.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
      <!--<script>-->
      <!--$('#summernote').summernote({-->
      <!--      placeholder: 'Hello stand alone ui',-->
      <!--      tabsize: 2,-->
      <!--      height: 100-->
      <!--    });-->
      <!--  </script>-->

      <!--begin::Base Scripts -->

      

    
    <!--end::Base Scripts -->  
    <script src="../../js/owl.carousel.min.js"></script>
    
        <!--begin::Page Snippets -->
    <!-- jQuery CDN -->
		<script src="../../build/js/typeahead.js" type="text/javascript"></script>
		<script src="../../build/js/script.js" type="text/javascript"></script>
	 <!--end::Page Snippets -->
    <script id="dsq-count-scr" src="//facework-com-ng.disqus.com/count.js" async></script>
  </body>
</html>
