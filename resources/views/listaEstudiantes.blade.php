<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app" class="container mt-5">
        <h1 class="mb-4">Lista de estudiantes</h1>
        <button class="btn btn-primary mb-4" v-on:click="openAddModal">Agregar estudiante</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NumCuenta</th>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Fecha de Ingreso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="estudiante in estudiantes" :key="estudiante.NumCuenta">
                    <td>@{{ estudiante.NumCuenta }}</td>
                    <td>@{{ estudiante.Nombre }}</td>
                    <td>@{{ estudiante.PrimerApellido }}</td>
                    <td>@{{ estudiante.SegundoApellido }}</td>
                    <td>@{{ estudiante.FechaIngreso }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" @click="openEditModal(estudiante)">Editar</button>
                        <button class="btn btn-danger btn-sm" @click="deleteEstudiante(estudiante.NumCuenta)">Borrar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        @include('modals.modalEstStore')

        @include('modals.modalEstUpd')

        @include('modals.modalEstDel')

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
    var ComponenteEstudiante = new Vue({
        el: '#app',
        data: {
            estudiantes: [],
            newEstudiante: {
                NumCuenta:'',
                Nombre: '',
                PrimerApellido: '',
                SegundoApellido: '',
                FechaIngreso: ''
            },
            currentEstudiante: {
                NumCuenta:'',
                Nombre: '',
                PrimerApellido: '',
                SegundoApellido: '',
                FechaIngreso: ''
            },
            csrfToken: '{{ csrf_token() }}',
            deleteNumCuenta: ''
        },
        methods: {
            init() {
                axios.get('/api/estudiante')
                    .then(response => {
                        this.estudiantes = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            openAddModal() {
                this.resetForm();
                $('#addEstudianteModal').modal('show');
            },
            submitEstudiante() {
                axios.post('/api/estudiante', this.newEstudiante, {
                    headers: {
                        'X-CSRF-TOKEN': this.csrfToken
                    }
                })
                .then(response => {
                    this.estudiantes.push(response.data);
                    this.resetForm();
                    $('#addEstudianteModal').modal('hide');
                })
                .catch(error => {
                    console.log(error);
                });
            },
            openEditModal(estudiante) {
                this.currentEstudiante = Object.assign({}, estudiante);
                $('#editEstudianteModal').modal('show');
            },
            updateEstudiante() {
                axios.put('/api/estudiante/' + this.currentEstudiante.NumCuenta, this.currentEstudiante, {
                    headers: {
                        'X-CSRF-TOKEN': this.csrfToken
                    }
                })
                .then(response => {
                    const index = this.estudiantes.findIndex(c => c.NumCuenta === this.currentEstudiante.NumCuenta);
                    this.estudiantes.splice(index, 1, response.data);
                    this.resetForm();
                    $('#editEstudianteModal').modal('hide');
                })
                .catch(error => {
                    console.log(error);
                });
            },
            deleteEstudiante(NumCuenta) {
                this.deleteNumCuenta = NumCuenta;
                $('#deleteConfirmationModal').modal('show');
            },
            confirmDelete() {
                axios.delete('/api/estudiante/' + this.deleteNumCuenta, {
                    headers: {
                        'X-CSRF-TOKEN': this.csrfToken
                    }
                })
                .then(response => {
                    this.estudiantes = this.estudiantes.filter(estudiante => estudiante.NumCuenta !== this.deleteNumCuenta);
                    $('#deleteConfirmationModal').modal('hide');
                })
                .catch(error => {
                    console.log(error);
                });
            },
            resetForm() {
                this.newEstudiante= {
                    NumCuenta:'',
                    Nombre: '',
                    PrimerApellido: '',
                    SegundoApellido: '',
                    FechaIngreso: ''
                };
                this.currentEstudiante = {
                    NumCuenta:'',
                    Nombre: '',
                    PrimerApellido: '',
                    SegundoApellido: '',
                    FechaIngreso: ''
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
