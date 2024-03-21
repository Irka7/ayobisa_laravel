@extends('templates.layout')

@push('style')

@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Stok</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formMenu">
            Tambah Stok
        </button>
        {{-- <a href="{{ route('export-kategori') }}" class="btn btn-success">
            <i class="fa fa-file-excel"></i> Export
        </a>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
            <i class="fas fa-file-excel"></i> Import
        </button> --}}
        <div class="mt-3">
            @include('stock.data')
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    @include('stock.form')
  </section>
@endsection

@push('script')
<script>
    $('.alert-danger').fadeTo(2000,500).slideUp(500, function(){
        $('.alert-danger').slideUp(500)
    })

    $('.alert-success').fadeTo(2000,500).slideUp(500, function(){
        $('.alert-success').slideUp(500)
    })

    $(function () {
        $('#tabelStok').DataTable()

        $('.btn-delete').on('click', function(e){
            e.preventDefault()
            let data = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: 'Hapus Data',
                html: `Apakah data <b>${data}</b> ingin dihapus?`,
                icon: 'error',
                showDenyButton: true,
                focusConfirm: false,
                denyButtonText: 'Tidak',
                confirmButtonText: 'Ya',
            }).then((result) => {
                if (result.isConfirmed) $(e.target).closest('form').submit()
                else swal.close()
            })
        })

        $('#formStok').on('show.bs.modal', function(e){
            // console.log('edit')
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const stock = btn.data('stock')
            const menu_id = btn.data('kategori_id')
            const id = btn.data('id')
            const modal = $(this)
            console.log(mode)
            if(mode === 'edit'){
                modal.find('.modal-title').text('Edit Data Menu')
                modal.find('#stock').val(stock)
                modal.find('#menu_id').val(menu_id)
                modal.find('.modal-body form').attr('action', '{{ url('menu') }}/'+id)
                modal.find('#method').html('@method('PATCH')')
            }else{
                modal.find('.modal-title').text('Input Data Kategori')
                modal.find('#stock').val('')
                modal.find('#menu_id').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url("menu") }}')
            }
        })
    })
</script>
@endpush
