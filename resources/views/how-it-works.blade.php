
@extends('layouts.login')


@section('content')
    <style>
        video {
            max-width: 100%;
            height: auto;

        }

        .content-container{
            padding-right: 2.5%;
            padding-left: 2.5%;
        }

        .video-wrapper {
            position: relative;

        }

        .video-wrapper > video {
            width: 100%;
            vertical-align: middle;

        }

        .video-wrapper > video.has-media-controls-hidden::-webkit-media-controls {
            display: none;
        }

        .video-overlay-play-button {
            box-sizing: border-box;
            width: 100%;
            height: 100%;
            padding: 10px calc(50% - 50px);
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            opacity: 0.95;
            cursor: pointer;
            background-image: linear-gradient(transparent, #000);
            transition: opacity 150ms;

        }

        .video-overlay-play-button:hover {
            opacity: 1;
        }

        .video-overlay-play-button.is-hidden {
            display: none;
        }
    </style>




    <div class="how-it-font pt-5">

        <p class="p-4"     style="text-align: justify">
            When you decide to hire our firm for your credit restoration needs, we direct you to register and create an
            account. Then, with your help and authorization, our proprietary software scans and conducts credit audit
            on your credit reports by searching for incomplete, unverifiable, misleading, frivolous, erroneous, obsolete,
            inaccurate, unauthorized or fraudulent information. Next, you review our findings and sign the credit
            restoration contract and simultaneously apply for a personal loan account with Exceed Capital Lending.
            Now, we go to work, and you sit back, relax, and expect to hear some good news. Lastly, we will notify you
            and Exceed Capital Lending once an item or items have been corrected/removed from your credit report for the
            payment disbursement for the completed work.

        </p>


    </div>
    <div class="light-section">
        <div class="container content-container ">

            <div class="video-wrapper">
                <svg class="video-overlay-play-button" viewBox="0 0 200 200" alt="Play video">
                    <circle cx="100" cy="100" r="90" fill="none" stroke-width="15" stroke="#fff"/>
                    <polygon points="70, 55 70, 145 145, 100" fill="#fff"/>
                </svg>

                <video id="videoId" controls controlsList="nodownload" class="has-media-controls-hidden">
                    <source src="{{asset('/images/howItWorks.mp4')}}" type="video/mp4">
                </video>
            </div>

        </div>
    </div>



    <script>

        $(document).ready(function(){

            $('.video-overlay-play-button').click(function () {

                $('#videoId')[0].play();
                $(this).hide();
                $('#videoId').removeClass('has-media-controls-hidden');
            })
            $('#videoId').click(function() {
                !this.paused ? $('.video-overlay-play-button').show():  $('.video-overlay-play-button').hide()
            })

        })
    </script>

@endsection
