<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h3 class="ops-title">TODOリスト</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <table class="table text-center">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">TODO</th>
                    <th class="text-center">説明</th>
                    <th class="text-center">完了状態</th>
                    <th class="text-center">削除</th>
                </tr>
                @foreach($todo_lists ?? '' as $todo_list)
                <tr>
                    <td>
                    <a href="{{ route('todolist.edit', ['todolist' => $todo_list->id]) }}">{{ $todo_list->id }}</a>
                    </td>
                    <td>{{ $todo_list->title }}</td>
                    <td>{{ $todo_list->description }}</td>
                    <td>{{ $todo_list->complete === 1 ? '完了' : '未完了' }}</td>
                    <td>
                    <form action="{{ route('todolist.destroy', ['todolist' => $todo_list->id]) }}" method="post">
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                    </td>
                </tr>
                @endforeach
                </table>
                <div><a href="{{ route('todolist.create') }}" class="btn btn-default">新規作成</a>
            </div>
        </div>
    </div>
</body>
</html>
