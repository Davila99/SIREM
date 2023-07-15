@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ url('calificacionesDetalles/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div id="miModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="miModalLabel">Notas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table>
                                <tbody>
                                    <tr>
                                        <th scope="row">Nota</th>
                                        <td>
                                            <input id="calificacion" name="calificacion" type="numeric"
                                                class="form-control @error('calificacion') is-invalid @enderror" placeholder="Nota"
                                                value="{{ isset($datos) ? $datos->calificacion : old('calificacion') }}">
            
                                            @error('calificacion')
                                            <div class="invalid-feedback">
                                                <h5>{{ $message }}</h5>
                                            </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <form
                                                action="{{ route('change-nota', ['calificacionDetalleId' => $fila->id]) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="calificacion" value="{{ $calificacion}}">
                                                <input type="submit" value="Guardar" class="btn btn-info " data-toggle="modal"
                                                    data-target="#miModal" />
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection