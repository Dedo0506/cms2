<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app" class="container mt-5">
        <h1 class="mb-4">Categorias</h1>
        <button class="btn btn-primary mb-4" v-on:click="openAddModal">Agregar categoria</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Categoria</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="category in categories" :key="category.id">
                    <td>@{{ category.id }}</td>
                    <td>@{{ category.nombreCategoria }}</td>
                    <td>@{{ category.Descripcion }}</td>
                    <td><button class="btn btn-warning btn-sm" v-on:click="openEditModal(category)">Editar</button>
                        <button class="btn btn-danger btn-sm" v-on:click="deleteCategory(category.id)">Borrar</button>

                    </td>
                </tr>
            </tbody>
        </table>
        @include('modals.modalCatStore')

        @include('modals.modalCatUpd')

        @include('modals.modalCatDel')

    </div>

 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <!-- Bootstrap JS -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <!-- Vue.js -->
 <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
 <!-- Axios for HTTP requests -->
 <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
 <!-- Custom Script -->
 <script>
    var ComponenteCategoria = new Vue({
        el: '#app',
        data: {
            categories: [],
            newCategory: {
                name: '',
                description: '',
                creator: '',
                created_at: ''
            },
            currentCategory: {
                id: '',
                nombreCategoria: '',
                Descripcion: '',
                UsuarioCreador: '',
                FechaCreacion: ''
            },
            csrfToken: '{{ csrf_token() }}',
            deleteCategoryId: ''
        },
        methods: {
            init() {
                axios.get('/api/categoria')
                    .then(response => {
                        this.categories = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            openAddModal() {
                this.resetForm();
                $('#addCategoryModal').modal('show');
            },
            submitCategory() {
                axios.post('/api/categoria', this.newCategory, {
                    headers: {
                        'X-CSRF-TOKEN': this.csrfToken
                    }
                })
                .then(response => {
                    this.categories.push(response.data);
                    this.resetForm();
                    $('#addCategoryModal').modal('hide');
                })
                .catch(error => {
                    console.log(error);
                });
            },
            openEditModal(category) {
                this.currentCategory = Object.assign({}, category);
                $('#editCategoryModal').modal('show');
            },
            updateCategory() {
                axios.put('/api/categoria/' + this.currentCategory.id, this.currentCategory, {
                    headers: {
                        'X-CSRF-TOKEN': this.csrfToken
                    }
                })
                .then(response => {
                    const index = this.categories.findIndex(c => c.id === this.currentCategory.id);
                    this.categories.splice(index, 1, response.data);
                    this.resetForm();
                    $('#editCategoryModal').modal('hide');
                })
                .catch(error => {
                    console.log(error);
                });
            },
            deleteCategory(id) {
                this.deleteCategoryId = id;
                $('#deleteConfirmationModal').modal('show');
            },
            confirmDelete() {
                axios.delete('/api/categoria/' + this.deleteCategoryId, {
                    headers: {
                        'X-CSRF-TOKEN': this.csrfToken
                    }
                })
                .then(response => {
                    this.categories = this.categories.filter(category => category.id !== this.deleteCategoryId);
                    $('#deleteConfirmationModal').modal('hide');
                })
                .catch(error => {
                    console.log(error);
                });
            },
            resetForm() {
                this.newCategory = {
                    name: '',
                    description: '',
                    creator: '',
                    created_at: ''
                };
                this.currentCategory = {
                    id: '',
                    name: '',
                    description: '',
                    creator: '',
                    created_at: ''
                };
            }
        },
        created() {
            this.init();
        }
    });
</script>
</body>
</html>
