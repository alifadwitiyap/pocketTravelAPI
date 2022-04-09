<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;




class ChecklistController extends Controller
{

    public function createChecklistItem(Request $request,$user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'id tidak ditemukan',
            ], 404);
        }
        
        $item=$user->list()->create([
            'item_id' => 'item-' . str::random(16),
            "name"=> $request->name,
            "is_checked"=> false,
        ]);
        
        return response()->json([
            'isSuccess' => true,
            'item_id' => $item->item_id,
        ], 200);

    }
    
        
    public function getAllUserChecklistItem($user_id){
        $user = User::find($user_id);
        
        if (!$user) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'id tidak ditemukan',
            ], 404);
        }

        $itemLists=$user->list()
            ->where('item_id', 'exists', true)
            ->orderBy('created_at', 'desc')
            ->get();


        return response()->json([
            'isSuccess' => true,
            'itemList' =>  $itemLists,
        ], 200);
    
        
    }

    public function updateChecklistItemByID(Request $request,$item_id){
        $item = item::find($item_id);
        
        if (!$item) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'id tidak ditemukan',
            ], 404);
        }

        $item->update([
            'name' => $request->name,
            'is_checked' => $request->is_checked,
        ]);

        return response()->json([
            'isSuccess' => true,
            'message' => "item berhasil diupdate",
        ], 200);
    }
    
    public function deleteChecklistByID($item_id){
        $item = item::find($item_id);
        if (!$item) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'id tidak ditemukan',
            ], 404);
        }
        $item->delete();
        return response()->json([
            'isSuccess' => true,
            'message' => "item berhasil dihapus",
        ], 200);
    }

}
