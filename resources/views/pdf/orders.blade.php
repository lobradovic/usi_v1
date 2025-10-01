<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .radni_nalog
        {
            column-gap: 2em;
        }
    </style>
    <title>{{$title}}</title>
</head>
<body>
    <h1>{{$title}}</h1>

    @foreach($orders as $o)
    <h3>{{ $o->user->name }} {{ $o->user->surname }}</h3>
    <p>Datum: {{ $o->datum }}</p>
    <p>Adresa: {{ $o->adresa }}</p>

            <table class="radni_nalog">
                <thead>
                    <th>Naziv artikla</th>
                    <th>Kolicina</th>
                </thead>
                <tbody>
                    @foreach($o->stavkas as $s)
                    <tr>
                        <td>{{ $s->jelo->naziv_jela }}</td>
                        <td>{{ $s->kolicina }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <hr>
    @endforeach

</body>
</html>