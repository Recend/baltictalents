@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Grupė</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
            </tr>
            </thead>
            <tbody>
                @foreach($groups->students as $student)
                    @foreach($users as $user)
                    @if($student->user_id == $user->id)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                </tr>
                    @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
