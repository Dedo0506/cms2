<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app" class="container mt-5">
        <h1 class="mb-4">Usuarios</h1>
        <button class="btn btn-primary mb-4" v-on:click="openAddModal">Agregar usuario</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Usuario</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="usuario in usuarios" :key="usuario.id">
                    <td>@{{ usuario.id }}</td>
                    <td>@{{ usuario.name }}</td>
                    <td>@{{ usuario.email }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" v-on:click="openEditModal(usuario)">Editar</button>
                        <button class="btn btn-danger btn-sm" v-on:click="deleteUsuario(usuario.id)">Borrar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        @include('modals.modalUsStore')
        @include('modals.modalUsUpd')
        @include('modals.modalUsDel')
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
        var ComponenteUsuario = new Vue({
            el: '#app',
            data: {
                usuarios: [],
                newUsuario: {
                    name: '',
                    email: '',
                    password: ''
                },
                currentUsuario: {
                    id: '',
                    name: '',
                    email: '',
                    password: ''
                },
                csrfToken: '{{ csrf_token() }}',
                deleteUsuarioId: ''
            },
            methods: {
                init() {
                    axios.get('/api/usuarios')
                        .then(response => {
                            this.usuarios = response.data;
                        })
                        .catch(error => {
                            console.log(error);
                        });
                },
                openAddModal() {
                    this.resetForm();
                    $('#addUsuarioModal').modal('show');
                },
                submitUsuario() {
                    axios.post('/api/usuarios', this.newUsuario, {
                        headers: {
                            'X-CSRF-TOKEN': this.csrfToken
                        }
                    })
                    .then(response => {
                        this.usuarios.push(response.data);
                        this.resetForm();
                        $('#addUsuarioModal').modal('hide');
                    })
                    .catch(error => {
                        console.log(error);
                    });
                },
                openEditModal(usuario) {
                    this.currentUsuario = Object.assign({}, usuario);
                    $('#editUsuarioModal').modal('show');
                },
                updateUsuario() {
                    axios.put('/api/usuarios/' + this.currentUsuario.id, this.currentUsuario, {
                        headers: {
                            'X-CSRF-TOKEN': this.csrfToken
                        }
                    })
                    .then(response => {
                        const index = this.usuarios.findIndex(u => u.id === this.currentUsuario.id);
                        this.usuarios.splice(index, 1, response.data);
                        this.resetForm();
                        $('#editUsuarioModal').modal('hide');
                    })
                    .catch(error => {
                        console.log(error);
                    });
                },
                deleteUsuario(id) {
                    this.deleteUsuarioId = id;
                    $('#deleteConfirmationModal').modal('show');
                },
                confirmDelete() {
                    axios.delete('/api/usuarios/' + this.deleteUsuarioId, {
                        headers: {
                            'X-CSRF-TOKEN': this.csrfToken
                        }
                    })
                    .then(response => {
                        this.usuarios = this.usuarios.filter(usuario => usuario.id !== this.deleteUsuarioId);
                        $('#deleteConfirmationModal').modal('hide');
                    })
                    .catch(error => {
                        console.log(error);
                    });
                },
                resetForm() {
                    this.newUsuario = {
                        name: '',
                        email: '',
                        password: ''
                    };
                    this.currentUsuario = {
                        id: '',
                        name: '',
                        email: '',
                        password: ''
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
