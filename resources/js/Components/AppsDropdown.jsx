import { useState } from "react";

export default function AppsDropdown({ openPengeluaranModal }) {
  const [open, setOpen] = useState(false);

  return (
    <div className="relative">
      {/* Tombol */}
      <button
        onClick={() => setOpen(!open)}
        className="pr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100
          dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4
          focus:ring-gray-300 dark:focus:ring-gray-600"
      >
        <svg className="w-6 h-6 2xl:w-7 2xl:h-7" fill="white" viewBox="0 0 20 20">
          <path d="M5 3a2 2 ..."></path>
        </svg>
      </button>

      {/* Dropdown */}
      {open && (
        <div
          className="absolute right-0 mt-4 max-w-sm text-base list-none bg-white 
            divide-y divide-gray-100 shadow-lg dark:bg-gray-700 dark:divide-gray-600 
            rounded-xl z-50"
        >
          <div className="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">
            Toolkit
          </div>

          <div className="grid grid-cols-3 gap-4 p-4">

            {/* Pengeluaran */}
            <button
              onClick={openPengeluaranModal}
              className="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group"
            >
              <svg className="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a4 4 ..."></path>
              </svg>
              <div className="text-sm text-gray-900 dark:text-white">Pengeluaran</div>
            </button>

            {/* Tambah File */}
            <button
              onClick={() => alert("Form File dibuka (ganti sesuai kebutuhan)")}
              className="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group"
            >
              <svg className="mx-auto mb-1 w-7 h-7 text-gray-400" fill="currentColor">
                <path d="M5 3a2 2 ..."></path>
              </svg>
              <div className="text-sm text-gray-900 dark:text-white">Tambah File</div>
            </button>

            {/* Sisanya tinggal copas seperti HTML asli kamu */}
          </div>
        </div>
      )}
    </div>
  );
}
