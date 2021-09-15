@if(isset($errors))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">×</span></button>
@foreach($errors as $error_array)
    @foreach($error_array as $error_item)
    <strong>Oh snap!</strong> {{ $error_item }} .
    @endforeach
@endforeach
</div>
@endif

@if(isset($success) || \App\Classes\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
@if(isset($success))
<strong>Well done!</strong> {{ $success }}
@elseif(\App\Classes\Session::has('success'))
{{ \App\Classes\Session::flash('success') }}
@endif
</div>
@endif



