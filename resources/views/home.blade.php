<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $profile?->name ?? 'Portofolio' }} - Portofolio</title>
    <script>
        try {
            document.documentElement.setAttribute('data-theme', localStorage.getItem('theme') || 'dark');
            document.documentElement.setAttribute('lang', localStorage.getItem('lang') || 'id');
        } catch (e) {}
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 text-slate-100">

    <div class="fixed top-4 right-4 z-50 flex items-center gap-2">
        {{-- Bahasa --}}
        <button id="lang-toggle" type="button" aria-label="Ganti bahasa / Switch language" class="ctrl lang-toggle">
            <span class="lang-thumb"></span>
            <span class="lang-opt">ID</span>
            <span class="lang-opt">EN</span>
        </button>

        {{-- Tema --}}
        <button id="theme-toggle" type="button" aria-label="Ganti tema / Toggle theme" class="ctrl theme-toggle">
            <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
            </svg>
            <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="5"/>
                <line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/>
                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                <line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/>
                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
            </svg>
        </button>
    </div>

    {{-- Hero --}}
    <section id="home"
            class="relative overflow-hidden min-h-screen flex items-center pt-24 pb-16 px-6"
            style="background: radial-gradient(circle at 80% 30%, rgba(37,99,235,.35), transparent 45%), linear-gradient(180deg, #020617 0%, #0b1b3a 100%);">

        <div class="max-w-6xl mx-auto w-full grid md:grid-cols-2 gap-12 items-center">

            {{-- Teks --}}
            <div class="text-center md:text-left">
                <h1 class="mt-5 text-4xl md:text-6xl font-extrabold leading-tight">
                    <span data-i18n="hero_greet">Halo, saya</span><br>{{ $profile?->name }}
                </h1>
                <p class="mt-3 text-2xl md:text-3xl font-bold text-blue-500">
                    {{ $profile?->headline }}
                </p>

                @if ($profile?->hero_description)
                    <p class="mt-6 text-slate-400 leading-relaxed max-w-lg mx-auto md:mx-0">
                        {{ $profile->hero_description }}
                    </p>
                @endif

                <div class="mt-8 flex flex-wrap items-center justify-center md:justify-start gap-4">
                    <a href="#contact"
                        class="px-6 py-3 rounded-full bg-blue-500 hover:bg-blue-400 font-semibold transition"
                        data-i18n="hero_contact">Hubungi Saya
                    </a>
                    
                    <a href="#projects"
                        class="px-6 py-3 rounded-full border border-slate-600 hover:border-blue-400 transition"
                        data-i18n="hero_projects">Lihat Project
                    </a>
                </div>
            </div>

            {{-- Foto --}}
            <div class="relative flex items-center justify-center min-h-[22rem] md:min-h-[32rem]">
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div class="pulse-ring w-80 h-80 md:w-[27rem] md:h-[27rem] rounded-full border border-blue-500/50"></div>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div class="pulse-ring pulse-delay w-80 h-80 md:w-[27rem] md:h-[27rem] rounded-full border border-blue-400/40"></div>
                    </div>

                <div class="relative w-64 h-64 md:w-96 md:h-96 rounded-full overflow-hidden border-4 border-blue-500/40 shadow-[0_0_80px_rgba(37,99,235,0.45)] bg-slate-900">
                    @if ($profile?->photo)
                        <img src="{{ asset('storage/' . $profile->photo) }}"
                            alt="{{ $profile->name }}"
                            class="w-full h-full object-cover object-top">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-7xl font-bold text-blue-400">
                            {{ strtoupper(substr($profile?->name ?? 'P', 0, 1)) }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>

    {{-- Teks berjalan --}}
    @if ($skills->count())
        <div class="overflow-hidden border-y border-slate-800 py-6" aria-hidden="true">
            <div class="marquee-track flex w-max whitespace-nowrap">
                @for ($i = 0; $i < 6; $i++)
                    @foreach ($skills as $skill)
                        <span class="px-6 text-4xl md:text-6xl font-extrabold uppercase"
                            style="color: transparent; -webkit-text-stroke: 1px var(--stroke);">{{ $skill->name }}</span>
                        <span class="px-6 text-4xl md:text-6xl text-blue-500">✦</span>
                    @endforeach
                @endfor
            </div>
        </div>
    @endif

    {{-- About Me --}}
    <section id="about" class="max-w-6xl mx-auto px-6 py-28 md:py-32">
        <div class="grid items-center gap-16 md:grid-cols-2">

            {{-- Foto --}}
            <div class="relative flex justify-center md:justify-start">

                {{-- Cahaya biru di belakang foto --}}
                <div
                    class="absolute left-1/2 top-1/2 h-72 w-72 -translate-x-1/2 -translate-y-1/2 rounded-full bg-blue-600/20 blur-[100px]">
                </div>

                {{-- Aksen garis --}}
                <div class="absolute left-4 top-8 h-[85%] w-px bg-blue-500/30"></div>

                <div class="relative w-72 md:w-80">
                    @php($aboutPhoto = $profile?->about_photo ?? $profile?->photo)

                    @if ($aboutPhoto)
                        <img
                            src="{{ asset('storage/' . $aboutPhoto) }}"
                            alt="{{ $profile?->name }}"
                            class="relative z-10 h-[420px] w-full object-cover object-top grayscale-[15%]"
                        >
                    @else
                        <div class="relative z-10 flex h-[420px] w-full items-center justify-center bg-slate-900 text-7xl font-bold text-slate-600">
                            {{ strtoupper(substr($profile?->name ?? 'P', 0, 1)) }}
                        </div>
                    @endif
                </div>

            </div>

            {{-- Deskripsi --}}
            <div class="relative">

                {{-- Judul sederhana --}}
                <p class="mb-3 text-xs font-medium tracking-[0.3em] text-blue-400" data-i18n="about_label">
                    PROFILE
                </p>

                <h2 class="text-4xl font-bold tracking-tight text-white md:text-5xl">
                    <span data-i18n="about_title">ABOUT ME</span><span class="text-blue-500">.</span>
                </h2>

                {{-- Garis kecil sebagai aksen --}}
                <div class="mt-6 h-px w-16 bg-blue-500"></div>

                <div class="mt-8 max-w-xl">
                    <p class="whitespace-pre-line text-base leading-8 text-slate-400">
                        {{ $profile?->about ?? 'Belum ada deskripsi.' }}
                    </p>
                </div>

                {{-- Informasi singkat --}}
                @if ($profile?->headline)
                    <p class="mt-8 text-sm font-medium uppercase tracking-wider text-slate-500">
                        {{ $profile?->headline }}
                    </p>
                @endif

            </div>

        </div>
    </section>

    {{-- Projects --}}
    <section id="projects" class="max-w-6xl mx-auto px-6 py-24 scroll-mt-20">
        <div class="text-center" data-reveal>
            <h2 class="mt-2 text-4xl md:text-5xl font-extrabold" data-i18n="projects_title">Project</h2>
            <p class="mt-4 text-slate-400" data-i18n="projects_sub">Berikut beberapa project yang pernah dikembangkan</p>
        </div>

        <div class="mt-14 grid gap-x-10 gap-y-14 md:grid-cols-2">
            @forelse ($projects as $project)
                <article data-reveal>
                    {{-- Foto --}}
                    <div class="aspect-video rounded-xl overflow-hidden border border-slate-800 bg-slate-900">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                                class="w-full h-full object-cover object-top hover:scale-105 transition duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-600 text-sm">
                                Belum ada gambar
                            </div>
                        @endif
                    </div>

                    {{-- Judul, link, deskripsi --}}
                    <h3 class="mt-5 text-xl font-bold">{{ $project->title }}</h3>

                    @if ($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" rel="noopener"
                            class="inline-block mt-2 text-blue-400 underline underline-offset-4 hover:text-blue-300"
                            data-i18n="project_link">Lihat Disini
                        </a>
                    @endif

                    <p class="mt-2 text-slate-400 leading-relaxed line-clamp-3">{{ $project->description }}</p>
                </article>
            @empty
                <p class="md:col-span-2 text-center text-slate-500" data-i18n="empty_projects">Belum ada project.</p>
            @endforelse
        </div>
    </section>

    {{-- Skills --}}
    <section id="skills" class="max-w-6xl mx-auto px-6 py-24">
        <div class="text-center mb-12" data-reveal>
            <h2 class="mt-2 text-4xl md:text-5xl font-extrabold text-white">SKILLS</h2>
            <p class="mt-4 text-slate-400" data-i18n="skills_sub">Teknologi dan tools yang saya gunakan untuk membangun sistem</p>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($skills as $skill)
                <div data-reveal class="rounded-2xl bg-slate-900 border border-slate-800 p-5">
                    <div class="flex items-center gap-3">
                        @if ($skill->icon)
                            <img src="{{ asset('storage/' . $skill->icon) }}"
                                alt="{{ $skill->name }}" class="w-8 h-8 object-contain">
                        @endif
                        <h3 class="font-semibold">{{ $skill->name }}</h3>
                        <span class="ml-auto text-sm text-slate-400">{{ $skill->level }}%</span>
                    </div>
                    <div class="mt-4 h-2 rounded-full bg-slate-800">
                        <div class="h-2 rounded-full bg-indigo-500" style="width: {{ $skill->level }}%"></div>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-slate-500" data-i18n="empty_skills">Belum ada skill.</p>
            @endforelse
        </div>
    </section>

    {{-- Pengalaman --}}
    <section id="experience" class="max-w-4xl mx-auto px-6 py-24">
        <div class="text-center mb-12" data-reveal>
            <h2 class="mt-2 text-4xl md:text-5xl font-extrabold text-white" data-i18n="exp_title">PENGALAMAN</h2>
            <p class="mt-4 text-slate-400" data-i18n="exp_sub">Pengalaman kerja dan magang</p>
        </div>

        <div class="space-y-6">
            @forelse ($experiences as $exp)
                <div data-reveal class="rounded-2xl bg-slate-900 border border-slate-800 p-6">
                    <div class="flex flex-wrap justify-between gap-2">
                        <h3 class="text-lg font-semibold">{{ $exp->position }}</h3>
                        <span class="text-sm text-slate-400">
                            {{ $exp->start_date->format('m/Y') }} -
                            @if ($exp->end_date)
                                {{ $exp->end_date->format('m/Y') }}
                            @else
                                <span data-i18n="exp_present">Sekarang</span>
                            @endif
                        </span>
                    </div>
                    <p class="text-indigo-400">{{ $exp->company }}</p>
                    @if ($exp->description)
                        <p class="mt-3 text-slate-400">{{ $exp->description }}</p>
                    @endif
                </div>
            @empty
                <p class="text-center text-slate-500" data-i18n="empty_exp">Belum ada pengalaman.</p>
            @endforelse
        </div>
    </section>

    {{-- Pendidikan --}}
    <section id="education" class="max-w-5xl mx-auto px-6 py-28">

        {{-- Judul --}}
        <div class="text-center" data-reveal>
            <h2 class="mt-2 text-4xl md:text-5xl font-extrabold text-white" data-i18n="edu_title">PENDIDIKAN</h2>
            <p class="mt-4 text-slate-400" data-i18n="edu_sub">Program studi yang sedang dan telah saya tempuh</p>
        </div>

        {{-- Daftar Pendidikan --}}
        <div class="mt-16 grid grid-cols-1 gap-14 md:grid-cols-2 md:gap-8">

            @forelse ($educations as $edu)
                <article data-reveal class="group text-center">

                    {{-- Logo / Inisial --}}
                    <div class="mx-auto flex h-28 w-28 items-center justify-center
                                transition duration-500 group-hover:-translate-y-1">

                        {{-- Jika nanti punya logo, ganti bagian ini dengan img --}}
                        <div class="text-2xl font-semibold tracking-tight text-slate-500">
                            {{ strtoupper(substr($edu->institution, 0, 2)) }}
                        </div>

                    </div>

                    {{-- Nama Institusi --}}
                    <h3 class="mt-6 text-lg font-medium text-white">
                        {{ $edu->institution }}
                    </h3>

                    @if ($edu->major)
                        <p class="mt-1 text-sm text-slate-400">
                            {{ $edu->major }}
                        </p>
                    @endif

                    {{-- Status --}}
                    <p class="mt-4 text-xs uppercase tracking-[0.18em] text-blue-400">
                        @if ($edu->end_year)
                            <span data-i18n="edu_graduated">Lulus</span> · {{ $edu->end_year }}
                        @else
                            <span data-i18n="edu_ongoing">Sedang menempuh program</span>
                        @endif
                    </p>

                </article>
            @empty
                <p class="col-span-full text-center text-slate-500" data-i18n="empty_edu">
                    Informasi pendidikan belum tersedia.
                </p>
            @endforelse

        </div>

    </section>

    <footer id="contact" class="scroll-mt-20 border-t border-slate-800 bg-slate-900">
        <div class="max-w-6xl mx-auto px-6 py-14">

            <div class="grid gap-10 md:grid-cols-2">

                {{-- Identitas --}}
                <div>
                    <h3 class="text-2xl font-semibold tracking-tight">
                        {{ $profile?->name }}
                    </h3>

                    <p class="mt-2 text-sm text-blue-400">
                        {{ $profile?->headline }}
                    </p>

                    @if ($profile?->email)
                        <div class="mt-7">
                            <h4 class="mt-8 text-lg font-semibold" data-i18n="footer_contact">Hubungi Saya</h4>

                            <a href="mailto:{{ $profile->email }}"
                            class="mt-2 inline-block text-sm text-slate-300 transition hover:text-white">
                                {{ $profile->email }}
                            </a>
                        </div>
                    @endif
                </div>

                {{-- Navigasi --}}
                <div class="md:justify-self-end">
                    <p class="text-xs uppercase tracking-[0.2em] text-slate-500">
                        Navigasi
                    </p>

                    <ul class="mt-5 grid grid-cols-2 gap-x-10 gap-y-3 text-sm text-slate-400">
                        <li><a href="#home" class="hover:text-white" data-i18n="nav_home">Beranda</a></li>
                        <li><a href="#about" class="hover:text-white" data-i18n="nav_about">Tentang Saya</a></li>
                        <li><a href="#skills" class="hover:text-white">Skills</a></li>
                        <li><a href="#projects" class="hover:text-white" data-i18n="nav_projects">Project</a></li>
                        <li><a href="#experience" class="hover:text-white" data-i18n="nav_experience">Pengalaman</a></li>
                        <li><a href="#education" class="hover:text-white" data-i18n="nav_education">Pendidikan</a></li>
                    </ul>
                </div>

            </div>

            <div class="mt-12 flex flex-col items-center justify-between gap-6 border-t border-slate-800 pt-6 sm:flex-row">

                {{-- Copyright --}}
                <p class="text-xs text-slate-500">
                    &copy; {{ date('Y') }} {{ $profile?->name }}. All Rights Reserved.
                </p>

                {{-- Sosial media --}}
                <div class="flex items-center gap-3">
                        @if ($profile?->email)
                            <a href="mailto:{{ $profile->email }}" aria-label="Email"
                            class="w-10 h-10 rounded-full border border-slate-600 flex items-center justify-center text-slate-300 hover:border-blue-400 hover:text-blue-400 transition">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>
                                </svg>
                            </a>
                        @endif

                        @if ($profile?->linkedin_url)
                            <a href="{{ $profile->linkedin_url }}" target="_blank" rel="noopener" aria-label="LinkedIn"
                            class="w-10 h-10 rounded-full border border-slate-600 flex items-center justify-center text-slate-300 hover:border-blue-400 hover:text-blue-400 transition">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 1 1 0-4.125 2.062 2.062 0 0 1 0 4.125zM7.119 20.452H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0z"/>
                                </svg>
                            </a>
                        @endif

                        @if ($profile?->github_url)
                            <a href="{{ $profile->github_url }}" target="_blank" rel="noopener" aria-label="GitHub"
                            class="w-10 h-10 rounded-full border border-slate-600 flex items-center justify-center text-slate-300 hover:border-blue-400 hover:text-blue-400 transition">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23a11.5 11.5 0 0 1 3-.404c1.02.005 2.047.138 3 .404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222 0 1.606-.015 2.896-.015 3.286 0 .322.216.694.825.576C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                                </svg>
                            </a>
                        @endif
                </div>
            </div>

        </div>

    </footer>

</body>
</html>