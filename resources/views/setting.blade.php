<x-utama>

<div class="flex min-h-screen bg-gray-100">

  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-md border-r border-gray-200 p-6 flex flex-col">
    <h2 class="text-2xl font-bold mb-8 text-green-700">⚙ Settings</h2>

    <ul class="space-y-1 text-gray-700">
      <li>
        <button data-target="profileSection" class="menu-btn flex items-center gap-3 px-3 py-2 rounded-lg w-full text-left hover:bg-green-50 transition font-medium">
          <span class="w-2 h-2 bg-green-600 rounded-full"></span>
          Profile & Account
        </button>
      </li>
      <li>
        <button data-target="legalSection" class="menu-btn flex items-center gap-3 px-3 py-2 rounded-lg w-full text-left hover:bg-green-50 transition font-medium">
          <span class="w-2 h-2 bg-green-600 rounded-full"></span>
          Legal Tools
        </button>
      </li>
      <li>
        <button data-target="techSection" class="menu-btn flex items-center gap-3 px-3 py-2 rounded-lg w-full text-left hover:bg-green-50 transition font-medium">
          <span class="w-2 h-2 bg-green-600 rounded-full"></span>
          Tech Tools
        </button>
      </li>
      <li>
        <button data-target="notifSection" class="menu-btn flex items-center gap-3 px-3 py-2 rounded-lg w-full text-left hover:bg-green-50 transition font-medium">
          <span class="w-2 h-2 bg-green-600 rounded-full"></span>
          Notifications
        </button>
      </li>
      <li>
        <button data-target="securitySection" class="menu-btn flex items-center gap-3 px-3 py-2 rounded-lg w-full text-left hover:bg-green-50 transition font-medium">
          <span class="w-2 h-2 bg-green-600 rounded-full"></span>
          Security
        </button>
      </li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-10 overflow-y-auto">

    <h1 class="text-3xl font-bold text-gray-800 mb-8">Settings</h1>

    <!-- JS -->
    <script>
      function toggleSection(id) {
        document.querySelectorAll('.setting-section').forEach(sec => {
          if(sec.id === id) {
            sec.classList.toggle('hidden');
          } else {
            sec.classList.add('hidden');
          }
        });
      }

      // Sidebar active
      document.querySelectorAll('.menu-btn').forEach(btn => {
        btn.addEventListener('click', () => {
          document.querySelectorAll('.menu-btn').forEach(b => b.classList.remove('bg-green-100', 'text-green-700'));
          btn.classList.add('bg-green-100', 'text-green-700');
          toggleSection(btn.dataset.target);
        });
      });
    </script>


    <!-- Profile & Account -->
    <section id="profileSection" class="setting-section bg-white border shadow-sm rounded-xl p-6 space-y-4">
      <h2 class="font-semibold text-xl text-gray-800 mb-4">Profile & Account</h2>

      <div class="flex items-center justify-between">
        <span class="text-gray-600">Name</span>
        <input type="text" class="border rounded px-3 py-1 w-1/2" value="John Doe">
      </div>
      <div class="flex items-center justify-between">
        <span class="text-gray-600">Email</span>
        <input type="email" class="border rounded px-3 py-1 w-1/2" value="john@example.com">
      </div>

      <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
        Save Changes
      </button>
    </section>

    <!-- Legal Tools -->
    <section id="legalSection" class="setting-section bg-white border shadow-sm rounded-xl p-6 space-y-2 hidden">
      <h2 class="font-semibold text-xl text-gray-800 mb-4">Legal Tools</h2>
      <button class="w-full text-left p-3 rounded hover:bg-gray-50 transition">Document Templates</button>
      <button class="w-full text-left p-3 rounded hover:bg-gray-50 transition">Case Search</button>
      <button class="w-full text-left p-3 rounded hover:bg-gray-50 transition">Contract Checker</button>
    </section>

    <!-- Tech Tools -->
    <section id="techSection" class="setting-section bg-white border shadow-sm rounded-xl p-6 space-y-2 hidden">
      <h2 class="font-semibold text-xl text-gray-800 mb-4">Tech Tools</h2>
      <button class="w-full text-left p-3 rounded hover:bg-gray-50 transition">API Integrations</button>
      <button class="w-full text-left p-3 rounded hover:bg-gray-50 transition">Analytics Dashboard</button>
      <button class="w-full text-left p-3 rounded hover:bg-gray-50 transition">Developer Settings</button>
    </section>

    <!-- Notifications -->
    <section id="notifSection" class="setting-section bg-white border shadow-sm rounded-xl p-6 space-y-3 hidden">
      <h2 class="font-semibold text-xl text-gray-800 mb-4">Notifications</h2>
      <label class="flex items-center gap-3">
        <input type="checkbox" class="w-5 h-5 accent-green-700" checked>
        Email Updates
      </label>
      <label class="flex items-center gap-3">
        <input type="checkbox" class="w-5 h-5 accent-green-700">
        SMS Alerts
      </label>
      <label class="flex items-center gap-3">
        <input type="checkbox" class="w-5 h-5 accent-green-700" checked>
        Push Notifications
      </label>
    </section>

    <!-- Security -->
    <section id="securitySection" class="setting-section bg-white border shadow-sm rounded-xl p-6 space-y-3 hidden">
      <h2 class="font-semibold text-xl text-gray-800 mb-4">Security</h2>

      <div class="flex items-center justify-between">
        <span>Password</span>
        <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">Change</button>
      </div>
      <div class="flex items-center justify-between">
        <span>Two-Factor Authentication</span>
        <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">Enable</button>
      </div>
      <div class="flex items-center justify-between">
        <span>Account Activity</span>
        <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">View Logs</button>
      </div>
    </section>

  </main>
</div>

</x-utama>
