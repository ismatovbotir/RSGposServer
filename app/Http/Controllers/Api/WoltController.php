<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wolt;
use App\Models\WoltToken;
use App\Models\WoltUser;
use Illuminate\Support\Facades\Http;

class WoltController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function authorization(Request $request)
    {

        $headerKey = $request->header('X-API-Key');

        if (!$headerKey || $headerKey !== env('WOLT', "c4a7f8d1b0f45a9f3e6de8a3c22e7df9ff0e76a80b1b6f40b1f9a1227e36b142")) {
            return response()->json([
                'status'  => 'error',
                'message' => 'missing X-API-Key',
            ], 401); // 401 Unauthorized
        }

        $data = $request->all();
        try {
            $wolt=Wolt::where('redirect_url','https://andalusgo.uz')->update([
                "authorization_code"=>$data["authorization_code"],
                "partner_venue_id"=>$data["partner_venue_id"]
            ]);
            
           // $newToken = Wolt::Create(
             //   $data

            //);
            return response()->json(["status" => "success"], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ], 500);
        }
    }

    public function woltWebhookOrders(Request $request)
    {

        return response()->json(['status' => 'done', 'data' => $request->all()]);
    }

    public function woltToken()
    {
        $wolt_user = WoltUser::first();
        $wolt = Wolt::first();
        //dd($wolt);
        $response = Http::asForm()
            ->withBasicAuth($wolt_user->client_id, $wolt_user->client_secret)
            ->post('https://integrations-authentication-service.development.dev.woltapi.com/oauth2/token', [
                'grant_type' => 'authorization_code',
                'redirect_uri' => 'https://andalusgo.uz',
                'code' => $wolt->authorization_code,
            ]);

        $data = $response->json();

        return $data;
    }

    public function woltTokenRefresh()
    {
        $wolt_user = WoltUser::first();
        $wolt_token = WoltToken::first();
        

        $response = Http::asForm()
            ->withBasicAuth($wolt_user->client_id, $wolt_user->client_secret)
            ->post('https://integrations-authentication-service.development.dev.woltapi.com/oauth2/token', [
                'grant_type' => 'refresh_token',
               
                'refresh_token' => $wolt_token->refresh_token,
            ]);

        $data = $response->json();

        return $data;
    }
}
