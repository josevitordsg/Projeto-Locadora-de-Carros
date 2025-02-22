use App\Http\Controllers\AuthController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
Route::get('/veiculos', [VeiculoController::class, 'index'])->middleware('auth');