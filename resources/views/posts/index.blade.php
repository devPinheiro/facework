@extends('layouts.app')

@section('content')
                     <div class="col-lg-12">                     
                         <h3 class="p-5 text-center">
														All recent posts
													</h3>
										 </div>
           
									   <div class="row">
												@foreach ($posts as $post)

												<div class="col-lg-3" style="box-shadow: 0px 1px 16px 2px #e6e6e6; margin: 30px;">
													<a href="{{ route('posts.show', $post->id ) }}">

													<div class="card">
													<div class="card-img-top img-fluid" style="height: 200px; background: url({{ $post->featured }}) no-repeat;     background-size: cover;" >
														
														</div>
														
														<div class="card-body">
														<h6 class="text-dark">	{{ $post->title }}</h6>
														<p class="card-text"> </p>
														<div class="full row">
															<div class="col-2 pr-0"><img src="{{ $post->profile->image }}" class="img-rounded" alt="" srcset=""></div>
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
                     
											
									
                               
                           
         
@endsection
