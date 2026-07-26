<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $fillable = [
        'department_id',
        'course_id',
        'academic_year_id',
        'semester_id',
        'course_type_id',
        'credits',
        'status',
        'user_id',
        'course_outcomes',
        'units',
        'practicals',
        'references_list',
        'assessment_plan',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function courseType()
    {
        return $this->belongsTo(CourseType::class);
    }
}