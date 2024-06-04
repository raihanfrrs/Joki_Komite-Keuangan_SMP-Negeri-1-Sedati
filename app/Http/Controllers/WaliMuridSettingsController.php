<?php

namespace App\Http\Controllers;

use App\Http\Requests\WaliMuridSettingsUpdate;
use App\Http\Requests\WaliMuridSettingsUpdateRequest;
use App\Repositories\SettingsRepository;
use Illuminate\Http\Request;

class WaliMuridSettingsController extends Controller
{
    protected $settings;

    public function __construct(SettingsRepository $settingsRepository)
    {
        $this->settings = $settingsRepository;
    }

    public function wali_murid_setting_index()
    {
        return view('pages.wali_murid.setting.index');
    }

    public function wali_murid_setting_update(WaliMuridSettingsUpdateRequest $request)
    {
        try {
            if ($this->settings->wali_murid_update($request)) {
                return redirect()->back()->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Wali Murid Berhasil Diupdate!'
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
