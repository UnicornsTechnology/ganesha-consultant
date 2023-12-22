<?php

namespace App\Http\Controllers\website;

use App\Events\chat;
use App\Http\Controllers\Controller;
use App\Models\tbl_chat;
use App\Models\tbl_interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function intersend($id)
    {
        $click = tbl_interest::where('interest_receiver_id', $id)->where('interest_sender_id', Auth::id())->get();
        $data = tbl_interest::where('interest_receiver_id', Auth::id())->where('interest_sender_id', $id)->get();
        if (count($click) || count($data)) {
            return response()->json(['status' => 'filed']);
        } else {
            $interst = new tbl_interest();
            $interst->interest_receiver_id = $id;
            $interst->interest_sender_id = Auth::id();
            $interst->interest_status = 'request';
            $interst->save();
            return response()->json(['status' => 'success']);
        }
    }
    public function changStatus($id, $status)
    {
        $data = tbl_interest::find($id);
        $data->interest_status = $status;
        $data->save();

        return redirect()->back();
    }

    public function GetChat($resiver_id, $sender_id)
    {
        $msg = tbl_chat::where('receiver_id', $resiver_id)->where('sender_id', $sender_id)->get();
        $msgs = tbl_chat::where('receiver_id', $sender_id)->where('sender_id', $resiver_id)->get();
        return $mergedArray = array_merge($msg->toArray(), $msgs->toArray());
    }

    public function borcast(Request $request)
    {
        $chat = new tbl_chat();
        $chat->sender_id = $request->sender_id;
        $chat->receiver_id = $request->resiver_id;
        $chat->message = $request->msg;
        $chat->save();
        event(new chat($request->sender_id, $request->resiver_id, $request->msg));
        return response()->json(["msg" => "event fired successfuly"]);
    }
}
