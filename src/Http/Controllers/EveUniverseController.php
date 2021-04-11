<?php

namespace SimplyUnnamed\Seat\EveUniverse\Http\Controllers;

use Seat\Eveapi\Models\Universe\UniverseName;
use Seat\Web\Http\Controllers\Controller;
use SimplyUnnamed\Seat\EveUniverse\Http\Requests\UniverseSearchRequest;
use SimplyUnnamed\Seat\EveUniverse\Jobs\UniverseSearch;


class EveUniverseController extends Controller
{

    public function index(){
        return view('eveuniverse::examples.examples');
    }

    /**
     * @param UniverseSearchRequest $request
     */
    public function search(UniverseSearchRequest $request){
        if(trim($request->get('term'))==''){
            return response()->json([]);
        }
        $type = $request->get('type');

        UniverseSearch::dispatchNow($request->get('term'), $type);


        $existing = UniverseName::where('name', 'like', "%{$request->get('term')}%")
            ->where('category', $type)
            ->limit(10)->get();


        $existing->each(function ($universe) use ($type){
            $universe->id = $universe->getKey();
            $universe->text = $universe->name;
            if($type=='faction'){
                $universe->view = view("web::partials.faction",
                    [$type=>$universe])->render();
            }else{
                $universe->view = view("eveuniverse::partials.{$type}",
                    [$type=>$universe])->render();
            }
        });

        return response()->json($existing);

    }

    public function exampleform(){
        return view('eveuniverse::examples.partial.server');
    }
}