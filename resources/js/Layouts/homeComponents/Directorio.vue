<template>
    <div>
      <h2>Directorio Telefónico</h2>
      <table>
        <thead>
          <tr>
            <i class="pi pi-breafcast"></i>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo Electrónico</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(contact, index) in contacts" :key="index">
            <td>{{ contact.nombre }}</td>
            <td>{{ contact.telefono }}</td>
            <td>{{ contact.correo }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import { PrimeIcons } from 'primevue/api';
  export default {
    data() {
      return {
        contacts: [
          { nombre: 'Juan Pérez', telefono: '555-123-4567', correo: 'juan@example.com' },
          { nombre: 'María López', telefono: '555-987-6543', correo: 'maria@example.com' },
          // Agrega más contactos según sea necesario
        ]
      };
    }
  };
  </script>
  <stile scooped>
    .pi pi-pi-breafcast{
        color: slateblue;
    }
  </stile>