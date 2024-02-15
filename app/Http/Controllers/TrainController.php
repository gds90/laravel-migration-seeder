<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

use App\Models\Train;

class TrainController extends Controller
{
    public function index()
    {
        $now = new DateTime(); // salvo la data odierna in una variabile
        $today = $now->format('Y-m-d'); // formatto la data odierna in una stringa e la salvo nella variabile $today

        $trains = Train::where('data_partenza', 'like', $today . '%')->orderBy('orario_partenza', 'asc')->get();

        return view('home', compact('trains'));
    }
}
