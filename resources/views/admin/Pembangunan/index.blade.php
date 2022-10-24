@extends('admin.baseAdmin')

@section('title')
    Admin Pembangunan
@endsection

@section('body')
    <H1>Admin Pembangunan</H1>
    <div class="col-md-6">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                Data telah di tambahkan
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Pembangunan</h4>
                    </div>
                </div>
                <div class="card-body">

                    <div class="box-body table-responsive">
                        <table id="tableFoto" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Kontak (Klik untuk WA)</th>
                                    <th>Estimasi Budget</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody><?php $n = 1; ?>
                                @foreach ($Pembangunan as $Pembangunan)
                                    <tr>
                                        <td>{{ $n++ }}</td>
                                        <td>{{ $Pembangunan->nama }}</td>
                                        <td><a href="https://api.whatsapp.com/send/?phone={{ $Pembangunan->wa }}&text=Hai, Selamat Siang {{ $Pembangunan->nama }} &app_absent=0"
                                                target="_blank">
                                                <p class="text-warning">{{ $Pembangunan->wa }}</p>
                                            </a></td>
                                        <td>{{ $Pembangunan->budget }}</td>
                                        <td>
                                            @if ($Pembangunan->status === 'diterima')
                                                <button class="btn btn-sm btn-primary btn-round" disabled>Diterima</button>
                                            @elseif ($Pembangunan->status === 'dikerjakan')
                                                <button class="btn btn-sm btn-warning btn-round"
                                                    disabled>Dikerjakan</button>
                                            @elseif ($Pembangunan->status === 'selesai')
                                                <button class="btn btn-sm btn-success btn-round" disabled>Selesai</button>
                                            @endif
                                        </td>
                                        </td>
                                        <td>

                                            <button class="btn btn-info btn-sm" style="margin: 5px" data-toggle="modal"
                                                data-target="#ModalPembangunanDetail-{{ $Pembangunan->id }}">
                                                <span class="btn-label">
                                                    <i class="fa fa-info" style="font-size:10px "></i>
                                                </span>
                                                Detail
                                            </button>
                                            <button class="btn btn-success btn-sm" style="margin: 5px" data-toggle="modal"
                                                data-target="#ModalPembangunanEdit-{{ $Pembangunan->id }}">
                                                <span class="btn-label">
                                                    <i class="fa fa-edit" style="font-size:10px "></i>
                                                </span>
                                                Ganti Status
                                            </button>
                                            <button class="btn btn-danger btn-sm" style="margin: 5px" data-toggle="modal"
                                                data-target="#ModalPembangunanHapus-{{ $Pembangunan->id }}">
                                                <span class="btn-label">
                                                    <i class="fa fa-trash" style="font-size:10px"></i>
                                                </span>
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                    {{-- Modal Produk Detail --}}
                                    <div class="modal fade" id="ModalPembangunanDetail-{{ $Pembangunan->id }}"
                                        tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="width: 120%">

                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">
                                                        Detail Pembangunan
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="row">

                                                    <div class="modal-body ml-2">

                                                        <div class="form-group row" style="margin-bottom: -15px">
                                                            <label for="Nama" class="col-md-4">Nama
                                                            </label>
                                                            <div class="col-md-8">
                                                                <span>{{ $Pembangunan->nama }}</span>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row" style="margin-bottom: -15px">
                                                            <label for="Harga"
                                                                class="col-md-4 col-md-offset-1 control-label">No. WA
                                                            </label>
                                                            <div class="col-md-8">
                                                                <span>{{ $Pembangunan->wa }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" style="margin-bottom: -15px">
                                                            <label for="alamat" class="col-md-4">Alamat
                                                            </label>
                                                            <div class="col-md-8">
                                                                <span>{{ $Pembangunan->alamat }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" style="margin-bottom: -15px">
                                                            <label for="PJ" class="col-md-4">Deskripsi
                                                            </label>
                                                            <div class="col-md-8">
                                                                <span>{{ $Pembangunan->deskripsi }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" style="margin-bottom: -15px">
                                                            <label for="PJ" class="col-md-4">File Desain
                                                            </label>
                                                            <div class="col-md-8">
                                                                <span><a href="{{ $Pembangunan->file }}"
                                                                        download="">Download File di sini</a></span>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>

                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Edit-->
                                    <div class="modal fade" id="ModalPembangunanEdit-{{ $Pembangunan->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('adminPembangunan.update', $Pembangunan->id) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                {{ csrf_field() }}
                                                <div class="modal-content">

                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title">
                                                            Ganti status Pembangunan
                                                            "{{ $Pembangunan->nama }}"
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="status">status</label>
                                                                    <select name="status" id="status"
                                                                        class="form-control" required>
                                                                        <option value="-" disabled>Pilih status
                                                                        </option>
                                                                        @if ($Pembangunan->status === 'diterima')
                                                                            <option value="diterima" selected>Diterima
                                                                            </option>
                                                                            <option value="dikerjakan">Dikerjakan</option>
                                                                            <option value="selesai">Selesai </option>
                                                                        @elseif($Pembangunan->status === 'dikerjakan')
                                                                            <option value="diterima">Diterima</option>
                                                                            <option value="dikerjakan" selected>Dikerjakan
                                                                            </option>
                                                                            <option value="selesai">Selesai </option>
                                                                        @elseif($Pembangunan->status === 'selesai')
                                                                            <option value="diterima">Diterima</option>
                                                                            <option value="dikerjakan">Dikerjakan</option>
                                                                            <option value="selesai" selected>Selesai
                                                                            </option>
                                                                        @endif

                                                                    </select>
                                                                    @error('status')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="submit" class="btn btn-primary">Ubah
                                                            Status</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Tutup</button>
                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                                    <!-- Modal Hapus-->
                                    <div class="modal fade" id="ModalPembangunanHapus-{{ $Pembangunan->id }}"
                                        tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">
                                                        Anda Yakin ingin menghapus Pembangunan
                                                        "{{ $Pembangunan->nama }}"?
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button
                                                        onclick="hapusData('{{ route('adminPembangunan.destroy', $Pembangunan->id) }}')"
                                                        type="" id="addRowButton"
                                                        class="btn btn-primary">Hapus</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script></script>
    <script>
        let table;

        $(function() {
            table = $('#tableFoto').DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                // 
            });
        });

        function hapusData(url) {
            // if (confirm('Yakin Hapus Kategori')) {
            $.post(url, {
                    '_token': $('[name=csrf-token').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    Swal.fire(
                        'Sukses',
                        'Sukses Menghapus',
                        'success'
                    )
                    window.location.href = '/adminPembangunan';
                })
                .fail((errors) => {
                    alert('Tidak Terhapus');
                    return;
                });
            // }
        }
    </script>
@endsection
