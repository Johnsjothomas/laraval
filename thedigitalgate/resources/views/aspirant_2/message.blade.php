@include('header')
@include('aspirant.navigation')
@include('aspirant.submenu')

<div class="container pt-5 pb-5">
<h3 class=" text-left">Messages</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
        <div class="headind_srch">
        <div class="srch_bar">
              <div class="stylish-input-group" style=" border: 1px solid gray; border-radius: 10px;">
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span><input type="text" class="search-bar" placeholder="Search">
                 </div>
            </div>
          </div>
          <div class="inbox_chat">
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="{{ asset('talent/assets\img\msg_profile.png') }}" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Khaleel mohammed</h5>
                  <p>Last seen  Today 10:00PM</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="{{ asset('talent/assets\img\msg_profile.png') }}" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Khaleel</h5>
                  <p>Last seen  Today 10:00PM</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="{{ asset('talent/assets\img\msg_profile.png') }}" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Mohammed</h5>
                  <p>Last seen  Today 10:00PM</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="{{ asset('talent/assets\img\msg_profile.png') }}" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Khaleel mohammed</h5>
                  <p>Last seen  Today 10:00PM</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mesgs">
        <div class="row" style=" padding-bottom: 20px !important; ">
                <div class="col-md-3">
                    <img src="{{ asset('talent/assets\img\msg_profile.png ') }}" style="width: 100%;">
                </div>
                <div class="col-md-9">
                    <h5>Khaleel mohammed</h5>
                    <label>Online</label>
                </div>
        </div>
          <div class="msg_history">
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="{{ asset('talent/assets\img\msg_profile.png ') }}" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Hello My name is khaleel </p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Hey khaleel</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="{{ asset('talent/assets\img\msg_profile.png ') }}" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Just wanted to ask if there is any discount that you can offer</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>How many units are you planning to buy</p>
                <span class="time_date"> 11:01 AM    |    Today</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="{{ asset('talent/assets\img\msg_profile.png ') }}" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>I am thinking to buy 700 units </p>
                  <span class="time_date"> 11:01 AM    |    Today</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>okay</p>
                <span class="time_date"> 11:01 AM    |    Today</span> </div>
            </div>
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Say something..." />
              <button class="msg_send_btn" type="button"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>

    </div></div>

@include('footer')