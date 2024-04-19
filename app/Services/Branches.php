<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Branch;

//class Families extends Model
class Branches
{
    public function get()
    {
      $branches = Branch::orderBy('value', 'asc')
      					->get();
      $branchesArray[''] = 'Todas';
      foreach ($branches as $branch) {
        $branchesArray[$branch->id] = $branch->value;
      }
      return $branchesArray;
    }
}
