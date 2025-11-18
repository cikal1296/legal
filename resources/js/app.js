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
