<!-- Modal -->
<div class="modal fade" id="bnetModal" tabindex="-1" role="dialog" aria-labelledby="bnetModalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form action="/bnetaccount" method="POST">
            @csrf
            <div class="form-group">
                <h1>BATTLE TAG</h1>
                <p class="text-center">Format: mustermann#1337</p>
                <div class="row justify-content-md-center">
                  <input type="text" name="bnetaccount" class="form-control col-lg-6">
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" value="ADD ACCOUNT" class="btn btn-xs btn-success">
                <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>