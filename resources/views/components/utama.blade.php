<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Legal Tech</title>

  <!-- Fonts -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
  document.addEventListener('alpine:init', () => {
    Alpine.store('documentModal', {
      openForm: false,
      openFolderForm: false
    });
  });
</script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data="globalApp()" class="font-sans antialiased">
<!-- Modal Tambah Dokumen -->
<div x-data="{ openForm: false, form: { name:'', type:'', case:'', storage:'' } }">
    
    <!-- Tombol buka modal -->
    <button @click="openForm = true" class="px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700">
        Tambah Dokumen
    </button>

    <!-- Modal -->
    <div x-show="openForm" 
         x-transition 
         class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-50"
         style="display:none">

        <div class="bg-white p-5 rounded-lg w-80">
            <h2 class="text-lg font-semibold mb-3">Tambah Dokumen</h2>

            <input x-model="form.name"     type="text" placeholder="Nama Dokumen" class="w-full border px-3 py-2 rounded mb-2">
               <select x-model="form.type" class="w-full border px-3 py-2 rounded mb-2">
            <option value="" disabled selected>Pilih Tipe File</option>
            <option value="PDF">PDF</option>
            <option value="Word">Word</option>
            <option value="Excel">Excel</option>
            <option value="PowerPoint">PowerPoint</option>
            <option value="Lainnya">Lainnya</option>
        </select>
            <input x-model="form.case"     type="text" placeholder="Pekerjaan" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="form.storage"  type="text" placeholder="Lokasi Penyimpanan" class="w-full border px-3 py-2 rounded mb-2">

            <button @click="saveDocument" 
                    class="px-4 py-2 bg-teal-600 text-white rounded-md w-full hover:bg-teal-700">
                Simpan
            </button>

            <button @click="openForm = false" class="mt-2 text-gray-500 w-full">Batal</button>
        </div>
    </div>

    <script>
        function saveDocument() {
            // Contoh: log data form, lo bisa ganti sesuai API
            console.log(this.form);
            alert('Dokumen tersimpan! (cek console)');
            this.openForm = false;
            // reset form
            this.form = { name:'', type:'', case:'', storage:'' };
        }
    </script>


  
<style>
    /* Border antar hari */
    .fc-theme-standard td, 
    .fc-theme-standard th {
        border: 1px solid #e5e7eb !important; /* Tailwind gray-200 */
    }

    /* Header hari (Sun, Mon, ...) */
    .fc-col-header-cell {
        background: #f9fafb; /* gray-50 */
        font-weight: 600;
        font-size: 0.9rem;
    }

    /* Grid background */
    .fc-daygrid-day {
        background: white;
    }

    /* Event item */
    .fc-event {
        border-radius: 6px !important;
        padding: 2px 6px !important;
    }
</style>


  <!-- Page Content -->
  <div class="antialiased bg-gray-50 dark:bg-gray-900">
    <nav
      class="bg-black  border-gray-200 px-4 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50 2xl:py-2">
      <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
          <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
            aria-controls="drawer-navigation"
            class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <svg aria-hidden="true" class="w-6 h-6  2xl:w-20" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"></path>
            </svg>
            <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Toggle sidebar</span>
          </button>
          <a href="https://flowbite.com" class="flex items-center justify-between mr-8">
            <span class="self-center text-xl  2xl:text-2xl  ml-3 text-white font-semibold whitespace-nowrap dark:text-white ">
             
                LEGAL</span>
            <img
              src="https://media.licdn.com/dms/image/v2/D560BAQEaOr1PqYeV6A/company-logo_200_200/company-logo_200_200/0/1731849540090/legal_plus_tech_logo?e=2147483647&v=beta&t=0jFIOW0dms0KWg2CuBnp3DzTY_NF2ou6F_8I2USZH2s"
              class="mr-3 ml-3 h-8 rounded-sm" alt="Flowbite Logo" />
          </a>
          <form action="#" method="GET" class="hidden md:block md:pl-2">
            <label for="topbar-search" class="sr-only">Serch</label>
            <div class="relative md:w-64 ">
              <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                  </path>
                </svg>
              </div>
              <input type="text" name="email" id="topbar-search"
                class="bg-gray-50 border rounded-md border-gray-300 text-gray-900 text-xs 2xl:text-[17px] 2xl:w-[400px] focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-0.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="cari dalam akun james" />
            </div>
          </form>
        </div>
        <div class="flex items-center lg:order-2">
          <div class="text-white text-[0.65rem] text-right p-1">

            <p>meeting at 20:30 <br></p>
            <p> at Bandung <br></p>
            <p id="waktu"></p>

