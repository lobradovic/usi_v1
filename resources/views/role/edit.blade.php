@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Izmena role</h1>
    <div class="form">
        <form action="{{ route('roles.update',$role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td>
                        <label for="">Naziv role:</label>
                    </td>
                    <td><input type="text" name="naziv_role" value="{{ old('naziv_role', $role->naziv_role) }}"></td>
                </tr>
                <tr><td><button type="submit" class="dugme">Potvrdi</button></td></tr>
            </table>
        </form>
    </div>
</div>
@endsection

