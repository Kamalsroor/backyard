<!-- start properties  -->
<div class="properties" id="prop">
    <div class="container">
        <h1 class="aboutUs__tittle">properties</h1>
        <p class="aboutUs__artical">{{ Str::limit(setting()->properties_des , $limit = 200, $end = '...') }}</p>
        <div class="sale-falter__button">
            <div class="dropdown d-md-none d-block">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    places
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                </div>
            </div>
            <button class="rental active">Rental</button>
            <button class="sale">Sale</button>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 filter-place d-md-block d-none">
                @foreach ($Place as $Place)
                    <button class="properties__button-place @if ($loop->first) active @endif" data-place-id="{{$Place->id}}" data-toggle="tooltip" data-placement="bottom" title="{{$Place->name}}">
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



