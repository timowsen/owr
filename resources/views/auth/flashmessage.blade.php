@if ($flash = session('message'))
    <div class="alert alert-danger text-center" role="alert">
        <strong>{{ $flash }}</strong>
    </div>
@endif