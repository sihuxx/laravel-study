<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function message(Request $request) {
        // dd($request->all(), $request->file('image'));
        $request->validate([
            'name' => 'required',
            'image' => 'image|max:2048'
        ]);

        $imgPath = null;

        if($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('images', 'public');
        }
        
        Message::create([
            'name' => $request->name,
            'image' => $imgPath
        ]);

        return redirect()->route('print');
    }

    public function print() {
        $msgs = Message::orderBy('created_at', 'desc')->get();

        return view('message', compact('msgs'));
    }

    public function destroy($id) {
        Message::find($id)->delete();

        return back();
    }
    public function edit($id) {
        $msg = Message::findOrFail($id);

        return view('edit', compact('msg'));
    }

    public function update(Request $request, $id) {
        $msg = Message::findOrFail($id);

        $msg->update([
            'name' => $request->name
        ]);

        return redirect()->route('print');
    }
    
}