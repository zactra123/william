<style>
    .remove-data:hover{
        color: #e3342f;
    }
</style>

<div class="card w-75">
    <div class="text-center">
        <p>We found some differences between document data, and your filled data.</p>
        <p class="text-info">Please review your personal data</p>
    </div>
    <div class="card-body ">
        {!! Form::open(['route' => ['client.details.update', $client->id], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}
        @method('PUT')
        @csrf
        <div class="form-group row font justify-content-center">

            <div class="col-md-6 tab-selector">
                <label for="last_name" class="col-md-12 ">Last Name : </label>
                <div class="col-md-11">
                    {{ Form::text('client[full_name]', $client->full_name(), ['class' => 'form-control m-input', 'placeholder' => 'Enter your last name']) }}
                </div>
                <label for="password" class="col-md-1" data-target="client-last_name">   <i class="fa fa-minus-circle remove-data"></i>  </label>
            </div>

            <div class="col-md-6 tab-selector">
                <label for="uploaded_last_name">Last Name(From Documents): </label>
                <div class="col-md-11" class="col-md-12 ">
                    {{ Form::text('client[full_name]', $uploadUserDetail->full_name(), ['class' => 'form-control m-input', 'placeholder' => 'Enter your last name']) }}
                </div>
                <label for="password" class="col-md-1" data-target="upload-last_name">   <i class="fa fa-minus-circle remove-data"></i>  </label>
            </div>

        </div>

        <div class="form-group row font justify-content-center">
            <div class="col-md-6 tab-selector">
                <label for="dob" class="col-md-12 "> DOB:</label>
                <div class="col-md-11">
                    {{ Form::date('client[dob]', $client->clientDetails->dob, ['class' => 'form-control m-input']) }}
                </div>
                <label for="password" class="col-md-1" data-target="client-dob">   <i class="fa fa-minus-circle"></i>  </label>
            </div>
            <div class="col-md-6 tab-selector">
                <label for="uploaded_dob" class="col-md-12 "> DOB(From Documents):  </label>
                <div class="col-md-11">
                    {{ Form::date('client[dob]', $uploadUserDetail->dob, ['class' => 'form-control m-input']) }}
                </div>
                <label for="password" class="col-md-1" data-target="upload-dob">   <i class="fa fa-minus-circle remove-data"></i>  </label>
            </div>

        </div>
        <div class="form-group row font justify-content-center">
            <div class="col-md-6 tab-selector">
                <label for="password" class="col-md-12 " > SSN:  </label>
                <div class="col-md-11">
                    {{ Form::text('client[ssn]', $client->clientDetails->ssn, ['class' => 'form-control m-input', 'placeholder' => 'Enter your SSN']) }}
                </div>
                <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle remove-data"></i>  </label>
            </div>

            <div class="col-md-6 tab-selector">
                <label for="password" class="col-md-12 "> SSN(From Documents):  </label>
                <div class="col-md-11">
                    {{ Form::text('client[ssn]', $uploadUserDetail->ssn, ['class' => 'form-control m-input', 'placeholder' => 'Enter your SSN']) }}
                </div>
                <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle remove-data"></i>  </label>
            </div>

        </div>

        <div class="form-group row font justify-content-center">
            <div class="col-md-6 tab-selector ">
                <label for="password" class="col-md-12 ">  Gender:  </label>

                <div class="col-md-11 sex_options">
                    {{ Form::select('client[sex]', ['M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'],  $client->clientDetails->sex, ['class'=>'col-md-10  form-control']) }}
                </div>
                <label for="password" class="col-md-1" data-target="client-dob">   <i class="fa fa-minus-circle remove-data"></i>  </label>
            </div>

            <div class="col-md-6 tab-selector">
                <label for="password"  class="col-md-12 ">  Gender(From Documents):  </label>
                <div class="col-md-11 sex_options">
                    {{ Form::select('client[sex_uploaded]', ['M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'],  $uploadUserDetail->sex, ['class'=>'col-md-10  form-control']) }}
                     </div>
                <label for="password" class="col-md-1" data-target="client-dob">   <i class="fa fa-minus-circle remove-data"></i>  </label>
            </div>

        </div>

        <div class="form-group row font justify-content-center">

            {{--            <div class="col-md-6 tab-selector">--}}
            {{--                <label for="password" class="col-md-12 ">   Current Street Address:  </label>--}}
            {{--                <div class="col-md-11">--}}
            {{--                    {{ Form::text('client[address]', $client->clientDetails->address, ['class' => 'form-control m-input', 'placeholder' => 'Enter your address']) }}--}}
            {{--                </div>--}}
            {{--                <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle remove-data"></i>  </label>--}}
            {{--            </div>--}}

            <div class="col-md-12 tab-selector">
                <label for="password" class="col-md-12 ">Current Street Address:(From Documents):</label>
                <div class="col-md-12">
                    {{ Form::text('client[address]', $uploadUserDetail->address, ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'Enter your address']) }}
                </div>

            </div>
        </div>
        <div class="form-group row font justify-content-center">

            {{--            <div class="col-md-6 tab-selector">--}}
            {{--                <label for="password" class="col-md-12 ">   Zip code:  </label>--}}
            {{--                <div class="col-md-11">--}}
            {{--                    {{ Form::text('client[zip]', $client->clientDetails->zip, ['class' => 'form-control m-input', 'placeholder' => 'Enter your zip']) }}--}}
            {{--                </div>--}}
            {{--                <label for="password" class="col-md-1 " >   <i class="fa fa-minus-circle remove-data"></i>  </label>--}}
            {{--            </div>--}}
            <div class="col-md-12 tab-selector">
                <label for="password" class="col-md-12 ">   Zip code(From Documents):  </label>
                <div class="col-md-12">
                    {{ Form::text('client[zip]', $uploadUserDetail->zip, ['class' => 'form-control m-input', 'id'=>'zip_code','placeholder' => 'Enter your zip']) }}
                </div>
            </div>
        </div>

        <div class="form-group row mb-0 font">
            <div class="col-md-offset-5">
                <button type="button" class="btn btn-outline-info cancel-changes">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>



<script   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places">

</script>


<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
<script src="{{ asset('js/lib/additional-methods.min.js') }}" ></script>

<script>
    $(document).ready(function(){

        autocomplete = new google.maps.places.Autocomplete($("#address")[0], { types: ['address'], componentRestrictions: {country: "us"}});
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            for (var i = 0; i < place.address_components.length; i++) {
                for (var j = 0; j < place.address_components[i].types.length; j++) {
                    if (place.address_components[i].types[j] == "postal_code") {
                        $("#zip").val(place.address_components[i].long_name);

                    }
                }
            }
        });


        $(".cancel-changes").click(function(){
            location.reload()
        });

        $('.tab-selector i').click(function(){
            $parent = $(this).parents(".form-group")
            $parent.removeClass("has-error");
            $parent.next(".warning-message").remove();
            $(this).parents(".tab-selector").remove();
            $parent.children(".tab-selector").find(".col-md-1").remove()
        });

        $.validator.addMethod("one_option", function(value, element) {
            if (element.name.indexOf("sex") != -1){
                return $(".sex_options").length < 2
            }
            return $("[name='" +element.name+ "']").length < 2;
        }, "Please choose one of the options");

        $.validator.addMethod("valid_address", function(value, element) {
            return !!value.match(/^\d+\s[A-z\s.\,]+(\.)?/g);
        }, "Not valid address format.");

        $("#clientDetailsForm").validate({
            rules: {
                "client[full_name]": {
                    required:true,
                    one_option: true
                },
                "client[dob]": {
                    required:true,
                    one_option: true
                },
                "client[ssn]": {
                    required:true,
                    one_option: true
                },
                "client[address]": {
                    required:true,
                    one_option: true,
                    valid_address: true
                },
                "client[zip]": {
                    required:true,
                    one_option: true
                },
                "client[sex]": {
                    required:   true,
                    one_option: true
                },
                "client[sex_uploaded]": {
                    required:true
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter($(element).parents(".form-group"));
            }
        })
    })

</script>
