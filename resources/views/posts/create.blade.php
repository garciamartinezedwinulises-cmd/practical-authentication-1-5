<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Publicación con Archivos</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 40px auto; padding: 20px; }
        .campo { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea, select { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background: #4F46E5; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Nueva Publicación</h2>
    @if ($errors->any())
    <div style="background: #FEE2E2; color: #991B1B; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ url('/posts') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="campo">
            <label>Título de la publicación</label>
            <input type="text" name="title" required>
        </div>

        <div class="campo">
            <label>Contenido del artículo</label>
            <textarea name="content" rows="6" required></textarea>
        </div>

        <div class="campo">
            <label>Categoría</label>
            <select name="category_id" required>
                <option value="1">Tecnología</option>
                <option value="2">Programación</option>
            </select>
        </div>

        <div class="campo">
            <label>Selecciona tus archivos (Puedes elegir hasta 5)</label>
            <input type="file" name="attachments[]" multiple required>
        </div>

        <button type="submit">Enviar Publicación</button>
    </form>

</body>
</html>