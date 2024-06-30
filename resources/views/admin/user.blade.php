@extends('admin.layouts.index')

@section('title', 'Data User')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pelanggan</h4>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addUserModal">
                        Tambah Data
                    </button>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">Index</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Date of Birth</th>
                                    <th>Role</th>
                                    <th>Preferences</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->date_of_birth }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            @foreach ($user->preferences as $preference)
                                                {{ $preference->name }}@if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-icon btn-info" data-toggle="modal"
                                                data-target="#detailUserModal" data-id="{{ $user->id }}"><i
                                                    class="fas fa-info-circle"></i></a>
                                            <a href="#" class="btn btn-icon btn-primary" data-toggle="modal"
                                                data-target="#editUserModal" data-id="{{ $user->id }}"><i
                                                    class="far fa-edit"></i></a>
                                            <a href="#" class="btn btn-icon btn-danger" data-id="{{ $user->id }}"
                                                data-action="{{ route('users.destroy', $user->id) }}"><i
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
    <!-- Modal for adding user -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Tambah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role" required>
                                <option value="" disabled selected>Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="pelanggan">Pelanggan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for editing user -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Edit Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id="editName" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="editEmail" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" id="editPassword">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" id="editPhoneNumber"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" id="editAddress" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="editDateOfBirth"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role" id="editRole" required>
                                <option value="" disabled>Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="pelanggan">Pelanggan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for detail user -->
    <div class="modal fade" id="detailUserModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Detail Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="detailName" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="detailEmail" readonly>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" id="detailPhoneNumber" readonly>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" id="detailAddress" rows="3" readonly></textarea>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="text" class="form-control" id="detailDateOfBirth" readonly>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" class="form-control" id="detailRole" readonly>
                        </div>
                        <div class="form-group">
                            <label>Preferensi</label>
                            <input type="text" class="form-control" id="detailPreferences" readonly>
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

            // Handle add user form submission
            $('#addUserForm').on('submit', function(e) {
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
            $('#editUserModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let id = button.data('id');

                $.get('/users/' + id, function(data) {
                    $('#editUserForm').attr('action', '/users/' + id);
                    $('#editName').val(data.name);
                    $('#editEmail').val(data.email);
                    $('#editPhoneNumber').val(data.phone_number);
                    $('#editAddress').val(data.address);
                    $('#editDateOfBirth').val(data.date_of_birth);
                    $('#editRole').val(data.role);
                });
            });

            // Handle edit user form submission
            $('#editUserForm').on('submit', function(e) {
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

            // Handle detail button click
            $('#detailUserModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let id = button.data('id');

                $.get('/users/' + id, function(data) {
                    $('#detailName').val(data.name);
                    $('#detailEmail').val(data.email);
                    $('#detailPhoneNumber').val(data.phone_number);
                    $('#detailAddress').val(data.address);
                    $('#detailDateOfBirth').val(data.date_of_birth);
                    $('#detailRole').val(data.role);

                    let preferences = data.preferences.map(p => p.name).join(', ');
                    $('#detailPreferences').val(preferences);
                }).fail(function() {
                    swal("Error", "Data tidak ditemukan atau terjadi kesalahan", "error");
                });
            });
        });
    </script>
@endsection
