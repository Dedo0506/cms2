<!-- Modal for Editing a Student -->
<div class="modal fade" id="editEstudianteModal" tabindex="-1" aria-labelledby="editEstudianteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editEstudianteModalLabel">Editar Estudiante</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="updateEstudiante">
            <input type="hidden" name="_token" :value="csrfToken">
            <div class="form-group">
              <label for="NumCuenta">Número de Cuenta</label>
              <input type="text" class="form-control" v-model="currentEstudiante.NumCuenta" required readonly>
            </div>
            <div class="form-group">
              <label for="Nombre">Nombre</label>
              <input type="text" class="form-control" v-model="currentEstudiante.Nombre" required>
            </div>
            <div class="form-group">
              <label for="PrimerApellido">Primer Apellido</label>
              <input type="text" class="form-control" v-model="currentEstudiante.PrimerApellido" required>
            </div>
            <div class="form-group">
              <label for="SegundoApellido">Segundo Apellido</label>
              <input type="text" class="form-control" v-model="currentEstudiante.SegundoApellido" required>
            </div>
            <div class="form-group">
              <label for="FechaIngreso">Fecha de Ingreso</label>
              <input type="date" class="form-control" v-model="currentEstudiante.FechaIngreso" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  