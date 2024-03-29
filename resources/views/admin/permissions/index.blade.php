@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Permisos'])
@section('content')
<div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-header card-header-primary">
                                  <h4 class="card-title">Permisos</h4>
                                  <p class="card-category">Permisos registrados</p>
                              </div>
                              <div class="card-body">
                                  @if(session('success'))
                                  <div class="alert alert-success" role="success">
                                      {{ session('success') }}
                                  </div>
                                  @endif
                                  <div class="row">
                                      <div class="col-12 text-center">
                                        @can('permission_create')
                                          <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">Crear permiso</a>
                                        @endcan
                                      </div>
                                  </div>
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead class="text-primary">
                                              <th>ID</th>
                                              <th>Nombre</th>
                                              <th>Guard</th>
                                              <th>Created_ad</th>
                                              <th class="text-center">Acciones</th>
                                          </thead>
                                          <tbody>
                                              @forelse($permissions as $permission)
                                                <tr>
                                                    <td>{{ $permission->id }}</td>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>{{ $permission->guard_name }}</td>
                                                    <td>{{ $permission->created_at }}</td>
                                                    <td class="col-2 td-actions text-center">
                                                        @can('permission_show')
                                                        <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                                        @endcan
                                                        @can('permission_edit')
                                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                        @endcan
                                                        @can('permission_destroy')
                                                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display: inline-block" onsubmit="return confirm('Estás seguro?')">
                                                            @csrf
                                                            @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" reel="tooltip">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                        @endcan
                                                        </form>
                                                    </td> 
                                                </tr>
                                                @empty
                                                No permissions registered yet
                                              @endforelse
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                              <div class="card-footer mr-auto">
                                  {{ $permissions->links() }}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>  
    </div>
@endsection