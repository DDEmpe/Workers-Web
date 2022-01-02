<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DynamicField;
use App\Models\skill_list;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;

class DynamicFieldController extends Controller
{

    function insert(Request $request)
    {
        if ($request->ajax()) {
            $rules = array(
                'skill_name.*'  => 'required',
                'skill_level.*'  => 'required'
            );
            $error = FacadesValidator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            $skill_name = $request->skill_name;
            $skill_level = $request->skill_level;
            for ($count = 0; $count < count($skill_name); $count++) {
                $data = array(
                    'skill_name' => $skill_name[$count],
                    'skill_level'  => $skill_level[$count]
                );
                $insert_data[] = $data;
            }

            skill_list::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
        }
    }
}
