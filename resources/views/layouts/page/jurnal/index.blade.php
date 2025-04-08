@extends('dashboard')

@section('main')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Jurnal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Jurnal</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Jurnal</h5>
                @if(session('berhasil'))
                    <div class="alert alert-success" role="alert">
                        {{ session('berhasil') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="tb_jurnal" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#tambahJurnalModal">
                                        <i class="fa fa-plus"></i> Jurnal
                                    </a>
                                </th>
                                <th>ID</th>
                                <th>Tanggal</th>
                                <th>Rekening</th>
                                <th>Keterangan</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jurnal as $item)
                            <tr>
                                <td>#</td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->rekening }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->debit }}</td>
                                <td>{{ $item->kredit }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Jurnal -->
    <div class="modal fade" id="tambahJurnalModal" tabindex="-1" aria-labelledby="jurnalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ url('/simpanjurnal') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="jurnalModalLabel">Tambah Jurnal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Tanggal & Keterangan -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="col-md-6">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Contoh: Piutang pada Bank" required autofocus>
                            </div>
                        </div>

                        <!-- Input dinamis: rekening, debit, kredit -->
                        <div id="jurnal-container">
                            <div class="row mb-2 jurnal-item">
                                <div class="col-md-4">
                                    <select name="rekening[]" class="form-control" required>
                                        <option value="">Pilih Rekening</option>
                                        @foreach ($rekening as $rek)
                                            <option value="{{ $rek->NamaRekening }}">{{ $rek->NamaRekening }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="debit[]" class="form-control" placeholder="Debit" value="0">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="kredit[]" class="form-control" placeholder="Kredit" value="0">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success btn-add">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#tb_jurnal').DataTable();

        $('#jurnal-container').on('click', '.btn-add', function () {
            let row = $(this).closest('.jurnal-item');
            let clone = row.clone();

            // Reset input values
            clone.find('select').val('');
            clone.find('input').val(0);

            // Ganti tombol tambah dengan tombol hapus
            clone.find('.btn-add')
                .removeClass('btn-success btn-add')
                .addClass('btn-danger btn-remove')
                .html('<i class="fa fa-trash"></i>');

            $('#jurnal-container').append(clone);
        });

        $('#jurnal-container').on('click', '.btn-remove', function () {
            // Cegah menghapus baris terakhir
            if ($('.jurnal-item').length > 1) {
                $(this).closest('.jurnal-item').remove();
            } else {
                alert('Minimal satu baris jurnal harus ada!');
            }
        });
    });
</script>
@endsection
