@extends('layouts.admin')

@section('title', '| Permissions')

@section('content')

  <div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Roles
                </h3>
            </div>
        </div>
            <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                        <a href="{{ URL::to('permissions/create') }}" class="m-portlet__nav-link btn btn-success m-btn m-btn--pill m-btn--air"><i class="flaticon-add"></i> Add Permission</a>                                
                </li>
                
            </ul>
        </div>
    </div>
        
    <div class="m-portlet__body">
        <!--begin::Section-->
        <div class="m-section">
            <div class="m-section__content">
                <table class="table table-striped m-table">
                    <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
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
<!--end::Form-->
</div>

@endsection