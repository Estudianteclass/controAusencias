<div>


      
 

  


<div class="grid grid-rows-1 grid-cols-2 w-full items-center">
  <div class=" justify-self-start">
    <button class="bg-green-500 px-2 py-2 text-white font-bold rounded-md" wire:click="openAbsenceForm">Añadir ausencia</button> 
    <label for="selectedDate">Mostrar ausencias:</label>
    <select wire:change.prevent:="filterByDate" wire:model="selectedDate" name="selectedDate" id="selectedDate">
      <option value="hoy">Ausencias de hoy</option>
      <option value="todas">Todas</option>
      <option value="mias">Mis ausencias</option>
    </select>
  </div>
 
  <form class="justify-self-end">
  <label for="filterDate">Fliltrar por fecha</label>
  <input wire:model="selectedDate" type="date" name="selectedDate" id="selectedDate">
  <button wire:click.prevent="filterByDate" class="bg-green-500 px-2 py-2 text-white font-bold rounded-md">Filtrar</button>
</form>
</div>

  <div class="flex flex-col">
   <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
     <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <h1 class="text-center text-xl font-bold">Listado de ausencias</h1>
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
                 Hora/s
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
                  {{$absence->name}}  {{$absence->last_name}}
               </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{$absence->dep_name}}
               </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{$absence->description}}
               </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{\Carbon\Carbon::parse($absence->absence_date)->format('d-m-Y') }}
             </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{$absence->hour}}
               </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{$absence->turn}}
               </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                @role('admin')
               <button wire:click="openEditAbsenceForm({{$absence->absence_id}})" class="bg-yellow-500 px-2 py-2 rounded-md text-white font-bold">Editar</button>
               <button class="bg-red-500 px-2 py-2 rounded-md text-white font-bold" wire:click="deleteAbsence({{ $absence->absence_id }})" wire:confirm="¿Desea borrar esta ausencia?">Borrar</button>
             @endrole
             @role('teacher')
             @if ($absence->user_id===auth()->id()&&\Carbon\Carbon::parse($absence->created_at)->diffInMinutes(now())<10)
              <button wire:click="openEditAbsenceForm({{$absence->absence_id}})" class="bg-yellow-500 px-2 py-2 rounded-md text-white font-bold">Editar</button>
             <button class="bg-red-500 px-2 py-2 rounded-md text-white font-bold" wire:click="deleteAbsence({{ $absence->absence_id }})" wire:confirm="¿Desea borrar esta ausencia?">Borrar</button>
             @else
             Acciones no disponibles
             @endif
            <!--
            calcular diferencia en minutos

            https://laracasts.com/discuss/channels/laravel/calculate-difference-in-minutes-between-created-at-and-current-time-in-laravel
            https://laracasts.com/discuss/channels/laravel/getting-the-hour-of-a-created-at-time-stamp-in-laravel
            -->
           @endrole
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
  <div class="mt-7 bg-white h-fit w-fit self-center rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700">
    <div class="p-4 sm:p-7">
      <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Añadir ausencia</h1>
        
      </div>

      <div class="mt-5">
        <form>
          <div class="grid gap-y-4">
              @role('admin')
            <div>
            
               <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="user_id ">Profesor</label>
                  <select wire:model="user_id" name="user_id" id="user_id">
                    <option value="">--Seleccionar profesor--</option>
                     @foreach ($usersDep as $user)

                    <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}, {{$user->department->dep_name}}</option>
                    @endforeach
                  </select>
              </div>
         @endrole
           <div>
            <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="turn">Turno</label>
            <select wire:model="turn" name="turn" id="turn" >
              <option value="">--Seleccionar turno--</option>
              <option value="mañana">Mañana</option>
              <option value="tarde">Tarde</option>
            </select>
         </div>
         <div>
           <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="hour">Hora</label>
         <select wire:model="hour" name="hour" id="hour">
          <option value="">--Seleccionar hora--</option>
        <option value="primera">primera</option>
        <option value="segunda">segunda</option>
        <option value="tercera">tercera</option>
        <option value="recreo">recreo</option>
        <option value="cuarta">cuarta</option>
        <option value="quinta">quinta</option>
        <option value="sexta">sexta</option>
         </select>
         </div>
        <div>
          <label for="absence_date">Fecha de la falta:</label><br>
          <input type="date" name="absence_date" id="absence_date" wire:model="absence_date">
        </div>
      </div>
           <div>
            <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="description">Descripcion</label>
            <input  wire:model="description" type="text" name="description" id="description" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
         </div>
          
            <div class="flex flex-row justify-center space-x-2 mt-2">
              @role('admin')
            <button wire:click.prevent="createAbsence" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Añadir ausencia</button>
           @endrole
           @role('teacher')
           <button wire:click.prevent="createMyAbsence" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Crear ausencia</button>
          @endrole
            <button wire:click="closeAbsenceForm" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Cancelar</button>

            </div>
           
          
          </div>
        </form>
      </div>
    </div>
  </div>

 
</main>
    
@endif
@if ($editAbsence)
<main id="content" role="main" class="fixed left-0 top-0 flex h-screen w-screen items-center justify-center bg-black bg-opacity-50 py-10">
  <div class="mt-7 bg-white h-fit w-fit self-center rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700">
    <div class="p-4 sm:p-7">
      <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Editar ausencia</h1>
        
      </div>

      <div class="mt-5">
        <form>
          <div class="grid gap-y-4">
            <div>
              <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="user_id ">Profesor</label>
                 <select wire:model="user_id" name="user_id" id="user_id">

                    @foreach ($usersDep as $user)

                   <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}, {{$user->department->dep_name}}</option>
                   @endforeach
                 </select>
             </div>
         
           <div>
            <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="turn">Turno</label>
            <select wire:model="turn" name="turn" id="turn" >

              <option value="mañana">Mañana</option>
              <option value="tarde">Tarde</option>
            </select>
         </div>
         <div>
           <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="hour">Hora</label>
         <select wire:model="hour" name="hour" id="hour" >

        <option value="primera">primera</option>
        <option value="segunda">segunda</option>
        <option value="tercera">tercera</option>
        <option value="recreo">recreo</option>
        <option value="cuarta">cuarta</option>
        <option value="quinta">quinta</option>
        <option value="sexta">sexta</option>
         </select>
         </div>
        <div>
          <label for="absence_date">Fecha de la falta:</label><br>
          <input wire:model="absence_date" type="date" name="absence_date" id="absence_date" >
        </div>
      </div>
           <div>
            <label class="block text-sm font-bold ml-1 mb-2 dark:text-white" for="description">Descripcion</label>
            <input wire:model="description" type="text" name="description"  id="description" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
         
         </div>
          
            <div class="flex flex-row justify-center space-x-2 mt-2">
            <button wire:click.prevent="updateAbsence" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Confirmar cambios</button>
            <button wire:click="closeEditAbsenceForm" class="py-3 px-4  gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Cancelar</button>

            </div>
           
          
          </div>
        </form>
      </div>
    </div>
@endif



</div><!--cuerpo del componente-->



