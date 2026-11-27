namespace App\Http\Controllers;

use App\Models\Application; // Import the Application model
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function checkStatus(Request $request)
    {
        $applicationNumber = $request->input('application-number');

        $application = Application::where('applicationNum', $applicationNumber)->first();

        // Rest of the code...
    }
}