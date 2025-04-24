<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, router } from '@inertiajs/vue3';

defineProps<{ alumno: { id: number; nombre: string; fecha_nacimiento: string; grado: string; estado: string; }[] }>();

function deletealumno(id: number) {
  if (confirm('¿Estás seguro que deseas eliminar este usuario?')) {
    router.delete(`/configuracion/alumno/${id}`);
  }
}


function calcularEdad(fechaNacimiento: string): number {
  const nacimiento = new Date(fechaNacimiento);
  const hoy = new Date();
  let edad = hoy.getFullYear() - nacimiento.getFullYear();
  const mes = hoy.getMonth();
  const dia = hoy.getDate();

  if (mes < nacimiento.getMonth() || (mes === nacimiento.getMonth() && dia < nacimiento.getDate())) {
    edad--;
  }

  return edad;
}


</script>

<template>
  <Head title="Alumnos" />

  <AppLayout>
    <div style="margin: 10px;">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Listado Alumnos</h1>
        <a href="/configuracion/alumno/create" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
          + Nuevo
        </a>
      </div>

      <div class="overflow-x-auto rounded-lg shadow ring-1 ring-black/10 dark:ring-white/10">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
          <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">ID</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Nombre</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Edad</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Grado</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Estado</th>
              <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Acciones</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 dark:divide-gray-700 bg-white dark:bg-gray-900">
            <tr v-for="data in alumno" :key="data.id" class="hover:bg-gray-100 dark:hover:bg-gray-800">
              <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ data.id }}</td>
              <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ data.nombre }}</td>
              <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ calcularEdad(data.fecha_nacimiento) }}</td>

              <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ data.grado??'N/A' }}</td>
              <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ data.estado }}</td>
              <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200 space-x-2">
                <a
                    :href="`/configuracion/alumno/${data.id}/edit`"
                    class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition"
                >
                    Editar
                </a>
                <button
                    @click="deletealumno(data.id)"
                    class="inline-block px-4 py-2 bg-red-600 text-white text-sm font-medium rounded hover:bg-red-700 transition"
                >
                    Eliminar
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AppLayout>
</template>
