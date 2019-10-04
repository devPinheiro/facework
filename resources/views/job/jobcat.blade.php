@extends('layouts.admin')

@section('title', '| Create Permission')
@section('content')
<div class="row">
    <div class="col-sm-6">
       <div class="m-portlet m-portlet--tab">
								<div class="m-portlet__head">
									<div class="m-portlet__head-caption">
										<div class="m-portlet__head-title">
											<span class="m-portlet__head-icon m--hide">
												<i class="la la-gear"></i>
											</span>
											<h3 class="m-portlet__head-text">
												<i class='fa fa-key'></i> Create Job Category
											</h3>
										</div>
									</div>
								</div>
								<!--begin::Form-->
								
									<div class="m-portlet__body">

                                        {{ Form::open(array('url' => route('job_category.store') , 'enctype' => 'multipart/form-data',)) }}

                                        <div class="form-group m-form__group">
                                            {{ Form::label('title', 'Job Category Title') }}
                                            {{ Form::text('title', null, array('class' => 'form-control m-input m-input--solid')) }}
                                        </div><br>
                                      
                                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

                                        {{ Form::close() }}

                                                                    
                                                                        
                                                                    <!--end::Form-->
                            </div>
                          
            </div>
    </div>
    
    <div class="col-sm-6">
       <div class="m-portlet m-portlet--tab">
								<div class="m-portlet__head">
									<div class="m-portlet__head-caption">
										<div class="m-portlet__head-title">
											<span class="m-portlet__head-icon m--hide">
												<i class="la la-gear"></i>
											</span>
											<h3 class="m-portlet__head-text">
												<i class='fa fa-key'></i> Existing Job Categories
											</h3>
										</div>
									</div>
								</div>
								
									<div class="m-portlet__body">

                                       {{-- Add table of existing job category --}}

                                          <table class="m_datatable__table table table-striped table-striped table-bordered m-table">
											<thead>
                                                <tr>
                                                    <th>Title</th>
                                                   
                                                </tr>
											</thead>
											<tbody>
												 @foreach ($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->title }}</td>

                                                        </td>
                                                    </tr>
                                                    @endforeach							
											</tbody>
										</table>                          
                                                                    
                                    </div>
                          
            </div>
    </div>
</div>


@endsection