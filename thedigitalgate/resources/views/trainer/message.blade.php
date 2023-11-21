@include('header')
@include('trainer.navigation')
@include('trainer.submenu')

<style>
    .the_digital_gate_chatbox {
        width: 100%;
        display: flex;
        justify-content: space-between;
        height: calc(100vh - 130px);
    }
    .the_digital_gate_web {
        background: #fff;
        width: 100%;
        padding: 60px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border-radius: 5px;
        overflow: hidden;
        position: relative;
    }
    .the_digital_gate_web .top_logo {
        max-width: 270px;
        width: 100%;
    }
    .the_digital_gate_web h2 {
        margin: 0;
        font-size: 33px;
        font-weight: 500;
        line-height: 1.2;
        color: #2f4154;
    }
    .the_digital_gate_web p {
        color: #2f4154;
        margin: 0;
        font-size: 15px;
    }
    .the_digital_gate_web a {
        color: #4cd192;
        font-weight: 600;
    }
    .the_digital_gate_web .txt {
        color: #2f4154;
        font-size: 15px;
        font-weight: 500;
        position: absolute;
        bottom: 16px;
        margin: 0 auto;
    }
    .the_digital_gate_chatlist {
        background: #fff;
        min-width: 320px;
        margin-left: 15px;
        overflow: auto;
        box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25);
    }
    .the_digital_gate_searchbx {
        width: 100%;
        display: inline-block;
        padding: 12px;
        background-color: #fff;
        position: sticky;
        top: 0;
        z-index: 9;
        box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25);
    }
    .the_digital_gate_searchbx .boxess {
        position: relative;
    }
    .the_digital_gate_searchbx .boxess .fa-search {
        position: absolute;
        left: 9px;
        top: 7px;
        font-size: 20px;
        color: #a3a3a3;
    }
    .the_digital_gate_searchbx .boxess .form-control {
        background-color: #F9F9F9;
        width: 100%;
        padding: 8px 10px;
        padding-left: 36px;
        border-radius: 8px;
        color: #151515;
        font-weight: 500;
        border: 1px solid #D1D1D1;
    }
    .the_digital_gate_searchbx .boxess .form-control::placeholder {
        color: #151515;
        font-weight: 600;
    }
    .the_digital_gate_searchbx .boxess .filter_icon_List .fa {
        font-size: 15px;
        margin: 10px 7px;
    }
    .the_digital_gate_chatbx_main {
        width: 100%;
        display: inline-block;
        position: relative;
    }
    .the_digital_gate_chatbx_main .the_digital_gate_chatbx {
        width: 100%;
        display: flex;
        position: relative;
        padding: 10px;
        padding-bottom: 0;
        cursor: pointer;
    }
    .the_digital_gate_chatbx_main .the_digital_gate_chatbx.bactive,
    .the_digital_gate_chatbx_main .the_digital_gate_chatbx:hover {
        background-color: #dde0e3;
    }
    .the_digital_gate_chatbx_main .the_digital_gate_chatbx .userimg {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .the_digital_gate_chatbx_main .the_digital_gate_chatbx .userinfo {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        padding-bottom: 16px;
    }
    .the_digital_gate_chatbx_main .the_digital_gate_chatbx .bname {
        color: #15284C;
        font-size: 18px;
        font-weight: 600;
        line-height: 1.2;
        width: 70%;
        display: inline-block;
        margin: 6px 0;
    }
    .the_digital_gate_chatbx_main .the_digital_gate_chatbx .btime {
        color: #84909e;
        font-size: 12px;
        font-weight: normal;
        line-height: 1.2;
        margin-left: auto;
        display: inline-block;
    }
    .the_digital_gate_chatbx_main .the_digital_gate_chatbx .bdesq {
        color: #686868;
        font-size: 12px;
        font-weight: normal;
        display: inline-block;
        min-width: 60px;
    }
    .the_digital_gate_chatbx_main .the_digital_gate_chatbx .bnew {
        background-color: #4cd192;
        color: #fff;
        height: 16px;
        width: 16px;
        display: inline-block;
        text-align: center;
        line-height: 16px;
        border-radius: 50%;
        font-size: 12px;
        margin-left: auto;
    }
    .the_digital_gate_single_chat {
        /* background: #f4f4f4; */
        width: 100%;
        border-radius: 4px;
        position: relative;
        box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25);;
        overflow: hidden;
    }
    .the_digital_gate_single_chat .chat_head {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        width: 100%;
        padding: 10px;
        /* background-color: #e7ecf2; */
        justify-content: space-between;
        box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.15);
    }
    .the_digital_gate_single_chat .chat_head .chater_img {
        display: flex;
        align-items: center;
        margin-right: 10px;
    }
    .the_digital_gate_single_chat .chat_head .chater_img .userimg {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .the_digital_gate_single_chat .chat_head .chater_img .bname {
        color: #15284C;
        line-height: 1.2;
        display: inline-block;
        margin: 6px 0;
        font-weight: 600;
        font-size: 22px;
    }
    .the_digital_gate_single_chat .chat_head .chater_search {
        position: relative;
        margin-left: auto;
    }
    .the_digital_gate_single_chat .chat_head .chater_search .fa-search {
        position: absolute;
        left: 9px;
        top: 7px;
    }
    .the_digital_gate_single_chat .chat_head .chater_search .form-control {
        background-color: #fff;
        border: none;
        padding: 4px 10px;
        padding-left: 25px;
        border-radius: 13px;
        color: #11263c;
        font-weight: 500;
    }
    .the_digital_gate_single_chat .chater_extra {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin: 0 10px;
        margin-left: 30px;
        float: right;
    }
    .the_digital_gate_single_chat .chater_extra a {
        margin: 2px 10px;
        display: inline-block;
        font-size: 28px;
    }
    .co_blue {
        color: #15284C;
    }
    .co_green {
        color: #5fd49e;
    }
    .co_black {
        color: #11263c;
    }
    .the_digital_gate_single_chat .chat_midd {
        display: flex;
        width: 100%;
        padding: 10px;
        height: calc(100vh - 330px);
        overflow: auto;
    }
    .the_digital_gate_single_chat .chat_midd_data {
        width: 100%;
        display: inline-block;
    }
    .the_digital_gate_single_chat .chat_midd_data .chat_time_label {
        width: 100%;
        text-align: center;
        display: inline-block;
        margin: 5px 0;
    }
    .the_digital_gate_single_chat .chat_midd_data .chat_time_label .labe {
        background-color: #11263c;
        color: #fff;
        font-size: 14px;
        font-weight: normal;
        text-transform: uppercase;
        text-align: center;
        display: inline-block;
        padding: 8px 15px;
        border-radius: 8px;
    }
    .the_digital_gate_single_chat .chat_midd_data .chat_msg {
        width: 100%;
        display: inline-block;
        margin: 5px 0;
        overflow: hidden;
    }
    .the_digital_gate_single_chat .chat_midd_data .boxess {
        float: right;
        max-width: 60%;
        text-align: left;
        position: relative !important;
    }
    p.back_message_org.wp_chat_profile {
        position: initial !important;
        height: 36px;
        width: 36px;
        font-size: 25px;
    }
    .the_digital_gate_single_chat .chat_midd_data .the_digital_gate_receive .boxess {
        float: left;
        text-align: right;
    }
    .the_digital_gate_single_chat .chat_midd_data .times {
        font-size: 10px;
        color: #424040;
        display: inline-block;
    }
    .the_digital_gate_single_chat .chat_midd_data .boxes_content1 {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        background-color: #15284C;
        padding: 5px 8px;
        border-radius: 2px;
    }
    .the_digital_gate_single_chat .chat_midd_data .the_digital_gate_receive .boxes_content1 {
        background-color: #F1F1F1;
    }
    .the_digital_gate_single_chat .chat_midd_data .boxes_content1 .boxes_reply {
        width: 100%;
        display: inline-block;
        border-radius: 3px;
        border-left: 4px solid #6fdaa4;
        background-color: #d3f2d9;
        padding: 7px 5px;
        text-align: left;
    }
    .the_digital_gate_single_chat .chat_midd_data .the_digital_gate_receive .boxes_content1 .boxes_reply {
        width: 100%;
        display: inline-block;
        border-radius: 3px;
        border-left: 4px solid #665efa;
        background-color: #cfd5dd;
        padding: 7px 5px;
        text-align: left;
    }
    .the_digital_gate_single_chat .chat_midd_data .boxes_content1 .boxes_reply .bnames {
        color: #6fdaa4;
        font-size: 14px;
        font-weight: normal;
        display: block;
        margin-bottom: 5px;
    }
    .the_digital_gate_single_chat
        .chat_midd_data
        .the_digital_gate_receive
        .boxes_content1
        .boxes_reply
        .bnames {
        color: #665efa;
    }
    .the_digital_gate_single_chat .chat_midd_data .boxes_content1 .boxes_reply .breply {
        color: #999;
        font-size: 12px;
        font-weight: normal;
        display: block;
    }
    .the_digital_gate_single_chat .chat_midd_data .boxes_content2 {
        width: 100%;
        display: flex;
        align-items: center;
    }
    .the_digital_gate_single_chat .chat_midd_data .boxes_content2 .txts {
        color: #223749;
        font-size: 15px;
        font-weight: normal;
        margin: 3px;
    }
    .the_digital_gate_single_chat .chat_midd_data .the_digital_gate_send .boxes_content1 .boxes_content2 .txts {
        color: #fff;
    }
    .the_digital_gate_single_chat .chat_midd_data .boxes_content2 .btickdone {
        color: #4cd192;
    }
    .the_digital_gate_single_chat .chat_midd_data .boxes_content2 .bdrop {
        cursor: pointer;
    }
    .the_digital_gate_single_chat .chat_midd_data .cus_drop .cus_drop_menu {
        position: absolute;
        background-color: #fff;
        min-width: 120px;
        display: block;
        padding: 5px 0;
        border-radius: 3px;
        box-shadow: 2px 1px 5px 0px #ddd;
    }
    .the_digital_gate_single_chat .chat_midd_data .cus_drop {
        position: relative;
    }
    .the_digital_gate_single_chat .chat_midd_data .cus_drop .cus_drop_menu a {
        display: block;
        text-align: left;
        padding: 4px 10px;
        color: #333;
        font-size: 10px;
        font-weight: 500;
    }
    .the_digital_gate_single_chat .chat_midd_data .cus_drop .cus_drop_menu a:hover {
        background-color: #e7ecf2;
    }
    .the_digital_gate_single_chat .chat_foot {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 15px;
        /* background-color: #e7ecf2; */
        bottom: -5px !important;
        position: absolute;
    }
    .the_digital_gate_single_chat .chat_foot .chat_imozis .imozis {
        position: relative;
        cursor: pointer;
        margin: 5px;
        display: inline-block;
        overflow: hidden;
    }
    .the_digital_gate_single_chat .chat_foot .chat_imozis .imozis input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        padding: 20px;
        cursor: pointer;
    }
    .the_digital_gate_single_chat .chat_foot .chat_imozis .material-symbols-outlined {
        color: #11263c;
        font-size: 30px;
    }
    .the_digital_gate_single_chat .chat_foot .chat_imozis .file_add {
        transform: rotate(-45deg);
    }
    .the_digital_gate_single_chat .chat_foot .chat_input_div {
        width: calc(100% - 80px);
        height: 50px !important;
        position: relative;
    }
    .the_digital_gate_single_chat .chat_foot .form-control {
        resize: none;
        padding: 15px;
        margin: 5px;
        height: 50px !important;
        border: none;
        background-color: #F7F7F4;
        color: #11263c;
        font-weight: 500;
        border-radius: 54px;
    }
    .the_digital_gate_single_chat .chat_foot .form-control::placeholder {
        color: #5A5A5A;
    }
    .the_digital_gate_single_chat .chat_foot .submit_btn {
        background-color: #11263c;
        color: #fff;
        height: 35px;
        width: 35px;
        border-radius: 8px;
        cursor: pointer;
        border: none;
    }
    .the_digital_gate_single_chat .chat_foot .submit_btn .material-symbols-outlined {
        font-size: 20px;
    }
    .wp_chat_profile {
        position: initial !important;
        height: 30px;
        width: 30px;
        font-size: 18px;
        margin-top: -51px;
        margin-left: -10px;
        font-size: 17px;
        font-weight: bold;
    }
    .cus_msgdropdown.cus_drop_menu.cus_drop_menu_js.send_cus_drop_menu {
        right: 25px !important;
    }
    .cus_drop.send_text {
        position: absolute !important;
        top: 0px;
        left: 2px;
    }
    .cus_drop.received_in_text {
        position: absolute !important;
        right: 2px;
        top: 0px;
        /* width: 10%; */
    }
    .txts.received_in_text {
        margin-right: 20px !important;
    }
    .txts.received_in_text {
        text-align: left;
        width: 90%;
    }
    span.tipBot.new_dom_clor_member {
        font-size: 10px !important;
        margin-left: 4px;
    }
    .the_digital_gate_single_chat .chat_midd_data .boxess {
        float: right;
        max-width: 60%;
        text-align: left;
        position: relative !important;
        min-width: 16% !important;
    }
    .times.left_time {
        font-size: 10px;
        color: #424040;
        display: inline-block;
        float: left;
        margin-right: 12px;
        margin-top: 7px;
    }
    li.skipchat.set_client_id.sortable-3.ui-droppable.organization_time_desc.new_whatsapp_dp_class {
        /* position: absolute; */
        display: flex;
        /* left: 0px; */
        top: 15px;
        height: 18px;
        width: 18px;
        background: #fff;
        border-radius: 100%;
    }
    span.remove_preview_image {
        color: red;
        cursor: pointer;
        font-weight: bold;
        font-size: 17px;
        float: right;
        top: 7px;
        position: absolute;
    }
    i.fa.fa-times.close_wp_chat_area {
        font-size: 20px;
        color: #ec4444;
        margin-top: -48px;
    }
    .online_status {
        color: #686868;
    }
    .border_valo_class {
        border-bottom: 1px solid #b2b2b2;
        position: relative;
        height: 34px;
        margin-bottom: 13px;
    }
    .border_valo_class_inner {
        position: absolute;
        left: 36%;
        border: 1px solid #ccc;
        color: #686868;
        padding: 2px 20px;
        background-color: #fff;
        top: 21px;
        border-radius: 2px;
        font-size: 12px;
    }
    .attachment_label {
        position: absolute;
        top: 6px;
        right: 0;
        font-size: 23px;
        margin-bottom: 0;
        cursor: pointer;
    }
    .attachment_label .fa-paperclip {
        position: unset;
        right: unset;
        top: unset;
        font-size: unset;
        color: #15284C;
        transform: rotate(45deg);
    }
    .the_digital_gate_chatlist::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    .the_digital_gate_chatlist::-webkit-scrollbar-thumb {
        background-color: #15284C;
        border-radius: 10px;
    }
    .the_digital_gate_chatlist::-webkit-scrollbar-track {
        background-color: #C4C4C4;
    }
    .the_digital_gate_single_chat .chat_midd::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    .the_digital_gate_single_chat .chat_midd::-webkit-scrollbar-thumb {
        background-color: #15284C;
        border-radius: 10px;
    }
    .the_digital_gate_single_chat .chat_midd::-webkit-scrollbar-track {
        background-color: #C4C4C4;
    }
