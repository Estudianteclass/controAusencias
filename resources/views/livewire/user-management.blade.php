
 
<div>
<div class="flex justify-around">
 <button class="bg-green-500 px-2 py-2 text-white font-bold rounded-md" wire:click="openCreateModal">Crear usuario</button>
  @livewire("SubirArchivo")
</div>
 
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="bg-white border-b">
                  <tr>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                      Nombre
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                      Departamento
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                      Email
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                     Rol
                   </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                      Acciones
                    </th>
                   
                  </tr>
                </thead>
                <tbody>
              @foreach ($users as $user)
                
          
                  <tr class="bg-gray-100 border-b hover:bg-gray-300">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                 {{$user->name}} {{$user->last_name}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$user->department->dep_name}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$user->email}}
                  </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      @if ($user->getRoleNames()->isNotEmpty())
                      @if ($user->getRoleNames()->first()=='admin')
                        Administrador
                        @else
                        Profesor
                      @endif
                        
                         @else
                         No tiene rol
                      @endif
                    
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <button wire:click="openEditModal({{$user->id}})" class="bg-yellow-500 px-2 py-2 rounded-md text-white font-bold">Editar</button>
                    <button wire:click="deleteUser({{$user->id}})"class="bg-red-500 px-2 py-2 rounded-md text-white font-bold" wire:confirm="¿Está seguro de que quiere borrar este usuario?">Borrar</button>
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
              <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Nuevo Usuario</h1>
              
            </div>
      
            <div class="mt-5">
              <form>
                <div class="grid gap-y-4">
                  <div>
                     <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="name">Nombre</label>
                     <input  wire:model="name" type="text" name="name" id="name" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="last_name">Apellidos</label>
                    <input wire:model="last_name" type="text" name="last_name" id="last_name" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                 </div>
                 <div>
                  <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="email">Email</label>
                  <input wire:model="email" type="email" name="email" id="email" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
               </div>
               <div>
                <div class="flex flex-col justify-center">
                  <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="role">Rol de usuario</label>
                  <select  wire:model="role" name="role" id="role">
                    <option value="">--Elegir Rol--</option>
                    <option value="admin">Administrador</option>
                    <option value="teacher">Profesor</option>
                  </select>
               </div>
               </div>
                 <div class="flex flex-col justify-center">
                  <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="department_id">Departamento</label>
                  <select wire:model="department_id" name="department_id" id="department_id" >
                    <option value="">--Elegir departamento--</option>
                      @foreach ($departments as $department)
                        <option value="{{$department->id}}">{{$department->dep_name}}</option>
                     @endforeach
                  </select>
               </div>
             
           
            </div>
                
                
                  <div class="flex flex-row justify-center space-x-2 mt-2">
                  <button wire:click="createUser" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Crear Usuario</button>
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
              <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Editar Usuario</h1>
              
            </div>
      
            <div class="mt-5">
              <form>
                <div class="grid gap-y-4">
                  <div>
                     <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="name">Nombre</label>
                     <input wire:model="name" type="text" name="name" id="name" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="last_name">Apellidos</label>
                    <input  wire:model="last_name" type="text" name="last_name" id="last_name" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                 </div>
                 <div>
                  <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="email">Email</label>
                  <input wire:model="email" type="email" name="email" id="email" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
               </div>
                 <div class="flex flex-col justify-center">
                  <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="department_id">Departamento</label>
                  <select  wire:model="department_id" name="department_id" id="department_id">
                      @foreach ($departments as $department)
                      <option value="">--Elegir departamento</option>
                        <option value="{{$department->id}}">{{$department->dep_name}}</option>
                     @endforeach
                  </select>
               </div>
             
           
            </div>
                
                
                  <div class="flex flex-row justify-center space-x-2 mt-2">
                  <button wire:click="updateUser" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Confirmar cambios</button>
                  <button wire:click="closeEditModal" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Cancelar</button>
     
                  </div>
                 
                
                </div>
              </form>
            </div>
          </div>
        </div>
      
       
      </main>
      @endif
   
</div><!--fin del componente-->
