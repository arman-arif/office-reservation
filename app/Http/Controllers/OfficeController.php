<?php

namespace App\Http\Controllers;

use App\Http\Resources\OfficeResource;
use App\Models\Office;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::query()
            ->where('approval_status', Office::APPROVAL_APPROVED)
            ->where('hidden', false)
            ->when(request('host_id'), function ($builder) {
                return $builder->whereUserId(request('host_id'));
            })
            ->when(request('user_id'), function (Builder $builder) {
                return $builder->whereRelation('reservations', 'user_id', '=', request('user_id'));
            })
            ->latest('id')
            ->paginate(10);

        return OfficeResource::collection(
            $offices
        );
    }
}
