<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';

const props = defineProps<{
  alumno: {
    id: number;
    nombre: string;
    apellidos: string;
    fecha_nacimiento: string;
    genero: string;
    cui: string;
    nacionalidad: string;
    telefono: string;
    email: string;
    departamento: string;
    municipio: string;
    zona: string;
    direccion_detallada: string;
    nombre_encargado: string;
    telefono_encargado: string;
    dpi: string;
    parentesco_encargado: string;
    codigo_alumno: string;
    grado_actual: string;
    nivel: string;
    seccion: string;
    turno: string;
    anio_lectivo: string;
    estado: string;
    foto: string;
    tipo_sangre: string;
    alergias: string;
    enfermedades_cronicas: string;
    discapacidad: boolean;
    descripcion_discapacidad: string;
  };
}>();

const nombre = ref(props.alumno.nombre);
const apellidos = ref(props.alumno.apellidos);
const fechaNacimiento = ref(props.alumno.fecha_nacimiento);
const genero = ref(props.alumno.genero);
const cui = ref(props.alumno.cui);
const nacionalidad = ref(props.alumno.nacionalidad);
const telefono = ref(props.alumno.telefono);
const email = ref(props.alumno.email);
const departamento = ref(props.alumno.departamento);
const municipio = ref(props.alumno.municipio);
const zona = ref(props.alumno.zona);
const direccionDetallada = ref(props.alumno.direccion_detallada);
const nombreEncargado = ref(props.alumno.nombre_encargado);
const telefonoEncargado = ref(props.alumno.telefono_encargado);
const dpi = ref(props.alumno.dpi);
const parentescoEncargado = ref(props.alumno.parentesco_encargado);
const codigoAlumno = ref(props.alumno.codigo_alumno);
const gradoActual = ref(props.alumno.grado_actual);
const nivel = ref(props.alumno.nivel);
const seccion = ref(props.alumno.seccion);
const turno = ref(props.alumno.turno);
const anioLectivo = ref(props.alumno.anio_lectivo);
const estado = ref(props.alumno.estado);
const foto = ref(props.alumno.foto);
const tipoSangre = ref(props.alumno.tipo_sangre);
const alergias = ref(props.alumno.alergias);
const enfermedadesCronicas = ref(props.alumno.enfermedades_cronicas);
const discapacidad = ref(props.alumno.discapacidad);
const descripcionDiscapacidad = ref(props.alumno.descripcion_discapacidad);

function submit() {
  router.put(`/configuracion/alumno/${props.alumno.id}`, {
    nombre: nombre.value,
    apellidos: apellidos.value,
    fecha_nacimiento: fechaNacimiento.value,
    genero: genero.value,
    cui: cui.value,
    nacionalidad: nacionalidad.value,
    telefono: telefono.value,
    email: email.value,
    departamento: departamento.value,
    municipio: municipio.value,
    zona: zona.value,
    direccion_detallada: direccionDetallada.value,
    nombre_encargado: nombreEncargado.value,
    telefono_encargado: telefonoEncargado.value,
    dpi: dpi.value,
    parentesco_encargado: parentescoEncargado.value,
    codigo_alumno: codigoAlumno.value,
    grado_actual: gradoActual.value,
    nivel: nivel.value,
    seccion: seccion.value,
    turno: turno.value,
    anio_lectivo: anioLectivo.value,
    estado: estado.value,
    foto: foto.value,
    tipo_sangre: tipoSangre.value,
    alergias: alergias.value,
    enfermedades_cronicas: enfermedadesCronicas.value,
    discapacidad: discapacidad.value,
    descripcion_discapacidad: descripcionDiscapacidad.value,
  });
}
</script>

