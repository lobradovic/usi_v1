@extends('layouts.app')
@section('content')

<h1>{{ $jelo->naziv_jela }}</h1>
<p>{{ $jelo->cena }}</p>
<p>{{ $jelo->opis }}</p>
@endsection

