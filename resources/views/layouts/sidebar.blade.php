  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{url('/home')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{route('menu')}}">
            <i class="glyphicon glyphicon-menu-hamburger"></i> <span>Build Menu</span>
          </a>
        </li>
        <li>
          <a href="{{url('/logo')}}">
            <i class="glyphicon glyphicon-asterisk"></i> <span>Logo</span>
          </a>
        </li>
        <li>
          <a href="{{url('/posts')}}">
            <i class="fa fa-sticky-note"></i> <span>Posts</span>
          </a>
        </li>
        <li>
          <a href="{{url('/pages')}}">
            <i class="fa fa-files-o"></i> <span>Pages</span>
          </a>
        </li>
        @if(Auth::user()->type == "ADMIN")
        <li>
          <a href="{{url('/users')}}">
            <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>