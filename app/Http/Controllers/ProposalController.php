<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Proposal;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposal = Proposal::with('project','services')->get();
        
        $response = [
            'success' => true,
            'proposal' => $proposal
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'version' => 'required|unique:proposals',
            'date' => 'required',
            'services' => 'required|array|min:1',
        ]);
        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $proposal = new Proposal();

        $proposal->project_id = $request->project_id;
        $proposal->version = $request->version;
        $proposal->date = $request->date;

        $proposal->save();

        $services = $request->services;
        $proposal->services()->attach($services);

        $response = [
            'success' => true,
            'data' => $proposal,
            'message' => 'Proposal has been created Successfully'
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal = Proposal::with('services')->where('id',$id)->get();
        // $proposal[0]->services->count()
        $response = [
            'success' => true,
            'proposal' => $proposal
        ];
        return response()->json($response, 400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'version' => 'required|unique:proposals',
            'date' => 'required',
            'tasks' => 'required|array|min:1'
        ]);
        $tasks = $request->tasks;
        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $proposal = Proposal::findOrFail($id);
        foreach($tasks as $key => $value){
            
        }

    }   

    public function getProposalDetails($id)
    {
        $project = Proposal::getProjectByProposalId($id);
        $services = Proposal::getServicesByProposalId($id);
        $response = [
            'success' => true,
            'project' => $project,
            'services' => $services
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->delete();
        $response = [
            'success' => true,
            'message' => 'Proposal has been deleted Successfully'
        ];
        return response()->json($response, 200);
    }
}
