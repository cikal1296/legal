<x-utama>
  <style>
    .slot-height {
      height: 64px;
    }
    .event-box {
      position: absolute;
      left: 0.25rem;
      right: 0.25rem;
      border-radius: 0.375rem;
      padding: 0.25rem 0.5rem;
      font-size: 0.75rem;
      color: white;
      cursor: pointer;
      overflow: hidden;
      box-shadow: 0 2px 6px rgb(0 0 0 / 0.15);
      transition: transform 0.15s ease;
      border: 2px solid transparent;
    }
    .event-box:hover {
      border-color: white;
      transform: scale(1.05);
      z-index: 10;
    }
    /* Mini Calendar styling */
    #miniCalendar table {
      table-layout: fixed;
      width: 100%;
    }
    #miniCalendar td, #miniCalendar th {
      width: 14.28%;
      text-align: center;
      padding: 8px 0;
      cursor: pointer;
      border-radius: 0.375rem;
      user-select: none;
    }
    #miniCalendar td:hover {
      background-color: #DCFCE7; /* bg-green-100 */
    }
    #miniCalendar .today {
      background-color: #22C55E; /* bg-green-500 */
      color: white;
      font-weight: 600;
    }
    #miniCalendar .selected {
      background-color: #15803D; /* bg-green-700 */
      color: white;
      font-weight: 600;
    }
    /* Versi kalender radio hijau custom */
    .custom-radio {
      position: relative;
      display: block;
      padding-left: 30px;
      margin-bottom: 12px;
      cursor: pointer;
      font-weight: 600;
      color: #166534; /* green-800 */
      user-select: none;
    }
    .custom-radio input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }
    .checkmark {
      position: absolute;
      left: 0; top: 4px;
      height: 20px; width: 20px;
      background-color: #BBF7D0; /* green-200 */
      border: 2px solid #22C55E; /* green-500 */
      border-radius: 9999px;
      transition: background-color 0.3s ease;
    }
    .custom-radio:hover input ~ .checkmark {
      background-color: #86EFAC; /* green-300 */
    }
    .custom-radio input:checked ~ .checkmark {
      background-color: #22C55E; /* green-500 */
      border-color: #16A34A; /* green-600 */
    }
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }
    .custom-radio input:checked ~ .checkmark:after {
      display: block;
    }
    .custom-radio .checkmark:after {
      left: 6px;
      top: 2.5px;
      width: 6px;
      height: 12px;
      border: solid white;
      border-width: 0 2px 2px 0;
      transform: rotate(45deg);
    }
    /* Bulan dropdown styling */
    #monthDropdown {
      position: absolute;
      background: white;
      border: 2px solid #22C55E;
      border-radius: 0.5rem;
      width: 14rem;
      margin-top: 0.25rem;
      box-shadow: 0 6px 12px rgba(34,197,94,0.3);
      max-height: 240px;
      overflow-y: auto;
      z-index: 50;
    }
    #monthDropdown div {
      padding: 0.5rem 1rem;
      cursor: pointer;
      user-select: none;
    }
    #monthDropdown div:hover {
      background-color: #BBF7D0; /* bg-green-200 */
    }
  </style>


<div class="pl-3">


  <!-- Header kalender: navigasi minggu dan pilih bulan -->
  <div class="flex justify-between items-center mb-6 max-w-7xl w-full px-4 relative">
    <div class="flex items-center space-x-6">
      <button id="prevWeekBtn" class="px-3 py-1 rounded hover:bg-green-200 transition focus:outline-none focus:ring-2 focus:ring-green-400">&lt;</button>
      <span id="weekLabel" class="font-semibold text-gray-700 text-lg select-none">Minggu 1</span>
      <button id="nextWeekBtn" class="px-3 py-1 rounded hover:bg-green-200 transition focus:outline-none focus:ring-2 focus:ring-green-400">&gt;</button>
    </div>
    <div class="relative">
        <div class="flex">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green-700 w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M3 11h18M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z"/>
  <path stroke-linecap="round" stroke-linejoin="round" d="M7 14h10M7 17h10" />
</svg>

      <button id="monthYearBtn" class="text-xl font-semibold text-gray-800 hover:text-green-600 transition select-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-green-400"></button>
      <!-- Dropdown bulan -->
      
      <div id="monthDropdown" class="hidden"></div>
      </div>
    </div>
  </div>
  
  <!-- Wrapper utama: Kalender besar & Sidebar -->
