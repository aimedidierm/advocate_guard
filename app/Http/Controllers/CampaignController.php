<?php

namespace App\Http\Controllers;

use App\Enums\CampaignStage;
use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::paginate(10);
        return view('admin.campaign.index', compact('campaigns'));
    }

    public function landingPage()
    {
        $campaigns = Campaign::whereNot('stage', CampaignStage::PLANNING->value)->get();
        return view('campaign.index', compact('campaigns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CampaignRequest $request)
    {
        Campaign::create([
            'name' => $request->input('name'),
            'objective' => $request->input('objective'),
            'goals' => json_encode($request->input('goals')),
            'target_audience' => json_encode($request->input('target_audience')),
            'budget_resources' => json_encode($request->input('budget_resources')),
            'timeline' => json_encode($request->input('timeline')),
            'role_responsibilities' => json_encode($request->input('role_responsibilities')),
        ]);

        return redirect('/admin/campaign')->with('success', 'Campaign created');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $campaign = Campaign::find($id);

        if ($campaign) {
            return view('admin.campaign.details', compact('campaign'));
        } else {
            return redirect()->back()->withErrors('Campaign not found');
        }
    }

    public function campaignDetails(int $id)
    {
        $campaign = Campaign::find($id);

        if ($campaign) {
            return view('campaign.details', compact('campaign'));
        } else {
            return redirect()->back()->withErrors('Campaign not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $campaign = Campaign::find($id);
        if ($campaign) {
            $campaign->delete();
            return redirect('/admin/campaign')->with('success', 'Campaign deleted');
        } else {
            return redirect()->back()->withErrors('Campaign not found');
        }
    }

    public function launch(int $id)
    {
        $campaign = Campaign::find($id);
        if ($campaign) {
            $campaign->stage = CampaignStage::LAUNCH->value;
            $campaign->update();
            return redirect('/admin/campaign')->with('success', 'Campaign updated');
        } else {
            return redirect()->back()->withErrors('Campaign not found');
        }
    }
}
