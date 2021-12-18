@extends('layouts.website.app')

@section('content')

<section class="hero-section pt-4 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 pt-5 mb-5 align-self-center">
                <div class="promo pe-md-3 pe-lg-5">
                    <h1 class="headline mb-3 animated bounceIn delay-2">
                        Kezdő költők klubbja <br>
                    </h1>
                    <div class="animated fadeIn  subheadline mb-4">
                        Éld ki kreativitásod &amp; szerezz hírnevet
                    </div>

                    <div class="cta-holder row gx-md-3 gy-3 gy-md-0">
                        <div class="col-12 col-md-auto">
                            <a class="btn btn-primary w-100" href="{{route('register')}}">Regisztráció</a>
                        </div>
                        <div class="col-12 col-md-auto">
                            <a class="btn btn-secondary scrollto w-100" href="#benefits-section">Rólunk</a>
                        </div>
                    </div>

                    <div class="hero-quotes mt-5">
                        <div id="quotes-carousel" class="quotes-carousel carousel slide carousel-fade mb-5"
                            data-bs-ride="carousel" data-bs-interval="8000">
                            <ol class="carousel-indicators">
                                <li data-bs-target="#quotes-carousel" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#quotes-carousel" data-bs-slide-to="1"></li>
                                <li data-bs-target="#quotes-carousel" data-bs-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <blockquote class="quote p-4 theme-bg-light">
                                        "Végre kibírtam élni a kretavitásomat, és még hasznom is lett belőle"
                                    </blockquote>
                                    <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                                        <div class="col-12 col-md-auto text-center text-md-start">
                                            <img class="source-profile" src="images/profiles/profile-1.png" alt="image">
                                        </div>
                                        <div class="col source-info text-center text-md-start">
                                            <div class="source-name">James Doe</div>
                                            <div class="soure-title">Co-Founder, Startup Week</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <blockquote class="quote p-4 theme-bg-light">
                                        "Csak ajánlani bírom a kezdő költők klubbját, ennyien még nem olvasták a
                                        verseimet!"
                                    </blockquote>
                                    <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                                        <div class="col-12 col-md-auto text-center text-md-start">
                                            <img class="source-profile" src="images/profiles/profile-2.png" alt="image">
                                        </div>
                                        <div class="col source-info text-center text-md-start">
                                            <div class="source-name">Jean Doe</div>
                                            <div class="soure-title">Co-Founder, Startup Week</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <blockquote class="quote p-4 theme-bg-light">
                                        "Király! végre egy hely, ahol új költőtársaim szerezeményét is eltudom olvasni"
                                    </blockquote>
                                    <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                                        <div class="col-12 col-md-auto text-center text-md-start">
                                            <img class="source-profile" src="images/profiles/profile-3.png" alt="image">
                                        </div>
                                        <div class="col source-info text-center text-md-start">
                                            <div class="source-name">Andy Doe</div>
                                            <div class="soure-title">Frontend Developer, Company Lorem</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 mb-0 align-self-center">
                <div class="book-cover-holder">
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_yjrdpceb.json"
                        background="transparent" speed="1.5" style="width: 100%; height: auto;" loop autoplay>
                    </lottie-player>
                    <div class="animated bounceIn book-badge d-inline-block shadow">
                        ADJ<br>ÖTLETET
                    </div>
                </div>
                <div class="text-center"><a class="mt-4 pt-4 theme-link scrollto" href="#reviews-section">Nézze meg
                        verses gyüjteményünket</a></div>
            </div>
        </div>
    </div>
</section>

