@extends('layouts.app')

@section('content')
    @if(Auth::user()->id == 1)
        @include('dashboard.admin')
        <div class="content">
            <h1 class="h1-responsive">Dashboard</h1>
            <div class="card">
                You're welcome
            </div>
        </div>
    @endif
@endsection