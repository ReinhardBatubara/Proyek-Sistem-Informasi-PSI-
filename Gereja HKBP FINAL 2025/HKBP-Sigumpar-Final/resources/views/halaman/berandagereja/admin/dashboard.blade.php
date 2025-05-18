<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="page-wrapper">
        <!-- HERO -->
        <section class="hero">
            <div class="hero-content">
                <img src="/images/LOGO HKBP.png" alt="Logo HKBP" class="logo" />
                <p class="church-name">HKBP DR I.L.Nommensen Sigumpar</p>
                <p class="ayat">
                    Lalu Ia berkata kepada mereka<br />
                    <q>“Pergilah ke seluruh dunia, beritakanlah Injil kepada segala makhluk”.</q><br />
                    <em>Markus 16:15</em>
                </p>
                <h3 class="cta">Jadilah bagian jemaat dalam gereja kami</h3>
            </div>
            <div class="hero-image">
                <img src="/images/yesus_chiby.jpeg" alt="Jesus Character" />
            </div>
        </section>

        <!-- Profil Pendeta -->
        <section class="pastor-profile">
            <h2>Profil Pendeta</h2>
            <div class="profile-container">
                <div class="photo">
                    <img src="/images/Pendeta.jpg" alt="Foto Pendeta" />
                </div>
                <div class="info">
                    <h3>Pdt. Jonni D.S.Tambun,S.Th</h3>
                    <p><strong>Jabatan:</strong> Kepala Pendeta Gereja HKBP DR. IL. Nommensen Sigumpar</p>
                    <p>
                        Pdt. Jonni D.S.Tambun,S.Th adalah seorang pendeta berpengalaman yang memimpin komunitas dengan
                        penuh kasih dan dedikasi. Beliau aktif dalam pelayanan rohani dan pengembangan gereja serta
                        keterlibatan sosial masyarakat.
                    </p>
                </div>
            </div>

            <h2>Lokasi Gereja</h2>
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.189042659229!2d99.15482971526766!3d2.3948522523934147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0059f78cc793%3A0x37e26becd0b5a454!2sGereja%20HKBP%20DR.%20IL.%20Nommensen%20Sigumpar!5e0!3m2!1sid!2sid!4v1684417912345!5m2!1sid!2sid"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        Upcoming Events with CRUD
        <section class="upcoming-event">
            <h2>Upcoming Events</h2>

            <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-4">Tambah Event Baru</a>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <div class="carousel-wrapper">
                <button class="arrow left" onclick="moveSlide(-1)">&#10094;</button>

                <div class="carousel" id="carousel">
                    @foreach ($events as $index => $event)
                    <div class="card @if($index == 0) active @endif">
                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}">
                        <div class="info">
                            <h3>{{ $event->title }}</h3>
                            <p>{{ Str::limit($event->description, 150) }}</p>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus event ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>

                <button class="arrow right" onclick="moveSlide(1)">&#10095;</button>
            </div>

            <div class="indicators" id="indicators">
                @foreach ($events as $index => $event)
                    <span onclick="goToSlide({{ $index }})" class="dot @if($index == 0) active @endif"></span>
                @endforeach
            </div>
        </section>

        <!-- Documentation with CRUD -->
        <section class="documentation">
            <h2>Documentation</h2>

            <a href="{{ route('documentations.create') }}" class="btn btn-primary mb-4">Tambah Dokumentasi Baru</a>

            <div class="doc-gallery">
                @foreach ($documentations as $doc)
                <div class="doc-item">
                    <img src="{{ asset('storage/' . $doc->image_path) }}" alt="{{ $doc->title }}" />
                    <p>{{ $doc->title }}</p>
                    <a href="{{ route('documentations.edit', $doc->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('documentations.destroy', $doc->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus dokumentasi ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>

    <script>
        let currentIndex = 0;
        const cards = document.querySelectorAll('.carousel .card');
        const dots = document.querySelectorAll('.dot');

        function updateActiveCard() {
            cards.forEach((card, i) => {
                card.classList.toggle('active', i === currentIndex);
            });
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentIndex);
            });
        }

        function moveSlide(step) {
            currentIndex += step;
            if (currentIndex < 0) currentIndex = cards.length - 1;
            if (currentIndex >= cards.length) currentIndex = 0;
            updateActiveCard();
        }

        function goToSlide(index) {
            currentIndex = index;
            updateActiveCard();
        }

        window.addEventListener('load', () => {
            updateActiveCard();
        });
    </script>

    <style>
        /* Tombol */
        .btn {
            padding: 0.35rem 0.75rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            display: inline-block;
            text-align: center;
            border: none;
        }
        .btn-primary {
            background-color: #005bbb;
            color: white;
        }
        .btn-primary:hover {
            background-color: #004499;
        }
        .btn-warning {
            background-color: #f0ad4e;
            color: white;
        }
        .btn-warning:hover {
            background-color: #ec971f;
        }
        .btn-danger {
            background-color: #d9534f;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c9302c;
        }

        /* Carousel */
        .carousel-wrapper {
            position: relative;
            max-width: 900px;
            margin: auto;
        }
        .carousel {
            display: flex;
            overflow: hidden;
            position: relative;
        }
        .carousel .card {
            min-width: 100%;
            display: none;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            border-radius: 10px;
            overflow: hidden;
            background: white;
            padding: 1rem;
        }
        .carousel .card.active {
            display: block;
        }
        .carousel .card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 6px;
        }
        .info {
            padding-top: 0.75rem;
        }
        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0,0,0,0.3);
            border: none;
            color: white;
            font-size: 2rem;
            padding: 0 0.5rem;
            cursor: pointer;
            border-radius: 3px;
            user-select: none;
            z-index: 2;
        }
        .arrow.left {
            left: 0.5rem;
        }
        .arrow.right {
            right: 0.5rem;
        }
        .indicators {
            text-align: center;
            margin-top: 1rem;
        }
        .dot {
            display: inline-block;
            width: 12px;
            height: 12px;
            margin: 0 6px;
            background: #bbb;
            border-radius: 50%;
            cursor: pointer;
        }
        .dot.active {
            background: #333;
        }

        /* Dokumentasi */
        .documentation {
            max-width: 900px;
            margin: 3rem auto;
        }
        .doc-gallery {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        .doc-item {
            background: white;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            max-width: 280px;
            text-align: center;
            position: relative;
        }
        .doc-item img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .doc-item p {
            font-weight: 600;
            color: #003366;
            margin: 0 0 0.5rem 0;
        }
        .doc-item form {
            position: absolute;
            bottom: 1rem;
            left: 1rem;
            right: 1rem;
            display: flex;
            justify-content: center;
            gap: 0.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                padding: 2rem 1rem;
            }
            .hero-content,
            .hero-image {
                max-width: 100%;
                text-align: center;
            }
            .hero-content {
                order: 2;
            }
            .hero-image {
                order: 1;
                margin-bottom: 1.5rem;
            }
            .profile-container {
                flex-direction: column;
            }
            .photo,
            .info {
                max-width: 100%;
            }
            .doc-gallery {
                flex-direction: column;
            }
            .doc-item {
                max-width: 100%;
            }
        }
    </style>
</x-app-layout>
