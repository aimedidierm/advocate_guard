<?php

namespace App\Http\Controllers;

use App\Enums\CampaignStage;
use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;
use App\Models\Progress;
use Illuminate\Http\Request;

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
        $imagePath = $request->file('image')->store('campaign_images', 'public');

        $campaign = Campaign::create([
            'name' => $request->input('name'),
            'objective' => $request->input('objective'),
            'goals' => json_encode($request->input('goals')),
            'target_audience' => json_encode($request->input('target_audience')),
            'budget_resources' => json_encode($request->input('budget_resources')),
            'timeline' => json_encode($request->input('timeline')),
            'role_responsibilities' => json_encode($request->input('role_responsibilities')),
            'image' => $imagePath,
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        Progress::create([
            'campaign' => $campaign->id,
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

    public function updateProgress(int $id, Request $request)
    {
        $campaignProgress = Progress::where('campaign_id', $id)->first();

        if ($campaignProgress) {
            $validated = $request->validate([
                'objective' => 'required|boolean',
                'goals' => 'required|boolean',
                'target_audience' => 'required|boolean',
                'budget_resources' => 'required|boolean',
            ]);

            $campaignProgress->update($validated);

            return response()->json(['message' => 'Progress updated successfully']);
        } else {
            Progress::create([
                'campaign_id' => $id,
            ]);
        }
        return response()->json(['message' => 'Progress updated successfully']);
    }

    public function getProgress(int $id)
    {
        $campaign = Campaign::find($id);
        $progress = $campaign->progress;

        return response()->json([
            'progress' => $progress
        ]);
    }
}
