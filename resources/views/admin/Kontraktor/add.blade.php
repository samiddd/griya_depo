@extends('admin.baseAdmin')
@section('title')
    Tambah Kontraktor
@endsection
@section('body')
    <div class="page-header">
        <h1 class="page-title">Tambah Kontraktor</h1>
    </div>
    <div class="col-md-6">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                Data telah di tambahkan
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('adminKontraktor.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                {{ csrf_field() }}
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Masukkan Nama Kontraktor" value="" required>
                                    @error('nama')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="penanggung_jawab">Penanggung Jawab</label>
                                    <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab"
                                        placeholder="Masukkan Nama Penanggung Jawab" value="" required>
                                    @error('penanggung_jawab')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="foto">Foto Penanggung Jawab</label>
                                    <input type="file"
                                        class="form-control file-input @error('foto') is-invalid @enderror"
                                        accept=".jfif,.jpg,.jpeg,.png,.gif" id="image" name="foto">
                                    @error('foto')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small class="text-danger"><i class="fa fa-info-circle"></i> Masukkan foto dengan
                                    ketentuan :
                                    <ul>
                                        <li>ukuran maksimal 1 MB</li>
                                        <li>Resolusi 500x500 px (1:1) </li>
                                    </ul>
                                </small>
                                <img id="preview-image-before-upload" alt="preview image"
                                    style="max-height:250px; margin-left:30px;">



                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wa">Kode Kontraktor</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Masukkan Kode Kontraktor" value="" required>
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="wa">Nomor WhatsApp</label>
                                    <input type="number" class="form-control" id="wa" name="wa"
                                        placeholder="Masukkan Nomor WhatsApp (cth : 628545591668)" value="" required>
                                    @error('wa')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat"> Alamat</label>
                                    <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Masukkan Alamat Lengkap"></textarea>

                                    @error('alamat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success" type="submit">Submit</button>
                    {{-- <button class="btn btn-danger">Cancel</button> --}}
                </div>
            </form>
        </div>
    </div>
@endsection
