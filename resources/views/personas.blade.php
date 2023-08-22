<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/personas" method="post">

        @csrf
        Nombre: <input type="text" name="nombre" id=""> <br>
        Segundo Nombre: <input type="text" name="segundo_nombre" id=""> <br>
        Apellido: <input type="text" name="apellido" id=""> <br>
        Codigo: <input type="text" name="codigo" id=""> <br>
        Email: <input type="email" name="email" id=""> <br><br>

        <input type="submit" value="Enviar">
    </form>


    <br><br>
        @isset($exito)
            <b>Creado</b>
        @endisset

        @if ($errors->any())

            <b>Todos</b>:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        @if($errors->has('nombre'))

            <b>Nombre</b>:
            <ul>
                @foreach($errors->get('nombre') as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>

        @endif

        @if($errors->has('segundo_nombre'))

            <b>Segundo Nombre</b>:
            <ul>
                @foreach($errors->get('segundo_nombre') as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>

        @endif

        @if($errors->has('apellido'))

            <b>Apellido</b>:
            <ul>
                @foreach($errors->get('apellido') as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>

        @endif

        @if($errors->has('codigo'))

            <b>Codigo</b>:
            <ul>
                @foreach($errors->get('codigo') as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>

        @endif

        @if($errors->has('email'))

            <b>Email</b>:
            <ul>
                @foreach($errors->get('email') as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>

        @endif
        
</body>
</html>