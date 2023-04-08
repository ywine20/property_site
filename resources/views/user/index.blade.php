<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<div class="content-wrapper">
    <div class="content-body">
        <div class="row my-1">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>Customer Table</div>
                            <a href="{{ url('user/create') }}" class="btn btn-primary btn-sm" title="add new">
                                <i class="la la-plus-circle"></i>Add New
                            </a>
                        </div>
                        <form action="">
                            <input type="text" class="form-control my-1 col-4 float-right" placeholder="search" name="q">
                        </form>
                        <div class="table-responsive">
                            @if(session() -> has('msg'))
                            <div class=" alert alert-success alert-dismissable fade show">
                                <span>{{ session()->get('msg')}}</span>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                            @endif
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th class="text-nowrap">E-mail</th>
                                        <th>Tier</th>
                                        <th>Phone</th>
                                        <th>Password</th>
                                        <th>profile_img</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $u)
                                    <tr>
                                        <td class="text-nowrap">{{$u->id}}</td>
                                        <td class="text-nowrap">{{$u->name}}</td>
                                        <td class="text-nowrap">{{$u->email}}</td>
                                        <td class="text-nowrap">{{$u->tier}}</td>
                                        <td class="text-nowrap">{{$u->phone}}</td>
                                        <td class="text-nowrap">{{$u->password}}</td>
                                        <td class="text-nowrap">{{$u->profile_img}}</td>
                                        <td class="text-nowrap">
                                            <form action="{{url('user/' .$u->id) }}" method="post">
                                                @method('delete')
                                                @csrf

                                            <a href="{{ url('user/' .$u->id. '/edit')}}" class="btn btn-primary ">Edit</a>
                                            <button class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</button>
                                            </form>
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