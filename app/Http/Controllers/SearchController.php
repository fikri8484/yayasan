<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        if ($request->ajax()) {

            $data = Program::where('title', 'LIKE', $request->donation . '%')
                ->get();

            $output = '';

            if (count($data) > 0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row) {

                    $output .= '<li class="list-group-item">' . $row->title . '</li>';
                }

                $output .= '</ul>';
            } else {

                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }

            return $output;
        }
    }
}
