@extends('layouts.user_type.auth')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mitigasi</h1>
        <a href="{{route('mitigation.create')}}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;Tambah Mitigasi
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
                                <th>Risiko</th>
                                <th>Level</th>
                                <th>Perlakuan</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mitigations as $mitigation)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$mitigation->risks->description}}</td>
                                <td>{{$mitigation->risks->level}}</td>
                                <td>{{$mitigation->action}}</td>
                                <td class="text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $mitigation->created_at->format('d/m/Y') }}</span>
                                </td>
                                <td>
                                    <a href="{{route('mitigation.edit', $mitigation->id)}}" class="btn btn-info">Edit
                                    </a>
                                    <form action="{{ route('mitigation.destroy', $mitigation->id) }}" method="POST" class="d-inline">
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