<?php

namespace App\Http\Controllers;

use App\Models\RedeemCode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Assets;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnSelf;

class RedeemCodeController extends Controller
{

    //direct redeem List
    public function redeemList() {
        return view('redeemCode.redeemList');
    }

    //direct redeem code generation page
    public function generateRedeemCodePage() {
        $projects = Project::get();
        return view('redeemCode.redeemCode',compact('projects'));
    }

    // generate redeem code
    public function generateRedeemCode(Request $request){
       $code = Str::random(40);
       $project = Project::where('id',$request->projectId)->first();
       $progress = ($request->progress === "progressAllowed" ? 'true' : 'false');
       $legalDocument = ($request->legalDocument === "LDallowed" ? 'true' : 'false');
       $projectName = $project->project_name;

       RedeemCode::create([
        'random_code' => $code,
        'tier' => $request->tier,
        'project_name' => $projectName,
        'site_progress' => $progress,
        'legal_document' => $legalDocument,
        'site_progress_id' => $project->site_progress_id,
        'legal_document_id' => $project->legal_document_id,
        'redeemed' => false,
       ]);

       //change user tier
       //User::
       return response()->json(['code' => $code]);
    }

     //input redeem code from customer side
     public function customerRedeemCodes(Request $request) {
        $redeemCode = RedeemCode::where('random_code',$request->code)->first();

        if($redeemCode && $redeemCode->exists()) {
            $newTier = $redeemCode->tier;
            $redeemCode->delete();
            $user = Auth::guard('user')->user();
            $projectId = $redeemCode->project_name;

    
            $user->update([
                'tier'=> 'silver',
            ]);

            Assets::create([
            'customer_id' => $user->id,
            'project_id' => $projectId,
            'site_progress' => $redeemCode->site_progress,
            'legal_document' => $redeemCode->legal_document,
            'site_progress_id' => $redeemCode->site_progress_id,
            'legal_document_id' => $redeemCode->legal_document_id,
            ]);


            $customerAssets = Assets::orderBy('created_at', 'desc')->where('customer_id',$user->id)->first();
            return view('customer.customerUpdate',compact('customerAssets'))->with('success', 'Code Redeemed Successfully!');
        } else {
            return back()->with('error', 'Invalid code!');
        }
    }
    
    
}
