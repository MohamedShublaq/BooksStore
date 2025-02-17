<?php

namespace App\Enums;

enum BookInteractionType:int
{
    case Cart = 0;
    case Wishlist = 1;
    case Rate = 2;
}
