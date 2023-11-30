<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadMessageController extends Controller
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
        try {
            $validator = Validator::make($request->all(), [
                'message' => 'required | max:2000'
            ]);

            if($validator->fails()){
                return response()->json([
                    'code' => 100,
                    'error' => $validator->messages()
                ]);
            }

            $lead_id = decrypt(decrypt(decrypt($request->lead_id)));
            $sender_id = auth()->user()->id;

            Message::updateOrCreate(
                ['id' => $request['id']],
                [
                    'sender_id' => $sender_id,
                    'lead_id' => $lead_id,
                    'body' => $request['message']
                ]
            );

            return response()->json([
                'code' => 200,
                'message' => 'Message Sent Successfully',
                'lead_id' => encrypt(encrypt(encrypt($lead_id)))
            ]);

        }catch(\Exception $e){
            return response()->json([
                'code' => 100,
                'message' => $e->getMessage()
            ]);
        }
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
        try {
            $id = decrypt(decrypt(decrypt($id)));
            $messages = Message::where('lead_id', $id)->get();
            if($messages->count() != 0){
                $messages_div = $this->makeMessageDiv($messages);
            }else{
                $messages_div = '<div class="text-center"><b>No Any Messages</b></div>';
            }
//            dd($messages);
            return response()->json(['code' => 200, 'data' => $messages_div]);
        }catch (\Exception $e){
            return response()->json(['code' => 100, 'message' => $e->getMessage()]);
        }
    }

    public function makeMessageDiv($messages){
        $div = '';
        foreach ($messages as $message){
            $div.= '<div class="msg-'.$message->id.'" style="display: flex; flex-direction: row;justify-content: space-between">
                        <div style="width: 75%;">
                            <b>'.$message->sender->name.':</b>
                            <p>'.$message->body.'</p>
                        </div>
                        <div>
                            <br>
                            <i>'.$message->created_at.'</i>
                        </div>
                    </div>';
        }

        return $div;
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
