@extends('layouts.user_type.auth')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Asset</h1>
        <a href="{{route('asset.create')}}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;Tambah Asset
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Asset</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($assets as $asset)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$asset->name}}</td>                               
                                <td>
                                    <a href="{{route('asset.edit', $asset->id)}}" class="btn btn-info">Edit
                                    </a>
                                    <form action="{{ route('asset.destroy', $asset->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
