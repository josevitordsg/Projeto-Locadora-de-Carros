namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService {
    protected $baseUrl;

    public function __construct() {
        $this->baseUrl = env('LOCAL_BACKEND_URL');
    }

    public function getVeiculos() {
        return Http::get("{$this->baseUrl}veiculos")->json();
    }

    public function login($credentials) {
        return Http::post("{$this->baseUrl}token/", $credentials)->json();
    }
}
