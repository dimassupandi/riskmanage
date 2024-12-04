@extends('layouts.user_type.auth')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Risiko</h1>
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
            <form action="{{route('risk.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="assets_id">Asset</label>
                    <select name="assets_id" required class="form-control">
                        <option value="">Pilih Asset</option>
                        @foreach ($assets as $asset)
                        <option value="{{$asset->id}}">
                            {{$asset->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="decsription" name="description" required>
                </div>
                <div class="form-group">
                    <label for="frequency">Frequency</label>
                    <select id="frequency" name="frequency" class="form-control">
                        <option value="">Pilih Frequency</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label for="impact">Impact</label>
                    <select id="impact" name="impact" class="form-control">
                        <option value="">Pilih Impact</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">Level</label>
                    <input type="text" class="form-control" id="level" name="level" readonly>
                </div>
                <button type="submit" class="btn bg-gradient-primary">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection