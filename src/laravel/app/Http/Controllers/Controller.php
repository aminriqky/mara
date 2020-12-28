<?php

namespace App\Http\Controllers;

use App\Flame;
use App\Flood;
use App\Ground;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Mail;
use App\Mail\SiagaFlame;
use App\Mail\SiagaFlood;
use App\Mail\SiagaGround;

use App\Mail\BahayaFlame;
use App\Mail\BahayaFlood;
use App\Mail\BahayaGround;

use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;

use App\User;
use App\People;

class Controller extends \TCG\Voyager\Http\Controllers\Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function siagaFlame()
    {
    	$people = People::all();

    	$flame = Flame::where('suhu', '>', 35)
                ->where('suhu', '<', 100)
                ->orderBy('suhu', 'desc')
                ->get();

    	$flame2 = Flame::where('suhu', '>', 35)
                ->where('suhu', '<', 100)
                ->orderBy('suhu', 'desc')
                ->get()->count();

    	foreach ($people as $key) {
            Mail::to($key->email)->send(new SiagaFlame($key->name, $flame, $flame2));
        }

        return redirect('/admin/flames');
    }

    public function siagaGround()
    {
    	$people = People::all();

        $ground = Ground::where('horizontal', '>', 100)
                ->where('horizontal', '<', 300)
                ->orwhere('vertikal', '>', 100)
                ->where('vertikal', '<', 300)
                ->orderBy('horizontal', 'desc')
                ->get();

        $ground2 = Ground::where('horizontal', '>', 100)
                ->where('horizontal', '<', 300)
                ->orwhere('vertikal', '>', 100)
                ->where('vertikal', '<', 300)
                ->orderBy('horizontal', 'desc')
                ->get()->count();

    	foreach ($people as $key) {
            Mail::to($key->email)->send(new SiagaGround($key->name, $ground, $ground2));
        }

        return redirect('/admin/grounds');
    }

    
    // ----------------------------------------------------------


    public function bahayaFlame()
    {
    	$people = People::all();

    	$flame = Flame::where('suhu', '>', 100)
                ->orderBy('suhu', 'desc')
                ->get();

        $flame2 = Flame::where('suhu', '>', 100)
                ->orderBy('suhu', 'desc')
                ->get()->count();

        foreach ($people as $key) {
            Mail::to($key->email)->send(new BahayaFlame($key->name, $flame, $flame2));
        }

        return redirect('/admin/flames');
    }

    public function bahayaFlood()
    {
    	$people = People::all();

        $flood = Flood::where('ketinggian', '>', 60)
                ->where('durasi', '>', 60)
                ->orderBy('ketinggian', 'desc')
                ->get();

        $flood2 = Flood::where('ketinggian', '>', 60)
                ->where('durasi', '>', 60)
                ->orderBy('ketinggian', 'desc')
                ->get()->count();

    	foreach ($people as $key) {
            Mail::to($key->email)->send(new BahayaFlood($key->name, $flood, $flood2));
        }

        return redirect('/admin/floods');
    }

    public function bahayaGround()
    {
    	$people = People::all();

        $ground = Ground::where('horizontal', '>', 300)
                ->orwhere('vertikal', '>', 300)
                ->orderBy('horizontal', 'desc')
                ->get();

        $ground2 = Ground::where('horizontal', '>', 300)
                ->orwhere('vertikal', '>', 300)
                ->orderBy('horizontal', 'desc')
                ->get()->count();
                
    	foreach ($people as $key) {
            Mail::to($key->email)->send(new SiagaGround($key->name, $ground, $ground2));
        }

        return redirect('/admin/grounds');
    }
}