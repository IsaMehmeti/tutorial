<?php

namespace App\Http\Controllers;
use App\Models\Filter;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function changeColor($id, $color)
      {
          $filter = Filter::find($id);
          $filter->color = $color;
          $filter->save();
          return response()->json($filter);
      }   
      public function changeBackground($id, $back)
      {
          $filter = Filter::find($id);
          $filter->background_color = $back;
          $filter->save();
          return response()->json($filter);
      } 
      
}
