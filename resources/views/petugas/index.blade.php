@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="header-body">
                <div class="row">
                    <div class="col-md-6 mt-4 mb-2">
                        <a class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#tambahPetugas"> Tambah
                            Petugas</a>
                    </div>
                    <div class="col-md-6 mt-4 mb-3 d-flex justify-content-end">
                        <!-- Search form -->
                        <form action="{{ route('petugas.search') }}" method="get"
                            class="navbar-search navbar-search-light form-inline mr-sm-3 " id="navbar-search-main">

                            <input type="text" placeholder="masukkan pencarian" class="form-control bg-white"
                                name="q" id="q">
                                @if(request()->has('q'))
                                <div class="input-group-append">
                                    <a href="{{ route('petugas.index') }}" class="btn btn-danger" type="button">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>
                                        @endif
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>

                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="my-3 text-center">{{ $title }}</h3>
                                <div class="success" data-flash="{{ session()->get('success') }}"></div>

                            </div>
                            <!-- Light table -->
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="Judul">Nama</th>
                                            <th scope="col" class="sort" data-sort="Email">Email</th>
                                            <th scope="col" class="sort" data-sort="Level">Level</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach ($petugas as $item)
                                            <tr>
                                                <th scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            @if ($item->gambar)
                                                                <img class="avatar rounded-circle" src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->name }}" />
                                                            @else
                                                                <!-- Avatar default jika tidak ada gambar -->
                                                                <img class="avatar rounded-circle" src="{{ asset('template/img/avatar/default.jpeg') }}" alt="Default Avatar" />
                                                            @endif
                                                            <span class="name mb-0 text-sm ml-2">{{ $item->name }}</span>
                                                        </div>
                                                        
                                                    </div>
                                                </th>
                                                <td class="budget">
                                                    {{ $item->email }}
                                                </td>
                                                <td class="budget">
                                                    {{ $item->level }}
                                                </td>

                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <button class="dropdown-item btn-detail"
                                                                data-target="#detailPetugas" data-toggle="modal"
                                                                data-id="{{ $item->id }}">Detail</button>

                                                            <button class="dropdown-item btn-edit" data-toggle="modal"
                                                                data-target="#editPetugas"
                                                                data-id="{{ $item->id }}">Edit</button>

                                                            <form action="{{ route('petugas.destroy', $item->id) }}"
                                                                method="post" id="delete{{ $item->id }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="dropdown-item" type="button"
                                                                    onclick="deletePetugas({{ $item->id }})">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>


                                </table>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer py-4">
                                <nav aria-label="...">

                                    @if ($petugas->lastPage() != 1)
                                        <ul class="pagination justify-content-end mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="{{ $petugas->previousPageUrl() }}"
                                                    tabindex="-1">
                                                    <i class="fas fa-angle-left"></i>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            @for ($i = 1; $i <= $petugas->lastPage(); $i++)
                                                <li class="page-item {{ $i == $petugas->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $petugas->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $petugas->nextPageUrl() }}">
                                                    <i class="fas fa-angle-right"></i>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    @endif
                                    @if (count($petugas) == 0)
                                        <div class="text-center" colspan="4"> Tidak ada data!</div>
                                    @endif
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('modal')
    {{-- Modal add Petugas  --}}
    <div class="modal fade" id="tambahPetugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('petugas.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        {{-- <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ old('username') }}"
                                autocomplete="off">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="">Email address</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Petugas</label>
                            <select name="level" class="form-control">
                                <option disabled selected>-- Pilih Petugas --</option>
                                    <option value="admin"> Admin</option>
                                    <option value="user"> User</option>
                            </select>
                            @error('level')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <img id="preview" src="" alt="Preview" width="150" height="150">
                            <input type="file" name="gambar" id="gambar" class="uploads form-control mt-2" value="{{ old('gambar') }}" onchange="previewImage()">
                            @error('gambar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Detail Petugas  --}}
    <div class="modal fade" id="detailPetugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content  mt-5">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Edit Petugas  --}}
    <div class="modal fade" id="editPetugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content  mt-5">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Petuagas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const APP_URL = '{{ env('APP_URL') }}'
        // console.log(APP_URL)
        //delete petugas
        function deletePetugas(id) {
            Swal.fire({
                title: 'PERINGATAN!',
                text: "Yakin ingin menghapus Petugas?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancle',
            }).then((result) => {
                if (result.value) {
                    $('#delete' + id).submit();
                }
            })
        }


        $(document).ready(function() {

            //detail petugas
            $('.btn-detail').click(function() {

                let id = $(this).data('id');
                $.ajax({
                    url: `${APP_URL}/petugas/${id}`,
                    method: 'GET',
                    success: function(data) {
                        $('#detailPetugas').find('.modal-body').html(data);
                        $('#detailPetugas').show();

                    }
                })
            })

            //edit petugas
            $('.btn-edit').click(function() {

                let id = $(this).data('id');
                console.log(id)
                $.ajax({
                    url: `${APP_URL}/petugas/${id}/edit`,
                    method: 'GET',
                    success: function(data) {

                        $('#editPetugas').find('.modal-body').html(data);
                        $('#editPetugas').show();
                        $('#loader').show();
                    }
                })
            })
            // session delete petugas 
            let success = $('.success').data('flash');
            if (success) {
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: success,
                    showConfirmButton: false,
                    timer: 2000
                })
            }

            //cari petugas
            let route = "{{ route('petugas.search') }}"


        })
        function previewImage() {
        var input = document.getElementById('gambar');
        var preview = document.getElementById('preview');

        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
    </script>
@endpush
