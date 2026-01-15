@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-primary shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 text-center">Módulo de Imagem Independente</h5>
                </div>
                <div class="card-body">

                    <div class="mb-4">
                        <label class="form-label fw-bold">Alterar Produto:</label>
                        <select class="form-select" onchange="window.location.href='/foto/' + this.value">
                            @foreach($todosProdutos as $p)
                                <option value="{{ $p->id }}" {{ $p->id == $produto->id ? 'selected' : '' }}>
                                    #{{ $p->id }} - {{ $p->name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Selecione um produto para gerenciar a foto.</small>
                    </div>

                    <hr>

                    <div class="text-center mb-4">
                        <h6>Produto Selecionado: <strong>{{ $produto->name }}</strong></h6>
                        @if($produto->photo)
                            <img src="{{ asset('storage/' . $produto->photo) }}" class="img-thumbnail mt-2" style="max-height: 150px;">
                        @else
                            <div class="p-3 bg-light border rounded mt-2">Nenhuma foto cadastrada</div>
                        @endif
                    </div>

                    <form action="{{ route('produtos.photo', $produto->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf              
                        <div class="mb-3">
                            <label class="form-label">Nova Imagem</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Salvar Foto</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
