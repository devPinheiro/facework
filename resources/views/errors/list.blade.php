@if (count($errors) > 0)
    <div class="alert alert-danger  alert-dismissible fade show" style=" border-radius: 0 !important;
    font-size: 12px;
    padding: 5px;
    text-align: left;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close p-0" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif