
<form id="add_client_3" data-client="{{$client!=null?$client->id:""}}" data-id="3" data-type="only_broker" class="add-client additional-reg {{$current_page}}" enctype="multipart/form-data">
    @csrf

    <h3 class="title_r">Incorect</h3>
    <div class="upload-images">
        <div class="upload-img">
            <img src="{{asset("images/new/corect_1.jpg")}}">
        </div>
        <div class="upload-img">
            <img src="{{asset("images/new/corect_2.jpg")}}">
        </div>
    </div>
    <div class="upload-images upload-active">
        <div class="upload-img" >
            <p class="upload-title">Upload your identification card or driver license</p>
            <div class="upload-img-box">
                <img class="upload-img" id="id_card" src="{{asset("images/new/id_card.jpg")}}" alt="">
                <div class="upload-btn">
                    <button>
                        <svg width="48" height="44" viewBox="0 0 48 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7437 15.5633H12.886C12.0815 15.5633 11.3599 15.0775 11.0508 14.3355C10.743 13.5937 10.9133 12.7392 11.4818 12.1708L22.5934 1.05595C23.3713 0.281319 24.6287 0.281319 25.405 1.05595L36.5184 12.1708C37.0869 12.7392 37.2571 13.5951 36.951 14.3355C36.6417 15.0789 35.9185 15.5633 35.114 15.5633H30.258V29.9736C30.258 31.4358 29.0725 32.6196 27.6121 32.6196H20.3896C18.9291 32.6196 17.7437 31.4356 17.7437 29.9736V15.5633ZM43.2282 23.351C43.2282 22.0328 44.2964 20.9643 45.6133 20.9643C46.9316 20.9643 48 22.0328 48 23.3511V33.3304C48 38.9517 43.4265 43.5251 37.8051 43.5251H10.1947C4.57324 43.5251 0 38.9516 0 33.3304V23.3511C0 22.0328 1.0683 20.9643 2.3866 20.9643C3.70337 20.9643 4.77325 22.0328 4.77325 23.351V33.3303C4.77325 36.3197 7.20514 38.7516 10.1947 38.7516H37.8051C40.7946 38.7516 43.2282 36.3197 43.2282 33.3303V23.351Z" fill="white"/>
                        </svg>
                    </button>
                </div>
                <input type="file" name="driver_license" id="upload_id">
            </div>
        </div>
        <div class="upload-img">
            <p class="upload-title">Upload your social security</p>
            <div class="upload-img-box">
                <img class="upload-img" id="social_card" src="{{asset("images/new/social_card.jpg")}}" alt="">
                <div class="upload-btn">
                    <button>
                        <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M17.6661 24.75H14.3328C13.4141 24.75 12.6661 23.9787 12.6661 23.0313V15.125H8.99942C8.12342 15.125 7.66875 14.0374 8.27542 13.3815L15.2754 5.81904C15.6528 5.41204 16.3461 5.41204 16.7234 5.81904L23.7234 13.3815C24.3301 14.0374 23.8754 15.125 22.9994 15.125H19.3328V23.0313C19.3328 23.9787 18.5848 24.75 17.6661 24.75Z" fill="white"/>
                                <path d="M28 33H4C1.79467 33 0 31.1493 0 28.875V22C0 19.7258 1.79467 17.875 4 17.875H6C6.736 17.875 7.33333 18.491 7.33333 19.25C7.33333 20.009 6.736 20.625 6 20.625H4C3.26533 20.625 2.66667 21.2424 2.66667 22V28.875C2.66667 29.6326 3.26533 30.25 4 30.25H28C28.7347 30.25 29.3333 29.6326 29.3333 28.875V22C29.3333 21.2424 28.7347 20.625 28 20.625H26C25.264 20.625 24.6667 20.009 24.6667 19.25C24.6667 18.491 25.264 17.875 26 17.875H28C30.2053 17.875 32 19.7258 32 22V28.875C32 31.1493 30.2053 33 28 33Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="32" height="33" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
                <input type="file" name="social_security" id="upload_social">
            </div>
        </div>
    </div>
    <div class="basic-button upload">
        <input class="login" type="submit" value="Upload" name="">
    </div>
</form>
