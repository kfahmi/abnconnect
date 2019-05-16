 <div class="navbar-default sidebar " role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> 
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                            </span> 
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">
                        <a href="#" class="waves-effect"> <span class="hide-menu" data-letters="{{Auth::user()->getInitial()}}">  {{Auth::user()->realname}}<span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> {{Auth::user()->group->name}}</a></li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </li>
                        </ul>
                    </li>

                    
                    <li><a href="{{url('/home')}}" class="waves-effect {{ Request::is('/','home') ? 'active' : null }}"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> {!! Lang::get('titles.dashboard') !!}<span class="fa arrow"></span> </span></a></li>
                    

                    @has_permission(array('user.view','group.view','permission.view'))
                    <li> <a href="index-2.html" class="waves-effect"><i class="fa fa-users"></i> <span class="hide-menu"> {!! Lang::get('titles.users_and_permissions') !!} <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">

                            @has_permission(array('user.view'))
                             <li>
                                <a class="dropdown-item {{ Request::is('users', 'user/' . Auth::user()->id, 'user/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/user') }}">
                                    <i class="fa fa-user"></i> 
                                    {!! Lang::get('titles.adminUserList') !!}
                                </a>
                            </li>
                            @endhas_permission

                            @has_permission(array('group.view'))
                            <li>
                                <a class="dropdown-item {{ Request::is('group') ? 'active' : null }}" href="{{ url('/group') }}">
                                    <i class="fa fa-users"></i> 
                                    {!! Lang::get('titles.group') !!}
                                </a>
                            </li>
                            @endhas_permission

                            @has_permission(array('permission.view'))
                            <li>
                                <a class="dropdown-item {{ Request::is('permission') ? 'active' : null }}" href="{{ url('/permission') }}">
                                    <i class="fa fa-lock"></i> 
                                    {!! Lang::get('titles.permission') !!}
                                </a>
                            </li>
                            @endhas_permission

                        </ul>
                    </li>
                    @endhas_permission

                    
                </ul>
            </div>
        </div>