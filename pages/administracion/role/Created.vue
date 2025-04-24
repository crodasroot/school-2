<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';

const name = ref('');
const guard_name = ref('');


function submit() {
  router.post('/administracion/role', {
    name: name.value,
    guard_name: guard_name.value,

  });
}
</script>

<template>
  <Head title="Crear Rol" />

  <AppLayout>
    <div class="w-full px-8 py-10">
      <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-10">Crear Rol</h1>

      <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Nombre -->
        <div class="col-span-1">
          <label for="name" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Nombre</label>
          <input
            id="name"
            v-model="name"
            type="text"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <!-- Email -->
        <div class="col-span-1">
          <label for="guard_name" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Guard Name</label>
          <input
            id="guard_name"
            v-model="guard_name"
            type="text"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

     

        <!-- MÁS CAMPOS -->
        <!-- 
        <div class="col-span-1">
          <label for="telefono" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Teléfono</label>
          <input
            id="telefono"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        -->

        <!-- Botón -->
        <div class="col-span-1 md:col-span-2 flex justify-end mt-6">
          <button
            type="submit"
            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-base font-semibold rounded-lg transition"
          >
            Guardar Usuario
          </button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
