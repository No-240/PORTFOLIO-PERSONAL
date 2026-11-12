const translations = {
    id: {
        hero_greet: 'Halo, saya',
        hero_contact: 'Hubungi Saya',
        hero_projects: 'Lihat Project',
        about_label: 'PROFIL',
        about_title: 'TENTANG SAYA',
        projects_title: 'Project',
        projects_sub: 'Berikut beberapa project yang pernah dikembangkan',
        project_link: 'Lihat Disini',
        skills_sub: 'Teknologi dan tools yang saya gunakan untuk membangun sistem',
        exp_title: 'PENGALAMAN',
        exp_sub: 'Pengalaman kerja dan magang',
        exp_present: 'Sekarang',
        edu_title: 'PENDIDIKAN',
        edu_sub: 'Program studi yang sedang dan telah saya tempuh',
        edu_graduated: 'Lulus',
        edu_ongoing: 'Sedang menempuh program',
        empty_projects: 'Belum ada project.',
        empty_skills: 'Belum ada skill.',
        empty_exp: 'Belum ada pengalaman.',
        empty_edu: 'Informasi pendidikan belum tersedia.',
        footer_contact: 'Hubungi Saya',
        footer_links: 'Tautan',
        nav_home: 'Beranda',
        nav_about: 'Tentang Saya',
        nav_projects: 'Project',
        nav_experience: 'Pengalaman',
        nav_education: 'Pendidikan',
    },
    en: {
        hero_greet: "Hi, I'm",
        hero_contact: 'Contact Me',
        hero_projects: 'View Projects',
        about_label: 'PROFILE',
        about_title: 'ABOUT ME',
        projects_title: 'Projects',
        projects_sub: "Here are some projects I've built",
        project_link: 'View Project',
        skills_sub: 'Technologies and tools I use to build systems',
        exp_title: 'EXPERIENCE',
        exp_sub: 'Work and internship experience',
        exp_present: 'Present',
        edu_title: 'EDUCATION',
        edu_sub: 'Study programs I am taking or have completed',
        edu_graduated: 'Graduated',
        edu_ongoing: 'Currently enrolled',
        empty_projects: 'No projects yet.',
        empty_skills: 'No skills yet.',
        empty_exp: 'No experience yet.',
        empty_edu: 'Education information is not available yet.',
        footer_contact: 'Contact Me',
        footer_links: 'Links',
        nav_home: 'Home',
        nav_about: 'About Me',
        nav_projects: 'Projects',
        nav_experience: 'Experience',
        nav_education: 'Education',
    },
};

const root = document.documentElement;

function save(key, value) {
    try { localStorage.setItem(key, value); } catch (e) {}
}

function applyLang(lang) {
    root.setAttribute('lang', lang);
    document.querySelectorAll('[data-i18n]').forEach((el) => {
        const text = translations[lang]?.[el.dataset.i18n];
        if (text) el.textContent = text;
    });
    save('lang', lang);
}

function applyTheme(theme) {
    root.classList.add('theme-transition');
    setTimeout(() => root.classList.remove('theme-transition'), 500);
    root.setAttribute('data-theme', theme);
    save('theme', theme);
}

// Terapkan bahasa tersimpan saat halaman dibuka
applyLang(root.getAttribute('lang') === 'en' ? 'en' : 'id');

document.getElementById('lang-toggle')?.addEventListener('click', () => {
    applyLang(root.getAttribute('lang') === 'en' ? 'id' : 'en');
});

document.getElementById('theme-toggle')?.addEventListener('click', () => {
    applyTheme(root.getAttribute('data-theme') === 'light' ? 'dark' : 'light');
});