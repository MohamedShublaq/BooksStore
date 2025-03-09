<?php

namespace App\Enums;

enum PaymentStatus:int
{
    case Unpaid = 0;
    case Paid = 1;
}
