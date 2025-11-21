<x-utama>
<div x-data="taskApp()" class="p-6" x-init="init()">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center gap-2 mb-3">
        <h2 class="text-lg font-semibold flex-1">Daftar Tugas</h2>
        <button 
            class="px-3 py-1 rounded-md text-white text-sm bg-teal-500 hover:bg-teal-600 w-fit"
            @click="openTaskForm = true">
            Tambah Tugas
        </button>
    </div>

    <!-- Filters -->
    <div class="bg-white shadow-md rounded-lg p-4 mb-6 flex flex-wrap gap-3">
        <select class="border rounded-md px-3 pr-8 py-2 text-sm w-full sm:w-auto">
            <option>Semua</option>
        </select>
        <select class="border rounded-md px-3 pr-8 py-2 text-sm w-full sm:w-auto">
            <option>Status</option>
            <option value="">Dikerjakan</option>
            <option value="">selesai</option>
            <option value="">ditunda</option>
            <option value="">revisi</option>
            <option value="">pending</option>
        </select>
        <select class="border rounded-md px-3 pr-8 py-2 text-sm w-full sm:w-auto">
            <option>Prioritas</option>
            <option>Tinggi</option>
            <option>Sedang</option>
            <option>Rendah</option>
        </select>
        <input type="date" class="border rounded-md px-3 py-2 text-sm w-full sm:w-auto" />
    </div>

    <!-- Task Cards -->
    <div class="space-y-10">
        <template x-for="(task,index) in tasks" :key="'task-'+index">
        <div class="bg-white shadow-md rounded-lg p-4">

            <div class="flex flex-col md:flex-row md:items-center gap-2 mb-3">
                <h2 class="text-lg font-semibold flex-1" x-text="task.title"></h2>
                <button class="px-3 py-1 rounded-md text-white text-sm bg-teal-500 hover:bg-teal-600 w-fit"
                    @click="task.showSub = !task.showSub">Sub Tugas</button>
                <button class="px-3 py-1 rounded-md text-white text-sm bg-blue-500 hover:bg-blue-600 w-fit"
                    @click="openSubTaskForm(index)">Tambah Sub-Tugas</button>
            </div>

            <!-- Main Task Table -->
            <div class="overflow-x-auto mb-4">
                <table class="min-w-max w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase border-b">
                        <tr>
                            <th class="px-4 py-3">Tugas</th>
                            <th class="px-4 py-3">Files</th>
                            <th class="px-4 py-3">Pembuat</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Prioritas</th>
                            <th class="px-4 py-3">Limit</th>
                            <th class="px-4 py-3">Tenggat</th>
                            <th class="px-4 py-3">Terakhir diubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium" x-text="task.title"></td>
                            <td class="px-4 py-3" x-text="task.files"></td>
                            <td class="px-4 py-3" x-text="task.owner"></td>
                            <td class="px-4 py-3">
                                <span class="px-3 py-1 rounded-md text-white text-xs"
                                    :class="task.statusColor" x-text="task.status"></span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-3 py-1 rounded-md text-white text-xs"
                                    :class="task.priorityColor" x-text="task.priority"></span>
                            </td>
                            <td class="px-4 py-3" x-text="task.limit"></td>
                            <td class="px-4 py-3" x-text="task.deadline"></td>
                            <td class="px-4 py-3" x-text="task.updated"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Subtasks Table -->
            <div class="overflow-x-auto" x-show="task.showSub">
                <table class="min-w-max w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase border-b">
                        <tr>
                            <th class="px-4 py-3">Sub Tugas</th>
                            <th class="px-4 py-3">Files</th>
                            <th class="px-4 py-3">Pembuat</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Prioritas</th>
                            <th class="px-4 py-3">Limit</th>
                            <th class="px-4 py-3">Tenggat</th>
                            <th class="px-4 py-3">Terakhir diubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(sub,index2) in task.subtasks" :key="'sub-'+index+'-'+index2">
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium" x-text="sub.title"></td>
                                <td class="px-4 py-3" x-text="sub.files"></td>
                                <td class="px-4 py-3" x-text="sub.owner"></td>
                                <td class="px-4 py-3">
                                    <span class="px-3 py-1 rounded-md text-white text-xs"
                                        :class="sub.statusColor" x-text="sub.status"></span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="px-3 py-1 rounded-md text-white text-xs"
                                        :class="sub.priorityColor" x-text="sub.priority"></span>
                                </td>
                                <td class="px-4 py-3" x-text="sub.limit"></td>
                                <td class="px-4 py-3" x-text="sub.deadline"></td>
                                <td class="px-4 py-3" x-text="sub.updated"></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

        </div>
        </template>
    </div>

    <!-- Modal Tambah Tugas -->
    <div x-show="openTaskForm" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center" style="display:none">
        <div class="bg-white p-5 rounded-lg w-80">
            <h2 class="text-lg font-semibold mb-3">Tambah Tugas</h2>
            <input x-model="taskForm.title" type="text" placeholder="Nama Tugas" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="taskForm.files" type="number" placeholder="Files" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="taskForm.owner" type="text" placeholder="Pembuat" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="taskForm.status" type="text" placeholder="Status" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="taskForm.priority" type="text" placeholder="Prioritas" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="taskForm.limit" type="text" placeholder="Limit" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="taskForm.deadline" type="text" placeholder="Tenggat" class="w-full border px-3 py-2 rounded mb-2">
            <button @click="saveTask()" class="px-4 py-2 bg-teal-600 text-white rounded-md w-full hover:bg-teal-700">Simpan</button>
            <button @click="openTaskForm=false" class="mt-2 text-gray-500 w-full">Batal</button>
        </div>
    </div>

    <!-- Modal Tambah Sub-Tugas -->
    <div x-show="openSubTaskFormModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center" style="display:none">
        <div class="bg-white p-5 rounded-lg w-80">
            <h2 class="text-lg font-semibold mb-3">Tambah Sub-Tugas</h2>
            <input x-model="subTaskForm.title" type="text" placeholder="Nama Sub-Tugas" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="subTaskForm.files" type="number" placeholder="Files" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="subTaskForm.owner" type="text" placeholder="Pembuat" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="subTaskForm.status" type="text" placeholder="Status" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="subTaskForm.priority" type="text" placeholder="Prioritas" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="subTaskForm.limit" type="text" placeholder="Limit" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="subTaskForm.deadline" type="text" placeholder="Tenggat" class="w-full border px-3 py-2 rounded mb-2">
            <button @click="saveSubTask()" class="px-4 py-2 bg-teal-600 text-white rounded-md w-full hover:bg-teal-700">Simpan</button>
            <button @click="openSubTaskFormModal=false" class="mt-2 text-gray-500 w-full">Batal</button>
        </div>
    </div>

