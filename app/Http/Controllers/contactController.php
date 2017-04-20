<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\contactFormRequest;
use App\Message;
use Illuminate\Support\Facades\Mail;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(contactFormRequest $request)
    {


        $data = array(
        'phoneemail' => $request->get('phoneemail'),
        'mssage' => $request->get('message'),); 

        $message = new Message(array(
        'phoneemail' => $request->get('phoneemail'),
        'message' => $request->get('message')
         ));

         $message->save();


         

         Mail::send('email', $data, function ($mssage) {

         $mssage->from('dastuFoundation@gmail.com', 'New Message From Our Site');

         $mssage->to('skooby4me@gmail.com')->subject('Another email');

    });



         return redirect('/contact')->with('id', 'Your message has been sent!');

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
        //
    }
}
