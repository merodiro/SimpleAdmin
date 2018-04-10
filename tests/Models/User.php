<?php

namespace Merodiro\SimpleRoles\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Merodiro\SimpleRoles\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
}
