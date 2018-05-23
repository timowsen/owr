@extends ('layout')

    @section ('content')

            <div class="bg">
                <div class="container justify-content-md-center">
                    <form class="form-signin" action="/login" method="POST">
                            @csrf
                            <label for="email" class="sr-only">Email address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">LOGIN</button>
                            <a href="/register" class="buttonhref btn btn-lg btn-primary btn-block">REGISTER</a>
                            @include('auth.loginerrors')
                            @include('auth.flashmessage')
                    </form>
                </div>
            </div>

    @endsection

   
    @section ('timeout')

        @if (count($errors) || $flash = session('message'))

        <script>
            window.setTimeout(function() {
                    $(".alert").hide(); 
            }, 4000);
        </script>

        @endif
    
    @endsection

    