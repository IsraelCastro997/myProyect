@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Usuarios'])
@section('content')
    <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-header card-header-primary">
                                  <h4 class="card-title">Usuarios</h4>
                                  <p class="card-category">Usuarios registrados</p>
                              </div>
                              <div class="card-body">
                                  @if(session('success'))
                                  <div class="alert alert-success" role="success">
                                      {{ session('success') }}
                                  </div>
                                  @endif
                                  {{-- <div class="row">
                                        <div class="col-12 text-center">
                                        @can('user_create')
                                          <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Crear usuario</a>
                                        @endcan
                                        </div>
                                  </div> --}}
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead class="text-primary">
                                              <th>ID</th>
                                              <th>Nombre</th>
                                              <th>Correo</th>
                                              <th>Username</th>
                                              <th>Roles</th>
                                              <th class="text-center">Acciones</th>
                                          </thead>
                                          <tbody>
                                              @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>
                                                        @forelse ($user->roles as $role)
                                                            <span class="badge badge-info">{{ $role->name }}</span>
                                                        @empty
                                                            <span class="badge badge-danger">No roles</span>
                                                        @endforelse
                                                    </td>
                                                    <td class="td-actions text-center">
                                                        @can('user_show')
                                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                                        @endcan
                                                        @can('user_edit')
                                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                        @endcan                                                        
                                                        @can('role_destroy')
                                                        <form action="{{ route('users.delete', $user->id) }}" method="post" onsubmit="return confirm('Estás seguro?')" style="display: inline-block;">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" rel="tooltip" class="btn btn-danger">
                                                            <i class="material-icons">close</i>
                                                          </button>
                                                        </form>
                                                        @endcan
                                                    </td> 
                                                </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                              <div class="card-footer mr-auto">
                                  {{ $users->links() }}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>  
    </div>
@endsection