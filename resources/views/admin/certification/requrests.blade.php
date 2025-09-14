@extends('admin.layouts.admin-app')

@section('style')
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <span class="breadcrumb-item active"> Certification Layouts</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5"> Certification</h4>
        </div>

        <div class="br-pagebody">
            {{--  <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Add Certification
                </button>
            </p>  --}}
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"> Certification List</h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table table-bordered  responsive ">
                        <thead>
                            <tr>
                                <th class="wd-15p">S.No</th>
                                <th class="wd-15p">Certificate Name</th>
                                <th class="wd-15p">user</th>
                                <th class="wd-15p">Certificate Amount</th>
                                <th class="wd-15p">Duration</th>
                                <th class="wd-15p">Distribution Period</th>
                                <th class="wd-15p">Start Date</th>
                                <th class="wd-15p">End Date</th>
                                <th class="wd-15p">Day Profit</th>
                                <th class="wd-15p">Total Profit</th>
                                <th class="wd-15p">Expected Profit</th>
                                <th class="wd-15p">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $plan)
                                <tr>
                                    <td>{{ $plan['id'] }}</td>
                                    <td>{{ $plan['name'] }}</td>
                                    <td>
                                        <a href="/admin/users/{{ $plan['user']['id'] }}">
                                            {{ $plan['user']['email'] }}
                                        </a>
                                    </td>
                                    <td>{{ $plan['amount'] }}</td>
                                    <td>{{ $plan['duration'] }}</td>
                                    <td>{{ $plan['period'] }}</td>
                                    <td>{{ $plan['start'] }}</td>
                                    <td>{{ $plan['expired'] }}</td>
                                    <td>{{ $plan['profit'] }}</td>
                                    <td>{{ $plan['total'] }}</td>
                                    <td>{{$plan['expacted_profit']}}</td>
                                    <td>

                                        {{ $plan['status'] }}

                                    </td>
                                    <td class="text-center">


                                        @if ($plan['status'] == 'pending')
                                            <!--<form method="POST" action="{!! route('admin.certification.status') !!}" accept-charset="UTF-8">-->
                                            <!--    <input name="_method" value="POST" type="hidden">-->
                                            <!--    {{ csrf_field() }}-->
                                            <!--    <input type="hidden" name="id" value="{{ $plan['id'] }}" />-->
                                            <!--    <input type="hidden" name="status" value="1" />-->
                                            <!--    <div class="btn-group justify-center" role="group">-->
                                            <!--        <button type="submit" class="btn btn-primary" title="Delete Job">-->
                                            <!--            {{--  <span class="fa fa-trash" aria-hidden="true"></span>  --}}-->
                                            <!--            Accepted-->
                                            <!--        </button>-->
                                            <!--    </div>-->

                                            <!--</form>-->
                                            
                                                <button value-id="{{ $plan['id'] }}" class="btn btn-primary approve_request" title="Accepted">
                                                        <span class="fa fa-check" aria-hidden="true"></span>  
                                                  </button>


                                            <form method="POST" action="{!! route('admin.certification.status') !!}" accept-charset="UTF-8">
                                                <input name="_method" value="POST" type="hidden">
                                                {{ csrf_field() }}
                                                <div class="btn-group justify-center" role="group">
                                                    <input type="hidden" name="id" value="{{ $plan['id'] }}" />
                                                    <input type="hidden" name="status" value="3" />
                                                    <button type="submit" class="btn btn-danger" title="Rejected Job"
                                                        onclick="return confirm(&quot;Click Ok to Rejected Record.&quot;)">
                                                         <span class="fa fa-close" aria-hidden="true"></span>  
                                                    </button>
                                                </div>

                                            </form>

                                            <form method="POST" action="{!! route('admin.certification.destroy') !!}" accept-charset="UTF-8">
                                                <input name="_method" value="POST" type="hidden">
                                                {{ csrf_field() }}
                                                <div class="btn-group justify-center" role="group">
                                                    <input type="hidden" name="id" value="{{ $plan['id'] }}" />
                                                    <input type="hidden" name="status" value="3" />
                                                    <button type="submit" class="btn btn-danger" title="Delete Job"
                                                        onclick="return confirm(&quot;Click Ok to Deleted Record.&quot;)">
                                                         <span class="fa fa-trash" aria-hidden="true"></span> 
                                                    </button>
                                                </div>

                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->

            </div><!-- br-pagebody -->
        </div><!-- br-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->

    @section('js')
        <script src="{{ asset('lib/jquery-ui/jquery-ui.js') }}"></script>
        <script src="{{ asset('lib/jquery-switchbutton/jquery.switchButton.js') }}"></script>
        <script src="{{ asset('lib/peity/jquery.peity.js') }}"></script>
        <script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('lib/datatables-responsive/dataTables.responsive.js') }}"></script>
        <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('lib/highlightjs/highlight.pack.js') }}"></script>
        <script>
            $(function() {
                'use strict';

                $('#datatable1').DataTable({

                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    },
                    "ordering": true
                });

                $('#datatable2').DataTable({
                    bLengthChange: false,
                    searching: false,
                    "ordering": true

                });

                // Select2
                $('.dataTables_length select').select2({
                    minimumResultsForSearch: Infinity
                });

            });
        </script>

        <script>
            $(document).ready(function() {
                var max_fields = 9;
                var wrapper = $(".planFeatures");
                var add_button = $(".add_form_field");

                var x = 1;
                $(add_button).click(function(e) {
                    e.preventDefault();
                    if (x < max_fields) {
                        x++;
                        $(wrapper).append(
                            '<div><input class="form-control mt-2" type="text" name="features[]"/ required><a href="#" class="delete text-danger">Delete</a></div>'
                        ); //add input box
                    } else {
                        alert('You can only enter 9 Certification');
                    }
                });

                $(wrapper).on("click", ".delete", function(e) {
                    e.preventDefault();
                    if (x == 1) {
                        alert('The Features field is required!');
                        return false;
                    }
                    $(this).parent('div').remove();
                    x--;
                })
            });
            
            $(".approve_request").click(function(e) {
                 e.preventDefault();
                 let id = $(this).attr('value-id');
                 let avarage = prompt("Please enter Avarage", "1");
                if (avarage == null && avarage == 0) {
                  alert('faild');
                }else{
                    $.post("{{route('admin.certification.status')}}",
                     {
                         'id':id,
                         'status':'1',
                         'average':avarage,
                         '_token':"{{csrf_token()}}"
                     },
                     function(data, status){
                         alert('success');
                         location.reload(true);
                     }
                 );
                }
                
            })
        </script>
    @endsection

@endsection
