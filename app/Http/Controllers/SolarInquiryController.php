<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\SolarInquiry;
use App\Mail\SolarEmail;
use DB;

class SolarInquiryController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $solar_inquiries = SolarInquiry::all();
        
        $response = [
            'success' => true,
            'solar_inquiries' => $solar_inquiries
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
        // $validator = Validator::make($request->all(), [
        //     'zip' => 'required',
        //     'is_home_owner' => 'required',
        //     'type_of_home' => 'required',
        //     'average_monthly_bill' => 'required',
        //     'electricity_provider' => 'required',
        //     'shade' => 'required',
        //     'solar_considering' => 'required',
        //     'credit_score' => 'required',
        //     'address' => 'required',
        //     'email' => 'required',
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'phone' => 'required'
        // ]);
        // if($validator->fails()){
        //     $response = [
        //         'success' => false,
        //         'message' => $validator->errors()
        //     ];
        //     return response()->json($response, 400);
        // }
        
        $solar_inquiries = new SolarInquiry();

        $solar_inquiries->zip =  $request->zip;
        $solar_inquiries->is_home_owner =  $request->is_home_owner;
        $solar_inquiries->address =  $request->address;
        $solar_inquiries->email =  $request->email;
        $solar_inquiries->full_name =  $request->full_name;
        $solar_inquiries->phone =  $request->phone;        
        $solar_inquiries->message =  $request->message;
        $solar_inquiries->save();

        $response = [
            'success' => true,
            'solar_inquiries' => $solar_inquiries,
            'message' => 'Inquiry has been submitted Successfully'
        ];

        //Mail::to($solar_inquiries->email)->send(new SolarEmail());
        
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
        $solar_inquiry = SolarInquiry::findOrFail($id);
        
        $response = [
            'success' => true,
            'solar_inquiry' => $solar_inquiry
        ];
        return response()->json($response, 200);
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
        $solar_inquiry = SolarInquiry::findOrFail($id);

        $solar_inquiry->zip =  $request->zip;
        $solar_inquiry->is_home_owner =  $request->is_home_owner;
        $solar_inquiry->type_of_home =  $request->type_of_home;
        $solar_inquiry->average_monthly_bill =  $request->average_monthly_bill;
        $solar_inquiry->electricity_provider =  $request->electricity_provider;
        $solar_inquiry->shade =  $request->shade;
        $solar_inquiry->solar_considering =  json_encode($request->solar_considering); 
        $solar_inquiry->credit_score =  $request->credit_score;
        $solar_inquiry->address =  $request->address;
        $solar_inquiry->email =  $request->email;
        $solar_inquiry->first_name =  $request->first_name;
        $solar_inquiry->last_name = $request->last_name;
        $solar_inquiry->phone =  $request->phone;        
    
        $solar_inquiry->save();

        $response = [
            'success' => true,
            'data' => $solar_inquiry,
            'message' => 'Solar Inquiry has been updated Successfully'
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
        $solar_inquiry = SolarInquiry::findOrFail($id);
        
        $solar_inquiry->delete();
        $response = [
            'success' => true,
            'message' => 'Inquiry has been deleted Successfully'
        ];
        return response()->json($response, 200);
    }
}
