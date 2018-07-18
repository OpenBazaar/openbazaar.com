<div class="Rectangle-10 clearfix">
  <div class="Page-Sub-Content">
	  
	  <div style="width:100%;">
	  
		  <div style="display:flex;flex-wrap: wrap;flex-direction: column;">
			  <div style="flex:1;">
			  	<h1>Network Statistics</h1>
			  	<p style="font-size:14px;">This data is being provided by OB1. There are always potential discrepancies when crawling distributed networks so there may be differences across other sources.</p>
			  </div>
			  
			  		  
		  </div>
		  
		  <div style="display: flex;width:100%;">
			  <div style="border:1px solid black; width:25%;margin: 0 5px;">
				  <div style="text-align: center">Total Nodes</div>
				  <div style="font-weight:bolder;font-size:50px;text-align: center">
					  <?=number_format($totalnodes)?>
				  </div>
			  </div>
			  <div style="border:1px solid black; width:25%;margin: 0 5px;">
				  <div style="text-align: center">New Nodes (24H)</div>
				  <div style="font-weight:bolder;font-size:50px;text-align: center">
					  <?=number_format($nodes24)?>
				  </div>
			  </div>
			  <div style="border:1px solid black; width:25%;margin: 0 5px;">
				  <div style="text-align: center">Merchants</div>
				  <div style="font-weight:bolder;font-size:50px;text-align: center">
					  <?=number_format($vendors)?>
				  </div>
			  </div>
			  <div style="border:1px solid black; width:25%;margin: 0 5px;">
				  <div style="text-align: center">Listings</div>
				  <div style="font-weight:bolder;font-size:50px;text-align: center">
					  <?=number_format($totallistings)?>
				  </div>
			  </div>
		  </div>
		  
		  
		  
		  <h3>New Nodes</h3>
		  <div style="width:947px;height:300px;">
		  <canvas id="NodesSeen" width="947" height="300"></canvas>
			<script>
				
			var poolColors = function (a) {
		        var pool = [];
		        for(i=0;i<a;i++){
		            pool.push(dynamicColors());
		        }
		        return pool;
		    }
		
		    var dynamicColors = function() {
		        var r = Math.floor(Math.random() * 255);
		        var g = Math.floor(Math.random() * 255);
		        var b = Math.floor(Math.random() * 255);
		        return "rgb(" + r + "," + g + "," + b + ")";
		    }
				
			var ctx = document.getElementById("NodesSeen").getContext('2d');
			var gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
			gradientStroke.addColorStop(0, '#006699');
			gradientStroke.addColorStop(1, '#009999');
			
			var myChart = new Chart(ctx, {
			    type: 'bar',
			    data: {
			        labels: [<?=sprintf("'%s'", implode("','", $nodes_x ) );?>],
			        datasets: [{
			            label: '# of nodes',
			            data: [<?=sprintf("%s", implode(", ", $nodes_y ) ); ?>],
			            backgroundColor: 
			                gradientStroke,
			            borderColor: 
			                gradientStroke,
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                }
			            }]
			        }
			    }
			});
			</script>
		  </div>
		  
		  <h3>Active Nodes by Month</h3>
		  <p>This chart shows all nodes seen by the search crawler. It's a good indication of churn.</p>
		  <div style="width:947px;height:300px;">
		  <canvas id="LastNodesSeen" width="947" height="300"></canvas>
			<script>
			var ctx2 = document.getElementById("LastNodesSeen").getContext('2d');
			var gradientStroke = ctx2.createLinearGradient(0, 0, 0, 300);
			gradientStroke.addColorStop(0, '#006699');
			gradientStroke.addColorStop(1, '#009999');
			var gradientStroke2 = ctx2.createLinearGradient(0, 0, 0, 300);
			gradientStroke2.addColorStop(0, '#003399');
			gradientStroke2.addColorStop(1, '#003399');
			
			var myChart = new Chart(ctx2, {
			    type: 'line',
			    data: {
			        labels: [<?=sprintf("'%s'", implode("','", $lastnodes_x ) );?>],
			        datasets: [{
			            label: 'Total Nodes',
			            data: [<?=sprintf("%s", implode(", ", $lastnodes_y ) ); ?>],

			            hoverBackgroundColor: 
			                gradientStroke,
			            borderColor: 
			                gradientStroke,
			            borderWidth: 2
			        }, {
			            label: 'New Nodes',
			            data: [<?=sprintf("%s", implode(", ", $lastnodes_y2 ) ); ?>],

			            hoverBackgroundColor: 
			                gradientStroke2,
			            borderColor: 
			                gradientStroke2,
			            borderWidth: 2
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                }
			            }]
			        }
			    }
			});
			</script>
		  </div>
		  
		  <h3>Connected Merchants</h3>
		  <p>Amount of merchants directly connected to by OB1 search.</p>
		  <div style="width:947px;height:300px;">
		  <canvas id="VendorsSeen" width="947" height="300"></canvas>
			<script>
			var ctx3 = document.getElementById("VendorsSeen").getContext('2d');
			var gradientStroke = ctx3.createLinearGradient(0, 0, 0, 300);
			gradientStroke.addColorStop(0, '#006699');
			gradientStroke.addColorStop(1, '#009999');

			var myChart = new Chart(ctx3, {
			    type: 'bar',
			    data: {
			        labels: [<?=sprintf("'%s'", implode("','", $vendors_x ) );?>],
			        datasets: [{
			            label: '# of vendors',
			            data: [<?=sprintf("%s", implode(", ", $vendors_y ) ); ?>],
			            backgroundColor: 
			                gradientStroke,
			            borderColor: 
			                gradientStroke,
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                }
			            }]
			        }
			    }
			});
			</script>
		  </div>
		  
<!--
		  <h3>Non-Vendors</h3>
		  <div style="width:947px;height:300px;">
		  <canvas id="NonVendorsSeen" width="947" height="300"></canvas>
			<script>
			var ctx = document.getElementById("NonVendorsSeen");
			var myChart = new Chart(ctx, {
			    type: 'bar',
			    data: {
			        labels: [<?=sprintf("'%s'", implode("','", $nonvendors_x ) );?>],
			        datasets: [{
			            label: '# of vendors',
			            data: [<?=sprintf("%s", implode(", ", $nonvendors_y ) ); ?>],
			            backgroundColor: 
			                'rgba(255, 99, 132, 0.2)',
			            borderColor: 
			                'rgba(255,99,132,1)',
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                }
			            }]
			        }
			    }
			});
			</script>
		  </div>
-->

	  </div>
	  
  </div>
</div>

