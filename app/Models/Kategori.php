<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $guarded = ['id'];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'kategori_id', 'id');
    }
}
