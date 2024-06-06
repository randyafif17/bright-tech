<?php

namespace App\Enums;

enum TaskType: string 
{
    case DepartmentSatu = 'Manager';
    case DepartmentDua = 'Staff IT';
    case DepartmentTiga = 'Staff Design';
    case DepartmentEmpat = 'Staff Marketing';
}