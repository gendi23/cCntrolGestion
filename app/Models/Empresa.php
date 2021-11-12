<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'address'
    ];

    /* Foreign  Keys */
    public function users(){
        return $this->hasMany('App\Models\User' , 'empresa_id');
    }

}
