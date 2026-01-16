@extends('layouts.app')

@section('content')

<table class="table align-middle">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Foto</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Preço</th>
      <th scope="col">Ações</th>
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

        <td>
            @if(isset($produto->photo) && $produto->photo != '')
                <img src="{{ asset('storage/' . $produto->photo) }}"
                     alt="Foto"
                     style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px;">
            @else
                <span class="text-muted">Sem foto</span>
            @endif
        </td>

        <td class="text-truncate" style="max-width: 100px">{{ $produto->name }}</td>
        <td class="text-break" style="max-width: 200px">{{ $produto->description }}</td>
        <td>R$ {{ number_format($produto->price, 2, ',', '.') }}</td>

        <td>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-dark btn-sm">
                    Editar
                </a>

                <form action="{{ route('apiprodutos.destroy', $produto->id) }}" method="POST" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Excluir?')">
                        Excluir
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach

  </tbody>
</table>

@endsection
