<form id="add_client_5" data-id="5" data-type="only_broker" class="add-client additional-reg {{$current_page}}">
    @csrf
    <p>Please verify your information and make changes if necessary</p>
    <input type="text" name="client[full_name]" placeholder="Full Name">
    <input type="date" name="client[dob]">
    <input type="text" name="client[ssn]" placeholder="Social security number">
    <input type="text" name="client[address]" placeholder="Current street address">
    <input type="text" name="client[sex_uploaded]" placeholder="Gender">

    <div class="basic-button">
        <input class="login" type="submit" value="Submit" name="">
    </div>
</form>
