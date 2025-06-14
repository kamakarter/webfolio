@extends('app')

@section('content')
    <!-- user header -->
    <section class="user-header" id="user-header">
        <div class="container">

            <div class="upload_box">
                <a href="{{ route('show.add.user.background') }}" class="upload_icon user-bg-upload-icon">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 11.6667V15.2222C17 15.6937 16.8127 16.1459 16.4793 16.4793C16.1459 16.8127 15.6937 17 15.2222 17H2.77778C2.30628 17 1.8541 16.8127 1.5207 16.4793C1.1873 16.1459 1 15.6937 1 15.2222V11.6667M4.55556 7.22222L9 11.6667M9 11.6667L13.4444 7.22222M9 11.6667V1" stroke="#344054" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            
        </div>

        @if (Auth::user()->user_bg)
                <img src="{{ 'backgrounds/' . Auth::user()->user_bg }}" alt="user-background" class="user-header-bg">
            @endif
    </section>

    <!-- user base data -->
    <section class="user_base_data_box">
        <div class="container user_base_container">
            <div class="user_base_data">
                <div class="user_avatar_frame">
                    <a href="{{ route('show.upload.user.avatar') }}" class="user-avatar_edit_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                            fill="none">
                            <path
                                d="M0 11.0829V14H2.91707L11.5244 5.39269L8.60731 2.47562L0 11.0829ZM13.7725 3.1446C14.0758 2.84123 14.0758 2.34727 13.7725 2.0439L11.9561 0.227532C11.6527 -0.0758439 11.1588 -0.0758439 10.8554 0.227532L9.43187 1.65106L12.3489 4.56813L13.7725 3.1446Z"
                                fill="white" />
                        </svg>
                    </a>
                    @if (Auth::user()->user_avatar)
                        <img src="{{ Auth::user()->user_avatar }}" alt="user-avatar" class="user-avatar">
                    @else
                        <img src="{{ asset('icons/default_avatar.svg') }}" alt="user-avatar" class="user-avatar">
                    @endif
                    <style>
                        .user-avatar {
                            overflow: hidden;
                            border-radius: 90px;
                        }
                    </style>
                </div>

                <div class="user_data">
                    <p class="username_and_surname">
                        @if (Auth::user()->name)
                            {{ Auth::user()->name }} {{ Auth::user()->surname }}
                        @else
                            <p class="username_and_surname"> Имя и фамилия не указаны.</p>
                        @endif

                    </p>
                    <div class="user-country_and_city_box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                            fill="none">
                            <g clip-path="url(#clip0_219_1333)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2 6.5V6.79266C2 8.22154 2.4863 9.60788 3.37892 10.7236L7.60956 16.012C7.80973 16.2622 8.19027 16.2622 8.39044 16.012L12.6211 10.7236C13.5137 9.60788 14 8.22154 14 6.79266V6.5C14 3.18629 11.3137 0.5 8 0.5C4.68629 0.5 2 3.18629 2 6.5ZM8 8.5C9.10457 8.5 10 7.60457 10 6.5C10 5.39543 9.10457 4.5 8 4.5C6.89543 4.5 6 5.39543 6 6.5C6 7.60457 6.89543 8.5 8 8.5Z"
                                    fill="#D0D5DD" />
                            </g>
                            <defs>
                                <clipPath id="clip0_219_1333">
                                    <rect width="16" height="16" fill="white" transform="translate(0 0.5)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="user-country_and_city">
                            @if (Auth::user()->country && Auth::user()->city)
                            {{ Auth::user()->country}}, {{ Auth::user()->city }}
                            @else
                                <p class="user-country_and_city"> У вас нет информации о стране и городе.</p>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="user_base_actions">
                <a href="{{ route('show.edit.user.data', Auth::user()->id) }}" class="btn btn-2 btn-s">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                        fill="none">
                        <path
                            d="M0 11.0829V14H2.91707L11.5244 5.39269L8.60731 2.47562L0 11.0829ZM13.7725 3.1446C14.0758 2.84123 14.0758 2.34727 13.7725 2.0439L11.9561 0.227532C11.6527 -0.0758439 11.1588 -0.0758439 10.8554 0.227532L9.43187 1.65106L12.3489 4.56813L13.7725 3.1446Z"
                            fill="#D0D5DD" />
                    </svg>
                    Редактировать профиль
                </a>

                <a href="{{ route('show.user.account', Auth::user()->login) }}" class="btn btn-s btn-1" id="ShareMyProfile" onclick="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" viewBox="0 0 15 12"
                        fill="none">
                        <path
                            d="M14.5612 4.70198L9.76122 0.338342C9.39759 -0.025294 8.96122 0.338342 8.96122 0.920161V3.10198C5.54304 3.10198 2.63395 5.21107 1.25213 8.04743C0.743042 8.99289 0.452133 10.0111 0.233951 11.0293C0.0884963 11.7565 1.17941 12.1202 1.61577 11.4656C3.21577 8.92016 5.90668 7.24743 8.96122 7.24743V9.64743C8.96122 10.2293 9.39759 10.5929 9.76122 10.2293L14.5612 5.86562C14.8521 5.57471 14.8521 4.99289 14.5612 4.70198Z"
                            fill="white" />
                    </svg>
                    Посмотреть резюме
                </a>
            </div>
        </div>
    </section>

    <!-- user resume -->
    <section class="user-resume" id="user-resume">
        <div class="container">
            <hr color="#E6E6E8" width="100%" size="1px" align="center" />

            <div class="user_resume_box">
                <div class="user_resume_info">
                    <h4 class="user-title">Обо мне</h4>
                    @if (Auth::user()->about_me)
                        <div class="placeholder_for_user_data_about">
                            <p class="user_data_about">
                                {{ Auth::user()->about_me }}
                            </p>

                        </div>
                        @if (strlen(Auth::user()->about_me) > 160)
                            <a class="btn_for_user_data_about">Раскрыть описание</a>
                        @endif
                    @else
                        <div class="placeholder_for_user_data_about">
                            <p class="user_data_about">
                                У вас пока нет информации о себе. Добавьте информацию через редактирование профиля.
                            </p>
                        </div>
                    @endif

                        <!-- skills -->
                        <div class="user_skills_box">
                            <h4 class="user-title">Навыки</h4>
                            @if (Auth::user()->stack)
                                <div class="skills_box">
                                    @foreach (explode(',', Auth::user()->stack) as $skill)
                                        <div class="user-skill-box">
                                            <div class="user-skill">{{ trim($skill) }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="placeholder_for_user_data_about">
                                    <p class="user_data_about">
                                        У вас пока нет информации о навыках. Добавьте информацию через редактирование профиля.
                                    </p>
                                </div>
                            @endif
                        </div>
                </div>

                <div class="user_resume_links">
                    @if (Auth::user()->login)
                        <!-- webfolio link -->
                        <div class="user-link_box">
                            <div class="user-link_box_head">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path
                                        d="M0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8C16 12.4183 12.4183 16 8 16H0V8Z"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.06667 14.9333H8C11.8292 14.9333 14.9333 11.8292 14.9333 8C14.9333 4.17083 11.8292 1.06667 8 1.06667C4.17083 1.06667 1.06667 4.17083 1.06667 8V14.9333ZM8 0C3.58172 0 0 3.58172 0 8V16H8C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0Z"
                                        fill="#2A3346" />
                                    <path
                                        d="M5.40088 11.7334L3.73438 5.8667H5.0801L6.04636 9.94187H6.09721L7.15736 5.8667H8.31139L9.37154 9.95368H9.42239L10.3887 5.8667H11.7344L10.064 11.7334H8.86298L7.7598 7.89838H7.71286L6.60577 11.7334H5.40088Z"
                                        fill="#2A3346" />
                                </svg>

                                Ссылка на резюме
                            </div>

                            <a href="{{ $serverUrl = request()->getSchemeAndHttpHost(); }}{{ Auth::user()->login }}" class="user-link" target="_blank">
                                <div class="user-link_placeholder">
                                    {{ '/' .  Auth::user()->login }}
                                </div>
                                {{-- <a href="{{ route('copy.link', Auth::user()->login) }}" class="" target="_blank">
                                    
                                </a> --}}
                            </a>
                        </div>
                    @endif

                    @if (Auth::user()->social_email)
                        <!-- email -->
                        <div class="user-link_box">
                            <div class="user-link_box_head">
                                <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.334687 3.58418C0.188989 3.49312 0 3.59787 0 3.76968V10.375C0 10.8582 0.391751 11.25 0.875 11.25H13.125C13.6082 11.25 14 10.8582 14 10.375V3.76968C14 3.59787 13.811 3.49312 13.6653 3.58418L7.23187 7.60508C7.09001 7.69375 6.90999 7.69375 6.76813 7.60508L0.334687 3.58418Z"
                                        fill="#D0D5DD" />
                                    <path
                                        d="M0 1.43513C0 1.55325 0.0608466 1.66303 0.161007 1.72563L6.53625 5.71016C6.81999 5.88749 7.18001 5.88749 7.46375 5.71016L13.839 1.72563C13.9392 1.66303 14 1.55325 14 1.43513C14 1.05674 13.6933 0.75 13.3149 0.75H0.685133C0.306745 0.75 0 1.05674 0 1.43513Z"
                                        fill="#D0D5DD" />
                                </svg>


                                Почта для связи
                            </div>

                            <a href="mailto:{{ Auth::user()->social_email }}" class="user-link" target="_blank">
                                <div class="user-link_placeholder">
                                    {{ Auth::user()->social_email }}
                                </div>

                                <svg class="user-link_arrow" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M14.2049 12.6736L14.2049 7.23436M14.2049 7.23436H8.76564M14.2049 7.23436L5.71964 15.7196"
                                        stroke="#46A7FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    @endif

                    @if (Auth::user()->phone)
                        <!-- phone -->

                        <div class="user-link_box">
                            <div class="user-link_box_head">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_242_895)">
                                        <path
                                            d="M15.975 12.0939L15.2484 15.2439C15.1464 15.6892 14.755 16.0008 14.2966 16.0008C6.4125 16.0002 0 9.58768 0 1.70331C0 1.24518 0.311531 0.853309 0.756875 0.751746L3.90687 0.025184C4.36562 -0.0811285 4.83437 0.156996 5.025 0.591434L6.47875 3.98206C6.64869 4.38143 6.53406 4.84675 6.19812 5.12112L4.51562 6.47206C5.5775 8.63518 7.33625 10.3939 9.5 11.4564L10.8775 9.77518C11.149 9.43831 11.6178 9.32175 12.0172 9.49472L15.4078 10.9482C15.8156 11.1627 16.0812 11.6377 15.975 12.0939Z"
                                            fill="#D0D5DD" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_242_895">
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                Номер телефона
                            </div>


                            <a href="tel:{{ preg_replace('/[^0-9]/', '', Auth::user()->phone) }}" class="user-link" target="_blank">
                                <div class="user-link_placeholder">
                                    {{ Auth::user()->phone }}
                                </div>
                                <svg class="user-link_arrow" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M14.2049 12.6736L14.2049 7.23436M14.2049 7.23436H8.76564M14.2049 7.23436L5.71964 15.7196"
                                        stroke="#46A7FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>

                        </div>
                    @endif

                    <!-- Telegram -->
                    @if (Auth::user()->telegram_link)
                        <div class="user-link_box">
                            <div class="user-link_box_head">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20"
                                    viewBox="0 0 16 20" fill="none">
                                    <g clip-path="url(#clip0_242_886)">
                                        <path
                                            d="M15.953 4.37868L13.5387 15.7644C13.3566 16.568 12.8816 16.768 12.2066 16.3894L8.52799 13.6787L6.75299 15.3858C6.55656 15.5822 6.39227 15.7465 6.0137 15.7465L6.27799 12.0001L13.0958 5.83939C13.3923 5.5751 13.0316 5.42868 12.6351 5.69296L4.20656 11.0001L0.577988 9.86439C-0.211297 9.61796 -0.225583 9.07511 0.742274 8.69653L14.9351 3.22868C15.5923 2.98225 16.1673 3.3751 15.953 4.37868Z"
                                            fill="#D0D5DD" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_242_886">
                                            <rect width="16" height="18.2857" fill="white"
                                                transform="translate(0 0.857422)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                Telegram
                            </div>

                            <a href="https://t.me/{{ Auth::user()->telegram_link }}" class="user-link" target="_blank">
                                <div class="user-link_placeholder">
                                    {{'t.me/' . Auth::user()->telegram_link }}
                                </div>
                                <svg class="user-link_arrow" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M14.2049 12.6736L14.2049 7.23436M14.2049 7.23436H8.76564M14.2049 7.23436L5.71964 15.7196"
                                        stroke="#46A7FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    @endif

                    <!-- WhatsApp -->
                    @if (Auth::user()->whatsapp_link)
                        <div class="user-link_box">
                            <div class="user-link_box_head">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.6035 2.32516C12.1066 0.826537 10.1159 0.000868955 7.995 0C3.62496 0 0.0681968 3.55647 0.066491 7.92786C0.0658796 9.32527 0.430969 10.6892 1.12481 11.8916L0 16L4.20301 14.8975C5.36103 15.5291 6.66488 15.8621 7.99184 15.8625H7.99506C12.3646 15.8625 15.9217 12.3057 15.9235 7.9342C15.9243 5.81569 15.1004 3.82372 13.6035 2.32516Z"
                                        fill="#D0D5DD" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.5941 9.48342C11.3973 9.39057 10.4295 8.94183 10.2491 8.87987C10.0687 8.81796 9.93749 8.78701 9.80629 8.97272C9.67509 9.15841 9.29787 9.57631 9.18304 9.70015C9.06824 9.8239 8.95339 9.83948 8.7566 9.74653C8.55979 9.65368 7.92557 9.45781 7.17378 8.82577C6.58861 8.33381 6.19361 7.72634 6.07875 7.54057C5.96395 7.35488 6.06653 7.25449 6.16508 7.16196C6.25363 7.07881 6.36193 6.9453 6.46035 6.83695C6.55874 6.72866 6.59155 6.65121 6.65717 6.52749C6.72278 6.40365 6.69001 6.2953 6.64076 6.20247C6.59155 6.10961 6.19792 5.19647 6.03392 4.82495C5.8741 4.46326 5.71185 4.51227 5.59101 4.50651C5.47638 4.50111 5.34499 4.5 5.21379 4.5C5.08259 4.5 4.86931 4.54644 4.68893 4.73213C4.50852 4.91787 4 5.36673 4 6.27978C4 7.19295 4.7053 8.0751 4.80372 8.19888C4.90212 8.32275 6.19166 10.1965 8.16613 11.0001C8.63573 11.1913 9.00237 11.3054 9.28821 11.3909C9.75973 11.5321 10.1888 11.5122 10.528 11.4644C10.9061 11.4112 11.6925 11.0156 11.8565 10.5823C12.0206 10.1489 12.0206 9.77746 11.9713 9.70012C11.9221 9.62275 11.7909 9.57631 11.5941 9.48342Z"
                                        fill="white" />
                                </svg>
                                WhatsApp
                            </div>

                            <a href="{{ 'https://wa.me/' . preg_replace('/[^0-9]/', '', Auth::user()->whatsapp_link) }}" class="user-link"
                                target="_blank">
                                <div class="user-link_placeholder">
                                    {{ 'wa.me/' . preg_replace('/[^0-9]/', '', Auth::user()->whatsapp_link) }}
                                </div>
                                <svg class="user-link_arrow" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M14.2049 12.6736L14.2049 7.23436M14.2049 7.23436H8.76564M14.2049 7.23436L5.71964 15.7196"
                                        stroke="#46A7FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    @endif

                    <!-- GitHub -->
                    @if (Auth::user()->github_link)
                        <div class="user-link_box">
                            <div class="user-link_box_head">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 0C3.58214 0 0 3.67143 0 8.20357C0 11.8286 2.29286 14.9 5.47143 15.9857C5.87143 16.0607 6.01786 15.8071 6.01786 15.5893C6.01786 15.3929 6.01071 14.8786 6.00714 14.6929C3.78214 14.6893 3.31071 13.0929 3.31071 13.0929C2.94643 12.1464 2.42143 11.8929 2.42143 11.8929C1.69643 11.3821 2.475 11.3929 2.475 11.3929C3.27857 11.95 3.7 12.7393 3.7 12.7393C4.41429 13.9929 5.57143 13.6321 6.02857 13.4214C6.1 12.8929 6.30714 12.5286 6.53571 12.325C4.76071 12.1179 2.89286 11.4143 2.89286 8.27143C2.89286 7.375 3.20357 6.64286 3.71429 6.07143C3.63214 5.86429 3.35714 5.02857 3.79286 3.9C3.79286 3.9 4.46429 3.67857 5.99286 4.73929C6.63214 4.55714 7.31429 4.46786 7.99643 4.46429C8.675 4.46786 9.36071 4.55714 10 4.73929C11.5286 3.67857 12.1964 3.9 12.1964 3.9C12.6321 5.02857 12.3571 5.86429 12.275 6.07143C12.7857 6.64643 13.0964 7.37857 13.0964 8.27143C13.0964 11.4214 11.225 12.1143 9.44286 12.3179C9.72857 12.5714 9.98571 13.0714 9.98571 13.8357C9.98571 14.9321 9.975 15.8179 9.975 16.0857C9.975 16.3036 10.1179 16.5607 10.525 16.4786C13.7107 15.3964 16 12.325 16 8.70357C16 4.17143 12.4179 0.5 8 0.5Z"
                                        fill="#D0D5DD" />
                                </svg>
                                GitHub
                            </div>

                            <a href="{{ 'https://github.com/' . Auth::user()->github_link }}" class="user-link"
                                target="_blank">
                                <div class="user-link_placeholder">
                                    {{ 'github.com/' . Auth::user()->github_link }}
                                </div>
                                <svg class="user-link_arrow" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M14.2049 12.6736L14.2049 7.23436M14.2049 7.23436H8.76564M14.2049 7.23436L5.71964 15.7196"
                                        stroke="#46A7FE" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- user experience -->
    <section class="user-exp" id="user-exp">
        <div class="container">
            <hr color="#E6E6E8" width="100%" size="1px" align="center" class="user-divider"> 

            <div class="user-title-box">
                <p class="user-title">Опыт работы</p>
                <a href="{{ route('show.add.user.experience') }}" class="base-btn-action">
                    <div class="base-btn-action-plus-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                            <path d="M7.80204 4.44428H5.55552V2.19775C5.55552 1.90435 5.30725 1.6665 4.99996 1.6665C4.69267 1.6665 4.4444 1.90435 4.4444 2.19775V4.44428H2.19788C1.90447 4.44428 1.66663 4.69255 1.66663 4.99984C1.66663 5.30713 1.90447 5.55539 2.19788 5.55539H4.4444V7.80192C4.4444 8.09532 4.69267 8.33317 4.99996 8.33317C5.30725 8.33317 5.55552 8.09532 5.55552 7.80192V5.55539H7.80204C8.09545 5.55539 8.33329 5.30713 8.33329 4.99984C8.33329 4.69255 8.09545 4.44428 7.80204 4.44428Z" fill="white"/>
                        </svg>
                    </div>
                    <div class="base-btn-action-content">
                        Добавить опыт
                    </div>
                </a>
            </div>
            @if ($experiences->count() > 0)
                <div class="user-exp_box">
                    {{-- card of experience --}}
                    @foreach ($experiences as $experience)
                        <div class="user-exp_card">
                            <div class="user-exp_information">
                                <!-- <img src="" alt=""> -->
                                <div class="user-exp_header_with_info_about_company">
                                    @if ($experience->company_logotype)
                                    <div class="user-exp_company_logo">    
                                        <img src="{{ asset('company_logotypes/' . $experience->company_logotype) }}" alt="Логотип компании" class="user-exp_company_logo_img">
                                    </div>
                                    @endif

                                    <div class="user-exp_company_info">
                                        <p class="user-exp_job">
                                            {{ $experience->profession }}
                                        </p>
                                        <p class="user-exp_company">
                                            {{$experience->company_name }}
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="user-exp_date_box">
                                    <p class="user-exp_start">
                                        
                                        {{ \Carbon\Carbon::parse($experience->start_date)->translatedFormat('j F Y') }}

                                    </p>
                                    —
                                    <p class="user-exp_end">
                                        {{ \Carbon\Carbon::parse($experience->end_date)->translatedFormat('j F Y') }}
                                    </p>
                                </div>

                                @php
                                    $tasks = explode(',', $experience->tasks);
                                @endphp

                                <!-- tasks -->
                                <ul class="exp-task">
                                    

                                    @foreach($tasks as $task)
                                        <li>{{ trim($task) }}</li>
                                    @endforeach
                                    
                                </ul>
                            </div>

                            <div class="user-exp_actions">
                                <!-- удаление опыта -->
                                <a href="{{ route('show.delete.user.experience', $experience->id) }}"
                                    class="user-exp_action delete-experience" title="Удалить">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20" fill="none">
                                        <path d="M10.9091 19.4545H5.09091C4.12649 19.4545 3.20156 19.0714 2.51961 18.3894C1.83766 17.7075 1.45455 16.7826 1.45455 15.8181V7.09086C1.45455 6.89798 1.53117 6.713 1.66756 6.57661C1.80395 6.44021 1.98893 6.36359 2.18182 6.36359C2.3747 6.36359 2.55969 6.44021 2.69608 6.57661C2.83247 6.713 2.90909 6.89798 2.90909 7.09086V15.8181C2.90909 16.3968 3.13896 16.9517 3.54813 17.3609C3.9573 17.7701 4.51226 18 5.09091 18H10.9091C11.4877 18 12.0427 17.7701 12.4519 17.3609C12.861 16.9517 13.0909 16.3968 13.0909 15.8181V7.09086C13.0909 6.89798 13.1675 6.713 13.3039 6.57661C13.4403 6.44021 13.6253 6.36359 13.8182 6.36359C14.0111 6.36359 14.1961 6.44021 14.3324 6.57661C14.4688 6.713 14.5455 6.89798 14.5455 7.09086V15.8181C14.5455 16.7826 14.1623 17.7075 13.4804 18.3894C12.7984 19.0714 11.8735 19.4545 10.9091 19.4545Z" fill="white"/>
                                        <path d="M15.2727 4.90905H0.727273C0.534388 4.90905 0.349403 4.83242 0.213013 4.69603C0.0766233 4.55964 0 4.37466 0 4.18177C0 3.98889 0.0766233 3.8039 0.213013 3.66751C0.349403 3.53112 0.534388 3.4545 0.727273 3.4545H15.2727C15.4656 3.4545 15.6506 3.53112 15.787 3.66751C15.9234 3.8039 16 3.98889 16 4.18177C16 4.37466 15.9234 4.55964 15.787 4.69603C15.6506 4.83242 15.4656 4.90905 15.2727 4.90905Z" fill="white"/>
                                        <path d="M10.9091 4.90905H5.09091C4.89802 4.90905 4.71304 4.83242 4.57665 4.69603C4.44026 4.55964 4.36364 4.37466 4.36364 4.18177V2.72723C4.36364 2.14857 4.59351 1.59362 5.00268 1.18445C5.41185 0.77528 5.9668 0.54541 6.54545 0.54541H9.45455C10.0332 0.54541 10.5882 0.77528 10.9973 1.18445C11.4065 1.59362 11.6364 2.14857 11.6364 2.72723V4.18177C11.6364 4.37466 11.5597 4.55964 11.4234 4.69603C11.287 4.83242 11.102 4.90905 10.9091 4.90905ZM5.81818 3.4545H10.1818V2.72723C10.1818 2.53434 10.1052 2.34936 9.96881 2.21297C9.83242 2.07658 9.64743 1.99996 9.45455 1.99996H6.54545C6.35257 1.99996 6.16759 2.07658 6.0312 2.21297C5.89481 2.34936 5.81818 2.53434 5.81818 2.72723V3.4545Z" fill="white"/>
                                        <path d="M6.54545 15.0909C6.35257 15.0909 6.16759 15.0142 6.0312 14.8779C5.89481 14.7415 5.81818 14.5565 5.81818 14.3636V9.27268C5.81818 9.0798 5.89481 8.89481 6.0312 8.75842C6.16759 8.62203 6.35257 8.54541 6.54545 8.54541C6.73834 8.54541 6.92332 8.62203 7.05971 8.75842C7.1961 8.89481 7.27273 9.0798 7.27273 9.27268V14.3636C7.27273 14.5565 7.1961 14.7415 7.05971 14.8779C6.92332 15.0142 6.73834 15.0909 6.54545 15.0909Z" fill="white"/>
                                        <path d="M9.45455 15.0909C9.26166 15.0909 9.07668 15.0142 8.94029 14.8779C8.8039 14.7415 8.72727 14.5565 8.72727 14.3636V9.27268C8.72727 9.0798 8.8039 8.89481 8.94029 8.75842C9.07668 8.62203 9.26166 8.54541 9.45455 8.54541C9.64743 8.54541 9.83242 8.62203 9.96881 8.75842C10.1052 8.89481 10.1818 9.0798 10.1818 9.27268V14.3636C10.1818 14.5565 10.1052 14.7415 9.96881 14.8779C9.83242 15.0142 9.64743 15.0909 9.45455 15.0909Z" fill="white"/>
                                    </svg>  
                                    Удалить
                                </a>
                                <!-- редактирование опыта -->
                                <a href="{{ route('show.edit.user.experience', $experience->id) }}" class="user-exp_action edit-experience" title="Изменить">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                        <path d="M0 11.0829V14H2.91707L11.5244 5.39269L8.60731 2.47562L0 11.0829ZM13.7725 3.1446C14.0758 2.84123 14.0758 2.34727 13.7725 2.0439L11.9561 0.227532C11.6527 -0.0758439 11.1588 -0.0758439 10.8554 0.227532L9.43187 1.65106L12.3489 4.56813L13.7725 3.1446Z" fill="white"/>
                                    </svg>

                                    Изменить
                                </a>
                            </div>
                        </div>
                    @endforeach

            @else
                        <div class="placeholder_for_user_data_about">
                            <p class="user_data_about">
                                У вас пока нет информации об опыте работы.
                            </p>
                        </div>
            @endif
            {{-- add experience button --}}
            {{-- <a href="" class="user-project-add">
                <div class="add-inner-box">
                    <svg width="44" height="45" viewBox="0 0 44 45" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect y="0.5" width="44" height="44" rx="14.6667" fill="#46A7FE" />
                        <path
                            d="M29.7083 20.9719H23.5304V14.7939C23.5304 13.9871 22.8477 13.333 22.0026 13.333C21.1576 13.333 20.4748 13.9871 20.4748 14.7939V20.9719H14.2969C13.49 20.9719 12.8359 21.6546 12.8359 22.4997C12.8359 23.3447 13.49 24.0275 14.2969 24.0275H20.4748V30.2054C20.4748 31.0123 21.1576 31.6663 22.0026 31.6663C22.8477 31.6663 23.5304 31.0123 23.5304 30.2054V24.0275H29.7083C30.5152 24.0275 31.1693 23.3447 31.1693 22.4997C31.1693 21.6546 30.5152 20.9719 29.7083 20.9719Z"
                            fill="white" />
                    </svg>

                    <p>Добавить опыт работы</p>
                </div>
            </a> --}}
        </div>
        </div>
    </section>

    <!-- user projects -->
    <section class="user-projects" id="user-projects">
        <div class="container">
            <hr color="#E6E6E8" width="100%" size="1px" align="center" class="user-divider"> 

            <div class="user-title-box">
                <p class="user-title">Проекты</p>
                <a href="{{ route('show.add.user.project') }}" class="base-btn-action">
                    <div class="base-btn-action-plus-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                            <path d="M7.80204 4.44428H5.55552V2.19775C5.55552 1.90435 5.30725 1.6665 4.99996 1.6665C4.69267 1.6665 4.4444 1.90435 4.4444 2.19775V4.44428H2.19788C1.90447 4.44428 1.66663 4.69255 1.66663 4.99984C1.66663 5.30713 1.90447 5.55539 2.19788 5.55539H4.4444V7.80192C4.4444 8.09532 4.69267 8.33317 4.99996 8.33317C5.30725 8.33317 5.55552 8.09532 5.55552 7.80192V5.55539H7.80204C8.09545 5.55539 8.33329 5.30713 8.33329 4.99984C8.33329 4.69255 8.09545 4.44428 7.80204 4.44428Z" fill="white"/>
                        </svg>
                    </div>
                    <div class="base-btn-action-content">
                        Добавить проект
                    </div>
                </a>
            </div>


            <div class="user-projects_box">

                {{-- card of project --}}
                @if ($projects->count() > 0)
                    @foreach ($projects as $project)
                        <div class="user-project-card">
                            <div class="user-project-cover">
                                <img class="cover-image" src="{{ $project->cover }}" alt="cover">

                                <div class="user-exp_actions">
                                    <!-- удаление опыта -->
                                    <a href="{{ route('show.delete.user.project', $project->id) }}" class="user-exp_action circle delete-experience" title="Удалить">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20" fill="none">
                                            <path d="M10.9091 19.4545H5.09091C4.12649 19.4545 3.20156 19.0714 2.51961 18.3894C1.83766 17.7075 1.45455 16.7826 1.45455 15.8181V7.09086C1.45455 6.89798 1.53117 6.713 1.66756 6.57661C1.80395 6.44021 1.98893 6.36359 2.18182 6.36359C2.3747 6.36359 2.55969 6.44021 2.69608 6.57661C2.83247 6.713 2.90909 6.89798 2.90909 7.09086V15.8181C2.90909 16.3968 3.13896 16.9517 3.54813 17.3609C3.9573 17.7701 4.51226 18 5.09091 18H10.9091C11.4877 18 12.0427 17.7701 12.4519 17.3609C12.861 16.9517 13.0909 16.3968 13.0909 15.8181V7.09086C13.0909 6.89798 13.1675 6.713 13.3039 6.57661C13.4403 6.44021 13.6253 6.36359 13.8182 6.36359C14.0111 6.36359 14.1961 6.44021 14.3324 6.57661C14.4688 6.713 14.5455 6.89798 14.5455 7.09086V15.8181C14.5455 16.7826 14.1623 17.7075 13.4804 18.3894C12.7984 19.0714 11.8735 19.4545 10.9091 19.4545Z" fill="white"/>
                                            <path d="M15.2727 4.90905H0.727273C0.534388 4.90905 0.349403 4.83242 0.213013 4.69603C0.0766233 4.55964 0 4.37466 0 4.18177C0 3.98889 0.0766233 3.8039 0.213013 3.66751C0.349403 3.53112 0.534388 3.4545 0.727273 3.4545H15.2727C15.4656 3.4545 15.6506 3.53112 15.787 3.66751C15.9234 3.8039 16 3.98889 16 4.18177C16 4.37466 15.9234 4.55964 15.787 4.69603C15.6506 4.83242 15.4656 4.90905 15.2727 4.90905Z" fill="white"/>
                                            <path d="M10.9091 4.90905H5.09091C4.89802 4.90905 4.71304 4.83242 4.57665 4.69603C4.44026 4.55964 4.36364 4.37466 4.36364 4.18177V2.72723C4.36364 2.14857 4.59351 1.59362 5.00268 1.18445C5.41185 0.77528 5.9668 0.54541 6.54545 0.54541H9.45455C10.0332 0.54541 10.5882 0.77528 10.9973 1.18445C11.4065 1.59362 11.6364 2.14857 11.6364 2.72723V4.18177C11.6364 4.37466 11.5597 4.55964 11.4234 4.69603C11.287 4.83242 11.102 4.90905 10.9091 4.90905ZM5.81818 3.4545H10.1818V2.72723C10.1818 2.53434 10.1052 2.34936 9.96881 2.21297C9.83242 2.07658 9.64743 1.99996 9.45455 1.99996H6.54545C6.35257 1.99996 6.16759 2.07658 6.0312 2.21297C5.89481 2.34936 5.81818 2.53434 5.81818 2.72723V3.4545Z" fill="white"/>
                                            <path d="M6.54545 15.0909C6.35257 15.0909 6.16759 15.0142 6.0312 14.8779C5.89481 14.7415 5.81818 14.5565 5.81818 14.3636V9.27268C5.81818 9.0798 5.89481 8.89481 6.0312 8.75842C6.16759 8.62203 6.35257 8.54541 6.54545 8.54541C6.73834 8.54541 6.92332 8.62203 7.05971 8.75842C7.1961 8.89481 7.27273 9.0798 7.27273 9.27268V14.3636C7.27273 14.5565 7.1961 14.7415 7.05971 14.8779C6.92332 15.0142 6.73834 15.0909 6.54545 15.0909Z" fill="white"/>
                                            <path d="M9.45455 15.0909C9.26166 15.0909 9.07668 15.0142 8.94029 14.8779C8.8039 14.7415 8.72727 14.5565 8.72727 14.3636V9.27268C8.72727 9.0798 8.8039 8.89481 8.94029 8.75842C9.07668 8.62203 9.26166 8.54541 9.45455 8.54541C9.64743 8.54541 9.83242 8.62203 9.96881 8.75842C10.1052 8.89481 10.1818 9.0798 10.1818 9.27268V14.3636C10.1818 14.5565 10.1052 14.7415 9.96881 14.8779C9.83242 15.0142 9.64743 15.0909 9.45455 15.0909Z" fill="white"/>
                                        </svg>
                                    </a>
                                    <!-- редактирование опыта -->
                                    <a href="{{ route('show.edit.user.project', $project->id) }}" class="user-exp_action circle edit-experience" title="Изменить" alt= >
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 22.0829V25H13.9171L22.5244 16.3927L19.6073 13.4756L11 22.0829ZM24.7725 14.1446C25.0758 13.8412 25.0758 13.3473 24.7725 13.0439L22.9561 11.2275C22.6527 10.9242 22.1588 10.9242 21.8554 11.2275L20.4319 12.6511L23.3489 15.5681L24.7725 14.1446Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <p class="user-project_name">
                                {{ $project->title }} 
                            </p>

                            <p class="user-project_description">
                                {{ $project->description }} 
                            </p>

                            <div class="user-project_links">
                                @if ($project->deploy_link)
                                    <a href="{{ $project->deploy_link }}" class="user-project_link btn-2 btn-xs"
                                        target="_blank">
                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_242_978)">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.99609 0.5C3.59609 0.5 -0.00390625 4.1 -0.00390625 8.5C-0.00390625 12.9 3.59609 16.5 7.99609 16.5C12.3961 16.5 15.9961 12.9 15.9961 8.5C15.9961 4.1 12.3961 0.5 7.99609 0.5ZM13.5161 5.3H11.1961C10.9561 4.26 10.5561 3.38 10.0761 2.42C11.5161 2.98 12.7961 3.94 13.5161 5.3ZM7.99609 2.1C8.63609 3.06 9.19609 4.1 9.51609 5.3H6.47609C6.79609 4.18 7.35609 3.06 7.99609 2.1ZM1.83609 10.1C1.67609 9.62 1.59609 9.06 1.59609 8.5C1.59609 7.94 1.67609 7.38 1.83609 6.9H4.55609C4.47609 7.46 4.47609 7.94 4.47609 8.5C4.47609 9.06 4.55609 9.54 4.55609 10.1H1.83609ZM2.47609 11.7H4.79609C5.03609 12.74 5.43609 13.62 5.91609 14.58C4.47609 14.02 3.19609 13.06 2.47609 11.7ZM4.79609 5.3H2.47609C3.27609 3.94 4.47609 2.98 5.91609 2.42C5.43609 3.38 5.03609 4.26 4.79609 5.3ZM7.99609 14.9C7.35609 13.94 6.79609 12.9 6.47609 11.7H9.51609C9.19609 12.82 8.63609 13.94 7.99609 14.9ZM9.83609 10.1H6.15609C6.07609 9.54 5.99609 9.06 5.99609 8.5C5.99609 7.94 6.07609 7.46 6.15609 6.9H9.91609C9.99609 7.46 10.0761 7.94 10.0761 8.5C10.0761 9.06 9.91609 9.54 9.83609 10.1ZM10.0761 14.58C10.5561 13.7 10.9561 12.74 11.1961 11.7H13.5161C12.7961 13.06 11.5161 14.02 10.0761 14.58ZM11.5161 10.1C11.5961 9.54 11.5961 9.06 11.5961 8.5C11.5961 7.94 11.5161 7.46 11.5161 6.9H14.2361C14.3961 7.38 14.4761 7.94 14.4761 8.5C14.4761 9.06 14.3961 9.54 14.2361 10.1H11.5161Z"
                                                    fill="#D0D5DD" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_242_978">
                                                    <rect width="16" height="16" fill="white"
                                                        transform="translate(0 0.5)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Веб-сайт
                                    </a>
                                @endif
                                
                                @if ($project->github_link)
                                    <a href="{{ $project->github_link }}" class="user-project_link btn-2 btn-xs"
                                    target="_blank">
                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8 0.5C3.58214 0.5 0 4.17143 0 8.70357C0 12.3286 2.29286 15.4 5.47143 16.4857C5.87143 16.5607 6.01786 16.3071 6.01786 16.0893C6.01786 15.8929 6.01071 15.3786 6.00714 14.6929C3.78214 14.6893 3.31071 13.0929 3.31071 13.0929C2.94643 12.1464 2.42143 11.8929 2.42143 11.8929C1.69643 11.3821 2.475 11.3929 2.475 11.3929C3.27857 11.95 3.7 12.7393 3.7 12.7393C4.41429 13.9929 5.57143 13.6321 6.02857 13.4214C6.1 12.8929 6.30714 12.5286 6.53571 12.325C4.76071 12.1179 2.89286 11.4143 2.89286 8.27143C2.89286 7.375 3.20357 6.64286 3.71429 6.07143C3.63214 5.86429 3.35714 5.02857 3.79286 3.9C3.79286 3.9 4.46429 3.67857 5.99286 4.73929C6.63214 4.55714 7.31429 4.46786 7.99643 4.46429C8.675 4.46786 9.36071 4.55714 10 4.73929C11.5286 3.67857 12.1964 3.9 12.1964 3.9C12.6321 5.02857 12.3571 5.86429 12.275 6.07143C12.7857 6.64643 13.0964 7.37857 13.0964 8.27143C13.0964 11.4214 11.225 12.1143 9.44286 12.3179C9.72857 12.5714 9.98571 13.0714 9.98571 13.8357C9.98571 14.9321 9.975 15.8179 9.975 16.0857C9.975 16.3036 10.1179 16.5607 10.525 16.4786C13.7107 15.3964 16 12.325 16 8.70357C16 4.17143 12.4179 0.5 8 0.5Z"
                                                fill="#D0D5DD" />
                                        </svg>
                                        GitHub
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach

                @else
                        <div class="placeholder_for_user_data_about">
                            <p class="user_data_about">
                                Вы пока не добавили проекты в свое портфолио.
                            </p>
                        </div>
                @endif

                {{-- add project button --}}
                {{-- <a href="" class="user-project-add">
                    <div class="add-inner-box">
                        <svg width="44" height="45" viewBox="0 0 44 45" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="0.5" width="44" height="44" rx="14.6667" fill="#46A7FE" />
                            <path
                                d="M29.7083 20.9719H23.5304V14.7939C23.5304 13.9871 22.8477 13.333 22.0026 13.333C21.1576 13.333 20.4748 13.9871 20.4748 14.7939V20.9719H14.2969C13.49 20.9719 12.8359 21.6546 12.8359 22.4997C12.8359 23.3447 13.49 24.0275 14.2969 24.0275H20.4748V30.2054C20.4748 31.0123 21.1576 31.6663 22.0026 31.6663C22.8477 31.6663 23.5304 31.0123 23.5304 30.2054V24.0275H29.7083C30.5152 24.0275 31.1693 23.3447 31.1693 22.4997C31.1693 21.6546 30.5152 20.9719 29.7083 20.9719Z"
                                fill="white" />
                        </svg>

                        <p>Добавить новый проект</p>
                    </div>
                </a> --}}
            </div>
        </div>
    </section>

    {{-- <script src="{{ asset('js/share-user-profile.js') }}" defer></script> --}}
    <script src="{{ asset('js/header-normalize.js') }}" defer></script>
    <script src="{{ asset('js/input-file-normalize-for-error.js') }}" defer></script>
    {{-- <script src="{{ asset('js/modal.js') }}" defer></script> --}}
    <script src="{{ asset('js/user-about-me-accordeon.js') }}" defer></script>

    <style>
        .user_skills_box {
            margin-top: 24px;
        }

        .user_skills_title {
            font-size: 16px;
            font-weight: 500;
            color: #101828;
            margin-bottom: 12px;
        }

        .user_skills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .user_skill {
            background: #F2F4F7;
            border-radius: 16px;
            padding: 4px 12px;
        }

        .user_skill_text {
            font-size: 14px;
            color: #344054;
            margin: 0;
        }
    </style>
@endsection
