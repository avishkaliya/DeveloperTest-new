<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RunnerData;
use Doctrine\DBAL\Query;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Http\Requests\StoreRunnerDataRequest;

class RunnerDataController extends Controller
{
    public function index(Request $request)
    {
        try {
            $runner = RunnerData::all();
            return view('runner-data.index',[
                'runner' =>  $runner
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create()
    {
        try {

            return view('runner-data.create'
            );
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(StoreRunnerDataRequest $request)
    {
        $runnerData = [
            'runner_name' => $request->runner_name,
            'radius' => $request->radius,
            'start_date' => date('Y-m-d H:i:s' , strtotime($request->start_date)),
            'end_date' => date('Y-m-d H:i:s' , strtotime($request->end_date)),
            'number_of_laps' => $request->number_of_laps
        ];

        RunnerData::create($runnerData);
        Session::flash('message', ['status' => 'success', 'message' => 'data has been created successfully.']);
    }
}
