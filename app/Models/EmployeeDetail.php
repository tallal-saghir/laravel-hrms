<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function employmentType()
    {
        return $this->belongsTo(EmploymentType::class, 'employment_type_id');
    }
    public function reportingTo()
    {
        return $this->belongsTo(Employee::class, 'reporting_to');
    }
}
