@extends ('layout')
    @section ('content')
        <!-- content -->
        <div class="container text-ow-white justify-content-md-center">
            <form class="form-horizontal" role="form" method="POST" action="/registeradmin">
                @csrf
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h2>ADMIN</h2>
                        <div class="alert alert-danger" role="alert">
                            <p>You need to register an Admin to use this website and the corresponding backoffice!</p>
                          </div>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Max" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                                <span class="text-danger align-middle">
                                    <!-- Put name validation error messages here -->
                                </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="email">E-Mail Address</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="you@example.com"  autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                                <span class="text-danger align-middle">
                                    <!-- Put e-mail validation error messages here -->
                                </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-danger">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="password">Confirm Password</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem">
                                    <i class="fa fa-repeat"></i>
                                </div>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation" placeholder="Password" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <br>
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Register Admin</button>
                    </div>
                </div>
            </form>
        </div>
        @include('../errors')
    @endsection