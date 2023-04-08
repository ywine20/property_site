 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 <div class="content-wrapper">
     <div class="content-body">
         <div class="row my-1">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="d-flex justify-content-between align-items-center">
                             <div>Product Table</div>
                             <a href="" class="btn btn-primary btn-sm" title="add new">
                                 <i class="la la-plus-circle"></i>
                             </a>
                         </div>
                         <form action="">
                             <input type="text" class="form-control my-1 col-4 float-right" placeholder="search" name="q">
                         </form>
                         <div class="table-responsive">
                             <!-- @if(session() -> has('msg'))
                                <div class=" alert alert-success alert-dismissable fade show">
                                    <span>{{ session()->get('msg')}}</span>
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                                @endif -->
                             <table class="table table-bordered table-hover">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Name</th>
                                         <!-- <th class="text-nowrap">Contact Person</th> -->
                                         <th>Price</th>
                                         <!-- <th>Address</th>
                                            <th>Email</th>
                                            <th>Region</th>
                                            <th>City</th>
                                            <th>Remark</th>
                                            <th class="text-nowrap">Created By</th>
                                            <th class="text-nowrap">Action</th> -->
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($products as $p)
                                     <tr>
                                         <td class="text-nowrap">{{$p->id}}</td>
                                         <td class="text-nowrap">{{$p->name}}</td>
                                         <td class="text-nowrap">{{$p->price}} USD</td>
                                         <td> <a href="{{url('/products/vouchers/' .$p->id)}}" class="btn btn-primary btn-sm" title="add new">
                                                 <i>Buy</i>
                                             </a></td>

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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>