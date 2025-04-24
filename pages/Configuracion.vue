<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';

import { ref } from 'vue';
import draggable from 'vuedraggable';
import { router } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';

  
import Icon from '../components/Icon.vue';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Configuración', href: '/configuracion' },
];

interface Menu {
    id: number;
    label: string;
    url: string | null;
    icon: string | null;
    parent_id: number | null;
    order: number;
    children: Menu[];
}

const page = usePage();
const menus = ref<Menu[]>(page.props.menus as Menu[]);

const showModal = ref(false);
const isEditing = ref(false);
const currentId = ref<number | null>(null);

const form = useForm({
    label: '',
    url: '',
    icon: '',
    parent_id: null,
});

function openCreateModal() {
    form.reset();
    isEditing.value = false;
    currentId.value = null;
    showModal.value = true;
}

function openEditModal(menu: Menu) {
    form.label = menu.label;
    form.url = menu.url;
    form.icon = menu.icon;
    form.parent_id = menu.parent_id;
    currentId.value = menu.id;
    isEditing.value = true;
    showModal.value = true;
}

function saveMenu() {
    if (isEditing.value && currentId.value) {
        form.put(route('menus.update', currentId.value), {
            onSuccess: () => showModal.value = false,
        });
    } else {
        form.post(route('menus.store'), {
            onSuccess: () => showModal.value = false,
        });
    }
}

function deleteMenu(menu: Menu) {
    if (confirm(`¿Estás seguro de eliminar "${menu.label}"?`)) {
        form.delete(route('menus.destroy', menu.id));
    }
}

// Recorre árbol y retorna una lista plana
function flattenMenus(menuList: Menu[], parentId: number | null = null): any[] {
    let result: any[] = [];
    menuList.forEach((menu, index) => {
        result.push({
            id: menu.id,
            order: index,
            parent_id: parentId,
        });
        if (menu.children?.length > 0) {
            result = result.concat(flattenMenus(menu.children, menu.id));
        }
    });
    return result;
}

function buildOrderedMenus(menuList: Menu[], parentId: number | null = null): any[] {
    return menuList.map((menu, index) => {
        return {
            id: menu.id,
            order: index + 1,
            parent_id: parentId,
            children: buildOrderedMenus(menu.children, menu.id)
        };
    });
}


function onDragEnd() {
    const ordered = buildOrderedMenus(menus.value);
    router.post(route('menus.updateOrder'), { items: ordered }, {
        preserveScroll: true,
        onSuccess: () => {
            router.reload({ only: ['menus'] });
        },
        onError: () => {
            alert('Error al guardar el orden.');
        },
    });
}




</script>

<template>
    <Head title="Configuración" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <h1 class="text-2xl font-bold mb-4 text-white-700">Configuración de Menús</h1>

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Menús</h2>
                <button @click="openCreateModal" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Crear menú
                </button>
            </div>

            <!-- Tabla con drag and drop -->
            <draggable
                v-model="menus"
                group="menus"
                item-key="id"
                @end="onDragEnd"
                :animation="200"
                class="space-y-2"
            >
                <template #item="{ element: menu }" >
                    <div class="border rounded shadow p-3">
                        <div class="flex justify-between items-center">
                            <div>
                                <strong>{{ menu.label }}</strong>
                                <div class="text-xs">URL: {{ menu.url }} | Icono:    <Icon :name="menu.icon"  size="10" /></div>
                            </div>
                            <div class="space-x-2">
                                <button @click="openEditModal(menu)" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Editar</button>
                                <button @click="deleteMenu(menu)" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-blue-700">Eliminar</button>
                            </div>
                        </div>

                        <!-- Submenús (children) -->
                        <draggable
                            v-model="menu.children"
                            group="menus"
                            item-key="id"
                            @end="onDragEnd"
                            :animation="150"
                            class="mt-2 ml-4 space-y-1"
                        >
                            <template #item="{ element: child }">
                                <div class="p-2 border rounded  flex justify-between items-center">
                                    <div>
                                        ↳ <strong>{{ child.label }}</strong>
                                        <div class="text-xs text-grey-500 ">URL: {{ child.url }} | Icono:    <Icon :name="child.icon"  size="10" /></div>
                                    </div>
                                    <div class="space-x-2">
                                        <button @click="openEditModal(child)" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Editar</button>
                                        <button @click="deleteMenu(child)" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-blue-700">Eliminar</button>
                                    </div>
                                </div>
                            </template>
                        </draggable>
                    </div>
                </template>
            </draggable>
        </div>

        <!-- Modal -->
        <div v-if="showModal" class="fixed inset-0  flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h3 class="text-black text-lg font-bold mb-4">
                    {{ isEditing ? 'Editar menú' : 'Crear menú' }}
                </h3>
                <form @submit.prevent="saveMenu" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-black">Label</label>
                        <input v-model="form.label" type="text" class="w-full border rounded px-3 py-2 text-black" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-black">URL</label>
                        <input v-model="form.url" type="text" class="w-full border rounded px-3 py-2 text-black" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-black">Ícono</label>
                        <input v-model="form.icon" type="text" class="w-full border rounded px-3 py-2 text-black" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-black">ID del padre (opcional)</label>
                        <input v-model="form.parent_id" type="number" class="w-full border rounded px-3 py-2 text-black" />
                    </div>
                    <div class="flex justify-end space-x-2 pt-4 text-black">
                        <button type="button" @click="showModal = false" class=" text-black px-4 py-2 bg-red-300 rounded hover:bg-gray-400">
                            Cancelar
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>
