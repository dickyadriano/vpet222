<div class="card-header msg_head bg-gradient-default">
    <div class="d-flex bd-highlight">
        <div class="user_info">
            <span></span>
        </div>
    </div>
</div>
<input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
<div class="card-body msg_card_body">
    @foreach($messages as $message)
        <div class="d-flex {{ ($message->from == Auth::id()) ? 'justify-content-end' : 'justify-content-start' }} mb-4">
            <div class="{{ ($message->from == Auth::id()) ? 'msg_cotainer_send' : 'msg_cotainer' }}">
                {{ $message->message }}
                <span class="msg_time">{{ date('h:i a', strtotime($message->created_at)) }}</span>
            </div>
        </div>
    @endforeach
</div>
<div class="card-footer">
    <form id="message_form">
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
            </div>
            <input type="text" name="message" id="message_input" class="form-control type_msg" placeholder="Type your message..."></input>
            <div class="input-group-append">
                <button type="submit" id="message_send" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>
            </div>
        </div>
    </form>
</div>
