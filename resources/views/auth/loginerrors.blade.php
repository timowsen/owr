@if (count($errors))

    <div class="alert alert-danger text-center" role="alert">

                @foreach ($errors->all() as $error)
                    <strong>{{ $error }}</strong>
                @endforeach
            
    </div>


@endif