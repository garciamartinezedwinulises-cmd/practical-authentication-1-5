<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Publicaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light py-5">
    <div class="container" style="max-width: 800px;">
        <h1 class="mb-4">Publicaciones Recientes</h1>

        @foreach ($posts as $post)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h4 card-title text-primary">{{ $post->title }}</h2>
                    <p class="text-muted small">Publicado por: {{ $post->author->name ?? 'Anónimo' }} | {{ $post->created_at->diffForHumans() }}</p>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
        @endforeach

        <div class="mt-4 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</body
</html>