<li class="nav-item start {{ active_link(null,'active open') }} ">
    <a href="{{aurl('')}}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{trans('admin.dashboard')}}</span>
        <span class="selected"></span>
    </a>
</li>
{{-- <li class="nav-item start {{ active_link(null,'active open') }} ">
    <a href="{{aurl('translate')}}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{trans('admin.translate')}}</span>
        <span class="selected"></span>
    </a>
</li> --}}

<li class="nav-item start {{active_link('settings','active open')}}  ">
    <a href="{{aurl('settings')}}" class="nav-link nav-toggle">
        <i class="fa fa-cog"></i>
        <span class="title">{{trans('admin.settings')}}</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item start {{active_link('about','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-address-card"></i>
        <span class="title">{{trans('admin.about')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('about','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('about','active open')}}  "> 
            <a href="{{aurl('about')}}" class="nav-link "> 
                <i class="fa fa-address-card"></i>
                <span class="title">{{trans('admin.about')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('about/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('properties','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{trans('admin.properties')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('properties','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('properties','active open')}}  "> 
            <a href="{{aurl('properties')}}" class="nav-link "> 
                <i class="fa fa-home"></i>
                <span class="title">{{trans('admin.properties')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('properties/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('places','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-exclamation"></i>
        <span class="title">{{trans('admin.places')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('places','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('places','active open')}}  "> 
            <a href="{{aurl('places')}}" class="nav-link "> 
                <i class="fa fa-exclamation"></i>
                <span class="title">{{trans('admin.places')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('places/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('blog','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">{{trans('admin.blog')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('blog','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('blog','active open')}}  "> 
            <a href="{{aurl('blog')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.blog')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('blog/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('team','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-address-book"></i>
        <span class="title">{{trans('admin.team')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('team','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('team','active open')}}  "> 
            <a href="{{aurl('team')}}" class="nav-link "> 
                <i class="fa fa-address-book"></i>
                <span class="title">{{trans('admin.team')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('team/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('brands','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">{{trans('admin.brands')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('brands','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('brands','active open')}}  "> 
            <a href="{{aurl('brands')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.brands')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('brands/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('services','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-align-justify"></i>
        <span class="title">{{trans('admin.services')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('services','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('services','active open')}}  "> 
            <a href="{{aurl('services')}}" class="nav-link "> 
                <i class="fa fa-align-justify"></i>
                <span class="title">{{trans('admin.services')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('services/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>