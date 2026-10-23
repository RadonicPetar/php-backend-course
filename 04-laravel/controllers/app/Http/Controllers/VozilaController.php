<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VozilaService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
class VozilaController extends Controller
{
    public function index()
    {
        $automobili = VozilaService::dohvatiAutomobile();
        $vlasnici = VozilaService::dohvatiVlasnike();

        foreach($automobili as &$automobil){
            $automobil['vlasnik']=VozilaService::dohvatiVlasnikaPoid($automobil['vlasnikid'],$vlasnici);
        }

        return view('vozila.index',[
            'automobili'=>$automobili
        ]);
    }

    public function brojAutomobilaPoVlasniku(){
        $automobili = VozilaService::dohvatiAutomobile();
        $vlasnici = VozilaService::dohvatiVlasnike();

        $rezultat = [];
        foreach($vlasnici as $vlasnik){
            $broj=0;
            foreach($automobili as $automobil){
                if($automobil['vlasnikid']==$vlasnik['id']){
                    $broj++;
                }
            }
            $rezultat[]=[
                'vlasnik' => $vlasnik['ime'].' '.$vlasnik['prezime'], 
                'broj'=>$broj
            ];
        }
        return view('vozila.broj',[
            'rezultat'=>$rezultat
        ]);
    }

    public function exportToPdf()
    {
        $automobili = VozilaService::dohvatiAutomobile();
        $vlasnici = VozilaService::dohvatiVlasnike();

        foreach($automobili as &$automobil){
            $automobil['vlasnik']=VozilaService::dohvatiVlasnikaPoid($automobil['vlasnikid'],$vlasnici);
        }

        $pdf = Pdf::loadView('vozila.pdf',[
            'automobili'=>$automobili
        ]);

        $fileName='automobili'.now()->format('dmY_His').'.pdf';

        return $pdf->download($fileName);

    }

   
}