</style>

@if($showmesg)
<div class="container pt-5 pb-5">
  <h3 class=" text-left">Applicant List</h3>
  <table class="a table table-bordered">
		<tr>
      <th class="tableborder normalfont1 pinkbackground center p1 bold">Applicants</th>
			<th class="tableborder normalfont1 pinkbackground center p1 bold">Last Mesg Date</th>
			<th class="tableborder normalfont1 pinkbackground center p1 bold">Acion</th>
		</tr>
		@foreach($getasplist as $gal)
		<tr>
			<td><b>{{ $gal->first_name }} {{ $gal->second_name }}</b></td>
      <td>{{$gal->created_date}}</td>
			<td><a href="#" class="btn btn-primary btn-sm">Go to Chat</a></td>
		</tr>
		@endforeach
	</table>
</div>
@endif
@if(1)
    <div class="container pt-5 pb-5">
        <h3 class="text-left" style="margin-left: 7%;">Messages</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="the_digital_gate_chatbox">
                    <div class="the_digital_gate_chatlist scroll_on">
                        <div class="the_digital_gate_searchbx">
                            <div class="boxess">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <input
                                    id="search_whtsapp"
                                    name="search_whtsapp"
                                    type="text"
                                    class="form-control"
                                    placeholder="Search you chats"
                                />
                            </div>
                        </div>
                        <div class="the_digital_gate_chatbx_main">
                            {{-- <div
                                id="click_to_expand_chat"
                                class="the_digital_gate_chatbx the_digital_gate_chatbx_178733"
                                data-id="178733"
                                data-contid="11894857"
                                data-userid="14"
                                data-unread="0"
                            >
                                <img
                                    class="userimg"
                                    src="{{ asset('images/user-imggg.png') }}"
                                    alt="User"
                                />
                
                                <div class="userinfo">
                                    <span class="bname" data-id="178733" data-contid="11894857"
                                        >Pritam Pansuriya</span
                                    >
                                    <span class="bdesq">Last seen 27/04/2023</span>
                                </div>
                            </div> --}}
                            @if (@$userArr)
                                @foreach ($userArr as $item)
                                    <div class="the_digital_gate_chatbx the_digital_gate_chatbx_js" data_id="{{$item['aspirant_id']}}" data_name="{{$item['first_name'].' '.$item['second_name']}}">
                                        <img class="userimg" src="{{setProfilePic($item['profile_pic'])}}" alt="User" />
                                        <div class="userinfo">
                                            <span class="bname">{{$item['first_name']}} {{$item['second_name']}}</span>
                                            <span class="bdesq">Last seen 28/04/2023</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="the_digital_gate_single_chat chat_datas">
                        <div class="chat_head">
                            <div
                                class="chater_img whatsapp_user_profile pointer"
                                data_id="8143"
                            >
                                <img
                                    class="userimg chat_image chat_image_js"
                                    src="{{ asset('images/user-imggg.png') }}"
                                    alt="User"
                                />
                                <div>
                                    <span class="bname chat_names chat_names_js">Aspirant name</span>
                                    <div class="online_status">
                                        <i class="fa fa-circle" style="color: green;" aria-hidden="true"></i>
                                        Online
                                    </div>
                                </div>
                            </div>
                            <div class="chater_extra pointer">
                                <a href="javascript:;"
                                    ><i class="fa fa-bars co_blue" aria-hidden="true"></i
                                ></a>
                            </div>
                        </div>
                        <div class="border_valo_class">
                            <div class="border_valo_class_inner">All the chats are being monitored</div>
                        </div>
                        <div class="chat_midd scroll_on scroll_on_js">
                            <div class="chat_midd_data chat_midd_data_js">

                            </div>
                        </div>
                
                        <form action="javascript:;" method="post" id="client_msg_send">
                            @csrf
                            <input type="hidden" name="aspirant_id" value="0">
                            <div class="chat_foot">
                                <div class="chat_input_div">
                                    <input name="message" type="text" class="form-control" placeholder="Say something..." required />
                                    <label for="image_uploade_msg1" class="attachment_label">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                        <input type="file" id="image_uploade_msg111" class="image_uploade_msg" name="file_upload" style="display: none;">
                                    </label>
                                </div>
                                <button type="submit" style="background-color: #04043C;height: 42px;width: 42px;text-align: center;line-height: 27px;border-radius: 50%;padding: 0;">
                                    <img src="{{ asset('images/vector-send-icon.png') }}" class="set_image_height_wid">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if($showmesg)
