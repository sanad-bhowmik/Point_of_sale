<?php

namespace App\Http\Controllers;

use App\Models\SalesItemReport;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $salesReports = SalesItemReport::all();

        $data = [];
        foreach ($salesReports as $report) {
            $data[] = $report->net_amount;
        }

        $dataString = implode(',', $data);

        return view('dashboard', compact('dataString'));
    }
}
