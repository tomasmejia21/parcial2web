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
        <form action="{{ route('rooms.update', $room->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="mt-4">Ingrese el nombre de la sala
                    <input type="text" name="name" placeholder="name" class="form-control" value="{{ $room->name }}">
                </label>
            </div>
            <div class="form-group">
                <label class="mt-4">Ingrese la capacidad
                    <input type="number" name="capacity" placeholder="Capacidad" min="0"
                        class="form-control"  value="{{ $room->capacity }}">
                </label>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Guardar</button>
        </form>
    </div>
</body>

</html>
