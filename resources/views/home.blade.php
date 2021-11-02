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

            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-uppercase small mb-2">
                                <strong>TOTAL USERS</strong>
                            </p>
                            <h5 class="mb-0">
                                <strong>{{$report}}</strong>
                                <small class="text-success ms-2">
                            </h5>
            
                            <hr />
            
                            <a href="/reports" class="btn btn-primary text-uppercase small">
                                Create Citizen
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection