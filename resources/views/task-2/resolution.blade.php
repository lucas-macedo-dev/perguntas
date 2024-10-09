@extends('header')
@section('scripts_extra')

@endsection

@section('title', 'pergunta 2')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-3">Generate CSV Report</h1>
        <a href="{{ route('report.download') }}" class="btn btn-primary">Download CSV</a>
    </div>
@endsection
