@extends('user_navbar')
@section('content')

{{-- Edit Modal --}}

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Mobile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" id="editmobile" action="{{ route('updateMobile') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-body">

                            <div class="mb-1">
                                <label for="mobile_name" class="form-label">Mobile Name</label>
                                <input class="form-control" type="hidden" name="id" id="id" value="Update">
                                <select class="form-control" id="edit_mobile_name_id"  name="mobile_name_id" required>
                                @foreach($mobileNames as $mobileName)
                                <option value="{{ $mobileName->id }}">{{ $mobileName->name }}</option>
                                @endforeach
                            </select>
                            </div>

                             <div class="mb-1" >
                            <label for="group_id" class="form-label">Company</label>
                            <select class="form-control" id="edit_company_id" name="company_id" required>
    @foreach($companies as $company)
    <option value="{{ $company->id }}">{{ $company->name }}</option>
    @endforeach
</select>
                        </div>
                         <div class="mb-1" >
                            <label for="group_id" class="form-label">Group</label>
                            <select class="form-control" id="edit_group_id" name="group_id" required>
    @foreach($groups as $group)
    <option value="{{ $group->id }}">{{ $group->name }}</option>
    @endforeach
</select>
                        </div>
                            <div class="mb-1">
                                <label for="imei_number" class="form-label">IMEI Number</label>
                                <input type="text" class="form-control" id="imei_number" name="imei_number" required>
                            </div>

                            <div class="mb-1" style="display: none">
                                <label for="availability" class="form-label">Availability</label>
                                <select class="form-control" id="availability" name="availability" required>
                                    <option value="Available">Available</option>
                                    <option value="Sold">Sold</option>
                                </select>
                            </div>



                            <div class="mb-1">
                                <label for="sim_lock" class="form-label">SIM Lock</label>
                                <select class="form-control" id="sim_lock" name="sim_lock" required>
                                    <option value="J.V">J.V</option>
                                    <option value="PTA">PTA</option>
                                    <option value="Non-PTA">Non-PTA</option>
                                </select>
                            </div>
                            <div class="mb-1" style="display: none">
                                <label for="is_approve" class="form-label">SIM Lock</label>
                                <select class="form-control" id="is_approve" name="is_approve">
                                    <option value="Approved">Approved</option>
                                    <option selected value="Not_Approved">Not_Approved</option>

                                </select>
                            </div>

                            <div class="mb-1">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" class="form-control" id="color" name="color" required>
                            </div>

                            <div class="mb-1">
                                <label for="storage" class="form-label">Storage</label>
                                <input type="text" class="form-control" id="storage" name="storage" required>
                            </div>
                            <div class="mb-1">
                                <label for="battery_health" class="form-label">Battery Health</label>
                                <input type="text" class="form-control" id="battery_health" name="battery_health"
                                    required>
                            </div>

                            <div class="mb-1">
                                <label for="cost_price" class="form-label">Cost Price</label>
                                <input type="number" class="form-control" id="cost_price" name="cost_price" required>
                            </div>

                            <div class="mb-1">
                                <label for="selling_price" class="form-label">Selling Price</label>
                                <input type="number" class="form-control" id="selling_price" name="selling_price"
                                    required>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                                <i class="feather icon-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- End Edit Modal --}}

<div class="app-content content">
    @if (session('success'))
                    <div class="alert alert-success" id="successMessage">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('danger'))
                    <div class="alert alert-danger" id="dangerMessage" style="color: red;">
                        {{ session('danger') }}
                    </div>
                @endif

        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                {{-- Filter Section start --}}

                   <div class="ml-1">
                <form method="GET" action="{{ route('totalshopmobile') }}" class="mb-3 d-flex align-items-center">
                     <select class="form-control" id="nameSelect" name="mobile_name_id" >
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
<select class="form-control" name="group_id" >
    <option value="">Select Group</option>
    @foreach($groups as $group)
        <option value="{{ $group->id }}" {{ request('group_id') == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
    @endforeach
</select>

   <select class="form-control" name="availability" >
    <option value="">All</option>

                                    <option value="Sold">Sold</option>
                                    <option value="Available">Available</option>
                                    <option value="Pending">Pending</option>
                                </select>
                                <select class="form-control" name="user_id" >
    <option value="">Select Shop</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
    @endforeach
</select>
                    
                    <button type="submit" class="btn btn-primary mx-1">Filter</button>
                    <a href="{{ route('totalshopmobile') }}" class="btn btn-secondary mx-1">Reset</a>
                </form>
            </div>
                {{-- Filter Section End --}}


                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 latest-update-tracking mt-1">
                    <div class="card">
                        <div class="card-header latest-update-heading d-flex justify-content-between">
                            <h4 class="latest-update-heading-title text-bold-500">All Shop Mobiles</h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" id="mobileTable">
                                <thead>
                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        <th>Added at</th>
                                        <th>Mobile Name</th>
                                        <th>Owner Name</th>
                                        <th>Shop Name</th>
                                        <th>Company</th>
                                        <th>Group</th>
                                        <th>IMEI#</th>
                                        <th>SIM Lock</th>
                                        <th>Color</th>
                                        <th>Storage</th>
                                        <th>Battery Health</th>
                                        <th>Cost Price</th>
                                        <th>Selling Price</th>
                                        <th>Availability</th>
                                        <th>Action</th>

                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mobile as $key)
                                        <tr>
                                            {{-- <td>{{ $key->id }}</td> --}}
                                            {{-- <td>{{ $key->created_at }}</td> --}}
                                            <!--<td>{{ \Carbon\Carbon::parse($key->created_at)->tz('Asia/Karachi')->format('d h:i A, M ,Y') }}</td>-->
                                           <td>{{ \Carbon\Carbon::parse($key->created_at)->format(' Y-m-d / h:i ') }}</td>
                                           <!--<td>{{ \Carbon\Carbon::parse($key->created_at)->diffForHumans() }}</td>-->







                                          <td>
    @if(empty($key->mobile_name_id))
        {{ $key->mobile_name }}
    @elseif($key->mobileName)
        {{ $key->mobileName->name }}
    @else
        N/A
    @endif
</td>
<td>{{ $key->original_owner->name ?? 'N/A' }}</td>
<td>{{ $key->user->name ?? 'N/A' }}</td>
                                           <td>{{ $key->company->name ?? 'N/A' }}</td>
<td>{{ $key->group->name ?? 'N/A' }}</td>

                                            <td>{{ $key->imei_number }}</td>
                                            <td>{{ $key->sim_lock }}</td>
                                            <td>{{ $key->color }}</td>
                                            <td>{{ $key->storage }}</td>
                                            <td>{{ $key->battery_health }}</td>
                                            <td>{{ $key->cost_price }}</td>
                                            <td>{{ $key->selling_price }}</td>
                                            <td>
                                                <a href="" onclick="sold({{ $key->id }})"
                                                    data-toggle="modal" data-target="#exampleModal3">
                                                    <span class="badge badge-success">{{ $key->availability }}</span>

                                                </a>

                                            </td>
                                            <td>
                                                <a href="" onclick="edit({{ $key->id }})"
                                                    data-toggle="modal" data-target="#exampleModal1">
                                                    <i class="feather icon-edit"></i></a> 
                                               
                                            </td>
                                            
                                           
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
            $('#nameSelect').select2({
                placeholder: "Select a Mobile Name",
                allowClear: true,
                width: '100%' // Optional to make it responsive
            });
        });
     //Start dataTable

        $(document).ready(function() {
            $('#mobileTable').DataTable({
                order: [
                    [0, 'desc']
                ]
            });
        });
        //End dataTable

         //  Edit Function
        function edit(value) {
            console.log(value);
            var id = value;
            $.ajax({
                type: "GET",
                url: '/editmobile/' + id,
                success: function(data) {
                   

                    $("#editmobile").trigger("reset");

                    $('#id').val(data.result.id);
if (data.result.mobile_name_id) {
    // For new entries, select the correct option in the dropdown
    $('#edit_mobile_name_id').val(data.result.mobile_name_id);
} else {
    // For old entries, add the plain name as a temporary option and select it
    let $select = $('#edit_mobile_name_id');
    // Remove any old temp option to avoid duplicates
    $select.find('option.temp-mobile-name').remove();
    // Add new temp option and select it
    $select.prepend('<option class="temp-mobile-name" value="">' + data.result.mobile_name + '</option>');
    $select.val('');
}

$('#edit_company_id').val(data.result.company_id);

// Group
$('#edit_group_id').val(data.result.group_id);

                    $('#imei_number').val(data.result.imei_number);
                    $('#sim_lock').val(data.result.sim_lock);
                    $('#color').val(data.result.color);
                    $('#battery_health').val(data.result.battery_health);
                    $('#storage').val(data.result.storage);
                    $('#cost_price').val(data.result.cost_price);
                    $('#availability').val(data.result.availability);
                    $('#selling_price').val(data.result.selling_price);


                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        // End Edit Function
</script>


@endsection
