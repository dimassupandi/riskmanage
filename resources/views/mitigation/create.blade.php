@extends('layouts.user_type.auth')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Risiko</h1>
        <a href="{{ route('mitigation.index') }}" class="btn btn-secondary btn-sm">Back</a>
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
            <form action="{{route('mitigation.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="risks_id">Risiko</label>
                    <select name="risks_id" required class="form-control">
                        <option value="">Pilih Risiko</option>
                        @foreach ($risks as $risk)
                        <option value="{{$risk->id}}">
                            {{$risk->description}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="action" class="form-label">Perlakuan</label>
                    <input type="text" class="form-control" id="action" name="action" required>
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