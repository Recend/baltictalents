@extends('layouts.app')
@section('content')
    <div class="container">
    <form class="form-control" action="{{ route('groups.update', $group->id) }}" method="post">
        @csrf
        @method('PUT')
            <label class="form-label">Grupės pavadinimas:</label>
            <select class="form-control" name="course_id">
                @foreach($course as $c)
                    <option value="{{$c->id}}">{{$c->course_name}}</option>
                @endforeach
            </select>
      <label class="form-label">Dėstytojas</label>
            <select class="form-control" name="teacher_id">
                @foreach($user as $u)
                    <option value="{{$u->id}}">{{$u->name}}</option>
                @endforeach
            </select>
        <label class="form-label">Grupės pavadinimas</label>
           <input type="text" class="form-control" name="name">
        <label class="form-label">Prasideda</label>
           <input type="date" class="form-control" name="begins">
        <label class="form-label">Baigiasi</label>
        <input type="date" class="form-control" name="ends">

        <button class="btn btn-success">Atnaujinti</button>
        <a href="{{route('groups.index')}}" class="btn btn-primary float-end">Atgal</a>
    </form>
    </div>
@endsection
