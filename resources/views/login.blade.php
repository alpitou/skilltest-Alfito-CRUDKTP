@extends('./layouts/main')
@section('view')
<div class="login-container d-flex align-items-center min-height-100vh">
    <div class="card p-2 mx-auto rounded-5">
        <div class="card-body">
            <h2 class="text-center mb-3">Login</h2>
            @if ($errors->any())
                <div class="alert my-alert p-2" role="alert">
                    @foreach ($errors->all() as $error)
                        <small>{{ $error }}</small><br>
                    @endforeach
                </div>
            @endif
            <form action="/login" method="POST" class="mb-3">
                @csrf
                <div class="mb-2">
                    <label for="username">Username</label>
                    <input type="text" class="form-control rounded-5" id="username" name="username" value="{{ old('username') }}">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control rounded-5" id="password" name="password">
                </div>
                <button type="submit" class="btn my-btn rounded-5" style="width: 100%;">LOGIN</button>
            </form>
            <hr>
            <p>Belum punya akun? Silahkan <a class="text-link" href="/register">Register</a></p>
        </div>
    </div>
</div>
@endsection