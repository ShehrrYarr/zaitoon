@extends('user_navbar')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <div class="ml-1">
                    <form method="GET" action="{{ route('otherTransferInventory', $id) }}" class="mb-3 d-flex align-items-center">
                        <select class="form-control" id="nameSelect" name="mobile_name_id">
                            <option value="">Select Mobile Name</option>
                            @foreach($mobileNames as $mobileName)
                                <option value="{{ $mobileName->id }}" {{ request('mobile_name_id') == $mobileName->id ? 'selected' : '' }}>{{ $mobileName->name }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" name="company_id">
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ request('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" name="group_id">
                            <option value="">Select Group</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" {{ request('group_id') == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary mx-1">Filter</button>
                        <a href="{{ route('otherTransferInventory', $id) }}" class="btn btn-secondary mx-1">Reset</a>
                    </form>
                </div>

                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 latest-update-tracking mt-1">
                    <div class="card">
                        <div class="card-header latest-update-heading d-flex justify-content-between">
                            <h4 class="latest-update-heading-title text-bold-500">Transfer Mobiles</h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Transfer Date</th>
                                        <th>Mobile Name</th>
                                        <th>IMEI#</th>
                                        <th>SIM Lock</th>
                                        <th>Color</th>
                                        <th>Storage</th>
                                        <th>Battery Health</th>
                                        <th>Cost Price</th>
                                        <th>Selling Price</th>
                                        <th>Availability</th>
                                        <th>Added at</th>
                                        <th>Transfer From</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mobileData as $key)
                                        <tr>
                                            
                                            <!--<td>{{ \Carbon\Carbon::parse($key->transfer_time)->tz('Asia/Karachi')->format('M d, Y, h:i A') }}</td>-->
                                            <td>{{ \Carbon\Carbon::parse($key->transfer_time)->format(' Y-m-d / h:i ') }}</td>
                                            <td>{{ $key->mobile->mobile_name }}</td>
                                            <td>{{ $key->mobile->imei_number }}</td>
                                            <td>{{ $key->mobile->sim_lock }}</td>
                                            <td>{{ $key->mobile->color }}</td>
                                            <td>{{ $key->mobile->storage }}</td>
                                            <td>{{ $key->mobile->battery_health }}</td>
                                            <td>{{ $key->mobile->cost_price }}</td>
                                            <td>{{ $key->mobile->selling_price }}</td>
                                            <td>
                                                <a href="#">
                                                    <span class="badge badge-primary">{{ $key->mobile->availability }}</span>
                                                </a>
                                            </td>
                                            <td>{{ $key->mobile->created_at }}</td>
                                            <td>{{ $key->fromUser->name }}</td>

                                        </tr>
                                    @endforeach
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
        $('#nameSelect').select2({ placeholder: "Select a Mobile Name", allowClear: true });
    });
</script>
@endsection
