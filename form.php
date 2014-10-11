<html>
<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>Test Plugin</title>
<link rel="stylesheet" type="text/css" href="main.css" />
<script src="http://caipiao.stg2.24money.com/files/js/jquery.js"></script>
<script src="./js/jQuery.cookie.js"></script>
<script type="text/javascript">
function getEnvironment(){
	var mycookie = document.getElementById("environment").value; 
	$.cookie("environment",mycookie);
}

function setApi(){
        var apicookie = document.getElementById("api").value; 
        $.cookie("api",apicookie);
}


function orderMessage(){
	var lotteryID = $("#lotteryID").val();
$.post("getByingMessage.php",{"lotteryID":lotteryID},
function (data){
	var obj = JSON.parse(data);
	$("#ticketid").val(obj.data.tickets[0].ticketid);
	$("#lotteryid").val(obj.data.tickets[0].lotteryid);
	$("#wareid").val(obj.data.tickets[0].wareid);
	$("#wareissue").val(obj.data.tickets[0].wareissue);
	$("#multiple").val(obj.data.tickets[0].multiple);
	$("#ticketstatus").val(obj.data.tickets[0].ticketstatus);
	$("#ticketamt").val(obj.data.tickets[0].ticketamt);
	$("#betcontent").val(obj.data.tickets[0].betcontent);
	$("#total").val(obj.data.total);
	});
}


function generateTickets(){
         	this.ticketid = $("#ticketid").val();
           	this.lotteryid = $("#lotteryid").val();
        	this.wareid = $("#wareid").val();
        	this.wareissue = $("#wareissue").val();
        	this.multiple = $("#multiple").val();
        	this.ticketstatus = $("#ticketstatus").val();
        	this.ticketamt = $("#ticketamt").val();
        	this.betcontent = $("#betcontent").val();
		var tickets = {"ticketid":Number(ticketid),"lotteryid":Number(lotteryid),"wareid":Number(wareid),"wareissue":Number(wareissue),"multiple":Number(multiple),"ticketstatus":Number(ticketstatus),"ticketamt":Number(ticketamt),"betcontent":betcontent};
		tickets = JSON.stringify(tickets);
		tickets = "["+tickets+","+tickets+"]";
		$("#tickets").val(tickets);
	}

function sendDetail(){
	var orderid = $("#lotteryID").val();
	var schemeid = $("#schemeid").val();
	var pagesize = $("#pagesize").val();
	var total = $("#total").val();
	var tickets = $("#tickets").val();
	var t = $("#time").val();
	var userid = $("#userid").val();
	var pid = $("#pid").val();
	var url = $("#url_detail").val();
	var ticketcontent = $("#betcontent").val();
	var ticketid = $("#ticketid").val();
	var ticketstatus = $("#ticketstatus").val();
	var wareissue = $("#wareissue").val();
	var ticketamt = $("#ticketamt").val();
	var multiple = $("#multiple").val();
	var lotteryid = $("#lotteryid").val();
	var wareid = $("#wareid").val();

$.post("sendDetail.php",{"orderid":orderid,"schemeid":schemeid,"pagesize":pagesize,"total":total,"tickets":tickets,"t":t,"userid":userid,"pid":pid,"url":url,"ticketcontent":ticketcontent,"ticketid":ticketid,"ticketstatus":ticketstatus,"wareissue":wareissue,"ticketamt":ticketamt,"multiple":multiple,"lotteryid":lotteryid,"wareid":wareid},
function (data){
	$("<li>").html( !data ? "No match!" : data).appendTo("#result");	
});
}

function sendStatus(){
        var orderid = $("#lotteryID").val();
        var schemeid = $("#schemeid").val();
        var pagesize = $("#pagesize").val();
        var total = $("#total").val();
        var tickets = $("#tickets").val();
        var t = $("#time").val();
        var userid = $("#userid").val();
        var pid = $("#pid").val();
        var url = $("#url_detail").val();
        var ticketcontent = $("#betcontent").val();
        var ticketid = $("#ticketid").val();
        var ticketstatus = $("#ticketstatus").val();
        var wareissue = $("#wareissue").val();
        var ticketamt = $("#ticketamt").val();
        var multiple = $("#multiple").val();
        var lotteryid = $("#lotteryid").val();
        var wareid = $("#wareid").val();

$.post("sendStatus.php",{"orderid":orderid,"schemeid":schemeid,"pagesize":pagesize,"total":total,"tickets":tickets,"t":t,"userid":userid,"pid":pid,"url":url,"ticketcontent":ticketcontent,"ticketid":ticketid,"ticketstatus":ticketstatus,"wareissue":wareissue,"ticketamt":ticketamt,"multiple":multiple,"lotteryid":lotteryid,"wareid":wareid},
function (data){
        $("<li>").html( !data ? "No match!" : data).appendTo("#result");        
});
}

