namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ApiService;

class AuthController extends Controller {
    protected $apiService;

    public function __construct(ApiService $apiService) {
        $this->apiService = $apiService;
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        $response = $this->apiService->login($credentials);
        
        if (isset($response['token'])) {
            session(['api_token' => $response['token']]);
            return redirect('/dashboard');
        }
        
        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }
}