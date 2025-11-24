<x-utama>
<div class="p-4 space-y-6">

    <!-- ========================= -->
    <!-- HEADER ATAS (TAMPIL TIMBUL) -->
    <!-- ========================= -->
    <div class=" bg-white p-4 rounded-xl border shadow-sm">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <a href="/cases" class="text-gray-600 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>

            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-teal-600" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h6l2 3h10v11H3V7z" />
            </svg>

            <h1 class="text-2xl font-semibold">
                #1823702 - Jordan Yudhistira : Finansial
            </h1>
        </div>

        <button class="px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600">
            Edit Perkara
        </button>
    </div>

    <!-- ========================= -->
    <!-- NAVIGATION -->
    <!-- ========================= -->
    <div class="flex space-x-4 overflow-x-auto pb-1 pt-10">
        <button class="px-4 py-1 bg-teal-500 text-white rounded-lg">Semua</button>
        <button class="px-4 py-1 bg-gray-100 rounded-lg">Transaksi</button>
        <button class="px-4 py-1 bg-gray-100 rounded-lg">Dokumen</button>
        <button class="px-4 py-1 bg-gray-100 rounded-lg">Jurnal biaya</button>
        <button class="px-4 py-1 bg-gray-100 rounded-lg">Kalender</button>
        <button class="px-4 py-1 bg-gray-100 rounded-lg">Tugas</button>
        <button class="px-4 py-1 bg-gray-100 rounded-lg">Komunikasi</button>
    </div>
