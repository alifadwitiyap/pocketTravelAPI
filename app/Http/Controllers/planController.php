<?php

namespace App\Http\Controllers;

use App\Models\plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//! important tanggal dalam bentuk yyyy-dd-mm

class planController extends Controller
{
    public function createUserPlan(Request $request, $user_id)
    {

        $user = User::find($user_id);

        if (!$user) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'id tidak ditemukan',
            ], 404);
        }

        $plan = $user->plan()->create([
            'plan_id' => 'plan-' . str::random(16),
            'tanggal' => $request->tanggal,
            'negara' => $request->negara,
            'lokasi' => $request->lokasi,
            'jadwal' => [],
        ]);

        return response()->json([
            'isSuccess' => true,
            'plan_id' => $plan->plan_id,
        ], 200);
    }

    public function getAllUserPlan($user_id)
    {

        $user = User::find($user_id);

        if (!$user) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'id tidak ditemukan',
            ], 404);
        }

        $plan = $user->plan()
            ->where('plan_id', 'exists', true)
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->json([
            'isSuccess' => true,
            'plans' => $plan,
        ], 200);
    }

    public function getPlanByID($plan_id)
    {

        $plan = plan::find($plan_id);

        if (!$plan) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'id tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'isSuccess' => true,
            'plan' => $plan,
        ], 200);
    }

    public function deletePlanByID($plan_id)
    {
        $plan = plan::find($plan_id);
        if (!$plan) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'id tidak ditemukan',
            ], 404);
        }
        $plan->delete();
        return response()->json([
            'isSuccess' => true,
            'message' => "plan berhasil dihapus",
        ], 200);
    }

    public function updatePlanByID(Request $request, $plan_id)
    {
        $plan = plan::find($plan_id);

        if (!$plan) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'id tidak ditemukan',
            ], 404);
        }

        $plan->update([
            "negara" => $request->negara,
            "lokasi" => $request->lokasi,
            "jadwal" => $request->jadwal,
            "tanggal" => $request->tanggal,
        ]);

        return response()->json([
            'isSuccess' => true,
            'message' => "plan berhasil diupdate",
        ], 200);
    }

}
