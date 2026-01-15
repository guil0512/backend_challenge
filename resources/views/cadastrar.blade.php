@extends('layouts.app')

@section('content')

<form class="row g-3" style="margin-left: auto; margin-right: auto; margin-top: auto;" action="/produtos" method="post">
    @csrf
  <div class="col-md-6">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nome do produto" required>
  </div>
  <div class="col-md-6">
    <label for="description" class="form-label">Descrição</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Descrição do produto" required>
  </div>
  <div class="col-md-6">
    <label for="price" class="form-label">Preço</label>
    <input type="number" class="form-control" id="price" name="price" placeholder="Preço do produto" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="clientes.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
  </div>
</form>

@endsection
