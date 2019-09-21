<html>
<button id="sms">send Sms</button>
</html>

<script src="{{asset('/') }}front/js/ajax.js" type="text/javascript"></script>
<script src="{{asset('/') }}front/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/') }}front/js/jquery.flexslider.js" type="text/javascript"></script>
<script src="{{asset('/') }}front/js/owl.carousel.js" type="text/javascript"></script>


<script>
    $(document).ready(function(){
        $("#sms").click(function(){
            $.ajax({
                    type : "post",
                    url : "http://users.sendsmsbd.com/smsapi",
                    data : {
                        "api_key" : "R60003685d831c646089b7.77651031",
                        "senderid" : "8804445629106",
                        "type" : "text",
                        "scheduledDateTime" : "",
                        "msg" : "hi this ies a test message",
                        "contacts" : "8801761955765"
                    }
                }
                );
        });
    });
</script>

{{--sms send url--}}
http://users.sendsmsbd.com/smsapi?api_key=R60003685d831c646089b7.77651031&type=text&contacts=8801761955765&senderid=8804445629106&msg=test message

{{--get blance--}}
http://users.sendsmsbd.com/miscapi/(R60003685d831c646089b7.77651031)/getBalance