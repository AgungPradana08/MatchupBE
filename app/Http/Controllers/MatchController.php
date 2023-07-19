<?php

namespace App\Http\Controllers;

use App\Models\Matching;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function creatematch(Request $request){

        $request->validate([
            'user_id' => 'required', // ID pengguna yang membuat mabar
            // Validasi lainnya
        ]);

        $match = Matching::create([
            'user_id' => $request->user_id,
            // Data lainnya yang relevan
        ]);

        return response()->json(['message' => 'Match created successfully', 'match' => $match], 201);
    }

    public function joinmatch(Request $request, $matchId){
        // Periksa apakah mabar dengan $matchId ada
        $match = Matching::find($matchId);

        if (!$match) {
            return response()->json(['message' => 'Match not found'], 404);
        }

        // Periksa apakah status mabar memungkinkan bergabung (misalnya 'pending')
        if ($match->status !== 'pending') {
            return response()->json(['message' => 'Match is not available for joining'], 400);
        }

        // Buat entri baru di tabel pivot yang mengaitkan pengguna dengan mabar
        $match->players()->attach($request->user_id);

        return response()->json(['message' => 'Joined the match successfully'], 200);
    }
}
