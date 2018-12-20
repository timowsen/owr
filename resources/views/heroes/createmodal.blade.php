<div class="modal fade" id="addHeroModal" tabindex="-1" role="dialog" aria-labelledby="addHeroModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST"
              action="/backoffice/heroes/create">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Add Hero</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container justify-content-md-center">
                        <div class="row">
                            <div class="col-md-3 field-label-responsive">
                                <label for="type">Type</label>
                            </div>
                            <div class="col-md-6 field-label-responsive">
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon" style="width: 2.6rem"></div>
                                        <select name="type" id="type" class="custom-select custom-select">
                                            <option value="1">Tank</option>
                                            <option value="2">DPS</option>
                                            <option value="3">Support</option>
                                        </select>
                                    </div>
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
                                        <input type="text" name="name" class="form-control" id="name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 field-label-responsive">
                                <label for="password">Icon</label>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-danger">
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon" style="width: 2.6rem"></div>
                                        <div class="input-group col-md-11">
                                            <input type="file" class="custom-file-input form-control" name="picture"
                                                   id="addHeroIcon" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="addHeroIcon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> ADD HERO
                    </button>
                    <a href="/backoffice/heroes" class="btn btn-danger">BACK</a>
                </div>
            </div>
        </form>
    </div>
</div>