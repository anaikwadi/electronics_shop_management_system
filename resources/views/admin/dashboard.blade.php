@extends('layouts.adminpages') 

@section('content')
      
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      <div class="row" id="report4">
        @role(['superadministrator','administrator'])    
          <div class="col-md-3">
              <div class="card text-center social-bottom sb-fb">
                  <i class="fa fa-cloud-download"></i>
                  <div>{{$n_users}}</div>
                  <p>Users</p>
              </div>
          </div>

          <div class="col-md-3">
              <div class="card text-center social-bottom sb-tw">
                  <i class="fa fa-shopping-cart"></i>
                  <div>{{$n_roles}}</div>
                  <p>Roles</p>
              </div>
          </div>

          <div class="col-md-3">
              <div class="card text-center social-bottom sb-gp">
                  <i class="fa fa-thumbs-o-up"></i>
                  <div>{{$n_perms}}</div>
                  <p>Permissions</p>
              </div>
          </div>
        @endrole

          <div class="col-md-3">
              <div class="card text-center social-bottom sb-fb">
                  <i class="fa fa-cubes"></i>
                  <div>{{$n_logged}}</div>
                  <p>Logged In</p>
              </div>
          </div>
          
      </div>
@role(['superadministrator','administrator'])    
<br><br>
      <div class="row" id="report4">

              <div class="col-md-6">
                  <h1>Purchase From Vendor of This Month </h1>
                    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                    <script type="text/javascript">
                      google.load("visualization", "1", {packages:["corechart"]});
                      google.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Task', 'Hours per Day'],
                         
                          @php  
                          foreach($vendors as $vendor_name)
                          {  $i =0;
                              foreach($purchase_report as $item){
                                  if($vendor_name->id == $item->vendor_id){
                                    $i = $i + $item->total;
                                  }
                              }
                              @endphp
                            ['@php echo $vendor_name->name; @endphp',   @php echo $i @endphp],
                        @php  } @endphp

                        ]);
                
                        var options = {
                        //   title: 'My Daily Activities',
                          is3D: true,
                        };
                
                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                      }
                    </script>
                    <div id="piechart_3d" style="width: 100%; height: 500px;"></div>
                   
              </div>

              <div class="col-md-6">
                    <h1>Sale of This Month </h1>
                    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                    <script type="text/javascript">
                      google.load("visualization", "1", {packages:["corechart1"]});
                      google.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Task', 'Hours per Day'],
                          @php  
                          foreach($Customers as $cust_name)
                          {  $i =0;
                              foreach($sale_items as $item){
                                  if($cust_name->id == $item->customer_id){
                                    $i = $i + $item->total;
                                  }
                              }
                              @endphp
                            ['@php echo $cust_name->name; @endphp',   @php echo $i @endphp],
                        @php  } @endphp
                        ]);
                
                        var options = {
                        //   title: 'My Daily Activities1',
                          is3D: true,
                        };
                
                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d1'));
                        chart.draw(data, options);
                      }
                    </script>
                    <div id="piechart_3d1" style="width: 100%; height: 500px;"></div>
                </div>
      </div>


      <br><br>
      <div class="row" id="report4">
                <div class="col-md-6">
                    <h1>Paid Amount of This Month From Customer </h1>
                    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                    <script type="text/javascript">
                      google.load("visualization", "1", {packages:["corechart2"]});
                      google.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Task', 'Hours per Day'],
                          @php  
                          foreach($Customers as $cust_name)
                          {  $i =0;
                              foreach($sale_items as $item){
                                  if($cust_name->id == $item->customer_id){
                                    $i = $i + $item->paid_amount;
                                  }
                              }
                              @endphp
                            ['@php echo $cust_name->name; @endphp',   @php echo $i @endphp],
                        @php  } @endphp
                        ]);
                
                        var options = {
                        //   title: 'My Daily Activities1',
                          is3D: true,
                        };
                
                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
                        chart.draw(data, options);
                      }
                    </script>
                    <div id="piechart_3d2" style="width: 100%; height: 500px;"></div>
                </div>

                <div class="col-md-6">
                    <h1>Balance Amount of This Month From Customer </h1>
                    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                    <script type="text/javascript">
                      google.load("visualization", "1", {packages:["corechart3"]});
                      google.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Task', 'Hours per Day'],
                          @php  
                          foreach($Customers as $cust_name)
                          {  $i =0;
                              foreach($sale_items as $item){
                                  if($cust_name->id == $item->customer_id){
                                    $i = $i + $item->balance_amount;
                                  }
                              }
                              @endphp
                            ['@php echo $cust_name->name; @endphp',   @php echo $i @endphp],
                        @php  } @endphp
                        ]);
                
                        var options = {
                        //   title: 'My Daily Activities1',
                          is3D: true,
                        };
                
                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d3'));
                        chart.draw(data, options);
                      }
                    </script>
                    <div id="piechart_3d3" style="width: 100%; height: 500px;"></div>
                </div>
      </div>
      @endrole

@endsection