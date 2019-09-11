<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Navegación</li>
  <!-- Optionally, you can add icons to the links -->
  <li class="{{ request()->is('admin') ? 'active' : '' }}">
    <a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a>
  </li>
  <li class="treeview {{ request()->is('admin/posts*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-link"></i> <span>Blog</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ request()->is('admin/posts') ? 'active' : '' }}">
        <a href="{{ route('admin.posts.index') }}"><i class="fa fa-eye"></i>Ver todos los posts</a>
      </li>
      <li class="{{ request()->is('admin/posts/create') ? 'active' : '' }}">
        @if(request()->is('admin/posts/*'))
          <a href="{{ route('admin.posts.index', '#create') }}"><i class="fa fa-pencil"></i>Crear un post</a>
        @else
        <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i>Crear un post</a>
        @endif 
      </li>
    </ul>
  </li>
</ul>