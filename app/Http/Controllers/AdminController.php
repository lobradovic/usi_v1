<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //prikazuje admin panel
    public function index()
    {
        //proverava da li je korisnik ulogovan u sistem i ima odgovarajucu rolu, ako nije salje kod 403
        if (auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        return view('admin.index');
    }
}
