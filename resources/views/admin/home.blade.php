@extends('layouts.main', ['activePage' => 'inicio', 'titlePage' => 'Inicio'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
<!-- Usuarios -->
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-info">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <h4 class="card-title">Usuarios</h4>
              <p class="card-category">Usuarios registrados</p>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-info">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-info">Ver más</a>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- Posts -->
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Proyectos</h4>
              <p class="card-category">Proyectos registrados</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>Nombre</th>
                </thead>
                <tbody>
                  @forelse ($posts as $post)
                  <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                  </tr>
                  @empty
                  <tr>
                    <td>Sin registros.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              <a href="{{ route('posts.index') }}" class="btn btn-sm btn-warning">Ver más</a>
            </div>
          </div>
        </div>
<!-- Roles -->
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title">Roles</h4>
              <p class="card-category">Roles registrados</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-success">
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Fecha de creación</th>
                </thead>
                <tbody>
                  @forelse ($roles as $role)
                  <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td class="text-success">{{ $role->created_at->toFormattedDateString() }}</td>
                  </tr>
                  @empty
                  <tr>
                    <td>Sin registros.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              <a href="{{ route('roles.index') }}" class="btn btn-sm btn-success">Ver más</a>
            </div>
          </div>
        </div>
<!-- Permisos -->
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-danger">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <h4 class="card-title">Permisos</h4>
              <p class="card-category">Permisos registrados</p>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-danger">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha de creación</th>
                      </thead>
                      <tbody>
                      @forelse($permissions as $permission)
                        <tr>
                          <td>{{ $permission->id }}</td>
                          <td>{{ $permission->name }}</td>
                          <td>{{ $permission->created_at }}</td>
                        </tr>
                      @empty
                        No permissions registered yet
                      @endforelse
                      </tbody>
                    </table>
                  </div>
                  <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-danger">Ver más</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection