@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Grupė</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Grupėps pavadinimas</th>
                <th>Kurso pavadinimas</th>
                <th>Kurso pradžia</th>
                <th>Kurso pabaiga</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                @foreach($grupe as $g)
                    <tr>
                    @if($users->id == $student->user_id && $g->id == $student->group_id)
                <td>{{ $g->name }}</td>
                <td>{{$g->course->course_name}}</td>
                <td>{{ $g->begins }}</td>
                <td>{{ $g->ends }}</td>
                <td><a class="btn btn-primary" href="{{ route('group.lectures', $g->id) }}">Paskaitos</a></td>
                <td><a class="btn btn-success" href="{{ route('group.students', $g->id) }}}">Studentai</a></td>
                    @endif
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
