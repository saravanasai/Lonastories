<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
    body {
        padding-top: 50px;
    }

    .starter-template {
        padding: 40px 15px;
        text-align: center;
    }
    </style>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">EMI Table Generator</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">
        <h3>SBI EMI, Interest Table Generator for Home or Car Loan</h3>
        <div class="row">
            <div class="starter-template col-sm-8">
                <h6>Enter Interest Rate, Remaining Loan Amount, Emi Amount and Day of month on which your emi is
                    deducted and click on Generate Table to get your emi schedule</h6>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="intrate" class="col-sm-2 control-label">Interest Rate</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="intrate" placeholder="Enter Interest Rate"
                                value="10.5">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="remAmount" class="col-sm-2 control-label">Remaining Loan Amount</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="remAmount"
                                placeholder="Enter Remaing Loan Amount" value="1,000,000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emiAmount" class="col-sm-2 control-label">Emi Amount</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="emiAmount" placeholder="Enter Emi Amount"
                                value="20,000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dayOfEmi" class="col-sm-2 control-label">day of month on which emi is paid</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="dayOfEmi"
                                placeholder="Enter day of month on which emi is paid" value="10">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button onclick="javascript:generateTable();return false;"
                                class="btn btn-primary btn-lg">Generate Table</button>
                        </div>
                    </div>
                </form>
                <div id="content">
                </div>
                <script>
                function generateTable() {
                    document.getElementById("content").innerHTML = "";
                    var date = new Date();
                    var dateofEmi = document.getElementById('dayOfEmi').value;
                    var dayOfEmi = dateofEmi - 1;
                    var curMonth = date.getMonth() + 1;
                    var curYear = date.getFullYear();
                    var ydate = new Date(curYear, 0, 0);
                    var ydate1 = new Date(curYear + 1, 0, 0);
                    var no_of_day_in_year = (ydate1 - ydate) / (60 * 60 * 24 * 1000);
                    var interest_rate = parseFloat(document.getElementById('intrate').value);
                    var starting_amount = parseInt(document.getElementById('remAmount').value.replace(/,/g, ""));
                    var emiAmount = parseInt(document.getElementById('emiAmount').value.replace(/,/g, ""));
                    var total_interest_paid = 0;
                    var content = "";
                    var content1 = "";
                    content += "<table class='table'>";
                    content += "<tr>";
                    content +=
                        "<td>Remaining Loan Amount<td/> <td>Interest till emi date<td/> <td>Interest from emi date to End of Month<td/> <td>Total Interest<td/> <td>Amount at end of month include total Interest - Emi<td/> <td>Month<td/> <td>Year<td/>";
                    content += "<tr/>";
                    while (starting_amount > 0) {
                        var lastDayOfMonth = (new Date(curYear, curMonth, 0)).getDate();
                        var int_before_emi = (dayOfEmi * starting_amount * interest_rate) / (no_of_day_in_year * 100);
                        var int_after_emi = 0;
                        if ((int_before_emi + starting_amount) > emiAmount) {
                            int_after_emi = ((lastDayOfMonth - dayOfEmi) * (starting_amount - emiAmount) *
                                interest_rate) / (no_of_day_in_year * 100);
                        }
                        content += "<tr>";
                        content += "<td>" + Math.round(starting_amount) + "<td/>";
                        content += "<td>" + Math.round(int_before_emi) + "<td/>";
                        content += "<td>" + Math.round(int_after_emi) + "<td/>";
                        content += "<td>" + Math.round(int_before_emi + int_after_emi) + "<td/>";
                        if (starting_amount > emiAmount) {
                            starting_amount = starting_amount - emiAmount + int_before_emi + int_after_emi;
                        } else {
                            starting_amount = 0;
                        }
                        content += "<td>" + Math.round(starting_amount) + "<td/>";
                        content += "<td>" + (curMonth) + "<td/>";
                        content += "<td>" + (curYear) + "<td/>";
                        content += "<tr/>";
                        curMonth = curMonth + 1;
                        if (curMonth == 13) {
                            curMonth = 1;
                            curYear = curYear + 1;
                            ydate = new Date(curYear, 0, 0);
                            ydate1 = new Date(curYear + 1, 0, 0);
                            no_of_day_in_year = (ydate1 - ydate) / (60 * 60 * 24 * 1000);
                        }
                        total_interest_paid = total_interest_paid + Math.round(int_before_emi + int_after_emi);
                    }
                    content += "<table\>";

                    content1 += "<table>";
                    content1 += "<tr>";
                    content1 += "<td> Total interest : " + total_interest_paid + "<td/>";
                    content1 += "<tr\>";
                    content1 += "<table\><br/>";
                    var div = document.createElement('div');
                    div.innerHTML = content1 + content;
                    document.getElementById('content').appendChild(div);
                    return false;
                }
                document.getElementById("remAmount").onblur = function() {
                    this.value = parseFloat(this.value.replace(/,/g, ""))
                        .toFixed(2)
                        .toString()
                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
                document.getElementById("emiAmount").onblur = function() {
                    this.value = parseFloat(this.value.replace(/,/g, ""))
                        .toFixed(2)
                        .toString()
                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
                </script>
            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- emi -->
                <ins class="adsbygoogle" style="display:inline-block;width:160px;height:600px"
                    data-ad-client="ca-pub-1493057699568324" data-ad-slot="8385666350"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        <div id="disqus_thread"></div>
        <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'emipg'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script');
            dsq.type = 'text/javascript';
            dsq.async = true;
            dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by
                Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <!--analytics-->
    <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-49334059-1', 'pragnesh.github.io');
    ga('send', 'pageview');
    </script>
</body>

</html>