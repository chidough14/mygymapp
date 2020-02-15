<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lead;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    private $validations;

    public function __construct () {
        $this->validations = [
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'dob'=>'required|date',
            'interested_package'=> 'sometimes'
        ];
    }

    public function create () {
        return Inertia::render('Leads/LeadsAdd');
    }

    public function store (Request $request) {
        $postData = $this->validate($request, $this->validations);

        $package = '';

        if ($request->has('interested_package')) {
            $package = $request->input('interested_package');
        }

        $dob = Carbon::parse($postData['dob']);
        $age = $dob->age;

        Lead::create([
            'name'=>$postData['name'],
            'email'=>$postData['email'],
            'phone'=>$postData['phone'],
            'dob'=> $dob,
            'branch_id'=> 1,
            'age'=>$age,
            'interested_package'=> $request->interested_package,
            'added_by'=> Auth::user()->id
        ]);

        return redirect()->route('leads.list');
    }

    public function index () {
        $leads = Lead::where('branch_id', 1)->orderByDesc('id')->get();

        return Inertia::render('Leads/Index', ['leads'=> $leads]);
    }

    public function view (Lead $lead) {

        $lead->load(['reminders']);

        return Inertia::render('Leads/LeadsView', ['leadProp'=> $lead]);
    }

    public function update (Request $request) {
        $rules = $this->validations;
        $rules['id'] = 'required|exists:leads';

        $postData = $this->validate($request, $rules);
        $postData['age'] = Carbon::parse($postData['dob'])->age;

        $lead = Lead::where('id', $postData['id'])->update($postData);

        return redirect()->route('leads.list', ['lead'=> $postData['id']]);
    }
}
