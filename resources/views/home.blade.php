@extends('./layouts/main')
@section('view')
    @include('./partials/navbar')
    <div class="container py-4">
        <div class="card rounded-4 p-3">
            @if ($errors->any())
                <div class="alert my-alert p-2" role="alert">
                    @foreach ($errors->all() as $error)
                        <small>{{ $error }}</small><br>
                    @endforeach
                </div>
            @endif
            <div class="card-body">
    <div class="my-card-header d-flex align-items-center">
        <h3 id="data-ktp-title" class="text-link">DATA KTP</h3>
        
        <div class="search-bar mb-3 ms-auto">
            <form action="/home" method="GET" class="d-flex" role="search">
                @csrf
                <input class="form-control me-2 search-input" type="search" 
                       placeholder="Cari nama atau nik" aria-label="Search" name="keyword">
                <button class="btn search-btn" type="submit">
                    <i class="fas fa-search search-icon"></i>
                </button>
            </form>
        </div>
    </div>

    <h5 class="login-info">Login sebagai : 
        <span class="text-link">{{ Auth::user()->role->name }}</span>
    </h5>
</div>



                <div class="table-responsive">
                    <table class="table mt-3 table-transparent">
                        <thead>
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tanggal lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">Aksi</th>
                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                    <img src="{{ Storage::url($item->image_path) }}" alt="foto" class="resident-picture" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal{{ $item->id }}">
                                    </td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->birthdate)->age }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->birthdate }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->religion }}</td>
                                    <td>{{ $item->profession }}</td>
                                    <td class="text-center">
                                    @if (auth()->user()->role_id != 2) <!-- Hanya tampil jika role_id admin -->
                                        <button type="button" class="btn my-btn2 mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}" style="width: 100%;">
                                            Hapus
                                        </button>
                                        <button type="button" class="btn my-btn2 mb-1" data-bs-toggle="modal" data-bs-target="#modalEdit{{$item->id}}" style="width: 100%;">
                                            Edit
                                        </button>
                                    @endif
                                        <a href="/export-pdf/{{ $item->id }}">
                                            <div class="btn my-btn2 mb-1" style="width: 100%;">
                                                Export PDF
                                            </div>
                                        </a>
                                        <a href="/export-csv/{{ $item->id }}">
                                            <div class="btn my-btn2" style="width: 100%;">
                                                Export CSV
                                            </div>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal Image Pop-up -->
                                <div class="modal fade" id="imageModal{{ $item->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel">Foto {{ $item->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                            <img src="{{ Storage::url($item->image_path) }}" alt="foto besar" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm"> 
                                        <div class="modal-content text-center p-4">
                                        <div class="modal-header d-block border-0">
                                            <h5 class="modal-title fs-5 fw-bold" id="exampleModalLabel" style="font-size: 24px;">Warning!</h5> 
                                        </div>
                                            <div class="modal-body">Yakin untuk menghapus?</div>
                                        <div class="modal-footer border-0 justify-content-center">
                                            <form action="/resident/{{$item->id}}/delete" method="POST">
                                        @csrf
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn" style="background-color: #ff1493; color: white;">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="modalEdit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="max-width: 65%;">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/resident/{{$item->id}}/update" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-1">
                                                    <label for="photo" class="col-form-label">Foto:</label>
                                                    <input type="file" class="form-control" id="photo" name="photo" >
                                                </div>
                                                <div class="mb-1">
                                                    <label for="nik" class="col-form-label">NIK:</label>
                                                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $item->nik }}">
                                                </div>
                                                <div class="mb-1">
                                                    <label for="name" class="col-form-label">Nama:</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                                                </div>
                                                <div class="mb-1">
                                                    <label for="gender" class="col-form-label">Jenis Kelamin:</label>
                                                    <select class="form-select" aria-label="Default select example" name="gender" id="gender">
                                                        <option value="{{ $item->gender }}" >{{ $item->gender }}</option>
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <label for="datepicker" class="col-form-label">Tanggal Lahir:</label>
                                                    <input class="form-control" type="text" id="datepicker" name="birthdate" value="{{ $item->birthdate }}">
                                                </div>
                                                <div class="mb-1">
                                                    <label for="address" class="col-form-label">Alamat:</label>
                                                    <textarea class="form-control" type="text" id="address" name="address">{{ $item->address }}</textarea>
                                                </div>
                                                <div class="mb-1">
                                                    <label for="religion" class="col-form-label">Agama:</label>
                                                    <select class="form-select" aria-label="Default select example" id="religion" name="religion">
                                                        <option value="{{ $item->religion }}">{{ $item->religion }}</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Buddha">Buddha</option>
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <label for="profession" class="col-form-label">Pekerjaan:</label>
                                                    <input type="text" class="form-control" id="profession" name="profession" value="{{ $item->profession }}">
                                                </div>
                                            </div>
        
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn" style="background-color: #ff1493; color: white;">Edit</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="my-custom-pagination-style">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div> 
    
    @include('./partials/footer')
@endsection
