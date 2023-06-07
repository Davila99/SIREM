{{-- @dd($cursos) --}}

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Asignatura</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->asignatura->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
