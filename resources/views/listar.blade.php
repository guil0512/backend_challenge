@extends('layouts.app')

@section('content')

<table class="table align-middle">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Preço</th>
    </tr>
  </thead>
  <tbody>

    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @foreach ($produtos as $produto)
    <tr>
        <td>{{ $produto->id }}</td>
        <td class="text-truncate" style="max-width: 75px">{{ $produto->name }}</td>
        <td class="text-break" style="max-width: 200px">{{ $produto->description }}</td>
        <td>{{ $produto->price }}</td>
        <td>
            <a href="{{ route('apiprodutos.show', $produto->id) }}"></a>
            <a href="{{ route('produtos.edit', $produto->id) }}"></a>

            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-dark btn-sm" style="width: 75px; height: 40px; justify-content:center;">
                Editar
            </a>

            <form action="{{ route('apiprodutos.destroy', $produto->id) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" style="width: 75px; height: 40px; justify-content:center;" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach

  </tbody>
</table>

@endsection
