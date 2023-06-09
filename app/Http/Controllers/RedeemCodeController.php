<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\Project;
use App\Models\RedeemCode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SelectedProjects;
use App\Http\Controllers\Controller;
use App\Jobs\DeleteExpiredRedeemCodes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\returnSelf;

class RedeemCodeController extends Controller
{

    //direct redeem List
    public function redeemList()
    {
        return view('redeemCode.redeemList');
    }

    //direct redeem code generation page
    public function generateRedeemCodePage()
    {
        $projects = Project::get();
        return view('admin.redeemCode.create', compact('projects'));
    }

    public function generateCode()
    {
        return view('admin.tier.generate-code');
    }

    // generate redeem code
    public function generateRedeemCode(Request $request)
    {

        // Validation code starts here
        $validator = Validator::make($request->all(), [
            'tier' => 'required',
            'projectIds' => 'required|array|min:1',
            'progress' => 'required_without_all:legalDocument',
            'legalDocument' => 'required_without_all:progress',
        ], [
            'projectIds.required' => 'Please select at least one project',
            'progress.required_without_all' => 'Please select at least progress or legal document',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        // Validation code ends here

        $code = Str::random(16); // make redeem code
        $progress = ($request->progress === "progressAllowed" ? true : ($request->progress === "progressNotAllowed" ? false : null)); // making boolean value of progress according from the request
        $legalDocument = ($request->legalDocument === "LDallowed" ? true : ($request->legalDocument === "LDnotAllowed" ? false : null)); // making boolean value of legalDocument according from the request

        $projectIds = $request->projectIds; // eg. [1,2,3,4,5] that is the project ids in the array.

        //check if all projects or custom projects
        //if all projects
        if ($request->projectIds[0] === 'allProjects') {
            $projects = Project::all()->toArray();
            $projectIds = collect($projects)->pluck('id')->toArray();
        } else {
            $projectIds = $request->projectIds;  //if custom projects
        }

        //loop the projectIds from above and create redeem code table with the data from the request
        foreach ($projectIds as $projectId) {
            RedeemCode::create([
                'random_code' => $code,
                'tier' => $request->tier,
                'project_id' => $projectId,
                'site_progress' => $progress,
                'album' => $legalDocument, //assume legal document as album for user familiar 
                'redeemed' => false,
            ]);
        }

        DeleteExpiredRedeemCodes::dispatch()->delay(now()->addDays(30));

        return response()->json(['code' => $code]);
    }

    public function code(Request $request)
    {
        return $request->all();
    }


    public function customerRedeemCodes(Request $request)
    {
        $redeemCodes = RedeemCode::where('random_code', $request->code)->get(); //get the related data of the redeemcode from the redeemCode table 
        // dd($redeemCodes->toArray());
        $user = Auth::guard('user')->user(); //get the login user

        if (count($redeemCodes) != 0) {
            //loop the redeemCodes and fill the Assets tables with the data from the redeem code table
            foreach ($redeemCodes as $redeemCode) {
                //checck if the user input redeem code exists in the redeem table or not
                if ($redeemCode && $redeemCode->exists()) {
                    $newTier = $redeemCode->tier; //new tier from the request
                    $user->update([
                        'tier' => $newTier, //update user tier
                    ]);

                    $projectId = $redeemCode->project_id; //get project Id which is related with the user
                    $asset = Assets::where('project_id', $projectId)->where('customer_id', $user->id)->get();

                    //check if the projects are already in the assets table or not
                    //if the projects are already in the assets table , just update
                    if (count($asset) > 0) {
                        if ($redeemCode->site_progress !== null || $redeemCode->album !== null) {
                            Assets::where('project_id', $projectId)->where('customer_id', $user->id)->update([
                                'site_progress' => $redeemCode->site_progress,
                                'legal_document' => $redeemCode->album,
                            ]);
                        }
                    } else {
                        //if the projects are not already in the assets table , create new row in assets table
                        Assets::create([
                            'customer_id' => $user->id,
                            'project_id' => $projectId,
                            'site_progress' => $redeemCode->site_progress,
                            'legal_document' => $redeemCode->album,
                        ]);
                    }

                    // Delete redeem code
                    $redeemCode->delete();
                }
            };

            return redirect()->to(url()->previous() . "#redeemInput")->with('redeemSuccess', 'Congratulation! Your code has been successfully redeemed. Thank you for your loyalty and support.');
            // return redirect()->back()->with('redeemSuccess', 'Congratulation! Your code has been successfully redeemed. Thank you for your loyalty and support.');
            // return redirect()->route('profile.redeem', ['id' => $user->id]); //redirect route to the profile controller along with the login user Id
        } else {
            return back()->with('InvalidCode', 'Sorry! Your code is not valid. Please try again.');
        }
    }
}
