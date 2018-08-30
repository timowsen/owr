@extends('backoffice.admin')


    @section('type')

        <div class="userlist text-ow-white mt-1">
            <ul class="list-group text-center align-items-middle">
                @foreach ($users as $user)
                
                    <li class="list-inline-item align-middle">
                        <div class="cardbo text-white mb-3">
                            <div class="card-body">

                                <form action="/backoffice/users" method="POST" class="inline-group">
                                    @csrf
                                    <p class="card-text">
                                            USER: {{ $user->name }}&nbsp;&nbsp;E-MAIL: {{ $user->email }}
                                    </p>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" name="delete" value="{{$user->id}}" class="btn btn-outline-danger">DELETE USER</button>
                                    <button type="submit" name="resetpw" value="{{$user->id}}" class="btn btn-outline-primary">RESET PASSWORD</button>
                                    <button type="submit" name="changepw" value="{{$user->id}}" class="btn btn-outline-light">CHANGE ROLE</button>
                                </form>
                            </div>
                        </div>      
                    </li>

                @endforeach
            </ul>
        </div>
        
    @endsection