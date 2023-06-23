<?php
session_start();
include_once "webconfig.html";
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Home</title>
    <link rel="stylesheet" href="style.css" media="screen">
    <link rel="stylesheet" href="Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">


    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "",
            "logo": "images/image.png"
        }
    </script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">

    <style>
        .combobox {
            position: relative;
            display: flex;
        }

        .combobox .dropdown {
            display: none;
            position: absolute;
            z-index: 1;
            left: 83.2%;
            width: 160px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .combobox:hover .dropdown {
            display: block;
        }

        .combobox .option {
            display: block;
            padding: 5px;
            text-decoration: none;
            color: #000;
        }

        .combobox .option:hover {
            background-color: #ccc;
        }
    </style>

    <script>
        function openCombobox(element) {
            element.click();
        }
    </script>
</head>

<body data-home-page="Home.html" data-home-page-title="Home" class="u-body u-xl-mode" data-lang="en">
    <header class="u-box-shadow u-clearfix u-header u-header" id="sec-128e" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
        <div class="u-clearfix u-sheet u-sheet-1">
            <a href="index.php" class="u-image u-logo u-image-1" data-image-width="200" data-image-height="188">
                <img src="images/image.png" class="u-logo-image u-logo-image-1">
            </a>
            <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
                <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                    <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                        <svg class="u-svg-link" viewBox="0 0 24 24">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                        </svg>
                        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <rect y="1" width="16" height="2"></rect>
                                <rect y="7" width="16" height="2"></rect>
                                <rect y="13" width="16" height="2"></rect>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="u-custom-menu u-nav-container">
                    <ul class="u-nav u-unstyled u-nav-1">
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 10px 12px;">Home</a>
                        </li>
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="About.html" style="padding: 10px 12px;">Médicos</a>
                        </li>
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Contact.html" style="padding: 10px 12px;">Serviços</a>
                        </li>
                    </ul>
                </div>
                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php">Home</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="About.html">Médicos</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.html">Serviços</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>
            </nav>
            <?php if (isset($_SESSION['idUsuario']) && isset($_SESSION['idPerfil'])) { ?>
                <div class="combobox">
                    <a href="#" class="toggle u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-6 u-btn-1">Minha Conta</a>
                    <div class="dropdown ">
                        <a href="view/perfil.php" class="option">Perfil</a>
                        <?php if ($_SESSION['idPerfil'] == 2) { ?>
                            <a href="view/doctor.php" class="option">Pacientes</a>
                        <?php } else { ?>
                            <a href="view/consultas.php" class="option">Consultas</a>
                        <?php } ?>
                        <a href="Controller/logoutControl.php" class="option">Sair</a>
                    </div>
                </div>
            <?php  } else { ?>
                <a href="VIEW/loginuser.php" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-6 u-btn-1">Login<br></a>
            <?php }  ?>
        </div>
    </header>

    <section class="u-align-center u-clearfix u-image u-shading u-section-1" src="" data-image-width="256" data-image-height="256" id="sec-28ce">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <h1 class="u-text u-text-default u-title u-text-1">Se Cuide</h1>
            <p class="u-large-text u-text u-text-default u-text-variant u-text-2">
                Conecte-se com médicos profissionais de forma rápida e conveniente! Tenha consultas online em nosso site, economizando tempo e garantindo atendimento de qualidade. Sua saúde em boas mãos, a apenas um clique de distância!
            </p>
            <a href="view/consultas.php" class="u-btn u-button-style u-palette-2-base u-btn-1">Consulte-se Agora!</a>
        </div>
    </section>

    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-01eb">
        <div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-small-text u-text u-text-variant u-text-1">She likes to suck and fuck me, fuck and suck me</p>
        </div>
    </footer>
    <section class="u-backlink u-clearfix u-grey-80">

        <p class="u-text">
            <span>© 2023 Todos os direitos reservados. Criado por</span>
        </p>
        <a class="u-link" href="https://github.com/Dukk1" target="_blank">
            <span>Italo</span>
        </a>.

        <p class="u-text">
            <span>Se Cuide. Termos de Uso. Política de Privacidade.</span>
        </p>
    </section>

</body>

</html>