function getSchemeid(){
	var lotteryID = $("#lotteryID").val();
$.post("getSchemeid.php",{"lotteryID":lotteryID},
function (data){
	var obj = JSON.parse(data);
        $("#time").val(obj.create_time);
	$("#userid").val(obj.user_id);
	$("#schemeid").val(obj.scheme_id);
$("#remove").click(function(){
        $("#result").removeData();
});
});
}
function clearResult(){
	var btn = $("#remove");
	btn.on("click",function(){
	$("#result").html("");
	});
}

</script>
</head>

<body>

<h1 id="banner"><select id="environment" onchange="getEnvironment(this.value)">  
<option value="1">第1套测试环境</option>
<option value="2">第2套测试环境</option>
<option value="3">第3套测试环境</option>
<option value="4">第4套测试环境</option>
<option value="5">第5套测试环境</option>
<option value="6">第6套测试环境</option>
<option value="7">第7套测试环境</option>
<option value="8">第8套测试环境</option>
<option value="9">第9套测试环境</option>
<option value="10">第10套测试环境</option>
</select>
<a>模拟必赢手动推送票详情</a> Test</h1>
<div id="url">
		<p>
                        <label>接口地址:</label>
			<select id="api" onchange="setApi()">
			<option value="/lottery_ticket/detail">/lottery_ticket/detail(票详情接口)</option>
			<option value="/lottery_ticket/status">/lottery_ticket/status(票状态接口)</option>
                </select>
		</p>
</div>
            
<div id="content">
	
	<form>
	      <div id="order">	
		<p>
			<label>订单ID:</label>
			<input type="text" id="lotteryID" value="9245697"/>
			<input type="button" value="Get Order Message" onClick="orderMessage()"/>
		</p>
		<p>
                        <label>订单时间戳:</label>
                        <input type="text" id="time" />
			<input type="button" value="Get Value" onClick="getSchemeid()"/>
                </p>
		<p>
                        <label>userid:</label>
                        <input type="text" id="userid" />
                </p>
		<p>
                        <label>pid(渠道号):</label>
                        <input type="text" id="pid" value="1"/>
                </p>
		<p>
			<label>方案ID:</label>
			<input type="text" id="schemeid" />
		</p>
		<p>
			<label>每页条数:</label>
			<input type="text" id="pagesize" value="1"/>
		</p>
		<p>
			<label>票总条数:</label>
			<input type="text" id="total" />
		</p>
             </div> 
	     <div id="ticket"> 
		<p>
                        <label>票ID:</label>
                        <input type="text" id="ticketid" />
                </p>
                <p>
                        <label>彩种ID:</label>
                        <input type="text" id="lotteryid" />
                </p>
                <p>
                        <label>商品ID:</label>
                        <input type="text" id="wareid" />
                <p>
                        <label>商品期号:</label>
                        <input type="text" id="wareissue" />
                </p>
                <p>
                        <label>倍数:</label>
                        <input type="text" id="multiple" />
                </p>
                <p>
                        <label>票状态:</label>
                        <input type="text" id="ticketstatus" />
                </p>
                <p>
                        <label>票金额:</label>
                        <input type="text" id="ticketamt" />
                </p>
                <p>
                        <label>投注内容:</label>
                        <input type="text" id="betcontent" />
                </p>
		<p>
                        <label>票信息列表:</label>
                        <textarea id='tickets' cols='60' rows='3'></textarea>
                        <input type="button" value="Get Value" onClick="generateTickets()"/>
                </p>
	     </div>	
        </form>
</div>	
		
        <div id="button"><button id="send" onClick="sendDetail()">send票详情</button>
                         <button id="send" onClick="sendStatus()">send票状态</button>	
	</div>
	<div id="button2"><h3>Result:</h3> <button id="remove" onClick="clearResult()">Clear Result</button></div>
		<ul class="res">	
		     <li id="result"></li>
		</ul>

</body>
<script>
document.onload = getEnvironment();
document.onload = setApi();
</script>
</html>


