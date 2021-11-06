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
            <section class="card">
                <div class="card-body">
                    <h1>State</h1>
                    <table class="table table-responsive-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($states as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->name}}</td>
                                    {{-- <td>er</td> --}}
                                    <td>{{$item->total_citizens}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <section>
            <section class="card">
                <div class="card-body">
                    <h1>LGA</h1>
                    <table class="table table-responsive-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <section>
            <section class="card">
                <div class="card-body">
                    <h1>Ward</h1>
                    <table class="table table-responsive-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">State</th>
                                <th scope="col">Ward</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($states as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->name}}</td>
                                    {{-- <td>{{$item->ward->name}}</td> --}}
                                    <td>{{$item->wards->count()}}</td>
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