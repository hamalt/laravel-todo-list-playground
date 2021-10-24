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
        <div class="col-md-6">
            <h2>TODOリスト登録</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            @include('todolist/message')

            @if($target === 'store')
            <form action="{{ route('todolist.index') }}" method="post">
            @elseif($target === 'update')
            <form action="{{ route('todolist.update', ['todolist' => $todo_list->id ]) }}" method="post">
                <!-- updateメソッドにはPUTメソッドがルーティングされているのでPUTにする -->
                {{ method_field('PUT') }}
            @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="title">TODO</label>
                    <input type="text" class="form-control" name="title" value="{{ $todo_list->title }}">
                </div>
                <div class="form-group">
                    <label for="description">説明</label>
                    <input type="text" class="form-control" name="description" value="{{ $todo_list->description }}">
                </div>
                <div class="form-group">
                    <label for="complete">完了</label>
                    <input type="checkbox" class="form-control" name="complete" value="1" {{ $todo_list->complete === 1 ? 'checked="checked"' : '' }}>
                </div>
                <button type="submit" class="btn btn-default">更新</button>
                <a href="{{ route('todolist.index') }}">戻る</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
