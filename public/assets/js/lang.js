
    document.addEventListener('DOMContentLoaded', function () {
        const langOptions = document.querySelectorAll('.lang-option');

        langOptions.forEach(option => {
            option.addEventListener('click', () => {
                // Remove 'active' dari semua
                langOptions.forEach(opt => opt.classList.remove('active'));

                // Tambahkan 'active' ke yang dipilih
                option.classList.add('active');

                // Ambil bahasa terpilih
                const selectedLang = option.dataset.lang;

                // (Contoh) Redirect atau ganti bahasa via URL / handler backend
                window.location.href = `/${selectedLang}`;
            });
        });
    });


