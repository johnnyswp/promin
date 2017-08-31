<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\LineaNegocio;

class LineaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('linea_negocios')->delete();

        LineaNegocio::create([
            'nombre'   		=> 'Todas',
            'siglas'		=>'Ts'

        ]);

        LineaNegocio::create([
            'nombre'   => 'Brunner &amp; Lay',
            'siglas'		=>'BL'

        ]);

        LineaNegocio::create([
            'nombre'   => 'Cosben',
            'siglas'		=>'CB'

        ]);
        LineaNegocio::create([
            'nombre'   => 'Equipo usado',
            'siglas'		=>'EU'

        ]);
        LineaNegocio::create([
            'nombre'   => 'KCP',
            'siglas'		=>'KCP'

        ]);

        LineaNegocio::create([
            'nombre'   => 'MX',
            'siglas'		=>'MX'

        ]);

        LineaNegocio::create([
            'nombre'   => 'PROMIN Blast',
            'siglas'		=>'PB'
        ]);
        LineaNegocio::create([
            'nombre'   => 'PROMIN Drill',
            'siglas'		=>'PD'
        ]);

    }
}
