<div>
    <button class="bg-green-500 px-2 py-2 text-white font-bold rounded-md" wire:click="openCreateModal">Crear departamento</button>
    <div class="flex flex-col items-center">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
          <div class="py-2 inline-block w-fit sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="bg-white border-b">
                  <tr>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                      Id
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                      Departamento
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                      Acciones
                    </th>
                   
                  </tr>
                </thead>
                <tbody>
              @foreach ($departments as $department)
                
          
                  <tr class="bg-gray-100 border-b hover:bg-gray-300">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                 {{$department->id}} 
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$department->dep_name}}
                    </td>
                
                   
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <button wire:click="openEditModal({{$department->id}})" class="bg-yellow-500 px-2 py-2 rounded-md text-white font-bold">Editar</button>
                    <button wire:click="deleteDepartment({{$department->id}})"class="bg-red-500 px-2 py-2 rounded-md text-white font-bold" wire:confirm="¿Esta seguro de que quiere borrar esta asignatura?">Borrar</button>
                  </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      @if($createModal)

      <main id="content" role="main" class="fixed left-0 top-0 flex h-screen w-screen items-center justify-center bg-black bg-opacity-50 py-10">
        <div class="mt-7 bg-white h-fit w-96 self-center rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700">
          <div class="p-4 sm:p-7">
            <div class="text-center">
              <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Nuevo Departamento</h1>
              
            </div>
      
            <div class="mt-5">
              <form>
                <div class="grid gap-y-4">
                  <div>
                     <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="nombre">Nombre del departamento</label>
                     <input type="text" name="nombre" id="nombre" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" wire:model="dep_name">
                  </div>
           
            </div>
                
                
                  <div class="flex flex-row justify-center space-x-2 mt-2">
                  <button wire:click="createDepartment" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Crear Departamento</button>
                  <button wire:click="closeCreateModal" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Cancelar</button>
      
                  </div>
                 
                
                </div>
              </form>
            </div>
          </div>
        </div>
      
       
      </main>
      @endif

      @if ($editModal)
      <main id="content" role="main" class="fixed left-0 top-0 flex h-screen w-screen items-center justify-center bg-black bg-opacity-50 py-10">
        <div class="mt-7 bg-white h-fit w-96 self-center rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700">
          <div class="p-4 sm:p-7">
            <div class="text-center">
              <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Editar Departamento</h1>
              
            </div>
      
            <div class="mt-5">
              <form>
                <div class="grid gap-y-4">
                  <div>
                     <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="nombre">Nombre del departamento</label>
                     <input type="text" name="nombre" id="nombre" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" wire:model="dep_name">
                  </div>
           
            </div>
                
                
                  <div class="flex flex-row justify-center space-x-2 mt-2">
                  <button wire:click="updateDepartment" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Cambiar datos</button>
                  <button wire:click="closeEditModal" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Cancelar</button>
      
                  </div>
                 
                
                </div>
              </form>
            </div>
          </div>
        </div>
      
       
      </main>
      @endif
</div>
