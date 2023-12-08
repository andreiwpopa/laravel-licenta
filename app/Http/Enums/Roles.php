<?php

namespace App\Http\Enums;

enum Roles: int
{
    case ADMIN = 1;
    case PROFESOR = 2;
    case STUDENT = 3;
}
