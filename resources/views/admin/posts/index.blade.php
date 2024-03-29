@extends('layouts.main', ['activePage' => 'proyectos', 'titlePage' => 'Proyectos'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Proyectos</h4>
            <p class="card-category">Lista de proyectos registrados en la base de datos</p>
          </div>
          <div class="card-body">
            <div class="row">
              {{-- <div class="col-12 text-center">
                @can('post_create')
                  <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">Añadir proyecto</a>
                @endcan
              </div> --}}
            </div>
            <div class="table-responsive">
              <table class="table ">
                <thead class="text-primary">
                  <th> ID </th>
                  <th> Nombre </th>
                  <th> Fecha de creación </th>
                  <th class="text-center"> Acciones </th>
                </thead>
                <tbody>
                  @forelse ($posts as $post)
                  <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td class="text-primary">{{ $post->created_at->toFormattedDateString() }}</td>
                    <td class="col-2 td-actions text-center">
                      @can('post_show')
                      <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info"> <i
                          class="material-icons">person</i> </a>
                      @endcan
                      @can('post_edit')
                      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success"> <i
                          class="material-icons">edit</i> </a>
                      @endcan
                      @can('post_destroy')
                      <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                        onsubmit="return confirm('Estás serguro?')" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-danger">
                          <i class="material-icons">close</i>
                        </button>
                      </form>
                      @endcan
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="2">Sin registros.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              {{-- {{ $users->links() }} --}}
            </div>
          </div>
          <!--Footer-->
          <div class="card-footer mr-auto">
            {{ $posts->links() }}
          </div>
          <!--End footer-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 