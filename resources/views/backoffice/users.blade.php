@extends('backoffice.admin')


    @section('type')

        <div class="userlist text-ow-white mt-1">
            <ul class="list-group text-center align-items-middle">
                @foreach ($users as $user)
                
                    <li class="list-inline-item align-middle">
                        <div class="cardbo text-white mb-3">
                            <div class="card-body">
                                    <p class="card-text">
                                            USER: {{ $user->name }}&nbsp;&nbsp;E-MAIL: {{ $user->email }}
                                    </p>
                                    <div class="input-group justify-content-center">
                                        <form action="/backoffice/users" method="POST" class="inline-group">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" name="delete" value="{{ $user->id }}" class="btn btn-outline-danger" onClick="return confirm('Really delete this user?')">DELETE USER</button>
                                        </form>
                                        &nbsp;
                                        <form action="/backoffice/users/resetpw" method="POST" class="inline-group">
                                        @csrf
                                        <button type="submit" name="resetpw" value="{{ $user->id }}" class="btn btn-outline-primary">RESET PASSWORD</button>
                                        </form>
                                        &nbsp;
                                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#usermodal{{ $user->id }}">
                                                Change Role
                                        </button>
                                    </div>
                            </div>
                        </div>      
                    </li>

                    <div class="modal fade text-dark" id="usermodal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="bnetModalModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="/backoffice/changeuserrole" method="POST">
                                        @csrf
                                        <h1 class="text-center">Change Role for {{ $user->name }}</h1>
                                              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary @if($user->admin == 1) active @endif">
                                                      <input type="radio" name="role" id="admin" autocomplete="off" value="1" @if($user->admin == 1) checked @endif>Admin
                                                    </label>
                                                    &nbsp;
                                                    <label class="btn btn-outline-info @if($user->admin == 0) active @endif">
                                                      <input type="radio" name="role" id="user" autocomplete="off" value="0" @if($user->admin == 0) checked @endif>User
                                                    </label>
                                                </div>
                                        <div class="modal-footer">
                                            <button type="submit" value="{{ $user->id }}" name="changerole" class="btn btn-primary" onClick="confirm('Really change this users role?')">Change Role</button>
                                            <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        

                @endforeach
            </ul>
        </div>
        
    @endsection