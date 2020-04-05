<div class="card w-75">
    <div class="text-center">
        <p>We found some differences between document data, and your filled data.</p>
        <p class="text-info">Please review your personal data</p>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => ['client.details.update', $client->id], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}
        @method('PUT')
        @csrf
        <div class="form-group row font justify-content-center">
            <div class="col-md-4 client-first_name tab-selector">
                <label for="first_name" class="row col-form-label text-md-right"> First Name: </label>
                <div class="col-md-10">
                    {{ Form::text('client[first_name]', $client->first_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your first name']) }}
                </div>
                <label for="password" class="col-md-1" >   <i class="fa fa-minus-circle"></i>  </label>
            </div>
            <div class="col-md-4 upload-first_name tab-selector">
                <label for="uploaded_first_name" class="row col-form-label text-md-right"> First Name(From Documents): </label>
                <div class="col-md-10">
                    {{ Form::text('client[first_name]', $uploadUserDetail->first_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your first name']) }}
                </div>
                <label for="password" class="col-md-1" >   <i class="fa fa-minus-circle"></i>  </label>
            </div>

        </div>

        <div class="form-group row font justify-content-center">

            <div class="col-md-4 tab-selector">
                <label for="last_name" class="row col-form-label text-md-right">Last Name : </label>
                <div class="col-md-10">
                    {{ Form::text('client[last_name]', $client->last_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your last name']) }}
                </div>
                <label for="password" class="col-md-1" data-target="client-last_name">   <i class="fa fa-minus-circle"></i>  </label>
            </div>

            <div class="col-md-4 tab-selector">
                <label for="uploaded_last_name" class="row col-form-label text-md-right">Last Name(From Documents): </label>
                <div class="col-md-10">
                    {{ Form::text('client[last_name]', $uploadUserDetail->last_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your last name']) }}
                </div>
                <label for="password" class="col-md-1" data-target="upload-last_name">   <i class="fa fa-minus-circle"></i>  </label>
            </div>


        </div>

        <div class="form-group row font justify-content-center">
            <div class="col-md-4 tab-selector">
                <label for="dob" class="row col-form-label row text-md-right"> DOB:</label>
                <div class="col-md-10">
                    {{ Form::date('client[dob]', $client->clientDetails->dob, ['class' => 'form-control m-input']) }}
                </div>
                <label for="password" class="col-md-1" data-target="client-dob">   <i class="fa fa-minus-circle"></i>  </label>
            </div>
            <div class="col-md-4 tab-selector">
                <label for="uploaded_dob" class="row col-form-label text-md-right"> DOB(From Documents):  </label>
                <div class="col-md-10">
                    {{ Form::date('client[dob]', $uploadUserDetail->dob, ['class' => 'form-control m-input']) }}
                </div>
                <label for="password" class="col-md-1" data-target="upload-dob">   <i class="fa fa-minus-circle"></i>  </label>
            </div>

        </div>
        <div class="form-group row font justify-content-center">
            <div class="col-md-4 tab-selector">
                <label for="password" class="row col-form-label text-md-right">  Gender:  </label>
                <div class="col-md-10">
                    <label for="a" class=" col-form-label text-md-center">  Male:
                        {{Form::radio('client[sex]','M', $client->clientDetails->sex=='M')}}
                    </label>
                    <label for="s" class="col-form-label text-md-center">  Female:
                        {{Form::radio('client[sex]','F', $client->clientDetails->sex=='F')}}
                    </label>
                    <label for="d" class="col-form-label text-md-center">  Other:
                        {{Form::radio('client[sex]','O', $client->clientDetails->sex=='O')}}
                    </label>
                </div>
                <label for="password" class="col-md-1" data-target="client-dob">   <i class="fa fa-minus-circle"></i>  </label>
            </div>

            <div class="col-md-4 tab-selector">
                <label for="password" class="row col-form-label text-md-right">  Gender(From Documents):  </label>
                <div class="col-md-10">
                    <label for="a" class=" col-form-label text-md-center">  Male:
                        {{Form::radio('client[sex_uploaded]','M', $uploadUserDetail->sex=='M')}}
                    </label>
                    <label for="s" class="col-form-label text-md-center">  Female:
                        {{Form::radio('client[sex_uploaded]','F', $uploadUserDetail->sex=='F')}}
                    </label>
                    <label for="d" class="col-form-label text-md-center">  Other:
                        {{Form::radio('client[sex_uploaded]','O', $uploadUserDetail->sex=='O')}}
                    </label>
                </div>
                <label for="password" class="col-md-1" data-target="client-dob">   <i class="fa fa-minus-circle"></i>  </label>
            </div>

        </div>

        <div class="form-group row font justify-content-center">
            <div class="col-md-4 tab-selector">
                <label for="password" class="row col-form-label text-md-right"> SSN:  </label>
                <div class="col-md-10">
                    {{ Form::text('client[ssn]', $client->clientDetails->ssn, ['class' => 'form-control m-input', 'placeholder' => 'Enter your SSN']) }}
                </div>
                <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
            </div>

            <div class="col-md-4 tab-selector">
                <label for="password" class="row col-form-label text-md-right"> SSN(From Documents):  </label>
                <div class="col-md-10">
                    {{ Form::text('client[ssn]', $uploadUserDetail->ssn, ['class' => 'form-control m-input', 'placeholder' => 'Enter your SSN']) }}
                </div>
                <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
            </div>

        </div>



        <div class="form-group row font justify-content-center">

            <div class="col-md-4 tab-selector">
                <label for="password" class="row col-form-label text-md-right">   Address:  </label>
                <div class="col-md-10">
                    {{ Form::text('client[address]', $client->clientDetails->address, ['class' => 'form-control m-input', 'placeholder' => 'Enter your address']) }}
                </div>
                <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
            </div>

            <div class="col-md-4 tab-selector">
                <label for="password" class="row col-form-label text-md-right">Address(From Documents):</label>
                <div class="col-md-10">
                    {{ Form::text('client[address]', $uploadUserDetail->address, ['class' => 'form-control m-input', 'placeholder' => 'Enter your address']) }}
                </div>
                <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
            </div>
        </div>

        <div class="form-group row font justify-content-center">

            <div class="col-md-4 tab-selector">
                <label for="password" class="row col-form-label text-md-right">   Zip code:  </label>
                <div class="col-md-10">
                    {{ Form::text('client[zip]', $client->clientDetails->zip, ['class' => 'form-control m-input', 'placeholder' => 'Enter your zip']) }}
                </div>
                <label for="password" class="col-md-1 " >   <i class="fa fa-minus-circle"></i>  </label>
            </div>
            <div class="col-md-4 tab-selector">
                <label for="password" class="row col-form-label text-md-right">   Zip code(From Documents):  </label>
                <div class="col-md-10">
                    {{ Form::text('client[zip]', $uploadUserDetail->zip, ['class' => 'form-control m-input', 'placeholder' => 'Enter your zip']) }}
                </div>
                <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
            </div>

        </div>


        <div class="form-group row mb-0 font">
            <div class="offset-md-5">
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
<script>
    $(document).ready(function(){

        $('.tab-selector i').click(function(){
            $parent = $(this).parents(".form-group")
            $parent.removeClass("has-error");
            $parent.next(".warning-message").remove();
            $(this).parents(".tab-selector").remove();
            $parent.children(".tab-selector").find(".col-md-1").remove()
        })

        $("#clientDetailsForm").submit(function(e){
            e.preventDefault();
            $(".form-group").each(function(index, element){
                if($(element).find(".tab-selector").length > 1){
                    if(!$(element).find(".warning-message").length){
                        $(element).addClass("has-error");
                        $(element).after("<span class='warning-message offset-4'>Please choose one of options</span>")
                    }
                }else{
                    $(element).removeClass("has-error")
                }
            });
            if(!$(this).find(".warning-message").length){
                $(this).unbind().submit()
            }
        });

        $(".cancel-changes").click(function(){
            location.reload()
        })

    })
</script>
