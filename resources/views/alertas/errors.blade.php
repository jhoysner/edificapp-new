@if(Session::has('message-error'))
<div class="alert alert-danger alert-dismissible" role="alert" style="margin: 0px">
    <button type="buton" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
    <center>{{Session::get('message-error')}}</center>
</div>
@endif