<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign_Submit extends Model
{
    protected $table = 'assign_submit';

    public $timestamps = false;  // As your table doesn't have created_at/updated_at, adjust if needed

    protected $fillable = [
        'student_name',
        'student_id',
        'assignment_title',
        'subject_name',
        'labname',
        'teacher_name',
        'due_date',
        'assignment_files',
        'comments',
        'html_code',
        'css_code',
        'js_code',
        'feedback',
        'feedback_timestamp'
    ];

    protected $casts = [
    'assignment_files' => 'array',
    'due_date' => 'date',
    'feedback_timestamp' => 'datetime',
];

}
