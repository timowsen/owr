@if (count($errors))
    <div class="alert alert-info center-block text-center" role="alert" data-dismiss="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li><strong>{{ $error }}</strong></li>
            @endforeach
        </ul>
    </div>
@endif