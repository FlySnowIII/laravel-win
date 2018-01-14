<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello World</h1>
    
    <form action="{{ url('/todo') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" id="title" name="title"/>
        <input type="text" id="memo" name="memo"/>
        <br>
        <input type="file" name="photo" id="photo">
        <br>
        <input type="submit" value="Send"/>
    </form>

    <hr>
        
    <table>
        @foreach ($todolist as $todo)
        <tr>
            <td>{{ $todo->id }}</td>
            <td>{{ $todo->title }}</td>
            <td>{{ $todo->memo }}</td>
            <td>{{ $todo->url }}</td>
            <td>
                <form action="{{ url('/todo') }}" method="post">
                    <input type="submit" value="更新"/>
                </form>
            </td>
            <td>
                <form action="{{ url('/todo') }}/{{ $todo->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="削除"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>