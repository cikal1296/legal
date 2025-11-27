<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Legal Tech</title>
<link rel="icon" href="{{ asset('img/fix.png') }}" type="image/png">
<link rel="shortcut icon" href="{{ asset('img/fix.png') }}" type="image/png">

  <!-- Fonts -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  <script src="https://cdn.tailwindcss.com"></script>
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
      class="bg-black  border-gray-200 px-4 dark:bg-gray-800 py-1 dark:border-gray-700 fixed left-0 right-0 top-0 z-50 2xl:py-2">
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
            <span class="self-center text-[25px]  2xl:text-3xl  ml-3 text-white font-semibold whitespace-nowrap dark:text-white ">
             
                LEGAL</span>
            <img
              src="\img\fix.png"
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
              class="bg-gray-50 border rounded-md border-gray-300 text-gray-900 text-xs 2xl:text-[17px] w-full 2xl:w-[400px] focus:ring-primary-500 focus:border-primary-500 block pl-10 p-0.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="cari dalam akun james" />
            </div>
          </form>
        </div>
        <div class="flex items-center lg:order-2">
          <div class="text-white text-[0.65rem] text-right p-1">

            <p>meeting at 20:30 | Bandung <br></p>
          
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
  class="relative p-1 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 
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
  <svg aria-hidden="true" class="w-6 h-6 2xl:w-7 2xl:h-7" fill="white" viewBox="0 0 20 20"
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
                  <svg class="w-7 h-7 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
            class="pr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
            <span class="sr-only">View notifications</span>
            <!-- Icon -->
            <svg class="w-6 h-6 2xl:w-7 2xl:h-7 " fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
  <aside id="sidebar" class="fixed left-0 top-20 xl:top-20 xl:bottom-15 2xl:top-24 z-40 rounded-2xl shadow-md
    w-12 transition-all duration-300 overflow-hidden bg-white dark:bg-gray-800 border-gray-500 dark:border-gray-700 group">
  <div class="flex flex-col py-5 px-1 gap-2 h-full">

    <a href="/oper" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg class="icon text-green-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11 19V6M7 19V10M15 19v-4M19 19v-8" />
      </svg>
      <span class="opacity-0 w-0 overflow-hidden whitespace-nowrap transition-all duration-300">Overview</span>
    </a>

    <a href="/dfcase" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg class="icon text-green-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M4 10l8-5 8 5M6 10v8m4-8v8m4-8v8m4-8v8M3 18h18" />
      </svg>
      <span class="opacity-0 w-0 overflow-hidden whitespace-nowrap transition-all duration-300">Manage Cases</span>
    </a>

    <a href="/statistik" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg class="icon text-green-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 20v-1a6 6 0 0112 0v1" />
      </svg>
      <span class="opacity-0 w-0 overflow-hidden whitespace-nowrap transition-all duration-300">Contact</span>
    </a>

    <a href="/case" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg class="icon text-green-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m0-18l6 6m-6-6L6 9m9 12H9m9-9h-6m-6 0h6" />
      </svg>
      <span class="opacity-0 w-0 overflow-hidden whitespace-nowrap transition-all duration-300">Tugas</span>
    </a>

    <a href="/calendar" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg class="icon text-green-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2V7H3v10a2 2 0 002 2z" />
      </svg>
      <span class="opacity-0 w-0 overflow-hidden whitespace-nowrap transition-all duration-300">Calendar</span>
    </a>

    <a href="/jurnal" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg class="icon text-green-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8h18M3 12h12m-9 4h3m-6 4h18a2 2 0 002-2V6a2 2 0 00-2-2H3a2 2 0 00-2 2v12a2 2 0 002 2z" />
      </svg>
      <span class="opacity-0 w-0 overflow-hidden whitespace-nowrap transition-all duration-300">Jurnal</span>
    </a>

    <a href="/test" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg class="icon text-green-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h6l2 3h10v11H3V7z" />
      </svg>
      <span class="opacity-0 w-0 overflow-hidden whitespace-nowrap transition-all duration-300">Document</span>
    </a>

    <a href="/invoice" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg class="icon text-green-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M7 3h7l4 4v12a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M9 16h6M9 8h3" />
      </svg>
      <span class="opacity-0 w-0 overflow-hidden whitespace-nowrap transition-all duration-300">Invoice</span>
    </a>

    <hr class="my-2 border-gray-300 dark:border-gray-600 pb-10">

    <a href="/setting" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 mt-auto">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="icon h-6 w-6 text-green-700 flex-shrink-0 transition-transform duration-500 group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="32" stroke-linecap="round" stroke-linejoin="round">
      <path d="M259.1 73.5C262.1 58.7 275.2 48 290.4 48L350.2 48C365.4 48 378.5 58.7 381.5 73.5L396 143.5C410.1 149.5 423.3 157.2 435.3 166.3L503.1 143.8C517.5 139 533.3 145 540.9 158.2L570.8 210C578.4 223.2 575.7 239.8 564.3 249.9L511 297.3C511.9 304.7 512.3 312.3 512.3 320C512.3 327.7 511.8 335.3 511 342.7L564.4 390.2C575.8 400.3 578.4 417 570.9 430.1L541 481.9C533.4 495 517.6 501.1 503.2 496.3L435.4 473.8C423.3 482.9 410.1 490.5 396.1 496.6L381.7 566.5C378.6 581.4 365.5 592 350.4 592L290.6 592C275.4 592 262.3 581.3 259.3 566.5L244.9 496.6C230.8 490.6 217.7 482.9 205.6 473.8L137.5 496.3C123.1 501.1 107.3 495.1 99.7 481.9L69.8 430.1C62.2 416.9 64.9 400.3 76.3 390.2L129.7 342.7C128.8 335.3 128.4 327.7 128.4 320C128.4 312.3 128.9 304.7 129.7 297.3L76.3 249.8C64.9 239.7 62.3 223 69.8 209.9L99.7 158.1C107.3 144.9 123.1 138.9 137.5 143.7L205.3 166.2C217.4 157.1 230.6 149.5 244.6 143.4L259.1 73.5zM320.3 400C364.5 399.8 400.2 363.9 400 319.7C399.8 275.5 363.9 239.8 319.7 240C275.5 240.2 239.8 276.1 240 320.3C240.2 364.5 276.1 400.2 320.3 400z"/>
    </svg>
    <span class="opacity-0 w-0 overflow-hidden whitespace-nowrap transition-all duration-300 group-hover:opacity-100 group-hover:w-auto">Setting</span>
  </a>
    <a href="/help" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 mt-auto">
      <svg class="icon text-red-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
      </svg>
      <span class="opacity-0 w-0 overflow-hidden whitespace-nowrap transition-all duration-300">Bantuan</span>
    </a>

  </div>
