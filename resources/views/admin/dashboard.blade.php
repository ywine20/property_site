@extends('admin.master')


@section('content')
<!--                start content-->
<div class="content">
    <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
        <div class="w-100 min-vh-100">
            <div class="row g-0 d-flex justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="mt-5 mb-3 px-3">
                        <div class="w-100">
                            <div class="card bg-secondary border-0 rounded rounded-2 overflow-hidden w-100">
                                <div class="card-body bg-secondary">
                                    <h5 class="text-primary text-center mb-5">Monthly Visitors & Customers From SMT Website</h5>
                                    <div class="w-100" style="height: 350px">
                                        <canvas id="myChart" style="width: 100%;height: 100%"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class=" d-flex flex-column justify-content-center align-items-center">
                        <div class="card w-75 bg-secondary py-4 px-3 border-0 my-2">
                            <div class="card-body text-primary d-flex flex-column justify-content-center align-items-center">
                                <h4 class="">
                                    <i class="bi bi-people-fill"></i>
                                    Total Visitors
                                </h4>
                                <span class="fw-bold fs-2">{{\App\Models\Visitor::all()->count()}}+</span>
                            </div>
                        </div>
                        <div class="card w-75 bg-secondary py-4 px-3 border-0 my-2">
                            <div class="card-body text-success d-flex flex-column justify-content-center align-items-center">
                                <h4 class="">
                                    <i class="bi bi-people-fill"></i>
                                    Total Customers
                                </h4>
                                <span class="fw-bold fs-2">{{\App\Models\User::all()->count()}}+</span>
                            </div>
                        </div>
                        <div class="card w-75 bg-secondary py-4 px-3 border-0 my-2">
                            <div class="card-body text-info d-flex flex-column justify-content-center align-items-center">
                                <h4 class="">
                                    <a href="#" class="text-info text-decoration-none">
                                        <i class="bi bi-flag"></i>
                                        Total Projects
                                    </a>
                                </h4>
                                <span class="fw-bold fs-2">
                                    <a href="#" class="text-info text-decoration-none">
                                        {{\App\Models\Project::all()->count()}}+
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 px-3 my-5">
                    <div class="card bg-secondary table-card mb-5">
                        <div class="card-body px-0">
                            <div class="w-100 px-3 mb-3 d-flex justify-content-between align-items-center">
                                <h3 class="text-white">Top 10 Projects</h3>
                                <a href="{{route('project.index')}}" title="show project list">
                                    <i class="bi bi-list text-primary fs-3"></i>
                                </a>
                            </div>
                            <div class="w-100">
                                <table id="table_Project_In_Dashboard" class="w-100 display nowrap row-border table table-bordered align-middle table-hover mb-0">
                                    <thead class="">
                                        <tr class="bg-primary text-secondary">
                                            <th class="text-center">No.</th>
                                            <th class="">Name</th>
                                            <th class="" style="max-width: 300px">Address</th>
                                            <th class="">Range</th>
                                            <th class="">Category</th>
                                            <th class="text-center">Viewer</th>
                                            <th class="text-center" data-orderable="false">Action</th>
                                            <th class="text-nowrap text-center">Modify Date</th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-secondary text-white">
                                        @foreach($projects as $keys=>$project)
                                        <tr>
                                            <th scope="row" class="text-center">{{++$keys}}</th>
                                            <td class="text-start text-nowrap text-uppercase">{{$project->project_name}}</td>
                                            <td class="text-start text-capitalize overflow-hidden" style="white-space:normal;min-width:300px;max-width: 300px;height: 3em !important; text-overflow: ellipsis;">
                                                <small>
                                                    No({{$project->hou_no}}), {{$project->street}} Street, {{$project->ward}} Ward,
                                                    @foreach ($towns as $t)
                                                    @if($t->id==$project->township_id)
                                                    {{$t->name}} TownShip,
                                                    @endif
                                                    @endforeach

                                                    @foreach ($cities as $c)
                                                    @if($c->id==$project->city_id)
                                                    {{$c->name}},
                                                    @endif
                                                    @endforeach
                                                </small>
                                            </td>
                                            <td class="text-start text-nowrap">{{$project->lower_price}} - {{$project->upper_price}}</td>
                                            <td class="text-start text-nowrap text-capitalize">
                                                @foreach ($categories as $c)
                                                @if($c->category_id==$project->category_id)
                                                {{$c->category_name}}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center text-nowrap ">
                                                {{$project->viewer}}
                                            </td>


                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <div class="mx-1">
                                                        <a href="{{ route('project.detail',$project->id) }}" class="  info-icon px-2 py-1">
                                                            <i class="bi bi-info-circle text-info fa-fw"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fs-6 text-center text-nowrap">
                                                    {{$project->updated_at->format('d-M-Y')}}<br>
                                                    <small>{{$project->updated_at->diffForHumans()}}</small>
                                                </div>
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
    </div>
    <!--end content-->
</div>



@endsection


@section('script')

<script>
    //logoutt
    let logOut = document.querySelector('#logout');
    if (logOut) {
        logOut.addEventListener('click', (e) => {
            e.preventDefault();
            logout();
        })
    }
</script>
@endsection
@push('customScript')



<script>

</script>
<script>
    // $(document).ready(function () {
    //     var t = $('#table_Project_In_Dashboard').DataTable({
    //         scrollX: true,
    //         responsive: true,
    //         paging: false,
    //         searching:false,
    //         ordering: true,
    //         info: false,
    //         order: [[1, 'asc']],
    //     });
    // });
</script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo $months; ?>,
            datasets: [{
                    label: 'Visitors',
                    data: <?php echo $visitorData; ?>,
                    backgroundColor: 'rgb(245 204 122)',
                    borderColor: 'rgb(245 204 122)',
                    borderWidth: 1
                },
                {
                    label: 'Users',
                    data: <?php echo $userData; ?>,
                    backgroundColor: 'rgb(85 216 95)',
                    borderColor: 'rgb(85 216 95)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>


@endpush