@extends('layout')

@section('contents')

        <a href="{{route('home')}}">Back</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Hotel Name</th>
                <th scope="col">Distance to local in KM </th>
                <th scope="col">Price per night</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($infosOrd as $info)
                <tr>
                <td>{{$info[0]}} </td>
                <td>{{$info[4]}} Km</td>
                <td>{{$info[3]}} EUR</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
