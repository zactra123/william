<div class="registration-form" data-type="client">
    <form id="register_form" method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" name="role" class="form-control" value="client">
        <input type="text" name="full_name" placeholder="Full name">
        <input type="text" name="ssn" class="ssn" id="social_number" placeholder="Social Security Number">
        <input type="text" name="address" placeholder="Full Address">
        <input type="tel" class="phone " name="phone_number" placeholder="Phone Number">
        <input type="email" name="email" placeholder="E-Mail Address">
        <input type="text" name="referred_by" placeholder="Referred By (if any)">
        <select name="sex" id="gender">
            <option selected disabled>Gender</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
            <option value="O">Non-Binary</option>
        </select>
        <div class="password">
            <input id="register_password" type="password" name="password" placeholder="Password" readonly
                   onfocus="this.removeAttribute('readonly');">
            <div id="eye_open">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z"/>
                </svg>
            </div>
            <div id="eye_close" class="disabled">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M19.604 2.562l-3.346 3.137c-1.27-.428-2.686-.699-4.243-.699-7.569 0-12.015 6.551-12.015 6.551s1.928 2.951 5.146 5.138l-2.911 2.909 1.414 1.414 17.37-17.035-1.415-1.415zm-6.016 5.779c-3.288-1.453-6.681 1.908-5.265 5.206l-1.726 1.707c-1.814-1.16-3.225-2.65-4.06-3.66 1.493-1.648 4.817-4.594 9.478-4.594.927 0 1.796.119 2.61.315l-1.037 1.026zm-2.883 7.431l5.09-4.993c1.017 3.111-2.003 6.067-5.09 4.993zm13.295-4.221s-4.252 7.449-11.985 7.449c-1.379 0-2.662-.291-3.851-.737l1.614-1.583c.715.193 1.458.32 2.237.32 4.791 0 8.104-3.527 9.504-5.364-.729-.822-1.956-1.99-3.587-2.952l1.489-1.46c2.982 1.9 4.579 4.327 4.579 4.327z"/>
                </svg>
            </div>
        </div>
        <input class="register_password_confirm" type="password" name="password_confirmation" placeholder="Confirm Password" readonly
               onfocus="this.removeAttribute('readonly');">
        <select class="form-control" name="secret_questions_id" id="secret_question">
            <option disabled="disabled" selected="selected">Choose Secret Question</option>
            @foreach($secrets as $value)
                <option value="{{$value->id}}">{{$value->question}}</option>
            @endforeach
            <option value="other">
                Your Own question
            </option>
        </select>
        <div class="none w-100" id="custom-secret-question">
            <input name="own_secter_question" type="text" class="form-control" placeholder="OWN question">
        </div>
        <input id="secret_answer" type="text" class="form-control " name="secret_answer" value="{{ old('secret_answer') }}" placeholder="Please answer in secret question">
        @error('secret_answer')
        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror

        <div class="basic-button">
            <input class="login" type="submit" value="Register" name="">
        </div>
    </form>
    <div class="login-social">
        <a class="login-facebook" href="{{route('facebook.login', ['users'=>'client'])}}" target="_blank" title="facebook">
            <svg id="Bold" fill="#FFFFFF" enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/></svg>
            Log in with Facebook
        </a>
        <a class="login-google" href="{{route('google.login', ['users'=>'client'])}}" target="_blank" title="google">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <path style="fill:#FBBB00;" d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
                            c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
                            C103.821,274.792,107.225,292.797,113.47,309.408z"/>
                <path style="fill:#518EF8;" d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
                            c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
                            c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z"/>
                <path style="fill:#28B446;" d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
                            c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
                            c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z"/>
                <path style="fill:#F14336;" d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
                            c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
                            C318.115,0,375.068,22.126,419.404,58.936z"/>
                        </svg>
            Log in with Google
        </a>
    </div>
</div>
