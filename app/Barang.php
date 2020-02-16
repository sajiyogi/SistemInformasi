<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use SoftDeletes;
    protected $table = 'barangs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',  
        'kategori',
        'jenis',
        'deskripsi',
        'stok',
        'foto'
    ];
    protected $primaryKey = 'id';

}
