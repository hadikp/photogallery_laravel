<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PhotoController extends Controller
{
	private $fotok_tabla = 'photos';
	
    public function create($galery_id) {
		//die('Photo/CREATE');
		if (!Auth::check()) {
			return \Redirect::route('galery.index')->with('uzenet', 'Csak bejelentkezett felhasználó tölthet fel új fotókat!');
		}
		return view('photo/create', compact('galery_id'));
	}
	
	public function store(Request $request) {
		$cim = $request->input('cim');
		$leiras = $request->input('leiras');
		$helyszin = $request->input('helyszin');
		$kep = $request->file('kep');
		$galeria = $request->input('galeria');
		$tulajdonos = 1;
		
		if ($kep) {
			//die('OK');
			$fajlnev = $kep->getClientOriginalName();
			$kep->move(public_path('fotok/'.$galeria), $fajlnev);
			
			DB::table($this->fotok_tabla)->insert(
			[
				'title' => $cim,
				'description' => $leiras,
				'location' => $helyszin,
				'image' => $fajlnev,
				'galery_id' => $galeria,
				'owner_id' => $tulajdonos
			]
		);
		
		return \Redirect::route('galery.show', 1)->with('uzenet','A fotót sikeresen feltöltötted!');
		}
		else {
			return \Redirect::route('galery.show', array('id'=>$galeria))->with('uzenet','A fotó feltöltése nem sikerült!');
		}
		
	}
	
	public function details($id) {
		die($id);
	}
}
