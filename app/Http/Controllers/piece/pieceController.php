<?php

namespace App\Http\Controllers\piece;

use App\Http\Controllers\Controller;
use App\Models\Fournisseur;
use App\Models\Piece;
use Illuminate\Http\Request;

class pieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('pieces.pieces.index', ['pieces' => Piece::paginate(1000)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pieces.pieces.create', ['fournisseurs' => Fournisseur::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([

            'fournisseur_id' => 'required|max:255',
            'designation' => 'required|max:255',
            'quantite' => 'required',
            'quantite_utiliser' => 'required',
            'unite' => 'required|max:255',
            'prix' => 'required',
            'date_acq' => 'required',
            'marque' => 'required'

           
        ]);
       
       
         
        $piece=Piece::create($validatedData);
    
        $request->session()->flash('success','Vous Avez entré une pièce');
        return redirect(route('pieces.pieces.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pieces.pieces.edit',
        [
            
            'pieces' =>Piece::find($id),
           
            'fournisseurs' =>Fournisseur::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $piece = Piece::find($id);
        if(!$piece)
        {
            $request->session()->flash('error','you cannot Edit this piece');
            return redirect(route('pieces.pieces.index')); 

        }

        $piece->update($request->except(['_token']));
        //$piece->roles()->sync($request->roles);

        $request->session()->flash('success','You have Edited The piece');


        return redirect(route('pieces.pieces.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        Piece::destroy($id);
        $request->session()->flash('success','You have deleted The piece');
        return redirect(route('pieces.pieces.index')); 
    }
}