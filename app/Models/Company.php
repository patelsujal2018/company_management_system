<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function employees()
    {
        return $this->hasMany('App\Models\Employee','company_id','id');
    }
}
