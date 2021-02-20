@extends('layouts.layout1')

@section('content')

    <section class="register">
        <img class="background-image" src="img/login_bck.jpg" alt="background">
        <div class="register-form" data-id="1">
            <h3 class="title">Add Client</h3>
            <div class="registration-stages ">
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

            <form id="add_client_2" method="post" data-id="2" class="add-client additional-reg none">
                <input type="email" name="add_email" placeholder="Client E-Mail">
                <input type="tel" name="add_phone" placeholder="Phone Number">
                <input type="text" name="add_gender" placeholder="Gender">
                <div class="select">
                    <select name="add_secret_question" id="add_secret_question" placeholder="">
                        <option disabled selected>Choose Secret Question</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="select">
                    <select name="add_secret_answer" id="add_secret_answer" placeholder="Please Answer In Secret Question">
                        <option disabled selected>Please Answer In Secret Question</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>

                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="basic-button">
                    <input class="login" type="submit" value="Register" name="">
                </div>
            </form>


            <form id="add_client_3" data-id="3" data-type="only_broker" class="add-client additional-reg none">
                <h3 class="title_r">Incorect</h3>
                <div class="upload-images">
                    <div class="upload-img">
                        <img src="img/corect_1.jpg">
                    </div>
                    <div class="upload-img">
                        <img src="img/corect_2.jpg">
                    </div>
                </div>
                <div class="upload-images upload-active">
                    <div class="upload-img" >
                        <p class="upload-title">Upload your identification card or driver license</p>
                        <div class="upload-img-box">
                            <img class="upload-img" id="id_card" src="img/id_card.jpg" alt="">
                            <div class="upload-btn">
                                <button>
                                    <svg width="48" height="44" viewBox="0 0 48 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7437 15.5633H12.886C12.0815 15.5633 11.3599 15.0775 11.0508 14.3355C10.743 13.5937 10.9133 12.7392 11.4818 12.1708L22.5934 1.05595C23.3713 0.281319 24.6287 0.281319 25.405 1.05595L36.5184 12.1708C37.0869 12.7392 37.2571 13.5951 36.951 14.3355C36.6417 15.0789 35.9185 15.5633 35.114 15.5633H30.258V29.9736C30.258 31.4358 29.0725 32.6196 27.6121 32.6196H20.3896C18.9291 32.6196 17.7437 31.4356 17.7437 29.9736V15.5633ZM43.2282 23.351C43.2282 22.0328 44.2964 20.9643 45.6133 20.9643C46.9316 20.9643 48 22.0328 48 23.3511V33.3304C48 38.9517 43.4265 43.5251 37.8051 43.5251H10.1947C4.57324 43.5251 0 38.9516 0 33.3304V23.3511C0 22.0328 1.0683 20.9643 2.3866 20.9643C3.70337 20.9643 4.77325 22.0328 4.77325 23.351V33.3303C4.77325 36.3197 7.20514 38.7516 10.1947 38.7516H37.8051C40.7946 38.7516 43.2282 36.3197 43.2282 33.3303V23.351Z" fill="white"/>
                                    </svg>
                                </button>
                            </div>
                            <input type="file" id="upload_id">
                        </div>
                    </div>
                    <div class="upload-img">
                        <p class="upload-title">Upload your social security</p>
                        <div class="upload-img-box">
                            <img class="upload-img" id="social_card" src="img/social_card.jpg" alt="">
                            <div class="upload-btn">
                                <button>
                                    <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <path d="M17.6661 24.75H14.3328C13.4141 24.75 12.6661 23.9787 12.6661 23.0313V15.125H8.99942C8.12342 15.125 7.66875 14.0374 8.27542 13.3815L15.2754 5.81904C15.6528 5.41204 16.3461 5.41204 16.7234 5.81904L23.7234 13.3815C24.3301 14.0374 23.8754 15.125 22.9994 15.125H19.3328V23.0313C19.3328 23.9787 18.5848 24.75 17.6661 24.75Z" fill="white"/>
                                            <path d="M28 33H4C1.79467 33 0 31.1493 0 28.875V22C0 19.7258 1.79467 17.875 4 17.875H6C6.736 17.875 7.33333 18.491 7.33333 19.25C7.33333 20.009 6.736 20.625 6 20.625H4C3.26533 20.625 2.66667 21.2424 2.66667 22V28.875C2.66667 29.6326 3.26533 30.25 4 30.25H28C28.7347 30.25 29.3333 29.6326 29.3333 28.875V22C29.3333 21.2424 28.7347 20.625 28 20.625H26C25.264 20.625 24.6667 20.009 24.6667 19.25C24.6667 18.491 25.264 17.875 26 17.875H28C30.2053 17.875 32 19.7258 32 22V28.875C32 31.1493 30.2053 33 28 33Z" fill="white"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="32" height="33" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </button>
                            </div>
                            <input type="file" id="upload-social">
                        </div>
                    </div>
                </div>
                <div class="basic-button upload">
                    <input class="login" type="submit" value="Upload" name="">
                </div>
            </form>

            <form id="add_client_4" data-id="4" data-type="only_broker" class="add-client additional-reg none">
                <p>I will provide you the requested login credentials in a timely manner <a href="#">CLICK TO CONTINUE.</a></p>
                <p>If You are Not Register <a href="#">Click here to register</a></p>
                <input type="email" name="credentails_email" placeholder="Login E-mail">
                <input type="password" name="credentails_password" placeholder="Password">

                <div class="login-type-title">
                    <div class="logo-block">
                        <img src="img/experian_logo.png" alt="experian_logo">
                    </div>
                    <p>If You are Not Register <a href="#">Click here to register</a></p>
                </div>
                <input type="text" name="experian_login" placeholder="Username">
                <input type="password" name="experian_password" placeholder="Password">
                <input type="text" name="experian_answer" placeholder="Answer to sequrity question">
                <input type="number" name="transunion_ping" placeholder="4-Digit pin number">

                <div class="login-type-title">
                    <div class="logo-block">
                        <img src="img/transunion_logo.png" alt="transunion_logo">
                    </div>
                    <p>If You are Not Register <a href="#">Click here to register</a></p>
                </div>
                <input type="text" name="transunion_login" placeholder="Username">
                <input type="password" name="transunion_password" placeholder="Password">
                <input type="text" name="transunion_question" placeholder="Sequrity Question">
                <input type="text" name="transunion_answer" placeholder="Sequrity Answer">

                <div class="login-type-title">
                    <div class="logo-block">
                        <img src="img/transunion_logo.png" alt="transunion_2_logo">
                    </div>
                    <p>If You are Not Register <a href="#">Click here to register</a></p>
                </div>
                <input type="text" name="transunion_2_login" placeholder="Username">
                <input type="password" name="transunion_2_password" placeholder="Password">

                <div class="login-type-title">
                    <div class="logo-block">
                        <img src="img/equifax_logo.png" alt="equifax_logo">
                    </div>
                    <p>If You are Not Register <a href="#">Click here to register</a></p>
                </div>
                <input type="text" name="equifax_login" placeholder="Username">
                <input type="password" name="equifax_password" placeholder="Password">

                <div class="basic-button">
                    <input class="login" type="submit" value="Submit" name="">
                </div>
            </form>

            <form id="add_client_5" data-id="5" data-type="only_broker" class="add-client additional-reg none">
                <p>Please verify your information and make changes if necessary</p>
                <input type="text" name="reviews_name" placeholder="Full Name">
                <input type="date" name="reviews_date">
                <input type="tel" name="reviews_phone" placeholder="Phone Number">
                <input type="number" name="reviews_securty_number" placeholder="Social security number">
                <input type="text" name="reviews_address" placeholder="Current street address">
                <input type="text" name="reviews_gender" placeholder="Gender">

                <div class="basic-button">
                    <input class="login" type="submit" value="Submit" name="">
                </div>
            </form>

            <div class="finish none" data-id="finish">
                <h3 class="finish-title">
                    Congrats! You just did something really wise
                </h3>
                <p>“Debt means enslavement to the past, no matter how much you want to plan well for the future and live according to your own standards today. Unless you’re free from the bondage of paying for your past, you can’t responsibly live in the present and plan for the future.” - Tsh Oxenreider</p>
                <div class="finish-img">
                    <div class="img-block">
                        <img src="img/finish.png" alt="finish">
                    </div>
                </div>
                <a class="finish-reg" href="">Continue</a>
            </div>
        </div>


        <div class="chat" id="chat">
            <div class="header" id="chat_header">
                <svg width="368" viewBox="0 0 368 52" xmlns="http://www.w3.org/2000/svg">
                    <path d="M26 22.5049C19.6 42.9049 6 50.0049 0 51.0049H368C352 49.5049 342 21.0049 341.5 21.5049C333.1 3.90485 315 -0.161814 307 0.00485253C223 0.171519 55 0.404853 55 0.00485253C37.4 0.404853 28.3333 15.1715 26 22.5049Z" fill="url(#paint0_linear)"/>
                    <defs>
                        <linearGradient id="paint0_linear" x1="16.5" y1="26" x2="353" y2="26" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#F63565"/>
                            <stop offset="1" stop-color="#FA6642"/>
                        </linearGradient>
                    </defs>
                </svg>
                <p>
                    <svg width="28" height="28" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.625 5.25H6.125C5.642 5.25 5.25 5.642 5.25 6.125C5.25 6.608 5.642 7 6.125 7H16.625C17.108 7 17.5 6.608 17.5 6.125C17.5 5.642 17.108 5.25 16.625 5.25Z" fill="white"/>
                        <path d="M13.125 8.75H6.125C5.642 8.75 5.25 9.142 5.25 9.625C5.25 10.108 5.642 10.5 6.125 10.5H13.125C13.608 10.5 14 10.108 14 9.625C14 9.142 13.608 8.75 13.125 8.75Z" fill="white"/>
                        <path d="M19.25 0H3.5C1.56975 0 0 1.56975 0 3.5V21C0 21.3395 0.196 21.6493 0.504 21.7927C0.62125 21.847 0.749 21.875 0.875 21.875C1.07625 21.875 1.27575 21.805 1.435 21.672L6.44175 17.5H19.25C21.1803 17.5 22.75 15.9303 22.75 14V3.5C22.75 1.56975 21.1803 0 19.25 0ZM21 14C21 14.9642 20.216 15.75 19.25 15.75H6.125C5.92025 15.75 5.7225 15.8218 5.565 15.953L1.75 19.1327V3.5C1.75 2.53575 2.534 1.75 3.5 1.75H19.25C20.216 1.75 21 2.53575 21 3.5V14Z" fill="white"/>
                        <path d="M24.5 7C24.017 7 23.625 7.392 23.625 7.875C23.625 8.358 24.017 8.75 24.5 8.75C25.466 8.75 26.25 9.53575 26.25 10.5V25.3032L23.296 22.9408C23.142 22.8183 22.9478 22.75 22.75 22.75H10.5C9.534 22.75 8.75 21.9642 8.75 21V20.125C8.75 19.642 8.358 19.25 7.875 19.25C7.392 19.25 7 19.642 7 20.125V21C7 22.9303 8.56975 24.5 10.5 24.5H22.442L26.5773 27.8092C26.7365 27.9352 26.9307 28 27.125 28C27.2528 28 27.3822 27.972 27.5047 27.9142C27.8075 27.7673 28 27.461 28 27.125V10.5C28 8.56975 26.4303 7 24.5 7Z" fill="white"/>
                    </svg>
                    <span id="chat_header_hide_text" >
						Talk to us, we are online!
					</span>
                </p>
            </div>
            <div class="body" id="chat_body">
                <div class="chat-title">
                    <h3>Chat</h3>
                    <div id="chat_close">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.1988 12.0197L23.5439 2.6743C24.1521 2.06642 24.1521 1.08357 23.5439 0.475685C22.936 -0.132195 21.9532 -0.132195 21.3453 0.475685L11.9999 9.82109L2.65474 0.475685C2.04658 -0.132195 1.064 -0.132195 0.456124 0.475685C-0.152041 1.08357 -0.152041 2.06642 0.456124 2.6743L9.80125 12.0197L0.456124 21.3651C-0.152041 21.973 -0.152041 22.9559 0.456124 23.5637C0.759068 23.867 1.15739 24.0193 1.55543 24.0193C1.95347 24.0193 2.35152 23.867 2.65474 23.5637L11.9999 14.2183L21.3453 23.5637C21.6485 23.867 22.0466 24.0193 22.4446 24.0193C22.8426 24.0193 23.2407 23.867 23.5439 23.5637C24.1521 22.9559 24.1521 21.973 23.5439 21.3651L14.1988 12.0197Z"/>
                        </svg>
                    </div>

                </div>
                <form action="" id="chat_form">
                    <p>You can write your questions on our online portal. Our experts will help you find answers to your questions.</p>
                    <input type="text" placeholder="Your full name">
                    <div class="contact">
                        <label for="email" class="email-label">
                            <input type="email" id="email" placeholder="E-mail Address">
                        </label>
                        <p>or</p>
                        <label for="phone" class="phone-label">
                            <input type="tel" id="phone" disabled placeholder="Phone Number">
                        </label>
                    </div>
                    <textarea placeholder="write your message" cols="30" rows="10"></textarea>
                    <div class="form-submit">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </section>








    @include('helpers.breadcrumbs', ['title'=> "Registration Steps", 'route' => ["Home"=> '#', $client->clientDetails->registration_steps =="credentials" ?"Credit Bureau Login Credentials":"Registration Steps" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        @include('helpers.steps')
                        @include("client_details.registration_steps.{$client->clientDetails->registration_steps}")
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
