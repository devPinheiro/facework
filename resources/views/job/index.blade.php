@extends('layouts.admin')

@section('title', '| Create Permission')
@section('content')
<div class="row">
    <div class="col-sm-12">
       <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="la la-gear"></i>
                                        </span>
                                        <h3 class="m-portlet__head-text">
                                            <i class='fa fa-suitcase'></i> View Job Listing
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <!--begin::Form-->
								
									
                            <div class="m-portlet__body">
                                <!--begin::Section-->
                                <div class="m-section">
                                    <div class="m-section__content">
                                        <table class="table m_datatable__table table-striped table-bordered m-table">
                                            <thead>
                                        <tr>
                                            <th>Job Title</th>
                                             <th>Deadline</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobs as $job)
                                            <tr>
                                                <td> 
                                                    <div >
                                                      <p>{{ $job->title }}</p>
                                                    </div>        
                                                </td> 
                                                
                                                <td> 
                                                    <div >
                                                      <p>{{ $job->deadline_date }}</p>
                                                    </div>        
                                                </td> 
                                                
                                            
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['job.destroy', $job->id] ]) !!}
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