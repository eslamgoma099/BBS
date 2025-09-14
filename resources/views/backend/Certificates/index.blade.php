@extends('backend.layouts.backend')

@section('content')

    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 col-lg-12 col-sm-12 align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0" >Investment Certificates</h4>
                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}" >Dashboard</a> </li>
                            <li class="breadcrumb-item" style="color:#D6AD38!important">Investment Certificates</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->
        
        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12  mt-3">
                 <!--@include('notification')-->
                
                <div class="card">

                    <div class="card-body">

                        <div class="row justify-content-md-center">
                            @foreach($plans as $item)
                             
                            <div class="col-12 col-md-4 col-xl-3 mb-4 mb-lg-0" style="background-image:url('/images/Group.png');
                                    background-repeat: no-repeat;
                                    background-position: 52% 40%;
                                }
                                                                    ">
                                <div class="price-table   text-center  p-3" style="background-color: #262e4173 !important;">
                                    <div > 
                                                                        <div >

                                    <h2 class="font-weight-bold text_gold" style="color:#D6AD38!important">{{ $item->name }} 
                                    </h2>
                                    <div class="price-block text-wrap" style="font-size: 20px">${{ $item->amount }}
                                    <br>

                                    </div>
                                    </div>
                                     </div>
                                    <div class="divider-default my-3"></div>
                                    <ul class="list-unstyled text-left">
                                        @foreach ($item->features as $feature)
                                            <li class="mb-3 list_plan"><i style="margin: 5px;color:#D6AD38!important" class="fa fa-check text_gold"></i> {{ $feature }}</li>
                                        @endforeach
                                        
                                            <li class="text-center" style="margin-top: 35px;
                                            "><a href="#" data-toggle="modal" data-target="#joinPlanModal-{{ $item->id }}" class="btn btn-primary btn-circle btn-default mt-3"
                                                style="background-color:#D6AD38!important;border-color:#D6AD38!important;"
                                                >BUY CERTIFICATE NOW</a></li>
                                        
                                    </ul>
                                   
                                </div>
                            </div>
                        

                               

                                  <!-- Modal -->
                                  <div class="modal fade" id="joinPlanModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="joinPlanModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="joinPlanModalTitle">{{ $item->name }} @ {{ number_format($item->amount) }} USD</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <form action="{{ route('backend.certificates.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}" />
                                        <div class="modal-body">
                                                <div class="row mt-2 mb-2">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <h5 class="font-weight-light">Account Balance : {{ number_format(auth()->user()->balance)}} USD </h5>
                                                                    @if (auth()->user()->balance < $item->amount)
                                                                        <p class="text-danger">Insufficient balance! <br />Please fund your account to continue.</p>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    @if (auth()->user()->balance > $item->amount)
                                                        <div class="col-12 mt-2 pb-2">
                                                            <section class="col-md-12 border border-light rounded">
                                                                <p>Duration</p>
                                                               <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="duration" id="exampleRadios1" value="1" checked>
                                                                  <label class="form-check-label" for="exampleRadios1">
                                                                    1 year
                                                                  </label>
                                                                </div>
                                                                <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="duration" id="exampleRadios2" value="3">
                                                                  <label class="form-check-label" for="exampleRadios2">
                                                                    3 years
                                                                  </label>
                                                                </div>
                                                                <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="duration" id="exampleRadios3" value="5">
                                                                  <label class="form-check-label" for="exampleRadios3">
                                                                    5 years
                                                                  </label>
                                                                </div>
                                                                        </section>
                                                                        <section class="col-md-12 border border-light rounded mt-4">
                                                                <p>Distribution Period</p>
                                                               <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="distribution_period" id="exampleRadios1" value="1" checked>
                                                                  <label class="form-check-label" for="exampleRadios1">
                                                                    monthly
                                                                  </label>
                                                                </div>
                                                                <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="distribution_period" id="exampleRadios2" value="2">
                                                                  <label class="form-check-label" for="exampleRadios2">
                                                                    quarterly
                                                                  </label>
                                                                </div>
                                                                <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="distribution_period" id="exampleRadios3" value="3">
                                                                  <label class="form-check-label" for="exampleRadios3">
                                                                    Semi-annually
                                                                  </label>
                                                                </div>
                                                                <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="distribution_period" id="exampleRadios3" value="4">
                                                                  <label class="form-check-label" for="exampleRadios3">
                                                                    annually
                                                                  </label>
                                                                </div>
                                                                        </section>
                                                           
                                                            
                                                            <section class="col-md-12 border border-light rounded mt-4">
                                                                <h4>
                                                                    Terms and Conditions
                                                                </h4>
                                                                <p class="card-text m-2 " style="font-size: 20px">
                                                                    . All investment certificates of different financial values ​​may not be redeemed until 6 months have passed from the time of their activation.  
                                                                        . In the event that you wish to redeem the certificate before its expiration date, the value of the calculated return during the certificate activation period (after 6 months) will be deducted and 35% of the original certificate value will be deducted.
                                                                </p>
                                                                <div class="form-check">
                                                                  <input class="form-check-input" type="checkbox" name="distribution_period" id="exampleRadios3" required 
                                                                  value="1">
                                                                  <label class="form-check-label" for="exampleRadios3">
                                                                     I agree to the previous terms and conditions
                                                                  </label>
                                                                </div>
                                                            </section>
                                                             <section class="col-md-12 border border-light rounded mt-4">
                                                                <p class="card-text m-2 " style="font-size: 20px">Are you sure you want to activate this Certificate?</p>
                                                            </section>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button @if(auth()->user()->balance < $item->amount) disabled @endif type="submit" class="btn btn-primary">Activate Certificate</button>
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>

                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
            
            <div class="col-3">
                <div class="price-table   text-center  p-3" style="background-color: #262e4173 !important;">
                    <div> 
                        <!--<img src="{{asset('/images/Group.png')}}" alt="img" />-->
                        <div class="row" style="text-align: start;">
                            <h5 class="col-8 font-weight-bold text_gold" style="color:#D6AD38!important">Count Certificatiion</h5>
                            <div class="col-4 price-block text-wrap" style="font-size: 20px;    text-align: center;">{{count($certificates["data"])}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="price-table   text-center  p-3" style="background-color: #262e4173 !important;">
                    <div> 
                        <div class="row" style="text-align: start;">
                            <h5 class="col-8 font-weight-bold text_gold" style="color:#D6AD38!important">Total Profit</h5>
                            <div class="col-4 price-block text-wrap p-0" style="font-size: 20px">${{$certificates["profit"]}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="price-table   text-center  p-3" style="background-color: #262e4173 !important;">
                    <div> 
                        <div class="row" style="text-align: start;">
                            <h5 class="col-10 font-weight-bold text_gold" style="color:#D6AD38!important">Total Certicited Accepted</h5>
                            <div class="col-2 price-block text-wrap" style="font-size: 20px">{{$certificates["accepted"]}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="price-table   text-center  p-3" style="background-color: #262e4173 !important;">
                    <div> 
                        <div class="row" style="text-align: start;">
                            <h5 class="col-10 font-weight-bold text_gold" style="color:#D6AD38!important">Total Certicited Rejected:</h5>
                            <div class="col-2 price-block text-wrap" style="font-size: 20px">{{$certificates["rejected"]}}</div>
                        </div>
                    </div>
                </div>
            </div>

      <div class="col-12">
            <certificates 
                 :certificates='@json($certificates["data"])'
        >

        </certificates>
      </div>

        </div>
        <!-- END: Card DATA-->
    </div>
    

@endsection
@section('js')
     @if(session('message'))
                      
                                    <script>
                                      swal("Good job!", "{{session('message')}}", "success");
                                     </script>
                                   
                            
        @endif
@endsection
    
