<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">
    <title>To Do List</title>
</head>

<body>
    <div class="container">
        <h1>To Do List</h1>
        <div class="input_task">
            <form action="{{ route('store') }}" method="POST" autocomplete="off">
                @csrf
                <input type="text" name="content" placeholder="Add a task">
                <button id="btnAdd" type="submit">
                    <i class="fa fa-plus"></i>
                </button>
            </form>
        </div>
        @if(count($todolists))
        <ul>
            @foreach ($todolists as $todolist)
            <li>
                {{ $todolist->content }}
                <form action="{{ route('destroy',$todolist->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button id="btnDelete" type="submit">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </li>
            @endforeach
        </ul>
        <br>
        <hr/>
        <p>You have {{count($todolists)==1?count($todolists).' task':count($todolists).' tasks'}} pending</p>
        @else
        <p>You don't have any task!</p>
        @endif
    </div>
</body>

</html>