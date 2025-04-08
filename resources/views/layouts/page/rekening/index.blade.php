@extends('dashboard')
@section('main')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Rekening</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Data Rekening
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rekening</h5>
                @if(session('berhasil'))
                <div class="alert alert-secondary" role="alert">
                    {{ session('berhasil') }}

                  </div>
                @endif
                @if(session('hapus'))
                <div class="alert alert-danger" role="alert">
                    {{ session('hapus') }}

                  </div>
                @endif
                <div class="table-responsive">
                    <table id="tb_rek" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>
    <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#tambahkanModal">
        <i class="fa fa-plus"></i>
        Rekening
    </a>
</th>
                                <th>ID</th>
                                <th>Nama Rekening</th>
                                <th>Saldo Awal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekening as $rek )
                            <tr>
                            <td width="5%">
                            <a href="#" class="btn btn-sm btn-success edit-btn"
   data-id="{{ $rek->id }}" 
   data-nm="{{ $rek->NamaRekening }}" 
   data-saldo="{{ $rek->saldoAwal }}"  
   data-bs-toggle="modal" 
   data-bs-target="#updateModal">
   <i class="fa fa-edit"></i>
</a>

<a href="#" class="btn btn-sm btn-danger btn-delete"  
   data-id="{{ $rek->id }}"  
   data-bs-toggle="modal" 
   data-bs-target="#deleteModal">
    <i class="fa fa-times"></i>
</a>

</td>
        <td>{{ $loop->iteration }}</td>
                                <td>{{ $rek->NamaRekening }}</td>
                                <td>{{ $rek->saldoAwal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!--  modals -->

<div class="modal fade" id="tambahkanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah rekening</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('/simpanrekening') }}" method="post"  enctype="multipart/form=data">
         @csrf
      <div class="modal-body">
        <div class="row mb-3 align-items-center">
                    <div class="col-lg-4 col-md-12 text-end">
                      <span>Nama Rekening</span>
                    </div>
                    <div class="col-lg-8 col-md-12">
                      <input
                        type="text"
                        class="form-control"
                        id="nmrek" name="nmrek"
                        placeholder="Nama Rekening"
                      />
                      <div class="valid-feedback"></div>
                    </div>
                  </div>

                  <div class="row mb-3 align-items-center">
                    <div class="col-lg-4 col-md-12 text-end">
                      <span>Saldo Awal</span>
                    </div>
                    <div class="col-lg-8 col-md-12">
                      <input
                        type="number"
                        class="form-control"
                        id="sa" name="sa"
                        placeholder="Saldo Awal"
                      />
                      <div class="valid-feedback"></div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
  </div>
</div>

<!--update-->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="{{ url('/updaterekening') }}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Rekening</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row mb-3 align-items-center">
            <div class="col-lg-4 col-md-12 text-end">
              <span>Nama Rekening</span>
            </div>
            <div class="col-lg-8 col-md-12">
              <input type="hidden" id="idrek" name="idrek">
              <input type="text" class="form-control" id="nmrek1" name="nmrek1" placeholder="Nama Rekening">
            </div>
          </div>
          <div class="row mb-3 align-items-center">
            <div class="col-lg-4 col-md-12 text-end">
              <span>Saldo Awal</span>
            </div>
            <div class="col-lg-8 col-md-12">
              <input type="number" class="form-control" id="sa1" name="sa1" placeholder="Saldo Awal">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--modal delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ url('/deleteRekening') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Rekening</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id" name="id">
          <h3>Hapus Rekening..?</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection

@section('js')
<script>
    try {
  $('#tb_rek').DataTable();
} catch (e) {
  console.error("Gagal inisialisasi DataTable:", e);
}

    $('#updateModal').on('show.bs.modal', function(event){
    console.log('Modal update dibuka!');
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var nm = button.data('nm');
    var saldo = button.data('saldo');

    console.log('Data:', id, nm, saldo); // ini bantu debug

    var modal = $(this);
    modal.find('.modal-body #idrek').val(id);
    modal.find('.modal-body #nmrek1').val(nm);
    modal.find('.modal-body #sa1').val(saldo);
});

$('#deleteModal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var id = button.data('id');

    var modal = $(this);
    modal.find('.modal-body #id').val(id);
});

</script>
@endsection
