@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Welcome to the Admin Dashboard</h1>
                <p>This is your CoreUI-powered admin panel. Add widgets, charts, and more here!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">26K</div>
                            <div>Users</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more cards/widgets as needed -->
        </div>
    </div>
@endsection 