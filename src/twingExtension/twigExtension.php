<?php

namespace App\twingExtension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class twigExtension extends AbstractExtension
{
     public function getFilters()
     {
         return [new TwigFilter("default_carre",[$this,'default_carre'])];
     }
public function default_carre(int $a):int{
return($a*$a);
}
}