<div class="modal fade" id="editUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="editUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUsuarioModalLabel">Editar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="updateUsuario">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" :value="csrfToken">
                    <div class="form-group">
                        <label for="edit_name">Nombre Usuario</label>
                        <input type="text" class="form-control" id="edit_name" name="name" v-model="currentUsuario.name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" v-model="currentUsuario.email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_password">Contraseña</label>
                        <input type="password" class="form-control" id="edit_password" name="password" v-model="currentUsuario.password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