<template>
  <Head title="Editar Alumno" />

  <AppLayout>
    <div class="w-full px-8 py-10">
      <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-10">Editar Alumno</h1>

      <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Sección 1: Información Personal -->
        <div class="col-span-1 md:col-span-2">
          <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 border-b pb-2">Información Personal</h2>
        </div>
        <div class="col-span-1">
          <label for="nombre" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Nombre</label>
          <input
            id="nombre"
            v-model="nombre"
            type="text"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="apellidos" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Apellidos</label>
          <input
            id="apellidos"
            v-model="apellidos"
            type="text"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="fechaNacimiento" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Nacimiento</label>
          <input
            id="fechaNacimiento"
            v-model="fechaNacimiento"
            type="date"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="genero" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Género</label>
          <select
            id="genero"
            v-model="genero"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
          </select>
        </div>

        <div class="col-span-1">
          <label for="cui" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">CUI</label>
          <input
            id="cui"
            v-model="cui"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="nacionalidad" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Nacionalidad</label>
          <input
            id="nacionalidad"
            v-model="nacionalidad"
            type="text"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <!-- Sección 2: Contacto -->
        <div class="col-span-1 md:col-span-2">
          <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 border-b pb-2">Información de Contacto</h2>
        </div>
        <div class="col-span-1">
          <label for="telefono" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Teléfono</label>
          <input
            id="telefono"
            v-model="telefono"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="email" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
          <input
            id="email"
            v-model="email"
            type="email"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <!-- Sección 3: Dirección -->
        <div class="col-span-1 md:col-span-2">
          <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 border-b pb-2">Dirección</h2>
        </div>
        <div class="col-span-1">
          <label for="departamento" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Departamento</label>
          <input
            id="departamento"
            v-model="departamento"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="municipio" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Municipio</label>
          <input
            id="municipio"
            v-model="municipio"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="zona" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Zona</label>
          <input
            id="zona"
            v-model="zona"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="direccionDetallada" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Dirección Detallada</label>
          <textarea
            id="direccionDetallada"
            v-model="direccionDetallada"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            rows="3"
          ></textarea>
        </div>

        <!-- Sección 4: Encargado -->
        <div class="col-span-1 md:col-span-2">
          <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 border-b pb-2">Datos del Encargado</h2>
        </div>
        <div class="col-span-1">
          <label for="nombreEncargado" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Nombre del Encargado</label>
          <input
            id="nombreEncargado"
            v-model="nombreEncargado"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="telefonoEncargado" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Teléfono del Encargado</label>
          <input
            id="telefonoEncargado"
            v-model="telefonoEncargado"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="dpi" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">DPI del Encargado</label>
          <input
            id="dpi"
            v-model="dpi"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="parentescoEncargado" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Parentesco</label>
          <select
            id="parentescoEncargado"
            v-model="parentescoEncargado"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="Padre">Padre</option>
            <option value="Madre">Madre</option>
            <option value="Tutor">Tutor</option>
            <option value="Otro">Otro</option>
          </select>
        </div>

        <!-- Sección 5: Información Académica -->
        <div class="col-span-1 md:col-span-2">
          <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 border-b pb-2">Información Académica</h2>
        </div>
        <div class="col-span-1">
          <label for="codigoAlumno" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Código del Alumno</label>
          <input
            id="codigoAlumno"
            v-model="codigoAlumno"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="gradoActual" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Grado Actual</label>
          <input
            id="gradoActual"
            v-model="gradoActual"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="nivel" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Nivel Educativo</label>
          <select
            id="nivel"
            v-model="nivel"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="Pre-primaria">Pre-primaria</option>
            <option value="Primaria">Primaria</option>
            <option value="Básicos">Básicos</option>
            <option value="Diversificado">Diversificado</option>
          </select>
        </div>

        <div class="col-span-1">
          <label for="seccion" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Sección</label>
          <input
            id="seccion"
            v-model="seccion"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="col-span-1">
          <label for="turno" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Turno</label>
          <select
            id="turno"
            v-model="turno"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="Matutino">Matutino</option>
            <option value="Vespertino">Vespertino</option>
          </select>
        </div>

        <div class="col-span-1">
          <label for="anioLectivo" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Año Lectivo</label>
          <input
            id="anioLectivo"
            v-model="anioLectivo"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <!-- Sección 6: Información Médica -->
        <div class="col-span-1 md:col-span-2">
          <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 border-b pb-2">Información Médica</h2>
        </div>
        <div class="col-span-1">
          <label for="tipoSangre" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Tipo de Sangre</label>
          <select
            id="tipoSangre"
            v-model="tipoSangre"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
          </select>
        </div>

        <div class="col-span-1">
          <label for="alergias" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Alergias</label>
          <textarea
            id="alergias"
            v-model="alergias"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            rows="3"
          ></textarea>
        </div>

        <div class="col-span-1">
          <label for="enfermedadesCronicas" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Enfermedades Crónicas</label>
          <textarea
            id="enfermedadesCronicas"
            v-model="enfermedadesCronicas"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            rows="3"
          ></textarea>
        </div>

        <div class="col-span-1">
          <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Discapacidad</label>
          <div class="flex items-center space-x-4">
            <label class="flex items-center">
              <input
                type="radio"
                v-model="discapacidad"
                :value="true"
                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
              />
              <span class="ml-2">Sí</span>
            </label>
            <label class="flex items-center">
              <input
                type="radio"
                v-model="discapacidad"
                :value="false"
                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
              />
              <span class="ml-2">No</span>
            </label>
          </div>
        </div>

        <div class="col-span-1" v-if="discapacidad">
          <label for="descripcionDiscapacidad" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Descripción de Discapacidad</label>
          <textarea
            id="descripcionDiscapacidad"
            v-model="descripcionDiscapacidad"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            rows="3"
          ></textarea>
        </div>

        <!-- Sección 7: Estado y Foto -->
        <div class="col-span-1 md:col-span-2">
          <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 border-b pb-2">Estado y Documentos</h2>
        </div>
        <div class="col-span-1">
          <label for="estado" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Estado</label>
          <select
            id="estado"
            v-model="estado"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="activo">Activo</option>
            <option value="retirado">Retirado</option>
            <option value="egresado">Egresado</option>
            <option value="suspendido">Suspendido</option>
          </select>
        </div>

        <div class="col-span-1">
          <label for="foto" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Foto (URL)</label>
          <input
            id="foto"
            v-model="foto"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <!-- Botón de Actualización -->
        <div class="col-span-1 md:col-span-2 flex justify-end mt-6">
          <button
            type="submit"
            class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white text-base font-semibold rounded-lg transition"
          >
            Actualizar Alumno
          </button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>