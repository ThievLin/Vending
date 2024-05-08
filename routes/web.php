<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SlotsController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompanyInfoController;
use App\Http\Controllers\MachinesController;
use App\Http\Controllers\DistrictsController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseListController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\IncomeListController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Pro_categoryController;
use App\Http\Controllers\ProducPriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReslotController;
use App\Http\Controllers\SaleReportController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SuppController;
use App\Http\Controllers\WarehouseController;
use App\Models\ExpenseList;
use App\Models\IncomeList;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//login route
Auth::routes();
Route::redirect('/', '/login');
Route::prefix('bsi')->group(function () {
    //Dashboard route
    Route::get('/dashboard', [HomeController::class, 'index']);
});

//Vending Machines  route
Route::get('/vending_machines', [MachinesController::class, 'index']);
Route::post('/create', [MachinesController::class, 'store']);
Route::get('/create_machin', [MachinesController::class, 'create']);
Route::get('/destroy/{id}', [MachinesController::class, 'destroy']);
Route::get('/edit_machine/{id}', [MachinesController::class, 'edit']);
Route::patch('update_machine/{id}', [MachinesController::class, 'update']);
Route::get('show_machines/{id}', [MachinesController::class, 'show']);


//Locoation route
Route::get('/location', [AddressController::class, 'show']);
Route::post('/adress/create', [AddressController::class, 'store']);
//slot
Route::get('/slot', [SlotsController::class, 'index']);
Route::post('/slot/create', [SlotsController::class, 'store']);


//product categories route
Route::get('/productCategory', [Pro_categoryController::class, 'index']);
Route::post('/create-proCategory', [Pro_categoryController::class, 'store']);
Route::get('/create_proGategory', [Pro_categoryController::class, 'create']);
Route::get('/edit_productCategory/{id}', [Pro_categoryController::class, 'edit']); // Add this line for edit
Route::patch('/update_productCategory/{id}', [Pro_categoryController::class, 'update']); // Add this line for update
Route::get('productCategory/destroy/{id}', [Pro_categoryController::class, 'destroy']);
//Product route
Route::get('/products', [ProductController::class, 'index']);
Route::post('/create-product', [ProductController::class, 'store']);
Route::get('/create_product', [ProductController::class, 'create']);
Route::get('product/destroy/{id}', [ProductController::class, 'destroy']);
Route::get('/edit_product/{id}', [ProductController::class, 'edit']);
Route::patch('update_product/{id}', [ProductController::class, 'update']);

//incomecate
Route::get('/incomecategory', [IncomeCategoryController::class, 'index']);
Route::get('/create_IncGategory', [IncomeCategoryController::class, 'create']);
Route::post('/create-IncGa', [IncomeCategoryController::class, 'store']);
Route::get('/edit_incomecategory/{id}', [IncomeCategoryController::class, 'edit']);
Route::patch('update-incomCat/{id}', [IncomeCategoryController::class, 'update']);
Route::get('/incomeCa/destroy/{id}', [IncomeCategoryController::class, 'destroy']);
//income
Route::get('/incomelist', [IncomeListController::class, 'index']);
Route::get('/create-incomList', [IncomeListController::class, 'create']);
Route::post('/create_incomList', [IncomeListController::class, 'store']);
Route::get('/incomelist-delete/destroy/{id}', [IncomeListController::class, 'destroy']);
Route::get('/edit_incomeList/{id}', [IncomeListController::class, 'edit']);
Route::patch('update_incomeList/{id}', [IncomeListController::class, 'update']);

//expense
Route::get('/expense-cat', [ExpenseController::class, 'index']);
Route::get('/create-expense', [ExpenseController::class, 'create']);
Route::post('/create_expenseCat', [ExpenseController::class, 'store']);
Route::get('/edit_expenseCata/{id}', [ExpenseController::class, 'edit']);
Route::patch('/edit_expenseCat/{id}', [ExpenseController::class, 'update']);
Route::get('/expense-cat/destroy/{id}', [ExpenseController::class, 'destroy']);

//expense List
Route::get('/expense-list', [ExpenseListController::class, 'index']);
Route::get('/create-expense-list', [ExpenseListController::class, 'create']);
Route::post('/create_expenseList', [ExpenseListController::class, 'store']);
Route::get('/edit_expenseList/{id}', [ExpenseListController::class, 'edit']);
Route::patch('/update_expenseList/{id}', [ExpenseListController::class, 'update']);
Route::get('/expense-list/destroy/{id}', [ExpenseListController::class, 'destroy']);
//company infomation
Route::get('/company-info', [CompanyInfoController::class, 'index']);
Route::get('/create-companyinfo', [CompanyInfoController::class, 'create']);
Route::post('/add_companyinfor', [CompanyInfoController::class, 'store']);
Route::get('/company-info/destroy/{id}', [CompanyInfoController::class, 'destroy']);

//user route
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'display']);
Route::post('/create-user', [UserController::class, 'create']);
Route::get('/edit_roleuser/{id}', [UserController::class, 'edit']);
Route::patch('/update_roleuser/{id}', [UserController::class, 'update']); // Add this line for update

//Inventory
Route::get('/inventory', [InventoryController::class, 'index']);
Route::get('/edit_inventoryproduct/{id}', [InventoryController::class, 'edit']);
Route::patch('/update_inventoryproduct/{id}', [InventoryController::class, 'updateInventory']);
Route::post('/products-refill', [InventoryController::class, 'update']);


//createOrupdate
Route::post('/products-price', [ProducPriceController::class, 'store']);
Route::get('/sale-out', [SaleReportController::class, 'index']);

//stock
Route::get('/stock-list', [StockController::class, 'index']);
Route::get('/create-stock', [StockController::class, 'create']);
Route::post('/add-stock', [StockController::class, 'store']);
Route::get('/edit_stock/{id}', [StockController::class, 'edit']);
Route::patch('/update_stock/{id}', [StockController::class, 'update']); // Add this line for update

//subplier
Route::get('/supp', [SuppController::class, 'index']);
Route::get('/create-sub', [SuppController::class, 'create']);
Route::post('/add-supp', [SuppController::class, 'store']);
Route::get('/edit-supp/{id}',[ SuppController::class, 'edit']);
Route::patch('/update-supp/{id}', [SuppController::class, 'update']); // Add this line for update
Route::get('supp/destroy/{id}', [SuppController::class, 'destroy']);


//warehouse
Route::get('/warehouse', [WarehouseController::class, 'index']);
Route::get('/create-warehouse', [WarehouseController::class, 'create']);
Route::post('/add-warehouse', [WarehouseController::class, 'store']);
Route::get('/warehouse-list/{id}', [WarehouseController::class, 'show']);




// Route::get('/welcome', [DistrictsController::class, 'index']);
Route::get('/index', function () {
    return view('index');
});



Route::resource('welcome', ReslotController::class);
