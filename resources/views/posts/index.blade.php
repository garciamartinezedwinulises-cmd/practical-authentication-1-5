<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Publicaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light py-5">
    @if (Auth::check())
    <nav class="navbar navbar-expand-lg bg-white shadow-sm mb-4 border-bottom">
        <div class="container d-flex justify-content-between align-items-center" style="max-width: 800px;">
            <span class="navbar-brand mb-0 h1 fs-5 text-dark font-weight-bold">Blog de Publicaciones</span>
            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary small">Usuario: {{ Auth::user()->name }}</span>
                
                @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
                    <a href="{{ route('dashboard') }}" class="text-primary small text-decoration-underline">
                        Regresar al Dashboard
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}" class="d-inline m-0">
                    @csrf
                    <button type="submit" class="btn btn-link text-danger small text-decoration-underline p-0 m-0 align-baseline" style="border: none; background: none;">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </nav>
@endif
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