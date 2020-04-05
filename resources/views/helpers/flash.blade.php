<style>
    .flash{
        font-family: "Times New Roman", Times, serif;

    }
</style>

{{--@if ($message = Session::get('success'))--}}


    <div class="w-25 alert alert-success alert-block flash">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ "sdasdasdasds" }}</strong>
    </div>
{{--@endif--}}


@if ($message = Session::get('error'))


    <div class="alert alert-danger alert-block flash">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('warning'))

    <div class="alert alert-warning alert-block flash">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('info'))

    <div class="alert alert-info alert-block flash">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($errors->any())

    <div class="alert alert-danger flash">
        <button type="button" class="close" data-dismiss="alert">×</button>
       @foreach($errors->all()  as $message)
        <strong>{{ $message }}</strong>
       @endforeach
    </div>
@endif