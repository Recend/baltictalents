@extends('layouts.app')
@section('content')

    <div class="container">
        @can('create', $users)
        <a class="btn btn-info" href="{{ route('groups.create') }}">Pridėti grupę</a>
    <a class="btn btn-info" href="{{ route('groups.viewstudent') }}">Priskirti studentą grupei</a>
        @endcan
        <table class="table table-striped">
            <thead>
            <tr>

                <th>Grupės pavadinimas</th>
                <th>Kurso pavadinimas</th>
                <th>Stundetų skaičius</th>
                <th>Kurso pradžia</th>
                <th>Kurso pabaiga</th>

            </tr>
            </thead>
            <tbody>

            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->course->course_name }}</td>
                    <td>{{ $group->students->count()}}</td>
                    <td>{{ $group->begins }}</td>
                    <td>{{ $group->ends }}</td>
                    @can('update', $group)
                    <td><a class="btn btn-info" href="{{ route('groups.edit', $group->id) }}">Redaguoti</a></td>
                    @endcan
                    <td><a class="btn btn-primary" href="{{ route('group.lectures', $group->id) }}">Paskaitos</a></td>
                    <td><a class="btn btn-success" href="{{ route('group.students', $group->id) }}}">Studentai</a></td>
                    <td>
                    <form action="{{ route('groups.destroy', $group->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Ištrinti</button>
                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>



@endsection
