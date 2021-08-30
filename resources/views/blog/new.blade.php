@extends('layouts.app')

@section('content')

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-4 col-md-6">
                                <h1>
                                    <a href="{{ url( '/blog') }}" class="btn btn-primary rounded-circle">
                                        <i class="fas fa-angle-left"></i>
                                    </a>
                                    Nueva entrada
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="blogTitle" class="col-sm-2 col-form-label">Titulo de la entrada</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" id="blogTitle" placeholder="Titulo del blog">
                                        </div>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="blogImage" class="col-sm-2 col-form-label">Imagen de la entrada</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="blogImage" aria-describedby="blogImageLabel">
                                                <label class="custom-file-label" name="blogImageLabel" for="blogImage">Escoge un archivo</label>
                                            </div>
                                        </div>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <textarea  class="ckeditor col-sm-12 col-md-12" name="body" id="blogEditor">
                                                
                                            </textarea>

                                            @error('body')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <a href="{{ url( '/blog') }}" class="btn btn-secondary btn-block">
                                                Cancelar
                                            </a>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-primary btn-block">Guardar como borrador</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-success btn-block">Guardar y publicar</button>
                                        </div>
                                    </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>

@section('script')
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
@endsection
@endsection