<script>
function updateWaktu() {
    const sekarang = new Date();

    // Format: Hari Tanggal Bulan | Jam:Menit
    const hariArray = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
    const bulanArray = ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"];
    
    const hari = hariArray[sekarang.getDay()];
    const tanggal = sekarang.getDate();
    const bulan = bulanArray[sekarang.getMonth()];

    let jam = sekarang.getHours();
    let menit = sekarang.getMinutes();
    
    // Tambah 0 jika kurang dari 10
    if(jam < 10) jam = "0" + jam;
    if(menit < 10) menit = "0" + menit;

    document.getElementById("waktu").innerHTML = `${hari} ${tanggal} ${bulan} | ${jam}:${menit}`;
}

// Update tiap 1 menit
updateWaktu(); // langsung jalan
setInterval(updateWaktu, 60000);
</script>

          </div>
            <!-- Notifications -->
       <button type="button" data-dropdown-toggle="notification-dropdown"
  class="relative p-3 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 
  dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 
  focus:ring-gray-300 dark:focus:ring-gray-600">

  <!-- BADGE NOTIF -->
  <span
    class="absolute top-0.5 right-0.5 bg-green-600 text-white text-[10px] 
    font-semibold w-4 h-4 flex items-center justify-center rounded-full shadow">
    3
  </span>

  <span class="sr-only">View notifications</span>

  <!-- Bell icon -->
  <svg aria-hidden="true" class="w-6 h-6" fill="white" viewBox="0 0 20 20"
    xmlns="http://www.w3.org/2000/svg">
    <path
      d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
    </path>
  </svg>
</button>

          <!-- Dropdown menu -->
          <!-- NOTIFICATION DROPDOWN -->
          <div id="notification-dropdown"
            class="z-50 hidden w-80 max-w-sm rounded-xl border border-gray-200 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-800">

            <!-- HEADER -->
            <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-700">
              <p class="text-base font-semibold text-gray-900 dark:text-white">
                Pengingat Deadline
              </p>
              <p class="text-sm text-gray-500 dark:text-gray-400">
                3 tugas mendekati batas waktu
              </p>
            </div>

            <!-- LIST -->
            <div class="max-h-80 overflow-y-auto">

              <!-- ITEM 1 -->
              <a href="#" class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700">
                <div class="mt-1">
                  <svg class="w-6 h-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      d="M12 8v4l3 2m6-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </div>

                <div>
                  <p class="text-sm font-medium text-gray-900 dark:text-white">
                    Sidang PTUN – Besok 09:00
                  </p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">
                    Kasus: PT Maju • Ruang 3B
                  </p>
                </div>
              </a>

              <!-- ITEM 2 -->
              <a href="#" class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700">
                <div class="mt-1">
                  <svg class="w-6 h-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12h6m-3-3v6m9-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </div>

                <div>
                  <p class="text-sm font-medium text-gray-900 dark:text-white">
                    Revisi Draft Kontrak – 4 jam lagi
                  </p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">
                    Klien: IndoTrade Group
                  </p>
                </div>
              </a>

              <!-- ITEM 3 -->
              <a href="#" class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700">
                <div class="mt-1">
                  <svg class="w-6 h-6 text-green-700" fill="none" viewBox="http://www.w3.org/2000/svg"
                    stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                  </svg>
                </div>

                <div>
                  <p class="text-sm font-medium text-gray-900 dark:text-white">
                    Upload Bukti Dokumen – Hari ini 17:00
                  </p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">
                    Kasus: Sengketa Karyawan
                  </p>
                </div>
              </a>

            </div>

            <!-- FOOTER -->
            <div class="px-4 py-3 border-t border-gray-100 dark:border-gray-700">
              <a href="/deadline"
                class="block text-center text-sm font-medium text-green-700 hover:underline dark:text-green-400">
                Lihat Semua Deadline
              </a>
            </div>
          </div>

          <!-- Apps -->
          <button type="button" data-dropdown-toggle="apps-dropdown"
            class="p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
            <span class="sr-only">View notifications</span>
            <!-- Icon -->
            <svg class="w-6 h-6" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
              </path>
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div
            class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white divide-y divide-gray-100 shadow-lg dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
            id="apps-dropdown">
            <div
              class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">
              New
            </div>
            <div class="grid grid-cols-3 gap-4 p-4">
           <a href="#" onclick="openModalPengeluaran()"
   class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
    <svg aria-hidden="true"
      class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
      fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd"
        d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
        clip-rule="evenodd"></path>
    </svg>
    <div class="text-sm text-gray-900 dark:text-white">Pengeluaran</div>
