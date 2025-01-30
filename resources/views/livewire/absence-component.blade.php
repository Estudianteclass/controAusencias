<div>
  


    

      
<button class="bg-green-500 px-2 py-2 rounded-md text-white font-bold" wire:click="openAbsenceForm">Añadir falta</button>
  <a href="usuarios" wire:navigate>Gestionar users</a>


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
                 Descripcion
               </th>
               <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Fecha
              </th>
               <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                 Hora
               </th>
               <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Turno
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Acciones
                </th>
             </tr>
           </thead>
           <tbody>
            @foreach ( $absences as $absence )
             <tr class="bg-gray-100 border-b hover:bg-gray-300">
               <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  {{$absence->name}}
               </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{$absence->dep_name}}
               </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{$absence->description}}
               </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$absence->absenceDate}}
             </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{$absence->hour}}
               </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{$absence->turn}}
               </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
               <button class="bg-yellow-500 px-2 py-2 rounded-md text-white font-bold">Editar</button>
               <button class="bg-red-500 px-2 py-2 rounded-md text-white font-bold">Borrar</button>
             </td>
             </tr>
             @endforeach
           </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>

@if ($absenceForm)
    
 <main id="content" role="main" class="fixed left-0 top-0 flex h-screen w-screen items-center justify-center bg-black bg-opacity-50 py-10">
  <div class="mt-7 bg-white h-fit w-96 self-center rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700">
    <div class="p-4 sm:p-7">
      <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Añadir ausencia</h1>
        
      </div>

      <div class="mt-5">
        <form>
          <div class="grid gap-y-4">
            <div>
               <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="nombre">Profesor</label>
               <input type="text" name="nombre" id="nombre" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
            </div>
            <div>
              <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="departamento">Departamento</label>
              <input type="text" name="departamento" id="departamento" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
           </div>
           <div>
            <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="descripcion">Descripcion</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"></textarea>
         </div>
          
            <div class="flex flex-row justify-center space-x-2">
            <button class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Añadir falta</button>
            <button wire:click="closeAbsenceForm" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Cancelar</button>

            </div>
           
          
          </div>
        </form>
      </div>
    </div>
  </div>

 
</main>
    
@endif


<div>



