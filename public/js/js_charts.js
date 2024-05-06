var students         = new Array();
    var year_months      = new Array();
    var active_students  = new Array();
    var parents          = new Array();
    var trial_parents    = new Array();
    var regular_parents  = new Array();
    var inactive_parents = new Array();
    var taken_class      = new Array();
    var student_absents  = new Array();
    var student_leaves   = new Array();
    var total_payments   = new Array();
    var paid_payments    = new Array();

    $(document).ready(function(){
      var url = "/charts";
      $.get(url, function(response){

          //studentavivg values into arrays
          //for new students
          $.each( response.students, function( key, value ) {
              students.push(value);

              year_months.push(response.month_year[key]);
              active_students.push(response.active_students[key]);
              parents.push(response.parents[key]);
              trial_parents.push(response.trial_parents[key]);
              regular_parents.push(response.regular_parents[key]);
              inactive_parents.push(response.inactive_parents[key]);
              taken_class.push(response.taken_class[key]);
              student_absents.push(response.student_absents[key]);
              student_leaves.push(response.student_leaves[key]);
              total_payments.push(response.total_payments[key]);
              paid_payments.push(response.paid_payments[key]);

            });

          //drawing charts
          var sign_ups = document.getElementById("new_signups").getContext('2d');
          // var service_report = document.getElementById("service_report").getContext('2d');
          var new_student = document.getElementById("new_students").getContext('2d');
          var class_report = document.getElementById("class_report").getContext('2d');
          var taken_vs_absent = document.getElementById("taken_vs_absent").getContext('2d');
          var payments = document.getElementById("payments").getContext('2d');

          //tooltip settings
          tooltipsettings = {
                      position:'nearest',
                      mode: 'index',
                      intersect: true,
                      backgroundColor:'#000',
                    }
          //for new signups
          var myChart = new Chart(sign_ups, {
            type: 'bar',
            data: {
                    labels:year_months,
                    datasets:[{
                                data:parents,
                                type:'line',
                                backgroundColor: "rgba(255,99,71)",
                                borderColor: "rgba(255,99,71)",
                                borderWidth: 2,
                                fill:false,
                              },
                              {
                                label: 'Sign-Ups',
                                data:parents,
                                backgroundColor:"rgba(255,215,0)",
                                borderColor: "rgba(255,215,0)",
                                borderWidth: 2,
                              },
                              {
                                label: 'Parents on Trial',
                                data: trial_parents,
                                backgroundColor:"rgba(144,238,144)",
                                borderColor: "rgba(144,238,144)",
                                borderWidth: 2,
                              },
                              {
                                label: 'Regular Parents',
                                data:regular_parents,
                                backgroundColor:"rgba(70,130,180)",
                                borderColor: "rgba(70,130,180)",
                                borderWidth: 2,
                              },
                              {
                                label: 'Parents left',
                                data:inactive_parents,
                                backgroundColor:"rgba(0, 140, 192, 0.7)",
                                borderColor: "rgba(0, 140, 192, 0.7)",
                              }]
                  },//end data
                  options: {
                    tooltips:tooltipsettings,
                    scales: {
                      yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            steps: 10,
                            stepValue: 10,
                            max: 500
                        }
                      }]
                    },
                    legend: {
                      display:false
                    }
                  } //end options
          });

          //for service report
          /*var myChart2 = new Chart(service_report, {
              type: 'bar',
              data: {
                      labels:year_months,
                      datasets:[{
                                  label: 'Active',
                                  data: [110,210,300,140,159,165,197,118,149,110,151,112],
                                  type:'line',
                                  backgroundColor:"rgba(255,99,71)",
                                  borderColor: "rgba(255,99,71)",
                                  borderWidth: 2,
                                  fill:false,
                                },
                                {
                                  label: 'All',
                                  data:[130,240,400,190,259,265,397,18,349,210,191,192],
                                  type:'line',
                                  backgroundColor:"rgba(70,130,180)",
                                  borderColor: "rgba(70,130,180)",
                                  borderWidth: 2,
                                  fill:false,
                               }]
                    },
                    options:{
                      tooltips: tooltipsettings,
                      scales: {
                        yAxes: [{
                          ticks:{
                            beginAtZero:true,
                            steps: 10,
                            stepValue: 5,
                            max: 800

                          }
                        }],
                        xAxes: [{
                        ticks: {
                            autoSkip: false,
                            maxRotation: 0,
                            minRotation: 0
                          }
                        }]
                      },
                      legend: {
                        display:false
                      }
                    }
          });*/
          //for new students
          var myChart3 = new Chart(new_student, {
            type: 'bar',
            data: {
                labels:year_months,
                datasets:[{
                            label: 'Active Students',
                            data: active_students,
                            type:'line',
                            backgroundColor:"rgba(255,204,0,1)",
                            borderColor: "rgba(255,204,0,1)",
                            borderWidth: 2,
                            fill:false,
                          },{
                            label: 'New Students',
                            data: students,
                            backgroundColor:"rgba(255,99,71)",
                            borderWidth: 1,
                          }]
                  },
                 options: {
                  tooltips:tooltipsettings,
                  scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            steps: 10,
                            stepValue: 5,
                            max: 1200
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            autoSkip: false,
                            maxRotation: 0,
                            minRotation: 0
                        }
                    }]
                  },
                  legend:{
                    display: false
                  },
                }
          });  

          //for payments
          var mychart4 = new Chart(payments, {
            type: 'bar',
            data: {
                    labels:year_months,
                    datasets: [
                    {
                                 label: 'Total Payments',
                                 data: total_payments,
                                 type: 'line',
                                 backgroundColor: "rgba(165,42,42)",
                                 borderColor: "rgba(165,42,42)",
                                 borderWidth: 2,
                                 fill: false
                              },
                              {
                                 label: 'Received Payments',
                                 data: paid_payments,
                                 backgroundColor: "rgba(152,251,152)",
                                 borderColor: "rgba(152,251,152)",
                                 borderWidth: 2,
                              }]
                  },
                options: {
                  tooltips:tooltipsettings,
                  scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            steps: 10,
                            stepValue: 5,
                            max: 50000
                        }
                    }]
                  },
                  legend:{
                    display: false
                  }
                }
          });
          //for monthly class report
          var myChart5 = new Chart(class_report, {
            type: 'bar',
            data: {
                    labels:year_months,
                    datasets:[{
                                label: 'Class Taken',
                                data: taken_class,
                                backgroundColor:"rgba(144,238,144)",
                                borderColor: "rgba(144,238,144)",
                                borderWidth: 2,
                                fill:false,
                              },
                              {
                                label: 'Student Absent',
                                data: student_absents,
                                backgroundColor:"rgba(250,128,114)",
                                borderColor: "rgba(250,128,114)",
                                borderWidth: 2,
                                fill:false,
                              },
                              {
                                label: 'Student on Leave',
                                data: student_leaves,
                                backgroundColor:"rgba(255,192,203)",
                                borderColor: "rgba(255,192,203)",
                                borderWidth: 2,
                                fill:false,
                              }]
                  },//end data
                  options: {
                    tooltips:tooltipsettings,
                    scales: {
                      yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            steps: 10,
                            stepValue: 5,
                            max: 1600
                        }
                      }]
                    },
                    legend: {
                      display:false
                    }
                  } //end options
          });

          //for taken vs absent
          var myChart6 = new Chart(taken_vs_absent, {
              type: 'bar',
              data: {
                      labels:year_months,
                      datasets:[{
                                  label: 'Total Taken',
                                  data: taken_class,
                                  type:'line',
                                  backgroundColor: "rgba(144,238,144)",
                                  borderColor: "rgba(144,238,144)",
                                  borderWidth: 2,
                                  fill:false,
                                },
                                {
                                  label: 'Absent',
                                  data:student_absents,
                                  type:'line',
                                  backgroundColor: "rgba(255,99,71)",
                                  borderColor: "rgba(255,99,71)",
                                  borderWidth: 2,
                                  fill:false,
                               }]
                    },
                    options:{
                    tooltips:tooltipsettings,
                      scales: {
                        yAxes: [{
                          ticks:{
                            beginAtZero:true,
                            steps: 10,
                            stepValue: 5,
                            max: 1600
                          }
                        }],
                        xAxes: [{
                        ticks: {
                            autoSkip: false,
                            maxRotation: 0,
                            minRotation: 0
                          }
                        }]
                      },
                      legend: {
                        display:false
                      }
                    }
          });
      });//end $.get
    });

    

