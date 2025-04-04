<x-app-layout>
    <h1>{{ $title }}</h1>
    @if ($actors->isEmpty())
        <FONT COLOR="red">No se ha encontrado ninguna actor</FONT>
    @else
        <div align="center">
            <table border="2">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cumpleaños</th>
                    <th>País</th>
                    <th>Imagen</th>
                    <th>Premio</th>
                </tr>
                @foreach ($actors as $actor)
                    <tr style="border: 1px solid black">
                        <td>{{ $actor->name }}</td>
                        <td>{{ $actor->surname }}</td>
                        <td>{{ $actor->birthdate }}</td>
                        <td>{{ $actor->country }}</td>
                        <td><img src={{ $actor->img_url }} style="width: 100px; height: 120px;" /></td>
                        <td>{{ $actor->awards_actor_id }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
</x-app-layout>
