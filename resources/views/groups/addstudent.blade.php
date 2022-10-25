@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="form-control" action="{{ route('groups.addstudent') }}" method="post">
            @csrf
            @method('PUT')
            <label class="form-label">Kurso pavadinimas</label>
            <select class="form-control" name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <label class="form-label">Kurso pavadinimas</label>
            <select class="form-control" name="group_id">
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-success">Pridėti grupę</button>
            <a href="{{route('groups.index')}}" class="btn btn-primary float-end">Atgal</a>
        </form>
    </div>
@endsection
