<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <section class="todos">
        <h1 class="">todos</h1>
        <form action="{{ route('todos.store') }}" method="POST" id="task-form" class="mb-4">
            @csrf
            <input type="text" name="title" placeholder="What needs to be done?" class="w-full p-2 border rounded"
                id="task-input" required>
        </form>

        <ul class="list-none">
            @foreach ($todos as $todo)
                <li class="flex items-center justify-between p-2">
                    <input type="checkbox" onclick="this.form.submit()" {{ $todo->completed ? 'checked' : '' }}>
                    <span class="{{ $todo->completed ? 'line-through text-gray-500' : '' }}">{{ $todo->title }}</span>
                    <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">✖</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </section>
</body>

<script>
    document.getElementById('task-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            document.getElementById('task-form').submit();
        }
    });
</script>

</html>
