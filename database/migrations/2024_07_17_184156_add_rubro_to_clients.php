<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->enum('rubro', [
                'Banco/Financiera',
                'Electricidad, Gas y Agua',
                'Comercio Mayorista',
                'Minorista/Supermercado',
                'Minería',
                'Pesca',
                'Agricultura y Ganadería',
                'Hotelería y Restaurantes',
                'Otras Manufacturas',
                'Alimenticia',
                'Automotriz',
                'Siderurgia',
                'Construcción',
                'Oil & Gas',
                'Telecomunicaciones',
                'Transporte Público',
                'Alquiler de Maquinaria',
                'Logística',
                'Salud',
                'Administración Pública',
                'Centro Comercial',
                'Otros Servicios',
                'Ingeniería/Instalaciones',
                'Entretenimiento/Espectáculos',
                'Consorcio',
            ])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('rubro');
        });
    }
};
