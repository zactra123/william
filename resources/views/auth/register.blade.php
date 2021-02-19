@extends('layouts.layout1')

@section('content')
    <section class="register">
        <img class="background-image" src="{{asset("images/new/login_bck.jpg")}}" alt="background">
        <div class="register-form" data-id="1">
            <h3 class="title">Registration</h3>
            <div class="registration-stages">
                <a class="registration-stage" data-id="1">
                    <div class="stage-img">
                        <svg width="30" height="32" viewBox="0 0 30 32" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.3083 5.45033L24.3428 0.484818C24.1891 0.331112 24.0067 0.209186 23.8058 0.126C23.605 0.042815 23.3898 0 23.1724 0C22.955 0 22.7398 0.042815 22.539 0.126C22.3382 0.209186 22.1557 0.331112 22.002 0.484818L17.0365 5.45033C16.7261 5.76074 16.5517 6.18175 16.5517 6.62074C16.5517 7.05973 16.7261 7.48074 17.0365 7.79115C17.3469 8.10156 17.7679 8.27595 18.2069 8.27595C18.6459 8.27595 19.0669 8.10156 19.3773 7.79115L21.5172 5.65115V11.6125C21.5205 12.5979 21.2267 13.5614 20.6742 14.3774C20.1217 15.1934 19.3361 15.824 18.4199 16.1869C17.0199 16.7452 15.8008 17.6785 14.8966 18.8843C13.9923 17.6785 12.7732 16.7452 11.3732 16.1869C10.457 15.824 9.67143 15.1934 9.11893 14.3774C8.56643 13.5614 8.27265 12.5979 8.27589 11.6125V5.65115L10.4158 7.79115C10.7262 8.10156 11.1472 8.27595 11.5862 8.27595C12.0252 8.27595 12.4462 8.10156 12.7566 7.79115C13.0671 7.48074 13.2414 7.05973 13.2414 6.62074C13.2414 6.18175 13.0671 5.76074 12.7566 5.45033L7.79113 0.484818C7.63743 0.331112 7.45497 0.209186 7.25415 0.126C7.05333 0.042815 6.83809 0 6.62072 0C6.40335 0 6.18811 0.042815 5.98729 0.126C5.78647 0.209186 5.60401 0.331112 5.45031 0.484818L0.4848 5.45033C0.174388 5.76074 0 6.18175 0 6.62074C0 7.05973 0.174388 7.48074 0.4848 7.79115C0.795213 8.10156 1.21622 8.27595 1.65521 8.27595C2.0942 8.27595 2.51521 8.10156 2.82562 7.79115L4.96555 5.65115V11.6125C4.96549 13.2588 5.45882 14.8675 6.38187 16.2307C7.30492 17.594 8.61534 18.6494 10.144 19.2607C11.0602 19.6236 11.8457 20.2541 12.3982 21.0701C12.9507 21.886 13.2446 22.8495 13.2414 23.8349V30.3448C13.2414 30.7838 13.4158 31.2048 13.7262 31.5152C14.0366 31.8256 14.4576 32 14.8966 32C15.3355 32 15.7565 31.8256 16.0669 31.5152C16.3773 31.2048 16.5517 30.7838 16.5517 30.3448V23.8349C16.5486 22.8495 16.8424 21.886 17.3949 21.07C17.9474 20.254 18.7329 19.6235 19.649 19.2605C21.1777 18.6492 22.4881 17.5939 23.4112 16.2306C24.3342 14.8674 24.8276 13.2588 24.8276 11.6125V5.65115L26.9675 7.79115C27.2779 8.10156 27.6989 8.27595 28.1379 8.27595C28.5769 8.27595 28.9979 8.10156 29.3083 7.79115C29.6187 7.48074 29.7931 7.05973 29.7931 6.62074C29.7931 6.18175 29.6187 5.76074 29.3083 5.45033Z"/>
                        </svg>

                    </div>
                    <div class="stage-name">
                        <h3 class="stage-title">Registration Type</h3>
                    </div>
                </a>
                <a class="registration-stage" data-id="2">
                    <div class="stage-img">
                        <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 23.5538C28.5364 23.5538 32.2143 19.0869 32.2143 13.5768C32.2143 8.06656 31.0066 3.59961 24 3.59961C16.9931 3.59961 15.7856 8.06656 15.7856 13.5768C15.7858 19.0869 19.4635 23.5538 24 23.5538Z"/>
                            <path d="M39.497 38.3849C39.345 28.7859 38.0913 26.0508 28.4982 24.3193C28.4982 24.3193 27.1475 26.04 24.0001 26.04C20.8526 26.04 19.5022 24.3193 19.5022 24.3193C10.0137 26.0317 8.68355 28.7264 8.50872 38.0729C8.4945 38.8362 8.48795 38.8762 8.48535 38.7876C8.48585 38.9536 8.48659 39.2606 8.48659 39.7961C8.48659 39.7961 10.7706 44.4003 24.0002 44.4003C37.2298 44.4003 39.514 39.7961 39.514 39.7961C39.514 39.4521 39.5143 39.2128 39.5145 39.0502C39.5119 39.1049 39.5066 38.9987 39.497 38.3849Z"/>
                            <path d="M35.3993 21.7724C39.0839 21.7724 42.0708 18.1445 42.0708 13.6692C42.0708 9.19386 41.0901 5.56592 35.3993 5.56592C34.4421 5.56592 33.6184 5.66891 32.9099 5.86117C34.2243 8.28424 34.4044 11.2273 34.4044 13.5766C34.4044 16.2366 33.6834 18.7761 32.3555 20.8789C33.2682 21.4488 34.3024 21.7724 35.3993 21.7724Z"/>
                            <path d="M47.9853 33.8178C47.8616 26.0217 46.8436 23.8003 39.0521 22.394C39.0521 22.394 37.9553 23.7917 35.3989 23.7917C35.2932 23.7917 35.1907 23.7884 35.0898 23.7839C36.7141 24.5162 38.1917 25.5358 39.2798 27.0279C41.161 29.6074 41.5935 33.0725 41.6828 38.1631C46.9247 37.1272 47.999 34.9642 47.999 34.9642C47.999 34.6823 47.999 34.4889 47.9995 34.3567C47.9974 34.4032 47.9931 34.3199 47.9853 33.8178Z"/>
                            <path d="M12.6004 21.7725C13.6974 21.7725 14.7314 21.449 15.6445 20.8791C14.3166 18.7764 13.5956 16.2368 13.5956 13.5769C13.5956 11.2275 13.7757 8.28437 15.0899 5.86141C14.3814 5.66915 13.5578 5.56616 12.6004 5.56616C6.90966 5.56616 5.9292 9.1941 5.9292 13.6695C5.9292 18.1446 8.91607 21.7725 12.6004 21.7725Z"/>
                            <path d="M12.9094 23.7839C12.8088 23.7884 12.7063 23.7917 12.6003 23.7917C10.0439 23.7917 8.94714 22.394 8.94714 22.394C1.1559 23.8003 0.13761 26.0216 0.0142185 33.8178C0.00618195 34.32 0.00210186 34.4032 0 34.3566C0.000247278 34.4888 0.000494556 34.6822 0.000494556 34.9641C0.000494556 34.9641 1.07492 37.1271 6.31647 	38.163C6.40611 33.0725 6.83835 29.6074 8.71976 27.0278C9.80779 25.536 11.2852 24.5162 12.9094 23.7839Z"/>
                        </svg>
                    </div>
                    <div class="stage-name">
                        <h3 class="stage-title">Registration</h3>
                    </div>
                </a>
                <a class="registration-stage" data-id="3" data-type="only_broker">
                    <div class="stage-img">
                        <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M42.4999 42C45.5339 42 48 39.5339 48 36.4999V11.5001C48 8.46606 45.5339 6 42.4999 6H5.50012C2.46606 6 0 8.46606 0 11.5001V36.4999C0 39.5339 2.46606 42 5.50012 42H42.4999ZM10.0001 19.0001C10.0001 21.7559 12.2439 24 15 24C17.7561 24 19.9999 21.7559 19.9999 19.0001C19.9999 16.244 17.7561 13.9999 15 13.9999C12.2439 13.9999 10.0001 16.244 10.0001 19.0001ZM13.0001 19.0001C13.0001 17.8978 13.8981 16.9999 15 16.9999C16.1019 16.9999 16.9999 17.8978 16.9999 19.0001C16.9999 20.1021 16.1019 21 15 21C13.8981 21 13.0001 20.1021 13.0001 19.0001ZM22.5 34.0001C21.672 34.0001 21 33.3281 21 32.5001V31.5C21 30.1219 19.8779 28.9999 18.4999 28.9999H11.5001C10.1221 28.9999 9 30.1219 9 31.5V32.5001C9 33.3281 8.328 34.0001 7.5 34.0001C6.672 34.0001 6 33.3281 6 32.5001V31.5C6 28.4659 8.46606 25.9999 11.5001 25.9999H18.4999C21.5339 25.9999 24 28.4659 24 31.5V32.5001C24 33.3281 23.328 34.0001 22.5 34.0001ZM29.5001 18H40.5C41.328 18 42 17.328 42 16.5C42 15.672 41.328 15 40.5 15H29.5001C28.6721 15 28.0001 15.672 28.0001 16.5C28.0001 17.328 28.6721 18 29.5001 18ZM40.5 25.9999H29.5001C28.6721 25.9999 28.0001 25.3279 28.0001 24.4999C28.0001 23.6719 28.6721 22.9999 29.5001 22.9999H40.5C41.328 22.9999 42 23.6719 42 24.4999C42 25.3279 41.328 25.9999 40.5 25.9999ZM29.5001 34.0001H40.5C41.328 34.0001 42 33.3281 42 32.5001C42 31.6721 41.328 31.0001 40.5 31.0001H29.5001C28.6721 31.0001 28.0001 31.6721 28.0001 32.5001C28.0001 33.3281 28.6721 34.0001 29.5001 34.0001Z" fill="#94A2B3"/>
                        </svg>
                    </div>
                    <div class="stage-name">
                        <h3 class="stage-title">Documents</h3>
                    </div>
                </a>
                <a class="registration-stage" data-id="4" data-type="only_broker">
                    <div class="stage-img">
                        <svg width="38" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                            <path d="M37.5884 11.9845C37.5884 10.3666 37.2703 8.79866 36.6477 7.31707C36.0432 5.89001 35.1797 4.60839 34.0799 3.50856C32.98 2.40872 31.6984 1.54522 30.2714 0.940766C28.7943 0.313589 27.2218 0 25.6039 0C23.986 0 22.418 0.318134 20.9364 0.940766C19.5094 1.54522 18.2277 2.40872 17.1279 3.50856C16.0281 4.60839 15.1646 5.89001 14.5601 7.31707C13.9329 8.79412 13.6193 10.3666 13.6193 11.9845C13.6193 14.007 14.1284 15.9885 15.0964 17.7518L0.748575 32.086C0.416807 32.4178 0.312277 32.9223 0.516792 33.3995C0.557695 33.4995 0.625866 33.5904 0.703127 33.6676L3.91628 36.8807C3.99354 36.958 4.08443 37.0216 4.18442 37.0671C4.66162 37.2716 5.16609 37.1716 5.49785 36.8353L7.48391 34.8492L10.3426 37.7079C10.4198 37.7851 10.5107 37.8488 10.6107 37.8942C11.0879 38.0987 11.5924 37.9988 11.9241 37.6624L15.0918 34.4947C15.1691 34.4175 15.2327 34.3266 15.2781 34.2266C15.4827 33.7494 15.3827 33.2449 15.0464 32.9132L12.2331 30.1L19.832 22.4966C21.5908 23.4646 23.5769 23.9736 25.5993 23.9736C27.2172 23.9736 28.7852 23.6555 30.2667 23.0329C31.6938 22.4284 32.9754 21.5649 34.0753 20.4651C35.1751 19.3653 36.0386 18.0837 36.6431 16.6566C37.2703 15.1704 37.5884 13.6025 37.5884 11.9845ZM29.8033 16.1884C28.6807 17.311 27.1855 17.9291 25.5994 17.9291C24.0133 17.9291 22.518 17.311 21.3955 16.1884C20.2729 15.0659 19.6503 13.5707 19.6503 11.9845C19.6503 10.3939 20.2684 8.90319 21.3909 7.78064C22.5135 6.65808 24.0088 6.03999 25.5948 6.03999C27.181 6.03999 28.6762 6.65808 29.7988 7.78064C30.9213 8.90319 31.5394 10.3984 31.5394 11.9845C31.5484 13.5707 30.9304 15.0659 29.8033 16.1884Z"/>
                        </svg>
                    </div>
                    <div class="stage-name">
                        <h3 class="stage-title">Credentails</h3>
                    </div>
                </a>
                <a class="registration-stage" data-id="5" data-type="only_broker">
                    <div class="stage-img">
                        <svg width="38" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                            <path d="M35.4898 12.0078C34.6767 11.1941 33.384 11.1429 32.5099 11.8552C32.3835 11.9582 32.4814 11.8674 30.5566 13.7922L35.5528 18.7883L37.3483 17.0152C38.2165 16.147 38.2165 14.7345 37.3483 13.8663L35.4898 12.0078Z"/>
                            <path d="M20.3119 24.132L17.373 30.4297C17.1751 30.854 17.2636 31.3567 17.5946 31.6877C17.9257 32.0188 18.4286 32.1073 18.8526 31.9093L25.1504 28.9704C25.3995 28.8541 24.6453 29.56 33.9692 20.3525L28.983 15.3662C19.7384 24.6108 20.4305 23.8779 20.3119 24.132Z"/>
                            <path d="M27.0258 30.3385C26.7531 30.6077 26.4389 30.8262 26.0918 30.9883L19.794 33.9272C18.5556 34.5052 17.0426 34.2851 16.0201 33.2624C15.0307 32.2731 14.7635 30.7564 15.3551 29.4883L18.2941 23.1904C18.4592 22.8367 18.6829 22.5175 18.9589 22.2414L28.4268 12.7735V3.33984C28.4268 1.49825 26.9285 0 25.0869 0H3.34082C1.49923 0 0.000976562 1.49825 0.000976562 3.33984V34.6602C0.000976562 36.5017 1.49923 38 3.34082 38H25.0869C26.9285 38 28.4268 36.5017 28.4268 34.6602V28.9549L27.0258 30.3385ZM5.93855 7.19922H22.5635C23.1784 7.19922 23.6768 7.69767 23.6768 8.3125C23.6768 8.92733 23.1784 9.42578 22.5635 9.42578H5.93855C5.32372 9.42578 4.82527 8.92733 4.82527 8.3125C4.82527 7.69767 5.32372 7.19922 5.93855 7.19922ZM5.93855 13.1367H19.001C19.6159 13.1367 20.1143 13.6352 20.1143 14.25C20.1143 14.8648 19.6159 15.3633 19.001 15.3633H5.93855C5.32372 15.3633 4.82527 14.8648 4.82527 14.25C4.82527 13.6352 5.32372 13.1367 5.93855 13.1367ZM4.82527 20.1875C4.82527 19.5727 5.32372 19.0742 5.93855 19.0742H15.4386C16.0534 19.0742 16.5518 19.5727 16.5518 20.1875C16.5518 20.8023 16.0534 21.3008 15.4386 21.3008H5.93855C5.32372 21.3008 4.82527 20.8023 4.82527 20.1875Z"/>
                        </svg>
                    </div>
                    <div class="stage-name">
                        <h3 class="stage-title">Reviews</h3>
                    </div>
                </a>
                <a class="registration-stage" data-id="finish">
                    <div class="stage-img">
                        <svg width="37" height="37" viewBox="0 0 37 37" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32.3567 1.71171C24.2235 -4.15083 16.0918 7.25073 7.95876 3.28547V2.44196C7.95876 1.39437 7.10885 0.544458 6.06134 0.544458C5.01382 0.544458 4.16406 1.39437 4.16406 2.44196V35.1026C4.16406 36.1501 5.01382 37 6.06134 37C7.10885 37 7.95876 36.1501 7.95876 35.1026V21.2662C15.6891 25.0338 23.4195 14.9206 31.1511 18.9452C31.508 19.1317 31.9368 19.1194 32.2813 18.9092C32.626 18.7006 32.8361 18.3275 32.8361 17.9235C32.8361 12.8319 32.8361 7.73992 32.8361 2.64687C32.836 2.27764 32.6567 1.92784 32.3567 1.71171Z" fill="#94A2B3"/>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="37" height="37" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="stage-name">
                        <h3 class="stage-title">Finish</h3>
                    </div>
                </a>
            </div>


            <form id="register_type" method="post" data-id="1" class="add-client additional-reg active">
                <div class="register-type-box">
                    <label class="register-type active" for="register_type_client">
                        <div class="type-icon">
                            <svg width="41" height="48" viewBox="0 0 41 48" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M30.0122 12.2274C29.934 12.6772 29.8069 13.1269 29.6505 13.5766C30.4815 13.4984 31.4689 13.9775 30.5401 17.2526C29.8656 19.6381 29.2399 20.3127 28.7608 20.3518C28.3209 23.187 26.0527 26.7946 22.5038 28.0753C21.0275 28.6032 19.4046 28.6032 17.9284 28.0851C14.3208 26.8141 12.1308 23.1968 11.6909 20.3518C11.2118 20.3127 10.5861 19.6479 9.92133 17.2526C8.99255 13.9775 9.97999 13.4984 10.811 13.5766C10.6448 13.1171 10.5275 12.6772 10.4493 12.2274C10.156 10.6925 10.068 9.27492 10.4297 7.91598C10.8501 6.09753 11.8375 4.63104 12.9423 3.50673C13.6364 2.76371 14.4283 2.10868 15.2691 1.58075C15.9535 1.11147 16.7063 0.700855 17.5275 0.42711C18.1728 0.212025 18.8571 0.075153 19.5806 0.0360467C21.8194 -0.149708 23.5206 0.407557 24.7426 1.13102C26.5611 2.13801 27.2552 3.46763 27.2552 3.46763C27.2552 3.46763 31.42 3.76093 30.0122 12.2274ZM27.4209 27.2736C27.4209 27.2736 31.5466 30.1773 36.6207 31.4678C40.4042 32.4357 40.59 36.8058 40.4335 38.9664C40.4335 38.9664 40.2184 41.8994 39.9936 43.1899C39.9936 43.1899 32.6025 48 20.2253 48C7.84815 47.9902 0.457048 43.1899 0.457048 43.1899C0.241963 41.8994 0.0171015 38.9664 0.0366547 38.9664C-0.119771 36.796 0.0659848 32.4259 3.84952 31.4678C8.92357 30.1773 13.0493 27.2736 13.0493 27.2736L16.2658 37.451L16.8719 39.3673L16.8817 39.3379L17.4097 40.9608L19.1108 36.141C14.9362 30.3141 19.9516 30.3728 20.2351 30.3826C20.5186 30.3728 25.534 30.3141 21.3594 36.141L23.0605 40.9608L23.5885 39.3379L23.5982 39.3673L24.2044 37.451L27.4209 27.2736Z"/>
                            </svg>
                        </div>
                        <span>
							<input type="radio" id="register_type_client" name="register_type" value="client" checked>
							<span>I am registering as a client</span>
						</span>
                    </label>
                    <label class="register-type" for="register_type_broker">
                        <div class="type-icon">
                            <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.933 13.2482C29.0857 12.8093 29.2097 12.3705 29.286 11.9316C30.6598 3.66994 26.5957 3.38374 26.5957 3.38374C26.5957 3.38374 25.9184 2.08629 24.1439 1.10366C22.9514 0.397697 21.2914 -0.146087 19.1068 0.0351746C18.4008 0.0733348 17.733 0.206896 17.1034 0.416777C16.302 0.683899 15.5674 1.08458 14.8996 1.5425C14.0792 2.05767 13.3064 2.69685 12.6291 3.4219C11.551 4.519 10.5875 5.95001 10.1773 7.72446C9.82429 9.05053 9.91015 10.4338 10.1964 11.9316C10.2727 12.3705 10.3872 12.7998 10.5493 13.2482C9.73843 13.1718 8.77489 13.6393 9.68119 16.8352C10.3299 19.1725 10.9405 19.8213 11.4079 19.8594C11.8372 22.6356 13.9742 26.1654 17.4945 27.4056C18.935 27.9112 20.5187 27.9112 21.9592 27.3961C25.4223 26.1463 27.6356 22.626 28.0649 19.8594C28.5323 19.8213 29.1429 19.163 29.8012 16.8352C30.7075 13.6393 29.7439 13.1718 28.933 13.2482ZM35.0399 29.6475C30.0886 28.3882 26.7575 26.6138 26.7575 26.6138L23.6188 36.545L23.0273 38.4148L23.0178 38.3862L22.5026 39.9699L20.8426 35.2666C24.9162 29.5807 20.0222 29.638 19.7455 29.6475C19.4689 29.638 14.5748 29.5807 18.6484 35.2666L16.9885 39.9699L16.4733 38.3862L16.4638 38.4148L15.8723 36.545L12.7336 26.6138C12.7336 26.6138 8.70768 29.4472 3.75639 30.7065C0.0643884 31.6414 -0.116873 35.9058 0.0357679 38.0237C0.0166878 38.0237 0.236109 40.8857 0.44599 42.145C0.44599 42.145 7.65828 46.8292 19.736 46.8387C25.003 46.8387 26.4369 46.3608 26.4369 46.3608C26.6197 45.3114 26.4978 35.7222 26.4521 32.5547C26.4441 31.9961 26.8933 31.5445 27.4519 31.5445H32.6502C32.6502 31.0665 33.1281 29.6475 35.0399 29.6475ZM39.5174 39.8747H36.0352V41.0355H39.5174V39.8747ZM43.943 41.0354H40.6782V41.6158C40.6782 41.9365 40.4185 42.1962 40.0978 42.1962H35.4547C35.134 42.1962 34.8744 41.9365 34.8744 41.6158V41.0354H31.6096C30.8591 41.0354 30.1955 40.557 29.9579 39.8452L27.8711 33.5837V46.2588C27.8711 47.2189 28.6522 48 29.6122 48H45.9403C46.9003 48 47.6814 47.2189 47.6814 46.2588V33.5842L45.5945 39.8452C45.357 40.557 44.6934 41.0354 43.943 41.0354ZM35.4548 30.5886H40.0979C41.0579 30.5886 41.839 31.3697 41.839 32.3297V32.9101H46.6831L44.494 39.4779C44.4146 39.7154 44.1931 39.8747 43.9431 39.8747H40.6783V39.2943C40.6783 38.9736 40.4186 38.7139 40.0979 38.7139H35.4548C35.1341 38.7139 34.8745 38.9736 34.8745 39.2943V39.8747H31.6097C31.3597 39.8747 31.1381 39.7154 31.0588 39.4779L28.8698 32.9101H33.7137V32.3297C33.7137 31.3697 34.4948 30.5886 35.4548 30.5886ZM34.8745 32.3297V32.9101H40.6783V32.3297C40.6783 32.0095 40.4182 31.7493 40.0979 31.7493H35.4548C35.1346 31.7493 34.8745 32.0095 34.8745 32.3297Z" />
                            </svg>
                        </div>
                        <span>
							<input type="radio" id="register_type_broker" name="register_type" value="broker">
							<span>I am registering as a broker</span>
						</span>
                    </label>
                </div>

                <div class="basic-button">
                    <input class="login" type="submit" value="Next" name="">
                </div>
            </form>

            <div  data-id="2" class="register_form additional-reg none">

                {{--broker registration form--}}
                <div class="registration-form none" data-type="broker">
                    <form id="client-registration"  method="post" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="role" class="form-control" value="client">

                        <input type="text" name="full_name" placeholder="Full name">
                        <div class="register_or">
                            <label for="social_number" class="social_number">
                                <input id="social_number" type="text" class="form-control ssn" name="ssn" value="{{ old('ssn') }}"  placeholder="Social Security Number">
                            </label>
                            <p>or</p>
                            <label for="ein_number" class="ein_number">
                                <input id="ein_number" type="text" class="form-control ein" name="ein" value="{{ old('ein') }}"  placeholder="EIN Number">
                            </label>
                        </div>
                        <input type="text" name="address" placeholder="Full Address" value="{{ old('address') }}"  autocomplete="new-full_address">

                        <input type="tel" class="form-control phone" name="phone_number" placeholder="Phone Number"  value="{{ old('phone_number') }}">

                        <input type="email" name="email" placeholder="E-Mail Address">

                        <div class="password">

                            <input class="register_password" type="password" name="password" placeholder="Password">
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
                        <input class="register_password_confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
                        <select class="form-control" name="secret_questions_id" id="secret_question">
                            <option disabled="disabled" selected="selected">Choose Secret Question</option>
                            @foreach($secrets as $value)
                                <option value="{{$value->id}}">{{$value->question}}</option>
                            @endforeach
                            <option value="other">
                                Your Own question
                            </option>
                        </select>
                        <div class="none" id="custom-secret-question">
                            <input name="own_secter_question" type="text" class="form-control" placeholder="OWN QUESTION">
                        </div>
                        <input id="secret_answer" type="text" class="form-control " name="secret_answer" value="{{ old('secret_answer') }}" placeholder="PLEASE ANSWER IN SECRET QUESTION">
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
                        <a class="login-facebook" href="{{route('facebook.login', ['users'=>'affiliate'])}}" target="_blank" title="facebook">
                            <svg id="Bold" fill="#FFFFFF" enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/></svg>
                            Register with Facebook
                        </a>
                        <a class="login-google"href="{{route('google.login', ['users'=>'affiliate'])}}" target="_blank" title="google">
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
                            Register with Google
                        </a>
                    </div>
                </div>





                {{--client registration form--}}
                <div class="registration-form" data-type="client">
                    <form id="affilate-registration" method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="role" class="form-control" value="client">
                        <input type="text" name="full_name" placeholder="Full name">
{{--                        <label for="social_number" class="social_number">--}}
                            <input type="text" class="ssn" placeholder="Social Security Number">
{{--                        </label>--}}
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
                            <input class="register_password" type="password" name="password" placeholder="Password" readonly
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
                        <input class="register_password_confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
                        <input type="text" name="register_question" placeholder="Choose secret question">

                        <select class="form-control" name="secret_questions_id" id="secret_question">
                            <option disabled="disabled" selected="selected">Choose Secret Question</option>
                            @foreach($secrets as $value)
                                <option value="{{$value->id}}">{{$value->question}}</option>
                            @endforeach
                            <option value="other">
                                Your Own question
                            </option>
                        </select>
                        <div class="none" id="custom-secret-question">
                            <input name="own_secter_question" type="text" class="form-control" placeholder="OWN QUESTION">
                        </div>
                        <input id="secret_answer" type="text" class="form-control " name="secret_answer" value="{{ old('secret_answer') }}" placeholder="PLEASE ANSWER IN SECRET QUESTION">
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
            </div>


        </div>


        @include('helpers.chat')
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/site/clients/registration.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script id="password-requirements" type="text/html">
        <div>
            <ul>
                <li><i class="fa {length-class}"></i> Must be between 8 and 20</li>
                <li><i class="fa {letters-class}"></i> Must contain both upper and lower case letters</li>
                <li><i class="fa {digit-class}"></i> Must contain at least one number digit</li>
                <li><i class="fa {special-class}"></i> Must contain at least one special characters</li>
            </ul>
        </div>
    </script>

@endsection

