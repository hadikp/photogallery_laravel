<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class GaleryController extends Controller
{
	private $galeriak_tabla = 'galeries';
	private $fotok_tabla = 'photos';
	
    public function index() {
		//die('GALERY/INDEX');
		//$test = 'Tesztelünk...';
		$galeries = DB::table($this->galeriak_tabla)->get();
		return view('galery/index', compact('galeries')); //compact('test'));
	}
	
	public function create() {
		//die('GALERY/CREATE');
		if (!Auth::check()) {
			return \Redirect::route('galery.index')->with('uzenet', 'Csak bejelentkezett felhasználó hozhat létre új képgalériát!');
		}
		return view('galery/create');
	}
	
	public function store(Request $request) {
		$nev = $request->input('nev');
		$leiras = $request->input('leiras');
		$boritokep = $request->file('boritokep');
		$tulajdonos = 1;
		
		if ($boritokep) {
			//die('OK');
			$fajlnev = $boritokep->getClientOriginalName();
			$boritokep->move(public_path('boritokepek'), $fajlnev);
		}
		else {
			die('Borítókép nincs feltöltve');
		}
		
		DB::table($this->galeriak_tabla)->insert(
			[
				'name' => $nev,
				'description' => $leiras,
				'cover_image' => $fajlnev,
				'owner_id' => $tulajdonos
			]
		);
		
		return \Redirect::route('galery.index')->with('uzenet', 'A képgalériát sikeresen létrehoztuk!');
	}
	
	public function show($id) {
		//die('Képgaléria azonosítója: '.$id);
		$galery = DB::table($this->galeriak_tabla)->where('id',$id)->first();
		$photos = DB::table($this->fotok_tabla)->where('galery_id',$id)->get();
		return view('galery/show', compact('galery','photos')); 
	}
}
