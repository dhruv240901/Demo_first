<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Standard;
class Student extends Model
{
    use HasFactory;

    protected $fillable=['name','phone','email','address','standard_id','gender_id','image'];

    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
}