</a>

              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                <svg aria-hidden="true"
                  class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                  </path>
                </svg>
                <div class="text-sm text-gray-900 dark:text-white">Users</div>
              </a>
   <button @click="openForm = true" x-cloak

        class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 z-[9999]">
        <svg aria-hidden="true"
                  class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                    clip-rule="evenodd"></path>
                </svg>
  <div class="text-sm text-gray-900 dark:text-white">Tambah File</div>
</button>


       
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                <svg aria-hidden="true"
                  class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                    clip-rule="evenodd"></path>
                </svg>
                <div class="text-sm text-gray-900 dark:text-white">
                  Profile
                </div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                <svg aria-hidden="true"
                  class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                    clip-rule="evenodd"></path>
                </svg>
                <div class="text-sm text-gray-900 dark:text-white">
                  Settings
                </div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                <svg aria-hidden="true"
                  class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                  <path fill-rule="evenodd"
                    d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
                </svg>
                <div class="text-sm text-gray-900 dark:text-white">
                  Products
                </div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                <svg aria-hidden="true"
                  class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z">
                  </path>
                  <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                    clip-rule="evenodd"></path>
                </svg>
                <div class="text-sm text-gray-900 dark:text-white">
                  Pricing
                </div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                <svg aria-hidden="true"
                  class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm2.5 3a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm6.207.293a1 1 0 00-1.414 0l-6 6a1 1 0 101.414 1.414l6-6a1 1 0 000-1.414zM12.5 10a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"
                    clip-rule="evenodd"></path>
                </svg>
                <div class="text-sm text-gray-900 dark:text-white">
                  Billing
                </div>
              </a>
              <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                <svg aria-hidden="true"
                  class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                  </path>
                </svg>
                <div class="text-sm text-gray-900 dark:text-white">
                  Logout
                </div>
              </a>
            </div>
          </div>

      
        </div>
      </div>
    </nav>

    <!-- Sidebar -->

    <aside
      class="fixed shadow-md top-32 2xl:top-44 border-gray-500 left-0 z-40 w-auto  rounded-2xl max-h-[calc(100vh-4rem)]  transition-transform -translate-x-full bg-white  md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
      aria-label="Sidenav" id="drawer-navigation">
      <div class="overflow-y-auto border-gray-300 py-5 rounded-2xl px-3 h-full bg-white dark:bg-gray-800">
        <form action="#" method="GET" class="md:hidden mb-2">
          <label for="sidebar-search" class="sr-only">Siiiearch</label>
          <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
              <svg class="w-3 h-3 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                </path>
              </svg>
            </div>
            <input type="text" name="search" id="sidebar-search"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              placeholder="cari dalam akun james" />
          </div>
        </form>
        <ul class="  space-y-2 border-gray-200 dark:border-gray-700">
       <li class="group relative">
  <a href="/oper"
     class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">

    <svg xmlns="http://www.w3.org/2000/svg"
      class="icon text-green-700 flex-shrink-0"
      fill="none" viewBox="0 0 24 24"
      stroke-width="2" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" d="M11 19V6M7 19V10M15 19v-4M19 19v-8" />
    </svg>

    <!-- Tooltip: FIXED biar keluar dari overflow -->
    <span class="fixed left-[70px]  /* sesuaikan biar keluar ke kanan */
                 bg-white text-green-500 text-sm font-medium
                 px-3 py-1 rounded-lg shadow-lg whitespace-nowrap
                 opacity-0 group-hover:opacity-100 transition-opacity
                 pointer-events-none">
      Overview
    </span>

  </a>
