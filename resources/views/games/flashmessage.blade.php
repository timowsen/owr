@if ($flash = session('message'))
    <div class="alert alert-success center-block text-center" role="alert" data-dismiss="alert">
        <strong>{{ $flash }}</strong>
    </div>
@endif