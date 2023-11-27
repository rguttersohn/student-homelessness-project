<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentHousingData extends Model
{
    use HasFactory;

    protected $table = 'student_housing_data';

    public function school():BelongsTo{
        return $this->belongsTo(School::class);
    }
}
