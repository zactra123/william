<style>
    .remove-data:hover{
        color: #e3342f;
    }
</style>

<div class="card w-75">
    <div class="text-center">
        <h3>PLEASE VERIFY YOUR INFORMATION AND MAKE CHANGES IF NECESSARY</h3>

    </div>
    <div class="card-body ">
        {!! Form::open(['route' => ['client.details.update', $client->id], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}
        @method('PUT')
        @csrf
        <div class="form-group row font justify-content-center">

            <div class="col-md-12 tab-selector">
                <div class="col-md-12" class="col-md-12 ">
                    {{ Form::text('client[full_name]', !empty($uploadUserDetail) ? $uploadUserDetail->full_name() : $client->full_name(), ['class' => 'form-control m-input',  'placeholder' => 'FULL NAME']) }}
                </div>
            </div>

        </div>

        <div class="form-group row font justify-content-center">

            <div class="col-md-12 tab-selector">
                <div class="col-md-12">
                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name='client[dob]' class="form-control m-input" id="dob"  value ="{{ !empty($uploadUserDetail) ? $uploadUserDetail->dob : $client->clientDetails->dob}}" placeholder ="DATE OF BIRTH">
                </div>
            </div>

        </div>
        <div class="form-group row font justify-content-center">
            <div class="col-md-12 tab-selector">
                <div class="col-md-12">
                    {{ Form::text('client[ssn]', !empty($uploadUserDetail) ? $uploadUserDetail->ssn :  $client->clientDetails->ssn, ['class' => 'form-control m-input ssn', 'placeholder' => 'SOCIAL SECURITY NUMBER']) }}
                </div>
            </div>
        </div>
        <div class="form-group row font justify-content-center">
            <div class="col-md-12 tab-selector">
                <div class="col-md-12">
                    {{ Form::text('client[address]',  !empty($uploadUserDetail) ? $uploadUserDetail->address :  $client->clientDetails->address, ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'CURRENT STREET ADDRESS']) }}
                </div>
            </div>
        </div>
        <div class="form-group row font justify-content-center">
            <div class="col-md-12 tab-selector">
                <div class="col-md-12">
                    {{ Form::text('client[zip]',  !empty($uploadUserDetail) ? $uploadUserDetail->zip :  $client->clientDetails->ssn, ['class' => 'form-control m-input', 'id'=>'zip_code','placeholder' => 'ZIP CODE']) }}
                </div>
            </div>
        </div>
        <div class="form-group row font justify-content-center">
            <div class="col-md-12 tab-selector">
                <div class="col-md-12 sex_options">
                    {{ Form::select('client[sex_uploaded]', [''=>'GENDER','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'], !empty($uploadUserDetail) ? $uploadUserDetail->sex : $client->clientDetails->sex , ['class'=>'col-md-10  form-control']) }}
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
<script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
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

        $(".ssn").mask("999-99-9999");
        $('#phone_number').mask('(000) 000-0000');



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