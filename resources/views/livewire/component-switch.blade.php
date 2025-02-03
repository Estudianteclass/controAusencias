<div>
    <div class="space-x-4">
        @role('admin')
        <button wire:click="switchComponent('UserManagement')" class="font-semibold text-xl py-2 px-4  border-b-4 border-gray-700 text-gray-800 hover:text-gray-500 hover:border-gray-400"> Usuarios</button>  
        <button wire:click="switchComponent('DepartmentComponent')" class="font-semibold text-xl py-2 px-4  border-b-4 border-gray-700 text-gray-800 hover:text-gray-500 hover:border-gray-400">Departamentos</button>
        @endrole
        <button wire:click="switchComponent('AbsenceComponent')" class="font-semibold text-xl py-2 px-4  border-b-4 border-gray-700  text-gray-800 hover:text-gray-500 hover:border-gray-400">Ausencias</button>
        </div>
     

        <div class="mt-8">

 @if ($usedComponent==='UserManagement')
            @livewire("UserManagement")

        @elseif ($usedComponent==='DepartmentComponent')

            @livewire("DepartmentComponent")
        @else

            @livewire("AbsenceComponent")

        @endif
        </div>

       
</div>
