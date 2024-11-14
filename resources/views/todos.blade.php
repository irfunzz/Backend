@extends('app')

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TO DO LIST</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #5C6BC0;
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: white;
        }
        .navbar-nav .nav-link:hover {
            color: #FFEB3B;
        }
        .alert {
            font-size: 1.1rem;
        }
        .todo-table th, .todo-table td {
            vertical-align: middle;
        }
        .badge {
            padding: 5px 10px;
            font-size: 0.9rem;
        }
        .table-hover tbody tr:hover {
            background-color: #EDE7F6;
        }
        .table-actions i {
            font-size: 1.25rem;
            cursor: pointer;
            color: #007bff;
        }
        .table-actions i:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">TO DO LIST</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger text-center">
                    {{$error}}
                </div>
            @endforeach
        @endif
    </div>

    <div class="container text-center">
        <h2 class="text-primary mb-4">Hello <strong>{{ auth()->user()->name }}</strong>, these are your todos</h2>
        <h3 class="mb-4">Add Todo</h3>

        <!-- Todo Add Form -->
        <form class="row g-3 justify-content-center mb-5" method="POST" action="{{ route('todos.store') }}">
            @csrf
            <div class="col-md-6">
                <input type="text" class="form-control form-control-lg" name="title" placeholder="Title" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-lg btn-primary">Add Todo</button>
            </div>
        </form>
    </div>

    <div class="container text-center">
        <h3 class="mb-4">All Todos</h3>

        <!-- Todos Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover todo-table">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Todo</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter=1; @endphp
                    @foreach($todos as $todo)
                        @if(auth()->user()->id == $todo->user_id)
                            <tr>
                                <th>{{ $counter }}</th>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->created_at }}</td>
                                <td>
                                    @if($todo->is_completed)
                                        <div class="badge bg-success">Completed</div>
                                    @else
                                        <div class="badge bg-warning">Not Completed</div>
                                    @endif
                                </td>
                                <td class="table-actions">
                                    <a href="{{ route('todos.edit', ['todo' => $todo->id]) }}">
                                        <i class="fas fa-edit" data-bs-toggle="tooltip" title="Edit"></i>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{$todo->id}}">
                                        <i class="fas fa-trash-alt" data-bs-toggle="tooltip" title="Delete"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal for Delete Confirmation -->
                            <div class="modal fade" id="deleteModal{{$todo->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$todo->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{$todo->id}}">Delete Todo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this todo item?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @php $counter++; @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            // Activate tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>
