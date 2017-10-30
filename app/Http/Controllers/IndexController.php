<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Statement;

class IndexController extends Controller
{
    public function index()
    {
        $seeder_txt = '';
        return view('index', compact('seeder_txt'));
    }

    public function convert(Request $request)
    {
        $table_name = $request->input('table');
        if($table_name === null){
            $table_name = 'TABLE_NAME_HERE';
        }

        $csv_str = $request->input('csv');
        if($csv_str === null){
            return back();
        }
        try {
            $csv = Reader::createFromString($csv_str);
        }catch (\Exception $e){
            return back()->withErrors(['csv'=> $e->getMessage()])->withInput();
        }
        if(count($csv) < 3){
            return back()->withErrors(['csv'=>'The input is wrong.'])->withInput();
        }
        $csv->setHeaderOffset(1);
        $stmt = (new Statement())->offset(1);
        try {
            $records = $stmt->process($csv);
            $seeder_txt = "DB::table('".$table_name."')->insert([\n";
            foreach ($records as $offset => $record) {
                $seeder_txt .= "\t[";
                foreach ($record as $key => $field) {
                    $seeder_txt .= "'" . $key . "' => '" . $field . "', ";
                }
                $seeder_txt .= "],\n";
            }
            $seeder_txt .= "]);";
        }catch (\Exception $e){
            return back()->withErrors(['csv'=> $e->getMessage()])->withInput();
        }

        return view('index', compact('seeder_txt'));
    }

}