</div>
    <!-- ========================= -->
    <!-- FINANSIAL PEKERJAAN (FIX) -->
    <!-- ========================= -->
    <div class="border p-4 rounded-xl bg-white shadow-sm">
        <h2 class="font-semibold text-lg mb-3 pb-2 border-b">Finansial Pekerjaan</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

            <div class="p-4 border rounded-lg bg-gray-50 text-center">
                <p class="font-medium">Flat Fee :</p>
                <p class="text-xl font-bold">IDR 100.000.000</p>
            </div>

            <div class="p-4 border rounded-lg bg-gray-50 text-center space-y-2">
                <p>Total Biaya Waktu : <span class="font-bold">IDR 5.000.000</span></p>
                <button class="px-3 py-1 bg-teal-500 text-white rounded-lg w-full">+ Waktu</button>
                <p>Total Pengeluaran : <span class="font-bold">IDR 10.000.000</span></p>
                <button class="px-3 py-1 bg-teal-500 text-white rounded-lg w-full">+ Pengeluaran</button>
            </div>

            <div class="p-4 border rounded-lg bg-gray-50 text-center">
                <p class="font-medium">Total semua biaya</p>
                <p class="text-xl font-bold">IDR 115.000.000</p>
            </div>

            <div class="p-4 border rounded-lg bg-gray-50 text-center space-y-3">
                <p>Dana deposit : <span class="font-bold">IDR 0</span></p>
                <button class="px-3 py-1 bg-teal-500 text-white rounded-lg w-full">Permintaan Dana</button>
                <p>Sisa tagihan : <span class="font-bold">IDR 0</span></p>
                <button class="px-3 py-1 bg-teal-600 text-white rounded-lg w-full">Invoice</button>
            </div>

        </div>
    </div>

    <!-- ========================= -->
    <!-- GRID 3 KOLOM (SEMUA FIX) -->
    <!-- ========================= -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">

        <!-- ===================== -->
        <!-- 1. INFORMASI PEKERJAAN -->
        <!-- ===================== -->
        <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

            <div class="bg-gray-100 px-4 py-2 border-b font-semibold">Informasi Pekerjaan</div>

            <div class="p-4 space-y-3 text-sm">

                <div>
                    <p><strong>Ranah Kasus :</strong> Perdata</p>
                    <hr class="mt-1 border-gray-200">
                </div>

                <div>
                    <p><strong>Jenis Kasus :</strong> Finansial</p>
                    <hr class="mt-1 border-gray-200">
                </div>

                <div>
                    <p><strong>Lokasi :</strong> Jln. Batununggal No. 5, Bandung, Jawa Barat 19287</p>
                    <hr class="mt-1 border-gray-200">
                </div>

                <div>
                    <p><strong>Pimpinan :</strong> James Ardy, Jordan, Gabriella</p>
                    <hr class="mt-1 border-gray-200">
                </div>

                <div>
                    <p><strong>Anggota :</strong> James Ardy</p>
                    <hr class="mt-1 border-gray-200">
                </div>

                <div>
                    <p><strong>Litigasi / Non Litigasi :</strong> James, Jordan, Gabriella</p>
                    <hr class="mt-1 border-gray-200">
                </div>

                <div>
                    <p><strong>Status :</strong> Terbuka</p>
                    <hr class="mt-1 border-gray-200">
                </div>

                <div>
                    <p><strong>Deskripsi :</strong> Kasus ini melibatkan sengketa...</p>
                </div>

            </div>
        </div>

        <!-- ===================== -->
        <!-- 2. TANGGAL -->
        <!-- ===================== -->
        <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

            <div class="bg-gray-100 px-4 py-2 border-b font-semibold">Tanggal</div>

            <div class="p-4 space-y-3 text-sm">

                <div>
                    <p><strong>Tanggal Mulai :</strong> -----</p>
                    <hr class="mt-1 border-gray-200">
                </div>

                <div>
                    <p><strong>Tanggal Tutup :</strong> -----</p>
                    <hr class="mt-1 border-gray-200">
                </div>

                <div>
                    <p><strong>Tanggal Pending :</strong> -----</p>
                </div>

            </div>
        </div>

        <!-- ========================= -->
        <!-- 4. RIWAYAT + KONTAK -->
        <!-- ========================= -->
        <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

            <div class="bg-gray-100 px-4 py-2 border-b font-semibold">
                Riwayat Aktivitas Pekerjaan
            </div>

            <div class="p-4 space-y-4 text-sm">
                <div>
                    <p class="font-semibold mb-1">April 23 2023</p>
                    <ul class="space-y-1 text-gray-700">
                        <li>James Ardy : merekam waktu</li>
                        <li>Benjamin membuat deposit Rp 2.000.000</li>
                        <li>James Ardy : update progres</li>
                        <li>James Ardy : mengubah status</li>
                    </ul>
                </div>

                <div>
                    <p class="font-semibold mb-1">April 22 2023</p>
                    <ul class="space-y-1 text-gray-700">
                        <li>James Ardy : membuat catatan</li>
                        <li>Jordan : mengunggah dokumen</li>
                    </ul>
                </div>
            </div>

            <div class="border-t p-4">
                <p class="font-semibold mb-1 text-lg">Kontak Terkait</p>
                <ul class="space-y-1 text-sm text-gray-700">
                    <li>James Ardy — 08123456789</li>
                    <li>Gabriella — 085267891234</li>
                    <li>Jordan — 082198765432</li>
                </ul>
            </div>
        </div>

    

    
        <!-- ===================== -->
        <!-- 3. INFORMASI KLIEN -->
        <!-- ===================== -->
        <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

            <div class="bg-gray-100 px-4 py-2 border-b font-semibold">Informasi Klien</div>

            <div class="p-4 space-y-3 text-sm">

                <div>
                    <p><strong>Nama :</strong> Jordan Yudhistira</p>
                    <hr class="mt-1 border-gray-200">
                </div>

                <div>
                    <p><strong>Tanggal Lahir :</strong> 10-11-1999</p>
                    <hr class="mt-1 border-gray-200">
                </div>

                <div>
                    <p><strong>Jenis Kelamin :</strong> Pria</p>
                    <hr class="mt-1 border-gray-200">
                </div>

                <div>
                    <p><strong>NIK :</strong> 357183783410004</p>
                </div>

            </div>
        </div>


</div>
</div>
</x-utama>
