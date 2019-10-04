@extends('layouts.admin')

@section('title', '| Create Permission')
@section('content')
<div class="row">
    <div class="col-sm-8">
       <div class="m-portlet m-portlet--tab">
								<div class="m-portlet__head">
									<div class="m-portlet__head-caption">
										<div class="m-portlet__head-title">
											<span class="m-portlet__head-icon m--hide">
												<i class="la la-gear"></i>
											</span>
											<h3 class="m-portlet__head-text">
												<i class='fa fa-key'></i> Upload Advert
											</h3>
										</div>
									</div>
								</div>
								<!--begin::Form-->
								
									<div class="m-portlet__body">

                                        {{ Form::open(array('url' => route('advert.store') , 'enctype' => 'multipart/form-data',)) }}

                                        <div class="form-group m-form__group">
                                            {{ Form::label('featured_image', 'Advert') }}
                                            {{ Form::file('featured',   array('class' => 'form-control-file m-input m-input--solid')) }}
                                        </div><br>
                                      
                                        {{ Form::submit('Upload Advert', array('class' => 'btn btn-primary')) }}

                                        {{ Form::close() }}

                                                                    
                                                                        
                                                                    <!--end::Form-->
                            </div>
                            <div class="m-portlet__body">
                                <!--begin::Section-->
                                <div class="m-section">
                                    <div class="m-section__content">
                                        <table class="table table-striped m-table">
                                            <thead>
                                        <tr>
                                            <th>Advert Placements</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Adverts as $Advert)
                                            <tr>
                                                <td> 
                                                    <div class="img"  style="width:250px; height:300px">
                                                        <img src="{{ $Advert->featured_image }}" class="img-fluid" alt=""  srcset="">
                                                    </div>        
                                                </td> 
                                            
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['advert.destroy', $Advert->id] ]) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end::Section-->
                        </div>
            </div>
    </div>
</div>


@endsection