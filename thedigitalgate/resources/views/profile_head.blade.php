<div class="row" style="position: relative; top: -70px;">
        <div class="col-sm-2">
            <div class="profile-pic-wrapper pt-3">
                <div class="pic-holder">
                    <!-- uploaded pic shown here -->
                    @php
                        $profileimg = \App\Models\trainer::where(['trainer_id' => Session('Trainer_ID')])->pluck('profile_pic');
                        $profileimg = @$profileimg ? $profileimg[0] : '';
                    @endphp
                    <img id="profilePic" class="pic" src="{{setProfilePic(@$profileimg)}}">
                    {{-- <label for="newProfilePhoto" class="upload-file-block">
                        <div class="text-center">
                            <div class="mb-2">
                                <i class="fa fa-camera fa-2x"></i>
                            </div>
                        </div>
                    </label>
                    <input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto" accept="image/*" style="display: none;"> --}}
                </div>
            </div>
        </div>
        <div class="col-sm-6" style="top: 74px;">
            <h3>{{session()->get('FirstName')}}</h3>
            <h6>{{repalceWithMentorRole(session()->get('Role'))}}</h6>
        </div>
    </div>