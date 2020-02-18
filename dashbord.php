<?php include"header.php"; 
	
	include "config.inc.php"; 
?>
      


          <!-- Content Row -->
          <div class="row">

         
		 <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-danger">Dashboard</h6>
                </div>
                <div class="card-body">
               
			   
			    <!-- Content Row -->
          <div class="row">
			   
			   <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนฟอร์มประเมิน</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
						<?PHP 
						$sql_subject="SELECT * FROM tbl_subject  ORDER BY tbl_subject.subject_id ASC"; 
						$query_subject = $conn->query($sql_subject); 
						echo $row_cnt = $query_subject->num_rows;
						?> Form
					  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
	        <!-- Earnings (Monthly) Card Example -->
			   
			   
			   
			   
			   			   <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนนักศึกษา</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
						<?PHP 
						$sql_member="SELECT * FROM tbl_member  ORDER BY tbl_member.member_id ASC"; 
						$query_member = $conn->query($sql_member); 
						echo $row_member = $query_member->num_rows;
						?> Member
					  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
	        <!-- Earnings (Monthly) Card Example -->
			   
	        



           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนเจ้าหน้าที่</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
						<?PHP 
						$sql_member="SELECT * FROM tbl_admin  ORDER BY tbl_admin.admin_id ASC"; 
						$query_member = $conn->query($sql_member); 
						echo $row_member = $query_member->num_rows;
						?> Admin
					  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
	        <!-- Earnings (Monthly) Card Example -->
			   
			     <!-- Content Row -->
          </div>
	
			    </div>
				
			
			
			
			<div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">สถิติการประเมิน</h6>
                </div>
                <div class="card-body">

				  
				  
				   <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>
			
              </div>
			  
			  
			  


           

        </div>
        <!-- /.container-fluid -->

<?php include"footer.php";?>
<script language="javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [
	
	/*<?PHP 
include "config.inc.php"; 
$sql_subject="SELECT * FROM tbl_subject  ORDER BY tbl_subject.subject_id ASC"; 
$query_subject = $conn->query($sql_subject); 
while($result_subject = $query_subject->fetch_assoc()) 
{ 
?>	*/
	"<?php echo $result_subject['subject_name']; ?>",
/* <?php } ?>*/
	
	
	
	],
    datasets: [{
      label: "จำนวนผู้ประเมิน",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [
	  
	  	/*<?PHP 
include "config.inc.php"; 
$sql_subject="SELECT * FROM tbl_subject  ORDER BY tbl_subject.subject_id ASC"; 
$query_subject = $conn->query($sql_subject); 
while($result_subject = $query_subject->fetch_assoc()) { 
$subject_id=$result_subject['subject_id'];
$sql_as="SELECT  Count(subject_id) As ssd FROM tbl_assess  where subject_id=$subject_id "; 
$query_as = $conn->query($sql_as); 
$result_as = $query_as->fetch_assoc();


?>	*/
	<?php echo $result_as['ssd']; ?>,
/* <?php } ?>*/
	  
	  ],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'Form'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 50,
          maxTicksLimit: 10,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel  + ' ' + number_format(tooltipItem.yLabel) + ' รายการ ';
        }
      }
    },
  }
});

</script>
		
