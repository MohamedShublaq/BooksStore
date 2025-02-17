<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ImportFileRequest;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function home()
    {
        return view('Dashboard.index');
    }

    public function changeLanguage($lang)
    {
        if (in_array($lang, ['en', 'ar'])) {
            Session::put('locale', $lang);
        }
        return redirect()->back();
    }

    public function bulkDelete()
    {
        $ids = request()->input('ids');
        $model = 'App\Models\\' . request()->model;
        if (empty($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'No items selected for deletion.'
            ]);
        }
        try {
            $model::whereIn('id', $ids)->delete();
            return response()->json([
                'success' => true,
                'message' => __('actions.success_delete_selected')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('actions.failed_delete_selected')
            ]);
        }
    }

    public function importFile(ImportFileRequest $request)
    {
        $modelImport = "App\Imports\\" . $request->model . 'Import';

        if (!class_exists($modelImport)) {
            return redirect()->back()->with('error', __('actions.not_found_model'));
        }

        try {
            $importInstance = new $modelImport();

            Excel::import($importInstance, $request->file('file'));

            $errors = $importInstance->getErrors();

            if (!empty($errors)) {
                $errorMessages = collect($errors)->map(function ($error) {
                    return __("actions.raw") . " {$error['row']}: " . implode(', ', $error['errors']);
                })->toArray();

                return redirect()->back()->with('error', __('actions.validation_failed'))->withErrors($errorMessages);
            }

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            return redirect()->back()->with('error', __('actions.validation_error') . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('actions.import_error') . $e->getMessage());
        }
        return redirect()->back()->with('success', __('actions.import_success'));
    }
}
