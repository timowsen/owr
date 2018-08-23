<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form action="/games" method="POST">
              @csrf
              <div class="fixed-top-add-game mt-1 mr-1">
                  <input type="submit" name="submit" value="ADD GAME" class="btn btn-xs btn-success">
                  <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
              </div>
              <div class="mt-1">
                  <label for="rating">Rating:</label>
                <input type="text" name="rating" id="rating" value="{{ old('rating') }}" autofocus><br>
                  <label for="win">Win</label>
                  <input type="radio" name="win" id="win" value="1">
                  <label for="win">Loose</label>
                  <input type="radio" name="win" id="win" value="2">
                  <label for="win">Draw</label>
                  <input type="radio" name="win" id="win" value="3">
                  <label for="bobos">Boboteam</label>
                  <input type="checkbox" name="bobos" id="bobos" value="1">
              </div>  
            <div class="matchselector">
                <h2 class="text-lg-left m-0">HERO:</h2>
                <p>(MIN:1 MAX:3)</p>
                <div class="row heroselect">
                @foreach ($heroes as $hero)
                  <div class="col-md-1 col-4">
                    <input class="single-checkbox" type="checkbox" name="herochoice[]" id="{{ $hero->name }}" value="{{ $hero->id }}" />
                  <label for="{{ $hero->name }}" class="bla-hm m-0" style="background-image: url('{{ asset($hero->picture) }}');"></label>
                  </div>
                @endforeach
                </div>
                <h2 class="text-lg-left m-0">MAP:</h2>
                <div class="row">
                @foreach ($maps as $map)
                <div class="col-lg-2 col-6">
                  <figure class="figure">
                  <input type="radio" name="mapchoice" id="{{ $map->name }}" value="{{ $map->id }}" />&nbsp;
                  <label for="{{ $map->name }}" class="text-ow-white bla-map" style="background-image: url('{{ ($map->picture) }}');"></label>&nbsp;
                  <figcaption class="figure-caption text-center"><b>{{ $map->name }}</b></figcaption>
                  </figure>
                </div>
                @endforeach
                </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
