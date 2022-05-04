@extends('layouts.main')

@section('content')
<h1>All Employees</h1>

<a href={{ route('employees.create') }}>Add new</a>
<a href={{ route('employees.show', 1) }}>Show an employee</a>
@endsection