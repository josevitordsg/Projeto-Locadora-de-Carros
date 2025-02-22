namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;

class VeiculoController extends Controller {
    protected $apiService;

    public function __construct(ApiService $apiService) {
        $this->apiService = $apiService;
    }

    public function index() {
        $veiculos = $this->apiService->getVeiculos();
        return view('veiculos.index', compact('veiculos'));
    }
}