<section id="benefits-section" class="benefits-section theme-bg-light-gradient py-5">
    <div class="container py-5">
        <h2 class="section-heading text-center mb-3 animated bounceIn">Miért regisztrálj?</h2>
        <div class="section-intro single-col-max mx-auto text-center mb-5">Felsoroljuk neked, miket tudunk nyújtani
        </div>
        <div class="row text-center">
            <div class="item col-12 col-md-6 col-lg-4">
                <div data-aos="fade-up-right" class="item-inner p-3 p-lg-4">
                    <div class="item-header mb-3">
                        <div class="item-icon"><i class="fas fa-users"></i></div>
                        <h3 class="item-heading">Regisztrálj ingyenesen</h3>
                    </div>
                    <div class="item-desc">
                        Egy ideig ingyenesen regisztrálhatsz Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Integer blandit consequat consequat.
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" class="item col-12 col-md-6 col-lg-4">
                <div class="item-inner p-3 p-lg-4">
                    <div class="item-header mb-3">
                        <div class="item-icon"><i class="fas fa-share"></i></div>
                        <h3 class="item-heading">Küldd be nekünk versedet</h3>
                    </div>
                    <div class="item-desc">
                        Nem mertél eddig nyilvánosan írni? Orci varius natoque penatibus et magnis dis parturient
                        montes.
                    </div>
                </div>
            </div>
            <div data-aos="fade-up-left" class="item col-12 col-md-6 col-lg-4">
                <div class="item-inner p-3 p-lg-4">
                    <div class="item-header mb-3">
                        <div class="item-icon"><i class="fab fa-rocketchat"></i></div>
                        <h3 class="item-heading">Véleményezzük szerzeményed</h3>
                    </div>
                    <div class="item-desc">
                        Ingyenesen véleményezzük verseidet Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Veniam, atque!
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" class="item col-12 col-md-6 col-lg-4">
                <div class="item-inner p-3 p-lg-4">
                    <div class="item-header mb-3">
                        <div class="item-icon"><i class="fas fa-award"></i></div>
                        <h3 class="item-heading">Kerülj be a költők ligájába</h3>
                    </div>
                    <div class="item-desc">
                        A költők ligájában Orci varius natoque penatibus et magnis dis parturient montes.
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" class="item col-12 col-md-6 col-lg-4">
                <div class="item-inner p-3 p-lg-4">
                    <div class="item-header mb-3">
                        <div class="item-icon"><i class="fas fa-eye"></i></div>
                        <h3 class="item-heading">Érj el megtekintéseket</h3>
                    </div>
                    <div class="item-desc">
                        Sok felhasználó Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam, commodi!
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" class="item col-12 col-md-6 col-lg-4">
                <div class="item-inner p-3 p-lg-4">
                    <div class="item-header mb-3">
                        <div class="item-icon"><i class="fas fa-hand-holding-usd"></i></div>
                        <h3 class="item-heading">Esély egy ingyenes publikációra</h3>
                    </div>
                    <div class="item-desc">
                        Lehetőséged van egy teljeskörű ingyenes publikációra ha Lorem ipsum dolor sit amet.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="reviews-section" class="reviews-section py-5">
    <div class="container">
        <h2 class="section-heading text-center" data-aos="fade-up">Vers ízelítők</h2>
        <div class="section-intro text-center single-col-max mx-auto mb-5" data-aos="fade-up-right">Nézd meg, mit írnak felhasználóink </div>
        <div class="row justify-content-center">
            <div class="item col-12 col-lg-4 p-3 mb-4">
                <div data-aos="zoom-in" class="item-inner theme-bg-light rounded p-4">

                    <blockquote class="quote">
                        "Kiváló versek! Aliquam euismod nunc porta urna facilisis tempor. "
                    </blockquote>
                    <div class="source row gx-md-3 gy-3 gy-md-0">
                        <div class="col-12 col-md-auto text-center text-md-start">
                            <img class="source-profile" src="images/profiles/profile-1.png" alt="image">
                        </div>
                        <div class="col source-info text-center text-md-start">
                            <div class="source-name">Teszt Elek</div>
                            <div class="soure-title">Könyvfanatikus</div>
                        </div>
                    </div>
                    <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
                </div>
            </div>
            <div data-aos="zoom-in" class="item col-12 col-lg-4 p-3 mb-4">
                <div class="item-inner theme-bg-light rounded p-4">
                    <blockquote class="quote">
                        "Nagyon tetszik! Aliquam euismod nunc porta urna facilisis tempor. Praesent mauris neque."
                    </blockquote>
                    <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                        <div class="col-12 col-md-auto text-center text-md-start">
                            <img class="source-profile" src="images/profiles/profile-2.png" alt="image">
                        </div>
                        <div class="col source-info text-center text-md-start">
                            <div class="source-name">Teszt Anna</div>
                            <div class="soure-title">Könyv kritikus</div>
                        </div>
                    </div>

                    <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
                </div>
            </div>
            <div data-aos="zoom-in" class="item col-12 col-lg-4 p-3 mb-4">
                <div class="item-inner theme-bg-light rounded p-4">
                    <blockquote class="quote">
                        "Nagyon jó a közösség adipiscing elit. Pellentesque ac leo turpis. Phasellus imperdiet id ligula
                        tempor imperdiet."
                    </blockquote>
                    <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                        <div class="col-12 col-md-auto text-center text-md-start">
                            <img class="source-profile" src="images/profiles/profile-3.png" alt="image">
                        </div>
                        <div class="col source-info text-center text-md-start">
                            <div class="source-name">Teszt Tamás</div>
                            <div class="soure-title">Könyv kritikus</div>
                        </div>
                    </div>
                    <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
                </div>
            </div>
            <div data-aos="zoom-in" class="item col-12 col-lg-4 p-3 mb-4">
                <div class="item-inner theme-bg-light rounded p-4">
                    <blockquote class="quote">
                        "Populáris adipiscing elit. Pellentesque ac leo turpis. Phasellus imperdiet id ligula tempor
                        imperdiet."
                    </blockquote>
                    <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                        <div class="col-12 col-md-auto text-center text-md-start">
                            <img class="source-profile" src="images/profiles/profile-4.png" alt="image">
                        </div>
                        <div class="col source-info text-center text-md-start">
                            <div class="source-name">Teszt Edina</div>
                            <div class="soure-title">Könyvfanatikus</div>
                        </div>
                    </div>
                    <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
                </div>
            </div>
            <div data-aos="zoom-in" class="item col-12 col-lg-4 p-3 mb-4">
                <div class="item-inner theme-bg-light rounded p-4">
                    <blockquote class="quote">
                        "Végre here consectetur adipiscing elit. Pellentesque ac leo turpis. Phasellus imperdiet id
                        ligula tempor imperdiet."
                    </blockquote>
                    <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                        <div class="col-12 col-md-auto text-center text-md-start">
                            <img class="source-profile" src="images/profiles/profile-5.png" alt="image">
                        </div>
                        <div class="col source-info text-center text-md-start">
                            <div class="source-name">Teszt Béla</div>
                            <div class="soure-title">Kezdő író, költő</div>
                        </div>
                    </div>
                    <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-primary" href="{{route('register')}}">Regisztrálok</a>
        </div>
    </div>
</section>

<section id="author-section" class="author-section section theme-bg-primary py-5">
    <div class="container py-3">
        <h2 class="section-heading text-center text-white mb-3">Miért készült ez az oldal?</h2>
        <div class="author-bio single-col-max mx-auto">
            <p class="text-center">Portfólióba teljesen jó lesz</p>
        </div>
    </div>
</section>

<script>
    AOS.init();
</script>
@endsection