@extends('header')
@section('scripts_extra')

@endsection

@section('title', 'pergunta 3')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 my-5">
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0"
                     aria-valuemax="100">
                    @switch($step)
                        @case(1)
                            <div class="progress-bar" style="width: 0%"></div>
                            @break
                            <div class="progress-bar" style="width: 50%"></div>
                            @break
                        @case(3)
                            <div class="progress-bar" style="width: 100%"></div>
                    @endswitch
                </div>
            </div>
            <div class="col-12">
                @if ($step == 1)
                    <h1>Etapa 1 - Análise</h1>
                    <form action="{{ route('task-3.progress') }}" method="POST">
                        @csrf
                        <label for="cep">Digite seu CEP:</label>
                        <input type="text" name="cep" class="form-control" id="cep" required>
                        <input type="hidden" name="step" value="1">
                        <button type="submit" class="btn btn-primary my-1">Avançar</button>
                    </form>

                @elseif ($step == 2)
                    <h1>Etapa 2 - Digitação</h1>
                    <p>CEP inserido: {{ session('cep') }}</p>
                    <form action="{{ route('task-3.progress') }}" method="POST">
                        @csrf
                        <input type="hidden" name="step" value="2">
                        <button type="submit" class="btn btn-primary">Finalizar</button>
                    </form>

                @elseif ($step == 3)
                    <h1>Etapa 3 - Sucesso</h1>
                    <p>Processo concluído com sucesso!</p>
                @endif
                <form action="{{ route('task-3.reset') }}" method="POST" style="margin-top: 20px;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Resetar Etapa</button>
                </form>
            </div>
        </div>
@endsection
