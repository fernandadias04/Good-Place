@extends('layout')

@section('contents')


        <form enctype="multipart/form-data" method="post" action="{{route('search')}}">
            @csrf
            <div class="form-group">
                <input  class="form-control" name="latitude" id="latitude" placeholder="Latitude">
            </div>

            <div class="form-group">
                <input  class="form-control" name="longitude" id="longitude" placeholder="Longitude">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    @endsection
