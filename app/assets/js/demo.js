type = ['','info','success','warning','danger'];
    	

satoshi = {
  initPickColor: function(){
      $('.pick-class-label').click(function(){
          var new_class = $(this).attr('new-class');  
          var old_class = $('#display-buttons').attr('data-class');
          var display_div = $('#display-buttons');
          if(display_div.length) {
          var display_buttons = display_div.find('.btn');
          display_buttons.removeClass(old_class);
          display_buttons.addClass(new_class);
          display_div.attr('data-class', new_class);
          }
      });
  },
  
  initChartist: function(){            
      var dataSales = {
        labels: ['9:00AM', '12:00AM', '3:00PM', '6:00PM', '9:00PM', '12:00PM', '3:00AM', '6:00AM'],
        series: [
          [287, 385, 490, 492, 554, 586, 698, 695, 752, 788, 846, 944],
          [67, 152, 143, 240, 287, 335, 435, 437, 539, 542, 544, 647]
        ]
      };
   
      var optionsSales = {
        lineSmooth: true,
        low: 0,
        high: 800,
        showArea: true,
        height: "245px",
        axisX: {
          showGrid: false,
        },
        lineSmooth: Chartist.Interpolation.simple({
          divisor: 2
        }),
        showLine: false,
        showPoint: false,
      };
      
      var responsiveSales = [
        ['screen and (max-width: 640px)', {
          axisX: {
            labelInterpolationFnc: function (value) {
              return value[0];
            }
          }
        }]
      ];

      
      Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);  
  },


  initRateChart: function() {
    getRates();
  },
  
    
	showNotification: function(from, align){
    	color = Math.floor((Math.random() * 4) + 1);
    	
    	$.notify({
        	icon: "pe-7s-gift",
        	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."
        	
        },{
            type: type[color],
            timer: 4000,
            placement: {
                from: from,
                align: align
            }
        });
	},

  CoinsVerification: function(el) {
    if(el.length) {
      var getToken = window.location.hash.substr(1).split('&');
      //console.log(getToken[0]);
      var tokenKeyParam = getToken[0].toString().split("=");
      var tokenKey = tokenKeyParam[1];
      //console.log(tokenKey);

      $.ajax({
        data: { process : "coins-validation", access_token : tokenKey },
        url: "process.php",
        type: "POST",

        success: function(result) {
          var resp = JSON.parse(result);
          ajaxAlert("You are now connected.", "success", "pe-7s-star");
          parent.location.hash = '';
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
          ajaxAlert("Sorry, something went wrong with the validation", "danger", "pe-7s-close");
          console.log("error");
        } 
      })
    }
  }

    
}

function getRates() {
  $.ajax({
    data: { process : "getrates"},
    url: "process.php",
    type: 'POST',

    success: function(result) {
      var resp = JSON.parse(result);

      var optionsSales = {
        lineSmooth: true,
        showArea: true,
        height: "245px",
        axisX: {
          showGrid: false,
          labelInterpolationFnc: function skipLabels(value, index) {
            return index % 2  === 0 ? value : null;
          }
        },

        showLine: true,
        showPoint: false
      };
      
      var responsiveSales = [
        ['screen and (max-width: 640px)', {
          axisX: {
            labelInterpolationFnc: function (value) {
              return value[0];
            },
            labelInterpolationFnc: function skipLabels(value, index) {
              return index % 4  === 0 ? value : null;
            }
          }
        }]
      ];

      Chartist.Line('#chartRates', resp["data"], optionsSales, responsiveSales);

      $("#chartRates + .footer .stats").html('<i class="fa fa-history"></i>' + resp["counts"]["last_update"]).attr("data-last", resp["counts"]["now"]);
      $(".btc-update .footer .stats").html('<i class="fa fa-history"></i>' + resp["counts"]["last_update"]).attr("data-last", resp["counts"]["now"]);;
      $(".asking-rate-price").html( resp["counts"]["current_bidding"] );
      $(".bidding-rate-price").html( resp["counts"]["current_asking"] );
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
      ajaxAlert("Sorry, something went wrong", "danger", "pe-7s-close");
    } 
  });
}


//no form ajax
function nfAjax(nfData, nfError) {
  $.ajax({
    data: nfData,
    url: "process.php",
    type: 'POST',

    success: function(result) {
      var resp = JSON.parse(result);
      return resp;
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
      ajaxAlert(nfError);
    } 
  });
}


function ajaxAlert(msg, tayp = "success", aycon = "pe-7s-gift", taym = "4000") {
  $.notify( { icon: aycon, message: msg }, { type: tayp, timer: taym });
}