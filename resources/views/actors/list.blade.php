<x-app-layout>
    <h1>{{ $title }}</h1>

    @if (empty($actors))
        <FONT COLOR="red">No se ha encontrado ningun actor</FONT>
    @else
        <div align="center">
            <table border="2">
                <tr>
                    @foreach ($actors as $actor)
                        @foreach (array_keys($actor) as $key)
                            @if (!($key == 'awards_actors_id' || $key == 'created_at' || $key == 'updated_at'))
                                <th>{{ $key }}</th>
                            @endif
                        @endforeach
                    @break
                @endforeach
            </tr>

            @foreach ($actors as $actor)
                <tr style="border: 1px solid black">
                    <td>{{ $actor['id'] }}</td>
                    <td>{{ $actor['name'] }}</td>
                    <td>{{ $actor['surname'] }}</td>
                    <td>{{ $actor['birthdate'] }}</td>
                    <td>{{ $actor['country'] }}</td>
                    <td><img src={{ $actor['img_url'] }} style="width: 100px; heigth: 120px;" /></td>
                </tr>
            @endforeach
        </table>
    </div>
@endif
</x-app-layout>
