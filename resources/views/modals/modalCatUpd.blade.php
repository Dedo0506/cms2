<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Editar categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="updateCategory">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" :value="csrfToken">
                    <div class="form-group">
                        <label for="edit_name">Nombre categoria</label>
                        <input type="text" class="form-control" id="name" name="name" v-model="currentCategory.nombreCategoria" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_description">Descripcion</label>
                        <textarea class="form-control" id="description" name="description" v-model="currentCategory.Descripcion" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_creator">Usuario creador</label>
                        <input type="text" class="form-control" id="creator" name="creator" v-model="currentCategory.UsuarioCreador" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_created_at">Fecha creacion</label>
                        <input type="date" class="form-control" id="created_at" name="created_at" v-model="currentCategory.FechaCreacion" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
