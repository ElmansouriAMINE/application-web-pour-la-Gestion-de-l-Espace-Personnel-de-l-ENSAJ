
{{-- @include('layouts.app') --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESPACE PERSONNEL DE ENSAJ</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>
<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/images.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Mot de passe oublié</h1>
                    <p class="auth-subtitle mb-5">Entrez votre email et nous vous enverrons le lien de réinitialisation du mot de passe.</p>
                    @if (session('message'))
                        <div class="text-success text-center" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <br>
                    <form class="md-float-material" method="POST" action="/forget-password">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} " placeholder="Email Address">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Envoyer</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Vous souvenez de votre compte ? <a href="{{ route('login') }}" class="font-bold">Connexion</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>

</body>
</html>
