@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a href="/citizen/create" class="btn btn-primary text-uppercase small text-right mb-3">
                Create Citizen
            </a>
            <div class="d-flex justify-content-between my-4">
                <a href="/report/state" class="text-primary text-uppercase small text-right mb-3">
                    State Report
                </a>
                <a href="/report/lga" class="text-primary text-uppercase small text-right mb-3">
                    LGA Report
                </a>
                <a href="/report/ward" class="text-primary text-uppercase small text-right mb-3">
                    Ward Report
                </a>
            </div>
            <section class="card">
                <div class="card-body">
                    <h1>LGA</h1>
                    <table class="table table-responsive-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">State</th>
                                <th scope="col">LGA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lgas as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->state->name}}</td>
                                    <td>{{$item->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <section>
        </div>
    </div>
</div>
@endsection