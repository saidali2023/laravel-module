    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <!-- <li class=" nav-item"><a href="#"><i class="la la-bolt"></i><span class="menu-title" data-i18n="nav.flot_charts.main">الرئيسية</span></a>
          <ul class="menu-content">            
            <li  class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"> 
                <a class="menu-item" href="{{url('admin/dashboard')}}" data-i18n="nav.flot_charts.flot_pie_charts">الرئيسية</a>
            </li>
          </ul>
        </li>
 -->
        
        @foreach ($moduleـsidbar as $_item)
            @if($_item->isEnabled())
            <li class=" nav-item"><a href="#"><i class="la la-bolt"></i><span class="menu-title" data-i18n="nav.flot_charts.main">{{$_item}}</span></a>
              <ul class="menu-content">            
                <li  class="{{ Request::is('app/'.strtolower($_item)) ? 'active' : '' }}"> 
                    <a class="menu-item" href="{{url('app/'.strtolower($_item))}}" data-i18n="nav.flot_charts.flot_pie_charts">
                    all {{$_item}}</a>
                </li>
                <li  class="{{ Request::is('app/'.strtolower($_item).'/create') ? 'active' : '' }}"> 
                    <a class="menu-item" href="{{url('app/'.strtolower($_item).'/create')}}" data-i18n="nav.flot_charts.flot_pie_charts">Add {{$_item}}</a>
                </li>

              </ul>
            </li>
            @endif  
        @endforeach
        <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
            <a href="{{url('home')}}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n="">home</span>
            </a>
        </li>
       <!-- @can('read user')
        <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
            <a href="{{url('users')}}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n="">المستخدمين</span>
            </a>
        </li>
        @endcan
        @can('read role')
        <li class="nav-item {{ Request::is('roles') ? 'active' : '' }}">
            <a href="{{url('roles')}}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n="">الصلاحيات</span>
            </a>
        </li>
        @endcan -->
        @can('read module')
        <li class="nav-item {{ Request::is('allmodule') ? 'active' : '' }}">
            <a href="{{url('allmodule')}}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n="">All Moduls</span>
            </a>
        </li>
        @endcan
        <!-- @foreach ($all_module as $item) 
            <li class="nav-item {{ Request::is('app/'.$item->module_name->name) ? 'active' : '' }}">
                <a href="{{url('app/'.strtolower($item->module_name->name))}}">
                    <i class="la la-envelope"></i><span class="menu-title" data-i18n="">{{$item->module_name->name}}
                    </span>
                </a>
            </li>
        @endforeach -->
       


      </ul>
    </div>
  </div>