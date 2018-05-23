<!-- Modal -->
<div class="modal fade" id="bnetModal" tabindex="-1" role="dialog" aria-labelledby="bnetModalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form action="/bnetaccount" method="POST">
            @csrf
            <div class="form-group">
                <h1>Battle.net Account</h1>
                <p>Format: maxmusterm4nn-1337</p>
                <input type="text" name="bnetaccount" class="form-control">
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