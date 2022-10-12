@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Kursai </h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Grupės pavadinimas</th>
                <th>Paskaitos</th>
            </tr>
            </thead>
            <tbody>

            @foreach($lectures as $lecture)


                <tr>

                    <td></td>

                    <td></td>
                    </tr>



            @endforeach
            </tbody>
        </table>
    </div>
@endsection