</li>
       <li class="group relative">
  <a href="/statistik"
     class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">

  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green-700" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v18h18" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 17l6-6 4 4 8-8" />
              </svg>

    <!-- Tooltip: FIXED biar keluar dari overflow -->
    <span class="fixed left-[70px]  /* sesuaikan biar keluar ke kanan */
                 bg-white text-green-500 text-sm font-medium
                 px-3 py-1 rounded-lg shadow-lg whitespace-nowrap
                 opacity-0 group-hover:opacity-100 transition-opacity
                 pointer-events-none">
      Pekerjaan
    </span>

  </a>
</li>
       <li class="group relative">
  <a href="/calendar"
     class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">

    <svg xmlns="http://www.w3.org/2000/svg" class="icon  text-green-700" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" class="w-5 h-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2V7H3v10a2 2 0 002 2z" />
              </svg>

    <!-- Tooltip: FIXED biar keluar dari overflow -->
    <span class="fixed left-[70px]  /* sesuaikan biar keluar ke kanan */
                 bg-white text-green-500 text-sm font-medium
                 px-3 py-1 rounded-lg shadow-lg whitespace-nowrap
                 opacity-0 group-hover:opacity-100 transition-opacity
                 pointer-events-none">
      Calendar
    </span>

  </a>
</li>
       <li class="group relative">
  <a href="/employee"
     class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">

   <svg xmlns="http://www.w3.org/2000/svg" class="icon  text-green-700" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" class="w-5 h-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
              </svg>

    <!-- Tooltip: FIXED biar keluar dari overflow -->
    <span class="fixed left-[70px]  /* sesuaikan biar keluar ke kanan */
                 bg-white text-green-500 text-sm font-medium
                 px-3 py-1 rounded-lg shadow-lg whitespace-nowrap
                 opacity-0 group-hover:opacity-100 transition-opacity
                 pointer-events-none">
      Karyawan
    </span>

  </a>
</li>
       <li class="group relative">
  <a href="/test"
     class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">

       <svg xmlns="http://www.w3.org/2000/svg" class="icon  text-green-700" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" >
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h6l2 3h10v11H3V7z" />
              </svg>

    <!-- Tooltip: FIXED biar keluar dari overflow -->
    <span class="fixed left-[70px]  /* sesuaikan biar keluar ke kanan */
                 bg-white text-green-500 text-sm font-medium
                 px-3 py-1 rounded-lg shadow-lg whitespace-nowrap
                 opacity-0 group-hover:opacity-100 transition-opacity
                 pointer-events-none">
      Document
    </span>

  </a>
</li>
       <li class="group relative">
  <a href="/jurnal"
     class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green-700" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 8h18M3 12h12m-9 4h3m-6 4h18a2 2 0 002-2V6a2 2 0 00-2-2H3a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>


    <!-- Tooltip: FIXED biar keluar dari overflow -->
    <span class="fixed left-[70px]  /* sesuaikan biar keluar ke kanan */
                 bg-white text-green-500 text-sm font-medium
                 px-3 py-1 rounded-lg shadow-lg whitespace-nowrap
                 opacity-0 group-hover:opacity-100 transition-opacity
                 pointer-events-none">
      Jurnal
    </span>

  </a>
</li>


          {{-- <li>
            <a href="/anjas"
              class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green-700" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 8h18M3 12h12m-9 4h3m-6 4h18a2 2 0 002-2V6a2 2 0 00-2-2H3a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>



            </a>
          </li> --}}
       <li class="group relative">
  <a href="/case"
     class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon  text-green-700" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 3v18m0-18l6 6m-6-6L6 9m9 12H9m9-9h-6m-6 0h6" />
              </svg>

    <!-- Tooltip: FIXED biar keluar dari overflow -->
    <span class="fixed left-[70px]  /* sesuaikan biar keluar ke kanan */
                 bg-white text-green-500 text-sm font-medium
                 px-3 py-1 rounded-lg shadow-lg whitespace-nowrap
                 opacity-0 group-hover:opacity-100 transition-opacity
                 pointer-events-none">
      Tugas
    </span>

  </a>
