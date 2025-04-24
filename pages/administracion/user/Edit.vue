<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';

const props = defineProps<{
  user: { id: number, name: string, email: string, roles: { name: string }[] };
  allRoles: { name: string }[];
}>();

const name = ref(props.user.name);
const email = ref(props.user.email);
const selectedRole = ref(
  Array.isArray(props.user.roles) && props.user.roles.length > 0
    ? props.user.roles[0].name
    : ''
);


function submit() {
  router.put(`/administracion/user/${props.user.id}`, {
    name: name.value,
    email: email.value,
    role: selectedRole.value,
  });
}
</script>


<template>
  <Head title="Editar Usuario" />

  <AppLayout>
    <div class="w-full px-8 py-10">
      <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-10">Editar Usuario</h1>

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
          <label for="email" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
          <input
            id="email"
            v-model="email"
            type="email"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

       <!-- Rol -->
<div class="col-span-1">
  <label for="role" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Rol</label>
  <select
    id="role"
    v-model="selectedRole"
    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
  >
    <option v-for="role in props.allRoles" :key="role.name" :value="role.name">
      {{ role.name }}
    </option>
  </select>
</div>


        <!-- Botón -->
        <div class="col-span-1 md:col-span-2 flex justify-end mt-6">
          <button
            type="submit"
            class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white text-base font-semibold rounded-lg transition"
          >
            Actualizar Usuario
          </button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
