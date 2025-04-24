<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';

const props = defineProps<{
  role: {
    id: number;
    name: string;
    permissions: { name: string }[];
  };
  allPermissions: { name: string }[];
}>();

const name = ref(props.role.name);
const selectedPermissions = ref<string[]>(props.role.permissions.map(p => p.name));

function togglePermission(permission: string) {
  const index = selectedPermissions.value.indexOf(permission);
  if (index > -1) {
    selectedPermissions.value.splice(index, 1);
  } else {
    selectedPermissions.value.push(permission);
  }
}

function submit() {
  router.put(`/administracion/role/${props.role.id}`, {
    name: name.value,
    permissions: selectedPermissions.value,
  });
}

// Agrupar permisos por tipo (ver, crear, editar, eliminar, menu, otros)
const groupedPermissions = computed(() => {
  const groups: Record<string, string[]> = {
    ver: [],
    crear: [],
    editar: [],
    eliminar: [],
    menu: [],
    otros: [],
  };

  props.allPermissions.forEach(({ name }) => {
    const lower = name.toLowerCase();
    if (lower.includes('ver')) groups.ver.push(name);
    else if (lower.includes('crear')) groups.crear.push(name);
    else if (lower.includes('editar')) groups.editar.push(name);
    else if (lower.includes('eliminar')) groups.eliminar.push(name);
    else if (lower.includes('menu')) groups.menu.push(name);
    else groups.otros.push(name);
  });

  return groups;
});

const icons: Record<string, string> = {
  ver: '👁️ Ver',
  crear: '➕ Crear',
  editar: '✏️ Editar',
  eliminar: '🗑️ Eliminar',
  menu: '📁 Menú',
  otros: '🔘 Otros',
};
</script>

<template>
  <Head title="Editar Rol" />

  <AppLayout>
    <div class="w-full px-8 py-10">
      <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-10">Editar Rol</h1>

      <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Nombre del Rol -->
        <div class="col-span-1 md:col-span-2">
          <label for="name" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Nombre</label>
          <input
            id="name"
            v-model="name"
            type="text"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <!-- Permisos agrupados por tipo -->
        <div class="col-span-1 md:col-span-2">
          <div v-for="(permissions, type) in groupedPermissions" :key="type" class="mb-6 border rounded-lg p-4 dark:border-gray-600">
            <h2 class="text-lg font-semibold text-blue-700 dark:text-blue-300 mb-4">
              {{ icons[type] }}
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
              <div v-for="permission in permissions" :key="permission">
                <label class="flex items-center space-x-2">
                  <input
                    type="checkbox"
                    :value="permission"
                    :checked="selectedPermissions.includes(permission)"
                    @change="togglePermission(permission)"
                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                  />
                  <span class="text-gray-800 dark:text-white">{{ permission }}</span>
                </label>
              </div>
            </div>
          </div>
        </div>

        <!-- Botón -->
        <div class="col-span-1 md:col-span-2 flex justify-end mt-6">
          <button
            type="submit"
            class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white text-base font-semibold rounded-lg transition"
          >
            Actualizar Rol
          </button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
