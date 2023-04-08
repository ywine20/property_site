 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 <div class="content-wrapper">
     <div class="content-body">
         <div class="row my-1">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="d-flex justify-content-between align-items-center">
                             <div>Voucher</div>
                             <a href="" class="btn btn-primary btn-sm" title="add new">
                                 <i class="la la-plus-circle"></i>
                             </a>
                         </div>
                         <form action="">
                             <input type="text" class="form-control my-1 col-4 float-right" placeholder="search" name="q">
                         </form>
                         <div class="table-responsive">
                             <table>
                                 <tr>
                                     <td>Name</td>
                                     <td>{{$products->name}}</td>
                                 </tr>
                                 <tr>
                                     <td>price</td>
                                     <td>{{$products->price}}</td>
                                 </tr>
                                 <tr>
                                     <td>Voucher</td>
                                     <td>{{$vouchers->code}}</td>
                                 </tr>
                             </table>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>