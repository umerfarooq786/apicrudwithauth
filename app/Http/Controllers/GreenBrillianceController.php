<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GreenBrilliance;

class GreenBrillianceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $green_brilliance = GreenBrilliance::all();
        
        $response = [
            'success' => true,
            'solar_inquiries' => $green_brilliance
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
        $green_brilliance = new GreenBrilliance();
       
        $green_brilliance->zip =  $request->zip;
        $green_brilliance->is_home_owner =  $request->is_home_owner;
        $green_brilliance->type_of_home =  $request->type_of_home;
        $green_brilliance->average_monthly_bill =  $request->average_monthly_bill;
        $green_brilliance->electricity_provider =  $request->electricity_provider;
        $green_brilliance->shade =  $request->shade;
        $green_brilliance->solar_considering =  json_encode($request->solar_considering);
        $green_brilliance->credit_score =  $request->credit_score;
        $green_brilliance->address =  $request->address;
        $green_brilliance->email =  $request->email;
        $green_brilliance->first_name =  $request->first_name;
        $green_brilliance->last_name =  $request->last_name;
        $green_brilliance->phone =  $request->phone; 
        $green_brilliance->source =  $request->source; 
        
        $green_brilliance->save();

        $response = [
            'success' => true,
            'green_brilliance' => $green_brilliance,
            'message' => 'Inquiry has been submitted Successfully'
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $green_brilliance = GreenBrilliance::findOrFail($id);
        
        $green_brilliance->delete();

        $response = [
            'success' => true,
            'message' => 'Inquiry has been deleted Successfully'
        ];
        return response()->json($response, 200);
    }
}