</aside>
<main id="main-content" class="transition-all duration-300 ml-12 lg:ml-10 p-2 pt-7">
  <div data-aos="fade-left" class="relative top-0 left-0">
    {{ $slot }}
  </div>
</main>
<script>
  const sidebar = document.getElementById('sidebar');
  const main = document.querySelector('main');

  const wCollapsed = 48; // 12*4
  const wExpanded = 224; // 56*4

  sidebar.addEventListener('mouseenter', () => {
    sidebar.classList.remove('w-12');
    sidebar.classList.add('w-48');
    sidebar.querySelectorAll('span').forEach(span => {
      span.classList.remove('opacity-0','w-0','overflow-hidden');
      span.classList.add('opacity-100','w-auto','overflow-visible');
    });
    if(main) main.style.marginLeft = `${wExpanded}px`;
  });

  sidebar.addEventListener('mouseleave', () => {
    sidebar.classList.remove('w-48');
    sidebar.classList.add('w-12');
    sidebar.querySelectorAll('span').forEach(span => {
      span.classList.add('opacity-0','w-0','overflow-hidden');
      span.classList.remove('opacity-100','w-auto','overflow-visible');
    });
    if(main) main.style.marginLeft = `${wCollapsed}px`;
  });
</script>

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
{{-- script calendar --}}
<script>
  // Data dummy versi perusahaan & pribadi
  let eventsData = {
    company: [
      { id: 1, title: "Meeting Jordan", location: "Finansial", start: 8, end: 9, day: 1, desc: "Diskusi keuangan Q1", color: "bg-blue-400" },
      { id: 2, title: "Meeting Raudra", location: "Properti", start: 8, end: 9, day: 3, desc: "Update proyek", color: "bg-green-400" },
      { id: 3, title: "Meeting Steven", location: "Hukum", start: 9, end: 10, day: 5, desc: "Review kontrak", color: "bg-purple-400" },
      { id: 4, title: "Meeting Khalid", location: "Merger", start: 8, end: 9, day: 4, desc: "Diskusi merger", color: "bg-red-400" }
    ],
    personal: [
      { id: 101, title: "Dokter", location: "Klinik", start: 9, end: 10, day: 2, desc: "Check-up tahunan", color: "bg-purple-400" },
      { id: 102, title: "Gym", location: "Fitness Center", start: 7, end: 8, day: 4, desc: "Latihan rutin", color: "bg-green-400" },
      { id: 103, title: "Kumpul Keluarga", location: "Rumah", start: 11, end: 13, day: 6, desc: "Makan malam bersama", color: "bg-red-400" }
    ]
  };

  const SLOT_HEIGHT = 64;
  const daysShort = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
  const monthNames = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

  let currentVersion = 'company';
  let currentYear = new Date().getFullYear();
  let currentMonth = new Date().getMonth();
  let currentWeekNumber = 1;

  // Dapatkan tanggal awal minggu ke-n di bulan dan tahun tertentu
  function getFirstDateOfWeek(year, month, weekNum) {
    let firstDayOfMonth = new Date(year, month, 1);
    let firstDayWeekday = firstDayOfMonth.getDay();
    let firstSunday = new Date(firstDayOfMonth);
    firstSunday.setDate(firstDayOfMonth.getDate() - firstDayWeekday);
    let result = new Date(firstSunday);
    result.setDate(firstSunday.getDate() + 7 * (weekNum - 1));
    return result;
  }

  // Update header
  function updateHeader() {
    document.getElementById('monthYearBtn').textContent = `${monthNames[currentMonth]} ${currentYear}`;
    document.getElementById('weekLabel').textContent = `Minggu ${currentWeekNumber}`;
    let firstDateOfWeek = getFirstDateOfWeek(currentYear, currentMonth, currentWeekNumber);
    for(let i = 0; i < 7; i++) {
      let dt = new Date(firstDateOfWeek);
      dt.setDate(firstDateOfWeek.getDate() + i);
      let headerEl = document.getElementById(`header${daysShort[i]}`);
      if(headerEl) {
        let dateNum = dt.getDate();
        headerEl.textContent = `${daysShort[i]} ${dateNum}`;
        const now = new Date();
        if(dt.toDateString() === now.toDateString()) {
          headerEl.classList.add("bg-green-500", "text-white", "rounded-md");
        } else {
          headerEl.classList.remove("bg-green-500", "text-white", "rounded-md");
        }
      }
    }
  }

  // Render event ke kalender
  function renderEvents() {
    for(let i=0; i<7; i++) {
      const col = document.getElementById(`day-${i}`);
      col.innerHTML = '';
      for(let h=6; h<16; h++) {
        const slot = document.createElement('div');
        slot.className = "border-b border-gray-200 slot-height relative";
        col.appendChild(slot);
      }
    }
    let firstDateOfWeek = getFirstDateOfWeek(currentYear, currentMonth, currentWeekNumber);
    if(!eventsData[currentVersion]) return;
    eventsData[currentVersion].forEach(ev => {
      if(ev.day < 0 || ev.day > 6) return;
      let eventDate = new Date(firstDateOfWeek);
      eventDate.setDate(firstDateOfWeek.getDate() + ev.day);
      if(eventDate.getMonth() !== currentMonth) return;
      const col = document.getElementById(`day-${ev.day}`);
      if(!col) return;
      const top = (ev.start - 6) * SLOT_HEIGHT;
      const height = (ev.end - ev.start) * SLOT_HEIGHT;
      const eventBox = document.createElement('div');
      eventBox.className = `event-box ${ev.color}`;
      eventBox.style.top = `${top}px`;
      eventBox.style.height = `${height - 4}px`;
      eventBox.textContent = ev.title;
      eventBox.title = ev.title;
      eventBox.addEventListener('click', () => showEventDetail(ev, eventDate));
      col.appendChild(eventBox);
    });
  }

  // Tampilkan detail event
  function showEventDetail(ev, eventDate) {
    document.getElementById('detailTitle').textContent = ev.title;
    document.getElementById('detailLocation').textContent = ev.location;
    document.getElementById('detailTime').textContent = `${ev.start}:00 - ${ev.end}:00, ${eventDate.toLocaleDateString('id-ID', { weekday:'long', day:'numeric', month:'long', year:'numeric' })}`;
    document.getElementById('detailDescription').textContent = ev.desc || "-";
    document.getElementById('eventDetail').classList.remove('hidden');
    window.scrollTo({top: document.body.scrollHeight, behavior: "smooth"});
  }

  // Dropdown bulan
  const monthYearBtn = document.getElementById('monthYearBtn');
  const monthDropdown = document.getElementById('monthDropdown');
  let dropdownOpen = false;
  function closeDropdown() {
    monthDropdown.classList.add('hidden');
    dropdownOpen = false;
  }
  function openDropdown() {
    monthDropdown.classList.remove('hidden');
    dropdownOpen = true;
  }
  function fillMonthDropdown() {
    monthDropdown.innerHTML = '';
    monthNames.forEach((name, i) => {
      let div = document.createElement('div');
      div.textContent = name;
      if(i === currentMonth) {
        div.classList.add('font-semibold', 'text-green-700');
      }
      div.addEventListener('click', () => {
        currentMonth = i;
        currentWeekNumber = 1;
        updateHeader();
        renderEvents();
        closeDropdown();
      });
      monthDropdown.appendChild(div);
    });
  }
  monthYearBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    if(dropdownOpen) closeDropdown();
    else {
      fillMonthDropdown();
      openDropdown();
    }
  });
  document.addEventListener('click', () => {
    if(dropdownOpen) closeDropdown();
  });

  // Navigasi minggu
  document.getElementById('prevWeekBtn').addEventListener('click', () => {
    if(currentWeekNumber > 1) {
      currentWeekNumber--;
      updateHeader();
      renderEvents();
      document.getElementById('eventDetail').classList.add('hidden');
    }
  });
  document.getElementById('nextWeekBtn').addEventListener('click', () => {
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    const firstDayWeekday = new Date(currentYear, currentMonth, 1).getDay();
    const totalSlots = daysInMonth + firstDayWeekday;
    const maxWeek = Math.ceil(totalSlots / 7);
    if(currentWeekNumber < maxWeek) {
      currentWeekNumber++;
      updateHeader();
      renderEvents();
      document.getElementById('eventDetail').classList.add('hidden');
    }
  });

  // Switch versi kalender
  document.querySelectorAll('input[name="version"]').forEach(radio => {
    radio.addEventListener('change', e => {
      currentVersion = e.target.value;
      renderEvents();
      document.getElementById('eventDetail').classList.add('hidden');
    });
  });

  // Mini Calendar
  const miniCalendarContainer = document.getElementById('miniCalendar');
  let miniCalDate = new Date();

  function renderMiniCalendar() {
    miniCalendarContainer.innerHTML = '';
    const year = miniCalDate.getFullYear();
    const month = miniCalDate.getMonth();
    const monthYear = document.createElement('div');
    monthYear.className = "flex justify-between items-center mb-2";
    monthYear.innerHTML = `
      <button id="prevMiniMonth" class="font-bold px-2 py-1 hover:bg-green-200 rounded">&lt;</button>
      <span class="font-semibold">${monthNames[month]} ${year}</span>
      <button id="nextMiniMonth" class="font-bold px-2 py-1 hover:bg-green-200 rounded">&gt;</button>
    `;
    miniCalendarContainer.appendChild(monthYear);

    const daysRow = document.createElement('table');
    daysRow.className = "table-fixed w-full text-sm text-center border-collapse";
    const thead = document.createElement('thead');
    const tr = document.createElement('tr');
    ["Su","Mo","Tu","We","Th","Fr","Sa"].forEach(d => {
      const th = document.createElement('th');
      th.textContent = d;
      tr.appendChild(th);
    });
    thead.appendChild(tr);
    daysRow.appendChild(thead);

    const tbody = document.createElement('tbody');
    let firstDay = new Date(year, month, 1);
    let lastDay = new Date(year, month + 1, 0);
    let daysInMonth = lastDay.getDate();
    let startDay = firstDay.getDay();

    let dayCount = 1;
    for(let week=0; week<6; week++) {
      const trBody = document.createElement('tr');
      for(let d=0; d<7; d++) {
        const td = document.createElement('td');
        if(week === 0 && d < startDay) {
          td.textContent = '';
        } else if(dayCount > daysInMonth) {
          td.textContent = '';
        } else {
          td.textContent = dayCount;
          const today = new Date();
          if(dayCount === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
            td.classList.add('today');
          }
          td.addEventListener('click', () => {
            currentYear = year;
            currentMonth = month;
            currentWeekNumber = Math.floor((dayCount + startDay - 1) / 7) + 1;
            updateHeader();
            renderEvents();
          });
          dayCount++;
        }
        trBody.appendChild(td);
      }
      tbody.appendChild(trBody);
    }
    daysRow.appendChild(tbody);
    miniCalendarContainer.appendChild(daysRow);

    document.getElementById('prevMiniMonth').onclick = () => {
      miniCalDate.setMonth(miniCalDate.getMonth() - 1);
      renderMiniCalendar();
    };
    document.getElementById('nextMiniMonth').onclick = () => {
      miniCalDate.setMonth(miniCalDate.getMonth() + 1);
      renderMiniCalendar();
    };
  }

  // Modal add event
  const modal = document.getElementById('modalAddEvent');
  const btnAdd = document.getElementById('btnAddEvent');
  const btnCancel = document.getElementById('btnCancel');
  const formAdd = document.getElementById('formAddEvent');

  btnAdd.onclick = () => {
    modal.classList.remove('hidden');
    formAdd.reset();
  };
  btnCancel.onclick = () => {
    modal.classList.add('hidden');
  };
  modal.onclick = e => {
    if(e.target === modal) {
      modal.classList.add('hidden');
    }
  };
  formAdd.onsubmit = e => {
    e.preventDefault();
    const formData = new FormData(formAdd);
    const day = parseInt(formData.get('day'));
    const start = parseInt(formData.get('start'));
    const end = parseInt(formData.get('end'));
    const title = formData.get('title').trim();
    const location = formData.get('location').trim();
    const desc = formData.get('desc').trim();

    if(isNaN(day) || isNaN(start) || isNaN(end) || !title) {
      alert("Mohon isi semua dengan benar.");
      return;
    }
    if(start < 6 || end > 15 || start >= end) {
      alert("Jam mulai harus lebih kecil dari jam selesai dan dalam rentang 6-15.");
      return;
    }

    const newId = Date.now();
    const colors = ["bg-blue-400","bg-green-400","bg-purple-400","bg-red-400"];
    const randColor = colors[Math.floor(Math.random() * colors.length)];

    const newEvent = { id: newId, day, start, end, title, location, desc, color: randColor };
    eventsData[currentVersion].push(newEvent);
    renderEvents();
    modal.classList.add('hidden');
    alert("Kegiatan berhasil ditambahkan!");
  };

  // Inisialisasi awal
  updateHeader();
  renderEvents();
  renderMiniCalendar();
</script>
</body>

</html>