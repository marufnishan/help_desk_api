<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Here orderBy  id is ticketno
        $get_request=ModelsRequest::orderBy('id','DESC')->get();
        if(!$get_request->isEmpty())
        {
            return response()->json(['data'=>$get_request]);
        }
        else
        {
            return response()->json(['status'=>false]);
        }
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
            'groups' => 'required',
            'requester_name' => 'required',
            'technician' => 'required',
            'subject' => 'required',
            'dateofcreate' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'request_type' => 'required',
            'status' => 'required',
            'due_date' => 'required',
            'date_closed' => 'required',
            'date_archived' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()]);
        }

        $input = $request->all();

        $requests = ModelsRequest::create($input);
        return response()->json(['data'=>$requests]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticketno=$id;
        $ticket_details=ModelsRequest::where('id','=',$ticketno)->get();
        if(!$ticket_details->isEmpty())
        {
            return response()->json(['data'=>$ticket_details]);
        }
        else
        {
            return response()->json(['status'=>false]);
        }

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
        //Here orderBy  id is ticketno
        // return $request->all();
        $ticketno=$id;
        $change_options=ModelsRequest::where('id',$ticketno)
        ->update($request->all());
        if(!empty($change_options))
        {
            return response()->json(['data'=>$request->all()]);
        }
        else
        {
            return response()->json(['status'=>false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
