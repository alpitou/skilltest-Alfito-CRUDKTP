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
                <div class="my-card-header">
                <h3 id="tambah-data-title" class="text-link">TAMBAH DATA</h3>
                    <form action="/create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-1">
                                <label for="photo" class="col-form-label">Foto:</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                            <div class="mb-1">
                                <label for="nik" class="col-form-label">NIK:</label>
                                <input type="text" class="form-control" id="nik" name="nik">
                            </div>
                            <div class="mb-1">
                                <label for="name" class="col-form-label">Nama:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-1">
                                <label for="gender" class="col-form-label">Jenis Kelamin:</label>
                                <select class="form-select" aria-label="Default select example" id="gender" name="gender">
                                    <option value="" disabled selected hidden>Pilih salah satu</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="datepicker" class="col-form-label">Tanggal Lahir:</label>
                                <input class="form-control" type="text" id="datepicker" name="birthdate">
                            </div>
                            <div class="mb-1">
                                <label for="address" class="col-form-label">Alamat:</label>
                                <textarea class="form-control" type="text" id="address" name="address"></textarea>
                            </div>
                            <div class="mb-1">
                                <label for="religion" class="col-form-label">Agama:</label>
                                <select class="form-select" aria-label="Default select example" id="religion" name="religion">
                                    <option value="" disabled selected hidden>Pilih salah satu</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="profession" class="col-form-label">Pekerjaan:</label>
                                <input type="text" class="form-control" id="profession" name="profession" >
                            </div>
                        </div>

                        <div class="mt-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2 border-0" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn my-btn">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('./partials/footer')
@endsection
            
