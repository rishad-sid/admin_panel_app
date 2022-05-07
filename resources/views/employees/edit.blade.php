@extends('layouts.main')

@section('content')
<main class="py-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>Edit Employee</strong>
                    </div>
                    <div class="card-body">
                        <form action={{ route('employees.update', $employee->id) }} method="POST">
                            @method('PUT')
                            @csrf
                            @include('employees._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('title', 'Admin Panel | Edit employee')