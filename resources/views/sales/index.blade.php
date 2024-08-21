<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container text-center mt-4">
        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="mt-4">Seleccione la pelicula
                    <select name="movie_id" class="form-control">
                        @foreach ($movies as $movie)
                            <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="form-group">
                <label class="mt-4">Seleccione la sala
                    <select name="room_id" class="form-control">
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="form-group">
                <label class="mt-4">Ingrese cuántas boletas desea comprar
                    <input type="number" name="tickets" placeholder="Número de boletas" min="0"
                        class="form-control" id="tickets">
                </label>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Guardar</button>
        </form>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Valor</th>
                    <th>Fecha</th>
                    <th>Película</th>
                    <th>Sala</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->value }}</td>
                        <td>{{ $sale->created_at }}</td>
                        <td>{{ $sale->movie }}</td>
                        <td>{{ $sale->room }}</td>
                        <td>
                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</body>

</html>
