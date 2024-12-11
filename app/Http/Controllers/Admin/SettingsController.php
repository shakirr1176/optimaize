<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ResponseTypeEnum;
use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public SettingService $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index(): RedirectResponse
    {
        $type = array_key_first($this->settingService->settingsConfigurations);
        $sub_type = array_key_first(current($this->settingService->settingsConfigurations)['sub-settings']);
        return redirect()->route('admin.settings.edit', ['type' => $type, 'sub_type' => $sub_type]);
    }

    public function edit(string $type, string $sub_type): View
    {
        abort_if(!isset($this->settingService->settingsConfigurations[$type]['sub-settings'][$sub_type]), 404);

        $data['settings'] = $this->settingService->load($type, $sub_type);
        $data['type'] = $type;
        $data['sub_type'] = $sub_type;
        $data['title'] = __('Edit - :type Settings', ['type' => ucfirst($type)]);
        return view('admin.settings.edit', $data);
    }

    public function update(Request $request, string $type, string $sub_type): RedirectResponse
    {
        if (!isset($this->settingService->settingsConfigurations[$type]['sub-settings'][$sub_type])) {
            return redirect()->back()->withInput()->with(ResponseTypeEnum::ERROR->value, __('Failed to update settings.'));
        }

        $response = $this->settingService->update($request, $type, $sub_type);
        $status = $response[ResponseTypeEnum::STATUS_KEY->value] ? ResponseTypeEnum::SUCCESS->value : ResponseTypeEnum::ERROR->value;

        return redirect()
            ->route('admin.settings.edit', [$type, $sub_type])
            ->withInput($response['inputs'])
            ->withErrors($response['errors'])
            ->with($status, $response[ResponseTypeEnum::MESSAGE_KEY->value]);
    }
}
