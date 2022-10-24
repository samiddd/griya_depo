@extends('user.base')
@section('title')
    Form Perbaikan
@endsection
@section('body')
    <div class="page-header">
        <h1 class="page-title">Form Perbaikan</h1>
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
            <form action="{{ route('userPerbaikan.store') }}" method="post" enctype="multipart/form-data">
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
                                        placeholder="Masukkan Nama Anda" value="" required>
                                    @error('nama')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keluhan">Keluhan</label>
                                    <textarea name="keluhan" id="keluhan" rows="3" class="form-control" placeholder="Keluhan yang di alami"></textarea>

                                    @error('keluhan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="foto">Foto Keluhan</label>
                                    <input type="file"
                                        class="form-control file-input @error('foto') is-invalid @enderror"
                                        accept=".jfif,.jpg,.jpeg,.png,.gif" id="image" name="foto">
                                    @error('foto')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <img id="preview-image-before-upload" alt="preview image"
                                    style="max-height:250px; margin-left:30px;">



                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wa">Nomor WhatsApp</label>
                                    <input type="number" class="form-control" id="wa" name="wa"
                                        placeholder="Masukkan Nomor WhatsApp (cth : 628545591668)" value="" required>
                                    @error('wa')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" id="kategori" class="form-control" required>
                                        <option value="-" selected disabled>Pilih Kategori</option>
                                        <option value="Perbaikan Atap">Perbaikan Atap</option>
                                        <option value="Reparasi AC">Reparasi AC</option>
                                        <option value="Tukang Listrik">Tukang Listrik</option>
                                        <option value="Tukang Ledeng">Tukang Ledeng</option>
                                        <option value="Landscaping">Landscaping</option>
                                        <option value="Kebocoran">Kebocoran</option>
                                    </select>
                                    @error('kategori')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
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
