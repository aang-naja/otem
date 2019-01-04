
$(document).ready(function(){
  setInterval(function(){
  $("#totalchart").load('control/load.total.php')
}, 1000);
});

 $(document).ready(function(){
   setTimeout(function(){
   $("#bellnotif").load('index/app/bellnotif.php')
 }, 1000);
 });



 $(document).ready(function(){
   setTimeout(function(){
   $("#button").load('pdo/cpm.php')
 }, 1000);
 });

 $(document).ready(function(){
   setTimeout(function(){
   $("#bellenvelope").load('index/view/bellenvelope.php')
 }, 1000);
 });

 $(document).ready(function(){
   setTimeout(function(){
   $("#contentenvelope").load('index/app/contentenvelope.php')
 }, 1000);
 });

 $(document).ready(function(){
   setTimeout(function(){
   $("#contentnotif").load('index/app/contentnotif.php')
 }, 5000);
 });

 $(document).ready(function(){
   setInterval(function(){
   $("#unconfirm").load('pdo/unconfirm.php')
 }, 5000);
 });

  $(document).ready(function(){
    setTimeout(function(){
    $("#lastwithdrawals").load('./view/lastwithdrawals.php')
  }, 5000);
  });
  $(document).ready(function(){
    setTimeout(function(){
    $("#graph").load('./view/graph.php')
  }, 5000);
  });
  $(document).ready(function(){
    setTimeout(function(){
    $("#referrals").load('./view/statisticreferrals.php')
  }, 1000);
  });
  $(document).ready(function(){
    setTimeout(function(){
    $("#donut").load('./view/donut.php')
  }, 5000);
  });

  $(document).ready(function(){
    setTimeout(function(){
    $("#donutreferrer").load('./view/donutreferrer.php')
  }, 5000);
  });

 $(document).ready(function(){
   setInterval(function(){
   $("#lastdeposit").load('./view/lastdeposit.php')
 }, 7000);
 });
