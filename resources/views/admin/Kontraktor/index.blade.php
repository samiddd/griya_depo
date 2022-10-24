@extends('admin.baseAdmin')

@section('title')
    Admin Kontraktor
@endsection

@section('body')
    <H1>Admin Kontraktor</H1>
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
                        <h4 class="card-title">Data Kontraktor</h4>
                        <a href="{{ route('adminKontraktor.create') }}" style="margin-left:auto"><button
                                class="btn btn-warning btn-round ml-auto">
                                <i class="fa fa-plus"></i>Tambah Kontraktor
                            </button></a>

                    </div>
                </div>
                <div class="card-body">

                    <div class="box-body table-responsive">
                        <table id="tableFoto" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Penanggung Jawab (Klik untuk WA)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody><?php $n = 1; ?>
                                @foreach ($Kontraktor as $Kontraktor)
                                    <tr>
                                        <td>{{ $n++ }}</td>
                                        <td>{{ $Kontraktor->nama }}</td>
                                        <td><a href="https://api.whatsapp.com/send/?phone={{ $Kontraktor->wa }}&text=Hai, Selamat Siang {{ $Kontraktor->penanggung_jawab }} &app_absent=0"
                                                target="_blank">
                                                <p class="text-warning">{{ $Kontraktor->penanggung_jawab }}</p>
                                            </a></td>
                                        <td>
                                            <button class="btn btn-info btn-sm" style="margin: 5px" data-toggle="modal"
                                                data-target="#ModalKontraktorDetail-{{ $Kontraktor->id }}">
                                                <span class="btn-label">
                                                    <i class="fa fa-info" style="font-size:10px "></i>
                                                </span>
                                                Detail
                                            </button>
                                            <a href="{{ route('adminKontraktor.edit', $Kontraktor->id) }}"><button
                                                    class="btn btn-success btn-sm" style="margin: 5px">
                                                    <span class="btn-label">
                                                        <i class="fa fa-edit" style="font-size:10px"></i>
                                                    </span>
                                                    Edit
                                                </button></a>
                                            <button class="btn btn-danger btn-sm" style="margin: 5px" data-toggle="modal"
                                                data-target="#ModalKontraktorHapus-{{ $Kontraktor->id }}">
                                                <span class="btn-label">
                                                    <i class="fa fa-trash" style="font-size:10px"></i>
                                                </span>
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                    {{-- Modal Produk Detail --}}
                                    <div class="modal fade" id="ModalKontraktorDetail-{{ $Kontraktor->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="width: 120%">

                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">
                                                        Detail Kontraktor
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
                                                                <span>{{ $Kontraktor->nama }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row" style="margin-bottom: -15px">
                                                            <label for="Kode" class="col-md-4">Kode
                                                                Kontraktor/</label>
                                                            <div class="col-md-8">
                                                                <span>{{ $Kontraktor->username }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" style="margin-bottom: -15px">
                                                            <label for="Harga"
                                                                class="col-md-4 col-md-offset-1 control-label">No. WA
                                                            </label>
                                                            <div class="col-md-8">
                                                                <span>{{ $Kontraktor->wa }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" style="margin-bottom: -15px">
                                                            <label for="alamat" class="col-md-4">Alamat
                                                            </label>
                                                            <div class="col-md-8">
                                                                <span>{{ $Kontraktor->alamat }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" style="margin-bottom: -15px">
                                                            <label for="PJ" class="col-md-4">Penanggung Jawab
                                                            </label>
                                                            <div class="col-md-8">
                                                                <span>{{ $Kontraktor->penanggung_jawab }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mt-4">
                                                            <img src="{{ $Kontraktor->foto }}"
                                                                alt="{{ $Kontraktor->nama }}" style="max-width:100%"
                                                                class="rounded-circle m-auto">

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
                                    <!-- Modal Hapus-->
                                    <div class="modal fade" id="ModalKontraktorHapus-{{ $Kontraktor->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">
                                                        Anda Yakin ingin menghapus Kontraktor
                                                        "{{ $Kontraktor->nama }}"?
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
                                                        onclick="hapusData('{{ route('adminKontraktor.destroy', $Kontraktor->id) }}')"
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
                    window.location.href = '/adminKontraktor';
                })
                .fail((errors) => {
                    alert('Tidak Terhapus');
                    return;
                });
            // }
        }
    </script>
@endsection
