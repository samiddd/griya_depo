@extends('admin.baseAdmin')
@section('title')
    Edit Kontraktor
@endsection
@section('body')
    <div class="page-header">
        <h1 class="page-title">Edit Kontraktor</h1>
    </div>
    <div class="col-md-6">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                Data telah di Editkan
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('adminKontraktor.update', $Kontraktor->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{ csrf_field() }}
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Masukkan Nama Perusahaan Kontraktor" value="{{ $Kontraktor->nama }}"
                                        required>
                                    @error('nama')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="penanggung_jawab">Penanggung Jawab</label>
                                    <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab"
                                        placeholder="Masukkan Nama Penanggung Jawab"
                                        value="{{ $Kontraktor->penanggung_jawab }}" required>
                                    @error('penanggung_jawab')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="old">Foto Sekarang</label> <br>
                                            <img src="{{ asset('/assets') }}../../../{{ $Kontraktor->foto }}"
                                                alt="{{ $Kontraktor->nama }}" style="max-width: 100%; border :1px black">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="foto">Ganti Foto</label>
                                            <input type="file"
                                                class="form-control file-input @error('foto') is-invalid @enderror"
                                                accept=".jfif,.jpg,.jpeg,.png,.gif" id="image" name="foto">
                                            <img id="preview-image-before-upload" alt="preview image"
                                                style="max-width:100%; margin-top:10px"> <br>
                                            <small class="text-danger"><i class="fa fa-info-circle"></i> Masukkan foto
                                                dengan
                                                ketentuan :
                                                <ul>
                                                    <li>Jika ingin mengganti</li>
                                                    <li>Ukuran maksimal 500 KB</li>
                                                    <li>resolusi 500x500px (1:1)</li>
                                                </ul>
                                            </small>
                                            @error('foto')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wa">Kode Kontraktor</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Masukkan Kode Kontraktor" value="{{ $Kontraktor->username }}"
                                        required>
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="wa">Nomor WhatsApp</label>
                                    <input type="number" class="form-control" id="wa" name="wa"
                                        placeholder="Masukkan Nomor WhatsApp (cth : 628545591668)"
                                        value="{{ $Kontraktor->wa }}" required>
                                    @error('wa')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat"> Alamat</label>
                                    <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Masukkan Alamat Lengkap">{{ $Kontraktor->alamat }}</textarea>

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
