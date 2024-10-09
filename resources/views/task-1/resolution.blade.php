@extends('header')
@section('scripts_extra')
    @vite(['resources/task-1/via-cep.js'])
@endsection

@section('title', 'pergunta 2')
@section('content')
<div class="container mt-5">
    <h2>Consulta de Endereço por CEP</h2>
    <form id="cep-form">
      <div class="mb-3">
        <label for="cep" class="form-label">CEP</label>
        <input type="text" class="form-control" id="cep" placeholder="Digite o CEP" maxlength="9" required>
      </div>
      <div class="mb-3">
        <label for="logradouro" class="form-label">Logradouro</label>
        <input type="text" class="form-control" id="logradouro" placeholder="Logradouro" readonly>
      </div>
      <div class="mb-3">
        <label for="complemento" class="form-label">Complemento</label>
        <input type="text" class="form-control" id="complemento" placeholder="Complemento">
      </div>
      <div class="mb-3">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="bairro" placeholder="Bairro" readonly>
      </div>
      <div class="mb-3">
        <label for="localidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="localidade" placeholder="Cidade" readonly>
      </div>
      <div class="mb-3">
        <label for="uf" class="form-label">Estado (UF)</label>
        <input type="text" class="form-control" id="uf" placeholder="UF" readonly>
      </div>
      <div class="mb-3">
        <label for="ibge" class="form-label">IBGE</label>
        <input type="text" class="form-control" id="ibge" placeholder="IBGE" readonly>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
@endsection
