<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Berita;
use App\Acara;
use App\LokasiSirmis;
use App\TentangPesantren;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if(Schema::hasTable('beritas') && Schema::hasTable('acaras') && Schema::hasTable('lokasi_sirmis') && Schema::hasTable('tentang_pesantrens')){
            $beritas = Berita::orderBy('created_at', 'desc')->limit(3)->get();
            $acara = Acara::orderBy('created_at', 'desc')->limit(3)->get();
            $lokasi_sirmis = LokasiSirmis::orderBy('created_at', 'desc')->first();
            $tentang = TentangPesantren::orderBy('created_at', 'desc')->first();
            View::share ( 'beritas', $beritas );
            View::share ( 'acara', $acara );
            View::share ( 'lokasi_sirmis', $lokasi_sirmis );
            View::share ( 'tentang', $tentang );
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
