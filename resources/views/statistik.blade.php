<x-utama>
<div class="p-6 2xl:p-8 space-y-6 2xl:space-y-8">

  <!-- HEADER ATAS (fix: badge Klien nempel ke nama, bukan jauh di kanan) -->
  <div class="flex items-start gap-3 2xl:gap-5">

    <!-- Avatar bulat -->
    <div class="w-10 h-10 2xl:w-12 2xl:h-12 rounded-full bg-blue-600 flex items-center justify-center text-white text-lg 2xl:text-xl font-semibold">
      PS
    </div>

    <div class="flex flex-col">

      <!-- Nama + Badge Klien (sejajar & rapet) -->
      <div class="flex items-center gap-2 2xl:gap-4">
        <h1 class="text-2xl 2xl:text-3xl font-semibold text-gray-800">Paudra Sanjaya</h1>

        <!-- BADGE KLIEN (ovall biru, nempel ke nama) -->
        <span class="px-2 2xl:px-2 py-0.5 2xl:py-1 rounded-full bg-blue-600 text-white text-xs 2xl:text-sm font-medium">
          client
        </span>
      </div>

      <!-- Tabs di bawahnya -->
      <div class="flex gap-4 2xl:gap-6 mt-1 2xl:mt-3 text-sm 2xl:text-base">
        <button class="text-blue-600 font-medium border-b-2 border-blue-600 pb-1 2xl:pb-3">Semua</button>
        <button class="text-gray-500 hover:text-black">Komunikasi</button>
        <button class="text-gray-500 hover:text-black">Tagihan</button>
        <button class="text-gray-500 hover:text-black">Transaksi</button>
        <button class="text-gray-500 hover:text-black">Dokumen</button>
      </div>

    </div>
  </div>

  <!-- ====================== GRID UTAMA ====================== -->
  <div class="grid grid-cols-1 xl:grid-cols-4 gap-6 2xl:gap-8">

    <!-- INFORMASI KONTAK -->
    <div class="xl:col-span-1">
      <div class="bg-white border rounded-xl p-4 2xl:p-6 shadow-sm space-y-3 2xl:space-y-5">
        <h2 class="font-semibold text-gray-700">Informasi Kontak</h2>

        <div class="text-sm 2xl:text-base space-y-1 2xl:space-y-2">
          <p><span class="font-medium">Nama:</span> Paudra Sanjaya</p>
          <p><span class="font-medium">Tanggal Lahir:</span> 04-08-1990</p>
          <p><span class="font-medium">Jenis Kelamin:</span> Pria</p>
          <p><span class="font-medium">NIK:</span> 0868651151718</p>
          <p><span class="font-medium">No.Telp:</span> 081635282289</p>
          <p><span class="font-medium">Email:</span> PaudraSanjaya@gmail.com</p>
          <p><span class="font-medium">Alamat:</span> Jl Cimahi, Bandung</p>
        </div>

        <div class="mt-3 2xl:mt-5">
          <label class="text-sm 2xl:text-base font-medium">Catatan :</label>
          <textarea rows="3" class="w-full border rounded-lg mt-1 2xl:mt-3"></textarea>
        </div>
      </div>
    </div>

    <!-- DETAIL PERKARA -->
    <div class="xl:col-span-3 space-y-6 2xl:space-y-8">
      <div class="bg-white border rounded-xl p-4 2xl:p-6 shadow-sm">

        <!-- Title + dropdown + button -->
        <div class="flex justify-between items-center">

          <div class="flex items-center gap-3 2xl:gap-5">
            <h2 class="font-semibold text-gray-700">Paudra Sanjayi - #1923702</h2>

            <!-- dropdown arrow -->
            <button class="text-gray-600 hover:text-black">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 2xl:w-6 h-4 2xl:h-6" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
          </div>

          <button class="px-3 2xl:px-5 py-1.5 2xl:py-3 bg-blue-600 text-white text-sm 2xl:text-base rounded-lg hover:bg-blue-700">
            Tambah Pekerjaan
          </button>
        </div>

        <!-- Status -->
        <div class="mt-4 2xl:mt-6">
          <span class="px-3 2xl:px-3 py-1 2xl:py-1 bg-green-100 text-green-700 rounded-full text-xs 2xl:text-sm font-medium">
            Status: Open
          </span>
        </div>

        <!-- Info Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 2xl:gap-4 mt-4 2xl:mt-6">
          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Sisa tagihan</p>
            <p class="font-semibold text-lg 2xl:text-xl">IDR 30.000.000</p>
          </div>

          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Dana amanat klien</p>
            <p class="font-semibold text-lg 2xl:text-xl">IDR 20.000.000</p>
          </div>

          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Kategori</p>
            <p class="font-semibold text-lg 2xl:text-xl">Finansial</p>
          </div>
        </div>

        <!-- Detail Biaya -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 2xl:gap-6 mt-6 2xl:mt-8">
          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Flat fee</p>
            <p class="font-semibold text-lg 2xl:text-xl">IDR 100.000.000</p>
          </div>

          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Total biaya waktu</p>
            <p class="font-semibold text-lg 2xl:text-xl">IDR 10.000.000</p>
          </div>

          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Total semua biaya</p>
            <p class="font-semibold text-lg 2xl:text-xl">IDR 140.000.000</p>
          </div>

          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Total Pengeluaran</p>
            <p class="font-semibold text-lg 2xl:text-xl">IDR 30.000.000</p>
          </div>
        </div>

      </div>

      <!-- INFO KHUSUS + PEMBAYARAN -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 2xl:gap-8">
        <div class="bg-white border rounded-xl p-4 2xl:p-6 shadow-sm">
          <h2 class="font-semibold text-gray-700 mb-2 2xl:mb-3">Informasi Khusus</h2>
          <p class="text-sm 2xl:text-base"><span class="font-medium">Tanggungan Anak:</span> 5</p>
          <p class="text-sm 2xl:text-base"><span class="font-medium">Pajak yang harus dibayar:</span> IDR 5.000.000</p>
        </div>

        <div class="bg-white border rounded-xl p-4 2xl:p-6 shadow-sm">
          <h2 class="font-semibold text-gray-700 mb-2 2xl:mb-3">Informasi Pembayaran</h2>
          <p class="text-sm 2xl:text-base"><span class="font-medium">No. Rekening BCA:</span> 013xxxxxxx</p>
          <p class="text-sm 2xl:text-base"><span class="font-medium">No. Rekening BNI:</span> 00xxxxxxx</p>
        </div>
      </div>

    </div>
  </div>

</div>

</x-utama>
