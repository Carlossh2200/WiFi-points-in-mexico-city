<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encargado</title>
</head>

<body>
    <div class="row">
        @foreach ($nombreEncargado as $nombre)
            <div class="col">
                <div class="image">
                    <img class="encargadoImg" src="" width="100%" height="100%">
                </div>
                <div class="px-2 content">
                    <p class="mb-1 fw600">{{ $nombre->nombre }}</p>
                    <p class="mb-1 text-cl fw400">test</p>
                    <p class="mb-1 fw400 fz90">test</p>
                    <div>
                        <p class="text-success mb-0 fw600 fz90 float-start">2023</p>
                        <p class="text-cl mb-0 fw600 fz90 float-end">2023</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
