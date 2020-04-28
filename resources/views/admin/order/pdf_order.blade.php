@extends('layouts.admin_lay')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Pick up </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">


            <table  id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                     <th>   No </th>
                    <th>   Phone & Name  </th>


                    <th>  Address     </th>

                    <th> Track Number   </th>
                    <th> Number of Orders   </th>.
                    <th>  Pick-up time  </th>
                    <th>  status  </th>
                    <th>  Delivery_boy  </th>
                 

                  
                </tr>
                </thead>
                <tbody>
                      @php
                        $i=1;
                        @endphp
                @foreach($order as $row1)
                    <tr>
                        @php(
                           $client=\App\client::find($row1->client_id)
                           )
                        @if(count($client)==0)
                        @else
                      
  <td>
      {{$i++}}

                            </td>
                            <td>
                               ({{$client->name}})<br>
                                ({{$client->phone}})<br>

                            </td>


                            <td>


                                {{$client->address}}  <br>
                                ({{$client->land}})



                            </td>

                        @endif
                       


                        <td>
                            {{$row1->track_num}}
                          

                        </td>
                        <td>
                     @php(
                            $count=count(App\sub_order::where('order_id',$row1->id)->get())
                            
                            ) {{$count}}



                        </td>

                        <td>
                            {{ date("d-M-Y ", strtotime($row1->r_date))}}

                        </td>

                      
                            <td>
                                @php(
                               $status=\App\status::find($row1->status_id)
                               )
                                @if(count($status)==0)
                                  
                                @else


                                     {{$status->name}} 
                                    
                                @endif


                            </td>
                            <td>
                                @php(
                               $boy=\App\delivery_boy::find($row1->delivery_boy_id)
                               )
                                @if(count($boy)==0)
                                   
                                @else


                                  
                                       <option value=" {{$boy->id}}" selected>  {{$boy->name}}  </option>
                                      
                                @endif


                            </td>
                          

                     


                    

                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                      <th>   Phone & Name  </th>


                    <th>  Address     </th>

                    <th> Track Number   </th>
                    <th> Number of Orders   </th>.
                    <th>  Pick-up time  </th>
                    <th>  status  </th>
                    <th>  Delivery_boy  </th>th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
        <!-- /.box-body -->
    </div>


@endsection