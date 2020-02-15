@extends('layouts.owner')
<style>




    .comment-text-area {
        position: relative;
        float: left;
        width: calc(100%);

        height: 75%;
    }

    .textinput {
        position: relative;
        float:left;
        width: 100%;
        min-height: 35px;
        outline: none;
        resize: none;
        border: 1px solid #f0f0f0;
    }
</style>
@section('content')

<div class="p-2">
    <div class="page-content">
        <div class="row justify-content-center">
            <aside class="sidebar col-md-3">
                <div class="sidebar__content">
                    <div class="side-nav list-group">
                        <div class="list-group-item">
                            <span></span>
                            <span><i class="fa fa-comment-o" aria-hidden="true"></i>22</span>
                        </div>
                        <div class="list-group-item">
                            <span> Further report page </span>
                        </div>
                        <div class="list-group-item">
                            <span> Further report page </span>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="col-md-9">
                <div class="card vh-100">
                    <div class="card-body">
                        <div class="card-body" style="height: 90%">
                        <div class="row  pt-2">
                            <div class="col-6  align-left border border-primary rounded" style="background-color: #adafb8">
                                zxczxczxczcxzxczczxczczxczczxczxcccccccccccccccccccccccccccccccccccccccczc
                                zcccccccccccccccccccccxxxcccccccccccccccccccccccccccccccccccccccccczxczxczxc
                                zxcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccczxc
                                 zcxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxczxxzcxzc
                                zcxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxcxzzxccxzc
                                zcxxxxxxxxxxxxxxxxxxxxxxxx
                            </div>
                        </div>

                        <div class="row  pt-2">
                            <div class="col-6 offset-6 align-left border border-primary rounded" style="background-color: #b3d7f5 ">
                                 zxczxczxczcxzxczczxczczxczczxczxcccccccccccccccccccccccccccccccccccccccczc
                                zcccccccccccccccccccccxxxcccccccccccccccccccccccccccccccccccccccccczxczxczxc
                                zxcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccczxc
                                zcxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxczxxzcxzc
                                zcxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxcxzzxccxzc
                                zcxxxxxxxxxxxxxxxxxxxxxxxx
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-6 offset-6 align-left border border-primary rounded" style="background-color: #b3d7f5 ">
                                 zxczxczxczcxzxczczxczczxczczxczxcccccccccccccccccccccccccccccccccccccccczc
                                zcccccccccccccccccccccxxxcccccccccccccccccccccccccccccccccccccccccczxczxczxc
                                zxcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccczxc
                                zcxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxczxxzcxzc
                                zcxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxcxzzxccxzc
                                zcxxxxxxxxxxxxxxxxxxxxxxxx
                            </div>
                        </div>
                            <div class="row  pt-2">
                                <div class="col-6  align-left border border-primary rounded" style="background-color: #adafb8">
                                    zxczxczxczcxzxczczxczczxczczxczxcccccccccccccccccccccccccccccccccccccccczc
                                    zcccccccccccccccccccccxxxcccccccccccccccccccccccccccccccccccccccccczxczxczxc
                                    zxcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccczxc
                                    zcxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxczxxzcxzc
                                    zcxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxcxzzxccxzc
                                    zcxxxxxxxxxxxxxxxxxxxxxxxx
                                </div>
                            </div>

                            <div class="row  pt-2">
                                <div class="col-6 offset-6 align-left border border-primary rounded" style="background-color: #b3d7f5 ">
                                    zxczxczxczcxzxczczxczczxczczxczxcccccccccccccccccccccccccccccccccccccccczc
                                    zcccccccccccccccccccccxxxcccccccccccccccccccccccccccccccccccccccccczxczxczxc
                                    zxcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccczxc
                                    zcxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxczxxzcxzc
                                    zcxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxcxzzxccxzc
                                    zcxxxxxxxxxxxxxxxxxxxxxxxx
                                </div>
                            </div>




                        </div>
                        <div class="dropdown-divider"></div>
                        {!! Form::open(['route' =>['receptionist.liveChat.store'], 'method' => 'POST', 'class' => 'v-100 p-2 m-1']) !!}
                        <div class="row v-100 m-0" style="height: 10%">
                                <div class="col-11  v-100 m-0">

                                            <div class="comment-text-area">
                                                <textarea class="textinput" placeholder="Comment"></textarea>
                                            </div>
                                </div>
                                <div class="col-1 m-0 p-0">
                                        <button type="submit" class="btn btn-secondary m-0">
                                            Send message
                                        </button>
                                </div>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection