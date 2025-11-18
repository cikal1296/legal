<x-utama><div class="p-6 space-y-6">

  <!-- HEADER ATAS (fix: badge Klien nempel ke nama, bukan jauh di kanan) -->
  <div class="flex items-start gap-3">

    <!-- Avatar bulat -->
    <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white text-lg font-semibold">
      PS
    </div>

    <div class="flex flex-col">

      <!-- Nama + Badge Klien (sejajar & rapet) -->
      <div class="flex items-center gap-2">
        <h1 class="text-2xl font-semibold text-gray-800">Paudra Sanjaya</h1>

        <!-- BADGE KLIEN (ovall biru, nempel ke nama) -->
        <span class="px-2 py-0.5 rounded-full bg-blue-600 text-white text-xs font-medium">
          Klien
        </span>
      </div>

      <!-- Tabs di bawahnya -->
      <div class="flex gap-4 mt-1 text-sm">
        <button class="text-blue-600 font-medium border-b-2 border-blue-600 pb-1">Semua</button>
        <button class="text-gray-500 hover:text-black">Komunikasi</button>
        <button class="text-gray-500 hover:text-black">Tagihan</button>
        <button class="text-gray-500 hover:text-black">Transaksi</button>
        <button class="text-gray-500 hover:text-black">Dokumen</button>
      </div>

    </div>
  </div>

  <!-- ====================== GRID UTAMA ====================== -->
  <div class="grid grid-cols-1 xl:grid-cols-4 gap-6">

    <!-- INFORMASI KONTAK -->
    <div class="xl:col-span-1">
      <div class="bg-white border rounded-xl p-4 shadow-sm space-y-3">
        <h2 class="font-semibold text-gray-700">Informasi Kontak</h2>

        <div class="text-sm space-y-1">
          <p><span class="font-medium">Nama:</span> Paudra Sanjaya</p>
          <p><span class="font-medium">Tanggal Lahir:</span> 04-08-1990</p>
          <p><span class="font-medium">Jenis Kelamin:</span> Pria</p>
          <p><span class="font-medium">NIK:</span> 0868651151718</p>
          <p><span class="font-medium">No.Telp:</span> 081635282289</p>
          <p><span class="font-medium">Email:</span> PaudraSanjaya@gmail.com</p>
          <p><span class="font-medium">Alamat:</span> Jl Cimahi, Bandung</p>
        </div>

        <div class="mt-3">
          <label class="text-sm font-medium">Catatan :</label>
          <textarea rows="3" class="w-full border rounded-lg mt-1"></textarea>
        </div>
      </div>
    </div>

    <!-- DETAIL PERKARA -->
    <div class="xl:col-span-3 space-y-6">
      <div class="bg-white border rounded-xl p-4 shadow-sm">

        <!-- Title + dropdown + button -->
        <div class="flex justify-between items-center">
          <div class="flex items-center gap-3">
            <h2 class="font-semibold text-gray-700">Paudra Sanjaya - #1923702</h2>

            <!-- dropdown arrow -->
            <button class="text-gray-600 hover:text-black">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
          </div>

          <button class="px-3 py-1.5 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">
            Tambah Pekerjaan
          </button>
        </div>

        <!-- Status -->
        <div class="mt-4">
          <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">
            Status: Open
          </span>
        </div>

        <!-- Info Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
          <div class="p-3 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm">Sisa tagihan</p>
            <p class="font-semibold text-lg">IDR 30.000.000</p>
          </div>

          <div class="p-3 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm">Dana amanat klien</p>
            <p class="font-semibold text-lg">IDR 20.000.000</p>
          </div>

          <div class="p-3 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm">Kategori</p>
            <p class="font-semibold text-lg">Finansial</p>
          </div>
        </div>

        <!-- Detail Biaya -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
          <div class="p-3 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm">Flat fee</p>
            <p class="font-semibold text-lg">IDR 100.000.000</p>
          </div>

          <div class="p-3 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm">Total biaya waktu</p>
            <p class="font-semibold text-lg">IDR 10.000.000</p>
          </div>

          <div class="p-3 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm">Total semua biaya</p>
            <p class="font-semibold text-lg">IDR 140.000.000</p>
          </div>

          <div class="p-3 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm">Total Pengeluaran</p>
            <p class="font-semibold text-lg">IDR 30.000.000</p>
          </div>
        </div>

      </div>

      <!-- INFO KHUSUS + PEMBAYARAN -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white border rounded-xl p-4 shadow-sm">
          <h2 class="font-semibold text-gray-700 mb-2">Informasi Khusus</h2>
          <p class="text-sm"><span class="font-medium">Tanggungan Anak:</span> 5</p>
          <p class="text-sm"><span class="font-medium">Pajak yang harus dibayar:</span> IDR 5.000.000</p>
        </div>

        <div class="bg-white border rounded-xl p-4 shadow-sm">
          <h2 class="font-semibold text-gray-700 mb-2">Informasi Pembayaran</h2>
          <p class="text-sm"><span class="font-medium">No. Rekening BCA:</span> 013xxxxxxx</p>
          <p class="text-sm"><span class="font-medium">No. Rekening BNI:</span> 00xxxxxxx</p>
        </div>
      </div>

    </div>
  </div>

</div>



</x-utama>
