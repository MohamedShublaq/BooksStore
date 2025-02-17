<?php

namespace App\Enums;

enum PaymentType:int
{
    case Cash = 0;
    case Visa = 1;
}