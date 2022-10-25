@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Failai</h1>

            @can('create', \App\Models\File::class)

                <form action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
{{--                    @method('PUT')--}}
                    <div class="mb-3 d-flex">
                        <label for="" class="form-label mx-2"></label>
                        <input type="hidden" name="lecture_id" value="{{$lecture->id}}">
                        <input type="file" class="form-control mx-2" name="file">
                        <input type="text" class="form-control mx-2" name="name" placeholder="Failo pavadinimas">
                        <div>
                            <button class="btn btn-success">Add</button>
                        </div>
                    </div>
                </form>
            @endcan

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Failas</th>
                <th>Failo pavadinimas</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($files as $file )
                @if($file->lecture_id == $lecture->id )
                <tr>
                    @can('view',$file)
                    <td>{{$file->file}}</td>
                    <td>{{$file->name}}</td>
                    <td></td>
                    <td>
                   @endif
                        @can('update', $file)
                    <form action="{{ route('files.destroy', $file->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Ištrinti</button>
                    </form>

                    </td>
                    <td>

                        @if($file->showhide=='0')
                            <form action="{{ route('hide', $file->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="showhide" value="1">
                                <button class="btn btn-warning">Slėpti</button>
                            </form>
                        @else
                            <form action="{{ route('unhide', $file->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="showhide" value="0">
                                <button class="btn btn-success">Rodyti</button>
                            </form>

                        @endcan

                    </td>
                    @endcan
                        @endif
                        @if($file->showhide=='0')
                    <td>
                        <form action="{{ route('download', $file->file) }}" method="get">
                            @csrf
                            @method('DOWNLOAD')
                            <input type="hidden" name="showhide" value="0">
                            <button class="btn btn-success">Atsisiųsti</button>
                        </form>
                        @endif
                    </td>
                </tr>



            @endforeach
            </tbody>
        </table>
    </div>

@endsection
