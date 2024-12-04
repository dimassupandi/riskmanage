@extends('layouts.user_type.auth')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Risiko</h1>
        <a href="{{ route('risk.index') }}" class="btn btn-secondary btn-sm">Back</a>

    </div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{route('risk.update', $risk->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="assets_id">Asset</label>
                    <select name="assets_id" required class="form-control">
                        <option value="{{$risk->assets_id}}">Jangan Diubah</option>
                        @foreach ($assets as $asset)
                        <option value="{{$asset->id}}">
                            {{$asset->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Risiko</label>
                    <input type="text" class="form-control" name="description" placeholder="Risiko" value="{{$risk->description}}">
                </div>
                <div class="form-group">
                    <label for="frequency">Frekuensi</label>
                    <select class="form-control" name="frequency" id="frequency" required>
                        <option value="">Edit Frekuensi</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="impact">Dampak</label>
                    <select class="form-control" name="impact" id="impact" required>
                        <option value="">Edit Dampak</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <input type="text" class="form-control" name="level" id="level" value="{{$risk->level}}" readonly>
                </div>
                <button type="submit" class="btn bg-gradient-primary">
                    Ubah
                </button>
            </form>
        </div>
    </div>







</div>
<!-- /.container-fluid -->
@endsection