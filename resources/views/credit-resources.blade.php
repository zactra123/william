
@extends('layouts.login')

@section('content')

    <div class="page-content">
        <div class="fullwidth-block">
            <div class="container fon">
                <div class="card m-0 pb-4">


                    <div id="site-content">

                        <div class="container">
                            <p style="text-align: justify">
                                Need some trusted resources to help keep your credit it tip top shape? Or perhaps you’d
                                like to educate yourself on how to improve your score? Having the right tools with a
                                trusted reputation and track history proven to help is vital. Here are some popular
                                resources that will get the job done right for you.
                            </p>
                            <h1>Mint</h1>
                            <p style="text-align: justify">
                                Mint is an online software that helps you budget your money, monitor your credit, and
                                help you find opportunities to improve your finances. Furthermore, they provide you with
                                even more tools and resources to continue educating yourself on personal finance!
                            </p>

                            <h1>AnnualCreditReport.com</h1>
                            <p style="text-align: justify">
                                It’s law that every US citizen can get a free credit report without any negative impacts
                                to your score. This can be obtained with AnnualCreditReport.com. It allows you to monitor
                                your credit year over year and gives you a very detailed outline of every debt listed on
                                your credit.
                            </p>

                            <h1>NerdWallet</h1>
                            <p style="text-align: justify">
                                NerdWallet is an educational resource to help you understand all things related to money.
                                This includes credit cards, banking, investing, mortgages, loans, insurance, personal
                                finance and even traveling! Along with their educational resources, they partner with
                                some of the top companies in the industry to give you exclusive deals to helpful money
                                tools, including credit repair tips and tricks!
                            </p>

                            <h1>CreditKarma</h1>
                            <p style="text-align: justify">
                                CreditKarma is a generic credit score app that allows users to get a basic outline of
                                their current credit score. It allows you to create hypothetical situations and forecast
                                how different moves such as paying off a balance quicker will affect your overall score.
                                This isn’t to be confused with an actual credit report, as your free annual credit report
                                will provide detailed insights to your credit profile, and CreditKarma is more generic info.

                            </p>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            $('.show').click(function(){
                console.log('dasdasda');
                $className = (this).className;
                $show = $className.replace('col-md-1 show title1-', '');

                $('.desc-'+$show).css('display','block');
                $('.title1-'+$show).css('display','none');
                $('.title2-'+$show).css('display','block');

            })

            $('.hide').click(function(){

                $className = (this).className;
                $show = $className.replace('col-md-1 hide title2-', '');
                $('.desc-'+$show).css('display','none');
                $('.title1-'+$show).css('display','block');
                $('.title2-'+$show).css('display','none');

            })


        })


    </script>

@endsection
