<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Email</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body p-5 text-center">

                    <h2 class="fw-bold mb-3">
                        Verifikasi Email
                    </h2>

                    <p class="text-muted">

                        Kami telah mengirim link verifikasi
                        ke email Anda.

                        Silakan buka email dan klik
                        tombol verifikasi sebelum
                        menggunakan sistem.

                    </p>

                    @if(session('status') == 'verification-link-sent')

                        <div class="alert alert-success">

                            Link verifikasi baru berhasil dikirim.

                        </div>

                    @endif

                    <form method="POST"
                          action="{{ route('verification.send') }}">

                        @csrf

                        <button type="submit"
                                class="btn btn-primary">

                            Kirim Ulang Link Verifikasi

                        </button>

                    </form>

                    <form method="POST"
                          action="{{ route('logout') }}"
                          class="mt-3">

                        @csrf

                        <button type="submit"
                                class="btn btn-outline-danger">

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>