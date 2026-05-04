<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/f.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <title>Oficina VW</title>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg px-4 bg-danger ">
            <img src="{{ asset('img/Logo.png') }}" alt="Logo da oficina" height="80">
            <div class="d-flex gap-3 align-items-center ms-auto">
                <a href="#servicos" class="nav-link fw-bold text-white">Serviços</a>
                <a href="#localContato" class="nav-link fw-bold text-white">Localização\Contato</a>
                <a href="{{ route('login') }}" class="btn btn-light fw-bold">Área ADM</a>
            </div>
        </nav>
    </header>

    <main>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/oficina1.png') }}" class="d-block w-100 carousel-img">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/oficina2.png') }}" class="d-block w-100 carousel-img">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/oficina3.png') }}" class="d-block w-100 carousel-img">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/oficina4.png') }}" class="d-block w-100 carousel-img">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <section id="servicos" class="container text-center my-5">
            <h2 class="text-danger mb-4">Serviços Realizados</h2>

            <div class="row g-4 justify-content-center">
                <div class="col-md-3">
                    <div class="card p-3 service">
                        <h5>Troca de Óleo</h5>
                        <p>Manutenção completa do motor.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card p-3 service">
                        <h5>Alinhamento</h5>
                        <p>Mais estabilidade e segurança.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card p-3 service">
                        <h5>Freios</h5>
                        <p>Revisão completa.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card p-3 service">
                        <h5>Suspensão</h5>
                        <p>Conforto e segurança.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card p-3 service">
                        <h5>Diagnóstico</h5>
                        <p>Scanner completo.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card p-3 service">
                        <h5>Motor</h5>
                        <p>Revisão completa.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="localContato" class="bg-dark text-white py-5">
            <div class="container">
                <div class="row justify-content-center g-4">
                    <div class="col-md-4">
                        <div class="card h-100 text-center bg-dark text-white border-2 border-light rounded-4">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h2 class="card-title">Contato</h2>
                                    <p>📞 (55) 99999-9999</p>
                                    <p>📧 oficinavw@gmail.com</p>
                                </div>
                                <a href="https://wa.me/5555999999999" target="_blank"
                                    class="btn btn-success rounded-pill mt-3">
                                    Conversar no WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 text-center bg-dark text-white border-2 border-light rounded-4">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h2 class="card-title">Localização</h2>
                                    <p>📍 São Vicente do Sul - RS</p>
                                </div>
                                <a href="https://www.google.com/maps/search/?api=1&query=São+Vicente+do+Sul+RS"
                                    target="_blank" class="btn btn-primary rounded-pill mt-3">
                                    Ver no Maps
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
    <hr class="my-0">

    <footer class="text-center bg-dark text-white py-3">
        <p>&copy; 2026 Oficina VW. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>