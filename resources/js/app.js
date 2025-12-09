import './bootstrap';
import AOS from "aos";
AOS.init();



import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function() {
  const calendarEl = document.getElementById('calendar');
  const calendar = new Calendar(calendarEl, {
    plugins: [ dayGridPlugin, interactionPlugin ],
    initialView: 'dayGridMonth',
    events: '/events', // endpoint untuk ambil data event dari Laravel
    dateClick: function(info) {
      alert('Tanggal: ' + info.dateStr);
    },
  });
  calendar.render();
});



function openModalPengeluaran() {
    document.getElementById('modalPengeluaran').classList.remove('hidden');
}
function closeModalPengeluaran() {
    document.getElementById('modalPengeluaran').classList.add('hidden');
}

//{{-- script calendar --}}

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
