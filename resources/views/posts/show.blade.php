@extends('layouts.app')

@section('title', '| View Post')
<br>
@section('content')

 <div class="col-md-12">
	 <div class="row  pb-5">
		 <div class="col-sm-6 pt-2 pb-4">			
			 <div class="text-center">
				 <img class="img-fluid" src="{{ $post->featured }}" alt="">
			 </div>
		 </div>
		 
		 <div class="col-sm-6 text-dark">

			
			  <div class="row user pb-2">
			
				<div class="pl-2">
					<a href="{{ route('profile.show', $post->profile->id ) }}">
				    <img style="width:3.5rem; height:3.5rem; border-radius: 50%;
					box-shadow: inset 0px 0px 0px 6px rgba(212, 210, 210, 0.67);
				" class="m-widget19__img img-circle" src="{{ $post->profile->image }}" alt="">
					  </a>
				</div>

				<div class=" pt-1 col-8">

					<small class="text-dark" style="font-size:18px">
						{{ $post->profile->name }}
					</small>
					<br>
					<small class="text-muted text-dark">
						{{ $post->profile->service }}
						
					</small>
					
				 </div>

				 <div class="like float-left">
						{!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}                  
                                                    
						@if($post->is_liked_by_auth_user())
						<a href="{{ route('post.unlike',  $post->id ) }}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand "><i class="fa fa-thumbs-down p-1"></i> <span class="badge">{{ $post->likes->count() }}</span></a>
						@else
						   <a href="{{ route('post.like', $post->id ) }}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand "><i class="fa fa-thumbs-up p-1"></i>  <span class="badge">{{  ($post->likes->count() == 0 ? '' : $post->likes->count()) }}</span></a>
						@endif
						{{-- @can('Edit Post')
						<a href="{{ route('posts.edit', $post->id) }}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom" role="button">Edit</a>
						@endcan
						@can('Delete Post')
						{!! Form::submit('Delete', ['class' => 'btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom ']) !!}
						@endcan --}}
						{!! Form::close() !!}
				 </div>

			  </div>

			  <div class="post-conttent pt-3">
					     <h5 class="m-widget19__title ">
							{{ $post->title }}
						 </h5>
						 <p class="text-muted pt-1">
							{{ $post->body }}
						 </p>
			  </div>
			
				
			
				 @if ($comments->count() > 0)
				  <h6 class="pt-5">{{$comments->count()}} thought(s) on this work</h6>
				  <div class="list-group pt-2">
					  @foreach ($comments as $comment)

					   <span class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="row pb-2">	
							<div class="post_img pl-2"><img src="{{ $comment->profile->image }}" style="width:3.0rem; height:3.0rem; border-radius: 50%;
								box-shadow: inset 0px 0px 0px 6px rgba(212, 210, 210, 0.67);
							" alt="" class="img-rounded" srcset="">
							</div>
							
							<div class=" pl-2">
								<div class="text-left">
										<small class="font-weight-bold pb-1">{{ $comment->profile->name }}</small><br>	
										<small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
								</div>
								
							</div>
						</div>
							<div class="text-dark">
									<p>{{ $comment->body }}</p>	
							</div>						
							
						</span>
						<br>
					   @endforeach   	
			       </div>
				 @else
				     <p class="text-dark pt-3">Be the first to write a comment</p>
				 @endif


				 @if (auth::user())
				 {{-- comments section --}}
				 <form action="{{ Route('comment.post') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group pt-3 pb-3">
						<label for="exampleInputEmail1">Write a comment</label>
						<input type="hidden" name="post_id" value="{{$post->id}}">
						<input type="hidden" name="profile_id" value="{{ Auth::user()->profile->id}}">
						<textarea type="text" name="body" row="5" cols="10" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your thoughts"></textarea>
						<small id="emailHelp" class="form-text text-muted">Say something nice, don't be rude!</small>
					</div>			
					<button type="submit" class="btn btn-primary">Submit</button>
				 </form>
				 @endif
				
			
		 </div>
	 </div>
 </div>

 <div class="container-fluid">
	 <div class="row pt-5 pb-5">
      

	  @if(count($profile->post) !== 0)
	  <div class="col-12">
		<h6>More from {{ $post->profile->name }}</h6>
	  </div>
	  
		  @foreach ($profile->post as $post)

			<div class="col-md-3 p-3" >
				<a href="{{ route('posts.show', $post->id ) }}">

				<div class="card">
				<div class="card-img-top img-fluid" style="height: 200px; background: url({{ $post->featured }}) no-repeat;     background-size: cover;" >
					
					</div>
					
					<div class="card-body">
					<h6 class="text-dark">	{{ $post->title }}</h6>
					<p class="card-text"> </p>
					<div class="full row">
						<div class="col-2 pr-0"><img width: 2.0rem !important;
    height: 2.0rem;
    border-radius: 50%;
    box-shadow: inset 0px 0px 0px 6px rgba(212, 210, 210, 0.67);
 src="{{ $post->profile->image }}" class="img-rounded" alt="" srcset=""></div>
						<div class="col-7 pl-2 mb-0"><p class="card-text"><small class="text-dark">{{ $post->profile->name }}</small></p>
					</div>
						<div class="col-3"><p class="card-text"><small class="text-muted"><i class="fa fa-thumbs-up pl-2"></i> <strong>{{ $post->likes->count() }}</strong></small></p></div>
				</div>
					
					</div>
				</div>

				</a>
			</div>

			@endforeach
			@endif
	  
	 </div>
 </div>
{{-- 
                            <div class="col-md-3 hidden-md-down">
								<div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Talent's Profile
												</h3>
											</div>
										</div>
									</div>
									
										<!--begin::Section-->
										
                                     <div class="m-portlet__body" style="padding:1.0rem;">
										<div class="m-widget4">										
										<a href="{{ route('profile.show', $post->profile->id ) }}">
											<div class="m-widget4__item" style="border-bottom: 0.07rem dashed #ebedf2;">
												<div class="m-widget4__img m-widget4__img--logo">
												
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__title">
														View profile 
													</span>
													<br>
													<span class="m-widget4__sub">
														
													</span>
												</div>
												
											</div>
										</a>
											
                                            
										</div>
									</div>

                                    
										<!--end::Section-->
										<div class="m-separator m-separator--dashed"></div>
									</div>
							</div>
							<div class="col-md-5">
								<!--begin:: Widgets/Blog-->
								<div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
									<div class="m-portlet__head m-portlet__head--fit">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-action">
												
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="m-widget19">
											<div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
											<img src="{{ $post->featured }}" alt="">
												<h2 class="m-widget19__title m--font-light">
													{{ $post->title }}
												</h2>
												<div class="m-widget19__shadow"></div>
											</div>
											<div class="m-widget19__content">
												<div class="m-widget19__header">
												<a href="{{ route('profile.show', $post->profile->id ) }}">
													<div class="m-widget19__user-img">
													<img style="width:4.2rem; height:4.0rem" class="m-widget19__img" src="{{ $post->profile->image }}" alt="">
													</div>
													<div class="m-widget19__info">
														<span class="m-widget19__username">
															{{ $post->profile->name }}
														</span>
														<br>
														<span class="m-widget19__time">
															{{ $post->profile->service }}
														</span>
														<span class="m-widget19__time">
															{{ $post->profile->state }}
														</span>
													</div>
												</a>
													
												</div>
												<div class="m-widget19__body">
													{{ $post->body }} 
												</div>
											</div>
											<div class="m-widget19__action">

													 
													 
													{!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}                  
                                                    
                                                    @if($post->is_liked_by_auth_user())
											        <a href="{{ route('post.unlike',  $post->id ) }}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand "><i class="fa fa-thumbs-down p-1"></i> <span class="badge">{{ $post->likes->count() }}</span></a>
													@else
								                       <a href="{{ route('post.like', $post->id ) }}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand "><i class="fa fa-thumbs-up p-1"></i>  <span class="badge">{{  ($post->likes->count() == 0 ? '' : $post->likes->count()) }}</span></a>
													@endif
                                                    @can('Edit Post')
                                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom" role="button">Edit</a>
                                                    @endcan
                                                    @can('Delete Post')
                                                    {!! Form::submit('Delete', ['class' => 'btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom ']) !!}
                                                    @endcan
                                                    {!! Form::close() !!}
												
											</div>
										</div>
									</div>
								
									
								

								<!--end:: Widgets/Blog-->
							
								
							</div>
							
							<div class="m-portlet__body" style="padding:0rem;">

								<div class="col-12 p-3">
									<div class="fb-comments" data-href="http://facework.com.ng" data-numposts="10"></div>
								</div>

							</div>

							</div>
                                
                            <div class="col-md-4">
		                          <div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Featured Posts
												</h3>
											</div>
										</div>
									</div>
									
										<!--begin::Section-->
										
                                     <div class="m-portlet__body" style="padding:1.0rem;">
										<div class="m-widget4">
											@foreach($posts as $singlePost)
										<a href="{{ route('posts.show', $singlePost->id ) }}">
											<div class="m-widget4__item" style="border-bottom: 0.07rem dashed #ebedf2;">
												<div class="m-widget4__img m-widget4__img--logo">
												<img style="border-radius:5%" src="{{ $singlePost->featured }}" alt="">
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__title">
														{{ $singlePost->title }}
													</span>
													<br>
													<span class="m-widget4__sub">
														{{ str_limit( $singlePost->body, 40) }}
													</span>
												</div>
												<span class="m-widget4__ext">
													<i class="flaticon-m"></i>
												</span>
											</div>
										</a>
											@endforeach
                                            
										</div>
									</div>

                                    
										<!--end::Section-->
										<div class="m-separator m-separator--dashed"></div>
									</div>
								</div>

							
		 --}}

@endsection