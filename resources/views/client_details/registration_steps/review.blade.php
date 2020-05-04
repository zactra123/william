<style>
    .remove-data:hover{
        color: #e3342f;
    }
</style>

<div class="card w-75">
    <div class="text-center">
        <p class="text-info"><h3>PLEASE REVIEW YOUR PERSONAL DATA AND MAKE CHANGES IF NECESSARY</h3></p>
    </div>
    <div class="card-body ">
        {!! Form::open(['route' => ['client.details.update', $client->id], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}
        @method('PUT')
        @csrf
        <div class="form-group row font justify-content-center">

            <div class="col-md-12 tab-selector">
                <label for="uploaded_last_name" class="col-md-12 ">FULL NAME: </label>
                <div class="col-md-12" class="col-md-12 ">
                    {{ Form::text('client[full_name]', $uploadUserDetail->full_name(), ['class' => 'form-control m-input', 'placeholder' => 'Enter your last name']) }}
                </div>
            </div>

        </div>

        <div class="form-group row font justify-content-center">

            <div class="col-md-12 tab-selector">
                <label for="uploaded_dob" class="col-md-12 "> DATE OF BIRTH :  </label>
                <div class="col-md-12">
                    {{ Form::date('client[dob]', $uploadUserDetail->dob, ['class' => 'form-control m-input']) }}
                </div>
            </div>

        </div>
        <div class="form-group row font justify-content-center">
            <div class="col-md-12 tab-selector">
                <label for="password" class="col-md-12 "> SOCIAL SECURITY NUMBER:  </label>
                <div class="col-md-12">
                    {{ Form::text('client[ssn]', $uploadUserDetail->ssn, ['class' => 'form-control m-input', 'placeholder' => 'Enter your SSN']) }}
                </div>
            </div>
        </div>
        <div class="form-group row font justify-content-center">
            <div class="col-md-12 tab-selector">
                <label for="password" class="col-md-12 ">CURRENT STREET ADDRESS:</label>
                <div class="col-md-12">
                    {{ Form::text('client[address]', $uploadUserDetail->address, ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'Enter your address']) }}
                </div>
            </div>
        </div>
        <div class="form-group row font justify-content-center">
            <div class="col-md-12 tab-selector">
                <label for="password" class="col-md-12 ">   ZIP CODE:  </label>
                <div class="col-md-12">
                    {{ Form::text('client[zip]', $uploadUserDetail->zip, ['class' => 'form-control m-input', 'id'=>'zip_code','placeholder' => 'Enter your zip']) }}
                </div>
            </div>
        </div>
        <div class="form-group row font justify-content-center">
            <div class="col-md-12 tab-selector">
                <label for="password"  class="col-md-12 ">  GENDER</label>
                <div class="col-md-12 sex_options">
                    {{ Form::select('client[sex_uploaded]', ['M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'],  $uploadUserDetail->sex, ['class'=>'col-md-10  form-control']) }}
                </div>
            </div>
        </div>


        <div class="form-group row mb-0 font">
            <div class="col-md-offset-5">
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
