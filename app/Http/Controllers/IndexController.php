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
        $csv_str = $request->input('csv');
        $csv = Reader::createFromString($csv_str);
        $csv->setHeaderOffset(1);
        $header = $csv->getHeader();
        $stmt = (new Statement())->offset(1);
        $records = $stmt->process($csv);

        $seeder_txt = "DB::table('TABLE_NAME_HERE')->insert([\n";
        foreach ($records as $offset => $record){
            $seeder_txt .= "[";
            foreach ($record as $key => $field){
                $seeder_txt .= "'".$key."' => '". $field . "', ";
            }
            $seeder_txt .= "],\n";
        }
        $seeder_txt .= "]);";

        return view('index', compact('seeder_txt'));
    }

}
