@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="form-control" action="{{ route('lectures.store') }}" method="post">
            @csrf

            <label class="form-label">Paskaitos pavadinimas</label>
            <input class="form-control" type="text" name="name">
            <label class="form-label">Apie</label>
            <input class="form-control" type="text" name="about">
            <label class="form-label">Data</label>
            <input type="date" class="form-control" name="data">
            <label class="form-label">Grupė</label>
            <select class="form-control" type="text" name="group_id">
            @foreach($groups as $group)
                <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
                </select>
            <button class="btn btn-success">Pridėti grupę</button>
            <a href="{{route('groups.index')}}" class="btn btn-primary float-end">Atgal</a>
        </form>
    </div>
@endsection
