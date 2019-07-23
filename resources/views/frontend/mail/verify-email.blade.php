<h3>Hello, {{$name}}</h3>

Please click the link below to verify your email address.<br />
<a href="{{route('verify-email',['email'=>$email,'verifyToken'=>$verify_token])}}">ghoreyboshe.com/{{$verify_token}}</a>