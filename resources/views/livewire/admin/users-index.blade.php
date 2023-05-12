<div>
    <div class="card">
        <div class="card-header">
            <input wire:model='search'  class="form-control" placeholder="Ingrese su nombre o su correo electronico">
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
        
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="d-flex flex-row bd-highlight mb-6">
                                        <a href="{{ url('/users/' . $user->id . '/edit') }}"
                                            class="btn btn-info">
                                            Editar </a>|
                                        {{-- <form class="form-eliminar"
                                            action="{{ url('/users/' . $user->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @livewireScripts
                    </tbody>
                </table>
            </div>       

      </div>
      
      <div class="card-footer">
        {{ $users->links() }}
      </div>
</div>