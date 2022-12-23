<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\set;
use App\Models\Deck;
use App\Models\todos;
use App\Models\flashcard;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchset(Request $request)
    {
        $sets = set::where([['is_shared','1'],['userid','!=',Auth::user()->id],['sets_name', 'like', '%' . $request->searchvalue . '%']])->get();

       return view("searchset",compact("sets"));
    }
    public function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = set::where([['is_shared','1'],['userid','!=',Auth::user()->id],['sets_name', 'like', '%'. $request->searchvalue . '%']])->get();

            $output = '<ul class="dropdown-menu" style="display:block; position:relative; width: 100%;border-radius: 25px;">';
            foreach($data as $row)
            {
                $output .= '<li style="margin-bottom: 5px;"><a href="#">'.$row->sets_name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
