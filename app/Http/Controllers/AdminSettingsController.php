<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminSettingsUpdate;
use App\Http\Requests\AdminSettingsUpdateRequest;
use Illuminate\Http\Request;
use App\Repositories\SettingsRepository;

class AdminSettingsController extends Controller
{
    protected $settings;

    public function __construct(SettingsRepository $settingsRepository)
    {
        $this->settings = $settingsRepository;
    }

    public function admin_setting_index()
    {
        return view('pages.admin.setting.index');
    }

    public function admin_setting_update(AdminSettingsUpdateRequest $request)
    {
        try {
            if ($this->settings->admin_update($request)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Setting Berhasil Diupdate!'
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
