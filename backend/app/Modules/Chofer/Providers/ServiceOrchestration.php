<?php

namespace App\Modules\Chofer\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

use App\Modules\Chofer\Contracts\IChoferes;
use App\Modules\Chofer\Repositories\RepoChoferes;
use Illuminate\Support\Facades\DB as FacadesDB;

class ServiceOrchestration extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IChoferes::class, function (){
            return new RepoChoferes(new FacadesDB);
        });
    }
}

?>