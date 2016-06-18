Hello {{$user->name}}, Welcome to FarmersMarket. <br>
Please <a href="{!! url('verify/'.$user->id.'/email') !!}"> click me to confirm you account</a>.