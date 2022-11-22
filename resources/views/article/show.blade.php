@extends('layout.main')
@section('title')
    {{$article->title}}
@endsection
@section('body')
    <main class="container mb-auto">
        <div class="row">
            <div class="col-md-5 d-flex mx-auto flex-column">
                <div class="mb-auto"></div>
                <h3 class="mt-3 main-header-text-title"><span>High Powered Fully Managed Hosting For Your Unique
              Needs!</span>Shared Hosting</h3>
            </div>
            <div class="col-md-7">
                <div class="breadcrumb-hosting-pages row"><a class="col-md-3 active" href=""> <img
                            src="/static/picture/hosting.svg" alt=""> <span class="sub-breadcrumb-host-title">shared hosting</span>
                    </a> <a class="col-md-3" href="index2.html"> <span class="off-tag">-30% off</span> <img
                            src="/static/picture/clouds.svg" alt="#"> <span
                            class="sub-breadcrumb-host-title">VPS Hosting</span> </a>
                    <a class="col-md-3" href="index3.html"> <span class="off-tag">-15% off</span> <img
                            src="/static/picture/servers.svg" alt=""> <span class="sub-breadcrumb-host-title">Dedicated
                Servers</span> </a>
                </div>
            </div>
        </div>
    </main>
    <div class="mt-auto"></div>
    </div>
    <section class="padding-100-0-0 position-relative">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-8 row justify-content-center hosting-plan-row">
                    <div class="col-md-3">
                        <div class="third-pricing-table side-left">
                            <div class="plan-header"><span class="headline">Basic SSD</span> <span
                                    class="plan-price second-pricing-table-price monthly"> <i
                                        class="monthly">$3.99 <span>/mo</span></i>
                  <i class="yearly">$6.99 <span>/mo</span></i> </span> <span class="activated-method">Activate in
                  minutes</span></div>
                            <div class="package-body">
                                <ul>
                                    <li><strong>100GB</strong> Storage</li>
                                    <li><strong>Unlimited</strong> Sites</li>
                                    <li><strong>Unmetered</strong> Bandwidth</li>
                                    <li><strong>Unlimited</strong> Email,MySQL</li>
                                </ul>
                            </div>
                            <div class="package-footer"><a href="basic.html#038;pid=11"
                                                           style="color: #a558e1 !important;">order
                                    now</a></div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="third-pricing-table">
                            <div class="plan-header"><span class="headline">Business SSD</span> <span
                                    class="plan-price second-pricing-table-price monthly"> <i
                                        class="monthly">$6.99 <span>/mo</span></i>
                  <i class="yearly">$9.99 <span>/mo</span></i> </span> <span class="activated-method">Activate in
                  minutes</span></div>
                            <div class="package-body">
                                <ul>
                                    <li><strong>250 GB</strong> Storage</li>
                                    <li><strong>Unlimited</strong> Sites</li>
                                    <li><strong>Unmetered</strong> Bandwidth</li>
                                    <li><strong>Unlimited</strong> Email,MySQL</li>
                                    <li><strong>Most popular</strong> hosting plan</li>
                                </ul>
                            </div>
                            <div class="package-footer"><a href="business.html#038;pid=12">order now</a></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="third-pricing-table side-right">
                            <div class="plan-header"><span class="headline">Pro SSD</span> <span
                                    class="plan-price second-pricing-table-price monthly"> <i
                                        class="monthly">$9.99 <span>/mo</span></i>
                  <i class="yearly">$14.99 <span>/mo</span></i> </span> <span class="activated-method">Activate in
                  minutes</span></div>
                            <div class="package-body">
                                <ul>
                                    <li><strong>500 GB</strong> Storage</li>
                                    <li><strong>Unlimited</strong> Sites</li>
                                    <li><strong>Unmetered</strong> Bandwidth</li>
                                    <li><strong>Unlimited</strong> Email,MySQL</li>
                                </ul>
                            </div>
                            <div class="package-footer"><a href="pro.html#038;pid=13">order now</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 side-text-right-container side-text-plan-hosting">
                    <h2 class="side-text-right-title f-size25">Web Hosting Essentials<br></h2>
                    <p class="side-text-right-text f-size16"><b>Premium</b> features included with every package!</p>
                    <ul class="web-hosting-options">
                        <li><i class="far fa-window-restore"></i> Cpanel, App Installer &#038; Website Builder!</li>
                        <li><i class="fab fa-expeditedssl"></i> Free SSL certificate, domain, CDN!</li>
                        <li><i class="fas fa-database"></i> MariaDB 10.3, PHP 7+, redis, FFMPEG!</li>
                        <li><i class="fas fa-microchip"></i> Solid-state drives in RAID 10!</li>
                        <li><i class="fas fa-shield-alt"></i> Backups, DDOS protection, Firewall!</li>
                        <li><i class="far fa-clock"></i> 24/7 Premium Support, help with anything!</li>
                        <li><i class="fab fa-buromobelexperte"></i> Free transfer, optimization and <a
                                href="index7.html">more</a>
                            &#8230;
                        </li>
                    </ul>
                    <div id="monthly-yearly-chenge" class="mr-tp-20 custom-change"><a
                            class="active monthly-price f-size12">
                            <span class="change-box-text">annually</span> <span class="change-box"></span></a> <a
                            class="yearli-price f-size12"> <span class="change-box-text">monthly</span></a></div>
                </div>
            </div>
        </div>
    </section>
@endsection
