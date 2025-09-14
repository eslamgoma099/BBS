<div class="card pd-20 pd-xs-30 shadow-base bd-0 m-2" id="actions-details">
                        <div class="row btn-bloc">
                            <div class="col-9">
                                <div class="d-flex" style="gap:15px">
                                    <p>
                                        <bold>Count Certificatiion: </bold>{{count($certifications['data'])}}
                                    </p>
                                     <p>
                                        <bold>Total Profit: </bold>{{$certifications['profit']}}$
                                    </p>
                                    <p>
                                        <bold>Total Certicited Accepted: </bold>{{$certifications['accepted']}}
                                    </p>
                                     <p>
                                        <bold>Total Certicited Rejected: </bold>{{$certifications['rejected']}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-3" style="    text-align: right;">
                                <button data-toggle="modal" data-target="#fundCertifications" class="btn btn-info mb-2">Add certifications</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                            <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30 ">
                                <div class="table-wrapper table-responsive">
                                    <table id="datatable1" class="table table-bordered  responsive ">
                        <thead>
                            <tr>
                                <th class="wd-15p">S.No</th>
                                <th class="wd-15p">Certificate Name</th>
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
                            @foreach ($certifications['data']  as $plan)
                                <tr>
                                    <td>{{ $plan['id'] }}</td>
                                    <td>{{ $plan['name'] }}</td>
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
                                               <button  value-id="{{ $plan['id'] }}" class="btn btn-primary approve_request" title="Accepted">
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
                                </div>
                            </div>
                    </div>