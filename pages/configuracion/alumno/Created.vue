<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';

const nombre = ref('');
const apellidos = ref('');
const fechaNacimiento = ref('');
const genero = ref('');
const cui = ref('');
const nacionalidad = ref('Guatemalteca');
const telefono = ref('');
const email = ref('');
const departamento = ref('');
const municipio = ref('');
const zona = ref('');
const direccionDetallada = ref('');
const nombreEncargado = ref('');
const telefonoEncargado = ref('');
const dpi = ref('');
const parentescoEncargado = ref('');
const codigoAlumno = ref('');
const gradoActual = ref('');
const nivel = ref('');
const seccion = ref('');
const turno = ref('');
const anioLectivo = ref('');
const estado = ref('');
const fechaInscripcion = ref('');
const fechaRetiro = ref('');
const motivoRetiro = ref('');
const beca = ref(false);
const foto = ref('');
const tipoSangre = ref('');
const alergias = ref('');
const enfermedadesCronicas = ref('');
const discapacidad = ref(false);
const descripcionDiscapacidad = ref('');

function submit() {
  router.post('/configuracion/alumno', {
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
    fecha_inscripcion: fechaInscripcion.value,
    fecha_retiro: fechaRetiro.value,
    motivo_retiro: motivoRetiro.value,
    beca: beca.value,
    foto: foto.value,
    tipo_sangre: tipoSangre.value,
    alergias: alergias.value,
    enfermedades_cronicas: enfermedadesCronicas.value,
    discapacidad: discapacidad.value,
    descripcion_discapacidad: descripcionDiscapacidad.value,
  });
}




function handleImageUpload(event) {
  const file = event.target.files[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = (e) => {
    if (typeof e.target.result === 'string') {
      foto.value = e.target.result;
    }
  };
  reader.readAsDataURL(file);
}


</script>

<template>
  <Head title="Crear Alumno" />

  <AppLayout>
    <div class="w-full px-8 py-10">
      <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-10">Crear Alumno</h1>

      <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Sección 1: Información Personal -->
        <div class="col-span-1 md:col-span-2">
          <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6 border-b pb-2">Información Personal</h2>
        </div>
        <!-- Campos existentes de información personal -->
                 <!-- Nombre -->
        <div class="col-span-1">
          <label for="nombre" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Nombre</label>
          <input
            id="nombre"
            v-model="nombre"
            type="text"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ingrese el nombre del alumno"
          />
        </div>

        <!-- Apellidos -->
        <div class="col-span-1">
          <label for="apellidos" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Apellidos</label>
          <input
            id="apellidos"
            v-model="apellidos"
            type="text"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ingrese los apellidos del alumno"
          />
        </div>

        <!-- Fecha de Nacimiento -->
        <div class="col-span-1">
          <label for="fechaNacimiento" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Nacimiento</label>
          <input
            id="fechaNacimiento"
            v-model="fechaNacimiento"
            type="date"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Seleccione la fecha de nacimiento"
          />
        </div>

        <!-- Género -->
        <div class="col-span-1">
          <label for="genero" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Género</label>
          <select
            id="genero"
            v-model="genero"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Seleccione el género"
          >
            <option value="">Seleccionar</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
          </select>
        </div>

        <!-- CUI -->
        <div class="col-span-1">
          <label for="cui" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">CUI</label>
          <input
            id="cui"
            v-model="cui"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ingrese el CUI del alumno"
          />
        </div>

        <!-- Nacionalidad -->
        <div class="col-span-1">
          <label for="nacionalidad" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Nacionalidad</label>
          <input
            id="nacionalidad"
            v-model="nacionalidad"
            type="text"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ingrese la nacionalidad del alumno"
          />
        </div>

        <!-- Teléfono -->
        <div class="col-span-1">
          <label for="telefono" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Teléfono</label>
          <input
            id="telefono"
            v-model="telefono"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ingrese el teléfono del alumno"
          />
        </div>

        <!-- Email -->
        <div class="col-span-1">
          <label for="email" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
          <input
            id="email"
            v-model="email"
            type="email"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ingrese el email del alumno"
          />
        </div>

        <!-- Estado -->
        <div class="col-span-1">
          <label for="estado" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Estado</label>
          <select
            id="estado"
            v-model="estado"
            required
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Seleccione el estado"
          >
            <option value="activo">Activo</option>
            <option value="retirado">Retirado</option>
            <option value="egresado">Egresado</option>
            <option value="suspendido">Suspendido</option>
          </select>
        </div>
        <!-- ... (nombre, apellidos, fechaNacimiento, genero, cui, nacionalidad) ... -->

        <!-- Sección 2: Dirección -->
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
            placeholder="Ingrese el departamento"
          />
        </div>
        
        <div class="col-span-1">
          <label for="municipio" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Municipio</label>
          <input
            id="municipio"
            v-model="municipio"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ingrese el municipio"
          />
        </div>

        <div class="col-span-1">
          <label for="zona" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Zona</label>
          <input
            id="zona"
            v-model="zona"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ingrese la zona"
          />
        </div>

        <div class="col-span-1">
          <label for="direccionDetallada" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Dirección Detallada</label>
          <textarea
            id="direccionDetallada"
            v-model="direccionDetallada"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ingrese dirección completa"
            rows="3"
          ></textarea>
        </div>

        <!-- Sección 3: Encargado -->
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
            placeholder="Nombre completo del encargado"
          />
        </div>

        <div class="col-span-1">
          <label for="telefonoEncargado" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Teléfono del Encargado</label>
          <input
            id="telefonoEncargado"
            v-model="telefonoEncargado"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Número de contacto"
          />
        </div>

        <div class="col-span-1">
          <label for="dpi" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">DPI del Encargado</label>
          <input
            id="dpi"
            v-model="dpi"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Número de DPI"
          />
        </div>

        <div class="col-span-1">
          <label for="parentescoEncargado" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Parentesco</label>
          <select
            id="parentescoEncargado"
            v-model="parentescoEncargado"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="">Seleccionar parentesco</option>
            <option value="Padre">Padre</option>
            <option value="Madre">Madre</option>
            <option value="Tutor">Tutor</option>
            <option value="Otro">Otro</option>
          </select>
        </div>

        <!-- Sección 4: Información Académica -->
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
            placeholder="Código único del alumno"
          />
        </div>

        <div class="col-span-1">
          <label for="gradoActual" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Grado Actual</label>
          <input
            id="gradoActual"
            v-model="gradoActual"
            type="text"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Ej: 1ro Primaria"
          />
        </div>

        <div class="col-span-1">
          <label for="nivel" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">Nivel Educativo</label>
          <select
            id="nivel"
            v-model="nivel"
            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="">Seleccionar nivel</option>
            <option value="Pre-primaria">Pre-primaria</option>
            <option value="Primaria">Primaria</option>
            <option value="Básicos">Básicos</option>
            <option value="Diversificado">Diversificado</option>
          </select>
        </div>

        <!-- Sección 5: Información Médica -->
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
            <option value="">Seleccionar tipo</option>
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

        <!-- Resto de campos médicos y otros... -->
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
    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
  />

  <input
    type="file"
    accept="image/*"
    @change="handleImageUpload"
    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
  />
</div>

        <!-- Botón de envío -->
        <div class="col-span-1 md:col-span-2 flex justify-end mt-6">
          <button
            type="submit"
            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-base font-semibold rounded-lg transition"
          >
            Guardar Alumno
          </button>
        </div>
        
      </form>
    </div>
  </AppLayout>
</template>