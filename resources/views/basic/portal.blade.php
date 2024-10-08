@extends('basic.main')

@section('title',  '登入選項')

@section('content')

    <!-- ======= Services Section ======= -->
    <section id="contact" class="contact mb-2">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">登入選項</h1>
                    @if (session('status'))
                        <div class="col-lg-12 text-center">
                            <h6 class="alert alert-danger">{{ session('status') }}</h6>
                        </div>
                    @else
                        <a>本系統僅以 Portal 作為登入的系統</a>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Portal 帳號登入 -->
                <div class="col-md-5 mb-4">
                    <a href="{{ url('/portal/login') }}" class="info-item-link">
                        <div class="info-item info-item-borders p-4 text-center h-100">
                            <i class="bi bi-person-check-fill display-4 mb-3"></i>
                            <h3 class="h5 font-weight-bold mb-3">Portal 帳號登入</h3>
                            <p class="mb-2">若為中大師生或是已有註冊過 Portal 帳號，請由此登入。</p>
                            <p class="mb-1 text-muted small"><strong>P.S.</strong> 可以選擇不授權：出生日期、身分證字號、行動電話號碼。
                            </p>
                            <p class="text-muted small">其他資料皆需要授權才能登入。</p>
                        </div>
                    </a>
                </div><!-- End Info Item -->

                <!-- 訪客登入 -->
                <div class="col-md-5 mb-4">
                    <a href="https://portal.ncu.edu.tw/signup" class="info-item-link">
                        <div class="info-item info-item-borders p-4 text-center h-100">
                            <i class="bi bi-person-x-fill display-4 mb-3"></i>
                            <h3 class="h5 font-weight-bold mb-3">訪客登入（無 Portal 帳號）</h3>
                            <p class="mb-2">若沒有 Portal 帳號，請由此註冊帳號。</p>
                        </div>
                    </a>
                </div><!-- End Info Item -->
            </div>
        </div>
    </section><!-- End Services Section -->
@endsection
