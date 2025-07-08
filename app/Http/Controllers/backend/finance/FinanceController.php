<?php

namespace App\Http\Controllers\backend\finance;

use App\Models\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FinanceController extends Controller
{
    //**INDEX FILE  */
    public function financeIndex()
    {
        return view('backend.finance.financeIndex');
    }


    //**FINANCE STORE  */
    public function financeStore(Request $request)
    {

        $request->validate([
            'cost_title' => 'required',
            'cost_amount' => 'required',
        ]);

        // dd($request->all());
        $financeData = new Finance();
        $financeData->title = $request->cost_title;
        $financeData->description = $request->cost_details;
        $financeData->author_name = Auth::user()->name;
        if ($request->hasFile('attach_file')) {
            $file = $request->file('attach_file');
            $originalName = $file->getClientOriginalName();
            $cleanedName = preg_replace('/[^A-Za-z0-9\.\-_]/', '_', $originalName);
            $fileName = time() . '_' . $cleanedName;

            $filePath = $file->storeAs('finance', $fileName, 'public');
            $financeData->attach_file = env('APP_URL') . '/storage/' . $filePath;
        } else {
            $financeData->attach_file = null;  // explicitly set as null if no file uploaded
        }
        $financeData->amount = $request->cost_amount;
        $financeData->save();
        return response()->json([
            'success' => 'finance data inserted!'
        ], 200);
    }


    //**GET FINANCE RECORD  */
    public function getFinanceRecord()
    {
        $products = product::get();
        // dd($products);
        $allFinanceRecords = Finance::latest()->simplePaginate(10);
        // dd($allFinanceRecords);
        return view('backend.finance.allRecords', compact('allFinanceRecords', 'products'));
    }


    //**DELETE DATA  */
    public function deleteFinanceItem($id)
    {
        $finance = Finance::findOrFail($id);

        // Optional: Delete attached file from storage if exists
        if ($finance->attach_file) {
            $oldPath = str_replace(env('APP_URL') . '/storage/', '', $finance->attach_file);
            Storage::disk('public')->delete($oldPath);
        }

        $finance->delete();

        return response()->json(['success' => 'Finance item deleted successfully.']);
    }



    //** EDIT FINANCE */
    public function editFinanceItem($id)
    {
        $editFinance = Finance::find($id);
        // dd($editFinance);
        return view('backend.finance.editFinance', compact('editFinance'));
    }

    //**UPDATE FINANCE ITEM */
    public function updateFinanceItem(Request $request, $id)
    {
        $request->validate([
            'cost_title' => 'required',
            'cost_amount' => 'required',
        ]);

        // dd($request->all());
        $financeData = Finance::find($id);
        $financeData->title = $request->cost_title;
        $financeData->description = $request->cost_details;
        $financeData->author_name = Auth::user()->name;
        if ($request->hasFile('attach_file')) {
            // delete old file if exists
            if ($financeData->attach_file) {
                $oldPath = str_replace(env('APP_URL') . '/storage/', '', $financeData->attach_file);
                Storage::disk('public')->delete($oldPath);
            }

            // upload new file
            $file = $request->file('attach_file');
            $originalName = $file->getClientOriginalName();
            $cleanedName = preg_replace('/[^A-Za-z0-9\.\-_]/', '_', $originalName);
            $fileName = time() . '_' . $cleanedName;

            $filePath = $file->storeAs('finance', $fileName, 'public');
            $financeData->attach_file = env('APP_URL') . '/storage/' . $filePath;
        }

        $financeData->amount = $request->cost_amount;
        $financeData->save();
        return response()->json([
            'success' => 'finance data updated!'
        ], 200);
    }
}
