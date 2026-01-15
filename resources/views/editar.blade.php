@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <h5 class="alert-heading">Erros:</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form class="row g-3" style="margin-left: auto; margin-right: auto; margin-top: auto;" action=" {{ route('produtos.update', $produto->id) }}" method="POST">
    @csrf
    @method('PUT')

  <div class="col-md-6">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" value="{{ old('name', $produto->name) }}" id="name" name="name" placeholder="Nome do produto" required>
  </div>
  <div class="col-md-6">
    <label for="description" class="form-label">Descrição</label>
    <input type="text" class="form-control" value="{{ old('description', $produto->description) }}" id="description" name="description" placeholder="Descrição do produto" required>
  </div>
  <div class="col-md-6">
    <label for="price" class="form-label">Preço</label>
    <input type="text" class="form-control" value="{{ old('price', number_format($produto->price, 2, ',', ''))}}" id="price" name="price" placeholder="Preço do produto" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="{{ route('produtos.index') }}"><button type="button" class="btn btn-secondary">Voltar</button></a>
  </div>
</form>

@endsection
