
<div class="modal fade" id="playtimeqpModal" tabindex="-1" role="dialog" aria-labelledby="bnetModalModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<h1 class="text-center">Quick Play Playtime</h1>
				<ul class="list-group">
					{!! $modal['qptime'] !!}
				</ul>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="bnetstatsModal" tabindex="-1" role="dialog" aria-labelledby="blabla" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<h1 class="text-center">Competitive Playtime</h1>
				<ul class="list-group">
					 {!! $modal['ptime'] !!}
				</ul>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>