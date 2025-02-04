<div>
  


<form wire:submit.prevent="importFromCsv">
    <label for="csv_file">Crear usuarios en masa</label>
    <input type="file" wire:model="csv_file" id="csv_file" accept=".csv" class="border p-2 rounded-md">


    <button type="submit" class="bg-green-500 text-white font-bold px-2 py-2 rounded-md">Subir CSV</button>
</form>


</div>
