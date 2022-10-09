@extends('dashboard')
@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Edit Pegawai</h2>
    </div>
    <div>
        <a class="btn btn-secondary" href="{{ route('pegawai.index') }}">Back</a>
    </div>

</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weightbold">Nomor Induk Pegawai</label>
                                    <input type="number"
                                        class="form-control @error('nomor_induk_pegawai') is-invalid @enderror"
                                        name="nomor_induk_pegawai" value="{{ old('nomor_induk_pegawai') }} "
                                        placeholder="Masukkan Nomor Induk Pegawai">
                                    @error('nomor_induk_pegawai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="font-weightbold">Nama Pegawai</label>
                                    <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror"
                                        name="nama_pegawai" value="{{ old('nama_pegawai') }}"
                                        placeholder="Masukkan Nama Pegawai">
                                    @error('nama_pegawai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weightbold">Departemen</label>
                                    <input type="number"
                                        class="form-control @error('departemen_id') is-invalid @enderror"
                                        name="departemen_id" value="{{ old('departemen_id') }}"
                                        placeholder="Masukkan Nama Departemen">
                                    @error('departemen_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weightbold">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weightbold">Nomor Telepon</label>
                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                        name="telepon" value="{{ old('telepon') }}"
                                        placeholder="Masukkan Nomor Telepon">
                                    @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weightbold">Gender</label>
                                    <input type="number" class="form-control @error('gender') is-invalid @enderror"
                                        name="gender" value="{{ old('gender') }}" placeholder="Masukkan Gender(0/1)">
                                    @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weightbold">Status</label>
                                    <input type="number" class="form-control @error('status') is-invalid @enderror"
                                        name="status" value="{{ old('status') }}" placeholder="Masukkan Status(0/1)">
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
</form>
@endsection