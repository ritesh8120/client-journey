<?php
$page = "kpi";
include 'header.php';
if (isset($_GET['submit'])) {
  $currentYear = $_GET['admission_year'];
} else {
  $currentYear = date('Y');
}

include 'config.php';
$querys = mysqli_query($conn, "SELECT * FROM `projection` WHERE `fld_year`='$currentYear'");
$row = mysqli_fetch_assoc($querys);
?>
<style>
  input[type="text"] {
    border: 2px solid red;
    outline: none;
  }

  table,
  th,
  td {
    border: 1px solid #000;
    border-collapse: collapse;
    padding: 5px 15px;
  }

  .form-control {
    margin-right: 20px;
  }
</style>
<br>
<center>
  <label for="goal">Projected Revenue: </label>
  <input class="form-control" id="goal" type="text" name="" value="<?= $row['goal'] ?>">
  <label for="Projected">Client Value: </label>
  <input class="form-control" id="clientval" type="text" name="" value="<?= $row['client'] ?>">
  <label for="Projected">Number Of Client (Annual) </label>
  <input class="form-control" id="numofclient" type="text" value="<?php echo (mysqli_num_rows($querys) > 0) ? round((int)$row['goal'] / (int)$row['client']) : ""; ?>" disabled>
</center>
<br>
<table style="width:99%;margin:8px">
  <thead>
    <tr>
      <th>ERROR - Please enter January 1st of any year here --></th>
      <th></th>
      <?php
      for ($i = 1; $i <= 12; $i++) {
        $month = date('M', mktime(0, 0, 0, $i, 10));
        echo "<th>" . $month . "</th>";
      }
      ?>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Enter your annual revenue goal:</td>
      <td></td>
      <td class="three"><?= round((int)$row['goal'] * 0.133, 2); ?></td>
      <td class="three"><?= round((int)$row['goal'] * 0.133, 2); ?></td>
      <td class="three"><?= round((int)$row['goal'] * 0.133, 2); ?></td>
      <td class="seven"><?= round((int)$row['goal'] * 0.075, 2); ?></td>
      <td class="seven"><?= round((int)$row['goal'] * 0.075, 2); ?></td>
      <td class="seven"><?= round((int)$row['goal'] * 0.075, 2); ?></td>
      <td class="seven"><?= round((int)$row['goal'] * 0.075, 2); ?></td>
      <td class="three"><?= round((int)$row['goal'] * 0.133, 2); ?></td>
      <td class="three"><?= round((int)$row['goal'] * 0.133, 2); ?></td>
      <td class="three"><?= round((int)$row['goal'] * 0.133, 2); ?></td>
      <td class="five"><?= round((int)$row['goal'] * 0.05, 2); ?></td>
      <td class="five"><?= round((int)$row['goal'] * 0.05, 2); ?></td>
    </tr>
    <tr>
      <td>Month client Goal</td>
      <td></td>
      <td class="alfa"><?= (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : ""; ?></td>
      <td class="alfa"><?= (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : ""; ?></td>
      <td class="alfa"><?= (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : ""; ?></td>
      <td class="bita"><?= (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : ""; ?></td>
      <td class="bita"><?= (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : ""; ?></td>
      <td class="bita"><?= (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : ""; ?></td>
      <td class="bita"><?= (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : ""; ?></td>
      <td class="alfa"><?= (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : ""; ?></td>
      <td class="alfa"><?= (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : ""; ?></td>
      <td class="alfa"><?= (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.09) : ""; ?></td>
      <td class="gama"><?= (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.05) : ""; ?></td>
      <td class="gama"><?= (mysqli_num_rows($querys) > 0) ? round(((int)$row['goal'] / (int)$row['client']) * 0.05) : ""; ?></td>

    </tr>
    <tr>
      <td>How many days will you COMMIT to your goal this year?</td>
      <td contenteditable="true" id="days" style="outline: none;border:2px solid red">232</td>
      <td class="jan">21</td>
      <td class="feb">18</td>
      <td class="mar">22</td>
      <td class="apr">20</td>
      <td class="may">21</td>
      <td class="jun">17</td>
      <td class="jul">18</td>
      <td class="aug">22</td>
      <td class="sep">21</td>
      <td class="oct">22</td>
      <td class="nov">17</td>
      <td class="dec">13</td>
    </tr>
  </tbody>
</table>
<br>
<table style="width:99%;margin:8px">
  <thead>
    <tr>
      <th class=""></th>
      <th>Daily</th>
      <th>Weekly</th>
      <th class="">Number</th>
      <th class="">percentage %</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td># of Connections</td>
      <td style="border: 2px solid red;" class="dailyreach"></td>
      <td style="border: 2px solid red;" class="weeklyreach"></td>
      <td class="reachnum" style="text-align: center;" contenteditable="true"></td>
      <td class="reachper" style="text-align: center;"></td>
    </tr>
    <tr>
      <td># agreed on Disco calls</td>
      <td></td>
      <td></td>
      <td class="disconum" style="text-align: center;"></td>
      <td class="discoper" style="text-align: center;"></td>
    </tr>
    <tr>
      <td># No Show</td>
      <td></td>
      <td></td>
      <td class="shownum" style="text-align: center;"></td>
      <td class="showper" style="text-align: center;"></td>
    </tr>
    <tr>
      <td># of Net Disco</td>
      <td></td>
      <td></td>
      <td class="discosnum" style="text-align: center;"></td>
      <td class="discosper" style="text-align: center;"></td>
    </tr>
    <tr>
      <td># Sold</td>
      <td></td>
      <td></td>
      <td class="convertnum" contenteditable="true" style="text-align: center;"></td>
      <td class="convertper" style="text-align: center;"></td>
    </tr>
  </tbody>
</table>
<br>
<table style="width:99%;margin:8px">
  <thead>
    <tr>
      <th class=""></th>
      <th class="">Number</th>
      <th class="">percentage %</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td># of Connections</td>
      <td id="numofreach" style="text-align: center;"></td>
      <td id="perofreach" style="text-align: center;">100%</td>
    </tr>
    <tr>
      <td># agreed on Disco calls</td>
      <td id="numofagree" style="text-align: center;"></td>
      <td id="perofagree" contenteditable="true" style="text-align: center;"></td>
    </tr>
    <tr>
      <td># No Show</td>
      <td id="numofshow" style="text-align: center;"></td>
      <td id="perofshow" contenteditable="true" style="text-align: center;"></td>
    </tr>
    <tr>
      <td># of Net Disco</td>
      <td id="numofdiscos" style="text-align: center;"></td>
      <td id="perofdiscos" contenteditable="true" style="text-align: center;"></td>
    </tr>
    <tr>
      <td># Sold</td>
      <td id="numofconvert" style="text-align: center;"></td>
      <td id="perofconvert" contenteditable="true" style="text-align: center;"></td>
    </tr>
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#days').keyup(function() {
      var days = $(this).text();
      if (isNaN(days)) {
        alert(days + " is not a number");
      } else {
        if (days >= 1 && days < 269) {
          var day = parseInt(days) / 13;
          var jan = parseInt(day) + Math.floor(Math.random() * 3);
          var feb = parseInt(day) + Math.floor(Math.random() * 2);
          var mar = parseInt(day) + Math.floor(Math.random() * 3);
          var apr = parseInt(day) + Math.floor(Math.random() * 2);
          var may = parseInt(day) + Math.floor(Math.random() * 3);
          var jun = parseInt(day) + Math.floor(Math.random() * 3);
          var jul = parseInt(day) + Math.floor(Math.random() * 5);
          var aug = parseInt(day) + Math.floor(Math.random() * 4);
          var sep = parseInt(day) + Math.floor(Math.random() * 5);
          var oct = parseInt(day) + Math.floor(Math.random() * 5);
          var nov = parseInt(day) - Math.floor(Math.random() * 3);
          var dec = parseInt(day) - Math.floor(Math.random() * 5);
          $('.jan').text(jan);
          $('.feb').text(feb);
          $('.mar').text(mar);
          $('.apr').text(apr);
          $('.may').text(may);
          $('.jun').text(jun);
          $('.jul').text(jul);
          $('.aug').text(aug);
          $('.sep').text(sep);
          $('.oct').text(oct);
          $('.nov').text(nov);
          $('.dec').text(dec);
        } else if (days == "") {
          $('.jan').text("");
          $('.feb').text("");
          $('.mar').text("");
          $('.apr').text("");
          $('.may').text("");
          $('.jun').text("");
          $('.jul').text("");
          $('.aug').text("");
          $('.sep').text("");
          $('.oct').text("");
          $('.nov').text("");
          $('.dec').text("");
        } else {
          alert("Please minimum 269 days only");
        }
      }
    });
    $('#perofagree').keyup(function() {
      var perofagree = $(this).text();
      if (isNaN(perofagree)) {
        alert(perofagree + " is not a number");
      } else {
        if (perofagree >= 6 && perofagree < 99) {
          var reach = $('#numofreach').text();
          var convertnum = $('#numofconvert').text();
          var disconum = reach * perofagree / 100;
          var shownum = disconum * 0.15;
          var discosnum = disconum - shownum;
          $('#numofagree').text(parseInt(disconum));
          $('#numofshow').text(parseInt(shownum));
          $('#numofdiscos').text(parseInt(discosnum));

          var reachper = parseInt(reach) / parseInt(reach) * 100;
          var showper = parseInt(shownum) / parseInt(reach) * 100;
          var discosper = parseInt(discosnum) / parseInt(reach) * 100;
          var convertper = parseInt(convertnum) / parseInt(reach) * 100;
          $('#perofreach').text(reachper.toFixed(2));
          $('#perofshow').text(showper.toFixed(2));
          $('#perofdiscos').text(discosper.toFixed(2));
          $('#perofconvert').text(convertper.toFixed(2));
        } else {
          alert("Min 99% and Max 5% only");
        }
      }
    });
    $('#perofshow').keyup(function() {
      var perofshow = $(this).text();
      if (isNaN(perofshow)) {
        alert(perofshow + " is not a number");
      } else {
        if (perofshow >= 1 && perofshow < 50) {
          var reach = $('#numofreach').text();
          var convertnum = $('#numofconvert').text();
          var disconum = reach * 0.3;
          var shownum = disconum * perofshow / 100;
          var discosnum = disconum - shownum;
          $('#numofagree').text(parseInt(disconum));
          $('#numofshow').text(parseInt(shownum));
          $('#numofdiscos').text(parseInt(discosnum));

          var reachper = parseInt(reach) / parseInt(reach) * 100;
          var discoper = parseInt(disconum) / parseInt(reach) * 100;
          var discosper = parseInt(discosnum) / parseInt(reach) * 100;
          var convertper = parseInt(convertnum) / parseInt(reach) * 100;
          $('#perofreach').text(reachper.toFixed(2));
          $('#perofagree').text(discoper.toFixed(2));
          $('#perofdiscos').text(discosper.toFixed(2));
          $('#perofconvert').text(convertper.toFixed(2));
        } else {
          alert("Min 49% only");
        }
      }
    });
    $('#perofdiscos').keyup(function() {
      var perofdiscos = $(this).text();
      if (isNaN(perofdiscos)) {
        alert(perofdiscos + " is not a number");
      } else {
        if (perofdiscos >= 1 && perofdiscos < 30) {
          var reach = $('#numofreach').text();
          var convertnum = $('#numofconvert').text();
          var disconum = reach * 0.3;
          var discosnum = reach * perofdiscos / 100;
          var shownum = disconum - discosnum;
          $('#numofagree').text(parseInt(disconum));
          $('#numofshow').text(parseInt(shownum));
          $('#numofdiscos').text(parseInt(discosnum));

          var reachper = parseInt(reach) / parseInt(reach) * 100;
          var discoper = parseInt(disconum) / parseInt(reach) * 100;
          var showper = parseInt(shownum) / parseInt(reach) * 100;
          var convertper = parseInt(convertnum) / parseInt(reach) * 100;
          $('#perofreach').text(reachper.toFixed(2));
          $('#perofagree').text(discoper.toFixed(2));
          $('#perofshow').text(showper.toFixed(2));
          $('#perofconvert').text(convertper.toFixed(2));
        } else {
          alert("Min 29% only");
        }
      }
    });
    $('#perofconvert').keyup(function() {
      var perofconvert = $(this).text();
      if (isNaN(perofconvert)) {
        alert(perofconvert + " is not a number");
      } else {
        if (perofconvert < 25) {
          var convertnum = $('#numofconvert').text();
          var reach = convertnum / (perofconvert / 100);
          $('#numofreach').text(parseInt(reach));
          var disconum = reach * 0.3;
          var shownum = disconum * 0.15;
          var discosnum = disconum - shownum;
          var convertnum = discosnum * perofconvert / 100;
          $('#numofagree').text(parseInt(disconum));
          $('#numofshow').text(parseInt(shownum));
          $('#numofdiscos').text(parseInt(discosnum));

          var reachper = parseInt(reach) / parseInt(reach) * 100;
          var discoper = parseInt(disconum) / parseInt(reach) * 100;
          var showper = parseInt(shownum) / parseInt(reach) * 100;
          var discosper = parseInt(discosnum) / parseInt(reach) * 100;
          $('#perofreach').text(reachper.toFixed(2));
          $('#perofagree').text(discoper.toFixed(2));
          $('#perofshow').text(showper.toFixed(2));
          $('#perofdiscos').text(discosper.toFixed(2));
        } else {
          alert("Min 25% only");
        }
      }
    });
    $('.reachnum').keyup(function() {
      var reach = $(this).text();
      if (isNaN(reach)) {
        alert(reach + " is not a number");
      } else {
        var disconum = reach * 0.3;
        var shownum = disconum * 0.15;
        var discosnum = disconum - shownum;
        var convertnum = discosnum * 0.21;
        $('.disconum').text(parseInt(disconum));
        $('.shownum').text(parseInt(shownum));
        $('.discosnum').text(parseInt(discosnum));
        $('.convertnum').text(parseInt(convertnum));

        var reachper = parseInt(reach) / parseInt(reach) * 100;
        var discoper = parseInt(disconum) / parseInt(reach) * 100;
        var showper = parseInt(shownum) / parseInt(reach) * 100;
        var discosper = parseInt(discosnum) / parseInt(reach) * 100;
        var convertper = parseInt(convertnum) / parseInt(reach) * 100;
        $('.reachper').text(reachper.toFixed(2));
        $('.discoper').text(discoper.toFixed(2));
        $('.showper').text(showper.toFixed(2));
        $('.discosper').text(discosper.toFixed(2));
        $('.convertper').text(convertper.toFixed(2));
      }
    });

    $('.convertnum').keyup(function() {
      var convertnum = $(this).text();
      if (isNaN(convertnum)) {
        alert(convertnum + " is not a number");
      } else {
        var discosnum = convertnum / 0.21;
        var shownum = convertnum / 0.85;
        var disconum = shownum + discosnum;
        var reachnum = disconum / 0.3;
        $('.disconum').text(parseInt(disconum));
        $('.shownum').text(parseInt(shownum));
        $('.discosnum').text(parseInt(discosnum));
        $('.reachnum').text(parseInt(reachnum));

        var reachper = parseInt(reachnum) / parseInt(reachnum) * 100;
        var discoper = parseInt(disconum) / parseInt(reachnum) * 100;
        var showper = parseInt(shownum) / parseInt(reachnum) * 100;
        var discosper = parseInt(discosnum) / parseInt(reachnum) * 100;
        var convertper = parseInt(convertnum) / parseInt(reachnum) * 100;
        $('.reachper').text(reachper.toFixed(2));
        $('.discoper').text(discoper.toFixed(2));
        $('.showper').text(showper.toFixed(2));
        $('.discosper').text(discosper.toFixed(2));
        $('.convertper').text(convertper.toFixed(2));
      }
    });
    $('#goal').keyup(function() {
      var goal = $(this).val();
      if (isNaN(goal)) {
        alert(goal + " is not a number");
      } else {
        var three = goal * 0.098;
        var seven = goal * 0.075;
        var five = goal * 0.055;
        $('.three').text(three.toFixed(2));
        $('.seven').text(seven.toFixed(2));
        $('.five').text(five.toFixed(2));
      }
    });

    $('#clientval').keyup(function() {
      var client = $(this).val();
      var goal = $('#goal').val();
      numofclient = parseInt(goal) / parseInt(client);
      $('#numofclient').val(Math.round(numofclient));
      var three = Math.round(Math.round(numofclient) * 0.09);
      var seven = Math.round(Math.round(numofclient) * 0.09);
      var five = Math.round(Math.round(numofclient) * 0.05);
      $('.alfa').text(three);
      $('.bita').text(seven);
      $('.gama').text(five);
      $('.convertnum').text(numofclient);

      var discosnum = numofclient / 0.21;
      var shownum = numofclient / 0.85;
      var disconum = shownum + discosnum;
      var reachnum = disconum / 0.3;
      $('.disconum').text(parseInt(disconum));
      $('.shownum').text(parseInt(shownum));
      $('.discosnum').text(parseInt(discosnum));
      $('.reachnum').text(parseInt(reachnum));
      $('.dailyreach').text(parseInt(reachnum / 232));
      $('.weeklyreach').text(parseInt(reachnum / 232 * 4.1));

      var reachper = parseInt(reachnum) / parseInt(reachnum) * 100;
      var discoper = parseInt(disconum) / parseInt(reachnum) * 100;
      var showper = parseInt(shownum) / parseInt(reachnum) * 100;
      var discosper = parseInt(discosnum) / parseInt(reachnum) * 100;
      var convertper = parseInt(numofclient) / parseInt(reachnum) * 100;
      $('.reachper').text(reachper.toFixed(2));
      $('.discoper').text(discoper.toFixed(2));
      $('.showper').text(showper.toFixed(2));
      $('.discosper').text(discosper.toFixed(2));
      $('.convertper').text(convertper.toFixed(2));

      $('#numofagree').text(parseInt(disconum));
      $('#numofshow').text(parseInt(shownum));
      $('#numofdiscos').text(parseInt(discosnum));
      $('#numofconvert').text(parseInt(numofclient));
      $('#numofreach').text(parseInt(reachnum));

      $('#perofreach').text(reachper.toFixed(2));
      $('#perofagree').text(discoper.toFixed(2));
      $('#perofshow').text(showper.toFixed(2));
      $('#perofdiscos').text(discosper.toFixed(2));
      $('#perofconvert').text(convertper.toFixed(2));

      var year = <?= $currentYear; ?>

      $.ajax({
        type: "post",
        url: 'changelevel',
        data: {
          prospect: "prospect",
          goal: goal,
          client: client,
          year: year
        },
        success: function(data) {}
      });
    });
  });
</script>