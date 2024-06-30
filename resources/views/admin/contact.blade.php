@extends('admin.layouts.index')

@section('title', 'Data Kritik & Saran')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Kritik & Saran</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">Index</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Pesan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $index => $contact)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone_number }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td>
                                            <a href="#" class="btn btn-icon btn-danger" data-id="{{ $contact->id }}"
                                                data-action="{{ route('contacts.destroy', $contact->id) }}"><i
                                                    class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <!-- Modal for detail contact -->
    <div class="modal fade" id="detailContactModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Detail Kritik & Saran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="detailName" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="detailEmail" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control" id="detailPhoneNumber" readonly>
                        </div>
                        <div class="form-group">
                            <label>Pesan</label>
                            <textarea class="form-control" id="detailMessage" rows="5" readonly></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <!-- Prism CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bundles/prism/prism.css') }}">
@endsection

@section('js')
    <!-- DataTables JS -->
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Prism JS -->
    <script src="{{ asset('assets/bundles/prism/prism.js') }}"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
@endsection

@section('script')
    <!-- DataTables Initialization -->
    <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table-1').DataTable();

            // Handle detail button click
            $('#detailContactModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let id = button.data('id');

                $.get('/contacts/' + id, function(data) {
                    $('#detailName').val(data.name);
                    $('#detailEmail').val(data.email);
                    $('#detailPhoneNumber').val(data.phone_number);
                    $('#detailMessage').val(data.message);
                }).fail(function() {
                    swal("Error", "Data tidak ditemukan atau terjadi kesalahan", "error");
                });
            });

            // Handle delete button click
            $('.btn-danger').on('click', function() {
                let id = $(this).data('id');
                let action = $(this).data('action');

                swal({
                    title: "Penghapusan Data",
                    text: "Apakah anda yakin ingin menghapus data ini?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'DELETE',
                            url: action,
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    swal("Berhasil", response.message, "success").then(
                                    () => {
                                        location.reload();
                                    });
                                } else {
                                    swal("Error", response.message, "error");
                                }
                            },
                            error: function(xhr) {
                                let errors = xhr.responseJSON.errors;
                                let errorMessage = '';
                                for (let key in errors) {
                                    errorMessage += errors[key][0] + '\n';
                                }
                                swal("Error", errorMessage, "error");
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
