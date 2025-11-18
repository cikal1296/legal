<x-utama>
      <div class="flex w-full h-34 -mt-10 mb-6">
           
 


      
    </div>
    <div class="bg-gray-50 min-h-screen py-10 px-6">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-100">
        <div class="flex mb-5">

            <svg class="flex-shrink-0 mt-2 w-16 h-16 text-red-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
            </svg>
    <h1 class="text-5xl font-semibold ml-2 text-gray-800 mt-4">Pusat Bantuan</h1>
        </div>

        {{-- FAQ --}}
        <div id="accordion-flush" data-accordion="collapse" class="mb-8 mt-10">
    <h2 id="faq-1">
    <button type="button"
        class="flex items-center justify-between w-full py-4 font-medium text-left text-gray-600 border-b border-gray-200"
        data-accordion-target="#faq-1-content" aria-expanded="true">
        <span>Bagaimana cara melaporkan kesalahan data tahanan?</span>
        <svg data-accordion-icon class="w-5 h-5 shrink-0 rotate-180" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
</h2>
<div id="faq-1-content" class="hidden p-4 text-gray-500">
    Silakan kirim laporan melalui form di bawah atau hubungi admin lewat email support@hukumnesia.go.id
</div>

<h2 id="faq-2">
    <button type="button"
        class="flex items-center justify-between w-full py-4 font-medium text-left text-gray-600 border-b border-gray-200"
        data-accordion-target="#faq-2-content" aria-expanded="false">
        <span>Apakah data tahanan diperbarui otomatis?</span>
        <svg data-accordion-icon class="w-5 h-5 shrink-0 rotate-0" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
</h2>
<div id="faq-2-content" class="hidden p-4 text-gray-500">
    Ya, data diperbarui setiap 24 jam berdasarkan sistem pusat.
</div>

<h2 id="faq-3">
    <button type="button"
        class="flex items-center justify-between w-full py-4 font-medium text-left text-gray-600 border-b border-gray-200"
        data-accordion-target="#faq-3-content" aria-expanded="false">
        <span>Apakah data pengguna dijamin aman saat menggunakan layanan ini?</span>
        <svg data-accordion-icon class="w-5 h-5 shrink-0" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
</h2>
<div id="faq-3-content" class="hidden p-4 text-gray-500">
    Semua data terenkripsi end-to-end dan hanya digunakan untuk keperluan verifikasi hukum. Sistem kami tidak
    membagikan data kepada pihak ketiga tanpa persetujuan.
</div>

<h2 id="faq-4">
    <button type="button"
        class="flex items-center justify-between w-full py-4 font-medium text-left text-gray-600 border-b border-gray-200"
        data-accordion-target="#faq-4-content" aria-expanded="false">
        <span>Apakah layanan ini bisa dipakai untuk konsultasi hukum secara online?</span>
        <svg data-accordion-icon class="w-5 h-5 shrink-0" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
</h2>
<div id="faq-4-content" class="hidden p-4 text-gray-500">
    Ya, pengguna dapat melakukan konsultasi langsung dengan advokat terverifikasi melalui chat atau video call
    yang disediakan dalam sistem.
</div>

<h2 id="faq-5">
    <button type="button"
        class="flex items-center justify-between w-full py-4 font-medium text-left text-gray-600 border-b border-gray-200"
        data-accordion-target="#faq-5-content" aria-expanded="false">
        <span>Berapa lama waktu verifikasi berkas atau dokumen hukum?</span>
        <svg data-accordion-icon class="w-5 h-5 shrink-0" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
</h2>
<div id="faq-5-content" class="hidden p-4 text-gray-500">
    Proses verifikasi biasanya memakan waktu 10–30 menit tergantung jenis dokumen dan antrian layanan pada
    saat itu.
</div>
<div class="mb-10"></div>

        {{-- Kontak --}}
        <div class="mb-8 mt-5">
            <h2 class="text-xl font-semibold mb-3">Hubungi Kami</h2>
            <ul class="text-gray-600">
                <li><strong>Email:</strong> support@hukumnesia.go.id</li>
                <li><strong>Telepon:</strong> (021) 123-4567</li>
                <li><strong>Alamat:</strong> Jl. Merdeka No.10, Jakarta Pusat</li>
            </ul>
        </div>

        {{-- Form Bantuan --}}
        <h2 class="text-xl font-semibold mb-3">Kirim Pertanyaan / Laporan</h2>
        <form class="space-y-4">
            <input type="text" placeholder="Nama Anda" class="w-full p-2 border rounded-lg" required>
            <input type="email" placeholder="Email" class="w-full p-2 border rounded-lg" required>
            <textarea placeholder="Tulis pertanyaan atau keluhan Anda..." class="w-full p-2 border rounded-lg h-28" required></textarea>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Kirim</button>
        </form>
    </div>
</div>
</x-utama>