<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RedeemCode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\returnSelf;

class RedeemCodeController extends Controller
{
    //direct redeem code generation page
    public function generateRedeemCodePage() {
        return view('redeemCode');
    }

    // generate redeem code
    public function generateRedeemCode(Request $request){
       $code = Str::random(40);
       $progress = ($request->progress === "progressAllowed" ? 'true' : 'false');
       $legalDocument = ($request->legalDocument === "LDallowed" ? 'true' : 'false');
       RedeemCode::create([
        'random_code' => $code,
        'tier' => $request->tier,
        'project_name' => $request->projectName,
        'site_progress' => $progress,
        'legal_document' => $legalDocument,
        'site_progress_id' => 1,
        'legal_document_id' => 1,
        'redeemed' => false,

       ]);
       return response()->json(['code' => $code]);
    }

    // public function generateRedeemCode(Request $request){
    //     $code = Str::random(40);
    //     $progress = ($request->progress === "progressAllowed" ? 'true' : 'false');
    //     $legalDocument = ($request->legalDocument === "LDallowed" ? 'true' : 'false');
    //     RedeemCode::create([
    //         'random_code' => $code,
    //         'tier' => $request->tier,
    //         'project_name' => $request->projectName,
    //         'site_progress' => $progress,
    //         'legal_document' => $legalDocument,
    //         'site_progress_id' => 1,
    //         'legal_document_id' => 1,
    //         'redeemed' => false,
    //     ]);
    //     return response()->json(['code' => $code]); // return the generated code as a JSON response
    // }
    
}
