<?php

namespace App\Enums;

enum GoodStatus: string
{
  case NEW = 'NEW';
  case SELLING = 'SELLING';
  case SOLD = 'SOLD';
  case DELETED = 'DELETED';
}