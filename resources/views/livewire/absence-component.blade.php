<div>
  


    

      




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
                 Hora
               </th>
               <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Turno
                </th>
             </tr>
           </thead>
           <tbody>
            @foreach ( $absences as $absence )
             <tr class="bg-gray-100 border-b">
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
                  {{$absence->hour}}
               </td>
               <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{$absence->turn}}
               </td>
             </tr>
             @endforeach
           </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>




<div>