<div class="container pt-5 pb-5">
    <h3 class=" text-left">Messages</h3>
    <div class="messaging">
        <div class="inbox_msg" style="display: flex;justify-content: center;border:none;">
            <!-- <div class="inbox_people">
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
                            <div class="chat_img"> <img src="assets\img\msg_profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                                <h5>Khaleel mohammed</h5>
                                <p>Last seen Today 10:00PM</p>
                            </div>
                        </div>
                    </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="assets\img\msg_profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                                <h5>Khaleel</h5>
                                <p>Last seen Today 10:00PM</p>
                            </div>
                        </div>
                    </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="assets\img\msg_profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                                <h5>Mohammed</h5>
                                <p>Last seen Today 10:00PM</p>
                            </div>
                        </div>
                    </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="assets\img\msg_profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                                <h5>Khaleel mohammed</h5>
                                <p>Last seen Today 10:00PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="mesgs" style="width: 80% !important;">
                <div class="row" style=" padding-bottom: 20px !important; ">
                    <div class="col-md-3">
                        <img src="{{ asset('talent/assets\img\msg_profile.png') }}" style="width: 38%;">
                    </div>
                    <div class="col-md-9">
                        <h5>{{$getaspirantdetails->first_name}} {{$getaspirantdetails->second_name}}</h5>
                        <label class="message_status">Online</label>

                        <!-- <div class="sandwich_button">
                            <span class="bt_1"></span>
                            <span class="bt_5"></span>
                            <span class="bt_1"></span>
                        </div> -->
                    </div>
                </div>
                <div class="show_istory">
                    <hr />
                    <a ref="#">All the chats are being monitored</a>
                </div>
                <div class="msg_history">
                  @if($getallconversation->count() > 0)
                  @foreach($getallconversation as $con)
                  @if( $con->mesgfrom == 'trainer')
                <div class="outgoing_msg">
                    <div class="sent_msg">
                        <p>{{$con->chats}}</p>
                        <span class="time_date">{{ date('h:i a',strtotime($con->created_date)) }} | {{ date('M d',strtotime($con->created_date)) }}</span>
                    </div>
                </div>
                @else
                <div class="incoming_msg">
                    <div class="incoming_msg_img"> 
                      <img src="{{ asset('talent/assets\img\msg_profile.png') }}" alt="sunil"> </div>
                    <div class="received_msg">
                        <div class="received_withd_msg">
                            <p>{{$con->chats}}</p>
                            <span class="time_date">{{ date('h:i a',strtotime($con->created_date)) }} | {{ date('M d',strtotime($con->created_date)) }}</span>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @else
                  <div>No Data</div>
                @endif
                    
                    
                    <!-- <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="assets\img\msg_profile.png" alt="sunil"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>Just wanted to ask if there is any discount that you can offer</p>
                                <span class="time_date"> 11:01 AM | Yesterday</span>
                            </div>
                        </div>
                    </div>
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>How many units are you planning to buy</p>
                            <span class="time_date"> 11:01 AM | Today</span>
                        </div>
                    </div>
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="assets\img\msg_profile.png" alt="sunil"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>I am thinking to buy 700 units </p>
                                <span class="time_date"> 11:01 AM | Today</span>
                            </div>
                        </div>
                    </div>
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>okay</p>
                            <span class="time_date"> 11:01 AM | Today</span>
                        </div>
                    </div> -->
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                      <form action="#" method="POST">
                      @csrf
                        <input type="text" name="message" class="write_msg" placeholder="Say something..." />
                        <!-- <i class="fa fa-paperclip"></i> -->
                        <button class="msg_send_btn" type="button"> <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif

