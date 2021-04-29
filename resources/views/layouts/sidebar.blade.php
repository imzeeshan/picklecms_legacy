<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/"> <img src="{{ asset('img/logo.png')}}" width="150px;"/></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/"> <img src="{{ asset('img/logo-small.png')}}" width="50px;"/></a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">&nbsp;</li>
            <li class="menu-header">Content</li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-pencil-ruler"></i> <span>Blog Posts</span></a>
                <ul class="dropdown-menu" style="display: block;">
                    <li class="{{ Request::is('admin/posts*')?'active' : '' }}"><a class="nav-link"  href="{{ route('posts.index')  }}">Posts</a></li>
                    <li class="{{ Request::is('admin/categories*')?'active' : '' }}"><a class="nav-link"  href="{{ route('categories.index')  }}">Categories</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/pages*')?'active' : '' }}">
                <a class="nav-link" href="{{ route('pages.index')  }}"><i class="far fa-folder"></i> <span>Pages</span></a>
            </li>
            <li class="{{ Request::is('admin/media*')?'active' : '' }}">
                <a href="{{ route('media.index')  }}" class="nav-link"><i class="fas fa-image"></i> <span>Media</span></a>
            </li>

            <li class="menu-header">Settings</li>
            <li class="{{ Request::is('admin/user*')?'active' : '' }}">
                <a href="{{ route('user.index')  }}"  class="nav-link"><i class="fas fa-user-md"></i> <span>Users</span></a>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-pencil-ruler"></i> <span>Roles & Permissions</span></a>
                <ul class="dropdown-menu" style="display: block;">
                    <li class="{{ Request::is('admin/roles*')?'active' : '' }}"><a class="nav-link"  href="{{ route('roles.index')  }}">Roles</a></li>
                    <li class="{{ Request::is('admin/permissions*')?'active' : '' }}"><a class="nav-link" href="{{ route('permissions.index')  }}">Permissions</a></li>
                </ul>
            </li>

            <div class="divider"> </div>
            <li class="{{ Request::is('admin/settings*')?'active' : '' }}">
                <a class="nav-link" href="{{ route('settings.index')  }}" class="nav-link"><i class="fas fa-cog"></i> <span>Settings</span></a>
            </li>

            <li>
                <a href="{{ route('user.logout')  }}" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
            </li>
        </ul>
    </aside>
</div>
