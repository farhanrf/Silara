@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <ul>
                   @foreach($goodsin as $goodsin)
                        <li>{{ $goodsin->location->name }}</li>
                        <li>{{ $goodsin->category->name }}</li>
                        <li>{{ $goodsin->users->name }}</li>
                        <li>{{ $goodsin->device->name }}</li>
                        <li>----------</li>
                   @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
