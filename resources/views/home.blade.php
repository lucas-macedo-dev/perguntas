@extends('header')
@section('scripts_extra')
@endsection

@section('title', __('overview'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 my-5">
                <h4>Menu de navegação</h4>
                <div class="list-group">
                    <a href="/task-1/resolution" class="list-group-item list-group-item-action">
                       pergunta 1
                    </a>
                    <a href="/task-2/resolution" class="list-group-item list-group-item-action">pergunta 2</a>
                    <a href="/task-3/resolution" class="list-group-item list-group-item-action">pergunta 3</a>
                </div>
            </div>
        </div>
    </div>
@endsection
