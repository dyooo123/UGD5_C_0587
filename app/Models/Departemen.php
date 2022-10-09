<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    /**
     * fillable
     * 
     * @var array
     */

    protected $table = 'departemens';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama_departemen',
        'nama_manager',
        'jumlah_pegawai',
    ];

    public function pegawais(){
        return $this->hasMany(Pegawai::class, 'departemen_id', 'id');
    }
}