@extends('admin.layouts.index')

@section('title', 'Data Menu')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Menu</h4>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addMenuModal">
                        Tambah Data
                    </button>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">Index</th>
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $index => $menu)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td><img src="{{ Storage::url($menu->picture) }}" alt="{{ $menu->name }}"
                                                width="50"></td>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->price }}</td>
                                        <td>{{ $menu->category }}</td>
                                        <td>
                                            <a href="#" class="btn btn-icon btn-info" data-toggle="modal"
                                                data-target="#detailMenuModal" data-id="{{ $menu->id }}"><i
                                                    class="fas fa-info-circle"></i></a>
                                            <a href="#" class="btn btn-icon btn-primary" data-toggle="modal"
                                                data-target="#editMenuModal" data-id="{{ $menu->id }}"><i
                                                    class="far fa-edit"></i></a>
                                            <a href="#" class="btn btn-icon btn-danger" data-id="{{ $menu->id }}"
                                                data-action="{{ route('menus.destroy', $menu->id) }}"><i
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
    <!-- Modal for adding menu -->
    <div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Tambah Data Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addMenuForm" action="{{ route('menus.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Picture</label>
                            <input type="file" class="form-control" name="picture" required>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category" required>
                                <option value="" disabled selected>Select Category</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Western">Western</option>
                                <option value="Local">Local</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for editing menu -->
    <div class="modal fade" id="editMenuModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Edit Data Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editMenuForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Picture</label>
                            <input type="file" class="form-control" name="picture">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id="editName" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" id="editPrice" required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category" id="editCategory" required>
                                <option value="" disabled>Select Category</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Western">Western</option>
                                <option value="Local">Local</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for detail menu -->
    <div class="modal fade" id="detailMenuModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Detail Data Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Picture</label>
                            <img id="detailPicture" src="" alt="Picture" width="100">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="detailName" readonly>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" id="detailPrice" readonly>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" id="detailCategory" readonly>
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

            // Handle add menu form submission
            $('#addMenuForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            swal("Berhasil", "Data berhasil ditambahkan", "success").then(
                                () => {
                                    location.reload();
                                });
                        } else {
                            swal("Error", response.message, "error");
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr); // Log error response to the console
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';
                        for (let key in errors) {
                            errorMessage += errors[key][0] + '\n';
                        }
                        swal("Error", errorMessage, "error");
                    }
                });
            });

            // Handle edit button click
            $('#editMenuModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let id = button.data('id');

                $.get('/menus/' + id, function(data) {
                    $('#editMenuForm').attr('action', '/menus/' + id);
                    $('#editName').val(data.name);
                    $('#editPrice').val(data.price);
                    $('#editCategory').val(data.category);
                });
            });

            // Handle edit menu form submission
            $('#editMenuForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            swal("Berhasil", "Data berhasil diperbarui", "success").then(() => {
                                location.reload();
                            });
                        } else {
                            swal("Error", response.message, "error");
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr); // Log error response to the console
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';
                        for (let key in errors) {
                            errorMessage += errors[key][0] + '\n';
                        }
                        swal("Error", errorMessage, "error");
                    }
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
                                    swal("Berhasil", "Data berhasil dihapus", "success")
                                        .then(() => {
                                            location.reload();
                                        });
                                } else {
                                    swal("Error", response.message, "error");
                                }
                            }
                        });
                    }
                });
            });

            // Handle detail button click
            $('#detailMenuModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let id = button.data('id');

                $.get('/menus/' + id, function(data) {
                    $('#detailPicture').attr('src', '/storage/' + data.picture);
                    $('#detailName').val(data.name);
                    $('#detailPrice').val(data.price);
                    $('#detailCategory').val(data.category);
                }).fail(function() {
                    swal("Error", "Data tidak ditemukan atau terjadi kesalahan", "error");
                });
            });
        });
    </script>
@endsection
