<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Agregar categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="submitCategory">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" :value="csrfToken">
                    <div class="form-group">
                        <label for="name">Nombre Categoria</label>
                        <input type="text" class="form-control" id="name" v-model="newCategory.name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea class="form-control" id="description" v-model="newCategory.description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="creator">Usuario creador</label>
                        <input type="text" class="form-control" id="creator" v-model="newCategory.creator" required>
                    </div>
                    <div class="form-group">
                        <label for="created_at">Fecha Registro</label>
                        <input type="date" class="form-control" id="created_at" v-model="newCategory.created_at" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
