<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    public function download()
    {
        $fileName = 'report.csv';

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Name', 'Email', 'Phone'];

        $callback = function() use($columns) {
            $file = fopen('php://output', 'w');

            fputcsv($file, $columns, ';');

            Reports::query()->select('name', 'email', 'phone')->orderBy('id')->chunk(1000, function($rows) use ($file) {
                foreach ($rows as $row) {
                    fputcsv($file, [
                        $row->name,
                        $row->email,
                        $row->phone,
                    ], ';');
                }
            });
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
