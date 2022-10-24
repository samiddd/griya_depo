@extends('user.base')
@section('title')
    Form Pembangunan
@endsection
@section('body')
    <div class="page-header">
        <h1 class="page-title">Form Pembangunan</h1>
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
            <form action="{{ route('userPembangunan.store') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="deskripsi">Deskripsi Bangunan</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"
                                        placeholder="Masukkan ukuran, jumlah ruangan, dll"></textarea>

                                    @error('deskripsi')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="file">File Desain</label>
                                    <input type="file"
                                        class="form-control file-input @error('file') is-invalid @enderror"
                                        accept=".zip,.pdf,.jpg,.png,.gif" id="file" name="file" required>
                                    @error('file')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small class="text-info"><i class="fa fa-info-circle"></i> Masukkan file dengan
                                    ketentuan :
                                    <ul>
                                        <li>Dalam format .zip, .pdf, .jpg, .png</li>
                                        <li>Ukuran maksimal 2 MB</li>
                                        <li>Jika lebih dari 1 file masukkan dalam bentuk zip/pdf</li>
                                    </ul>
                                </small>

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
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Masukkan Alamat Lengkap"></textarea>

                                    @error('alamat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="budget">Estimasi Budget</label>
                                    <input type="number" class="form-control" id="budget" name="budget"
                                        placeholder="Masukkan tanpa tanda baca (cth : 1000000000)" value="" required>
                                    @error('budget')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kontraktor">Kontraktor</label>
                                    <select name="kontraktor" id="kontraktor" class="form-control" required>
                                        <option value="-" selected disabled>Pilih kontraktor</option>
                                        @foreach ($Kontraktor as $Kontraktor)
                                            <option value="{{ $Kontraktor->nama }}">{{ $Kontraktor->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kontraktor')
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
