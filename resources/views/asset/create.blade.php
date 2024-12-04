@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Asset</h1>
        <a href="{{ route('asset.index') }}" class="btn btn-secondary btn-sm">Back</a>

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
            <form action="{{route('asset.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Asset</label>
                    <input type="text" class="form-control" name="name" placeholder="Asset" value="{{old('name')}}">
                </div>
                <button type="submit" class="btn bg-gradient-primary">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection