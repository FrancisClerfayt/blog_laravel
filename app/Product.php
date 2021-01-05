<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Employee;

class Product extends Model
{
	use SoftDeletes;

    protected $table = 'products';
    protected $guarded = ['id'];
    protected $fillable = [
        'name', 'price', 'employee_id'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
