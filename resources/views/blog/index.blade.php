@extends('layouts.app')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4 col-md-6">
                    <h1>
                        Administrador del blog
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <h4>Opciones</h4>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4 col-sm-12 col-lg-4">
                    <a href="{{ route('blog.create') }}" type="button" class="btn btn-primary btn-block">
                        Nueva entrada
                    </a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <h4>Entrada(s) existente(s</h4>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <b class="float-right">{{ $blogs->count() }} entrada(s)</b>
                </div>
            </div>

            <div class="row mt-2">
                @foreach ($blogs as $blog)
                <div class="col-md-3 col-sm-12">
                    <div class="card">
                        <img src="{{ asset('storage/' . $blog->images[0]->path) }}" class="card-img-top" alt="header">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text text-justify">
                                Creado el {{ $blog->created_at }}
                            </p>
                            <a href="{{ route('blog.edit', [ 'blog' => $blog->id ]) }}" class="btn btn-primary btn-block">Editar</a>
                            <button type="button" onclick="deleteBlog({{ $blog->id }})" class="btn btn-danger btn-block">
                                Eliminar
                            </button>
                        </div>
                    </div>
                </div> 
                @endforeach  
            </div>

        </div>
    </div>

@section('script')
<script>
    function deleteBlog(id) {
        console.log(id);
    }
</script>
@endsection
@endsection
