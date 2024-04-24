<?php

namespace App\Http\Controllers;

use App\Models\FullCustom;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CreateMessage;
use Illuminate\Support\Facades\DB;

class AdminFullCustomController extends Controller
{
    public function index(Request $request, FullCustom $fullCustom)
    {
        $fullCustoms = FullCustom::where('status', 1)->latest()->filter(request(['search']))->paginate(10);
        $fullCustoms->appends($request->all());
        $title = 'Hapus Pesanan!';
        $text = "Apakah anda yakin akan menghapus ?";
        confirmDelete($title, $text);
        return view('admin.fullcustom.index', compact('fullCustoms'));
    }

    public function chat(FullCustom $fullCustom, Message $message)
    {
        $messages = Message::where('full_custom_id', $fullCustom->id)->get();
        DB::table('notifications')->where('data->message', $message->id)->update(['read_at' => now()]);
        return view('admin.fullcustom.chat', compact('fullCustom', 'messages'));
    }

    // public function oneRead($id)
    // {
    //     $message = Message::findOrFail($id);
    //     $getID = DB::table('notifications')->where('data->message_id', $id)->pluck('id');
    //     DB::table('notifications')->where('id', $getID)->update(['read_at' => now()]);
    //     return back($message);
    // }

    public function allRead()
    {
        $user = User::find(auth()->user()->id);

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return redirect()->back();
    }

    public function sendMessageAdmin(Request $request, $id)
    {
        $validateData = $request->validate([
            'body'     => 'required|max:250',
        ]);

        $fullcustom = FullCustom::where('id', $id)->where('status', 1)->first();
        $cek_message = Message::where('full_custom_id', $fullcustom->id)->first();
        if (empty($cek_message)) {
            $chatDetail = new Message;
            $chatDetail->user_id = Auth::user()->id;
            $chatDetail->full_custom_id = $fullcustom->id;
            $chatDetail->body = $request->body;
            $chatDetail->save($validateData);
        } else {
            $chatDetail = new Message;
            $chatDetail->user_id = Auth::user()->id;
            $chatDetail->full_custom_id = $fullcustom->id;
            $chatDetail->body = $request->body;
            $chatDetail->save($validateData);
        }
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $user_create = auth()->user()->name;
        $userr = auth()->user()->id;
        Notification::send($users, new CreateMessage($chatDetail->id, $chatDetail->full_custom_id, $user_create, $chatDetail->body, $userr));

        return back();
    }

    public function delete_full_custom($id)
    {
        $fullCustom = FullCustom::where('id', $id)->first();

        if ($fullCustom->image_custom) {
            Storage::delete($fullCustom->image_custom);
        }

        $fullCustom->delete();

        Alert::success('Sukses', 'Pesanan Berhasil Dihapus');
        return redirect('/admin/fullcustom');
    }
}
