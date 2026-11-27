<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// ActiveUser represent table from database
use App\Models\ActiveUser;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class FormController extends Controller
{
    public function processFDocumentStamp($id)
{
    // Find the user by id
    $user = ActiveUser::find($id);

    // Check if applicationStatus is 'قبول نهائي'
    if ($user->applicationStatus == 'قبول نهائي' && $user->F_document) {
        // Get the file path of the submitted F_document
        $documentPath = storage_path('app/public/' . $user->F_document);

        // Load the image
        // $img = Image::make($documentPath);

        // Load the stamp image
        // $stamp = Image::make(public_path('images/sig.png'));

        // Insert the stamp into the F_document (e.g., bottom right corner)
        // $img->insert($stamp, 'bottom-right', 10, 10);

        // Save the stamped image to a new file
        $newFilePath = 'stamped_docs/' . $user->F_document;
        // $img->save(storage_path('app/public/' . $newFilePath));

        // Update the user's FundingDocStamp column with the new file path
        $user->FundingDocStamp = $newFilePath;
        $user->save();
    }

    // Pass to the mslak view with the updated user info
    return view('mslak', ['user' => $user]);
}
    // FormController.php

    public function showMslak()
    {
        // Retrieve records preliminarily accepted by the table reviewer and
        // now awaiting a final decision from the mslak organization
        $ActiveUsers = ActiveUser::where('applicationStatus', 'قبول مبدأي')->get();

        // Pass the retrieved data to the view
        return view('mslak', ['ActiveUsers' => $ActiveUsers]);
    }



    // Controller for table function to route to home view
    public function home()
    {
        return view('home');
    }
    public function appStatus()
    {
        // $activeUser = ActiveUser::find($applicationStatus);
        // return view('appStatus');
        // $activeUser = ActiveUser::find($id);
        return view('appStatus');
    }

    // Controller for table function to route to table view
    public function table()
    {
        // Review queue: only applications still awaiting a decision stay here;
        // accepted/rejected/needs-modification move to their own screens/states.
        $ActiveUsers = ActiveUser::where('applicationStatus', 'pending')->get();

        // return to view 'table' and passing data to an Array which contain 'ActiveUsers' variable that store data from $ActiveUsers variable above
        return view('table', ['ActiveUsers' => $ActiveUsers]);
    }



    // Controller for table function to route to form view
    public function form()
    {
        return view('form');
    }

    //Controller function to store data to database
    public function store(Request $request)
    {
        // dd($request->all());
        //    Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'PhoneNum' => 'nullable|string|max:15',
            'email' => 'required|email|unique:active_users,email',
            'Job_status' => 'required|in:employed,unemployed',
            'status' => 'required|in:Yes,No',
            'Id_iqama' => 'required|string|max:20',
            'UID' => 'required|string|max:20',
            'RDegree' => 'required|string|max:255',
            'CDegree' => 'required|string|max:255',
            'Rspe' => 'required|string|max:255',
            'F_document' => 'required|file|mimes:pdf|max:20480',
        ]);

        // dd($request->all());


        // try {
        $activeUsers = new ActiveUser();
        // Assign values directly, no need to use request() function
        $activeUsers->name = $request->input('name');
        $activeUsers->email = $request->input('email');
        // $activeUsers->birthday = $request->input('birthday');
        $activeUsers->Job_status = $request->input('Job_status');
        $activeUsers->status = $request->input('status');
        $activeUsers->Id_iqama = $request->input('Id_iqama');
        $activeUsers->PhoneNum = $request->input('PhoneNum');
        $activeUsers->UID = $request->input('UID');
        $activeUsers->RDegree = $request->input('RDegree');
        $activeUsers->CDegree = $request->input('CDegree');
        $activeUsers->Rspe = $request->input('Rspe');
        $activeUsers->created_at = now();
        $activeUsers->applicationStatus = $request->input('applicationStatus');
        $activeUsers->applicationStatus = 'pending';
        $activeUsers->applicationNum = $this->generateUniqueApplicationNum();



        // Handle F_document upload
        if ($request->hasFile('F_document')) {
            $file = $request->file('F_document');
            $filename = time() . '_f_' . $file->getClientOriginalName();
            $path = $file->storeAs('f_documents', $filename, 'public');
            $activeUsers->F_document = $path;
        }



        $activeUsers->save();


        // return redirect('/')->with('msg', 'Your data has successfully submitted !');
        return redirect()->back()->with('msg', 'تم ارسال طلبك بنجاح ورقم الطلب ' . $activeUsers->applicationNum);
    }

    //Controller function to remove data from database
    public function remove($id)
    {
        // It is important to name the variable for the models as it will be the same name as our table name
        // Using the model to find a record in our table
        $ActiveUsers = ActiveUser::findOrFail($id);
        // Delete records from table database
        $ActiveUsers->delete();

        return redirect('/table')->with('del', 'تم حذف الطلب بنجاح!');
    }


    public function accept($id)
    {
        // Preliminary acceptance by the table reviewer; the application now
        // moves on to the mslak organization for a final decision
        $activeUser = ActiveUser::find($id);

        $activeUser->applicationStatus = 'قبول مبدأي';
        $activeUser->save();

        return redirect()->back()->with('success', 'تم قبول الطلب مبدئياً وسيتم تحويله الآن الى الجهة الممولة للمراجعة النهائية');
    }

    public function acceptFinal($id)
    {
        // Final acceptance by the mslak organization
        $activeUser = ActiveUser::find($id);

        $activeUser->applicationStatus = 'قبول نهائي';
        $activeUser->save();

        return redirect()->back()->with('success', 'تم قبول الطلب بشكل نهائي');
    }

    public function needModification($id, Request $request)
    {
        // Fetch the activeUsers record
        $activeUser = ActiveUser::find($id);

        // Update the applicationStatus to "need modification"
        $activeUser->applicationStatus = 'بحاجة الى تعديل';
        $activeUser->modification_reason = $request->input('modification'); // Store the modification reason
        $activeUser->save();

        // Redirect back to whichever screen (table or mslak) the reviewer acted from
        return redirect()->back()->with('success', 'تم تحديث حالة الطلب الى بحاجة إلى تعديل بنجاح ');
    }

    public function reject($id, Request $request)
    {
        // Fetch the activeUsers record
        $activeUser = ActiveUser::find($id);

        // Update the applicationStatus to "rejected"
        $activeUser->applicationStatus = 'مرفوض';
        $activeUser->rejection_reason = $request->input('reason');
        $activeUser->save();

        // Redirect back to whichever screen (table or mslak) the reviewer acted from
        return redirect()->back()->with('success', 'تم تحديث حالة الطلب الى مرفوض بنجاح ');
    }
    private function generateUniqueApplicationNum()
    {
        do {
            $applicationNum = random_int(10000, 99999);
        } while (ActiveUser::where('applicationNum', $applicationNum)->exists());

        return $applicationNum;
    }
    // public function updateAppStatus(Request $request, $id)
    // {
    //     $activeUser = ActiveUser::findOrFail($id);
    //     $activeUser->applicationStatus = $request->input('applicationStatus');
    //     $activeUser->save();

    //     return redirect()->route('form')->with('success', 'Application status updated successfully.');
    // }
    // public function checkStatus($applicationNum)
    // {
    //     $activeUser = ActiveUser::where('applicationNum', $applicationNum)->first();

    //     if ($activeUser) {
    //         return response()->json(['status' => $activeUser->applicationStatus]);
    //     } else {
    //         return response()->json(['status' => null]);
    //     }
    // }
    public function checkStatus($applicationNum)
    {
        $activeUser = ActiveUser::where('applicationNum', $applicationNum)->first();

        if ($activeUser) {
            return response()->json(['status' => $activeUser->applicationStatus]);
        } else {
            return response()->json(['status' => null]);
        }
    }

    public function downloadPDF()
    {
        $filePath = storage_path('app/FAplication_new12-1.pdf');
        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->download($filePath);
    }
}
