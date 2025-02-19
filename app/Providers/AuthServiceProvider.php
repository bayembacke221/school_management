<?php
namespace App\Providers;

use App\Models\{Student, Teacher, Course, Grade, Attendance, Classroom};
use App\Policies\{StudentPolicy, TeacherPolicy, CoursePolicy, GradePolicy, AttendancePolicy, ClassroomPolicy};
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Student::class => StudentPolicy::class,
        Teacher::class => TeacherPolicy::class,
        Course::class => CoursePolicy::class,
        Grade::class => GradePolicy::class,
        Attendance::class => AttendancePolicy::class,
        Classroom::class => ClassroomPolicy::class,
    ];
}
