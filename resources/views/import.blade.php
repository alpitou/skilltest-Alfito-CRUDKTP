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
            <h3 id="import-data-title" class="text-link">IMPORT DATA</h3>
                <div class="card text-center">
                    <div class="card-body">
                        <p class="card-text ">Pastikan file yang diupload adalah file .CSV</p>
                        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control mx-auto mb-2" type="file" name="file" accept=".csv" style="max-width: 280px">
                            <button class="btn my-btn" type="submit">Import CSV</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@include('./partials/footer')    
@endsection