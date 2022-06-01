<html>

    @include('layouts.admin.includes.header')

    <body>
        <div class="container-fluid">
            <div class="row">
            <!--Logo Connecto-->
                <div class="mainNav text-white p-2 col-sm-2" style="background-color: #1E4095;">
                    <a class="logo d-flex align-items-center navbar-brand bg-white" href="{{ route('admin.panel.index') }}"><svg width="150" height="35" viewBox="0 0 426 98" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M98.0769 49C98.0769 76.062 76.1217 98 49.0385 98C21.9553 98 0 76.062 0 49C0 21.938 21.9553 0 49.0385 0C76.1217 0 98.0769 21.938 98.0769 49Z" fill="#1E4095"/>
                        <path d="M79.5025 60.9189C74.8022 72.3799 63.5265 80.4527 50.3638 80.4527C32.9793 80.4527 18.8864 66.3709 18.8864 49C18.8864 31.6292 32.9793 17.5473 50.3638 17.5473C63.5265 17.5473 74.8022 25.6201 79.5025 37.0811H63.9398C60.6349 33.4216 55.851 31.1216 50.5295 31.1216C40.5563 31.1216 32.4714 39.2002 32.4714 49.1655C32.4714 59.1309 40.5563 67.2095 50.5295 67.2095C56.0097 67.2095 60.9198 64.7702 64.2316 60.9189H79.5025Z" fill="white"/>
                        <path d="M49.0385 49C49.0385 45.7087 51.7087 43.0405 55.0026 43.0405H81.5099C84.8038 43.0405 87.474 45.7087 87.474 49C87.474 52.2913 84.8038 54.9595 81.5099 54.9595H55.0026C51.7087 54.9595 49.0385 52.2913 49.0385 49Z" fill="white"/>
                        <path d="M153.075 42.3297H163.24C162.928 39.5893 162.17 37.1582 160.966 35.0366C159.763 32.9149 158.225 31.1469 156.352 29.7325C154.524 28.2739 152.429 27.1689 150.066 26.4174C147.747 25.666 145.273 25.2903 142.642 25.2903C138.986 25.2903 135.687 25.9312 132.745 27.2131C129.847 28.4949 127.395 30.2629 125.388 32.5171C123.382 34.7714 121.844 37.4234 120.774 40.4733C119.704 43.4789 119.169 46.7498 119.169 50.2858C119.169 53.7335 119.704 56.9601 120.774 59.9658C121.844 62.9272 123.382 65.513 125.388 67.723C127.395 69.933 129.847 71.679 132.745 72.9608C135.687 74.1984 138.986 74.8172 142.642 74.8172C145.585 74.8172 148.282 74.3752 150.734 73.4912C153.186 72.6072 155.327 71.3254 157.154 69.6457C158.982 67.9661 160.454 65.9329 161.568 63.546C162.683 61.1592 163.374 58.4851 163.641 55.5236H153.476C153.075 58.7061 151.96 61.2697 150.132 63.2145C148.349 65.1594 145.852 66.1318 142.642 66.1318C140.279 66.1318 138.273 65.6898 136.623 64.8058C134.974 63.8775 133.636 62.662 132.611 61.1592C131.585 59.6564 130.828 57.9767 130.337 56.1203C129.891 54.2197 129.668 52.2749 129.668 50.2858C129.668 48.2084 129.891 46.1973 130.337 44.2524C130.828 42.3076 131.585 40.5838 132.611 39.0809C133.636 37.5339 134.974 36.3184 136.623 35.4344C138.273 34.5062 140.279 34.0421 142.642 34.0421C143.935 34.0421 145.161 34.2631 146.321 34.7051C147.524 35.1029 148.594 35.6775 149.531 36.4289C150.467 37.1803 151.247 38.0643 151.871 39.0809C152.495 40.0534 152.897 41.1363 153.075 42.3297Z" fill="#1E4095"/>
                        <path d="M178.235 56.6507C178.235 55.2805 178.368 53.9324 178.636 52.6064C178.903 51.2803 179.349 50.109 179.973 49.0924C180.642 48.0758 181.512 47.2581 182.582 46.6393C183.652 45.9763 184.989 45.6447 186.594 45.6447C188.199 45.6447 189.537 45.9763 190.607 46.6393C191.721 47.2581 192.591 48.0758 193.215 49.0924C193.884 50.109 194.352 51.2803 194.619 52.6064C194.887 53.9324 195.021 55.2805 195.021 56.6507C195.021 58.0209 194.887 59.3691 194.619 60.6951C194.352 61.9769 193.884 63.1482 193.215 64.209C192.591 65.2257 191.721 66.0434 190.607 66.6622C189.537 67.281 188.199 67.5904 186.594 67.5904C184.989 67.5904 183.652 67.281 182.582 66.6622C181.512 66.0434 180.642 65.2257 179.973 64.209C179.349 63.1482 178.903 61.9769 178.636 60.6951C178.368 59.3691 178.235 58.0209 178.235 56.6507ZM168.738 56.6507C168.738 59.3912 169.162 61.8664 170.009 64.0764C170.856 66.2865 172.06 68.1871 173.62 69.7783C175.181 71.3254 177.053 72.5188 179.238 73.3586C181.422 74.1984 183.875 74.6183 186.594 74.6183C189.314 74.6183 191.766 74.1984 193.951 73.3586C196.18 72.5188 198.075 71.3254 199.635 69.7783C201.196 68.1871 202.399 66.2865 203.246 64.0764C204.093 61.8664 204.517 59.3912 204.517 56.6507C204.517 53.9103 204.093 51.435 203.246 49.225C202.399 46.9708 201.196 45.0701 199.635 43.5231C198.075 41.9319 196.18 40.7164 193.951 39.8766C191.766 38.9925 189.314 38.5505 186.594 38.5505C183.875 38.5505 181.422 38.9925 179.238 39.8766C177.053 40.7164 175.181 41.9319 173.62 43.5231C172.06 45.0701 170.856 46.9708 170.009 49.225C169.162 51.435 168.738 53.9103 168.738 56.6507Z" fill="#1E4095"/>
                        <path d="M210.692 39.4788V73.7564H220.188V55.7888C220.188 52.297 220.768 49.7996 221.927 48.2968C223.086 46.7498 224.959 45.9763 227.544 45.9763C229.818 45.9763 231.401 46.6835 232.293 48.0979C233.184 49.4681 233.63 51.5676 233.63 54.3965V73.7564H243.127V52.6727C243.127 50.551 242.926 48.6283 242.525 46.9045C242.168 45.1364 241.522 43.6557 240.585 42.4623C239.649 41.2247 238.356 40.2744 236.707 39.6114C235.101 38.9041 233.028 38.5505 230.487 38.5505C228.481 38.5505 226.519 39.0146 224.602 39.9429C222.685 40.8269 221.124 42.2634 219.921 44.2524H219.72V39.4788H210.692Z" fill="#1E4095"/>
                        <path d="M250.334 39.4788V73.7564H259.831V55.7888C259.831 52.297 260.41 49.7996 261.569 48.2968C262.729 46.7498 264.601 45.9763 267.187 45.9763C269.461 45.9763 271.044 46.6835 271.935 48.0979C272.827 49.4681 273.273 51.5676 273.273 54.3965V73.7564H282.769V52.6727C282.769 50.551 282.569 48.6283 282.167 46.9045C281.811 45.1364 281.164 43.6557 280.228 42.4623C279.292 41.2247 277.999 40.2744 276.349 39.6114C274.744 38.9041 272.671 38.5505 270.13 38.5505C268.123 38.5505 266.162 39.0146 264.244 39.9429C262.327 40.8269 260.767 42.2634 259.563 44.2524H259.362V39.4788H250.334Z" fill="#1E4095"/>
                        <path d="M313.25 52.9379H297.801C297.846 52.2749 297.98 51.5234 298.202 50.6836C298.47 49.8438 298.893 49.0482 299.473 48.2968C300.097 47.5454 300.9 46.9266 301.881 46.4404C302.906 45.91 304.177 45.6447 305.693 45.6447C308.011 45.6447 309.727 46.2636 310.842 47.5012C312.001 48.7388 312.804 50.551 313.25 52.9379ZM297.801 58.905H322.746C322.924 56.2529 322.701 53.7114 322.077 51.2803C321.453 48.8493 320.428 46.6835 319.001 44.7828C317.619 42.8822 315.835 41.3794 313.651 40.2744C311.466 39.1251 308.903 38.5505 305.96 38.5505C303.33 38.5505 300.922 39.0146 298.737 39.9429C296.597 40.8711 294.747 42.1529 293.187 43.7883C291.626 45.3795 290.422 47.2802 289.575 49.4902C288.728 51.7002 288.305 54.0871 288.305 56.6507C288.305 59.3028 288.706 61.7338 289.509 63.9438C290.356 66.1539 291.537 68.0545 293.053 69.6457C294.569 71.237 296.419 72.4746 298.604 73.3586C300.788 74.1984 303.24 74.6183 305.96 74.6183C309.883 74.6183 313.227 73.7343 315.992 71.9663C318.756 70.1982 320.807 67.2589 322.144 63.1482H313.785C313.473 64.209 312.625 65.2257 311.243 66.1981C309.861 67.1263 308.212 67.5904 306.294 67.5904C303.619 67.5904 301.569 66.9053 300.142 65.5351C298.715 64.1648 297.935 61.9548 297.801 58.905Z" fill="#1E4095"/>
                        <path d="M351.919 51.5455H361.215C361.081 49.3355 360.546 47.4349 359.61 45.8437C358.673 44.2082 357.447 42.8601 355.931 41.7993C354.46 40.6943 352.766 39.8766 350.849 39.3461C348.976 38.8157 347.014 38.5505 344.964 38.5505C342.155 38.5505 339.658 39.0146 337.473 39.9429C335.289 40.8711 333.439 42.175 331.923 43.8546C330.407 45.49 329.248 47.457 328.445 49.7554C327.687 52.0097 327.308 54.4628 327.308 57.1148C327.308 59.6785 327.732 62.0432 328.579 64.209C329.426 66.3307 330.607 68.165 332.123 69.712C333.639 71.2591 335.467 72.4746 337.607 73.3586C339.792 74.1984 342.177 74.6183 344.763 74.6183C349.355 74.6183 353.123 73.4249 356.065 71.038C359.008 68.6512 360.791 65.1815 361.415 60.6288H352.253C351.941 62.7504 351.161 64.4521 349.912 65.734C348.709 66.9716 346.97 67.5904 344.696 67.5904C343.225 67.5904 341.976 67.2589 340.951 66.5959C339.926 65.9329 339.101 65.0931 338.477 64.0764C337.897 63.0156 337.473 61.8443 337.206 60.5625C336.938 59.2807 336.805 58.0209 336.805 56.7833C336.805 55.5015 336.938 54.2197 337.206 52.9379C337.473 51.6118 337.919 50.4184 338.543 49.3576C339.212 48.2526 340.059 47.3686 341.085 46.7056C342.11 45.9984 343.381 45.6447 344.897 45.6447C348.954 45.6447 351.295 47.6117 351.919 51.5455Z" fill="#1E4095"/>
                        <path d="M378.818 39.4788V29.2021H369.321V39.4788H363.57V45.7774H369.321V65.9992C369.321 67.723 369.611 69.1153 370.191 70.1761C370.77 71.237 371.55 72.0547 372.531 72.6293C373.557 73.2039 374.716 73.5796 376.009 73.7564C377.346 73.9774 378.751 74.0879 380.222 74.0879C381.158 74.0879 382.117 74.0658 383.098 74.0216C384.079 73.9774 384.97 73.889 385.773 73.7564V66.4633C385.327 66.5517 384.859 66.618 384.368 66.6622C383.878 66.7064 383.365 66.7285 382.83 66.7285C381.225 66.7285 380.155 66.4633 379.62 65.9329C379.085 65.4025 378.818 64.3416 378.818 62.7504V45.7774H385.773V39.4788H378.818Z" fill="#1E4095"/>
                        <path d="M398.718 56.6507C398.718 55.2805 398.851 53.9324 399.119 52.6064C399.386 51.2803 399.832 50.109 400.456 49.0924C401.125 48.0758 401.995 47.2581 403.065 46.6393C404.135 45.9763 405.472 45.6447 407.077 45.6447C408.682 45.6447 410.02 45.9763 411.09 46.6393C412.204 47.2581 413.074 48.0758 413.698 49.0924C414.367 50.109 414.835 51.2803 415.102 52.6064C415.37 53.9324 415.504 55.2805 415.504 56.6507C415.504 58.0209 415.37 59.3691 415.102 60.6951C414.835 61.9769 414.367 63.1482 413.698 64.209C413.074 65.2257 412.204 66.0434 411.09 66.6622C410.02 67.281 408.682 67.5904 407.077 67.5904C405.472 67.5904 404.135 67.281 403.065 66.6622C401.995 66.0434 401.125 65.2257 400.456 64.209C399.832 63.1482 399.386 61.9769 399.119 60.6951C398.851 59.3691 398.718 58.0209 398.718 56.6507ZM389.221 56.6507C389.221 59.3912 389.645 61.8664 390.492 64.0764C391.339 66.2865 392.543 68.1871 394.103 69.7783C395.664 71.3254 397.536 72.5188 399.721 73.3586C401.905 74.1984 404.357 74.6183 407.077 74.6183C409.797 74.6183 412.249 74.1984 414.434 73.3586C416.663 72.5188 418.558 71.3254 420.118 69.7783C421.678 68.1871 422.882 66.2865 423.729 64.0764C424.576 61.8664 425 59.3912 425 56.6507C425 53.9103 424.576 51.435 423.729 49.225C422.882 46.9708 421.678 45.0701 420.118 43.5231C418.558 41.9319 416.663 40.7164 414.434 39.8766C412.249 38.9925 409.797 38.5505 407.077 38.5505C404.357 38.5505 401.905 38.9925 399.721 39.8766C397.536 40.7164 395.664 41.9319 394.103 43.5231C392.543 45.0701 391.339 46.9708 390.492 49.225C389.645 51.435 389.221 53.9103 389.221 56.6507Z" fill="#1E4095"/>
                    </svg></a>

                <hr class="notSep">
                <!--Menu des pages-->
                    <ul class="nav nav-pills flex-column">
                        <li><a href="{{ route('admin.panel.index') }}" class="nav-link p-0 @if(str_contains(Route::currentRouteName(), 'panel.')) is_active @endif">Tableau de bord</a></li>
                        <li><a href="{{ route('admin.users.index') }}" class="nav-link p-0 @if(str_contains(Route::currentRouteName(), 'users.')) is_active @endif">Utilisateur</a></li>
                        <li><a href="{{ route('admin.incidents.index') }}" class="nav-link p-0 @if(str_contains(Route::currentRouteName(), 'incidents.')) is_active @endif">Incidents</a></li>
                        <div>
                            <li>
                            <div class="row justify-content-between" style="padding-left: 12px;">
                                <a href="{{ route('admin.historique.index') }}" class="nav-link p-0 @if(str_contains(Route::currentRouteName(), 'historique.')) is_active @endif">Historique</a>
                                <button type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" role="button" aria-expanded="false" aria-controls="dropdown1 dropdown2" class="arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            
                                <ul>
                                    <li><a href="{{ route('admin.signalisations.index') }}" id="dropdown1" class="nav-link p-0 collapse multi-collapse @if(str_contains(Route::currentRouteName(), 'signalisations.')) is_active @endif">Signalisations</a></li>
                                    <li><a href="{{ route('admin.histIncidents.index') }}" id="dropdown2" class="nav-link p-0 collapse multi-collapse @if(str_contains(Route::currentRouteName(), 'histIncidents.')) is_active @endif">Incidents</a></li>
                                </ul>
                            </li>
                        </div>
                    </ul>

                    <div class="user col-2">
                    <hr class="notSep">

                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>

                            <span style="margin-left: 5px; font-size: 14px;"><?php $user = Auth::user(); echo $user["first_name"]." ".$user["last_name"];?></span>
                        </div>

                    <hr class="notSep">

                        <a href='{{ route('logout') }}'>Déconnexion</a>
                    </div>
                </div>
            <!--Tableau de bord (ou page chargée)-->
                <div class="col-sm-10 offset-2">
                    <div class="row" style="height:auto">
                        <div class="titre">
                            <p class="col-sm-12">@yield('title')</p>

                        <hr class="separator">
                        </div>

                        <div class="container100">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    @include('layouts.admin.includes.footer')
</html>