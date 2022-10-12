@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Dėstytojas {{Auth::user()->name}}</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Grupės pavadinimas</th>
                <th>Kurso pavadinimas</th>
                <th>Kurso pradžia</th>
                <th>Kurso pabaiga</th>

            </tr>
            </thead>
            <tbody>

            @foreach($groups as $group)

                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->course->course_name }}</td>
                    <td>{{ $group->begins }}</td>
                    <td>{{ $group->ends }}</td>
                    @can('update', $group)
                    <td><a class="btn btn-info" href="{{ route('groups.edit', $group->id) }}">Redaguoti</a></td>
                    @endcan
                    <td><a class="btn btn-primary" href="{{ route('group.lectures', $group->id) }}">Paskaitos</a></td>
                    <td><a class="btn btn-success" href="">Studentai</a></td>
                    <td>
                        @can('delete', $group)
                    <form action="{{ route('groups.destroy', $group->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Ištrinti</button>
                    </form>
                        @endcan
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection
