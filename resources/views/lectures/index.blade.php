@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Kursai: {{ $group->course->course_name }}</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Paskaitos</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lectures as $lecture)
                <tr>
                    <td>{{ $lecture->name }}</td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
