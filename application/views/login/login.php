<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $judul; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="BPNT Kedungwaringin">
    <meta name="description" content="Bantuan Pangan Non Tunai">
    <meta name="author" content="diskominfo">
    <meta property="og:site_name" content="Pendaatan Penyandang Masalah Kesejahteraan Sosial (PPKS)" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta property="og:title" content="PPKS Kabupaten Karawang" />
    <meta property="og:description" content="Bantuan Pangan Non Tunai" />
    <link rel="shortcut icon" href="<?= base_url() ?>assets/login/img/logo-kedungwaringin.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">


</head>

<body>
    <img class="wave" src="<?= base_url() ?>assets/login/img/wave-green.png" alt="wave">
    <div class="container">
        <div class="img">
            <img src="<?= base_url() ?>assets/login/img/pic-login-desa.svg" alt="background">
        </div>
        <div class="login-content">
            <form method="post" autocomplete="off" id="loginForm">
                <img src="<?= base_url() ?>assets/login/img/logo-kedungwaringin.png" alt="logo">
                <h2 class="title text-muted">Selamat Datang</h2>
                <h3 class="text-muted">Operator Desa</h3>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" id="nama_pengguna" name="nama_pengguna">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" id="katasandi" name="katasandi">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn" id="Login">Masuk</button>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="<?= base_url(); ?>assets/login/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/login/js/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/login/js/main.js"></script>
    <script>
        $('#loginForm').submit(function(e) {
            e.preventDefault()
            login_process();
        });
        $("#nama_pengguna").keyup(function(event) {
            $(".one").removeClass("alert-validate");
            $(".one").addClass("input-div");
            $("#nama_pengguna").val($('#nama_pengguna').val().replace(/['"]/g, ''));
            if (event.keyCode == 13) {
                login_process();
            }
        });
        $("#katasandi").keyup(function(event) {
            $(".pass").removeClass("alert-validate");
            $(".pass").addClass("input-div");
            $("#katasandi").val($('#katasandi').val().replace(/['"]/g, ''));
            if (event.keyCode == 13) {
                login_process();
            }
        });

        function login_process() {
            let user = $('#nama_pengguna').val();
            let pass = $('#katasandi').val();
            if (user.length == 0) {
                $(".one").removeClass("input-div");
                $(".one").addClass("alert-validate focus");
                $("#nama_pengguna").focus();
                return false;
            }
            if (pass.length == 0) {
                $(".pass").removeClass("input-div");
                $(".pass").addClass("alert-validate focus");
                $("#katasandi").focus();
                return false;
            }
            cek_captcha();

        }

        function cek_captcha() {
            let user = $('#nama_pengguna').val();
            let pass = $('#katasandi').val();

            $.ajax({
                url: '<?= base_url() ?>Auth/cek_login',
                type: 'POST',
                data: new FormData(document.getElementById("loginForm")),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == 1) {
                        success_alert("Berhasil", data.msg, data.url);
                    } else {
                        error_alert("Gagal", data.msg);
                        grecaptcha.reset();
                    }
                }
            });
        }
    </script>
    <script>
        function success_alert_confirm(title, msg) {
            Swal.fire({
                icon: 'success',
                title: title,
                text: msg,
                timer: 1500,
                footer: 'BPNT KEDUNGWARINGIN',
                showCancelButton: false,
                showConfirmButton: false
            })
        }

        function success_alert(title, msg, page) {
            Swal.fire({
                icon: 'success',
                title: title,
                text: msg,
                timer: 1500,
                footer: 'BPNT KEDUNGWARINGIN',
                showCancelButton: false,
                showConfirmButton: false
            }).then(function() {
                window.location = "<?= base_url() ?>" + page;
            })
        }

        function error_alert(title, msg) {
            Swal.fire({
                icon: 'error',
                title: title,
                text: msg,
                footer: 'BPNT KEDUNGWARINGIN'
            })
        }
    </script>
</body>

</html>