</div>

<script>
function taskApp(){
    return {
        tasks: [
            {
    title:"#1923702 - Paudra Sanjaya : Properti",
    files:5,
    owner:"👤👤",
    status:"Dikerjakan",
    statusColor:"bg-yellow-500",
    priority:"Tinggi",
    priorityColor:"bg-purple-700",
    limit:"10–12 Des",
    deadline:"12 Mar",
    updated:"05–11–2024",
    subtasks:[
        {title:"#1923702 - Pelaporan Klien",files:1,owner:"👤",status:"Selesai",statusColor:"bg-green-500",priority:"Sedang",priorityColor:"bg-purple-500",limit:"10–12 Des",deadline:"12 Mar",updated:"05–11–2024"},
    ],
    showSub:true
}
,
            {
                title:"#1823702 - Jordan Yudhistira : Finansial",
                files:8,
                owner:"👤👤👤",
                status:"Selesai",
                statusColor:"bg-green-500",
                priority:"Sedang",
                priorityColor:"bg-purple-500",
                limit:"6–7 Des",
                deadline:"7 Mar",
                updated:"04–11–2024",
                subtasks:[
                    {title:"Pencarian Sumber Hukum",files:2,owner:"👤👤",status:"Ditunda",statusColor:"bg-red-500",priority:"Rendah",priorityColor:"bg-blue-300",limit:"6–7 Des",deadline:"7 Mar",updated:"06–11–2024"},
                    {title:"Pencarian Data Relevan",files:1,owner:"👤👤",status:"Ditunda",statusColor:"bg-red-500",priority:"Rendah",priorityColor:"bg-blue-300",limit:"6–7 Des",deadline:"7 Mar",updated:"06–11–2024"},
                ],
                showSub:true
            }
        ],
        openTaskForm:false,
        taskForm:{title:"",files:0,owner:"",status:"",priority:"",limit:"",deadline:""},
        openSubTaskFormModal:false,
        subTaskForm:{title:"",files:0,owner:"",status:"",priority:"",limit:"",deadline:""},
        currentTaskIndex:null,
        init(){},
        saveTask(){
            this.tasks.push({
                ...this.taskForm,
                statusColor:this.getStatusColor(this.taskForm.status),
                priorityColor:this.getPriorityColor(this.taskForm.priority),
                subtasks:[],
                showSub:true
            });
            this.taskForm={title:"",files:0,owner:"",status:"",priority:"",limit:"",deadline:""};
            this.openTaskForm=false;
        },
        openSubTask(index){
            this.currentTaskIndex=index;
            this.openSubTaskFormModal=true;
        },
        saveSubTask(){
            if(this.currentTaskIndex===null) return;
            this.tasks[this.currentTaskIndex].subtasks.push({
                ...this.subTaskForm,
                statusColor:this.getStatusColor(this.subTaskForm.status),
                priorityColor:this.getPriorityColor(this.subTaskForm.priority)
            });
            this.subTaskForm={title:"",files:0,owner:"",status:"",priority:"",limit:"",deadline:""};
            this.openSubTaskFormModal=false;
            this.currentTaskIndex=null;
        },
        openSubTaskForm(index){
            this.currentTaskIndex=index;
            this.openSubTaskFormModal=true;
        },
        getStatusColor(status){
            switch(status.toLowerCase()){
                case"selesai": return"bg-green-500";
                case"dikerjakan": return"bg-yellow-500";
                case"ditunda": return"bg-red-500";
                case"revisi": return"bg-pink-500";
                default: return"bg-gray-400";
            }
        },
        getPriorityColor(priority){
            switch(priority.toLowerCase()){
                case"rendah": return"bg-blue-300";
                case"sedang": return"bg-purple-500";
                case"tinggi": return"bg-purple-700";
                default: return"bg-gray-400";
            }
        }
    }
}
</script>
</x-utama>
