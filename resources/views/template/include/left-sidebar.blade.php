<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset("assets/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENÜ</li>
        <!-- Optionally, you can add icons to the links -->
        <!-- -->
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Notlar</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ("notes.index") }}">Notlar</a></li>
            <li><a href="{{ route ("notes.create") }}">Yeni Not Ekle</a></li>
          </ul>
        </li>
        <li><a href="{{ route ("tasks.index") }}"><i class="fa fa-link"></i> <span>Todo List</span></a></li>
        <li><a href="{{ route ("movies.index") }}"><i class="fa fa-laptop"></i> <span>İzlenecekler</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>