<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Convidado;
use App\Models\Test;
use App\Models\Lista;
use App\Models\Parceiro;
use App\Models\Equipe;
use App\Models\Festa;
use App\Models\User;

class EventController extends Controller
{
    public function index(){ //index vem da rota do web.php
       
        $search = request('search'); 

        if($search) {

            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $events = Event::all();
        }        
    
        return view('welcome',['events' => $events, 'search' => $search ]); //welcome é das views .blade.php, events -> descobrir o q é ???????
    }

    public function create(){
        return view('events.create');
    }

    public function convidados(){ //convidados vem da rota do web.php
       
        $convidados = Convidado::all(); //convidado é o model
    
        return view('convidados',['convidados' => $convidados]); //convidados é das views .blade.php, e o convidado -> descobrir o q é ???????
    }

    public function testes(){
       
        $testes = Test::all();
    
        return view('testes',['testes' => $testes]);
    }

    public function store(Request $request) { //esta função traz todos os dados do formulário

        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;

        // Image upload

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }

    public function cadastroconvidado(Request $request) { //esta função traz todos os dados do formulário

        $convidado = new Convidado;

        $convidado->nome = $request->nome;
        $convidado->idade = $request->idade;        

        $convidado->save();

        return redirect('/convidados')->with('msg', 'Convidado cadastrado com sucesso!');;

    }

    public function parceiros(){ 
       
        $parceiros = Parceiro::all(); 
    
        return view('parceiros',['parceiros' => $parceiros]); 
    }

    public function cadastroparceiro(Request $request) { //esta função traz todos os dados do formulário

        $parceiros = new Parceiro;

        $parceiros->nome = $request->nome;               

        $parceiros->save();

        return redirect('/parceiros')->with('msg', 'Parceiro cadastrado com sucesso!');;

    }

    public function equipes(){ 
       
        $equipes = Equipe::all(); 
    
        return view('equipes',['equipes' => $equipes]); 
    }

    public function cadastroequipe(Request $request) { //esta função traz todos os dados do formulário

        $equipes = new Equipe;

        $equipes->nome = $request->nome;               

        $equipes->save();

        return redirect('/equipes')->with('msg', 'Equipe cadastrada com sucesso!');;

    }

    
    public function show($id) {

        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);

    }
   
    public function festas(){ 
       
        $festas = Festa::all(); 
    
        return view('festas',['festas' => $festas]); 
    }

    public function cadastrofesta(Request $request) { //esta função traz todos os dados do formulário

        $festas = new Festa;

        $festas->nome = $request->nome;               

        $festas->save();

        return redirect('/festas')->with('msg', 'Festa cadastrada com sucesso!');;

    }

    public function dashboard(){

        $user = auth()->user();
        
        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);

    }

    public function destroy($id) {

        Event::findOrFail($id)->delete();        

        return redirect('/dashboard')->with('msg', 'Evento excluído!');

    }

    public function delete($id) {
        
        Convidado::findOrFail($id)->delete();

        return redirect('/convidados')->with('msg', 'Convidado excluído!');

    }

    public function edit($id){

        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);

    }

    public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }
          
        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');

    }

    public function editconvidados($id){

        $convidados = Convidado::findOrFail($id);

        return view('editconvidados', ['convidados' => $convidados]);

    }

    public function convidadoupdate(Request $request){

        Convidado::findOrFail($request->id)->update($request->all());

        return redirect('/convidados')->with('msg', 'Convidado editado com sucesso!');         

    }

}



