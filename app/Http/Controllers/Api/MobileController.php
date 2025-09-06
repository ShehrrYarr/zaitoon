<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MobileResource;
use App\Models\Mobile;
// use Illuminate\Http\Request;

class MobileController extends Controller
{
     public function index(Request $request)
    {
        $perPage = (int) ($request->query('per_page', 15));
        $perPage = $perPage > 100 ? 100 : max($perPage, 1);

        $q = Mobile::query()
            ->with([
                'company:id,name',
                'group:id,name',
                'mobileName:id,name',
            ]);

        // Optional filters for the 3rd-party dev
        if ($request->filled('availability')) {
            $q->where('availability', $request->query('availability')); // Available|Sold
        }
        if ($request->filled('sim_lock')) {
            $q->where('sim_lock', $request->query('sim_lock')); // PTA|Non-PTA|J.V
        }
        if ($request->filled('company_id')) {
            $q->where('company_id', $request->query('company_id'));
        }
        if ($request->filled('group_id')) {
            $q->where('group_id', $request->query('group_id'));
        }
        if ($search = $request->query('search')) {
            $q->where(function ($w) use ($search) {
                $w->where('mobile_name', 'like', "%{$search}%")
                  ->orWhere('imei_number', 'like', "%{$search}%");
            });
        }

        $mobiles = $q->orderByDesc('id')->paginate($perPage)->appends($request->query());

        // Resource collection automatically wraps with `data`, `links`, `meta` for pagination
        return MobileResource::collection($mobiles);
    }
}
