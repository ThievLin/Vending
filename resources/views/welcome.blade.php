<!-- contents/reslot.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Reslot Data</h1>

    <table>
        <thead>
            <tr>
                <th>Slot</th>
                <th>Date</th>
                <th>Address</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reslotData as $reslot)
                <tr>
                    <td>{{ $reslot->slot }}</td>
                    <td>{{ $reslot->date }}</td>
                    <td>{{ $reslot->adddress }}</td>
                    <td>{{ $reslot->location }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
