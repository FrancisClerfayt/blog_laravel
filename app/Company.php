<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class company extends Model
{
    protected $table = 'companies';
    protected $guarded = ['id'];
    protected $fillable = [
        'name', 'address', 'zip_code', 'city', 'annual_sales'
    ];

    public function employee(){
        return $this->hasMany(Employee::class);
    }
}