</li>
       <li class="group relative">
  <a href="/help"
     class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
          <svg class="h-5 w-5 2xl:w-6 2xl:h-6 text-red-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" class="icon">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 8v4m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
              </svg>

    <!-- Tooltip: FIXED biar keluar dari overflow -->
    <span class="fixed left-[70px]  /* sesuaikan biar keluar ke kanan */
                 bg-white text-green-500 text-sm font-medium
                 px-3 py-1 rounded-lg shadow-lg whitespace-nowrap
                 opacity-0 group-hover:opacity-100 transition-opacity
                 pointer-events-none">
      Bantuan
    </span>

  </a>
</li>
      
  
        </ul>
    

      </div>

    </aside>
    <main data-aos="fade-left" class="p-4 mt-10 pt-20 lg:ml-20">

      {{ $slot }}
    </main>
    <div id="lapor-modal" tabindex="-1" aria-hidden="true"
      class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-[9999] justify-center items-center">
      <div class="relative p-4 w-full max-w-md max-h-full">

        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">

          <!-- Header -->
          <div class="flex items-center justify-between p-4 border-b rounded-t">
            <h3 class="text-xl font-semibold text-gray-900">
              Laporkan Pegawai
            </h3>
            <button type="button" data-modal-hide="lapor-modal"
              class="text-gray-400 hover:bg-gray-200 rounded-lg text-sm p-1.5">
              <svg class="icon" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- Body -->
          <div class="p-4 space-y-4">

            <div>
              <label class="block text-sm font-medium mb-1">Nama Pegawai</label>
              <input type="text"
                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-green-600 focus:ring-green-600"
                placeholder="Contoh: Ahmad Fikri">
            </div>

            <div>
              <label class="block text-sm font-medium mb-1">Keluhan</label>
              <textarea rows="3"
                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-green-600 focus:ring-green-600"
                placeholder="Tulis keluhan Anda..."></textarea>
            </div>

          </div>

          <!-- Footer -->
          <div class="flex justify-end gap-2 p-4 border-t">
            <button data-modal-hide="lapor-modal" class="px-4 py-2 text-sm border rounded-lg hover:bg-gray-100">
              Batal
            </button>

            <button class="px-4 py-2 text-sm text-white bg-green-700 rounded-lg hover:bg-green-800">
              Kirim
            </button>
          </div>

        </div>

      </div>
    </div>

  </div>


<div id="modalPengeluaran" class="fixed inset-0 bg-black/40 hidden flex items-center justify-center z-50">

    <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6 animate-scaleIn">

        <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Pengeluaran</h2>

        <!-- Form dummy -->
        <form class="space-y-4">

            <div>
                <label class="text-sm font-medium">Tipe Pengeluaran</label>
                <select class="w-full mt-1 px-3 py-2 border rounded-md">
                    <option>Transport</option>
                    <option>Operasional</option>
                    <option>Konsumsi</option>
                    <option>Lainnya</option>
                </select>
            </div>

            <div>
                <label class="text-sm font-medium">Deskripsi</label>
                <input type="text" class="w-full mt-1 px-3 py-2 border rounded-md"
                    placeholder="Contoh: Pembelian ATK">
            </div>

            <div>
                <label class="text-sm font-medium">Nominal</label>
                <input type="number" class="w-full mt-1 px-3 py-2 border rounded-md"
                    placeholder="Contoh: 250000">
            </div>

            <div>
                <label class="text-sm font-medium">Tenggat / Tanggal</label>
                <input type="date" class="w-full mt-1 px-3 py-2 border rounded-md">
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="closeModalPengeluaran()"
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">
                    Tutup
                </button>

                <button type="button"
                    class="px-4 py-2 bg-teal-500 hover:bg-teal-600 text-white rounded-lg shadow">
                    Oke
                </button>
            </div>

        </form>
    </div>
</div>
<script>
function openModalPengeluaran() {
    document.getElementById('modalPengeluaran').classList.remove('hidden');
}
function closeModalPengeluaran() {
    document.getElementById('modalPengeluaran').classList.add('hidden');
}
</script>

</body>

</html>