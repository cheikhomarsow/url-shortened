<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function create(){
        return view('welcome');
    }
    public function store(Request $request){
        $this->validate($request,['url' => 'required | url']);
        $record = $this->getRecordForUrl($request->url);
        return view('result')->withShortened($record->shortened);
    }
    public function show($shortened){
        $url = Url::whereShortened($shortened)->first();
        if(! $url){
            return redirect('/');
        }
        return redirect($url->url);
    }

    private function getRecordForUrl($url){
        /*
         * @renvoie $url s'il existe
         * sinon
         * crée un nouveau url avec comme url = $url et shortened = Url::getUniqueShortUrl()
         */
        return Url::firstOrCreate(
            ['url' => $url],
            ['shortened' => Url::getUniqueShortUrl()]
        );
    }
}

