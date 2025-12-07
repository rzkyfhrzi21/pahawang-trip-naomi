<!-- load stylesheets -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> <!-- Google web font "Open Sans" -->
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> <!-- Font Awesome -->
<link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap style -->
<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="slick/slick.css" />
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
<link rel="stylesheet" href="css/templatemo-style.css"> <!-- Templatemo style -->
<style>
    /* Styling untuk ikon WhatsApp */
    #whatsapp-icon {
        position: fixed;
        /* Menempatkan elemen di posisi tetap */
        bottom: 20px;
        /* Jarak dari bawah */
        right: 20px;
        /* Jarak dari kanan */
        z-index: 9999;
        /* Pastikan di atas elemen lain */
        animation: floating 2s ease-in-out infinite;
        /* Efek animasi mengambang */
    }

    #whatsapp-icon img {
        width: 60px;
        /* Ukuran ikon WhatsApp */
        height: 60px;
        border-radius: 50%;
        /* Membuat ikon berbentuk bulat */
    }

    /* Animasi untuk efek mengambang */
    @keyframes floating {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
            /* Ikon naik sedikit */
        }

        100% {
            transform: translateY(0);
        }
    }
</style>