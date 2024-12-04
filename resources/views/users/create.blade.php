@extends('layouts.user_type.auth') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Back</a>

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
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name') }}</span> @endif
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"> @if ($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control"
                            id="password_confirmation" name="password_confirmation">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="roles" class="col-md-4 col-form-label text-md-end text-start">Roles</label>
                    <div class="col-md-6">
                        <select class="form-select @error('roles') is-invalid @enderror" multiple aria-label="Roles" id="roles" name="roles[]">
                            @forelse ($roles as $role)
                            @if ($role!='Super Admin')
                            <option value="{{ $role }}" {{ in_array($role, $userRoles ?? []) ? 'selected' : '' }}>
                                {{ $role }}
                            </option>
                            @else
                            @if (Auth::user()->hasRole('Super
                            Admin'))
                            <option value="{{ $role }}" {{ in_array($role, $userRoles ?? []) ? 'selected' : '' }}>
                                {{ $role }}
                            </option>
                            @endif
                            @endif
                            @empty
                            @endforelse
                        </select>
                        @if ($errors->has('roles'))
                        <span class="text-danger">{{$errors->first('roles') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row"><input type="submit" class="col-md-3 offset-md-5 btn bg-gradient-primary" value="Tambah User">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection