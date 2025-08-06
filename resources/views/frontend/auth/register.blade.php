@extends('frontend.layout')

@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="login-register container">
            <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link nav-link_underscore active" id="register-tab" data-bs-toggle="tab"
                        href="#tab-item-register" role="tab" aria-controls="tab-item-register"
                        aria-selected="true">Buat Akun Baru</a>
                </li>
            </ul>
            <div class="tab-content pt-2" id="login_register_tab_content">
                <div class="tab-pane fade show active" id="tab-item-register" role="tabpanel"
                    aria-labelledby="register-tab">
                    <div class="register-form">
                        <form method="POST" action="{{ route('register') }}" class="needs-validation">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" required
                                    class="form-control form-control_gray @error('first_name') is-invalid @enderror"
                                    name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus
                                    placeholder="Nama Depan">
                                <label for="nama_depan">Nama Depan *</label>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" required
                                    class="form-control form-control_gray @error('last_name') is-invalid @enderror"
                                    name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus="true"
                                    placeholder="Nama Belakang">
                                <label for="nama_belakang">Nama Belakang *</label>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="pb-3"></div>
                            <div class="form-floating mb-3">
                                <input id="email" required type="email"
                                    class="form-control form-control_gray @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Alamat E-mail">
                                <label for="email">Alamat E-mail *</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input id="password" required type="password"
                                    class="form-control form-control_gray @error('password') is-invalid @enderror"
                                    name="password" autocomplete="new-password" placeholder="Kata Sandi">
                                <label for="password">Kata Sandi *</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input id="password-confirm" required type="password" class="form-control form-control_gray"
                                    name="password_confirmation" autocomplete="new-password" placeholder="Confirm password">
                                <label for="password">Ulangi Kata Sandi *</label>
                            </div>

                            <div class="d-flex align-items-center mb-3 pb-2">
                                <p class="m-0">
                                    Membuat akun baru berarti bahwa Anda menyetujui segala peraturan dan ketentuan yang berlaku di website ini,
                                    dan data Anda kemungkinan akan digunakan untuk kepentingan website ini sebagaimana mestinya.
                                </p>
                            </div>

                            <button class="btn btn-primary w-100 text-uppercase" type="submit">Buat Akun</button>

                            <div class="customer-option mt-4 text-center">
                                <span class="text-secondary">Sudah punya akun?</span>
                                <a href="{{ route('login') }}" class="btn-text js-show-register">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