<script>
function getChatWithAspirant(data_id)
{
    if(!data_id || data_id == '' || data_id == '0')
    {
        return true;
    }
    jQuery(".loder").show();

    $.ajax({
        url: "{{route('getChatWithAspirant')}}",
        type: "POST",
        dataType: "json",
        data: {
            data_id: data_id,
            _token: "{{ csrf_token() }}",
        },
        success: function(response)
        {
            if(response.status)
            {
                $('#client_msg_send [name="aspirant_id"]').val(data_id);
                $('.the_digital_gate_chatbox .chat_names_js').html(response.aspirant.name);
                $('.the_digital_gate_chatbox .chat_image_js').attr("src",response.aspirant.profile);
                $('.chat_midd_data_js').html(response.html);

                $(".scroll_on_js").animate({ scrollTop: $('.scroll_on_js').prop("scrollHeight")}, 500);
            }
            else
            {
                alert_msg(0, response.msg);
            }
            jQuery(".loder").hide();
        }
    });
}
$(document).ready(function(){
    $("body").on("click", ".the_digital_gate_chatbx_js", function(e){
        e.preventDefault();

        const data_id = $(this).attr("data_id");
        getChatWithAspirant(data_id);
    });
    $("body").on("submit", "#client_msg_send", function(e){
		e.preventDefault();
	
		jQuery(".loder").show();
		
		var data = new FormData(this);
		var $this = $(this);
		$.ajax({
            url: "{{route('tmessagecon')}}",
            type: "POST",
            dataType: "json",
            data: data,
            contentType: false,
            processData: false,
            success: function(response)
            {
                jQuery(".loder").hide();
                if(response.status)
                {
                    $('#client_msg_send [name="message"]').val('');
                    $('#client_msg_send [name="message"]').focus();
                    getChatWithAspirant(response.aspirant_id);
                }
                else
                {
                    alert_msg(0, response.msg);
                }
            },
            error: function(err)
            {
                err = err.responseJSON ? err.responseJSON : {};
                alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
                jQuery(".loder").hide();
            }
		});
	});
    $("body").on("input", "#search_whtsapp", function(e){
		var search = $(this).val();

		$(".the_digital_gate_chatbx_js").show();
		if(search)
		{
			$(".the_digital_gate_chatbx_js").each(function(){
				const name = $(this).attr("data_name");
				if(name.toLocaleLowerCase().indexOf(search.toLocaleLowerCase()) == -1)
				{
					$(this).hide();
				}
			});
		}
	});
});
</script>
@include('footer')