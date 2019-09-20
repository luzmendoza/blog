<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Navegación</li>
  <!-- Optionally, you can add icons to the links -->
  <li class="{{ setActiveRoute('admin') }}">
    <a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a>
  </li>
  <!--POSTS-->
  <li class="treeview {{ setActiveRoute('admin.posts.index') }}">
    <a href="#"><i class="fa fa-link"></i> <span>Blog</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ setActiveRoute('admin.posts.index') }}">
        <a href="{{ route('admin.posts.index') }}"><i class="fa fa-eye"></i>Ver todos los posts</a>
      </li>
      @can('create', new App\Post)
        <li >
          @if(request()->is('admin/posts/*'))
            <a href="{{ route('admin.posts.index', '#create') }}"><i class="fa fa-pencil"></i>Crear un post</a>
          @else
          <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i>Crear un post</a>
          @endif 
        </li>
      @endcan
    </ul>
  </li>

  <!--USUARIOS-->
  @can('view', new App\User)
    <li class="treeview {{ setActiveRoute(['admin.users.index', 'admin.users.create']) }}">
      <a href="#"><i class="fa fa-user"></i> <span>Usuarios</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ setActiveRoute('admin.users.index') }}">
          <a href="{{ route('admin.users.index') }}"><i class="fa fa-eye"></i>Ver todos los usuarios</a>
        </li>
        <li class="{{ setActiveRoute('admin.users.create') }}">
          <a href="{{ route('admin.users.create') }}"><i class="fa fa-pencil"></i>Crear un usuario</a>
        </li>
      </ul>
    </li>
  @else <!--Que solo vea su perfil-->
     <li class="{{ setActiveRoute(['admin.users.show', 'admin.users.edit']) }}">
      <a href="{{ route('admin.users.show', auth()->user()) }}">
        <i class="fa fa-user"></i><span>Perfil</span>
      </a>
    </li>
  @endcan

  <!--Validar si se pueden mostrar rutas de navegacion-->
  @can('view', new \Spatie\Permission\Models\Role)
    <li class="{{ setActiveRoute(['admin.roles.index', 'admin.roles.edit']) }}">
      <a href="{{ route('admin.roles.index') }}">
        <i class="fa fa-pencil"></i><span>Roles</span>
      </a>
    </li>
  @endcan

   @can('view', new \Spatie\Permission\Models\Permission)
    <li class="{{ setActiveRoute(['admin.permisos.index', 'admin.permisos.edit']) }}">
      <a href="{{ route('admin.permisos.index') }}">
        <i class="fa fa-pencil"></i><span>Permisos</span>
      </a>
    </li>
  @endcan
</ul>