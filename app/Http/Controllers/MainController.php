<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function destroySession(Request $request)
    {
        Session::flush();
        return response()->json(['message' => 'Session destroyed']);
    }

    public function saveVisitCount(Request $request)
    {
        $count      = 1;
        $url        = $request->input('url');
        $source     = $request->input('source');
        $campaign   = ($request->input('campaign') === null) ? "" : $request->input('campaign');

        $isValidCampaign = Campaign::where('name', $campaign)->where('source', $source)->select('id')->first();

        if ($isValidCampaign || $campaign === "") {
            $today = Carbon::today();
            $visit = Visit::whereDate('date', $today)->where('campaign_name', $campaign)->where('source', $source)->first();

            if ($visit) {
                $visit->campaign_name = $campaign;
                $visit->source_url = $url;
                $visit->source = $source;
                $visit->visit_landingpage = $visit->visit_landingpage + $count;
                $visit->save();
            } else {
                $visit = new Visit();
                $visit->campaign_name = $campaign;
                $visit->source_url = $url;
                $visit->source = $source;
                $visit->visit_landingpage = $count;
                $visit->date = $today;
                $visit->save();
            }
            return response()->json(['message' => 'valid campaign'], 200);
        } else {
            return response()->json(['message' => 'invalid campaign'], 400);
        }
    }

    public function saveClickCount(Request $request) {
        $count      = 1;
        $source     = $request->input('source');
        $platform   = $request->input('platform');
        $campaign   = ($request->input('campaign') === null) ? "" : $request->input('campaign');

        $isValidCampaign = Campaign::where('name', $campaign)->where('source', $source)->select('id')->first();

        if ($isValidCampaign || $campaign === "") {
            $today = Carbon::today();
            $camplog = Visit::whereDate('date', $today)->where('campaign_name', $campaign)->where('source', $source)->first();

            if ($camplog) {
                if ($platform === "whatsapp") {
                    $camplog->whatsapp_hit = $camplog->whatsapp_hit + $count;
                } else {
                    $camplog->telegram_hit = $camplog->telegram_hit + $count;
                }
                $camplog->save();
            }
        }
    }

    public function getWaWording(Request $request) {
        $source = $request->input("source");
        $campaign = $request->input("campaign");

        $camp = Campaign::where('name', $campaign)->where('source', $source)->select('whatsapp_wording')->first();

        if ($camp || $camp === "") {
            return response()->json(['data' => $camp], 200);
        }

        return response()->json(['data' => null], 200);
    }
}
