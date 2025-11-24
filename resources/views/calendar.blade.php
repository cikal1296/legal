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
</head>
<body class="bg-gray-50 p-6 min-h-screen flex flex-col items-center">

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
  <div class="max-w-7xl w-full flex gap-6">
    
    <!-- Kalender Besar -->
    <div class="flex-1 bg-white rounded-lg shadow border border-gray-300 relative">
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
    <div class="w-64 flex flex-col gap-6">

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

</x-utama>