@extends('user_navbar')
@section('content')

<div class="app-content content">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">

            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 latest-update-tracking mt-1">
                <div class="card">
                    <div class="card-header latest-update-heading d-flex justify-content-between">
                        <h4 class="latest-update-heading-title text-bold-500">
                            <i class="feather icon-trash-2"></i> Deleted Mobiles
                        </h4>
                        <span class="badge badge-danger" style="font-size: 14px; padding: 8px 14px;">
                            Total: {{ $mobiles->count() }}
                        </span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="deletedMobilesTable">
                            <thead>
                                <tr>
                                    <th>Deleted At</th>
                                    <th>Deleted By</th>
                                    <th>Mobile Name</th>
                                    <th>Owner</th>
                                    <th>Company</th>
                                    <th>Group</th>
                                    <th>IMEI#</th>
                                    <th>SIM Lock</th>
                                    <th>Color</th>
                                    <th>Storage</th>
                                    <th>Battery Cycle</th>
                                    <th>Description</th>
                                    <th>Cost Price</th>
                                    <th>Selling Price</th>
                                    <th>Status at Deletion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mobiles as $mobile)
                                    <tr style="background-color: #ffe0e0;">
                                        <td>{{ \Carbon\Carbon::parse($mobile->deleted_at)->format('Y-m-d / h:i A') }}</td>
                                        <td>
                                            <span class="badge badge-danger">
                                                {{ $mobile->deletedBy->name ?? 'N/A' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($mobile->mobileName)
                                                {{ $mobile->mobileName->name }}
                                            @elseif($mobile->mobile_name)
                                                {{ $mobile->mobile_name }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $mobile->original_owner->name ?? 'N/A' }}</td>
                                        <td>{{ $mobile->company->name ?? 'N/A' }}</td>
                                        <td>{{ $mobile->group->name ?? 'N/A' }}</td>
                                        <td>{{ $mobile->imei_number }}</td>
                                        <td>{{ $mobile->sim_lock }}</td>
                                        <td>{{ $mobile->color }}</td>
                                        <td>{{ $mobile->storage }}</td>
                                        <td>{{ $mobile->battery_cycle }}</td>
                                        <td>{{ $mobile->description }}</td>
                                        <td>{{ $mobile->cost_price }}</td>
                                        <td>{{ $mobile->selling_price }}</td>
                                        <td>
                                            <span class="badge badge-secondary">{{ $mobile->availability }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="15" class="text-center text-muted">No deleted mobiles found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#deletedMobilesTable').DataTable({
            order: [[0, 'desc']]
        });
    });
</script>

@endsection
