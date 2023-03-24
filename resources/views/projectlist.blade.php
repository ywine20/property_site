@extends('master')

@section('title', 'Project List - SMT')
@section('css')
<!-- {{-- <link rel="stylesheet" href="{{asset('css/project-list.css')}}">--}} -->

@endsection

@section('content')
<!-- main -->
<main class="pt-5">
  <div class="container px-4 px-md-0">
    <!-- <h1 class="py-5">Project List</h1> -->



    <!-- start filter -->

    <form action="{{ route('advance') }}" method="GET">
    <div id="search" class="pt-5">
        <!-- @csrf -->
        <div class="input-group mb-4">
          @if(isset($findSearch))
          <input type="text" name="search" maxlength="50" class="form-control" placeholder="Searching" value={{$findSearch}} />
          @else
          <input type="text" name="search" maxlength="50" class="form-control" placeholder="Searching" />
          @endif
          <button class="btn btn-secondary px-4" type="submit" id="search-button-addon2">
            <i class="bi bi-search text-gold"></i>
          </button>
        </div>
        <div id="filter">
          <div class="mb-4">
            <div class="row g-0">
              <div class="col-12 col-lg-12 mx-auto">
                <div class="row g-4 g-lg-2 mx-auto">
                  <div class="col-12 col-lg-5 align-items-center d-flex flex-column flex-md-row justify-content-center">
                    <select id="chooseCategory" class="form-select mb-3 mb-md-0 me-0 me-lg-3 me-md-1 w-100" onchange="getValue('chooseCategory','result-category')" aria-label=".form-select-sm example" name="category">
                      <option value="">Choose Category</option>
                      @if(!empty($categories))
                      @foreach ($categories as $c)
                      <option value="{{$c->category_id}}" {{ $c->category_name == $findCat ? 'selected':'' }}>
                        {{$c->category_name}}
                      </option>
                      @endforeach
                      @endif
                    </select>
                    <select id="chooseTownShip" class="form-select me-lg-3 ms-0 ms-md-1" onchange="getValue('chooseTownShip','result-township')" aria-label=".form-select-sm example" name="township">
                      <option value="">Choose TownShips</option>
                      @if(!empty($towns))
                      @foreach ($towns as $t)
                      <option value="{{$t->id}}" {{ $t->name == $findTon ? 'selected':'' }}>{{$t->name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  <!-- Price Range -->
                  <div class="col-12 col-lg-5">

                    <div class="">
                      <div class="row row-cols-2 mb-0 gx-2 price-input ">
                        <div class="col">
                          <div class="row g-0">
                            <label for="inputMin" class="col-sm-2 col-form-label text-center pt-0 pt-md-2">Min</label>
                            <div class="col-sm-10">
                              @isset($finPro)
                              <input type="number" name="min_price" class="form-control input-min" id="inputMin" value={{$finPro}}>
                              @else
                              <input type="number" name="min_price" class="form-control input-min" id="inputMin" value="">
                              @endisset
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="row g-0">
                            <label for="inputMax" class="col-sm-2 col-form-label text-center pt-0 pt-md-2">Max</label>
                            <div class="col-sm-10">
                            @isset($findPro)
                              <input type="number" name="max_price" class="form-control input-max" id="inputMax" value={{$findPro}}>
                              @else
                              <input type="number" name="max_price" class="form-control input-max" id="inputMax" value="">
                              @endisset                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="slider">
                      <div class="progress"></div>
                    </div>
                    <div class="range-input">
                      <input type="range" class="range-min" min="100" max="5000" value="1000" step="100" id="rangeMin">
                      <input type="range" class="range-max" min="100" max="5000" value="3000" step="100" id="rangeMax">
                    </div> -->
                    </div>

                  </div>
                  <!--End Price Range -->

                  <div class="col-12 col-lg-2">
                    <button class="btn btn-secondary text-primary filter-btn ms-0 ms-lg-2 text-nowrap" type="submit">
                      <i class="bi bi-funnel text-primary"></i>
                      Filter
                    </button>
                  </div>

                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- end filter -->

    <!--start Result -->
    <div id="result" class="">

      <div class="result-count mb-4">
        <div class="row">
          <div class="col-12 d-flex justify-content-between">
            <div class="">
              <span class="fs-4 me-3">Result : @if(!empty($projects)) {{count($projects)}} @endif</span>
              <div class="text-black-50 d-inline-block result-text">
                @isset($findSearch)
                <span id="">{{$findSearch}}</span>
                @endisset
                @isset($findCat)
                <i class="bi bi-chevron-right"></i>
                <span id="">{{$findCat}}</span>
                @endisset
                @isset($findTon)
                <i class="bi bi-chevron-right"></i>
                <span id=""><?php echo $findTon; ?></span>
                @endisset
                @isset($findPro)
                <i class="bi bi-chevron-right"></i>
                <span class="">{{$finPro}}</span> Lakhs & <span class="result-maxRange">{{$findPro}}</span> Lakhs
                @endisset


                <!-- <i class="bi bi-chevron-right"></i>
                100 Lakhs & 400 Lakhs -->
              </div>
            </div>
            <div class="">
              @if(isset($findSearch) || isset($findCat) || isset($findTon) || isset($findPro))
              <a href="{{route('projectlist')}}" class="text-decoration-none fw-bold">All</a>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="result-card mb-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-2 g-md-3 mb-4 d-flex ">

          @forelse($projects as $p)
          <div class="col">
            <a href="{{ url('detail/'.$p->id) }}" class="text-decoration-none">
              <div class="project-list-card card mb-2 mb-md-0 d-flex justify-content-center align-items-center overflow-hidden border-0 shadow">
                <div class="row row-cols-1 h-100 w-100 g-0">
                  <div class="col-5 project-list-img">
                    <img src="{{ asset('images/projects/'.$p->cover) }}" class="rounded-start" alt="..." style="width:100%;height:100%;object-fit: cover;">
                  </div>
                  <div class="col-7 bg-secondary">
                    <div class="card-body  text-primary px-2 px-md-2 px-lg-2 my-0 my-lg-0">
                      <h5 class="card-title text-primary addressTitle">
                        No({{$p->hou_no}}), {{$p->street}} Street, {{$p->ward}} Ward,
                        @foreach ($towns as $t)
                        @if($t->id==$p->township_id)
                        {{$t->name}} TownShip,
                        @endif
                        @endforeach

                        @foreach ($cities as $c)
                        @if($c->id==$p->city_id)
                        {{$c->name}},
                        @endif
                        @endforeach
                      </h5>
                      <span class="fw-bold my-1 my-md-2 my-lg-2 range d-block text-primary text-truncate">{{ $p->lower_price }} - {{ $p->upper_price }} Lakhs</span>
                      <table class="table tb-sm text-gold project-card-table table-borderless mb-1">
                        <tbody>
                          <tr>
                            <td class="w-25 text-nowrap pe-2 text-primary">ID No</td>
                            <td class="text-primary">: {{ $p->project_name }}</td>
                          </tr>
                          <tr>
                            <td class="w-25 text-nowrap pe-2 text-primary">No. of Units</td>
                            <td class="text-primary">: {{ $p->layer }}</td>
                          </tr>
                          <tr>
                            <td class="w-25 text-nowrap pe-2 text-primary">Est.Sq Feet </td>
                            <td class="text-primary">: {{ $p->squre_feet }} ft<sup>2</sup></td>
                          </tr>
                        </tbody>
                      </table>
                      <span class="card-text my-0 my-lg-0 my-xl-3 list-entity text-primary">
                        @foreach ($amenities as $am)
                        @foreach($p->amenity as $pm)
                        @if($pm->id==$am->id)
                        {{ $am->amenity }},
                        @endif
                        @endforeach
                        @endforeach
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          @empty
          <div class="col-12 w-100">
            <div class="w-100 d-flex justify-content-center align-items-center py-5 border border-1 border-opacity-50 rounded">
              <h2 class="text-black-50 opacity-50">No Result To Show</h2>
            </div>
          </div>
          @endforelse
        </div>
      </div>
      {{ $projects->links() }}
    </div>
  </div>
  <!-- end Result -->
</main>
</div>
<!-- end main -->
<!-- for tablet -->

@endsection

@section('script')
<script src="/js/project-list.js"></script>
<script src="./js/script.js"></script>
{{-- <script src="./js/script.js"></script> --}}
<script>
  const subText = (text) => {
    return text.substring(0, 50) + '...';
  }


  let listEntity = document.querySelectorAll('.list-entity');
  //  console.log(listEntity.length);
  for (let i = 0; i <= listEntity.length; i++) {
    let realText = listEntity[i].innerText;
    let changeText = subText(realText);
    listEntity[i].innerText = changeText;
    // console.log('project-list = '+changeText);

  }
</script>
@endsection
@push('clientScript')
<script>
  let address = document.querySelectorAll('.addressTitle');
  const addressSubText = (text) => {
    return text.substring(0, 65) + '...';
  }
  for (let i = 0; i <= address.length; i++) {
    let realAddress = address[i].innerText;
    if (realAddress.length > 65) {
      let changeAddress = addressSubText(realAddress);
      address[i].innerText = changeAddress;

    } else {
      let changeAddress = realAddress;
      address[i].innerText = changeAddress;

    }
  }
</script>
@endpush