@extends('/layout')
    @section('content')
            <div class="container text-ow-white justify-content-md-center">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="/heroes">
                    @csrf
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <h2>Add Hero</h2>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 field-label-responsive">
                            <label for="email">Type</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-addon" style="width: 2.6rem"></div>
                                    <select name="type" id="type">
                                        <option value="1">Tank</option>
                                        <option value="1">DPS</option>
                                        <option value="3">Support</option>
                                    </select>
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
                            <label for="name">Name</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-addon" style="width: 2.6rem"></div>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Soldier 76">
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
                            <label for="password">Picture</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-addon" style="width: 2.6rem"></div>
                                    <input type="file" name="picture" class="form-control" id="picture"
                                        placeholder="picture">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-control-feedback">
                            
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> ADD Hero</button>
                            <a href="/games" class="btn btn-danger">BACK</a>
                        </div>
                    </div>
                </form>

                @include('/errors')

            </div>
    @endsection