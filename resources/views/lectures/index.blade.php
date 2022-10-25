@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Kursai: {{ $group->course->course_name }}</h1>
        <table class="table table-striped">
            @can('view', $group)
            <a class="btn btn-primary" href="{{ route('lectures.create', $group->id)}}" >Pridėti paskaitą</a>
            @endcan
            <thead>
            <tr>
                <th>Paskaitos</th>
                <th>Apie</th>
                <th>Failai</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lectures as $lecture)
                <tr>
                    <td>{{ $lecture->name }}</td>
                    <td>{{$lecture->about}}</td>
                    <td><a class="btn btn-warning" href="{{route('lectures.show', $lecture->id)}}">Failai</a></td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
