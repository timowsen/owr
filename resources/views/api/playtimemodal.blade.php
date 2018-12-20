<div class="modal fade" id="playtimeqpModal" tabindex="-1" role="dialog" aria-labelledby="bnetModalModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center">Quick Play Playtime</h1>
                <ul class="list-group">
                    @if (!empty($comptime))
                        @foreach ($qptime as $heroname => $value)
                            <li class="list-group-item">
                                <img src="{{ asset($value['heropicture']) }}" alt="{{ $heroname }}"
                                     class="img-thumbnailtable3">
                                &nbsp;&nbsp;&nbsp;{{$value['value']}}
                                <span class="list-group-progress" style="width: {{$value['barlength']}}%;"></span>
                            </li>
                        @endforeach
                    @endif
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
                    @if (!empty($comptime))
                        @foreach ($comptime as $heroname => $value)
                            <li class="list-group-item">
                                <img src="{{ asset($value['heropicture']) }}" alt="{{ $heroname }}"
                                     class="img-thumbnailtable3">
                                &nbsp;&nbsp;&nbsp;{{$value['value']}}
                                <span class="list-group-progress" style="width: {{$value['barlength']}}%;"></span>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>