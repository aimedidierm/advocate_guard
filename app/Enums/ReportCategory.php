<?php

namespace App\Enums;

namespace App\Enums;

enum ReportCategory: string
{
    case Physical = "Physical abuse";
    case Sexual = "Sexual abuse";
    case Neglect = "Neglect and negligent treatment";
    case Emotional = "Emotional abuse";
    case Privacy = "A child's privacy";
    case Financial = "Financial abuse";
    case Bullying = "Bullying";
}
