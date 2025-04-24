<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, router } from '@inertiajs/vue3';


defineProps<{ users: { id: number; name: string; email: string }[];
              userPermissions: { }[]; }
>();

function deleteUser(id: number) {
  if (confirm('¿Estás seguro que deseas eliminar este usuario?')) {
    router.delete(`/administracion/user/${id}`);
  }
}
</script>

<template>
  <Head title="Usuarios" />

  <AppLayout>
         <div style="margin: 10px;"> 
            <div class="flex justify-between items-center mb-6"v-if="userPermissions.includes('crear usuarios')">
      <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Usuarios</h1>
      <a href="/administracion/user/create" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
        + Nuevo 
      </a>
    </div>
    <div class="overflow-x-auto rounded-lg shadow ring-1 ring-black/10 dark:ring-white/10">
      <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-800">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">ID</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Nombre</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Email</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Acciones</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 dark:divide-gray-700 bg-white dark:bg-gray-900">
          <tr v-for="user in users" :key="user.id" class="hover:bg-gray-100 dark:hover:bg-gray-800"  >
            <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ user.id }}</td>
            <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ user.name }}</td>
            <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ user.email }}</td>
            <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200 space-x-2">
              <a   v-if="userPermissions.includes('editar usuarios')"
              :href="`/administracion/user/${user.id}/edit`"
              class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition"
            >
              Editar
            </a>


                <button v-if="userPermissions.includes('eliminar usuarios')"
                    @click="deleteUser(user.id)"
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
