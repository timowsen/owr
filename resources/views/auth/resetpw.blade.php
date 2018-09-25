@extends ('layout')
    @section ('content')
        <!-- content -->
        <div class="container text-ow-white justify-content-md-center">
            <form class="form-horizontal" role="form" method="POST" action="/resetpassword">
                @csrf
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h2>Change your password</h2>
                        <hr>
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
                        <button type="submit" name="resetpw" class="btn btn-success"><i class="fa fa-user-plus"></i> Change Password</button>
                        <a href="/" class="btn btn-danger">BACK</a>
                    </div>
                </div>
            </form>
        </div>
        @include('../errors')
    @endsection