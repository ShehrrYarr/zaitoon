@extends('user_navbar')
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">

            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 latest-update-tracking mt-1">
                <div class="card">
                    <div class="card-header latest-update-heading d-flex justify-content-between">
                        <h4 class="latest-update-heading-title text-bold-500">
                            Pending → Available Restore Logs
                        </h4>
                        <span class="badge badge-primary" style="font-size: 14px; padding: 8px 14px;">
                            Total: {{ $logs->count() }}
                        </span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="restoreLogsTable">
                            <thead>
                                <tr>
                                    <th>Restored At</th>
                                    <th>Restored By</th>
                                    <th>Mobile Name</th>
                                    <th>Company</th>
                                    <th>Group</th>
                                    <th>IMEI#</th>
                                    <th>Old Cost Price</th>
                                    <th>New Cost Price</th>
                                    <th>Old Selling Price</th>
                                    <th>New Selling Price</th>
                                    <th>Old Battery Health</th>
                                    <th>New Battery Health</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($logs as $log)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($log->created_at)->format('Y-m-d / h:i A') }}</td>
                                        <td>
                                            <span class="badge badge-info">
                                                {{ $log->restoredBy->name ?? 'N/A' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($log->mobile && $log->mobile->mobileName)
                                                {{ $log->mobile->mobileName->name }}
                                            @elseif($log->mobile && $log->mobile->mobile_name)
                                                {{ $log->mobile->mobile_name }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $log->mobile->company->name ?? 'N/A' }}</td>
                                        <td>{{ $log->mobile->group->name ?? 'N/A' }}</td>
                                        <td>{{ $log->mobile->imei_number ?? 'N/A' }}</td>
                                        <td>{{ $log->old_cost_price }}</td>
                                        <td>{{ $log->new_cost_price }}</td>
                                        <td>{{ $log->old_selling_price }}</td>
                                        <td>{{ $log->new_selling_price }}</td>
                                        <td>{{ $log->old_battery_health ?? 'N/A' }}</td>
                                        <td>{{ $log->new_battery_health ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center text-muted">No restore logs found.</td>
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
        $('#restoreLogsTable').DataTable({
            order: [[0, 'desc']]
        });
    });
</script>

@endsection
