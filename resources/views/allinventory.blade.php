@extends('user_navbar')
@section('content')

 {{-- Transfer Modal --}}
 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel2">Transfer Mobile</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             <form class="form" id="transferMobile" action="{{ route('transferMobile') }}" method="post"
                 enctype="multipart/form-data">
                 @csrf

                 <div class="form-body">

                     <div class="mb-1">
                         <label for="mobile_name" class="form-label">Mobile Name</label>
                         <input class="form-control" type="hidden" name="mobile_id" id="tid">

                         <input type="text" class="form-control" id="tmobile_name" name="mobile_name"
                             disabled>
                     </div>



                     <div class="mb-1">
                         <label for="sim_lock" class="form-label">Transfer To</label>
                         <select class="form-control" id="to_user_id" name="to_user_id" required>
                             @foreach ($users as $user)
                                 <option value="{{ $user->id }}">{{ $user->name }}</option>
                             @endforeach
                         </select>
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
{{-- End Transfer Modal --}}


    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
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

                   {{-- Filter Section start --}}

                   <div class="ml-1">
                <form method="GET" action="{{ route('allinventory') }}" class="mb-3 d-flex align-items-center">
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
                    

                    
                    <button type="submit" class="btn btn-primary mx-1">Filter</button>
                    <a href="{{ route('allinventory') }}" class="btn btn-secondary mx-1">Reset</a>
                </form>
            </div>
                {{-- Filter Section End --}}

                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 latest-update-tracking mt-1">
                    <div class="card">
                        <div class="card-header latest-update-heading d-flex justify-content-between">
                            <h4 class="latest-update-heading-title text-bold-500">All Mobiles</h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Added at</th>
                                        <th>Mobile Name</th>
                                        <th>IMEI#</th>
                                        <th>SIM Lock</th>
                                        <th>Color</th>
                                        <th>Storage</th>
                                        <th>Battery Health</th>
                                        <th>Battery Cycle</th>
                                        <th>Description</th>
                                        <th>Cost Price</th>
                                        <th>Selling Price</th>
                                        <th>Availability</th>
                                        <th>Received From</th>
                                        <th>Received Date</th>
                                        <th>Transfer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $item)
                                        @if ($item instanceof App\Models\Mobile)
                                            <tr>
                                                <!--<td>{{ \Carbon\Carbon::parse($item->created_at)->tz('Asia/Karachi')->format('M d, Y, h:i A') }}-->
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format(' Y-m-d / h:i ') }}</td>
                                                </td>
                                                         <td>
    @if(empty($item->mobile_name_id))
        {{ $item->mobile_name }}
    @elseif($item->mobileName)
        {{ $item->mobileName->name }}
    @else
        N/A
    @endif
</td>
                                                <td>{{ $item->imei_number }}</td>
                                                <td>{{ $item->sim_lock }}</td>
                                                <td>{{ $item->color }}</td>
                                                <td>{{ $item->storage }}</td>
                                                <td>{{ $item->battery_health }}</td>
                                                <td>{{ $item->battery_cycle }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->cost_price }}</td>
                                                <td>{{ $item->selling_price }}</td>
                                                <td>
                                                    <a href="#">
                                                        <span class="badge badge-primary">{{ $item->availability }}</span>
                                                    </a>
                                                </td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td><a href="" onclick="transfer({{ $item->id }})"
                                                    data-toggle="modal" data-target="#exampleModal2">
                                                    <i class="fa fa-exchange" style="font-size: 20px"></i></a>
                                            </td>
                                            </tr>
                                        @elseif ($item instanceof App\Models\TransferRecord)
                                            <tr>
                                                <!--<td>{{ \Carbon\Carbon::parse($item->mobile->created_at)->tz('Asia/Karachi')->format('M d, Y, h:i A') }}-->
                                                 <td>{{ \Carbon\Carbon::parse($item->mobile->created_at)->format(' Y-m-d / h:i ') }}</td>
                                                </td>
                                                                          <td>
    @if(empty($item->mobile->mobile_name_id))
        {{ $item->mobile->mobile_name }}
    @elseif($item->mobile->mobileName)
        {{ $item->mobile->mobileName->name }}
    @else
        N/A
    @endif
</td>
                                                <td>{{ $item->mobile->imei_number }}</td>
                                                <td>{{ $item->mobile->sim_lock }}</td>
                                                <td>{{ $item->mobile->color }}</td>
                                                <td>{{ $item->mobile->storage }}</td>
                                                <td>{{ $item->mobile->battery_health }}</td>
                                                 <td>{{ $item->mobile->battery_cycle }}</td>
                                                <td>{{ $item->mobile->description }}</td>
                                                <td>{{ $item->mobile->cost_price }}</td>
                                                <td>{{ $item->mobile->selling_price }}</td>
                                                <td>
                                                    <a href="#">
                                                        <span
                                                            class="badge badge-primary">{{ $item->mobile->availability }}</span>
                                                    </a>
                                                </td>
                                                <td>{{ $item->fromUser->name }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td><a href="" onclick="transfer({{ $item->mobile->id }})"
                                                        data-toggle="modal" data-target="#exampleModal2">
                                                        <i class="fa fa-exchange" style="font-size: 20px"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 latest-update-tracking mt-1">
                    <div class="card">
                        <div class="card-header latest-update-heading d-flex justify-content-between">
                            <h4 class="latest-update-heading-title text-bold-500">Total Credit Cost</h4>
                            <h3>Rs <strong>{{ $totalCostPrice }}</strong></h3>
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
        // Transfer Function
        function transfer(value) {
            console.log(value);

            var id = value;
            $.ajax({
                type: "GET",
                url: '/findmobile/' + id,
                success: function(data) {
                    $("#transfermobile").trigger("reset");

                    $('#tid').val(data.result.id);
                                                                         $('#tmobile_name').val(data.result.mobile_name_display || '');

                    // console.log(data.result.mobile_name);


                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }
        // End Transfer Function

        //Message Time Out
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 5000); // 15 seconds in milliseconds
        //End Message Time Out

        //Message Time Out
        setTimeout(function() {
            document.getElementById('dangerMessage').style.display = 'none';
        }, 5000); // 15 seconds in milliseconds
        //End Message Time Out
    </script>
@endsection