<div class="max-w-7xl mx-auto w-full flex gap-6">

    <div class="flex-1 min-w-0 bg-white rounded-lg shadow border border-gray-300 relative">

      <!-- Header Hari -->
      <div class="grid grid-cols-[70px_repeat(7,1fr)] border-b border-gray-300 select-none">
        <div class="p-2"></div>
        <div class="text-center font-semibold text-gray-600 p-2" id="headerSun"></div>
        <div class="text-center font-semibold text-gray-600 p-2" id="headerMon"></div>
        <div class="text-center font-semibold text-gray-600 p-2" id="headerTue"></div>
        <div class="text-center font-semibold text-gray-600 p-2" id="headerWed"></div>
        <div class="text-center font-semibold text-gray-600 p-2" id="headerThu"></div>
        <div class="text-center font-semibold text-gray-600 p-2" id="headerFri"></div>
        <div class="text-center font-semibold text-gray-600 p-2" id="headerSat"></div>
      </div>
      <!-- Jam Vertikal + Kolom Hari -->
      <div class="grid grid-cols-[70px_repeat(7,1fr)] relative min-h-[640px]">
        <div class="border-r border-gray-300 select-none">
          <div class="slot-height flex items-center justify-center text-gray-500 text-xs border-b border-gray-200">6:00</div>
          <div class="slot-height flex items-center justify-center text-gray-500 text-xs border-b border-gray-200">7:00</div>
          <div class="slot-height flex items-center justify-center text-gray-500 text-xs border-b border-gray-200">8:00</div>
          <div class="slot-height flex items-center justify-center text-gray-500 text-xs border-b border-gray-200">9:00</div>
          <div class="slot-height flex items-center justify-center text-gray-500 text-xs border-b border-gray-200">10:00</div>
          <div class="slot-height flex items-center justify-center text-gray-500 text-xs border-b border-gray-200">11:00</div>
          <div class="slot-height flex items-center justify-center text-gray-500 text-xs border-b border-gray-200">12:00</div>
          <div class="slot-height flex items-center justify-center text-gray-500 text-xs border-b border-gray-200">13:00</div>
          <div class="slot-height flex items-center justify-center text-gray-500 text-xs border-b border-gray-200">14:00</div>
          <div class="slot-height flex items-center justify-center text-gray-500 text-xs border-b border-gray-200">15:00</div>
        </div>
        <div id="day-0" class="border-r border-gray-300 relative cursor-pointer"></div>
        <div id="day-1" class="border-r border-gray-300 relative cursor-pointer"></div>
        <div id="day-2" class="border-r border-gray-300 relative cursor-pointer"></div>
        <div id="day-3" class="border-r border-gray-300 relative cursor-pointer"></div>
        <div id="day-4" class="border-r border-gray-300 relative cursor-pointer"></div>
        <div id="day-5" class="border-r border-gray-300 relative cursor-pointer"></div>
        <div id="day-6" class="relative cursor-pointer"></div>
      </div>
    </div>

    <!-- Sidebar kanan -->
    <div class="w-64 flex-shrink-0 flex flex-col gap-6">


      <!-- Mini Calendar -->
      <div class="bg-white p-4 rounded-lg shadow border border-green-400 select-none">
        <div id="miniCalendar" class="text-center"></div>
      </div>

      <!-- Versi Kalender -->
      <div class="bg-green-50 p-5 rounded-lg shadow border border-green-400">
        <h3 class="font-semibold mb-3 text-green-700 text-lg">Pilih Versi Kalender</h3>
        <label class="custom-radio">
          <input type="radio" name="version" value="company" checked />
          <span class="checkmark"></span>
          Kalender Perusahaan
        </label>
        <label class="custom-radio">
          <input type="radio" name="version" value="personal" />
          <span class="checkmark"></span>
          Kalender Pribadi
        </label>

        <!-- Tombol Tambah Kegiatan -->
        <button id="btnAddEvent" class="mt-4 w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition focus:outline-none focus:ring-2 focus:ring-green-400">
          + Tambah Kegiatan
        </button>
      </div>
    </div>
  </div>

  <!-- Detail Event -->
  <div id="eventDetail" class="max-w-7xl mx-auto mt-6 p-5 bg-white rounded-lg shadow border border-gray-300 hidden">
    <h3 id="detailTitle" class="font-bold text-xl mb-2"></h3>
    <p><span class="font-semibold">Lokasi:</span> <span id="detailLocation"></span></p>
    <p><span class="font-semibold">Waktu:</span> <span id="detailTime"></span></p>
    <p class="mt-3" id="detailDescription"></p>
  </div>

  <!-- Modal tambah kegiatan -->
  <div id="modalAddEvent" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
      <h2 class="text-xl font-semibold mb-4">Tambah Kegiatan Baru</h2>
      <form id="formAddEvent" class="space-y-4">
        <div>
          <label for="inputDay" class="block font-semibold mb-1">Pilih Hari</label>
          <select id="inputDay" name="day" required class="w-full border border-gray-300 rounded px-3 py-2">
            <option value="">-- Pilih Hari --</option>
            <option value="0">Minggu</option>
            <option value="1">Senin</option>
            <option value="2">Selasa</option>
            <option value="3">Rabu</option>
            <option value="4">Kamis</option>
            <option value="5">Jumat</option>
            <option value="6">Sabtu</option>
          </select>
        </div>
        <div class="flex gap-4">
          <div class="flex-1">
            <label for="inputStart" class="block font-semibold mb-1">Jam Mulai (6-15)</label>
            <input type="number" id="inputStart" name="start" min="6" max="15" required class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Jam mulai" />
          </div>
          <div class="flex-1">
            <label for="inputEnd" class="block font-semibold mb-1">Jam Selesai (6-15)</label>
            <input type="number" id="inputEnd" name="end" min="6" max="15" required class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Jam selesai" />
          </div>
        </div>
        <div>
          <label for="inputTitle" class="block font-semibold mb-1">Judul Kegiatan</label>
          <input type="text" id="inputTitle" name="title" required class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Contoh: Meeting Project" />
        </div>
        <div>
          <label for="inputLocation" class="block font-semibold mb-1">Lokasi</label>
          <input type="text" id="inputLocation" name="location" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Contoh: Ruang Rapat 1" />
        </div>
        <div>
          <label for="inputDesc" class="block font-semibold mb-1">Deskripsi</label>
          <textarea id="inputDesc" name="desc" rows="3" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Deskripsi singkat (opsional)"></textarea>
        </div>
        <div class="flex justify-end gap-4">
          <button type="button" id="btnCancel" class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100">Batal</button>
          <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


</x-utama>