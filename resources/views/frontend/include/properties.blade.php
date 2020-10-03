<!-- start properties  -->
<div data-related="properties" class="properties" id="prop">
    <div class="container">
        <h1 class="aboutUs__tittle">properties</h1>
        <p class="aboutUs__artical">{{ Str::limit(setting()->properties_des , $limit = 200, $end = '...') }}</p>
        <div class="sale-falter__button">
            <div class="dropdown d-md-none d-block">
                <div class="form-group">
                    <label for="places">Text</label>
                    <select id="places" class="form-control" name="">
                            <option value="0" selected>All</option>
                        @foreach ($Place as $Places)
                            <option value="{{$Places->id}}">{{$Places->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="rental active">Rental</button>
            <button class="sale">Sale</button>

        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 filter-place d-md-block d-none">
                <button class="properties__button-place  active " data-place-id="0" data-toggle="tooltip" data-placement="bottom" title="All">
                    <p class="elpsis">All</p> 
                    <div id="triangle-right"></div>
                </button>
                @foreach ($Place as $Place)
                    <button class="properties__button-place " data-place-id="{{$Place->id}}" data-toggle="tooltip" data-placement="bottom" title="{{$Place->name}}">
                        <p class="elpsis">{{$Place->name}}</p> 
                        <div id="triangle-right"></div>
                    </button>
                @endforeach
            </div>
            <div class="col-lg-9 col-md-8 sale-filter">
             
            </div>
        </div>
    </div>
</div>
<!-- end properties  -->



