@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="form-control" action="{{ route('groups.store') }}" method="post">
            @csrf
            <label class="form-label">Grupės pavadinimas:</label>
           <input class="form-control" type="text" name="name">
            <label class="form-label">Kurso pavadinimas</label>
            <select class="form-control" name="course_id">
                @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="teacher_id" value="{{ Auth::user()->id }}">
            <label class="form-label">Prasideda</label>
            <input type="date" class="form-control" name="begins">
            <label class="form-label">Baigiasi</label>
            <input type="date" class="form-control" name="ends">
            <button class="btn btn-success">Pridėti grupę</button>
            <a href="{{route('groups.index')}}" class="btn btn-primary float-end">Atgal</a>
        </form>
    </div>
@endsection
